<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
class KategorijaController extends Controller
{
   public function odabir(Request $request)
   {
   	$value=$request->get('izaberi');
   	
	$cookie = Cookie::queue('kategorija', $value);
	return redirect('admin');
   }
}
