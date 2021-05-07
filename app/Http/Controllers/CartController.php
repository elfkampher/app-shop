<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    public function update()
    {
    	$client = auth()->user();
    	$cart = $client->cart;    	
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now();
    	$cart->save();

    	$admins= User::where('admin', true)->get();
    	Mail::to($admins)->send(new NewOrder($client, $cart));

    	Alert::success('Transacción Exitosa', 'Tu pedido ha sido registrado correctamente, te contactaremos pronto via email');
    	return back();
    }
}
