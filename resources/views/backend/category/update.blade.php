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
                        <form action="{{route('category.update', $data->id)}}" class="p-4" method="POST"  name="tambaData">
                        @csrf
                        @method('PUT')
                            <div class="row form-group">
                                <div class="col-lg-8">
                                    <label for="kategori">Kategori <span class="text-required"> * </span></label>
                                    <input type="text" name="kategori" id="kategori" value="{{old( 'kategori', $data->name_category)}} " class="input-lg form-control-lg form-control @error('kategori') is-invalid @enderror"  autofocus aria-describedby="helpId">
                                    <small id="helpId" class="text-muted ">Masukkan Tipe dengan benar</small>
                                    @if ($errors->has('kategori'))
                                        <span class="badge badge-danger">{{  $errors->first('kategori') }}</span>
                                    @endif
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <label for="tipe"> Tipe <span class="text-required">*</span> </label>
                                    <select name="tipe" id="tipe" class="form-select form-control" aria-label="Default select example">
                                        @foreach ( $type as $item )
                                            <option value="{{ $data->type_id == $item->id ? $data->type_id : $item->id }}" {{ $data->type_id == $item ->id ? 'selected' : '' }} > {{ $item->type }} </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('tipe'))
                                        <span class="badge badge-danger">{{  $errors->first('tipe') }}</span>
                                    @endif
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
