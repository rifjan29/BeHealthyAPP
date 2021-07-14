@extends('layouts.template')

@section('content')
    <x-breadcrumb
    :title="$title"
    :subtitle="$title"
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
                            <strong>Data {{ $title }}</strong>
                            <span class="text-muted">Data Tipe hanya dapat di edit oleh admin</span>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th class="">Tipe</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->type }} </td>
                                        <td>
                                            <div class="btn-group button-group" role="group" aria-label="Basic example">
                                                {{-- <a href=" {{ route('authors.edit', 1) }} "> Edit</a> --}}
                                                <a class="btn btn-outline-link btn-sm button-edit" href=" {{ route('type.edit', $item->id) }} "  aria-current="page" > <i class="ti-settings"></i>&nbsp; Edit</a>
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
