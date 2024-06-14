<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{ public function index()
    {
        $users = User::all();
        return view('admin.user-management.list', compact('users'));
    }

    public function create()
    {
        return view('admin.user-management.create');
    }

    public function store(Request $request)
    {
        

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password_hash),
            'role_id' => 2,
            'no_cif' => $request->input('no_cif'),
            'no_alt' => $request->input('no_alt'),
            'member_name' => $request->input('member_name'),
            'phone_number' => $request->input('phone_number'),
            'occupation' => $request->input('occupation'),
            'cif_status' => $request->input('cif_status'),
            'ktp_number' => $request->input('ktp_number'),
            'npwp_number' => $request->input('npwp_number'),
            'birth_place' => $request->input('birth_place'),
            'birth_date' => $request->input('birth_date'),
            'religion' => $request->input('religion'),
            'marital_status' => $request->input('marital_status'),
            'education' => $request->input('education'),
            'ethnicity' => $request->input('ethnicity'),
            'nickname' => $request->input('nickname'),
            'age' => $request->input('age'),
            'rt_ktp' => $request->input('rt_ktp'),
            'rw_ktp' => $request->input('rw_ktp'),
            'kelurahan_ktp' => $request->input('kelurahan_ktp'),
            'kecamatan_ktp' => $request->input('kecamatan_ktp'),
            'city_ktp' => $request->input('city_ktp'),
            'province_ktp' => $request->input('province_ktp'),
            'domicile_address' => $request->input('domicile_address'),
            'kelurahan_domicile' => $request->input('kelurahan_domicile'),
            'kecamatan_domicile' => $request->input('kecamatan_domicile'),
            'city_domicile' => $request->input('city_domicile'),
            'province_domicile' => $request->input('province_domicile'),
            'domicile_postal_code' => $request->input('domicile_postal_code'),
            'mother_name' => $request->input('mother_name'),
            'heir_name_1' => $request->input('heir_name_1'),
            'heir_name_2' => $request->input('heir_name_2'),
            'heir_name_3' => $request->input('heir_name_3'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'customer_type' => $request->input('customer_type'),
            'member_type' => $request->input('member_type'),
            'document_upload' => $request->input('document_upload'),
            'branch' => $request->input('branch'),
            'opening_date' => $request->input('opening_date'),
            'opening_purpose' => $request->input('opening_purpose'),
            'loan_category' => $request->input('loan_category'),
            'monthly_income' => $request->input('monthly_income'),
            'officer' => $request->input('officer'),
        ]);
        Alert::success('User created successfully.');
        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.user-management.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $user->update([

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role_id' => 2,
            'no_cif' => $request->input('no_cif'),
            'no_alt' => $request->input('no_alt'),
            'member_name' => $request->input('member_name'),
            'phone_number' => $request->input('phone_number'),
            'occupation' => $request->input('occupation'),
            'cif_status' => $request->input('cif_status'),
            'ktp_number' => $request->input('ktp_number'),
            'npwp_number' => $request->input('npwp_number'),
            'birth_place' => $request->input('birth_place'),
            'birth_date' => $request->input('birth_date'),
            'religion' => $request->input('religion'),
            'marital_status' => $request->input('marital_status'),
            'education' => $request->input('education'),
            'ethnicity' => $request->input('ethnicity'),
            'nickname' => $request->input('nickname'),
            'age' => $request->input('age'),
            'rt_ktp' => $request->input('rt_ktp'),
            'rw_ktp' => $request->input('rw_ktp'),
            'kelurahan_ktp' => $request->input('kelurahan_ktp'),
            'kecamatan_ktp' => $request->input('kecamatan_ktp'),
            'city_ktp' => $request->input('city_ktp'),
            'province_ktp' => $request->input('province_ktp'),
            'domicile_address' => $request->input('domicile_address'),
            'kelurahan_domicile' => $request->input('kelurahan_domicile'),
            'kecamatan_domicile' => $request->input('kecamatan_domicile'),
            'city_domicile' => $request->input('city_domicile'),
            'province_domicile' => $request->input('province_domicile'),
            'domicile_postal_code' => $request->input('domicile_postal_code'),
            'mother_name' => $request->input('mother_name'),
            'heir_name_1' => $request->input('heir_name_1'),
            'heir_name_2' => $request->input('heir_name_2'),
            'heir_name_3' => $request->input('heir_name_3'),
            'gender' => $request->input('gender'),
            'address' => $request->input('address'),
            'customer_type' => $request->input('customer_type'),
            'member_type' => $request->input('member_type'),
            'document_upload' => $request->input('document_upload'),
            'branch' => $request->input('branch'),
            'opening_date' => $request->input('opening_date'),
            'opening_purpose' => $request->input('opening_purpose'),
            'loan_category' => $request->input('loan_category'),
            'monthly_income' => $request->input('monthly_income'),
            'officer' => $request->input('officer'),
        ]);
        Alert::success('User updated successfully.');
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('User created successfully.');
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
