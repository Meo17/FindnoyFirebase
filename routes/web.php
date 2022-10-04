<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WantedCriminalController;
use App\Http\Controllers\MissingPersonController;
use App\Http\Controllers\CarnappedController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PoliceStationController;
use App\Http\Controllers\CaseController;
use App\Http\Controllers\SystemConfigureController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CivilianController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SolvedCaseController;
use App\Http\Controllers\PoliceOfficerController;


use App\Http\Controllers\MailerController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//email testing
// Route::get("email", [MailerController::class, "email"])->name("email");
// Route::post("send-email", [MailerController::class, "composeEmail"])->name("send-email");
// Route::get('send-mail', [MailController::class, 'index']);

#login
Route::get('/', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login']);
Route::get('/home_superadmin', [HomeController::class, 'homepage']);
Route::post('/save_police_station', [HomeController::class, 'store']);
Route::get('/add_police_station', [HomeController::class, 'add_police_station']);
Route::get('/list_police_station', [HomeController::class, 'list_police_station']);
Route::get('/inactive_police_station', [HomeController::class, 'inactive_police_station']);
Route::get('/logout', [SystemConfigureController::class, 'logout']);
Route::post('/p_deactivate', [HomeController::class, 'p_deactivate']);
Route::post('/p_activate', [HomeController::class, 'p_activate']);
Route::get('/sendEmail', [HomeController::class, 'sendEmail']);

#Police Station
Route::get('/dashboard_police_station', [PoliceStationController::class, 'homepage_police_station']);
Route::get('/add_field_officers', [PoliceStationController::class, 'add_field_officers']);
Route::get('/list_field_officers', [PoliceStationController::class, 'list_field_officers']);
Route::get('/list_inactive_field_officers', [PoliceStationController::class, 'list_inactive_field_officers']);
# list of civilians who registed  in your area 
Route::get('/list_of_civilians_in_police_station', [PoliceStationController::class, 'list_of_civilians_in_police_station']);


#Case
Route::get('/dashboardcase', [CaseController::class, 'dashboardcase']);
Route::get('/wanted_criminals', [CaseController::class, 'wanted_criminals']);
Route::get('/missing_person', [CaseController::class, 'missing_person']);
Route::get('/carnapped', [CaseController::class, 'carnapped']);


#missing person
Route::post('/save_missing_person', [CaseController::class, 'save_missing_person']);
Route::get('/list_missing_person', [CaseController::class, 'list_missing_person']);


#wanted criminal
Route::post('/save_wanted_criminal', [CaseController::class, 'save_wanted_criminal']);
Route::get('/list_wanted_criminal', [CaseController::class, 'list_wanted_criminal']);


#carnapped
Route::post('/save_carnapped', [CaseController::class, 'save_carnapped']);
Route::get('/list_carnapped', [CaseController::class, 'list_carnapped']);


#profile user
Route::get('/users_profile', [ProfileController::class, 'users_profile']);
Route::post('/save_user_profile', [ProfileController::class, 'save_user_profile']);


#add police officers 
Route::post('/save_add_field_officers', [PoliceStationController::class, 'save_add_field_officers']);
//-update  account officers 
Route::post('/police_officer_deactivate', [PoliceStationController::class, 'police_officer_deactivate']);
Route::post('/police_officer_activated', [PoliceStationController::class, 'police_officer_activated']);


#criminal update/delete
Route::post('/update_criminal', [WantedCriminalController::class, 'editCriminal']);
Route::get('/view_detail', [WantedCriminalController::class, 'viewCaseDetailsWantedCriminal']);
Route::post('/close_case_criminal', [WantedCriminalController::class, 'forceCloseFileCaseWantedCriminal']);

#missing person  /update/delete
Route::post('/update_missing_person', [MissingPersonController::class, 'updateMissingPerson']);
Route::get('/view_detail_mp', [MissingPersonController::class, 'viewCaseDetailsMissingPerson']);
Route::post('/close_case_missing_person', [MissingPersonController::class, 'forceCloseFileCaseMissingPerson']);



#carnapped update/delete
Route::post('/update_carnapped', [CarnappedController::class, 'updateCarnapped']);
Route::get('/view_detail_car', [CarnappedController::class, 'viewCaseDetailsCarnapped']);
Route::post('/close_case_carnapped', [CarnappedController::class, 'forceCloseFileCaseCarnapped']);


#homepage graph get all the data for all station/ Wanted   Criminal Graph
Route::get('/wanted_graph_daily_report', [HomeController::class, 'graphWantedPersonDailyReport']);
Route::get('/wanted_graph_monthly_report', [HomeController::class, 'graphWantedPersonMonthlyReport']);
Route::get('/wanted_graph_yearly_report', [HomeController::class, 'graphWantedPersonYearlyReport']);


#homepage graph get all the data for all station/ Missing Person Graph
Route::get('/missing_person_graph_daily_report', [HomeController::class, 'graphMissingPersonDailyReport']);
Route::get('/missing_person_graph_monthly_report', [HomeController::class, 'graphMissingPersonMonthlyReport']);
Route::get('/missing_person_graph_yearly_report', [HomeController::class, 'graphMissingPersonYearlyReport']);


#homepage graph get all the data for all station/ Carnapped Graph
Route::get('/carnapped_graph_daily_report', [HomeController::class, 'graphCarnappedDailyReport']);
Route::get('/carnapped_graph_monthly_report', [HomeController::class, 'graphCarnappedMonthlyReport']);
Route::get('/carnapped_graph_yearly_report', [HomeController::class, 'graphCarnappedYearlyReport']);

#Civilians 
Route::get('/number_of_civilian', [CivilianController::class, 'numberOfCivilian']);
Route::get('/get_civilian_location', [CivilianController::class, 'getCivilianLocation']);


#notifications Admin
Route::get('/notification_superadmin', [NotificationController::class, 'notification']);
Route::get('/showall', [NotificationController::class, 'showall']);
Route::get('/showall_super_admin', [NotificationController::class, 'showall_super_admin']);
Route::get('/extend_showall', [NotificationController::class, 'extend_showall']);
Route::get('/extend_showall_superadmin', [NotificationController::class, 'extend_showall_superadmin']);


#Solved Cases
Route::get('/criminal', [SolvedCaseController::class, 'criminal']);
Route::get('/missing', [SolvedCaseController::class, 'missing']);
Route::get('/vehicle', [SolvedCaseController::class, 'vehicle']);


#ajax report data  
Route::post('/ajax_today_missing_p', [PoliceStationController::class, 'ajax_today_missing_p'])->name('ajax_today_missing_p');
Route::post('/ajax_today_missing_v', [PoliceStationController::class, 'ajax_today_missing_v'])->name('ajax_today_missing_v');
Route::post('/ajax_today_missing_w', [PoliceStationController::class, 'ajax_today_missing_w'])->name('ajax_today_missing_w');

#super admin list of all registered users 
Route::get('/list_all_civilians', [PoliceStationController::class, 'ajax_today_missing_w'])->name('list_all_civilians');


// notification  from Police Station  to Super Admin
#Request deactivation 
Route::post('/request_deactivation_officer', [NotificationController::class, 'requestDeactivationOfficer']);
Route::post('/request_approved_by_super_admin', [NotificationController::class, 'requestApprovedDeactivation']);

// Police Officer 
Route::get('/dashboard_police_officer', [PoliceOfficerController::class, 'dashboard_police_officer']);










