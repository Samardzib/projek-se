@extends('layouts.main')

@section('app-title', 'Daftar Pengguna')

@section('css-plugin')
<link rel="stylesheet" href="{{ asset('assets') }}/css/plugins/datepicker-bs5.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/2.0.7/css/dataTables.dataTables.min.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

@section('main-content')
<section class="pc-container">
    <div class="pc-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Pengguna</h4>
                        <a href="{{ route('users.create') }}" class="btn btn-primary float-end">Tambah Pengguna</a>
                        <a href="{{ route('users.export') }}" class="btn btn-success float-end me-2">Ekspor Excel</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="usersTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>No CIF</th>
                                        <th>No ALT</th>
                                        <th>Nama Member</th>
                                        <th>Nomor Telepon</th>
                                        <th>Pekerjaan</th>
                                        <th>Status CIF</th>
                                        <th>Nomor KTP</th>
                                        <th>Nomor NPWP</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Status Perkawinan</th>
                                        <th>Pendidikan</th>
                                        <th>Suku</th>
                                        <th>Nama Panggilan</th>
                                        <th>Usia</th>
                                        <th>RT KTP</th>
                                        <th>RW KTP</th>
                                        <th>Kelurahan KTP</th>
                                        <th>Kecamatan KTP</th>
                                        <th>Kota KTP</th>
                                        <th>Provinsi KTP</th>
                                        <th>Alamat Domisili</th>
                                        <th>Kelurahan Domisili</th>
                                        <th>Kecamatan Domisili</th>
                                        <th>Kota Domisili</th>
                                        <th>Provinsi Domisili</th>
                                        <th>Kode Pos Domisili</th>
                                        <th>Nama Ibu</th>
                                        <th>Nama Ahli Waris 1</th>
                                        <th>Nama Ahli Waris 2</th>
                                        <th>Nama Ahli Waris 3</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Jenis Pelanggan</th>
                                        <th>Jenis Member</th>
                                        <th>Dokumen Unggahan</th>
                                        <th>Cabang</th>
                                        <th>Tanggal Pembukaan</th>
                                        <th>Tujuan Pembukaan</th>
                                        <th>Kategori Pinjaman</th>
                                        <th>Pendapatan Bulanan</th>
                                        <th>Petugas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            
                                            @if ($user->role_id == 1)
                                                 <span class="badge bg-primary">Admin</span>
                                            @else
                                            <span class="badge bg-success">Anggota</span>
                                            @endif</td>
                                        <td>{{ $user->no_cif }}</td>
                                        <td>{{ $user->no_alt }}</td>
                                        <td>{{ $user->member_name }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td>{{ $user->occupation }}</td>
                                        <td>{{ $user->cif_status }}</td>
                                        <td>{{ $user->ktp_number }}</td>
                                        <td>{{ $user->npwp_number }}</td>
                                        <td>{{ $user->birth_place }}</td>
                                        <td>{{ $user->birth_date }}</td>
                                        <td>{{ $user->religion }}</td>
                                        <td>{{ $user->marital_status }}</td>
                                        <td>{{ $user->education }}</td>
                                        <td>{{ $user->ethnicity }}</td>
                                        <td>{{ $user->nickname }}</td>
                                        <td>{{ $user->age }}</td>
                                        <td>{{ $user->rt_ktp }}</td>
                                        <td>{{ $user->rw_ktp }}</td>
                                        <td>{{ $user->kelurahan_ktp }}</td>
                                        <td>{{ $user->kecamatan_ktp }}</td>
                                        <td>{{ $user->city_ktp }}</td>
                                        <td>{{ $user->province_ktp }}</td>
                                        <td>{{ $user->domicile_address }}</td>
                                        <td>{{ $user->kelurahan_domicile }}</td>
                                        <td>{{ $user->kecamatan_domicile }}</td>
                                        <td>{{ $user->city_domicile }}</td>
                                        <td>{{ $user->province_domicile }}</td>
                                        <td>{{ $user->domicile_postal_code }}</td>
                                        <td>{{ $user->mother_name }}</td>
                                        <td>{{ $user->heir_name_1 }}</td>
                                        <td>{{ $user->heir_name_2 }}</td>
                                        <td>{{ $user->heir_name_3 }}</td>
                                        <td>{{ $user->gender }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->customer_type }}</td>
                                        <td>{{ $user->member_type }}</td>
                                        <td>{{ $user->document_upload }}</td>
                                        <td>{{ $user->branch }}</td>
                                        <td>{{ $user->opening_date }}</td>
                                        <td>{{ $user->opening_purpose }}</td>
                                        <td>{{ $user->loan_category }}</td>
                                        <td>{{ $user->monthly_income }}</td>
                                        <td>{{ $user->officer }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" class="btn btn-danger delete-button" data-id="{{ $user->id }}">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#usersTable').DataTable();

    $('.delete-button').on('click', function() {
        var userId = $(this).data('id');
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form-' + userId).submit();
            }
        });
    });
});
</script>
@endsection
