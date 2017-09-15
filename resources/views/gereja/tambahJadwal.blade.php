
<!--// be careful to include the parameter "libraries=places"-->
<!--<script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>-->
<script type="text/javascript" src="{{ URL::asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/transition.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/collapse.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datetimepicker.min.css') }}" >
<script src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>


@extends('layouts.main')

@section('title', 'GEMANA-NG')

@section('content')
    <div class="container">
        <!-- Titlebar -->
        <div id="titlebar">
            <div class="row">
                <div class="col-md-12">
                    <h2>Menambahkan Jadwal Gereja</h2>
                </div>
            </div>
        </div>
        {!! Form::open(['url' => '/gereja/jadwal/tambah', 'id'=>'formJadwal']) !!}
        
        <div class="row">
            <div class="col-lg-12">
                <div id="add-listing">
                    <!-- Section -->
                    <div class="add-listing-section">
                        <!-- Headline -->
                        <div class="add-listing-headline">
                            <h3><i class="sl sl-icon-doc"></i> Waktu Ibadah</h3>
                        </div>
                        <div class="row with-forms">
                            <div class="col-md-6">
                                <h5>Gereja <i class="tip" data-tip-content="kota dimana gereja bereda"></i></h5>
                                <?php echo Form::text('gereja', null, ['id'=>'gereja']); ?>
                                <?php echo Form::hidden('gereja_id', null, ['id'=>'gerejaId']); ?>
                            </div>
                        </div>
                        <div class="row with-forms">
                            <div class="col-md-3">
                                <h5>Jam Ibadah <i class="tip" data-tip-content="kota dimana gereja bereda"></i></h5>
                                <?php echo Form::text('jam_ibadah', null, ['class'=>'timepicker', 'id'=>'jamIbadah']); ?>
                                {{-- <button id="tambahJam">tambah</button> --}}
                            </div>
                            <div class="col-md-3">
                                <h5> <i></i></h5>
                                <button type="button" id="tambahJam" onclick="addJam()">tambah</button>
                            </div>
                        </div>
                        <div class="row with-forms">
                            <div class="col-md-3">
                                <table id="taab" class="table table-bordered">
                                    @foreach ($arrJam as $jam)
                                        <tr>
                                            <td>{{$jam}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class="row with-forms">
                            {!! Form::submit('Preview', ['class' => 'button preview']) !!}
                        </div>
                    </div>
                    
                    <!-- Section / End -->

                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
@endsection

<script type="text/javascript">
    var arrJam = JSON.parse('{!! json_encode($arrJam) !!}');
    $(function () {
        $('#jamIbadah').datetimepicker({
            format: 'LT'
        });
    });

    $(function() {
        $("#gereja").autocomplete({
            source: '{!! URL::route('autoCompleteGereja') !!}',
            minLength: 1,
            select: function( event, ui ) {
                var thisVm = this;
                $('#gerejaId').val(ui.item.id);
                //this.getJadwalGereja();
                $.get('/getJadwalGereja/' + $('#gerejaId').val(), function(data, status) {
                    setJadwalGereja(data, status);
                });
            }
        });
    });

    function setJadwalGereja(data, status) {
        if(status === 'success') {
            var tabRows = document.getElementById('taab');
            for(i=0; i<data.length; i++) {
                this.arrJam.push(data[i]);
                if(tabRows.rows.length > 0) {
                    $('#taab tr:last').after('<tr><td>'+data[i]+'</td></tr>');
                } else {
                    var tabcell = tabRows.insertRow();
                    var cell = tabcell.insertCell(0);
                    cell.innerHTML = data[i];
                }
            }
        }
        console.log('data : ', data);
        console.log('status : ', status);
    }

    function addJam() {
        //var tesJam = JSON.parse('{{ json_encode($arrJam) }}');
        let jam = $('#jamIbadah').val();
        let str = String(jam);
        this.arrJam.push(jam);
        console.log('isi jadwal : ', this.arrJam);
        
        $('#jamIbadah').val('');
        var tabRows = document.getElementById('taab');
        if(tabRows.rows.length > 0) {
            $('#taab tr:last').after('<tr><td>'+jam+'</td></tr>');
        } else {
            var tabcell = tabRows.insertRow();
            var cell = tabcell.insertCell(0);
            cell.innerHTML = jam;
        }

        /*var ls = document.getElementsByName('jadwalIbadah[]');
        if(ls !== null && ls.length > 0) {
            ls.item('input').remove();
        }*/
        
        $('#formJadwal').append('<input type="hidden" name="jadwalIbadah[]" value="' + jam + '" >');
        
    }
</script>