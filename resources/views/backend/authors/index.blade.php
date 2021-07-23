@extends('layouts.template')

{{-- content pengarang --}}
@section('content')
    <x-breadcrumb
    :title="$title"
    subtitle="Data Narator"
    link="{{route('dashboard')}}"
    :linkBaru="$linkBaru"
    :subtitleBaru="$subtitleBaru"/>

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pt-3">
                            <a class="btn btn-primary tambah-data" href="{{ route('authors.create') }}" role="button">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th class="w-59">Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Pekerjaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $items)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $items->name_author }} </td>
                                        <td>
                                            @if ($items->gender == 'l')
                                                {{ __('Laki-Laki') }}
                                            @elseif($items->gender == 'p')
                                                {{ __('Perempuan') }}
                                            @else
                                                {{ __('Maaf, Data Tidak Ditemukan') }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($items->jobs != null)
                                                {{ $items->jobs }}
                                            @else
                                                {{  __('Tidak ada pekerjaan') }}
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group button-group" role="group" aria-label="Basic example">
                                                {{-- <a href=" {{ route('authors.edit', 1) }} "> Edit</a> --}}
                                                <a class="btn btn-outline-link btn-sm button-edit" href=" {{ route('authors.edit', $items->id) }} "  aria-current="page" > <i class="ti-settings"></i>&nbsp; Edit</a>
                                                <form action=" {{ route('authors.destroy', $items->id) }} " method="POST" id="delete-{{$items->id}}" >@csrf @method('delete')</form>
                                                <button class="btn btn-outline-link btn-sm button-hapus" type="submit" onclick="deleteData({{$items->id}})"> <i class="ti-trash"></i>&nbsp; Hapus</button>
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
