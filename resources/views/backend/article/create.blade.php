@extends('layouts.template')

@section('content')
<x-breadcrumb
    :title="$title"
    :subtitle="$title"
    link="{{route('dashboard')}}"
    :linkBaru="route($linkBaru)"
    :subtitleBaru="$subtitleBaru"/>
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="{{ route('article.store') }}" class="p-4" method="POST" name="tambaData" enctype="multipart/form-data">
                        @csrf
                            <div class="row form-group">
                                <div class="col-lg-8 mb-4">
                                    <label for="cover_artikel">Cover <span class="text-required"> *  </span></label>
                                    <input type="file" id="cover_artikel" name="cover_artikel" class="form-control-file @error('cover_artikel') is-invalid @enderror" >
                                    <small id="helpId" class="text-muted "><span class="badge badge-primary">Ekstensi : JPG | JPEG | PNG</span> Masukkan Gambar artikel dengan benar </small>
                                    {{-- @if ($errors->has('name'))
                                        <span class="badge badge-danger">{{  $errors->first('name') }}</span>
                                    @endif --}}
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col-lg-8">
                                    <label for="title">Judul <span class="text-required"> * </span></label>
                                    <input type="text" name="title" id="title" class="input-lg form-control-lg form-control @error('name') is-invalid @enderror"  aria-describedby="helpId" autofocus>
                                    <small id="helpId" class="text-muted" >Masukkan judul artikel dengan benar</small>
                                    {{-- @if ($errors->has('name'))
                                        <span class="badge badge-danger">{{  $errors->first('name') }}</span>
                                    @endif --}}
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="userId" id="userId" value="{{ Auth::user()->id }}" class="input-lg form-control-lg form-control" hidden >
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <label for="deskripsi">Deskripsi <span class="text-required"> * </span></label>
                                    <textarea id="summernote" name="deskripsi" class="form-control @error('name') is-invalid @enderror"></textarea>
                                </div>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="ti-save pr-1"></i> Simpan </button>
                        <button type="reset" class="btn btn-outline-danger pr-4"><i class="fa fa-ban"></i> Batal </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .animated -->
</div>
@endsection
