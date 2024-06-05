<?php

namespace App\Http\Controllers\Merchant\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function addMenu(Request $request){

        $auth = auth()->user()->id;


        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image',
            'qty' => 'required|integer',
        ]);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        $menu->image = $request->image->store('menu-images');
        $menu->user_id = $auth;
        $menu->qty = $request->qty;
        $menu->save();

        redirect()->route('merchant.menu');
    }

    public function updateMenu(Request $request, $id){
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image' => 'image',
            'merchantId' => 'required|integer',
        ]);

        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->price = $request->price;
        $menu->description = $request->description;
        if($request->hasFile('image')){
            $menu->image = $request->image->store('menu-images');
        }
        $menu->merchantId = $request->merchantId;
        $menu->save();

        return response()->json([
            'message' => 'Menu updated successfully',
        ], 200);
    }

    public function deleteMenu($id){
        $menu = Menu::find($id);
        $menu->delete();

        return response()->json([
            'message' => 'Menu deleted successfully',
        ], 200);
    }

    public function getMenu()
    {
        $auth = auth()->user()->id;

        // Mengambil menu berdasarkan user_id
        $menus = Menu::where('user_id', $auth)->get();

        // Mengirimkan variabel ke view
        return view('layout.merchant.product.list-menu', compact('menus'));
    }


    // view add menu

    public function addMenuView()
    {
        return view('layout.merchant.product.add-product');
    }
}

