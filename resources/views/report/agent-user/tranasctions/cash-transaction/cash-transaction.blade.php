@extends('layouts.app')

@section('title')
Cash Transaction Report
@endsection

@push('css')
    <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/formplugins/select2/select2.bundle.css') }}">
    <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/datagrid/datatables/datatables.bundle.css') }}">
    <style>
        .fingerprint_img{
            height: 100%;
            width: 100%;
        }
        .font-score-show{
            color: red;
            font-weight: bold;
        }
        .card_disabled {
            opacity: 0.2;
        }
    </style>
@endpush 


@section('content')
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        <li class="breadcrumb-item">Report</li>
        <li class="breadcrumb-item active">Cash Transaction</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-edit'></i> Cash Transaction Report
            <small>
                Cash Transaction Report
            </small>
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Cash Transaction Report
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form id="user-create-form" method="POST" enctype="multipart/form-data" action="{{ route('report.transactions.cash_transaction.generate.report') }}">   
                            @csrf                         
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Starting Date</label>
                                        <input type="date" class="form-control" id="starting_date" name="starting_date" value="{{ $starting_date}}" required>
                                    </div>                     
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Ending Date</label>
                                        <input type="date" class="form-control" id="ending_date" name="ending_date" value="{{ $ending_date}}" required>
                                    </div>                     
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group select_2_error">
                                        <label class="form-label" for="simpleinputInvalid">Agent Name</label>
                                        <select class="select2 form-control" id="user_type" name="user_type" required>
                                            <optgroup label="Select Agent">
                                                @if(Auth::user()->role_id == 4)
                                                    <option value="">{{ Auth::user()->branch->branch_name }}</option>    
                                                @endif
                                            </optgroup>
                                        </select>
                                    </div>  
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">&nbsp;</label>
                                        <button type="submit" class="form-control btn btn-sm btn-primary">Generate Report</button>
                                    </div>                     
                                </div>
                            </div>                         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



<div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Cash Transaction List
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-sm btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-sm btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-sm btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <!-- datatable start -->
                        <table id="dt-basic-example" class="table table-bordered table-hover table-striped table-sm w-100">
                            <thead class="bg-primary-600">
                                <tr>
                                    <th>Transaction Type</th>
                                    <th>Dr. Account</th>
                                    <th>Cr. Account</th>
                                    <th>Currnecy</th>
                                    <th>Amount BDT</th>
                                    <th>Branch Name</th>
                                    <th>Remarks</th>
                                    <th>Narration</th>
                                    <th>Transaction User</th>
                                    <th>Transaction Datetime</th>
                                </tr>
                            </thead>
                            <tbody> 
								@php 
									$sl = 1;
								@endphp
								@foreach($cash_transactions as $cash_transaction)
									<tr>
										<td>{{ $cash_transaction->transaction_type }}</td>
										<td>{{ $cash_transaction->accountno }}</td>
										<td>{{ $cash_transaction->credit_account_no }}</td>
										<td>{{ $cash_transaction->curr_code }}</td>
										<td>{{ number_format($cash_transaction->amount_tk,4) }}</td>
										<td>{{ $cash_transaction->branch_name }}</td>
										<td>{{ $cash_transaction->remark }}</td>
										<td>{{ $cash_transaction->narration }}</td>
										<td>{{ $cash_transaction->authorize_user_name }}</td>
										<td>{{ date('Y-m-d h:i a' ,strtotime($cash_transaction->authorize_datetime)) }}</td>
									</tr>
								@endforeach
                            </tbody>
                        </table>
                        <!-- datatable end -->
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>

@endsection



@push('js')
    <script src="{{ asset('public/backend/assets/js/formplugins/select2/select2.bundle.js') }}"></script>
	<script src="{{ asset('public/backend/assets/js/datagrid/datatables/datatables.bundle.js') }}"></script>
	    <script src="{{ asset('public/backend/assets/js/datagrid/datatables/datatables.export.js') }}"></script>
    <script>
        $(document).ready(function(){
            
            $(function(){
                $('.select2').select2();
                $('#fingerprint_button_div').hide();
            });

        });
    </script>
    <script>
        $(document).ready(function()
        {

           
            // initialize datatable
            $('#dt-basic-example').dataTable(
            {
                responsive: true,
                lengthChange: false,
                dom:
                    /*	--- Layout Structure 
                        --- Options
                        l	-	length changing input control
                        f	-	filtering input
                        t	-	The table!
                        i	-	Table information summary
                        p	-	pagination control
                        r	-	processing display element
                        B	-	buttons
                        R	-	ColReorder
                        S	-	Select

                        --- Markup
                        < and >				- div element
                        <"class" and >		- div with a class
                        <"#id" and >		- div with an ID
                        <"#id.class" and >	- div with an ID and a class

                        --- Further reading
                        https://datatables.net/reference/option/dom
                        --------------------------------------
                        */
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
                        className: 'btn-danger btn-sm mr-1'
                    },
                    {
                        extend: 'excelHtml5',
                        text: 'Excel',
                        titleAttr: 'Generate Excel',
                        className: 'btn-success btn-sm mr-1'
                    },
                    {
                        extend: 'csvHtml5',
                        text: 'CSV',
                        titleAttr: 'Generate CSV',
                        className: 'btn-primary btn-sm mr-1'
                    },
                    {
                        extend: 'copyHtml5',
                        text: 'Copy',
                        titleAttr: 'Copy to clipboard',
                        className: 'btn-primary btn-sm mr-1'
                    },
                    {
                        extend: 'print',
                        text: 'Print',
                        titleAttr: 'Print Table',
                        className: 'btn-primary btn-sm'
                    }
                ]
            });

        });
    </script>

@endpush