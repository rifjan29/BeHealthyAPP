@extends('layouts.template')

{{-- content --}}
@section('content')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="ti-write"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">
                                         @if ($artikel > 0)
                                              {{$artikel}}  
                                         @else
                                             tidak ada data
                                         @endif
                                    </div>
                                    <div class="stat-heading">Artikel</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="ti-heart"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">
                                        @if ($content>0)
                                            {{$content}}
                                        @else
                                            tidak ada data
                                        @endif
                                        </div>
                                    <div class="stat-heading">Konten</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="ti-id-badge"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">
                                        @if ($authors>0)
                                        {{$authors}}
                                    @else
                                        tidak ada data
                                    @endif
                                </div>
                                    <div class="stat-heading">Authors</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="ti-list"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">
                                        @if ($type>0)
                                        {{$type}}
                                    @else
                                        tidak ada data
                                    @endif 
                                </div>       
                                    <div class="stat-heading">Tipe</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->


    </div>
    <!-- .animated -->
</div>
@endsection
