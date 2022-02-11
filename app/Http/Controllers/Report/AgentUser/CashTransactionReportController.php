<?php

namespace App\Http\Controllers\Report\AgentUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CashTransactionReportController extends Controller
{
    /**
     * Redirect to  the transaction searching page
     *
     */
    public function index(){
        return view('report.agent-user.tranasctions.cash-transaction.index');
    }

    /**
     * Report Generate
     *
     */
    public function generateReport(Request $request){
        $starting_date = date('Y-m-d', strtotime($request->input('starting_date')));
        $ending_date   = date('Y-m-d', strtotime($request->input('ending_date')));

        $cash_transactions =  DB::select(DB::raw("exec [dbo].[transaction_report] :starting_date, :ending_date, :branch_id, :trn_code"),[
            ':starting_date' => $starting_date,
            ':ending_date'   => $ending_date,
            ':branch_id'     => Auth::user()->branch_id,
            ':trn_code'      => '11,12',
        ]);
        
        $data = [
            "cash_transactions" => $cash_transactions,
            "starting_date"     => $starting_date,
            "ending_date"       => $ending_date
        ];
        return view('report.agent-user.tranasctions.cash-transaction.cash-transaction', $data);
    }




}
