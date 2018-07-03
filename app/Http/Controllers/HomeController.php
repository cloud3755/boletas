<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valuador;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function create(Request $request)
    {
      //es para ligarlo a una tabla
      //$valuador = new Valuador;
      $claveencri="";
      $descuento;
      //se obtiene la clave conforme la tien el ingeniero
      $clave=rand(10,99);
      $clave=$clave.substr($request->descuento,0,1).substr($request->sucursal,0,1).substr($request->descuento,1,1).
      substr($request->sucursal,1,1).substr($request->descuento,3,1).substr($request->sucursal,2,1).substr(date("d"),1,1).substr(date("d"),0,1).substr(date("m"),1,1);
      //se encripta la clave

        for($i=0;$i<strlen($clave);$i++)
        {
          if ($clave[$i]=="0")
	          $claveencri=$claveencri."$";

          if ($clave[$i]=="1")
            $claveencri=$claveencri."K";

          if ($clave[$i]=="2")
            $claveencri=$claveencri."W";

          if ($clave[$i]=="3")
            $claveencri=$claveencri."Q";

          if ($clave[$i]=="4")
            $claveencri=$claveencri."8";

          if ($clave[$i]=="5")
            $claveencri=$claveencri."8";

          if ($clave[$i]=="6")
            $claveencri=$claveencri."Z";

          if ($clave[$i]=="7")
            $claveencri=$claveencri."P";

          if ($clave[$i]=="8")
            $claveencri=$claveencri."X";

          if ($clave[$i]=="9")
            $claveencri=$claveencri."0";
        }

      //dd(substr($clave,0,2));
      //$valores = $valuador->all();
      return view('home',compact('claveencri'));
    }
}
