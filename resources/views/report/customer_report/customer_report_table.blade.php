@extends('layouts.report_app')
@section('title','Menu')

@push('css')

 

<link rel="stylesheet" href="{{ asset('public/backend/assets/css/datagrid/datatables/datatables.bundle.css') }}">

@endpush
@section('content')
<!-- BEGIN Page Content -->
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item">Report</li>
            <li class="breadcrumb-item active">Customer Report</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>

   <div class="subheader">
        <h1 class="subheader-title">            
            <i class='subheader-icon fal fa-table'></i>Customer Report
            
            
        </h1>
    </div>

        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <!-- data table -->
                 <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Customer Report 
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            
                                            <!-- datatable start -->
                                            <table id="dt-basic-example" class="table table-bordered table-hover table-striped table-sm w-100">
                                                <thead class="bg-primary-600">
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Customer name</th>
                                                        <th>Phone No</th>
                                                        <th>Father's name</th>
                                                        <th>Mother's  name</th>
                                                        <th>Date of Birth</th>
                                                        <th>National ID</th>
                                                        <th>Branch Name</th>
                                                        <th>Occupation</th>
                                                        <th>Gender</th>
                                                        <th>Merital Status</th>
                                                        <th>Permanent District</th>
                                                        <th>Permanent Address</th>
                                                        <th>Present District</th>
                                                        <th>Present Address</th>
                                                        <th>Religion</th>
                                                        <th>Income Permonth</th>
                                                        <th>Net Worth</th>
                                                        <th>Place of Birth District</th>
                                                        <th>Source Of Fund</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                    $sl=1;
                                                    @endphp
                                                    @foreach($users as $user)
                                                    <tr>

                                                        <td>{{ $sl++ }}</td>
                                                        <td>{{$user->customer}}</td>
                                                        <td>{{$user->pre_mobilno}}</td>
                                                        <td>{{$user->fathers_title}}</td>
                                                        <td>{{$user->mothers_title}}</td>
                                                        <td>{{$user->date_of_birth}}</td>
                                                        
                                                        <td>{{$user->National_id}}</td>
                                                        <td>{{$user->branch_code}}</td>
                                                        <td>{{$user->occp_name}}</td>
                                                        <td>{{$user->sex}}</td>
                                                        <td>{{$user->marital_Code}}</td>
                                                        <td>{{$user->permanent_district}}</td>
                                                        <td>{{$user->Per_add}}</td>
                                                        <td>{{$user->present_district}}</td>
                                                       
                                                        <td>{{$user->pre_city}}</td> <!-- present address -->
                                                        <td>{{$user->religion}}</td>
                                                        <td>{{$user->income_permonth}}</td>
                                                        <td>{{$user->net_worth}}</td>
                                                        <td>{{$user->dob_dist}}</td>
                                                        <td>{{$user->source_fund}}</td>

                                                       
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- datatable end -->
                                        </div>
                                    </div>
                                </div>

                <!-- data table -->
            </div>

        </div>
    </main>
@endsection

@push('js')

 <script src="{{ asset('public/backend/assets/js/datagrid/datatables/datatables.bundle.js') }}"></script>
 <script src="{{ asset('public/backend/assets/js/datagrid/datatables/datatables.export.js') }}"></script>

    <script>

    /*data table script*/

     $(document).ready(function()
            {

                // initialize datatable
                $('#dt-basic-example').dataTable(
                {
                    "scrollX": true,
                    dom:
                        "<'row mb-3'<'col-sm-12 col-md-6 d-flex align-items-center justify-content-start'f><'col-sm-12 col-md-6 d-flex align-items-center justify-content-end'lB>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        /*{
                            extend:    'colvis',
                            text:      'Column Visibility',
                            titleAttr: 'Col visibility',
                            className: 'mr-sm-3'
                        },*/
                        {
                            extend: 'pdfHtml5',
                            text: 'PDF',
                            titleAttr: 'Generate PDF',
                            className: 'btn-outline-danger btn-sm mr-1'
                        },
                        {
                            extend: 'excelHtml5',
                            text: 'Excel',
                            titleAttr: 'Generate Excel',
                            className: 'btn-outline-success btn-sm mr-1'
                        },
                        {
                            extend: 'csvHtml5',
                            text: 'CSV',
                            titleAttr: 'Generate CSV',
                            className: 'btn-outline-primary btn-sm mr-1'
                        },
                        {
                            extend: 'copyHtml5',
                            text: 'Copy',
                            titleAttr: 'Copy to clipboard',
                            className: 'btn-outline-primary btn-sm mr-1'
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            titleAttr: 'Print Table',
                            className: 'btn-outline-primary btn-sm'
                        }
                    ]
                });

            });

    /*data table script*/

        //tostr message 
         @if(Session::has('message'))
          toastr.success("{{ session('message') }}");
          @endif
    </script>

@endpush
