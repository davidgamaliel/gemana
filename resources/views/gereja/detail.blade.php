@extends('layouts.main')

@section('title', 'GEMANA-NG')

@section('content')	
	<div class="fs-container">
		<div class="fs-inner-container nu-content">
			<div class="fs-content">

			<section class="listings-container margin-top-30">
				<div class="row fs-listings">
					<div class="blog-post">
						<img class="post-img" src="{{ $gereja->getFirstImg() }}">
						<div class="post-content">
							<h3>{{ $gereja->nama }} </h3>
							<h4>{{ $gereja->kota }}</h4>

							{{ $gereja->lokasi }}

							<h4>Jadwal Ibadah : </h4>
							<ul class="post-meta">
								@foreach($jadwal as $j)
									<li>{{ $j->jam_ibadah  }}</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</section>

			</div>
		</div>
		<div class="fs-inner-container nu-map-fixed">
			<div id="map-container">
			    <div id="map" data-map-zoom="15" data-map-scroll="true">
			        <!-- map goes here -->
			    </div>
			</div>
		</div>
	</div>
@endsection	

@section('footer')
@endsection

@section('support')
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDJhgUHr15-NnoWV3kFBNNnaLlo8_oCI7Q&amp;language=id&amp;libraries=places&callback=initMap" async defer></script>
<script>
    function initMap() {
        // Create a map object and specify the DOM element for display.
        var nama = {!! json_encode($gereja->nama) !!};
        var kota = {!! json_encode($gereja->kota) !!};
        var latlng = new google.maps.LatLng({{ $gereja->latitude }}, {{ $gereja->longitude }});
        var map = new google.maps.Map(document.getElementById('map'), {
          center: latlng,
          zoom: 15
        });
        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        marker.setIcon(/** @type {google.maps.Icon} */({
          url: {!! json_encode(URL::asset('images/icon.png')) !!},
          size: new google.maps.Size(71, 71),
          origin: new google.maps.Point(0, 0),
          anchor: new google.maps.Point(17, 34),
          scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(latlng);
        marker.setVisible(true);

        infowindow.setContent('<div><strong>' + nama + '</strong><br>' + kota);
        infowindow.open(map, marker);
      }
</script>
@endsection

<style>
.fs-inner-container.nu-map-fixed {
  height: 100vh;
  position: fixed;
}

.fs-inner-container.nu-content {
  width: 55%;
  background-color: #f7f7f7;
  z-index: 995;
  box-shadow: 0px 0px 12px 0px rgba(0,0,0,0.12);
  position: relative;
}
</style>