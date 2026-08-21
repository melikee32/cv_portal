<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = auth()->user()
            ->candidateProfile
            ->skills()
            ->latest()
            ->get();

        return view('candidate.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('candidate.skills.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'level'    => 'required|in:Başlangıç,Orta,İleri',
            'category' => 'nullable|string|max:255',
        ]);

        auth()->user()
            ->candidateProfile
            ->skills()
            ->create($validated);

        return redirect()
            ->route('candidate.skills.index')
            ->with('success', 'Yetenek eklendi.');
    }

    public function edit(Skill $skill)
    {
        $this->authorizeCandidate($skill);

        return view('candidate.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $this->authorizeCandidate($skill);

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'level'    => 'required|in:Başlangıç,Orta,İleri',
            'category' => 'nullable|string|max:255',
        ]);

        $skill->update($validated);

        return redirect()
            ->route('candidate.skills.index')
            ->with('success', 'Yetenek güncellendi.');
    }

    public function destroy(Skill $skill)
    {
        $this->authorizeCandidate($skill);

        $skill->delete();

        return redirect()
            ->route('candidate.skills.index')
            ->with('success', 'Yetenek silindi.');
    }

    private function authorizeCandidate(Skill $skill): void
    {
        if ($skill->candidate_id !== auth()->user()->candidateProfile->id) {
            abort(403);
        }
    }
}