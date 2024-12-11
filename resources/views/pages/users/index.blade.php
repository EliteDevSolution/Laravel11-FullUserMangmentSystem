@extends('layouts.app')
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">
                            {{ __('global.dashboard.title') }}
                        </a>
                    </li>
                    <li class="breadcrumb-item active">{{ __('cruds.user.title') }}</li>
                </ol>
            </div>
            <h4 class="page-title">{{ __('cruds.user.title') }}</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card card-box-shadow">
            <div class="card-body">
                <a class="btn btn-outline-info waves-effect waves-light btn-rounded mb-3" href="{{ route('users.create')}}">
                   <i class="fe-plus"></i> {{ __('global.add') }} {{ __('cruds.user.title_singular') }}
                </a>
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{session('success')}}
                    </div>
                @endif
                <table id="datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th>
                                {{ __('cruds.user.fields.id') }}
                            <th>
                                {{ __('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.roles') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.level') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.status') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.created_at') }}
                            </th>
                            <th>
                                #
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                {{ __('cruds.user.fields.id') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.name') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.email') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.roles') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.level') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.status') }}
                            </th>
                            <th>
                                {{ __('cruds.user.fields.created_at') }}
                            </th>
                            <th>
                                #
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
    <!-- third party css -->
    <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables/fixedheader/css/fixedHeader.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- third party css end -->
    <style>
        div.blockPage {
            top: 29% !important;
        }
        .dataTables_scrollBody
        {
            min-height: 35px;
            max-height: 550px;
        }

        td, tr, th {
            vertical-align: middle !important;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 30ch;
        }
        h5 {
            margin-top: -5px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 0px;
            line-height: 15px;
        }

        div.blockMsg
        {
            left: 40% !important;
        }

    </style>
@endpush

@push('js')
    <!-- third party js -->
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/moment/moment-timezone-with-data.min.js') }}"></script>

    <!-- third party js ends -->
    <script>
        let userTable;
        let tableRows = [];
        $(document).ready(function(){
            userTable = $('#datatable').DataTable({
                responsive: false,
                stateSave: true,
                stateDuration: 60 * 60 * 24 * 60 * 60,
                serverSide: true,
                autoWidth: true,
                scrollCollapse: true,
                scrollX: true,
                bProcessing: true,
                lengthMenu: [
                    [ 10, 50, 100, 500, 1000],
                    [ '10', '50', '100', '500', '1000' ]
                ],
                columnDefs: [
                    { "width": "1%", "targets": 0 },
                    { "width": "10%", "targets": 1 },
                    { "width": "1%", "targets": 5 }
                ],
                pageLength: 50,
                ajax: {
                    url: '{{ route("users.datatable") }}',
                },
                fixedHeader: { headerOffset: 70, header:true, footer: true},
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only"></span>',
                    paginate: {
                        previous: "<i class='mdi mdi-chevron-left'>",
                        next: "<i class='mdi mdi-chevron-right'>"
                    },
                    info: "{{ __('global.datatables.showing') }} _START_ {{ __('global.datatables.to') }} _END_ {{ __('global.datatables.of') }} _TOTAL_ {{ __('global.datatables.entries') }}",
                    search: "{{ __('global.search') }}",
                    lengthMenu:"&nbsp; _MENU_ {{ __('global.datatables.entries') }}",
                    zeroRecords:    "{{ __('global.datatables.zero_records') }}"
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'nome', name: 'nome'},
                    { data: 'email', name: 'email' },
                    { data: 'role', name: 'role', orderable: false },
                    { data: 'level', name: 'level', orderable: false },
                    { data: 'status', name: 'status'},
                    { data: 'created_at', name: 'created_at'},
                    { data: 'action', name: 'action', orderable: false},
                ],
                stateLoadParams: function (settings, data) {
                    data.checkboxes = [];
                    data.start = 0;
                },
                rowCallback: function (row, rowData, index) {
                    if (rowData.created_at)
                    {
                        $('td:eq(6)', row).text(moment(rowData.created_at).tz("{{ config('app.timezone') }}").format('MMM DD, YYYY H:mm'));
                    }
                },
                stateSaveParams: function (settings, data) {
                    data.checkboxes = [];
                    data.start = 0;
                },
                drawCallback: function(settings) {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
                },
                order: [[ 0, "asc" ]],
            });

            $.fn.dataTable.ext.errMode = 'none';

            $(".dataTables_filter input")
                .unbind() // Unbind previous default bindings
                .bind("keydown", function(e) { // Bind our desired behavior
                    // If the length is 3 or more characters, or the user pressed ENTER, search
                    if(e.keyCode == 13 && this.value != "") {
                        // Call the API search function
                        userTable.search(this.value).draw();
                    }
                    return true;
            });

            $(".dataTables_filter input").on('input', function(e)
            {
                if(this.value == "") {
                    userTable.search("").draw();
                }
                return true;
            });
        });
    </script>
@endpush