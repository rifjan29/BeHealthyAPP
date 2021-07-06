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
                        <form action=" {{ isset($data) ? route('authors.update', $data->id) : route('authors.store') }} " class="p-4" method="POST" onforminput="return(validate());" name="tambaData">
                        @csrf
                        {!! isset($data) ? method_field('PUT') : '' !!}
                            <div class="row form-group">
                                <div class="col-lg-8">
                                    <label for="name">Nama Lengkap <span class="text-required"> * </span></label>
                                    <input type="text" name="name" id="name" value=" {{ isset($data) ?  old( 'name', $data->name_author) : '' }} " class="input-lg form-control-lg form-control @error('name') is-invalid @enderror"  {{ isset($data) ? '' : 'autofocus'}}  aria-describedby="helpId">
                                    <small id="helpId" class="text-muted ">Masukkan nama lengkap dengan benar</small>
                                    @if ($errors->has('name'))
                                        <span class="badge badge-danger">{{  $errors->first('name') }}</span>
                                    @endif
                                    {{-- @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col-lg-8">
                                    <label for="kategori"></label>
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <label for="pekerjaan">Pekerjaan (Opsional) </label>
                                    <input type="text" name="jobs" id="jobs" value=" {{ isset($data) ? old('jobs', $data->jobs) : '' }} " class="input-lg form-control-lg form-control" {{ isset($data) ? 'autofocus' : '' }}  aria-describedby="helpId" >
                                    <small id="helpId" class="text-muted">Masukkan pekerjaan dengan benar dan boleh dikosongin</small>
                                    @if ($errors->has('jobs'))
                                         <span class="badge badge-danger">{{  $errors->first('jobs') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-8 mt-4">
                                    <label for="gender">Jenis Kelamin <span class="text-required"> * </span></label>
                                    <div class="form-check-inline form-check d-flex align-items-end">
                                        @if (isset($data))
                                            <div class="mr-3">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <input class="form-check-input" name="gender" type="radio" value="l" id="flexCheckDefault1" {{ $data->gender == "l" ? 'checked' : ''}} >Laki-Laki
                                                </label>
                                            </div>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <input class="form-check-input" name="gender" type="radio" value="p" id="flexCheckDefault1" {{ $data->gender == "p" ? 'checked' : ''}} >Perempuan
                                            </label>
                                        @else
                                            <div class="mr-3">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    <input class="form-check-input" name="gender" type="radio" value="l" id="flexCheckDefault1">Laki-Laki
                                                </label>
                                            </div>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <input class="form-check-input" name="gender" type="radio" value="p" id="flexCheckDefault1">Perempuan
                                            </label>
                                        @endif
                                    </div>
                                    @if ($errors->has('gender'))
                                        <span class="badge badge-danger"> {{ $errors->first('gender') }} </span>
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
