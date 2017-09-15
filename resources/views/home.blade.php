@extends('layouts.main')

@section('title', 'GEMANA-NG')

@section('content')
	@if(Session::has('success'))
        <div class="alert alert-success" role="alert">
        	<div style="text-align: center">
	            {{ Session::get('success') }}
	        </div>
        </div>
    @elseif(Session::has('failed'))
        <div class="alert alert-danger" role="alert">
        	<div style="text-align: center">
	            {{ Session::get('failed') }}
	        </div>
        </div>
    @endif
{{-- 
    <div class="main-search-container" id="initFront">
	    <div class="main-search-inner">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                    <h2>Mencari Informasi Gereja</h2>
	                    <h4>daerah baru tidak jadi penghalang bagi anda untuk beribadah</h4>
	                    <div class="main-search-input">
	                        <div class="main-search-input-item ">
	                            <input type="text" name="", placeholder="Cari informasi gereja berdasarkan kota">
	                        </div>
	                        <button class="button" name="cari">Cari</button>
	                    </div>
	                </div>
	            </div>
	        </div>

	    </div>
	</div>

	<section class="fullwidth margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f8f8f8">
	    <div class="container">
	        <div class="row">
	            <div class="col-md-12">
	                <h3 class="headline centered margin-bottom-45">
	                    Halaman informasi Gereja
	                    <span>yang sering dilihat pada situs ini</span>
	                </h3>
	            </div>
	            <div class="col-md-12">
	                <div class="simple-slick-carousel dots-nav">

	                </div>
	            </div>
	        </div>
	    </div>
	</section>
 --}}

	<!-- Info Section -->
	<div class="container">

	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <h2 class="headline centered margin-top-80">
	                Informasi gereja akan terus berkembang
	                <span class="margin-top-25">saat ini kami mengumpulkan sendiri informasi gereja. Anda juga dapat turut serta dalam menambahkan informasi tersebut</span>
	            </h2>
	        </div>
	    </div>
	    <div class="row icons-container centered">
	    	<div class="col-md-2"></div>
	        <div class="col-md-4">
	            <div class="icon-box-2">
	                <a href="{{ URL::route('gereja.tambah') }}" class="button">Menambahkan Informasi Gereja</a>
	                <h3></h3>
	                <p></p>
	            </div>
	        </div>
	        <div class="col-md-4">
	            <div class="icon-box-2">
	                <a href="{{ URL::route('gereja.jadwal.tambah') }}" class="button">Menambahkan Informasi Waktu Ibadah</a>
	                <h3></h3>
	                <p></p>
	            </div>
	        </div>
	        <div class="col-md-2"></div>
	    </div>
	</div>
	<!-- Info Section / End -->
@endsection

<style>
	#initFront {
		background-image: url("images/back.png");
	}
</style>