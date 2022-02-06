<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VcategoryController;
use App\Http\Controllers\VserviceController;
use App\Http\Controllers\ProductivityController;
use App\Http\Controllers\VendorController;

Route::get('comet-chat', function () {
    return view('cometchat');
});
Route::get('research', function () {
    return view('research');
});

Route::get('admin', [EmployeeController::class, 'index']);
Route::post('save-employee', [EmployeeController::class, 'store2']);
Route::get('employee-list', [EmployeeController::class, 'show']);
Route::get('document-list', [EmployeeController::class, 'documentshow']);
Route::post('document-search', [EmployeeController::class, 'search']);
Route::get('document-review', [EmployeeController::class, 'showreview']);
Route::get('category/{id}/document', [EmployeeController::class, 'documentshowcwise']);
Route::get('event/{id}/document', [EmployeeController::class, 'documentshowewise']);
Route::get('team/{id}/document', [EmployeeController::class, 'documentshowtmwise']);
Route::get('document-page/{id}', [EmployeeController::class, 'documentslideshow']);

Route::get('dashboard', [EmployeeController::class, 'dashboard']);
Route::get('products', [EmployeeController::class, 'allproduct']);
Route::get('product_detail/{id}', [EmployeeController::class, 'productsdetail']);
Route::post('check-employee', [EmployeeController::class, 'check_employee']);
Route::post('check-admin', [EmployeeController::class, 'check_admin']);
Route::get('edit-employee/{id}', [EmployeeController::class, 'edit']);
Route::get('document-edit/{id}', [EmployeeController::class, 'documentedit']);
Route::post('document-approved', [EmployeeController::class, 'approved']);
Route::post('team-inactive', [EmployeeController::class, 'userinactive']);
Route::post('employee-update', [EmployeeController::class, 'update']);
Route::get('delete-employee/{id}', [EmployeeController::class, 'destroy']);
Route::get('reject-document/{id}', [EmployeeController::class, 'rejectdocument']);
Route::get('delete-document/{id}', [EmployeeController::class, 'deletedocument']);
Route::get('admin-logout', [EmployeeController::class, 'logout']);

//Category
Route::get('category-list',[CategoryController::class, 'index']);
Route::post('save-category',[CategoryController::class, 'categorystore']);
Route::get('edit-category/{id}',[CategoryController::class, 'edit']);
Route::post('update-category', [CategoryController::class, 'update']);
// Route::patch('category/{id}/update', [CategoryController::class, 'update']);
Route::get('delete-category/{id}',[CategoryController::class, 'destroy']);

//Document Manager
Route::get('/',[DocumentController::class, 'emplogin']);
Route::get('document-manager',[DocumentController::class, 'index']);
Route::post('document-save',[DocumentController::class, 'storedocument']);
Route::get('logout',[DocumentController::class, 'employeelogout']);

//Events
Route::get('event-list',[EventController::class, 'index']);
Route::post('save-event',[EventController::class, 'eventsave']);
Route::post('event-complete',[EventController::class, 'eventcomplete']);
Route::patch('event/{id}/update',[EventController::class, 'updateevent']);
Route::get('delete-event/{id}',[EventController::class, 'deleteevent']);

//Vender Category
Route::get('production-category',[VcategoryController::class, 'index']);
Route::post('save-vendor-category',[VcategoryController::class, 'vcategorystore']);
Route::get('edit-vendor-category/{id}',[VcategoryController::class, 'vendorcatedit']);
Route::post('update-vendor-category', [VcategoryController::class, 'vendarcatupdate']);
Route::get('delete-vendor-category/{id}',[VcategoryController::class, 'vendorcatdestroy']);

//Vender Service
Route::get('services',[VserviceController::class, 'index']);
Route::post('save-vendor-service',[VserviceController::class, 'vservicestore']);
Route::get('edit-vendor-service/{id}',[VserviceController::class, 'vendorcatedit']);
Route::post('update-vendor-service', [VserviceController::class, 'vendarcatupdate']);
Route::get('delete-vendor-service/{id}',[VserviceController::class, 'vendorcatdestroy']);

//Productivity
Route::get('productivity-list', [ProductivityController::class, 'index']);
Route::post('productivity-save', [ProductivityController::class, 'productstore']);
Route::get('productivity-edit/{id}', [ProductivityController::class, 'productedit']);
Route::post('update-productivity', [ProductivityController::class, 'productupdate']);
Route::get('delete-productivity/{id}',[ProductivityController::class, 'productdestroy']);
Route::post('productivity-inactive', [ProductivityController::class, 'pinactive']);

//Vender Panel
Route::post('check-productuser', [VendorController::class, 'check_productuser']);
Route::get('product-logout', [VendorController::class, 'productlogout']);
Route::get('product-search','VendorController@index');
Route::get('add-vendor','VendorController@addvendor');
Route::post('save-vender','VendorController@storevender');
Route::get('add-product','VendorController@addproduct');
Route::get('get-cat-select/{id}','VendorController@getcategory');
Route::get('check-company-name/{id}','VendorController@checkcompany');
Route::get('check-email/{email}','VendorController@checkemail');
Route::get('check-pan-no/{pan_no}','VendorController@checkpan');
Route::post('save-product','VendorController@storeproduct');
Route::get('product-detail/{id}','VendorController@productdetail');
Route::get('product-review','VendorController@preview');
Route::post('product-approved', [EmployeeController::class, 'productapproved']);
Route::get('reject-product/{id}', [EmployeeController::class, 'productrejectdocument']);

