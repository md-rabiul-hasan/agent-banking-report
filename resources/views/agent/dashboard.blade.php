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
       <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
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
    <div class="row">
       <div class="col-sm-3 col-xl-3">
          <div class="p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
             <div class="">
                  <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $transaction_summery[0]->daily_dr_amt+$transaction_summery[0]->daily_cr_amt }}
                     <small class="m-0 l-h-n">Today Transaction Amount</small>
                  </h3>
             </div>
             <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
          </div>
       </div>
       <div class="col-sm-3 col-xl-3">
          <div class="p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
             <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $transaction_summery[0]->daily_total_txn }}
                     <small class="m-0 l-h-n">Total Transaction</small>
                </h3>
             </div>
             <i class="fal fa-tally position-absolute pos-right pos-bottom opacity-15  mb-n1 mr-n4" style="font-size: 6rem;"></i>
          </div>
       </div>
       <div class="col-sm-3 col-xl-3">
          <div class="p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
             <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                  {{ $transaction_summery[0]->daily_dr_amt ?: '0'}}
                   <small class="m-0 l-h-n">Today Debit Amount</small>
                </h3>
             </div>
             <i class="fal fa-wallet position-absolute pos-right pos-bottom opacity-15 mb-n5 mr-n6" style="font-size: 8rem;"></i>
          </div>
       </div>
       <div class="col-sm-3 col-xl-3">
          <div class="p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
             <div class="">
                <h3 class="display-4 d-block l-h-n m-0 fw-500">
                     {{ $transaction_summery[0]->daily_cr_amt ?: '0'}}
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
                            <th>Transaction Title</th>
                            <th>Transaction Count</th>
                            <th>Transaction Amount</th>
                         </tr>
                      </thead>
                      <tbody>
                          @foreach($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->trn_name }}</td>
                                <td class="text-center">{{ $transaction->total_transaction }}</td>
                                <td class="text-center">{{ number_format($transaction->total_amount,4) }}</td>
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