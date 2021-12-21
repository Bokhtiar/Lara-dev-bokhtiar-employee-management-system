@extends('layouts.admin.app')
@section('title', 'Employee')
@section('admin_content')

@section('css')
<link href="{{ asset('backend') }}/assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('backend') }}/assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
<link href="{{ asset('backend') }}/assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
<!-- Theme Styles -->
@endsection
<x-notification></x-notification>
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">List of Employee Location</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Employee Attendace Table</h4>
                    </div>
                    <div class="panel-body">
                        <div class="content">
                                <div class="mapform" >
                                    <div id="map" style="height:500px; width: 100%;" class="my-3"></div>
                                    <script>
                                        let map;
                                        function initMap() {
                                            map = new google.maps.Map(document.getElementById("map"), {
                                                center: { lat: {{ $item->let }}, lng: {{ $item->lon }} },
                                                zoom: 8,
                                                scrollwheel: true,
                                            });
                                            const uluru = { lat:  {{ $item->let }}, lng: {{ $item->lon }} };
                                            let marker = new google.maps.Marker({
                                                position: uluru,
                                                map: map,
                                                draggable: true
                                            });
                                            google.maps.event.addListener(marker,'position_changed',
                                                function (){
                                                    let lat = marker.position.lat()
                                                    let lng = marker.position.lng()
                                                    $('#lat').val(lat)
                                                    $('#lng').val(lng)
                                                })
                                            google.maps.event.addListener(map,'click',
                                            function (event){
                                                pos = event.latLng
                                                marker.setPosition(pos)
                                            })
                                        }
                                    </script>
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
                                            type="text/javascript"></script>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- /Page Inner -->
@section('js')
    {{-- <script src="{{ asset('backend') }}/assets/plugins/datatables/js/jquery.datatables.min.js"></script>
    <script src="{{ asset('backend') }}/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="{{ asset('backend') }}/assets/js/pages/table-data.js"></script> --}}
@endsection

@endsection

