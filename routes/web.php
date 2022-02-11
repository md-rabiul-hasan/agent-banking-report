<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParameterSetup\UserSetupController;
use App\Http\Controllers\Report\AgentUser\AccountListController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\UserAndSecurity\PasswordResetController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Report\AgentUser\CashTransactionReportController;
use App\Http\Controllers\Report\AgentUser\TransferTransactionController;
use App\Http\Controllers\Report\AgentUser\UtilityBillController;
use App\Http\Controllers\Report\UserAssignReport;
use App\Http\Controllers\Report\Statement\MiniStatementController;

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


############  menu setup ###################################
Route::group(['prefix'=> 'parameter-menu','namespace'=> 'Parameter', 'as'=>'parameter.menu.'], function(){
    Route:: get('menus', [MenusController::class, 'index'])->name('index');
    Route:: get('create', [MenusController::class, 'create'])->name('create');
    Route:: post('store', [MenusController::class, 'store'])->name('store');
    Route:: post('find', [MenusController::class, 'parent_id'])->name('parent_id');
    Route:: get('edit/{id}/{parent_id}', [MenusController::class, 'edit'])->name('edit');
    Route:: post('update', [MenusController::class, 'update'])->name('update');
});

############ end menu setup ###################################


#################################################
# Super Admin User & Security Menu Section End
#################################################
Route::group(['prefix'=>'user-and-security/password-reset', 'namespace'=>'UserAndSecurity', 'middleware'=>'auth', 'as'=>'user-and-security.password-reset.'], function(){
    Route:: get('index',[PasswordResetController::class, 'index'])->name('index');
    Route::post('update', [PasswordResetController::class, 'update'])->name('update');
});

Route::group(['prefix'=> 'report/user-report/','namespace'=> 'Report', 'as'=>'report.'], function(){
    //sytem user report route start
    Route::get('system_user', [ReportController::class, 'system_user_view'])->name('system_user');
    Route::get('system_user_report_table', [ReportController::class, 'system_user_report_table'])->name('system_user_report_table');
    //customer report start
   
});

Route::group(['prefix'=> 'report/customer-report/','namespace'=> 'Report', 'as'=>'report.'], function(){

    Route::get('customer_report', [ReportController::class, 'customer_report_view'])->name('customer_report');
    Route::get('/customer-report-table', [ReportController::class,'customer_report_table'])->name('customer_report_table');
    Route::post('get-district-from-division',[ReportController::class, 'get_district_from_division'])->name('get_district_from_division');

 });   

Route::group(['prefix'=>'report-user-', 'namespace'=>'Report', 'as'=>'report.user.'], function(){
        Route::get('assign', [UserAssignReport::class, 'index'])->name('assign');
        Route::post('assign', [UserAssignReport::class, 'show'])->name('show');
});


#################################################
# Cash Transaction Report Section Start
#################################################
Route::group(['as'=>'report.transactions.cash_transaction.','prefix'=>'report/transactions/cash-transaction','middleware'=>'auth','namespace'=>'Report/AgentUser'],function(){
    Route::get('index',[CashTransactionReportController::class, 'index'])->name('index');
    Route::post('generate-report',[CashTransactionReportController::class, 'generateReport'])->name('generate.report');
});
#################################################
# Cash Transaction Report Section End
#################################################


#################################################
# Transfer Transaction Section Start
#################################################
Route::group(['as'=>'report.transactions.transfer_transaction.','prefix'=>'report/transactions/transfer-transaction','middleware'=>'auth','namespace'=>'Report/AgentUser'],function(){
    Route::get('index',[TransferTransactionController::class, 'index'])->name('index');
    Route::post('generate-report',[TransferTransactionController::class, 'generateReport'])->name('generate.report');
});
#################################################
# Transfer Transaction Section End
#################################################


#################################################
# Utility Bill Section Start 
#################################################
Route::group(['as'=>'report.transactions.utility_bill_transaction.','prefix'=>'report/transactions/utility-bill-transaction','middleware'=>'auth','namespace'=>'Report/AgentUser'],function(){
    Route::get('index',[UtilityBillController::class, 'index'])->name('index');
    Route::post('generate-report',[UtilityBillController::class, 'generateReport'])->name('generate.report');
});
#################################################
# Utility Bill Section End
#################################################


#################################################
# Account list Section Start
#################################################
Route::group(['as'=>'report.account_list.','prefix'=>'report/account-list','middleware'=>'auth','namespace'=>'Report/AgentUser'],function(){
    Route::get('index',[AccountListController::class, 'index'])->name('index');
    Route::post('generate-report',[AccountListController::class, 'generateReport'])->name('generate.report');
});
#################################################
# Account List Section End
#################################################



######################################## Mini statement #####################################################
Route::group(['prefix'=> 'report/statement', 'as'=>'report.statement.'], function(){
    Route:: get('index', [MiniStatementController::class, 'index'])->name('index');
    Route:: post('miniStateMent', [MiniStatementController::class, 'miniStatement'])->name('miniStatement');
    
});

//Route::post('report/statement/miniStateMent', [MiniStatementController::class, 'miniStatement'])->name('report.statement.miniStatement');

######################################## Mini statement #####################################################