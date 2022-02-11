@extends('layouts.app')

@section('title')
Customer Report
@endsection

@push('css')
    <link rel="stylesheet" media="screen, print" href="{{ asset('public/backend/assets/css/formplugins/select2/select2.bundle.css') }}">
@endpush 

@section('content')
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
        <li class="breadcrumb-item">Report</li>
        <li class="breadcrumb-item active"> Customer Report</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-edit'></i> Customer Report
           
        </h1>
    </div>
    <div class="row">
        <div class="col-xl-8">
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
                        <form id="report_form" method="POST" enctype="multipart/form-data" action="javascript:void(0)">   
                            @csrf                         
                            <div class="row">

                                <div class="col-md-6">
                                   
                                    <div class="form-group select_2_error">
                                        <label class="form-label" for="simpleinputInvalid">Division</label>
                                        <select onchange="division_id_func();" class="select2 form-control" id="division_id" name="division_name" required>
                                            <optgroup label="Select User Type">
                                                <option value="">Select Division</option>
                                                 
                                                 <?php 

                                                $data_division = DB::table('param_division')->get();

                                                foreach($data_division as $single_division){

                                                    ?>

                                                    <option value="{{$single_division->divisionID}}">

                                                        {{$single_division->division_Name}}</option>

                                                    <?php
                                                }
                                                 ?>                                              
                                                
                                            </optgroup>
                                        </select>
                                    </div>  
                                                                  
                                </div>

                                <div class="col-md-6">
                                   
                                    <div class="form-group select_2_error">
                                        <label class="form-label" for="simpleinputInvalid">District</label>
                                        <select class="select2 form-control" id="district_id" name="district_name" required>
                                            <optgroup label="Select District">
                                                <option value="">Select District</option>
                                                                                               
                                            </optgroup>
                                        </select>
                                    </div>  
                                                                  
                                </div>


                               <!--  <div class="col-md-6">
                                   
                                    <div class="form-group select_2_error" style="margin-top: 30px;">
                                        <label class="form-label" for="simpleinputInvalid">User Type</label>
                                        <select class="select2 form-control" id="user_type" name="user_type" required>
                                            <optgroup label="Select User Type">
                                                <option value="">Select User Type</option>
                                                <option value="1000">Bank User</option>                                               
                                                <option value="1001">Agent User</option>                                               
                                                <option value="1002">Sub-Agent User</option>                                               
                                            </optgroup>
                                        </select>
                                    </div>  
                                                                  
                                </div>


                                <div class="col-md-6">
                                    
                                    <div class="form-group select_2_error" style="margin-top: 30px;">
                                        <label class="form-label" for="simpleinputInvalid">Select Branch</label>
                                        <select class="select2 form-control" id="branch_id" name="branch_id" required>
                                            <optgroup label="Select Branch">
                                                <option value="">Select Branch</option>                                            
                                                                                           
                                            </optgroup>
                                        </select>
                                    </div> 
                                    
                                </div> -->
                            </div>   
                            <br>
                            <div class="row">
                                <div class="col-md-12">

                                    <span style="float: right">
                                        <button class="btn btn-primary" style="float:right;" onclick="generateReport()">Generate</button>
                                    </span>

                                </div>                                
                            </div>                         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</main>

<input type="hidden" id="get_district_from_division_url" value="{{route('report.get_district_from_division')}}">

@endsection


@push('js')
    <script src="{{ asset('public/backend/assets/js/formplugins/select2/select2.bundle.js') }}"></script>
    <script>
        $(document).ready(function(){
            
            $(function(){
                $('.select2').select2();
            });

            $("#user_type").on('change',function(){
                var user_type = $("#user_type").val();
                if(user_type != ''){
                    var user_branch_search_route = $("#user_branch_search_route").val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    jQuery.ajax({
                        url   : user_branch_search_route,
                        method: 'post',
                        data  : {
                            user_type: user_type
                        },
                        beforeSend: function() {
                            loaderStart();
                        },
                        success: function(result){
                            $("#branch_id").empty().append(result);
                        },
                        complete: function() {
                            loaderEnd();
                        }
                    });
                }
            });    

        });



        function division_id_func(){

              $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });

                var division_id = document.getElementById("division_id").value; 
                var get_district_from_division_url = document.getElementById("get_district_from_division_url").value; 

                 // alert(get_district_from_division_url);return false;

               jQuery.ajax({
                        url   : get_district_from_division_url,
                        method: 'post',
                        data  : {
                            division_id: division_id
                        },
                        beforeSend: function() {
                            loaderStart();
                        },
                        success: function(data){
                           console.log(data);

                            $("#district_id").empty().append(data);
                        },
                        complete: function() {
                            loaderEnd();
                        }
                    });
                       
        }

    </script>

    <script>
        function generateReport(){

           
            var division_id = $("#division_id").val();
            var district_id = $("#district_id").val();



             popupWindow =window.open( location.pathname.substring(0, location.pathname.length - location.pathname.length) + "{{ route('report.customer_report_table')}}?division_id="+division_id+"&district_id="+district_id,'newWindow','top=200, width=1000, height=500, left=200, scrollbars=1, toolbar=no,resizable=false' );


            return false;
        }
    </script>
@endpush