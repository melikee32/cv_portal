<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    public function index()
    {
        $cvs = auth()->user()->candidateProfile->cvs()->latest()->get();
        return view('cvs.index', compact('cvs'));
    }

    public function create()
    {
        $templates = ['modern' => 'Modern', 'classic' => 'Klasik'];
        return view('cvs.create', compact('templates'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'template' => 'required|in:modern,classic',
        ]);

        $cv = auth()->user()->candidateProfile->cvs()->create([
            'title' => $validated['title'],
            'template' => $validated['template'],
            'share_token' => Str::random(32),
        ]);

        return redirect()->route('cvs.index')->with('success', 'CV oluşturuldu.');
    }

    public function show(Cv $cv)
    {
        $this->authorizeCv($cv);
        $candidate = $cv->candidate()->with(['educations', 'experiences', 'skills', 'certificates', 'courses'])->first();
        return view("cvs.templates.{$cv->template}", compact('cv', 'candidate'));
    }

    public function destroy(Cv $cv)
    {
        $this->authorizeCv($cv);
        $cv->delete();
        return redirect()->route('cvs.index')->with('success', 'CV silindi.');
    }

    private function authorizeCv(Cv $cv)
    {
        if ($cv->candidate_id !== auth()->user()->candidateProfile->id) {
            abort(403);
        }
    }



    public function downloadPdf(Cv $cv)
    {
        $this->authorizeCv($cv);
        $candidate = $cv->candidate()->with(['educations', 'experiences', 'skills', 'certificates', 'courses'])->first();

        $pdf = Pdf::loadView("cvs.templates.{$cv->template}", compact('cv', 'candidate'));

        return $pdf->download("{$cv->title}.pdf");
    }
}
