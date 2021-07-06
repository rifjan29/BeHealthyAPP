<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1> {{ $title }} </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{$link}}">Dashboard</a></li>
                            {{-- @if (isset($linkBaru) && isset($subtitleBaru)) --}}
                            {{-- @endif --}}
                            @if (isset($linkBaru) && isset($subtitleBaru))
                                <li><a href="{{ $linkBaru }}">{{$subtitleBaru}}</a></li>
                            @else
                            @endif
                            <li class="active">{{$subtitle}} </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>