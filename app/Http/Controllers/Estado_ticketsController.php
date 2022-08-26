<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\ModelHasRole;
use App\Requests\UserRequest;
use Yajra\Datatables\Datatables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\ConexionBD2;
use App\ticket;
use Illuminate\Support\Collection;
use stdClass;


class Estado_ticketsController extends Controller

{

/*Cantidad de ticket que hay actualmente todos*/
public function contticket(){
  $ticketcount = ticket::count();
  return $ticketcount;
}

  public function __construct()
  {
      $this->middleware('auth');
  }

  
  // Tickets Abiertos 
  public function tickets_abiertos()
  {
   
    $abierto = ticket::where('ticket_state_id', '=', 4)->count(); /* le primer where se refiere al estado del ticket */    
    $tktporcento = round(($abierto*100)/$this->contticket(),2);
    $nom_tkt_estatus = "Tickets Abiertos ";      
    $tktporcenttot= 100-$tktporcento;
    
    return view('Tickets/tickets_abiertos')
      ->with('ticket', $this->contticket())
      ->with('abierto', $abierto)
      ->with('tktporcento',$tktporcento)
      ->with('nom_tkt_estatus',$nom_tkt_estatus)  
      ->with('tktporcenttot',$tktporcenttot)  
      ;}

  public function data_tickets_abiertos()
  {
    $usuario = auth()->user()->area;
    $tickets_abiertos_area = DB::connection('pgsql2')
      ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
          FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
          INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
          INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
          WHERE ticket_state_id = 4 AND queue_id IN ($usuario)                           
          ORDER BY ticket.tn DESC");
    return Datatables::of($tickets_abiertos_area)->toJson();
  }

  

  public function tickets_asignados()
  {
    
    $ticket = DB::connection('pgsql2')->table('ticket')->count();
    $asignado = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id', '=', 12)->count();
    $tktporcento = round(($asignado*100)/$ticket,2);       
    $tktporcenttot= 100-$tktporcento;
    $nom_tkt_estatus = "Tickets Asignados";
    
    // dd(auth()->user()->id_rol);
    
    return view('Tickets/tickets_asignados')
      ->with('ticket', $ticket)
      ->with('asignado', $asignado)
      ->with('nom_tkt_estatus' ,$nom_tkt_estatus)
      ->with('tktporcenttot',$tktporcenttot)
      ->with('tktporcento',$tktporcento);
  }

  public function data_ticket_asignado()
  {
    $usuario = auth()->user()->area;
    $tkasignado =  DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 12 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
    return Datatables::of($tkasignado)->toJson();;
  }

  // Tickets Atendidos
  public function tickets_atendidos()
  {
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
    $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id', '=', 13)->count();
    $tktporcento = round(($atendido*100)/$tickte,2);           
    $tktporcenttot= 100-$tktporcento;
    $nom_tkt_estatus = "Tickets Atendidos ";
    return view('Tickets/tickets_atendidos')
      ->with('ticket', $tickte)
      ->with('atendido', $atendido)
      ->with('nom_tkt_estatus' ,$nom_tkt_estatus)
      ->with('tktporcento',$tktporcento)
      ->with('tktporcenttot',$tktporcenttot)
  ;}

  public function data_tickets_atendidos()
  {
    $usuario = auth()->user()->area;
    $tkatendidos = DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre ,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 13 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
    return Datatables::of($tkatendidos)->toJson();;
  }
  // Tickets Cerrados Exitosamente 

  public function tickets_cerrados_exitosamente()
  {
    $ticket = DB::connection('pgsql2')->table('ticket')->count();
    $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id', '=', 2)->count();
    $tktporcento = round(($rticket*100)/$ticket,2);            
    $tktporcenttot= 100-$tktporcento;
    $nom_tkt_estatus = "Tickets Cerrados Exitosamente";
    return view('Tickets/tickets_cerrados_exitosamente')
      ->with('ticket', $ticket)
      ->with('rticket', $rticket)
      ->with('nom_tkt_estatus' ,$nom_tkt_estatus)
      ->with('tktporcento',$tktporcento)
      ->with('tktporcenttot',$tktporcenttot);
      
  }
  public function datatickets_cerrados_exitosamente()
  {
    $usuario = auth()->user()->area;
    $tickets_cerrados_exitosamente = DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 2 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
    return Datatables::of($tickets_cerrados_exitosamente)->toJson();
  }










  // Todos los Tickets
  public function todos_los_tkts()
  {
    // ingresar la tabla de todos los tkts
    $ticket = DB::connection('pgsql2')->table('ticket')->count();
    $nom_tkt_estatus = "Todos Los Tickets ";
    return view('Tickets/todos_los_tickets')
    ->with('ticket', $ticket)
    ->with('nom_tkt_estatus',$nom_tkt_estatus);

  }

  public function data_todos_losticket()
  {
    $usuario = auth()->user()->area;
    $tickets_totales = DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE queue_id IN ($usuario)                           
        ORDER BY ticket.create_time DESC");
    return Datatables::of($tickets_totales)->toJson();
  }

  //Tickets Cerrados Por Tiempo         
  public function tickets_cerradosPT()
  {
    $tickte = DB::connection('pgsql2')->table('ticket')->count();
    $cerradoPT = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id', '=', 10)->count();
    $nom_tkt_estatus = "Tickets Cerrados Por Tiempo";
    $tktporcento = round(($cerradoPT*100)/$tickte,2);
    $tktporcenttot= 100-$tktporcento;
    
    return view('Tickets/tickets_cerradosPT')
      ->with('ticket', $tickte)
      ->with('cerradoPT', $cerradoPT)
      ->with('nom_tkt_estatus',$nom_tkt_estatus)
      ->with('tktporcento',$tktporcento)
      ->with('tktporcenttot',$tktporcenttot);
  }

  public function data_tickets_cerradosPT()
  {
    $usuario = auth()->user()->area;
    $tickets_cerradosPT =DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 10 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
    return Datatables::of($tickets_cerradosPT)->toJson();
  }

  //Tickets Espera De informacion 
  public function tickets_espera_informacion()
  {
    $ticket = ticket::count();
    $ticket_espera_info = ticket::where('ticket_state_id', '=', 15)->count();
    $nom_tkt_estatus = "Tickets Espera de Informacion";
    $tktporcento = round(($ticket_espera_info*100)/$ticket,2);               
    $tktporcenttot= 100-$tktporcento;
    return view('Tickets/tickets_espera_informacion')
      ->with('ticket', $ticket)
      ->with('ticket_espera_info', $ticket_espera_info)
      ->with('nom_tkt_estatus',$nom_tkt_estatus)
      ->with('tktporcento',$tktporcento)
      ->with('tktporcenttot',$tktporcenttot);
  }

  public function data_tickets_espera_informacion()
  {
    $usuario = auth()->user()->area;
    $tkts_espera_info = DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 15 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
    return Datatables::of($tkts_espera_info)->toJson();
  }
  //Tickets Falta Acta Reponsiva 
  public function falta_acta_responsiva()
  {
    $ticket = ticket::count();
    $FaltaActaRES = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id', '=', 21)->count();
    $nom_tkt_estatus = "Tickets Falta Acta Responsiva";
    $tktporcento = round(($FaltaActaRES*100)/$ticket,2);
    $tktporcenttot= 100-$tktporcento;
    return view('Tickets/tickets_falta_acta_resp')
      ->with('ticket', $ticket)
      ->with('FaltaActaRES', $FaltaActaRES)
      ->with('nom_tkt_estatus',$nom_tkt_estatus)
      ->with('tktporcento',$tktporcento)
      ->with('tktporcenttot',$tktporcenttot)
      ;
  }
  public function data_falta_acta_responsiva()
  {
    $usuario = auth()->user()->area;
    $tickets_falta_acta_responsiva = DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 21 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
    return Datatables::of($tickets_falta_acta_responsiva)->toJson();
  }
  // Tickets Notificado al Usuario 
  public function notificado_al_usuario()
  {
    $ticket = ticket::count();
    $NotificadoAlUsuario = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 11)->count();
    $nom_tkt_estatus = "Tickets Notificado al Usuario";
    $tktporcento = round(($NotificadoAlUsuario*100)/$ticket,2);
    $tktporcenttot= 100-$tktporcento;
    return view('Tickets/tickets_notificado_al_usuario')
      ->with('ticket', $ticket)
      ->with('NotificadoAlUsuario', $NotificadoAlUsuario)
      ->with('nom_tkt_estatus',$nom_tkt_estatus)
      ->with('tktporcento',$tktporcento)
      ->with('tktporcenttot',$tktporcenttot);
  }

  public function data_notificado_al_usuario()
  {
    $usuario = auth()->user()->area;
    $tickets_notificadosalusuario =  DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 11 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
    return Datatables::of($tickets_notificadosalusuario)->toJson();
  }
  // Ticket Nuevo Ticket
  public function nuevoticket()
  {
    $nticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id', '=', 7)->count();
    $ticket = DB::connection('pgsql2')->table('ticket')->count();
    $nom_tkt_estatus = "Tickets Nuevos";
    $tktporcento = round(($nticket*100)/$ticket,2);
    $tktporcenttot= 100-$tktporcento;
    return view('Tickets/tickets_nuevos')
      ->with('nticket', $nticket)
      ->with('ticket', $ticket)
      ->with('nom_tkt_estatus',$nom_tkt_estatus)
      ->with('tktporcento',$tktporcento)
      ->with('tktporcenttot',$tktporcenttot);
  }

  public function data_nuevoticket()
  {
     $usuario = auth()->user()->area;
    $ticket_nuevo =  DB::connection('pgsql2')
    ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 1 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
    return Datatables::of($ticket_nuevo)->toJson();
  }
  // Ticket Monitoreo de Tickte 
  
  public function monitoreo_tickets()
  {
    
    
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


  // Ticket Solicitu de Toner             
  public function solicitud_toner()
  {
    
      // Para La Grafica de Area 
      // Se obtienen las areas con las que se cuenta en la tabla queue solo el ID 
    $areas_filastkts=DB::connection('pgsql2')->table('queue')->select('id','name')->orderBy('id','ASC')->get();
     // Se transforma de un arreglo de objetos a un arreglo de con solo para obtener el id de las areas 
     $area_f=[]; 
       foreach($areas_filastkts as $fila){
          $area_f[]=$fila->id;        
       };       
       $n=0;
       foreach( $area_f as $areas_ids){       
       $areas_filastkts[$n]->coun=DB::connection('pgsql2')->table('ticket')
       ->where('queue_id','=',$areas_ids)
       ->where('service_id','=',79)
       ->orwhere('service_id','=',78)
       ->count();
        $n++;
       } 

       // Fin Para La Grafica de Area 

       // Grafica por estado 
        $estado_graf=DB::connection('pgsql2')->table('ticket_state')->select('id','name')->orderBy('id','ASC')->get();
        $estado_id=[];
       
        foreach($estado_graf as $estado){
          $estado_id[]=$estado->id;

        };

        
        $num=0;
        foreach ($estado_id as $estadoid) {
          $estado_graf[$num]->conteo=DB::connection('pgsql2')->table('ticket')
          ->where('ticket_state_id','=',$estadoid)
          ->where('service_id','=',79)
          ->orwhere('service_id','=',78)
          ->count();
          $num++;

        }
        $num=0;
        foreach ($estado_graf as $estadiesp ){
          if ($estadiesp->name == "new") {
            $estado_graf[$num]->name = "nuevo";
            
          }elseif ($estadiesp->name == "closed successful") {
            $estado_graf[$num]->name = "Cerrado exitosamente";
          }elseif($estadiesp->name == "open"){
            $estado_graf[$num]->name ="Abierto";
          }
          $num++;
        }

       // Grafica por estado FIn 
     
       $ticketfusion =DB::connection('pgsql2')
       
       ->select("SELECT
       ticket.tn,ticket_history.ticket_id,ticket.title,queue.name as fila,
       
       ARRAY_AGG (
         ticket_history.name
       )ticket_compuesto,
       ticket_state.name,
       ticket.create_time
     FROM 
       (ticket_history INNER JOIN ticket ON ticket_history.ticket_id = ticket.id)
       INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
       INNER JOIN queue ON ticket.queue_id = queue.id
       WHERE 
        (ticket.service_id = 79 or ticket.service_id = 78)
     and (ticket_history.name LIKE '%ITSMReviewRequired64%'or ticket_history.name LIKE '%ITSMReviewRequired65%' or ticket_history.name LIKE '%ITSMReviewRequired7%' 
       or ticket_history.name LIKE '%ITSMReviewRequired66%' or ticket_history.name LIKE '%ITSMReviewRequired67%' or ticket_history.name LIKE '%ITSMReviewRequired35%'
       or ticket_history.name LIKE '%ITSMReviewRequired34%' or  ticket_history.name LIKE '%ITSMReviewRequired56%' or ticket_history.name LIKE '%ITSMReviewRequired%57'
       or ticket_history.name LIKE '%%ITSMReviewRequired53%%' or ticket_history.name LIKE '%ITSMReviewRequired53%' or ticket_history.name LIKE '%%ITSMReviewRequired57%%'
       or ticket_history.name LIKE '%%ITSMReviewRequired60%%' or ticket_history.name LIKE '%%ITSMReviewRequired61%%'
       )
       
        and (ticket_history.name NOT LIKE '%ITSMReviewRequired71%'and ticket_history.name NOT LIKE '%ITSMReviewRequired70%'and ticket_history.name NOT LIKE '%ITSMReviewRequired72%'
        and ticket_history.name NOT LIKE '%ITSMReviewRequired73%'and ticket_history.name NOT LIKE '%ITSMReviewRequired74%'and ticket_history.name NOT LIKE '%ITSMReviewRequired75%'
        and ticket_history.name NOT LIKE '%ITSMReviewRequired76%'and ticket_history.name NOT LIKE '%ITSMReviewRequired77%'and ticket_history.name NOT LIKE '%ITSMReviewRequired78%'
        and ticket_history.name NOT LIKE '%ITSMReviewRequired79%' )
     
     GROUP BY 
       ticket_id,
       ticket.create_time,
       ticket.title,
       ticket.tn,
       ticket_history.ticket_id,
       ticket_state.name,
       queue.name
       
     ORDER BY ticket.tn DESC");
     $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
     $tickte = DB::connection('pgsql2')->table('ticket')->count();
   
        


    return view('Tickets/tickets_sol_toner')
      ->with('tk_id', $ticketfusion)
      ->with('solicitudToner', $solicitudToner)
      ->with('ticket', $tickte)
      ->with('areas_filastkts',$areas_filastkts)
      ->with('estado_graf',$estado_graf)
 
   ;}





































   /* Codigo para tkt sol toner ajax*/



  public function soltonerjax(){
    $tktsoltoner_fucion = DB::connection('pgsql2')->select("SELECT
  ticket.tn,ticket_history.ticket_id,ticket.title,queue.name as fila,    
  ARRAY_AGG (
    ticket_history.name
  )ticket_compuesto,
  ticket_state.name,
  ticket.create_time
FROM 
  (ticket_history INNER JOIN ticket ON ticket_history.ticket_id = ticket.id)
  INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
  INNER JOIN queue ON ticket.queue_id = queue.id

  WHERE 
   (ticket.service_id = 79 OR ticket.service_id = 78)
and (ticket_history.name LIKE '%ITSMReviewRequired64%'or ticket_history.name LIKE '%ITSMReviewRequired65%' or ticket_history.name LIKE '%ITSMReviewRequired7%' 
  or ticket_history.name LIKE '%ITSMReviewRequired66%' or ticket_history.name LIKE '%ITSMReviewRequired67%' or ticket_history.name LIKE '%ITSMReviewRequired35%'
  or ticket_history.name LIKE '%ITSMReviewRequired34%' or  ticket_history.name LIKE '%ITSMReviewRequired56%' or ticket_history.name LIKE '%ITSMReviewRequired%57'
  or ticket_history.name LIKE '%%ITSMReviewRequired53%%' or ticket_history.name LIKE '%ITSMReviewRequired53%' or ticket_history.name LIKE '%%ITSMReviewRequired57%%' 
  or ticket_history.name LIKE '%%ITSMReviewRequired60%%' or ticket_history.name LIKE '%%ITSMReviewRequired61%%' or ticket_history.name LIKE '%%ITSMReviewRequired62%%'
  or ticket_history.name LIKE '%%ITSMReviewRequired63%%' or ticket_history.name LIKE '%%ITSMReviewRequired71%%' or ticket_history.name LIKE '%%ITSMReviewRequired70%%'
  )
  
   and (ticket_history.name NOT LIKE '%ITSMReviewRequired72%'
   and ticket_history.name NOT LIKE '%ITSMReviewRequired73%'and ticket_history.name NOT LIKE '%ITSMReviewRequired74%'and ticket_history.name NOT LIKE '%ITSMReviewRequired75%'
   and ticket_history.name NOT LIKE '%ITSMReviewRequired76%'and ticket_history.name NOT LIKE '%ITSMReviewRequired77%'and ticket_history.name NOT LIKE '%ITSMReviewRequired78%'
   and ticket_history.name NOT LIKE '%ITSMReviewRequired79%' )

GROUP BY 
  ticket_id,
  ticket.create_time,
  ticket.title,
  ticket.tn,
  ticket_history.ticket_id,
  ticket_state.name,
  queue.name
  
ORDER BY ticket.tn DESC");
$n=0;

foreach ($tktsoltoner_fucion as $tktcompusto) {
  $eliminados1 = preg_replace('/FieldName/','',$tktcompusto->ticket_compuesto);
  $eliminados2 = preg_replace('/[\&\$\{\}""]+/','',$eliminados1);
  $eliminados  = preg_replace('/ITSMReview/','',$eliminados2);
  $eliminados3 = preg_replace('/@/','',$eliminados);
  $eliminados4 = preg_replace('/#/','',$eliminados3);
  $eliminados5 = preg_replace('/a-Vacio/','',$eliminados4);
  $eliminados6 = preg_replace('/%%Value%%/','',$eliminados5);
  $eliminados7 = preg_replace('/%%OldValue%%0/',' ',$eliminados6);
  $modificacion8 = preg_replace('/%%OldValue%%/',' ',$eliminados7);
  $tktsoltoner_fucion[$n]->limpio= array_pad(explode(',',$modificacion8),25," ");   
  $n++;

}
$i=0;
foreach ($tktsoltoner_fucion as $sacando_dato) {  
  foreach ($sacando_dato->limpio as $otroarreglo) {    

   
    



    if(strncasecmp($otroarreglo,'%%%%Required7',13)===0){
       $tktsoltoner_fucion[$i]->dependencia= preg_replace('/%%%%Required7/',' ',$otroarreglo);                                                                                
      }
    if(strncasecmp($otroarreglo,'%%%%Required64',14)===0){
      $tktsoltoner_fucion[$i]->cantidad1 = (int)preg_replace ('/%%%%Required64/',' ',$otroarreglo);
    }
    if(strncasecmp($otroarreglo,'%%%%Required65',14)===0){
      $tktsoltoner_fucion[$i]->Tipo_toner1= preg_replace('/%%%%Required65/',' ',$otroarreglo);                                        
    }
    if(strncasecmp($otroarreglo,'%%%%Required66',14)===0){
      $tktsoltoner_fucion[$i]->cantidad2 =(int) preg_replace ('/%%%%Required66/',' ',$otroarreglo);                                           
    }
    if(strncasecmp($otroarreglo,'%%%%Required67',14)===0){
      $tktsoltoner_fucion[$i]->tipotoner2 = preg_replace ('/%%%%Required67/',' ',$otroarreglo);                                                                                       
    }
    if(strncasecmp($otroarreglo,'%%%%Required68',14)===0){
      $tktsoltoner_fucion[$i]->cantidad3 = preg_replace ('/%%%%Required68/',' ',$otroarreglo);
    }
    if(strncasecmp($otroarreglo,'%%%%Required69' ,14)===0){                                      
      $tktsoltoner_fucion[$i]->tipotoner3 = preg_replace('/%%%%Required69/',' ',$otroarreglo); 
    }
    if(strncasecmp($otroarreglo,'%%%%Required34',14)===0){
      $tktsoltoner_fucion[$i]->comentario_entrega = preg_replace ('/%%%%Required34/',' ',$otroarreglo);                                                             
    }
    if(strncasecmp($otroarreglo,'%%%%Required35',14)===0){
      $tktsoltoner_fucion[$i]->cantidadtonerentregado1 = (int)preg_replace('/%%%%Required35/',' ',$otroarreglo);                                       
    }      
    if(strncasecmp($otroarreglo,'%%%%Required53',14)===0){
      $tktsoltoner_fucion[$i]->tipotonerentregado1 = preg_replace('/%%%%Required53/','',$otroarreglo);                                          
    }
    if(strncasecmp($otroarreglo,'%%%%Required56',14)===0){
      $tktsoltoner_fucion[$i]->cantidadtonerentregado2 = (int)preg_replace('/%%%%Required56/',' ',$otroarreglo);                                       
    }
    if(strncasecmp($otroarreglo,'%%%%Required57',14)===0){
      $tktsoltoner_fucion[$i]->tipotonerentregado2 = preg_replace('/%%%%Required57/','',$otroarreglo);                                          
    }
    if(strncasecmp($otroarreglo,'%%%%Required60',14)===0){
      $tktsoltoner_fucion[$i]->cantidadtonerentregado3 = (int)preg_replace('/%%%%Required60/',' ',$otroarreglo);                                       
    }
    if(strncasecmp($otroarreglo,'%%%%Required61',14)===0){
      $tktsoltoner_fucion[$i]->tipotonerentregado3 = preg_replace('/%%%%Required61/',' ',$otroarreglo);                                       
    }
    if(strncasecmp($otroarreglo,'%%%%Required62',14)===0){
      $tktsoltoner_fucion[$i]->cantidadtonerentregado4 = preg_replace('/%%%%Required62/',' ',$otroarreglo);                                       
    }
    if(strncasecmp($otroarreglo,'%%%%Required63',14)===0){
      $tktsoltoner_fucion[$i]->tipotonerentregado4 = preg_replace('/%%%%Required63/',' ',$otroarreglo);                                       
    }
    if(strncasecmp($otroarreglo,'%%%%Required70',14)===0){
      $tktsoltoner_fucion[$i]->Solicitado4 = preg_replace('/%%%%Required70/',' ',$otroarreglo);                                       
    }
    if(strncasecmp($otroarreglo,'%%%%Required71',14)===0){
      $tktsoltoner_fucion[$i]->SolicitadoTipo4=preg_replace('/%%%%Required71/',' ',$otroarreglo);                                       
    }
  }  
  
  $i++;
}

dd($tktsoltoner_fucion);

     return Datatables::of($tktsoltoner_fucion)->toJson();
  ;}
}
class ticket_creado {
  public $id;
  public $nombre;
  public $pais;

}


