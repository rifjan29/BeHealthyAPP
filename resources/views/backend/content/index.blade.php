@extends('layouts.template')

{{-- content pengarang --}}
@section('content')
    <x-breadcrumb
    :title="$title"
    subtitle="Data Konten"
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
                            <a class="btn btn-primary tambah-data" href="{{ route('content.create') }}" role="button">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-bordered">
                                <thead class="">
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th style="width: 20%">Cover</th>
                                        <th>Narator</th>
                                        <th>Kategori</th>
                                        <th>Deskripsi</th>
                                        <th style="width: 20%">File</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $items)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @switch($items->id_type)
                                                    @case(1)
                                                    <img src=" {{ asset('uploads/cover/olahraga/'.$items->cover) }} " class="img-fluid rounded" alt="">    
                                                        @break
                                                    @case(2)
                                                    <img src=" {{ asset('uploads/cover/yoga/'.$items->cover) }} " class="img-fluid rounded" alt="">    
                                                        @break
                                                    @case(3)
                                                    <img src=" {{ asset('uploads/cover/meditasi/'.$items->cover) }} " class="img-fluid rounded" alt="">    
                                                        @break
                                                    @default
                                                        
                                                @endswitch
                                            </td>
                                            <td>{{ $items->name_author }}</td>
                                            <td>{{ $items->name_category }} - <span class="text-muted">{{ $items->type }}</span></td>
                                            <td>{{ $items->desc }}</td>
                                            <td> 
                                                @switch($items->id_type)
                                                    @case(1)
                                                     <img src=" {{ asset('uploads/olahraga/'.$items->file) }} " class="img-fluid rounded" alt="">    
                                                        @break
                                                    @case(2)
                                                        {{ $items->link_youtube }}
                                                        @break
                                                    @case(3)
                                                        <audio controls>
                                                            <source src="{{ asset('uploads/meditasi/'.$items->file) }}" type="audio/mpeg">
                                                        </audio>
                                                    @break
                                                    @default
                                                        
                                                @endswitch
                                               </td>
                                            <td>
                                                @if ($items->status == 1)
                                                    <span class="badge bg-info p-2"> <a href="{{ route('change-status',[$items->id, $items->status]) }}" class="text-white">Dinonaktifkan</a></span>
                                                @else
                                                    <span class="badge bg-warning p-2"> <a href="{{ route('change-status',[$items->id, $items->status]) }}" class="text-white">Diaktifkan</a></span>
                                                    
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group button-group" role="group" aria-label="Basic example">
                                                    <a class="btn btn-outline-link btn-sm button-edit" href="{{ route('content.edit', $items->id) }}"  aria-current="page" > <i class="ti-settings"></i>&nbsp; Edit</a>
                                                    <form action="{{ route('content.destroy', $items->id) }}" method="POST" id="delete-{{ $items->id }}" >@csrf @method('delete')</form>
                                                    <button class="btn btn-outline-link btn-sm button-hapus" type="submit" onclick="deleteData({{ $items->id }})"> <i class="ti-trash"></i>&nbsp; Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                    
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
