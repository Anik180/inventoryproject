<?php

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
    return redirect()->route('login');
});
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/logout', 'HomeController@logout')->name('admin.logout');


// employee
Route::get('/add/employee', 'EmployeeController@index')->name('add.employee');
Route::post('/insert/employee', 'EmployeeController@insert')->name('insert.employee');
Route::get('/all/employee', 'EmployeeController@all')->name('all.employee');
Route::get('/view/employee/{id}', 'EmployeeController@view')->name('view.employee');
Route::get('/delete/employee/{id}', 'EmployeeController@delete')->name('delete.employee');
Route::get('/edit/employee/{id}', 'EmployeeController@edit')->name('edit.employee');
Route::post('/update/employee/{id}', 'EmployeeController@update')->name('update.employee');

// customer
Route::get('/add/customer', 'CustomerController@index')->name('add.customer');
Route::post('/insert/customer', 'CustomerController@insert')->name('insert.customer');
Route::get('/all/customer', 'CustomerController@all')->name('all.customer');
Route::get('/view/customer/{id}', 'CustomerController@view')->name('view.customer');
Route::get('/delete/customer/{id}', 'CustomerController@delete')->name('delete.customer');
Route::get('/edit/customer/{id}', 'CustomerController@edit')->name('edit.customer');
Route::post('/update/customer/{id}', 'CustomerController@update')->name('update.customer');

// Supplier
Route::get('/add/supplier', 'SupplierController@index')->name('add.supplier');
Route::post('/insert/supplier', 'SupplierController@insert')->name('insert.supplier');
Route::get('/all/supplier', 'SupplierController@all')->name('all.supplier');
Route::get('/view/supplier/{id}', 'SupplierController@view')->name('view.supplier');
Route::get('/delete/supplier/{id}', 'SupplierController@delete')->name('delete.supplier');
Route::get('/edit/supplier/{id}', 'SupplierController@edit')->name('edit.supplier');
Route::post('/update/supplier/{id}', 'SupplierController@update')->name('update.supplier');

// salary
Route::get('/add/advanced_salary', 'AdvancedsalaryController@index')->name('add.advanced_salary');
Route::post('/insert/advanced_salary', 'AdvancedsalaryController@insert')->name('insert.advanced_salary');
Route::get('/all/advanced_salary', 'AdvancedsalaryController@all')->name('all.advanced_salary');
Route::get('/view/advanced_salary/{id}', 'AdvancedsalaryController@view')->name('view.advanced_salary');
Route::get('/delete/advanced_salary/{id}', 'AdvancedsalaryController@delete')->name('delete.advanced_salary');
Route::get('/edit/advanced_salary/{id}', 'AdvancedsalaryController@edit')->name('edit.advanced_salary');
Route::post('/update/advanced_salary/{id}', 'AdvancedsalaryController@update')->name('update.advanced_salary');
// paysalary
Route::get('/add/salary', 'SalaryController@index')->name('salary');
Route::post('/insert/salary', 'SalaryController@insert')->name('insert.salary');
Route::get('/all/salary', 'SalaryController@all')->name('all.salary');
Route::get('/view/salary/{id}', 'SalaryController@view')->name('view.salary');
Route::get('/delete/salary/{id}', 'SalaryController@delete')->name('delete.salary');
Route::get('/edit/salary/{id}', 'SalaryController@edit')->name('edit.salary');
Route::post('/update/salary/{id}', 'SalaryController@update')->name('update.salary');
// category
Route::get('/add/category', 'CategoryController@index')->name('add.category');
Route::post('/insert/category', 'CategoryController@insert')->name('insert.category');
Route::get('/all/category', 'CategoryController@all')->name('all.category');
Route::get('/delete/category/{id}', 'CategoryController@delete')->name('delete.category');
Route::get('/edit/category/{id}', 'CategoryController@edit')->name('edit.category');
Route::post('/update/category/{id}', 'CategoryController@update')->name('update.category');
// product
Route::get('/add/product', 'ProductController@index')->name('add.product');
Route::post('/insert/product', 'ProductController@insert')->name('insert.product');
Route::get('/all/product', 'ProductController@all')->name('all.product');
Route::get('/view/product/{id}', 'ProductController@view')->name('view.product');
Route::get('/delete/product/{id}', 'ProductController@delete')->name('delete.product');
Route::get('/edit/product/{id}', 'ProductController@edit')->name('edit.product');
Route::post('/update/product/{id}', 'ProductController@update')->name('update.product');
Route::get('/import/product', 'ProductController@Productimport')->name('import.product');
Route::get('/export/product', 'ProductController@export')->name('export');
Route::post('/import/product', 'ProductController@import')->name('import');
// expense
Route::get('/add/expense', 'ExpensController@index')->name('add.expense');
Route::post('/insert/expense', 'ExpensController@insert')->name('insert.expense');
Route::get('/today/expense', 'ExpensController@today')->name('today.expense');
Route::get('/delete/expense/{id}', 'ExpensController@delete')->name('delete.expense');
Route::get('/edit/expense/{id}', 'ExpensController@edit')->name('edit.expense');
Route::post('/update/expense/{id}', 'ExpensController@update')->name('update.expense');
Route::get('/month/expense', 'ExpensController@month')->name('month.expense');
Route::get('/yearly/expense', 'ExpensController@yearly')->name('yearly.expense');
// month
Route::get('/January/expense', 'ExpensController@January')->name('January.expense');
Route::get('/February/expense', 'ExpensController@February')->name('February.expense');
Route::get('/March/expense', 'ExpensController@March')->name('March.expense');
Route::get('/April/expense', 'ExpensController@April')->name('April.expense');
Route::get('/May/expense', 'ExpensController@May')->name('May.expense');
Route::get('/June/expense', 'ExpensController@June')->name('June.expense');
Route::get('/July/expense', 'ExpensController@July')->name('July.expense');
Route::get('/August/expense', 'ExpensController@August')->name('August.expense');
Route::get('/September/expense', 'ExpensController@September')->name('September.expense');
Route::get('/October/expense', 'ExpensController@October')->name('October.expense');
Route::get('/November/expense', 'ExpensController@November')->name('November.expense');
Route::get('/December/expense', 'ExpensController@December')->name('December.expense');
// attendences 
Route::get('/take/attendence', 'AttendenceController@take')->name('take.attendence');
Route::get('/all/attendence', 'AttendenceController@all')->name('all.attendence');
Route::post('/insert/attendence', 'AttendenceController@insert')->name('insert.attendence');
Route::get('/edit/attendence/{edit_date}', 'AttendenceController@edit')->name('edit.attendence');
Route::post('/update/attendence}', 'AttendenceController@update')->name('update.attendence');
Route::get('/view/attendence/{edit_date}', 'AttendenceController@view')->name('view.attendence');
// setting
Route::get('/company/setting', 'SettingController@company')->name('company.setting');
Route::post('/update/setting/{id}', 'SettingController@update')->name('update.setting');
// pos
Route::get('/pos', 'PosController@index')->name('pos');
// cart
Route::post('/add/cart','CartController@index')->name('add.cart');
Route::post('/add/qty/{rowId}','CartController@UpdateQTY')->name('add.qty');
Route::post('/add/weight/{rowId}','CartController@Updateweight')->name('add.weight');
Route::get('/cart/delete/{rowId}','CartController@delete')->name('cart.delete');
Route::post('/create/invoice','CartController@invoice')->name('create.invoice');
Route::post('/main/invoice','CartController@maininvoice')->name('main.invoice');
// orders
Route::get('/pending/orders', 'PosController@pendingorders')->name('pending.orders');
Route::get('/view/order/{id}', 'PosController@orderview')->name('view.order');
Route::get('/confirm/order/{id}', 'PosController@confirmorder')->name('confirm.order');
Route::get('/done/orders', 'PosController@doneorder')->name('done.orders');