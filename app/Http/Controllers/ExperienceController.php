<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // Adayın tüm iş deneyimlerini listeler.
    public function index()
    {
        $experiences = auth()->user()
            ->candidateProfile
            ->experiences()
            ->latest('start_date')
            ->get();

        return view('candidate.experiences.index', compact('experiences'));
    }

    // Yeni deneyim ekleme formunu açar.
    public function create()
    {
        return view('candidate.experiences.create');
    }

    // Yeni deneyimi veritabanına kaydeder.
    public function store(Request $request)
    {
        $request->merge([
            'is_current' => $request->boolean('is_current'),
        ]);


        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'position'     => 'required|string|max:255',
            'start_date'   => 'nullable|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'is_current'   => 'boolean',
            'description'  => 'nullable|string',
        ]);

        auth()->user()
            ->candidateProfile
            ->experiences()
            ->create($validated);

        return redirect()
            ->route('candidate.experiences.index')
            ->with('success', 'İş deneyimi eklendi.');
    }

    // Deneyimin düzenleme formunu açar.
    public function edit(Experience $experience)
    {
        $this->authorizeCandidate($experience);

        return view('candidate.experiences.edit', compact('experience'));
    }

    // Mevcut deneyimi günceller.
    public function update(Request $request, Experience $experience)
    {
        $this->authorizeCandidate($experience);
        
        $request->merge([
            'is_current' => $request->boolean('is_current'),
        ]);

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'position'     => 'required|string|max:255',
            'start_date'   => 'nullable|date',
            'end_date'     => 'nullable|date|after_or_equal:start_date',
            'is_current'   => 'boolean',
            'description'  => 'nullable|string',
        ]);

        $experience->update($validated);

        return redirect()
            ->route('candidate.experiences.index')
            ->with('success', 'İş deneyimi güncellendi.');
    }

    // Deneyimi siler.
    public function destroy(Experience $experience)
    {
        $this->authorizeCandidate($experience);

        $experience->delete();

        return redirect()
            ->route('candidate.experiences.index')
            ->with('success', 'İş deneyimi silindi.');
    }

    // Deneyimin giriş yapan adaya ait olduğunu kontrol eder.
    private function authorizeCandidate(Experience $experience): void
    {
        if (
            $experience->candidate_id !==
            auth()->user()->candidateProfile->id
        ) {
            abort(403);
        }
    }
}
