<?php

namespace App\Http\Controllers\Report\Statement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MiniStatementController extends Controller
{
    Public function index()
    {
    	return view('report.statement.miniStatement');
    }

    public function miniStatement()
    {

    	$account_no = $_POST['account_no'];

    	$sql = " SELECT trn.*, trnc.trn_name, u.name, br.branch_name, acc.acname from dpln_transaction  trn
				left join param_trn_code trnc on trnc.trn_code = trn.trn_code
				left join users u on u.id= trn.authorize_user_id
				left join branches br on br.branch_id = trn.entry_branch_id
				left join account_info acc on acc.accountno = trn.accountno
				where trn.accountno= '$account_no'  ";

		$trn_details = DB::select($sql);

		return view('report.statement.miniStateMentDetails', compact('trn_details', 'account_no'));
    	

    }
}
