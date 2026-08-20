<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = auth()->user()->candidateProfile->educations()->latest('start_date')->get();

        return view('candidate.educations.index', compact('educations'));
    }

    public function create()
    {
        return view('candidate.educations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'school_name'  => 'required|string|max:255',
            'department'   => 'nullable|string|max:255',
            'degree'       => 'nullable|string|max:255',
            'start_date'   => 'nullable|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'is_current'   => 'boolean',
            'description'  => 'nullable|string',
        ]);

        auth()->user()->candidateProfile->educations()->create($validated);

        return redirect()->route('candidate.educations.index')
            ->with('success', 'Eğitim bilgisi eklendi.');
    }

    public function edit(Education $education)
    {
        $this->authorizeCandidate($education);

        return view('candidate.educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $this->authorizeCandidate($education);

        $validated = $request->validate([
            'school_name'  => 'required|string|max:255',
            'department'   => 'nullable|string|max:255',
            'degree'       => 'nullable|string|max:255',
            'start_date'   => 'nullable|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'is_current'   => 'boolean',
            'description'  => 'nullable|string',
        ]);

        $education->update($validated);

        return redirect()->route('candidate.educations.index')
            ->with('success', 'Eğitim bilgisi güncellendi.');
    }

    public function destroy(Education $education)
    {
        $this->authorizeCandidate($education);

        $education->delete();

        return redirect()->route('candidate.educations.index')
            ->with('success', 'Eğitim bilgisi silindi.');
    }

    private function authorizeCandidate(Education $education): void
    {
        if ($education->candidate_id !== auth()->user()->candidateProfile->id) {
            abort(403);
        }
    }
}