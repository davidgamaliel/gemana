
<!--// be careful to include the parameter "libraries=places"-->
<!--<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>-->


@extends('layouts.main')

@section('title', 'GEMANA-NG')

@section('content')
    <div class="container">
        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Semua Gereja</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                @foreach ($gerejas as $gereja)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ URL::route('gereja.detail', ['id'=>$gereja->id]) }}" class="listing-item-container compact">
                            <div class="listing-item">
                                <img src="{{ $gereja->getFirstImg() }}" alt="">

                                {{-- <div class="listing-badge now-open">Now Open</div> --}}

                                <div class="listing-item-content">
                                    {{-- <div class="numerical-rating" data-rating="3.5"></div> --}}
                                    <h3>{{ $gereja->nama }}</h3>
                                    <span>{{ $gereja->kota }}</span>
                                </div>
                                {{-- <span class="like-icon"></span> --}}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-12">
                {{ $gerejas->links() }}
            </div>
            {{-- <div class="col-lg-12">
                @foreach ($tes as $t)
                    <div class="col-lg-4 col-md-6">
                        {{ $t }}
                    </div>
                @endforeach
            </div> --}}
            
        </div>

    </div>
@endsection