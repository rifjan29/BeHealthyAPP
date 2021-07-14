@extends('layouts.template')

{{-- content pengarang --}}
@section('content')
    <x-breadcrumb
    :title="$title"
    :subtitle="$title"
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
                            <a class="btn btn-primary tambah-data" href="{{ route('category.create') }}" role="button">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th class="w-50">Kategori</th>
                                        <th class="w-50">Tipe</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->name_category }} </td>
                                        <td> {{ $item->type->type }} </td>
                                        <td>
                                            <div class="btn-group button-group" role="group" aria-label="Basic example">
                                                {{-- <a href=" {{ route('authors.edit', 1) }} "> Edit</a> --}}
                                                <a class="btn btn-outline-link btn-sm button-edit" href=" {{ route('category.edit', $item->id) }} "  aria-current="page" > <i class="ti-settings"></i>&nbsp; Edit</a>
                                                <form action=" {{ route('category.destroy', $item->id) }} " method="POST" id="delete-{{$item->id}}" >@csrf @method('delete')</form>
                                                <button class="btn btn-outline-link btn-sm button-hapus" type="submit" onclick="deleteData({{$item->id}})"> <i class="ti-trash"></i>&nbsp; Hapus</button>
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
