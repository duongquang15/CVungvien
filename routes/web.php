<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('create-ticket','TicketController@create')->name('create');
Route::get('edit-ticket/{id}','TicketController@edit')->name('edit-ticket');
Route::get('detail-ticket/{id}','TicketController@detail')->name('detail-ticket');
Route::get('download/{id}','TicketController@download')->name('download');


Route::post('stores','TicketController@stores')->name('stores');
Route::get('add_jobs','TicketController@add_jobs')->name('jobs');
Route::get('add_levels','TicketController@add_levels')->name('levels');
Route::get('show_levels','TicketController@show_levels')->name('show-levels');



/**
 * Bắt đầu Route Thắng Em ghi
 */
Route::get('/table-data-users', function () {
    return view('fontend.users.table_data_users');
})->name('table_data_users');
Route::get('/edit-user', function () {
    return view('fontend.users.edit_user');
})->name('edit_user');
Route::get('/top-page', 'DepartmentController@showTicket')->name('top_page');
Route::get('/top-page/{id}', 'DepartmentController@showTicketByDepartment')->name('top_page_by_department');

Route::post('/test1', 'DepartmentController@exportTickets')->name('export_tickets');

Route::get('/test', function () {
    return view('fontend.test_table2excel');
});
/**
 * Kết thúc Route Thắng Em ghi
 */
// Route::get('/resetpass', function () {
//     return view('auth.resetpass');
// });
Route::get('/resetpass','HomeController@reset')->name('reset');
Route::post('/resetpass','HomeController@resetpass')->name('resetpass');
Route::get('/changepass','HomeController@changepass')->name('changepass');
Route::post('/changepass','HomeController@changepassword')->name('changepassword');



// Route::get('/changepass', function () {
//     return view('changepass');
// });

