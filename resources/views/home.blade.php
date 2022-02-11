@extends('layouts.app')

@section('title')
Dashboard
@endsection
@push('css')
    <style type="text/css">
        
        .table th, .table td {
    padding: 0.3rem !important;
    vertical-align: top;
    border-top: 1px solid #e9e9e9;
}
    </style>
@endpush

@section('content')
<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
       <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
       <!-- <li class="breadcrumb-item">Application Intel</li>
          <li class="breadcrumb-item active">Marketing Dashboard</li> -->
       <li class="position-absolute pos-top pos-right d-none d-sm-block dashboard_date"><span class="">{{ date('l F d, Y') }}</span></li>
    </ol>
    <div class="subheader">
       <div class="d-flex flex-start w-100">
          <div class="mr-2 hidden-md-down">
             <span class="icon-stack icon-stack-lg">
             <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
             <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
             <i class="ni ni-blog-read icon-stack-1x opacity-100 color-white"></i>
             </span>
          </div>
          <div class="d-flex flex-fill">
             <div class="flex-fill">
                <span class="h5">{{ Auth::user()->branch->branch_name }}</span>
                <p>
                   <strong>
                     {{ Auth::user()->name }} is accessing {{ Auth::user()->branch->branch_name }} as a {{ Auth::user()->role->name }}
                   </strong>
               </p>
             </div>
          </div>
       </div>
    </div>

    @if(Auth::user()->role_id==1)
      <div class="row">
         <div class="col-sm-2 col-xl-2">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                  {{ $ho_summery[0]->daily_total_amt ?: '0'}}
                  <small class="m-0 l-h-n">Today Transaction Amt</small>
                  </h3>
               </div>
               <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
         </div>
         <div class="col-sm-2 col-xl-2">
            <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $ho_summery[0]->daily_total_txn }}
                     <small class="m-0 l-h-n">Total Transaction</small>
                  </h3>
               </div>
               <i class="fal fa-tally position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
         </div>

         <div class="col-sm-2 col-xl-2">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $ho_summery[0]->total_amt }}
                     <small class="m-0 l-h-n">Total Transaction Amt</small>
                  </h3>
               </div>
               <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
         </div>
         <div class="col-sm-2 col-xl-2">
            <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $ho_summery[0]->total_txn }}
                     <small class="m-0 l-h-n">Total Transaction</small>
                  </h3>
               </div>
               <i class="fal fa-tally position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
         </div>
         <div class="col-sm-2 col-xl-2">
            <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $ho_summery[0]->total_customer }}
                     <small class="m-0 l-h-n">Total Customer</small>
                  </h3>
               </div>
               <i class="fal fa-user position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
            </div>
         </div>
         <div class="col-sm-2 col-xl-2">
            <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $ho_summery[0]->total_agent }}
                     <small class="m-0 l-h-n">Total Outlet</small>
                  </h3>
               </div>
               <i class="fal fa-globe position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div id="panel-4" class="panel">
               <div class="panel-container show">
                  <div class="panel-content">
                     <table id="dt-basic-example" class="table table-bordered table-striped w-100">
                        <thead class="" style="background-image: linear-gradient(
                           270deg
                           , rgba(51, 148, 225, 0.18), transparent);background: #04a6e1  !important;color: #fff;">
                           <tr style="text-align: center">
                              <th>JOB</th>
                              <th>COUNT</th>
                              <th>AMOUNT</th>
                           </tr>
                        </thead>
                        <tbody>

                           @foreach ($ho_joblist as $ho_job)
                              <tr>
                                 <td>{{ $ho_job->trn_name }}</td>
                                 <td>{{ $ho_job->total_txn }}</td>
                                 <td>{{ $ho_job->amount }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                        
                     </table>
                     <!-- datatable end<i class="fas fa-wallet"></i> <i class="fas fa-badge-dollar"></i>-->
                  </div>
               </div>
            </div>
         </div>
      </div>
   @elseif(Auth::user()->role_id==2) 

   <div class="row">
         <div class="col-sm-3 col-xl-3">
            <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                  {{ $branch_summery[0]->daily_total_amt ?: '0'}}
                  <small class="m-0 l-h-n">Today Transaction Amt</small>
                  </h3>
               </div>
               <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
            </div>
         </div>
         <div class="col-sm-3 col-xl-3">
            <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $branch_summery[0]->daily_total_txn }}
                     <small class="m-0 l-h-n">Today Total Transaction</small>
                  </h3>
               </div>
               <i class="fal fa-tally position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
         </div>
         <div class="col-sm-3 col-xl-3">
            <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
               <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $branch_summery[0]->total_agent }}
                     <small class="m-0 l-h-n">Total Outlet</small>
                  </h3>
               </div>
               <i class="fal fa-globe position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div id="panel-4" class="panel">
               <div class="panel-container show">
                  <div class="panel-content">
                     <table id="dt-basic-example" class="table table-bordered table-striped w-100">
                        <thead class="" style="background-image: linear-gradient(
                           270deg
                           , rgba(51, 148, 225, 0.18), transparent);background: #04a6e1  !important;color: #fff;">
                           <tr style="text-align: center">
                              <th>JOB</th>
                              <th>COUNT</th>
                              <th>AMOUNT</th>
                           </tr>
                        </thead>
                        <tbody>

                           @foreach ($ho_joblist as $ho_job)
                              <tr>
                                 <td>{{ $ho_job->trn_name }}</td>
                                 <td>{{ $ho_job->total_txn }}</td>
                                 <td>{{ $ho_job->amount }}</td>
                              </tr>
                           @endforeach
                        </tbody>
                        
                     </table>
                     <!-- datatable end<i class="fas fa-wallet"></i> <i class="fas fa-badge-dollar"></i>-->
                  </div>
               </div>
            </div>
         </div>
      </div>

   @elseif(Auth::user()->role_id==3)
    
    <div class="row">
       <div class="col-sm-3 col-xl-3">
          <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
             <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                  {{ $agent_admin_summery[0]->current_bal  }} 
                  <small class="m-0 l-h-n">Current Balance</small>
                </h3>
             </div>
             
             <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
          </div>
       </div>
       <div class="col-sm-3 col-xl-3">
          <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
             <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                  {{ $agent_admin_summery[0]->daily_total_txn  }} 
                  <small class="m-0 l-h-n">Today Total Transaction</small>
                </h3>
             </div>
             <i class="fal fa-tally position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
          </div>
       </div>
       <div class="col-sm-3 col-xl-3">
          <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
             <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                  {{ $agent_admin_summery[0]->daily_dr_amt  }} 
                  <small class="m-0 l-h-n">Today Debit Amount</small>
                </h3>
             </div>
             
             <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
          </div>
       </div>
       <div class="col-sm-3 col-xl-3">
          <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
             <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                  {{ $agent_admin_summery[0]->daily_cr_amt  }} 
                  <small class="m-0 l-h-n">Today Credit Amount</small>
                </h3>
             </div>
             <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n4" style="font-size: 6rem;"></i>
          </div>
       </div>
    </div>
    <div class="row">
       <div class="col-lg-12">
          <div id="panel-4" class="panel">
             <div class="panel-container show">
                <div class="panel-content">
                   <table id="dt-basic-example" class="table table-bordered table-striped w-100">
                      <thead class="" style="background-image: linear-gradient(
                         270deg
                         , rgba(51, 148, 225, 0.18), transparent);background: #04a6e1  !important;color: #fff;">
                         <tr style="text-align: center">
                            <th>TRANSACTION TITLE</th>
                            <th>TRANSACTION COUNT</th>
                            <th>TRANSACTION AMOUNT</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($agent_joblist as $agent_job)
                           <tr>
                              <td>{{ $agent_job->trn_name }}</td>
                              <td>{{ $agent_job->total_txn }}</td>
                              <td>{{ $agent_job->amount }}</td>
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
   @endif
 </main>
@endsection