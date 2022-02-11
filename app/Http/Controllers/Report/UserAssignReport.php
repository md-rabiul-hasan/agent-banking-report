<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserAssignReport extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$roles=DB::table('roles')->whereNotNull('name')->orderby('name', 'ASC')->get();
    	return view('report.userAssign.index', compact('roles'));
    }

    public function show(Request $req)
    {
    	
    	$role_d =  $req->role_d;

    	/*if($role_d =='all')
    	{
    		$users=DB::table('users as u')
				->leftJoin('roles as r', 'r.id', 'u.role_id')
				->leftJoin('branches as b', 'b.branch_id', 'u.branch_id')
				->select('u.*', 'r.name as role_name', 'b.branch_name')
				->get();
    	}else{
    		
    		$users=DB::table('users as u')
				->leftJoin('roles as r', 'r.id', 'u.role_id')
				->leftJoin('branches as b', 'b.branch_id', 'u.branch_id')
				->select('u.*', 'r.name as role_name', 'b.branch_name')
				->where('u.role_id', $role_d)
				->get();
    	}*/


        $users = DB::select('EXEC get_user_list');


    	return view('report.userAssign.show_user', compact('users'));
    }


}
