@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="/">@lang("global.base_title")</a></li>
                    <li class="breadcrumb-item active">@lang("cruds.favorites.title")</li>
                </ol>
            </div>
            <h4 class="page-title">@lang("cruds.favorites.title")</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-xl-12">
        <div class="widget-rounded-circle card-box gradient-bg gradient-bg-1">
        </div>
    </div>
</div>
@endsection
@push('css')
    <!-- Flat Picker -->
    <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Jqplot chart -->
    <link href="{{ asset('assets/libs/jqplot/jquery.jqplot.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/jvectormap/jquery-jvectormap-2.0.2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/morris/morris.css') }}">
    <style>

    </style>
@endpush

@push('js')
        <!-- third party js -->

        <!-- Flat Picker -->
        <!-- https://cdnjs.com/libraries/flatpickr  Flatpickr js cnd library-->
        <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
        <script src="{{ asset('assets/libs/flatpickr/lang/pt.min.js') }}"></script>


        <!-- Flot chart -->
        <script src="{{ asset('assets/libs/flot-charts/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/libs/flot-charts/jquery.flot.tooltip.min.js') }}"></script>

        <!-- Jqplot chart -->
        <script src="{{ asset('assets/libs/jqplot/jquery.jqplot.js') }}"></script>
        <script src="{{ asset('assets/libs/jqplot/jqplot.cursor.js') }}"></script>
        <script src="{{ asset('assets/libs/jqplot/jqplot.highlighter.js') }}"></script>
        <script src="{{ asset('assets/libs/jqplot/jqplot.pieRenderer.js') }}"></script>
        <script src="{{ asset('assets/libs/jqplot/jqplot.donutRenderer.js') }}"></script>

        <script src="{{ asset('assets/libs/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('assets/libs/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('assets/libs/jvectormap/gdp-data.js') }}"></script>
        <script src="{{ asset('assets/libs/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script>
        <script src="{{ asset('assets/libs/jvectormap/jquery-jvectormap-uk-mill-en.js') }}"></script>
        <script src="{{ asset('assets/libs/jvectormap/jquery-jvectormap-us-il-chicago-mill-en.js') }}"></script>
        <script src="{{ asset('assets/libs/morris/morris.min.js') }}"></script>

        <!-- Apex chart -->
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>


        <!-- third party js ends -->

        <!-- Datatables init -->
        <script>
            $(document).ready(function(){

            });
        </script>
@endpush

