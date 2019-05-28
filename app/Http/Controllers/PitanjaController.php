<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use App\Http\Requests;
use Cookie;
use App\Question;
class PitanjaController extends Controller
{
	public function index() 
	{
		$cookie=Cookie::get('kategorija');
      $pitanje=Question::where('kategorija','=', $cookie)->orderBy('id','asc')->get();
      $niz=[];
      return view('pitanja',['pitanje'=>$pitanje,'pogresnaPitanja'=>$niz]);
   }

   public function provera(Request $request)
   {
      $cookie=Cookie::get('kategorija');
   	$pitanja=Question::where('kategorija','=', $cookie)->orderBy('id','asc')->get();
      $tacnaPitanja =[];
      $netacnaPitanja =[];

      
      foreach ($pitanja as $pitanje) {
         // dd(gettype(strval($pitanje['id'])));
         $this->validate($request, [
            strval($pitanje['id']) => 'required'
         ]);
        $tacnaPitanja[$pitanje['id']] = $pitanje['odgovor'];
      }
      
     foreach ($pitanja as $pitanje) {
        $netacnaPitanja[$pitanje['id']] = $request->input($pitanje['id']);
        
      }
      
      print_r(array_diff_assoc($tacnaPitanja, $netacnaPitanja));
      $brojacNetacnih= count(array_diff_assoc($tacnaPitanja, $netacnaPitanja));
      $brojPitanja=Question::where('kategorija','=', $cookie)->count();
      $broj=$brojPitanja-$brojacNetacnih;
      User::where('id','=', Auth::user()->id)->update(['broj_bodova'=>$broj]);
      $korisnici= Auth::user()->id;
      session(['korisnici'=>$korisnici]);
      return redirect('home');

   }
   
   public function provera_korisnika()
   {
      $value=session('korisnici');
      if(Auth::user()->id==$value)
      {
         return redirect('/home');
      }
      return redirect('/pitanja');
   }

}