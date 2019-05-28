<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;
use App\Http\Requests;
use Cookie;
use App\Question;

class VezbaController extends Controller
{
    public function index() 
	{
	  $cookie=Cookie::get('kategorija');
      $pitanje=Question::where('kategorija','=', $cookie)->orderBy('id','asc')->get();
      $niz=[];
      return view('vezba',['pitanje'=>$pitanje,'pogresnaPitanja'=>$niz]);
   }

   public function provera(Request $request)
   {
      $cookie=Cookie::get('kategorija');
   	  $pitanja=Question::where('kategorija','=', $cookie)->orderBy('id','asc')->get();
      $tacnaPitanja =[];
      $netacnaPitanja =[];

      foreach ($pitanja as $pitanje) {
        $tacnaPitanja[$pitanje['id']] = $pitanje['odgovor'];
      }
      
     foreach ($pitanja as $pitanje) {
        $netacnaPitanja[$pitanje['id']] = $request->input($pitanje['id']);
        
      }
      // $p=[];
      // foreach ($pitanja as $pitanje) {
      //    $p[$pitanje['id']] = $p[$pitanje['pitanje']];
         
      //  }
      // dd($p);
      
     // print_r(array_diff_assoc($tacnaPitanja, $netacnaPitanja));
      $brojacNetacnih= count(array_diff_assoc($tacnaPitanja, $netacnaPitanja));
      $brojPitanja=Question::where('kategorija','=', $cookie)->count();
      $broj=$brojPitanja-$brojacNetacnih;
      return( "Broj vasih bodova na ovoj vezbi je $broj");
      //User::where('id','=', Auth::user()->id)->update(['broj_bodova'=>$broj]);
      return redirect('home');

   }

}

