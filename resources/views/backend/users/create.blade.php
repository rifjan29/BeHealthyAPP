@extends('layouts.template')

{{-- Tambah Pengguna --}}
@section('content')
<x-breadcrumb
    :title="$title"
    :subtitle="$title"
    link="{{ route('dashboard')}}"
    :linkBaru="route($linkBaru)"
    :subtitleBaru="$subtitleBaru"/>

    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="{{ route('pengguna-admin.store') }}" class="p-4" method="POST" name="tambaData" enctype="multipart/form-data">
                            @csrf
                                <div class="row form-group">
                                    
                                    <div class="col-lg-8">
                                        <label for="name">Nama Lengkap <span class="text-required"> * </span></label>
                                        <input type="text" name="name" id="name" class="input-lg form-control-lg form-control @error('name') is-invalid @enderror"  aria-describedby="helpId" autofocus>
                                        <small id="helpId" class="text-muted" >Masukkan Nama Lengkap Anda</small>
                                        @if ($errors->has('name'))
                                            <span class="badge badge-danger">{{  $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-8 mt-4">
                                        <label for="username">Username <span class="text-required"> * </span></label>
                                        <input type="text" name="username" id="username" class="input-lg form-control-lg form-control @error('username') is-invalid @enderror"  aria-describedby="helpId" autofocus>
                                        <small id="helpId" class="text-muted" >Masukkan Nama Lengkap Anda</small>
                                        @if ($errors->has('username'))
                                            <span class="badge badge-danger">{{  $errors->first('username') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-8 mt-4">
                                        <label for="gender">Jenis Kelamin <span class="text-required"> * </span></label>
                                        <div class="form-check-inline form-check d-flex align-items-end">
                                            <div class="mr-3 customRadio d-flex">
                                                <input class="form-check-input" name="gender" type="radio" value="l" id="l">
                                                <label class="form-check-label align-self-center" style="font-size: 14px" for="l">Laki-Laki</label>
                                            </div>
                                            <input class="form-check-input" name="gender" type="radio" value="p" id="p">
                                            <label class="form-check-label" for="p"  style="font-size: 14px">Perempuan</label>
                                        </div>
                                        @if ($errors->has('gender'))
                                            <span class="badge badge-danger">{{  $errors->first('gender') }}</span>
                                         @endif
                                    </div>
                                    <div class="col-lg-6 mb-4 mt-4">
                                        <label for="password">Password <span class="text-required"> * </span></label>
                                        <input type="password" name="password" id="password" class="input-lg form-control-lg form-control @error('password') is-invalid @enderror" data-toggle="password" required autocomplete="current-password">
                                        <small id="helpId" class="text-muted" >Masukkan Password dengan benar</small>
                                        @if ($errors->has('password'))
                                            <span class="badge badge-danger">{{  $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 mb-4 mt-4">
                                        <label for="password_confirmation">Ulangi Password <span class="text-required"> * </span></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="input-lg form-control-lg form-control @error('password_confirmation') is-invalid @enderror" data-toggle="password" required autocomplete="current-password">
                                        <small id="helpId" class="text-muted" >Ulangi Password dengan benar</small>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="badge badge-danger">{{  $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="photos-preview h-100 rounded" style="background-color: #e5e5e5">
                                            <div class=" ">
                                                <img src="" class="img-fluid rounded d-flex align-items-center " id="photosPreview" alt="Foto Pengguna">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 mb-4">
                                        <label for="photos">Foto Profil <span class="text-required"> *  </span></label>
                                        <input type="file" id="photos" name="photos" class="form-control-file @error('photos') is-invalid @enderror" >
                                        <small id="helpId" class="text-muted "><span class="badge badge-primary">Ekstensi : JPG | JPEG | PNG</span> Masukkan Foto Profil dengan benar </small>
                                        @if ($errors->has('photos'))
                                            <span class="badge badge-danger">{{  $errors->first('photos') }}</span>
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