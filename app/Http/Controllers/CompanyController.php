<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    // Firma oluşturma formu
    public function create()
    {
        if (Auth::user()->company) {
            return redirect()->route('company.profile.edit');
        }

        return view('company.profile-create');
    }

    // Yeni firma kaydı
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'logo'         => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'industry'     => 'nullable|string|max:150',
            'city'         => 'nullable|string|max:100',
            'address'      => 'nullable|string|max:255',
            'website'      => 'nullable|url|max:255',
            'instagram'    => 'nullable|url|max:255',
            'linkedin'     => 'nullable|url|max:255',
            'x'            => 'nullable|url|max:255',
        ]);

        $validated['user_id'] = Auth::id();

        Company::create($validated);

        return redirect()->route('company.dashboard')
            ->with('success', 'Firma profili oluşturuldu!');
    }

    // Firma düzenleme formu
    public function edit()
    {
        $company = Auth::user()->company;

        if (! $company) {
            return redirect()->route('company.profile.create');
        }

        return view('company.profile-edit', compact('company'));
    }

    // Firma güncelleme
    public function update(Request $request)
    {
        $company = Auth::user()->company;

        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'logo'         => 'nullable|string|max:255',
            'description'  => 'nullable|string',
            'industry'     => 'nullable|string|max:150',
            'city'         => 'nullable|string|max:100',
            'address'      => 'nullable|string|max:255',
            'website'      => 'nullable|url|max:255',
            'instagram'    => 'nullable|url|max:255',
            'linkedin'     => 'nullable|url|max:255',
            'x'            => 'nullable|url|max:255',
        ]);

        $company->update($validated);

        return redirect()->route('company.dashboard')
            ->with('success', 'Firma bilgileri güncellendi!');
    }
}