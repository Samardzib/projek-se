@extends('layouts.main')

@section('app-title', 'Edit Pengguna')

@section('main-content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_cif" class="form-label">No CIF</label>
                                        <input type="text" class="form-control" id="no_cif" name="no_cif" value="{{ $user->no_cif }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_alt" class="form-label">No ALT</label>
                                        <input type="text" class="form-control" id="no_alt" name="no_alt" value="{{ $user->no_alt }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="member_name" class="form-label">Nama Member</label>
                                        <input type="text" class="form-control" id="member_name" name="member_name" value="{{ $user->member_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone_number" class="form-label">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ $user->phone_number }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="occupation" class="form-label">Pekerjaan</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $user->occupation }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="cif_status" class="form-label">Status CIF</label>
                                        <input type="text" class="form-control" id="cif_status" name="cif_status" value="{{ $user->cif_status }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ktp_number" class="form-label">Nomor KTP</label>
                                        <input type="text" class="form-control" id="ktp_number" name="ktp_number" value="{{ $user->ktp_number }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="npwp_number" class="form-label">Nomor NPWP</label>
                                        <input type="text" class="form-control" id="npwp_number" name="npwp_number" value="{{ $user->npwp_number }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="birth_place" class="form-label">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{ $user->birth_place }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="birth_date" class="form-label">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ $user->birth_date }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="religion" class="form-label">Agama</label>
                                        <input type="text" class="form-control" id="religion" name="religion" value="{{ $user->religion }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="marital_status" class="form-label">Status Perkawinan</label>
                                        <input type="text" class="form-control" id="marital_status" name="marital_status" value="{{ $user->marital_status }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="education" class="form-label">Pendidikan</label>
                                        <input type="text" class="form-control" id="education" name="education" value="{{ $user->education }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ethnicity" class="form-label">Suku</label>
                                        <input type="text" class="form-control" id="ethnicity" name="ethnicity" value="{{ $user->ethnicity }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nickname" class="form-label">Nama Panggilan</label>
                                        <input type="text" class="form-control" id="nickname" name="nickname" value="{{ $user->nickname }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Usia</label>
                                        <input type="text" class="form-control" id="age" name="age" value="{{ $user->age }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="rt_ktp" class="form-label">RT KTP</label>
                                        <input type="text" class="form-control" id="rt_ktp" name="rt_ktp" value="{{ $user->rt_ktp }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="rw_ktp" class="form-label">RW KTP</label>
                                        <input type="text" class="form-control" id="rw_ktp" name="rw_ktp" value="{{ $user->rw_ktp }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelurahan_ktp" class="form-label">Kelurahan KTP</label>
                                        <input type="text" class="form-control" id="kelurahan_ktp" name="kelurahan_ktp" value="{{ $user->kelurahan_ktp }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kecamatan_ktp" class="form-label">Kecamatan KTP</label>
                                        <input type="text" class="form-control" id="kecamatan_ktp" name="kecamatan_ktp" value="{{ $user->kecamatan_ktp }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="city_ktp" class="form-label">Kota KTP</label>
                                        <input type="text" class="form-control" id="city_ktp" name="city_ktp" value="{{ $user->city_ktp }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="province_ktp" class="form-label">Provinsi KTP</label>
                                        <input type="text" class="form-control" id="province_ktp" name="province_ktp" value="{{ $user->province_ktp }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="mb-3">
                                        <label for="domicile_address" class="form-label">Alamat Domisili</label>
                                        <input type="text" class="form-control" id="domicile_address" name="domicile_address" value="{{ $user->domicile_address }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelurahan_domicile" class="form-label">Kelurahan Domisili</label>
                                        <input type="text" class="form-control" id="kelurahan_domicile" name="kelurahan_domicile" value="{{ $user->kelurahan_domicile }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="kecamatan_domicile" class="form-label">Kecamatan Domisili</label>
                                        <input type="text" class="form-control" id="kecamatan_domicile" name="kecamatan_domicile" value="{{ $user->kecamatan_domicile }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="city_domicile" class="form-label">Kota Domisili</label>
                                        <input type="text" class="form-control" id="city_domicile" name="city_domicile" value="{{ $user->city_domicile }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="province_domicile" class="form-label">Provinsi Domisili</label>
                                        <input type="text" class="form-control" id="province_domicile" name="province_domicile" value="{{ $user->province_domicile }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="domicile_postal_code" class="form-label">Kode Pos Domisili</label>
                                        <input type="text" class="form-control" id="domicile_postal_code" name="domicile_postal_code" value="{{ $user->domicile_postal_code }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mother_name" class="form-label">Nama Ibu</label>
                                        <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{ $user->mother_name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="heir_name_1" class="form-label">Nama Ahli Waris 1</label>
                                        <input type="text" class="form-control" id="heir_name_1" name="heir_name_1" value="{{ $user->heir_name_1 }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="heir_name_2" class="form-label">Nama Ahli Waris 2</label>
                                        <input type="text" class="form-control" id="heir_name_2" name="heir_name_2" value="{{ $user->heir_name_2 }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="heir_name_3" class="form-label">Nama Ahli Waris 3</label>
                                        <input type="text" class="form-control" id="heir_name_3" name="heir_name_3" value="{{ $user->heir_name_3 }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="gender" name="gender" value="{{ $user->gender }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="customer_type" class="form-label">Jenis Pelanggan</label>
                                        <input type="text" class="form-control" id="customer_type" name="customer_type" value="{{ $user->customer_type }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="member_type" class="form-label">Jenis Member</label>
                                        <input type="text" class="form-control" id="member_type" name="member_type" value="{{ $user->member_type }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="document_upload" class="form-label">Dokumen Unggahan</label>
                                        <input type="text" class="form-control" id="document_upload" name="document_upload" value="{{ $user->document_upload }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="branch" class="form-label">Cabang</label>
                                        <input type="text" class="form-control" id="branch" name="branch" value="{{ $user->branch }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="opening_date" class="form-label">Tanggal Pembukaan</label>
                                        <input type="date" class="form-control" id="opening_date" name="opening_date" value="{{ $user->opening_date }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="opening_purpose" class="form-label">Tujuan Pembukaan</label>
                                        <input type="text" class="form-control" id="opening_purpose" name="opening_purpose" value="{{ $user->opening_purpose }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="loan_category" class="form-label">Kategori Pinjaman</label>
                                        <input type="text" class="form-control" id="loan_category" name="loan_category" value="{{ $user->loan_category }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="monthly_income" class="form-label">Pendapatan Bulanan</label>
                                        <input type="text" class="form-control" id="monthly_income" name="monthly_income" value="{{ $user->monthly_income }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="officer" class="form-label">Petugas</label>
                                        <input type="text" class="form-control" id="officer" name="officer" value="{{ $user->officer }}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
