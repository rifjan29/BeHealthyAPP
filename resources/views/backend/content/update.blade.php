@extends('layouts.template')

{{-- tambah data --}}
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
                        <form action="{{ route('content.update', $data->id) }}" class="p-4" method="POST" name="tambaData" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row form-group">
                                <div class="col-md-4 mb-4">
                                    <div class="photos-preview h-100 rounded" style="background-color: #e5e5e5">
                                        <div class=" ">
                                            @switch($data->id_type)
                                                @case(1)
                                                    <img src="{{ asset('uploads/cover/olahraga/'.$data->cover) }}" class="img-fluid rounded d-flex align-items-center " id="photosPreview" alt="Foto Pengguna">
                                                    @break
                                                @case(2)
                                                    <img src="{{ asset('uploads/cover/yoga/'.$data->cover) }}" class="img-fluid rounded d-flex align-items-center " id="photosPreview" alt="Foto Pengguna">
                                                    @break
                                                @case(3)
                                                    <img src="{{ asset('uploads/cover/meditasi/'.$data->cover) }}" class="img-fluid rounded d-flex align-items-center " id="photosPreview" alt="Foto Pengguna">
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 mb-4">
                                    <label for="cover">Cover<span class="text-required"> * </span></label>
                                    <input type="file" id="photos" name="cover" class="form-control-file @error('cover') is-invalid @enderror" >
                                    <small id="helpId" class="text-muted "><span class="badge badge-primary">Ekstensi : JPG | JPEG | PNG</span> Masukkan Foto Profil dengan benar </small>
                                    @if ($errors->has('cover'))
                                        <span class="badge badge-danger">{{  $errors->first('cover') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-8 mb-4">
                                    <label for="category">Kategori<span class="text-required">*</span></label>
                                    <select name="category" data-style="btn-info" id="category" class="form-control-lg form-control selectpicker" data-live-search="true" style="font-size: 16px" title="Pilih Kategori" >
                                        @foreach ($category as $items)
                                            <option value="{{ $items->id }} - {{ $items->id_type }}" {{ $data->category_id == $items->id ? 'selected' : '' }}>{{ $items->name_category }} -  <h1 style="font-weight: bold">{{ $items->type }}</h1></option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="badge badge-danger">{{  $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-8 mb-4">
                                    <label for="narator">Narator<span class="text-required">*</span></label>
                                    <select name="narator" data-style="btn-info" id="narator" class="form-control-lg form-control selectpicker" data-live-search="true" style="font-size: 16px" title="Pilih Narator">
                                        @foreach ($authors as $items)
                                        <option value="{{ $items->id }}" {{ $data->authors_id == $items->id ? 'selected' : '' }}>{{ $items->name_author }}</h1></option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('narator'))
                                        <span class="badge badge-danger">{{  $errors->first('narator') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-8">
                                    <label for="youtube">Link Youtube<span class="text-required text_small"> (Yoga)</span></label>
                                    <input type="text" name="youtube" id="youtube"  value="{{ old('youtube', $data->link_youtube) }}" class="input-lg form-control-lg form-control @error('youtube') is-invalid @enderror" aria-describedby="helpId"  {{ $data->id_type != 3 ? 'disabled' : '' }}>
                                    <small id="helpId" class="text-muted ">Masukkan nama lengkap dengan benar</small>
                                    @if ($errors->has('youtube'))
                                        <span class="badge badge-danger">{{  $errors->first('youtube') }}</span>
                                    @endif
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <label for="file">File<span class="text-required"> *  </span></label>
                                    <input type="file" id="file" name="file" class="form-control-file @error('file') is-invalid @enderror" >
                                    <small id="helpId" class="text-muted "><span class="badge badge-primary">Ekstensi : MP3 | GIF</span> Masukkan jika kategori olahraga atau meditasi </small>
                                    @if ($errors->has('file'))
                                        <span class="badge badge-danger">{{  $errors->first('file') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <label for="deskripsi">Deskripsi<span class="text-required text_small">*</span></label>
                                    <textarea name="deskripsi" class="input-lg form-control-lg form-control @error('name') is-invalid @enderror" id="deskripsi" cols="4" rows="4" style="font-size: 16px">{{ old('deskripsi', $data->desc) }}</textarea>
                                    <small id="helpId" class="text-muted ">Masukkan Deskripsi konten dengan benar</small>
                                    @if ($errors->has('deskripsi'))
                                        <span class="badge badge-danger">{{  $errors->first('deskripsi') }}</span>
                                    @endif
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
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
