<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use App\Models\GroceryItem;
use App\Models\GroceryHistory;
use Illuminate\Support\Facades\Log;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/data', function (Request $request) {
    if ($request->isJson()) {
        $data = $request->json()->all();
        $barang = $data["barang"];

        $newItem = GroceryItem::create([
            'item_name' => $barang,
            'isChecked' => false // Assuming default value for a new item
        ]);
        $itemID = $newItem->id;
        return response()->json(['received' => true, 'barang' => $barang], 200);
    }
    return response('Not a JSON request', 400);
});

Route::delete('/data', function (Request $request) {
    if ($request->isJson()) {
        $data = $request->json()->all();
        $itemID = $data["itemID"];

        $barang = GroceryItem::find($itemID);
        $barang->delete();
        return response()->json(['received' => true], 200);
    }
    return response('Not a JSON request', 400);
});

Route::get('/data', function (Request $request) {
    $barang = GroceryItem::where('isChecked',0);
    $barang->delete();
    return response()->json(['received' => true], 200);
});

Route::get('/getID', function (Request $request) {
    $newID = GroceryItem::max("id");
    return response()->json(['received' => true, 'newID' => $newID+1], 200);
});

Route::put('/data', function (Request $request) {
    if ($request->isJson()) {
        $data = $request->json()->all();
        $id = $data["id"];
        $barang = $data["barang"];

        $item = GroceryItem::where('id', $id)->update(['item_name'=>$barang]);

        return response()->json(['received' => true, 'barang' => $barang, 'id' => $id], 200);
    }
    return response('Not a JSON request', 400);
});

Route::post('/update', function (Request $request) {
    if ($request->isJson()) {
        $data = $request->json()->all();
        $id = $data["id"];
        $price = $data["price"];
        $unit = $data["unit"];
        $quantity = $data["quantity"];
        $date = $data["date"];
        $item_name = $data["namaBarang"];

        GroceryHistory::upsert(
            [
                ['tanggal' => $date, 'itemID' => $id, 'unit' => $unit, 'quantity' => $quantity, 'price' => $price, 
                'item_name' => $item_name]
            ],
            ['tanggal', 'itemID'],
            ['unit', 'quantity', 'price', 'item_name']
        );
        return response()->json(['received' => true, 'quantity' => $quantity, 'id' => $id, 'price'=>$price, 'unit'=>$unit, 'tanggal'=>$date], 200);
    }
    return response('Not a JSON request', 400);
});

Route::post('/changeTheme', function (Request $request) {
    if ($request->isJson()) {
        $data = $request->json()->all();
        $theme = $data["theme"];
        session()->put('theme', $theme);
        return response()->json(['received' => true, 'theme' => $theme], 200);
    }
    return response('Not a JSON request', 400);
});