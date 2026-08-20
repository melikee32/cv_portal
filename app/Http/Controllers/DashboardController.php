<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Giriş yapan kullanıcının role'üne göre ilgili dashboard'a yönlendirir
    public function index(Request $request)
    {
        $user = Auth::user();

        return match ($user->role) {
            'candidate' => redirect()->route('candidate.dashboard'),
            'employer'  => redirect()->route('company.dashboard'),
            default     => redirect('/login')->withErrors(['role' => 'Geçersiz kullanıcı rolü.']),
        };
    }

    // Aday paneli
    public function candidateDashboard()
    {
        $user = Auth::user();

        // Profili yoksa önce profil oluşturma sayfasına gönder
        if (! $user->candidateProfile) {
            return redirect()->route('candidate.profile.create')
                ->with('success', 'Devam etmeden önce profilini tamamla.');
        }

        return view('candidate.dashboard', compact('user'));
    }

    // İşveren paneli
    public function companyDashboard()
    {
        $user = Auth::user();

        // Firma profili yoksa önce firma oluşturma sayfasına gönder
        if (! $user->company) {
            return redirect()->route('company.profile.create')
                ->with('success', 'Devam etmeden önce firma profilini oluştur.');
        }

        return view('company.dashboard', compact('user'));
    }
}
