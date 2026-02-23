<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


route::get("/", [AdminController::class,"home"]);

route::get('/home', [AdminController::class,'index'])->name('home')->middleware((['auth','admin']));;

route::get('/create_room', [AdminController::class,'create_room'])->middleware((['auth','admin']));

route::post('/add_room', [AdminController::class,'add_room'])->middleware((['auth','admin']));;

route::get('/view_room', [AdminController::class,'view_room'])->middleware((['auth','admin']));

route::get('/delete_room/{id}', [AdminController::class,'delete_room'])->middleware((['auth','admin']));;

route::get('/update_room/{id}', [AdminController::class,'update_room'])->middleware((['auth','admin']));;

route::post('/edit_room/{id}', [AdminController::class,'edit_room'])->middleware((['auth','admin']));;

route::get('/room_details/{id}', [HomeController::class,'room_details']);

route::post('/add_booking/{id}', [HomeController::class,'add_booking']);

route::get('/bookings', [AdminController::class,'bookings'])->middleware((['auth','admin']))->middleware((['auth','admin']));;

route::get('/delete_booking/{id}', [AdminController::class,'delete_booking'])->middleware((['auth','admin']));;

Route::get('/approve_book/{id}', [AdminController::class, 'approve_book'])->middleware((['auth','admin']));;

Route::get('/reject_book/{id}', [AdminController::class, 'reject_book'])->middleware((['auth','admin']));;

Route::get('/view_gallery', [AdminController::class, 'view_gallery'])->middleware((['auth','admin']));;

Route::post('/upload_gallery', [AdminController::class, 'upload_gallery'])->middleware((['auth','admin']));;

Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery'])->middleware((['auth','admin']));;

Route::post('/contact', [HomeController::class, 'contact']);

Route::get('/all_messages', [AdminController::class, 'all_messages'])->middleware((['auth','admin']));

Route::get('send_mail/{id}', [AdminController::class,'send_mail'])->middleware((['auth','admin']));;

Route::post('mail/{id}', [AdminController::class,'mail'])->middleware((['auth','admin']));;

route::get('/our_rooms', [HomeController::class,'our_rooms']);

route::get('/hotel_about', [HomeController::class,'hotel_about']);

route::get('/hotel_gallary', [HomeController::class,'hotel_gallary']);

route::get('/hotel_blog', [HomeController::class,'hotel_blog']);

route::get('/hotel_contact', [HomeController::class,'hotel_contact']);

route::get('/search', [AdminController::class,'search']);