@extends('layouts.main')

@section('app-title', 'Profil Saya')
@inject('carbon', 'Carbon\Carbon')

@section('css-plugin')
<link rel="stylesheet" href="{{ asset('assets') }}/css/plugins/datepicker-bs5.min.css">
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
@endsection

@section('main-content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profil Saya</h4>
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nama:</strong></label>
                                    <p>{{ $user->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Email:</strong></label>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>No CIF:</strong></label>
                                    <p>{{ $user->no_cif }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>No ALT:</strong></label>
                                    <p>{{ $user->no_alt }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nama Member:</strong></label>
                                    <p>{{ $user->member_name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nomor Telepon:</strong></label>
                                    <p>{{ $user->phone_number }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Pekerjaan:</strong></label>
                                    <p>{{ $user->occupation }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Status CIF:</strong></label>
                                    <p>{{ $user->cif_status }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nomor KTP:</strong></label>
                                    <p>{{ $user->ktp_number }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nomor NPWP:</strong></label>
                                    <p>{{ $user->npwp_number }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Tempat Lahir:</strong></label>
                                    <p>{{ $user->birth_place }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Tanggal Lahir:</strong></label>
                                    <p>{{ $user->birth_date }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Agama:</strong></label>
                                    <p>{{ $user->religion }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Status Perkawinan:</strong></label>
                                    <p>{{ $user->marital_status }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Pendidikan:</strong></label>
                                    <p>{{ $user->education }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label"><strong>Suku:</strong></label>
                                    <p>{{ $user->ethnicity }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nama Panggilan:</strong></label>
                                    <p>{{ $user->nickname }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Usia:</strong></label>
                                    <p>{{ $user->age }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>RT KTP:</strong></label>
                                    <p>{{ $user->rt_ktp }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>RW KTP:</strong></label>
                                    <p>{{ $user->rw_ktp }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Kelurahan KTP:</strong></label>
                                    <p>{{ $user->kelurahan_ktp }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Kecamatan KTP:</strong></label>
                                    <p>{{ $user->kecamatan_ktp }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Kota KTP:</strong></label>
                                    <p>{{ $user->city_ktp }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Provinsi KTP:</strong></label>
                                    <p>{{ $user->province_ktp }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Alamat Domisili:</strong></label>
                                    <p>{{ $user->domicile_address }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Kelurahan Domisili:</strong></label>
                                    <p>{{ $user->kelurahan_domicile }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Kecamatan Domisili:</strong></label>
                                    <p>{{ $user->kecamatan_domicile }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Kota Domisili:</strong></label>
                                    <p>{{ $user->city_domicile }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Provinsi Domisili:</strong></label>
                                    <p>{{ $user->province_domicile }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Kode Pos Domisili:</strong></label>
                                    <p>{{ $user->domicile_postal_code }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nama Ibu:</strong></label>
                                    <p>{{ $user->mother_name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nama Ahli Waris 1:</strong></label>
                                    <p>{{ $user->heir_name_1 }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nama Ahli Waris 2:</strong></label>
                                    <p>{{ $user->heir_name_2 }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Nama Ahli Waris 3:</strong></label>
                                    <p>{{ $user->heir_name_3 }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Jenis Kelamin:</strong></label>
                                    <p>{{ $user->gender }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Alamat:</strong></label>
                                    <p>{{ $user->address }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Jenis Pelanggan:</strong></label>
                                    <p>{{ $user->customer_type }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Jenis Member:</strong></label>
                                    <p>{{ $user->member_type }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Dokumen Unggahan:</strong></label>
                                    <p>{{ $user->document_upload }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Cabang:</strong></label>
                                    <p>{{ $user->branch }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Tanggal Pembukaan:</strong></label>
                                    <p>{{ $user->opening_date }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Tujuan Pembukaan:</strong></label>
                                    <p>{{ $user->opening_purpose }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Kategori Pinjaman:</strong></label>
                                    <p>{{ $user->loan_category }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Pendapatan Bulanan:</strong></label>
                                    <p>{{ $user->monthly_income }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"><strong>Petugas:</strong></label>
                                    <p>{{ $user->officer }}</p>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js-plugin')
<script src="{{ asset('assets') }}/js/code.jquery.com_jquery-3.7.0.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/jquery.dataTables.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('assets') }}/js/plugins/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endsection
