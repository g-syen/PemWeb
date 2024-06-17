<?php

namespace App\Http\Controllers;

use App\Models\GroceryItem;
use App\Models\GroceryHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
// use Illuminate\Contracts\Cookie\Factory as CookieFactory;
use Illuminate\Support\Facades\Cookie;
// use Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use function PHPUnit\Framework\isEmpty;

class GroceryController extends Controller
{
    public function index(Request $request)
    {
        $connection = DB::connection()->getDatabaseName();
        $items = GroceryItem::all();
        $data = $request->session()->all();
        $theme = $data['theme'];
        if($theme=="pinkMode"){
            return view('pinkMode', compact('items'));
        } elseif($theme=="blueMode"){
            return view('blueMode', compact('items'));
        } else{
            return view('greenMode', compact('items'));
        }
    }

    public function getItemDate(Request $request, $date){
        $itemDate = GroceryHistory::where('tanggal', $date)->get();
        if (!$itemDate) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        return response()->json(['message' => 'Items on date received successfully', 'itemDate' => $itemDate]);
    }

    public function toggleCheckbox(Request $request, $id)
    {
        $item = GroceryItem::find($id);
        $items = GroceryHistory::where('itemID', $id)->get();
        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }
        $item->isChecked = $request->isChecked;
        $item->save();
        

        if ($items->isEmpty()) {
            $price = 0;
            $quantity = 0;
            $unit = "Kg";
            return response()->json(['message' => 'Checkbox state updated successfully', 'isChecked' => $item->isChecked, 'item_name' => $item->item_name, 'price' => $price, 'quantity' => $quantity, 'unit' => $unit]);
        }
        
        // Return the updated isChecked state along with a success message
        return response()->json(['message' => 'Checkbox state updated successfully', 'isChecked' => $item->isChecked, 'item_name' => $item->item_name, 'price' =>$items[0]->price, 'quantity' =>$items[0]->quantity, 'unit' =>$items[0]->unit]);
    }

    public function changeTheme(Request $request, $theme)
    {
        if ($request->isJson()) {
            $data = $request->json()->all();
            $theme = $data["theme"];
            session(['theme' => $theme]);
            return response()->json(['received' => true, 'theme' => $theme], 200);
        }
        // Return the updated isChecked state along with a success message
        return response('Not a JSON request', 400);

    }

    public function storeBarang(Request $request){
        $data = $request->validate([
            'text' => 'required|string'
        ]);
    
        // Create new item in the database
        $newItem = GroceryItem::create([
            'item_name' => $data['text'],
            'isChecked' => false // Assuming default value for a new item
        ]);
    
        // Optionally return a JSON response
        return response()->json(['success' => true, 'item' => $newItem]);
    }
}
