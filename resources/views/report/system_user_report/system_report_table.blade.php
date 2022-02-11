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
            <li class="breadcrumb-item active">System User Report</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>

   <div class="subheader">
        <h1 class="subheader-title">            
            <i class='subheader-icon fal fa-table'></i> System User Report
            
            
        </h1>
    </div>

        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <!-- data table -->
                 <div id="panel-1" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            System User Report 
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Contact</th> 
                                                        <th>User Type</th>
                                                        <th>Branch Name</th>
                                                        <th>Role Name</th>
                                                        <th>Debit Power</th>
                                                        <th>Credit Power</th>
                                                        <th>Cash Debit Passing Power</th>
                                                        <th>Cash Credit Passing Power</th>
                                                        <th>Enabled yn</th>
                                                        <th>User Status</th>
                                                        <th>Entry User</th>
                                                        <th>Entry Date time</th>
                                                        <th>Limit Approve Power</th>
                                                        <th>Operation Start Date</th>
                                                        <th>Operation End Date</th>
                                                       
                                                        <th>LockYN</th>
                                                        <th>UnSuccessful Attemps</th>
                                                        <th>Employee Id</th>
                                                        <th>Clear Entry power</th>
                                                        <th>Transfer Entry power</th>
                                                        <th>pass expire date</th>
                                                        <th>approve user</th>
                                                        <th>approve date</th>
                                                        <th>AD User Name</th>
                                      
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                	@php
                                                	$sl=1;
                                                	@endphp
                                                    @foreach($users as $user)
                                                  	<tr>
                                                  		<td>{{ $sl++ }}</td>
	                                                    <td>{{$user->user_name}}</td>
	                                                    <td>{{$user->email}}</td>
	                                                    <td>{{$user->user_login_id}}</td>
    	                                               <td><?php 

                                                       $branch_type_code = $user->branch_type_code;

                                                       if ($branch_type_code==1000) {
                                                            echo "Bank User";

                                                       }elseif($branch_type_code==1001){
                                                            echo "Agent User";

                                                       }elseif($branch_type_code==1002){

                                                            echo "Sub-Agent User";
                                                       }

                                                        ?></td>
                                                       <td>{{$user->branch_name}}</td>
                                                       <td>{{$user->role_name}}</td>
                                                       <td>{{$user->debitpower}}</td>
                                                       <td>{{$user->creditpower}}</td>
                                                       <td>{{$user->cash_dr_passing_power}}</td>
                                                       <td>{{$user->cash_cr_passing_power}}</td>
                                                       <td>{{$user->enabled_yn}}</td>
                                                       <td>{{$user->user_status}}</td>
                                                       <td>{{$user->entry_user}}</td>
                                                       <td>{{$user->entry_datetime}}</td>
                                                       <td>{{$user->limit_appr_power}}</td>
                                                       <td>{{$user->op_start_date}}</td>
                                                       <td>{{$user->op_end_date}}</td>
                                                       <td>{{$user->LockYN}}</td>
                                                       <td>{{$user->UnSuccessfulAttemps}}</td>
                                                       <td>{{$user->employee_id}}</td>
                                                       <td>{{$user->clg_ent_power}}</td>
                                                       <td>{{$user->trf_ent_power}}</td>
                                                       <td>{{$user->pass_expire_date}}</td>
                                                       <td>{{$user->approve_user}}</td>
                                                       <td>{{$user->approve_date}}</td>
                                                       <td>{{$user->ad_user_name}}</td>

	                                                   

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
