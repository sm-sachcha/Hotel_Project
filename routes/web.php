<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;





route::get("/", [AdminController::class,"home"]);

route::get('/home', [AdminController::class,'index'])->name('home');
route::get('/create_room', [AdminController::class,'create_room']);

route::post('/add_room', [AdminController::class,'add_room']);

route::get('/view_room', [AdminController::class,'view_room']);

route::get('/delete_room/{id}', [AdminController::class,'delete_room']);

route::get('/update_room/{id}', [AdminController::class,'update_room']);

route::post('/edit_room/{id}', [AdminController::class,'edit_room']);