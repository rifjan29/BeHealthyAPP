@extends('layouts.template')

{{-- tambah data --}}
@section('content')
<x-breadcrumb title="Tambah Data Narator" :subtitle="Tambah Data" link="route('dashboard')" :linkBaru="$linkBaru" :subtitleBaru="$subtitleBaru"/>

@endsection
