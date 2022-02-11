@extends('layouts.app')

@section('title')
Utility Transaction Report
@endsection

@push('css')
    <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/formplugins/select2/select2.bundle.css') }}">
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
        <li class="breadcrumb-item active">Utility Transaction</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-edit'></i> Utility Transaction Report
            <small>
                Utility Transaction Report
            </small>
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Utility Transaction Report
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <form id="user-create-form" method="POST" enctype="multipart/form-data" action="{{ route('report.transactions.utility_bill_transaction.generate.report') }}">   
                            @csrf                         
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Starting Date</label>
                                        <input type="date" class="form-control" id="starting_date" name="starting_date" value="{{ date('Y-m-d') }}" required>
                                    </div>                     
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Ending Date</label>
                                        <input type="date" class="form-control" id="ending_date" name="ending_date" value="{{ date('Y-m-d') }}" required>
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
</div>



</main>



@endsection



@push('js')
    <script src="{{ asset('public/backend/assets/js/formplugins/select2/select2.bundle.js') }}"></script>
    <script>
        $(document).ready(function(){
            
            $(function(){
                $('.select2').select2();
            });

        });
    </script>

@endpush