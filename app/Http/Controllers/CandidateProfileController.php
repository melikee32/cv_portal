<?php

namespace App\Http\Controllers;

use App\Models\CandidateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateProfileController extends Controller
{
    // Profil oluşturma formu
    public function create()
    {
        // Zaten profili varsa oluşturma formuna değil, düzenleme sayfasına gönder
        if (Auth::user()->candidateProfile) {
            return redirect()->route('candidate.profile.edit');
        }

        return view('candidate.profile-create');
    }

    // Yeni profil kaydı
    public function store(Request $request)
    {
        $validated = $request->validate([
            'phone'         => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'city'          => 'nullable|string|max:100',
            'about_me'      => 'nullable|string',
            'github'        => 'nullable|url|max:255',
            'linkedin'      => 'nullable|url|max:255',
            'portfolio'     => 'nullable|url|max:255',
            'is_public'     => 'boolean',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['profile_completion_rate'] = $this->calculateCompletion($validated);

        CandidateProfile::create($validated);

        return redirect()->route('candidate.dashboard')
            ->with('success', 'Profilin oluşturuldu!');
    }

    // Profil düzenleme formu
    public function edit()
    {
        $profile = Auth::user()->candidateProfile;

        // Profili yoksa önce oluşturma formuna gönder
        if (! $profile) {
            return redirect()->route('candidate.profile.create');
        }

        return view('candidate.profile-edit', compact('profile'));
    }

    // Profil güncelleme
    public function update(Request $request)
    {
        $profile = Auth::user()->candidateProfile;

        $validated = $request->validate([
            'phone'         => 'nullable|string|max:20',
            'date_of_birth' => 'nullable|date',
            'city'          => 'nullable|string|max:100',
            'about_me'      => 'nullable|string',
            'github'        => 'nullable|url|max:255',
            'linkedin'      => 'nullable|url|max:255',
            'portfolio'     => 'nullable|url|max:255',
            'is_public'     => 'boolean',
        ]);

        $validated['profile_completion_rate'] = $this->calculateCompletion($validated);

        $profile->update($validated);

        return redirect()->route('candidate.dashboard')
            ->with('success', 'Profilin güncellendi!');
    }

    // Doldurulan alan sayısına göre basit bir tamamlanma oranı hesabı
    private function calculateCompletion(array $data): int
    {
        $trackedFields = ['phone', 'date_of_birth', 'city', 'about_me', 'github', 'linkedin', 'portfolio'];
        $filled = 0;

        foreach ($trackedFields as $field) {
            if (! empty($data[$field])) {
                $filled++;
            }
        }

        return (int) round(($filled / count($trackedFields)) * 100);
    }
}