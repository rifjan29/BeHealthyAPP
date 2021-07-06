@extends('layouts.template')

@section('content')
    <x-breadcrumb
    title="{{ $title }} "
    subtitle=" {{ $title }} "
    link="{{route('dashboard')}}"
    :linkBaru="$linkBaru"
    :subtitleBaru="$subtitleBaru"
    />

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header pt-3">
                            <a class="btn btn-primary tambah-data" href="{{ route('article.create') }}" role="button">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th class="">Cover</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Admin</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td style="width: 200px"><img src=" {{ asset('uploads/article/cover/'.$item->cover) }} " class="img-fluid rounded" alt=""> </td>
                                        <td style="width: 200px"> {{ $item->title }} </td>
                                        <td style="width: 200px"> {!! $item->desc !!} </td>
                                        <td> {{ $item->user->name }} </td>
                                        <td> {{ date('d M Y', strtotime($item->created_at)) }} </td>
                                        <td>
                                            <div class="btn-group button-group" role="group" aria-label="Basic example">
                                                {{-- <a href=" {{ route('authors.edit', 1) }} "> Edit</a> --}}
                                                <a class="btn btn-outline-link btn-sm button-edit" href=" {{ route('article.edit', $item->id) }} "  aria-current="page" > <i class="ti-settings"></i>&nbsp; Edit</a>
                                                <form action="  " method="POST" id="delete-" >@csrf @method('delete')</form>
                                                <button class="btn btn-outline-link btn-sm button-hapus" type="submit" onclick="deleteData()"> <i class="ti-trash"></i>&nbsp; Hapus</button>
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
