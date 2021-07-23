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
                        <form action="{{ route('category.store') }}" class="p-4" method="POST" name="tambaData" enctype="multipart/form-data">
                        @csrf
                            <div class="row form-group">
                                <div class="col-lg-8 mb-4">
                                    <label for="kategori">Kategori <span class="text-required"> * </span></label>
                                    <input type="text" name="kategori" id="kategori" class="input-lg form-control-lg form-control @error('kategori') is-invalid @enderror"  aria-describedby="helpId" placeholder="Exp:Push Up" autofocus>
                                    @if ($errors->has('kategori'))
                                        <span class="badge badge-danger">{{  $errors->first('kategori') }}</span>
                                    @endif
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col-lg-8">
                                    <label for="tipe">Tipe<span class="text-required">*</span></label>
                                    <select name="tipe" id="tipe" class="form-control-lg form-control" style="font-size: 16px">
                                        <option value="0">Pilih Tipe</option>
                                        @foreach ($tipe as $items)
                                        <option value="{{ $items->id }}">{{ $items->type }}</option>
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
