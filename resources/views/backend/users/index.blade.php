@extends('layouts.template')

{{-- Pengguna Admin --}}
@section('content')
<x-breadcrumb
:title="$title"
:subtitle="$title"
link="{{ route('dashboard')}}"
:linkBaru="$linkBaru"
:subtitleBaru="$subtitleBaru"/>

{{-- Tampilan Admin --}}
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pt-3">
                        <a class="btn btn-primary tambah-data" href="{{ route('pengguna-admin.create') }}" role="button">Tambah Data</a>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-bordered">
                            <thead class="">
                                <tr>
                                    <th style="width: 20px">#</th>
                                    <th class="">Foto Profil</th>
                                    <th>Nama Lengkap</th>
                                    <th>Username</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td style="width: 200px"><img src=" {{ asset($item->photos != null ?  'uploads/profile/'.$item->photos : 'uploads/profile/avatar-icon.jpg') }} " class="img-fluid rounded" alt=""> </td>
                                    <td style="width: 200px"> {{ $item->name }} </td>
                                    <td style="width: 200px"> {{  $item->username  }} </td>
                                    <td> {{ $item->gender != 'L' ? 'Perempuan' : 'Laki-Laki' }} </td>
                                    <td>
                                        <div class="btn-group button-group" role="group" aria-label="Basic example">
                                            <a class="btn btn-outline-link btn-sm button-edit" href="{{ route('pengguna-admin.edit', $item->id) }}" {{ Session::get('id') == $item->id ? '' : 'disabled' }}  aria-current="page" > <i class="ti-settings"></i>&nbsp; Edit</a>
                                            <form action=" {{ route('pengguna-admin.destroy', $item->id) }} " method="POST" id="delete-{{ $item->id }}" >@csrf @method('delete')</form>
                                            <button class="btn btn-outline-link btn-sm button-hapus" type="submit" onclick="deleteData({{ $item->id }})"> <i class="ti-trash"></i>&nbsp; Hapus</button>
                                        </div>
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
    <!-- .animated -->
</div>
@endsection