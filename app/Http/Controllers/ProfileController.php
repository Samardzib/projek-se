<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'nullable',
            'no_cif' => 'nullable|string',
            'no_alt' => 'nullable|string',
            'member_name' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'occupation' => 'nullable|string',
            'cif_status' => 'nullable|string',
            'ktp_number' => 'nullable|string',
            'npwp_number' => 'nullable|string',
            'birth_place' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'religion' => 'nullable|string',
            'marital_status' => 'nullable|string',
            'education' => 'nullable|string',
            'ethnicity' => 'nullable|string',
            'nickname' => 'nullable|string',
            'age' => 'nullable|integer',
            'rt_ktp' => 'nullable|string',
            'rw_ktp' => 'nullable|string',
            'kelurahan_ktp' => 'nullable|string',
            'kecamatan_ktp' => 'nullable|string',
            'city_ktp' => 'nullable|string',
            'province_ktp' => 'nullable|string',
            'domicile_address' => 'nullable|string',
            'kelurahan_domicile' => 'nullable|string',
            'kecamatan_domicile' => 'nullable|string',
            'city_domicile' => 'nullable|string',
            'province_domicile' => 'nullable|string',
            'domicile_postal_code' => 'nullable|string',
            'mother_name' => 'nullable|string',
            'heir_name_1' => 'nullable|string',
            'heir_name_2' => 'nullable|string',
            'heir_name_3' => 'nullable|string',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'customer_type' => 'nullable|string',
            'member_type' => 'nullable|string',
            'document_upload' => 'nullable|string',
            'branch' => 'nullable|string',
            'opening_date' => 'nullable|date',
            'opening_purpose' => 'nullable|string',
            'loan_category' => 'nullable|string',
            'monthly_income' => 'nullable|numeric',
            'officer' => 'nullable|string',
        ]);

        $updatedData = [
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => 2,
            'no_cif' => $request->no_cif,
            'no_alt' => $request->no_alt,
            'member_name' => $request->member_name,
            'phone_number' => $request->phone_number,
            'occupation' => $request->occupation,
            'cif_status' => $request->cif_status,
            'ktp_number' => $request->ktp_number,
            'npwp_number' => $request->npwp_number,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'religion' => $request->religion,
            'marital_status' => $request->marital_status,
            'education' => $request->education,
            'ethnicity' => $request->ethnicity,
            'nickname' => $request->nickname,
            'age' => $request->age,
            'rt_ktp' => $request->rt_ktp,
            'rw_ktp' => $request->rw_ktp,
            'kelurahan_ktp' => $request->kelurahan_ktp,
            'kecamatan_ktp' => $request->kecamatan_ktp,
            'city_ktp' => $request->city_ktp,
            'province_ktp' => $request->province_ktp,
            'domicile_address' => $request->domicile_address,
            'kelurahan_domicile' => $request->kelurahan_domicile,
            'kecamatan_domicile' => $request->kecamatan_domicile,
            'city_domicile' => $request->city_domicile,
            'province_domicile' => $request->province_domicile,
            'domicile_postal_code' => $request->domicile_postal_code,
            'mother_name' => $request->mother_name,
            'heir_name_1' => $request->heir_name_1,
            'heir_name_2' => $request->heir_name_2,
            'heir_name_3' => $request->heir_name_3,
            'gender' => $request->gender,
            'address' => $request->address,
            'customer_type' => $request->customer_type,
            'member_type' => $request->member_type,
            'document_upload' => $request->document_upload,
            'branch' => $request->branch,
            'opening_date' => $request->opening_date,
            'opening_purpose' => $request->opening_purpose,
            'loan_category' => $request->loan_category,
            'monthly_income' => $request->monthly_income,
            'officer' => $request->officer,
        ];

        // Jika password diubah
        if ($request->password) {
            $updatedData['password'] = Hash::make($request->password);
        }

        $user->update($updatedData);

        return redirect()->route('profile.show')->with('success', 'Profil berhasil diperbarui');
    
    }
}

