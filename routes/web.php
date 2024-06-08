<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomHistoriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application- These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group- Make something great!
|
*/

//Route Index
Route::get('/', [HomeController::class, 'index'])->name('index');

//<!--*** RoomController Start ***-->
//Route viewRooms
Route::get('/view-rooms', [RoomController::class, 'viewRooms'])->name('view-rooms');
//Route createRoom
Route::get('/create-room', [RoomController::class, 'createRoom'])->name('create-room');
//Route storeRoom
Route::post('/store-room', [RoomController::class, 'storeRoom'])->name('store-room');
//Route editRoom
Route::get('/edit-room/{id}', [RoomController::class, 'editRoom'])->name('edit-room');
//Route updateRoom
Route::put('/update-room/{id}', [RoomController::class, 'updateRoom'])->name('update-room');
//Route destroyRoom
Route::delete('/destroy-room/{id}', [RoomController::class, 'destroyRoom'])->name('destroy-room');
//Route viewByCatergory
Route::get('/category/{category}', [RoomController::class, 'viewByCategory'])->name('category');
//Route viewDetail
Route::get('/view_detail/{id}/histori', [RoomController::class, 'viewDetail'])->name('view-detail');
//Route printRooms
Route::get('/cetak', [RoomController::class, 'printRooms'])->name('cetak');
//Route printDetail
Route::get('/cetak-detail/{id}', [RoomController::class, 'printDetail'])->name('cetak-detail');
//Route getRoom
Route::get('/get-room{id}', [RoomController::class, 'getRoom']);
//<!--*** RoomController End ***-->

//<!--*** RoomHistoriesController Start ***-->
//Route viewRoomHistories
Route::get('/view-room-histories', [RoomHistoriesController::class, 'viewRoomHistories'])->name('view-room-histories');
//Route createRoomHistory
Route::get('/create-room-history', [RoomHistoriesController::class, 'createRoomHistory'])->name('create-room-history');
//Route storeRoomHistory
Route::post('/store-room-history', [RoomHistoriesController::class, 'storeRoomHistory'])->name('store-room-history');
//Route editRoomHistory
Route::get('/edit-room-history/{id}', [RoomHistoriesController::class, 'editRoomHistory'])->name('edit-room-history');
//Route updateRoomHistory
Route::put('/update-room-history/{id}', [RoomHistoriesController::class, 'updateRoomHistory'])->name('update-room-history');
//Route destroyRoom
Route::delete('/destroy-room-history/{id}', [RoomHistoriesController::class, 'destroyRoomHistory'])->name('destroy-room-history');
//Route viewByTanggalPembangunan;
Route::get('/view-pembangunan', [RoomHistoriesController::class, 'viewByPembangunan'])->name('view-pembangunan');
//<!--*** RoomHistoriesController End ***-->

//<!--*** ItemController Start ***-->
//Route viewItems
Route::get('/view-items', [ItemController::class, 'viewItems'])->name('view-items');
//Route createItem
Route::get('/create-item', [ItemController::class, 'createItem'])->name('create-item');
//Route storeItem
Route::post('/store-item', [ItemController::class, 'storeItem'])->name('store-item');
//Route editItem
Route::get('/edit-item/{id}', [ItemController::class, 'editItem'])->name('edit-item');
//Route updateItem
Route::put('/update-item/{id}', [ItemController::class, 'updateItem'])->name('update-item');
//Route destroyItem
Route::delete('/destroy-item/{id}', [ItemController::class, 'destroyItem'])->name('destroy-item');
//Route viewByCategori
Route::get('/view-category/{category}', [ItemController::class, 'viewByCategoryItem'])->name('view-category');
//Route getItem
Route::get('/get-item{id}', [ItemController::class, 'getItem']);
//<!--*** ItemController End ***-->

//<!--*** InventoryController Start ***-->
//Route viewInventories
Route::get('/view-inventories', [InventoryController::class, 'viewInventories'])->name('view-inventories');
//Route createInventory
Route::get('/create-inventory', [InventoryController::class, 'createInventory'])->name('create-inventory');
//Route storeInventory
Route::post('/store-inventory', [InventoryController::class, 'storeInventory'])->name('store-inventory');
//Route editInventory
Route::get('/edit-inventory/{id}', [InventoryController::class, 'editInventory'])->name('edit-inventory');
//Route updateInventory
Route::put('/update-inventory/{id}', [InventoryController::class, 'updateInventory'])->name('update-inventory');
//Route destroyInventory
Route::delete('/destroy-inventory/{id}', [InventoryController::class, 'destroyInventory'])->name('destroy-inventory');
//Route getItem
Route::get('/get-item{id}', [InventoryController::class, 'getItem']);
//<!--*** InventoryController End ***-->