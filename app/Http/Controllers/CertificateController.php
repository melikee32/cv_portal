<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = auth()->user()
            ->candidateProfile
            ->certificates()
            ->latest('issue_date')
            ->get();

        return view('candidate.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('candidate.certificates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'institution'      => 'required|string|max:255',
            'issue_date'       => 'nullable|date',
            'certificate_url'  => 'nullable|url|max:255',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('certificate_file')) {
            $validated['certificate_file'] = $request->file('certificate_file')
                ->store('certificates', 'public');
        }

        auth()->user()
            ->candidateProfile
            ->certificates()
            ->create($validated);

        return redirect()
            ->route('candidate.certificates.index')
            ->with('success', 'Sertifika eklendi.');
    }

    public function edit(Certificate $certificate)
    {
        $this->authorizeCandidate($certificate);

        return view('candidate.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $this->authorizeCandidate($certificate);

        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'institution'      => 'required|string|max:255',
            'issue_date'       => 'nullable|date',
            'certificate_url'  => 'nullable|url|max:255',
            'certificate_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('certificate_file')) {
            // Eski dosyayı sil (varsa)
            if ($certificate->certificate_file) {
                \Storage::disk('public')->delete($certificate->certificate_file);
            }

            $validated['certificate_file'] = $request->file('certificate_file')
                ->store('certificates', 'public');
        } else {
            // Yeni dosya yüklenmediyse eski değeri koru
            unset($validated['certificate_file']);
        }

        $certificate->update($validated);

        return redirect()
            ->route('candidate.certificates.index')
            ->with('success', 'Sertifika güncellendi.');
    }

    public function destroy(Certificate $certificate)
    {
        $this->authorizeCandidate($certificate);

        if ($certificate->certificate_file) {
            \Storage::disk('public')->delete($certificate->certificate_file);
        }

        $certificate->delete();

        return redirect()
            ->route('candidate.certificates.index')
            ->with('success', 'Sertifika silindi.');
    }

    private function authorizeCandidate(Certificate $certificate): void
    {
        if ($certificate->candidate_id !== auth()->user()->candidateProfile->id) {
            abort(403);
        }
    }
}