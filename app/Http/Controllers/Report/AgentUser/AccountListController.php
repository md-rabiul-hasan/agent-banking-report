<?php

namespace App\Http\Controllers\Report\AgentUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountListController extends Controller
{
   /**
     * Redirect to  the transaction searching page
     *
     */
    public function index(){
        return view('report.agent-user.account-list.index');
    }

    /**
     * Report Generate
     *
     */
    public function generateReport(Request $request){
        $starting_date = date('Y-m-d', strtotime($request->input('starting_date')));
        $ending_date   = date('Y-m-d', strtotime($request->input('ending_date')));

        $account_list =  DB::select(DB::raw("exec [dbo].[account_list_report] :starting_date, :ending_date, :branch_id"),[
            ':starting_date' => $starting_date,
            ':ending_date'   => $ending_date,
            ':branch_id'     => Auth::user()->branch_id
        ]);
        
        $data = [
            "account_list"  => $account_list,
            "starting_date" => $starting_date,
            "ending_date"   => $ending_date
        ];
        return view('report.agent-user.account-list.account-list', $data);
    }
}
