
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
                    <h2>Menambahkan Informasi Gereja</h2>
                </div>
            </div>
        </div>
        {!! Form::open(['url' => '/gereja/tambah']) !!}
        <div class="row">
            <div class="col-lg-12">
                <div class="add-listing-section">
                
                    <div class="add-listing-headline">
                        <h3><i class="sl sl-envelope-open"></i> Kontak</h3>
                    </div>
                    <div class="row with-forms">
                        <div class="col-md-6">
                            <h5>E-mail<i class="tip" data-tip-content="alamat email anda"></i></h5>
                            <?php echo Form::text('email'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="add-listing">
                    <!-- Section -->
                    <div class="add-listing-section">
                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> Informasi Gereja</h3>
                        </div>
                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>Kota <i class="tip" data-tip-content="kota dimana gereja bereda"></i></h5>
                                <?php echo Form::text('kota', null, ['id'=>'kota']); ?>
                            </div>
                        </div>
                        <!-- Title -->
                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>Nama Gereja <i class="tip" data-tip-content="nama gereja"></i></h5>
                                <?php echo Form::text('nama_gereja', null, ['id'=>'nama_gereja']); ?>
                            </div>
                        </div>
                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Status -->
                            <div class="col-md-6">
                                <h5>Dogma </h5>
                                <?php echo Form::select('tipe_gereja', $tipe_gerejas, null, ['placeholder' => '-- Pilih --']); ?>
                            </div>
                            <!-- Type -->
                        </div>
                        <div class="row with-forms">
                            <!-- Status -->
                            <div class="col-md-6">
                                <h5>Lokasi</h5>
                                <?php echo Form::text('alamat', null, ['class'=>'search-field','id'=>'us3-address']); ?>
                            </div>
                            <!-- Type -->
                        </div>
                        <div class="row with-forms">
                            <div class="col-md-12">
                                <div id="map" style="height: 400px;"></div>
                            </div>
                        </div>
                        {{-- <div class="row with-forms">
                            <div class="col-md-12">
                                <div id="us3" style="width: 550px; height: 400px;"></div>
                            </div>
                        </div> --}}
                        <div class="row-with-forms">
                            <div class="col-md-6">
    <!--                            <h5>latitude</h5>-->
                                <?php echo Form::hidden('latitude', null, ['id'=>'us3-lat']); ?>
    <!--                            <input type="text" class="search-field" id="us3-lat" />-->
                            </div>
                            <div class="col-md-6">
    <!--                            <h5>longitude</h5>-->
                                <?php echo Form::hidden('longitude', null, ['id'=>'us3-lon']); ?>
    <!--                            <input type="text" class="search-field" id="us3-lon" />-->
                            </div>
                        </div>
                        <!-- Row / End -->
                        <div class="row with-form">
                            <div class="col-md-12">
                                {{-- <a href="#" class="button preview">Preview <i class="fa fa-arrow-circle-right"></i></a> --}}
                                {!! Form::submit('Preview', ['class' => 'button preview']) !!}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Section / End -->

                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection

@section('support')
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDJhgUHr15-NnoWV3kFBNNnaLlo8_oCI7Q&amp;language=id&amp;libraries=places&callback=initMap" async defer></script>
<script>
    function initMap() {
        // Create a map object and specify the DOM element for display.
        var latlng = new google.maps.LatLng(-6.17511, 106.86503949999997);
        var map = new google.maps.Map(document.getElementById('map'), {
          center: latlng,
          zoom: 8
        });

        var input = document.getElementById('us3-address');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          document.getElementById('us3-lat').value = null;
          document.getElementById('us3-lon').value = null;
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          document.getElementById('us3-lat').value = place.geometry.location.lat();
          document.getElementById('us3-lon').value = place.geometry.location.lng();

          console.log('isi posisi : ', place);
          document.getElementById('nama_gereja').value = place.name;
          document.getElementById('kota').value = getCityName(place);
          //$('#nama_gereja').value = place.name;
          //$('#kota').value = getCityName(place);
          //getCityName(place);

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });
      }

      function getCityName(place) {
          let addComp = place.address_components;
          let city = {};
          for(i=0; i<addComp.length; i++) {
            var types = addComp[i].types
            var lv3 = types.find(o => {
                return o === 'administrative_area_level_3';
            });
            var lv2 = types.find(o => {
                return o === 'administrative_area_level_2';
            });
            if (typeof lv2 != 'undefined') city.lv2 = addComp[i];
            if (typeof lv3 != 'undefined') city.lv3 = addComp[i];
          }
          console.log('kota : ', city);
          return city.lv3.long_name + ', ' + city.lv2.long_name;
      }
</script>
@endsection