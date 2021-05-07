<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
use RealRashid\SweetAlert\Facades\Alert;


class CartDetailController extends Controller
{
    public function store(Request $request)    {


    	$CartDetail = new CartDetail();
    	$CartDetail->cart_id = auth()->user()->cart->id;
    	$CartDetail->product_id = $request->product_id;
    	$CartDetail->quantity = $request->quantity;
    	$CartDetail->save(); 

        Alert::success('Producto Añadido', 'El producto ha sido ingresado correctamente al carrito de compras');
    	return back();   	
    	
    }

    public function destroy(Request $request)
    {
        /*$cartDetail = CartDetail::find($request->cart_detail_id);
        if($cartDetail->cart_id == auth()->user()->cart->id)
            $cartDetail->delete();*/

         

        Alert::warning('Producto Eliminado', 'El producto ha sido eliminado correctamente del carrito de compras');
        return back();
    }

}
