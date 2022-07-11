<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('condTerminos');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */










    public function index()
    {
       // return view('home');


       //comento home , para que se redireccione a Monitoreo TKTs en dado caso que eol ususario se conecte con un usuario comun
       
    $tickte = ticket::count(); //0
    $asignado = ticket::where('ticket_state_id', '=', 12)->count(); //1
    $atendido = ticket::where('ticket_state_id', '=', 13)->count(); //2
    $pendienteatc = ticket::where('ticket_state_id', '=', 7)->count(); //3
    $solicitudToner = ticket::where('service_id', '=', 79)->count(); //4
    $espinformacion = ticket::where('ticket_state_id', '=', 15)->count(); //5 
    $abierto = ticket::where('ticket_state_id', '=', 4)->count(); //6
    $cerradosinEX = ticket::where('ticket_state_id', '=', 3)->count(); //7
    $FaltaActaRES = ticket::where('ticket_state_id', '=', 21)->count(); //8
    $NotificadoAlUsuario = ticket::where('ticket_state_id', '=', 11)->count(); //9
    $Entramite = ticket::where('ticket_state_id', '=', 18)->count(); //10
    $cerradoPT = ticket::where('ticket_state_id', '=', 10)->count(); //11
    $cerradoexitosamente = ticket::where('ticket_state_id', '=', 2)->count(); //12
    $porcentajes = array(
      $asignado, $atendido, $pendienteatc, $solicitudToner, $espinformacion,
      $abierto, $cerradosinEX, $FaltaActaRES, $NotificadoAlUsuario, $Entramite, $cerradoPT, $cerradoexitosamente
    );
    $tktsporciento = array();
    foreach ($porcentajes as $porcentaje) {
      $tktsporciento[] = round($porcentaje * 100 / $tickte,2);
    };



    return view('Tickets/Monitoreo_Tickets/Monitoreo_de_Tickets')
      ->with('ticket', $tickte)
      ->with('asignado', $asignado)
      ->with('atendido', $atendido)
      ->with('espinformacion', $espinformacion)
      ->with('pendienteatc', $pendienteatc)
      ->with('solicitudToner', $solicitudToner)
      ->with('abierto', $abierto)
      ->with('FaltaActaRES', $FaltaActaRES)
      ->with('cerradosinEX', $cerradosinEX)
      ->with('NotificadoAlUsuario', $NotificadoAlUsuario)
      ->with('Entramite', $Entramite)
      ->with('cerradoPT', $cerradoPT)
      ->with('cerradoexitosamente', $cerradoexitosamente)
      ->with('porcentajes', $porcentajes)
      ->with('tktsporciento', $tktsporciento);
    }

    public function condTerminos(){

        return view('modals/home/condTerminos');
    }

   
}
