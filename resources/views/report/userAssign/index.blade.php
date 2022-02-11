@extends('layouts.app')
@section('title','Report')

@push('css')


@endpush
@section('content')
<!-- BEGIN Page Content -->
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
            <li class="breadcrumb-item">Report</li>
            <li class="breadcrumb-item active">User Assign</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>

        <div class="row">
            <div class="col-md-6  offset-md-3">
                <div class="col-xl-8 offset-xl-2">
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>User Assign Report</h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <form id="default" action="{{route('report.user.show')}}" method="post" target="_blank">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label" for="gender">Select  Role</label>
                                        <select name="role_d" id="role_d" class="custom-select"  required>
                                            <option value="">Select  Role</option>
                                            <option value="all">ALL</option>
                                            @foreach($roles as $role)
                                                 <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        <div class="valid-feedback">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                                    <button class="btn btn-primary ml-auto waves-effect waves-themed" id="generate"  type="submit">Submit form</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div> <!-- col-md-6 -->
           

        </div>
    </main>
@endsection

@push('js')
    <script>

        //Here select2
        $(function(){
            $('.select2').select2();
        });

        $(function() {

            $.validator.setDefaults({
                errorClass: 'help-block',
                highlight: function(element) {
                    $(element)
                        .closest('.form-group')
                        .addClass('has-error');
                },
                unhighlight: function(element) {
                    $(element)
                        .closest('.form-group')
                        .removeClass('has-error');
                }
            });

            $("#default").validate({
                rules: {
                    role: {required: true}
                }
            });

        });


    </script>
@endpush
