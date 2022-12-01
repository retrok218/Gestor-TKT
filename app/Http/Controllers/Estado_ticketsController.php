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
use App\area_n;
use phpDocumentor\Reflection\Types\This;

class Estado_ticketsController extends Controller
{
  public function contticket()
  { /*Cantidad de ticket que hay actualmente todos*/
    $ticketcount = ticket::count();  
    return $ticketcount;
  }


  public function __construct()
  {
      $this->middleware('auth');
  }

//Funcion para obtimizar el codigo con la consulta de los tickets por area 
  public function tktsarea_dtt($estado_tkt, $ususario){
    $tkt_area = DB::connection('pgsql2')
        ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
            FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
            INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
            INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
            WHERE ticket_state_id = $estado_tkt AND queue_id IN ($ususario)                           
            ORDER BY ticket.tn DESC");
    return $tkt_area;
  }


  
  // Tickets Abiertos 
  public function tickets_abiertos()
  {   
    $abierto = ticket::where('ticket_state_id', '=', 4)->count(); /* le primer where se refiere al estado del ticket */    
    $tktporcento = round(($abierto*100)/$this->contticket(),2);
    $nom_tkt_estatus = "Tickets Abiertos ";      
    $tktporcenttot= 100-$tktporcento;  
  
    return view('Tickets/tickets_abiertos')
      ->with(['ticket'=>ticket::count(), // se asigna el count del modelo ticket 
              'abierto'=>$abierto,
              'tktporcento'=>$tktporcento,
              'nom_tkt_estatus'=>$nom_tkt_estatus,
              'tktporcenttot'=>$tktporcenttot
            ]);
  }


// Para La datatable  Datos por medio de ajax se usa la funcion de arriba para generar $asignados 
  public function data_tickets_abiertos()
  {        
    $asignado = $this->tktsarea_dtt(4,auth()->user()->area);    //se obtimisa la consulta a la base de datos pos medio del select 
    return Datatables::of($asignado)->toJson();
  }   




  public function tickets_asignados(Request $request)
  {
    $ff= $request->root();
    $usuario = auth()->user()->area;    
    $asignado = ticket::where('ticket_state_id', '=', 12)->count();
    $tktporcento = round(($asignado*100)/ticket::count(),2);       
    $tktporcenttot= 100-$tktporcento;
    $nom_tkt_estatus = "Tickets Asignados";
    $canttickets = DB::connection('pgsql2')->select ("SELECT  COUNT (*)
      FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
      INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
      INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
      WHERE ticket_state_id = 12 AND queue_id IN ($usuario)");  

    $totalcantJsons = $canttickets[0];    
    $tt =$totalcantJsons->count;
//dd($ff);
   
    return view('Tickets/tickets_asignados')      
      ->with (['canttickets'=>$canttickets,
      'ticket'=>$this->contticket(),
      'asignado'=>$asignado,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcenttot'=>$tktporcenttot,
      'tktporcento'=>$tktporcento,
      'totalMesJsonm'=> $tt,
      'totalMesJsonm'=>$tt ]);
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
    return Datatables::of($tkasignado)->toJson();
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
      ->with(['ticket'=>$tickte,'atendido'=>$atendido,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcento'=>$tktporcento,
      'tktporcenttot'=>$tktporcenttot]);
  }

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
    return Datatables::of($tkatendidos)->toJson();
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
      ->with(['ticket'=>$ticket,
      'rticket'=>$rticket,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcento'=>$tktporcento,
      'tktporcenttot'=>$tktporcenttot]);      
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
    ->with(['ticket'=>$ticket,
    'nom_tkt_estatus'=>$nom_tkt_estatus]);
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
        ORDER BY ticket.create_time DESC limit 30000");
        //dd($tickets_totales);
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
    
    return view('Tickets/tickets_cerradospt')
      ->with(['ticket'=>$tickte,
      'cerradoPT'=>$cerradoPT,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcento'=>$tktporcento,
      'tktporcenttot'=>$tktporcenttot
      ]);
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
      ->with(['ticket'=>$ticket,
      'ticket_espera_info'=>$ticket_espera_info,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcento'=>$tktporcento,
      'tktporcenttot'=>$tktporcenttot      
      ]);
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
      ->with(['ticket'=>$ticket,
      'FaltaActaRES'=>$FaltaActaRES,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcento'=>$tktporcento,
      'tktporcenttot'=>$tktporcenttot]);
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
      ->with(['ticket'=>$ticket,
      'NotificadoAlUsuario'=> $NotificadoAlUsuario,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcento'=>$tktporcento,
      'tktporcenttot'=>$tktporcenttot]);
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
      ->with(['nticket'=>$nticket,
      'ticket'=>$ticket,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcento'=>$tktporcento,
      'tktporcenttot'=>$tktporcenttot      
      ]);
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
      ->with([
      'ticket'=>$tickte,
      'asignado'=>$asignado,
      'atendido'=>$atendido,
      'espinformacion'=>$espinformacion,
      'pendienteatc'=>$pendienteatc,
      'solicitudToner'=>$solicitudToner,
      'abierto'=>$abierto,
      'FaltaActaRES'=> $FaltaActaRES,
      'cerradosinEX'=> $cerradosinEX,
      'NotificadoAlUsuario'=>$NotificadoAlUsuario,
      'Entramite'=>$Entramite,
      'cerradoPT'=>$cerradoPT,
      'cerradoexitosamente'=>$cerradoexitosamente,
      'porcentajes'=>$porcentajes,
      'tktsporciento'=>$tktsporciento,
      ]);
  }
  // Monitoreo por areas LISTO la BUSQUEDA DE DATOS 
  //Consulta ala base de datos OTRS para obtener los grupos por usuarios solo proporciona los que estan activos con subgrupos y se encuentra en algun usuario
  public function monitoreo_tickets_area(){

    $datos_monitoreo_area = DB::connection('pgsql2')       
    ->select(
      ("SELECT DISTINCT  groups.id, groups.name,
      COUNT(ticket.tn) OVER (PARTITION BY groups.id) as TIkets_Area_grupo
      
      
      FROM ticket
      INNER JOIN queue ON ticket.queue_id = queue.id
      INNER JOIN group_user ON queue.group_id = group_user.group_id
      INNER JOIN groups ON group_user.group_id = groups.id
      WHERE ticket_state_id = 12

      GROUP BY 
      groups.id,ticket.tn,
      groups.name
      
      ORDER BY groups.id ASC")

    );

    $sumareas = 0;
      foreach ($datos_monitoreo_area as $datosarea){
        $sumareas+=$datosarea->tikets_area_grupo ;
      }
   
    // consulta a la base de datos OTRS que proporciona las queue que contiene cada grupo de la anterior consulta 
    $subareas = array();    
    $numm=0;
    foreach ($datos_monitoreo_area as $grupoarea) {
      $datos_monitoreo_area[$numm]->subareas = DB::connection('pgsql2')
      ->select(("SELECT queue.id,queue.name,queue.group_id FROM queue
        WHERE queue.group_id = $grupoarea->id       
      "));
      $numm++;
    }

   //dd($datos_monitoreo_area);


//dd($datos_monitoreo_area,$sumareas);
  //  var_dump($subareas[0][0]->name,$subareas[0][0]->id,$subareas[0][0]->group_id);
     //exit;
           
    return view('Tickets/Monitoreo_Tickets/Monitoreo_tickets_area')
    ->with([
      'datos_monitoreo_area'=>$datos_monitoreo_area,
       'sumareas'=>$sumareas,
       'subareas'=>$subareas,
       
       ]) ;
  }


              
  



    public function subclases ($idsubclase,$nombre){
      $nn = $nombre;
      $filass = DB::connection('pgsql2')->table('queue')
      ->where('group_id' , $idsubclase)
      ->get();
      $g=0;
      foreach ($filass as $fila) {
        $filass[$g]->numfila = DB::connection('pgsql2')        
        ->table('ticket')
        ->where('queue_id','=',$fila->id) 
        ->where('ticket_state_id' ,'=' ,12)
        ->count();
        $g++;
      }      
   //dd($idsubclase,$nn);
      return view('modals.modalsubclases')->with(['filass' => $filass, 'nombre' => $nn]);     
    }



    public function area_asignados($idarea){
      $idareaasignado = $idarea;
      $nom_tkt_estatus = "Tickets Area/Asignados";
      //$tktsarea=DB::connection('pgsql2')->table('ticket')->where('queue_id',$arrrrr)->where('ticket_state_id',12)->get();
      
      return view('Tickets.Monitoreo_Tickets.tickets_area_asignados')->with(['nom_tkt_estatus'=>$nom_tkt_estatus,'idareaasignado'=>$idareaasignado]);
    }

    public function data_area_asignados($idarea){
      $tktsarea = DB::connection('pgsql2')
      ->SELECT("SELECT  ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
       FROM (ticket 
        INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
      WHERE ticket_state_id = 12 AND queue_id = $idarea
      ORDER BY ticket.tn DESC");
      //dd( $tktsarea);
      return Datatables::of($tktsarea)->toJson();
    }


    
   



  public function soltonerjax(){
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
          foreach ($ticketfusion as $tktcompusto) {
                  $eliminados1 = preg_replace('/FieldName/','',$tktcompusto->ticket_compuesto);
                  $eliminados2 = preg_replace('/[\&\$\{\}""]+/','',$eliminados1);
                  $eliminados  = preg_replace('/ITSMReview/','',$eliminados2);
                  $eliminados3 = preg_replace('/@/','',$eliminados);
                  $eliminados4 = preg_replace('/#/','',$eliminados3);
                  $eliminados5 = preg_replace('/a-Vacio/','',$eliminados4);
                  $eliminados6 = preg_replace('/%%Value%%/',' ',$eliminados5);
                  $eliminados7 = preg_replace('/%%OldValue%%0/',' ',$eliminados6);
                  $modificacion8 = preg_replace('/%%OldValue%%/',' ',$eliminados7);
                  $ticketfusion[$n]->compuesto= array_pad(explode(',',$modificacion8 ),25," ");
                  $ticketfusion[$n]->dependencia="";
                  $ticketfusion[$n]->cantidad1=0;
                  $ticketfusion[$n]->Tipo_toner1="";
                  $ticketfusion[$n]->cantidad2=0;
                  $ticketfusion[$n]->tipotoner2="";
                  $ticketfusion[$n]->cantidad3=0;
                  $ticketfusion[$n]->tipotoner3="";
                  $ticketfusion[$n]->cantidad4=0;
                  $ticketfusion[$n]->SolicitadoTipo4 ="";
                  $ticketfusion[$n]->comentario_entrega="";
                  $ticketfusion[$n]->cantidadtonerentregado1=0;
                  $ticketfusion[$n]->tipotonerentregado1="";
                  $ticketfusion[$n]->cantidadtonerentregado2=0;
                  $ticketfusion[$n]->tipotonerentregado2="";
                  $ticketfusion[$n]->cantidadtonerentregado3=0;
                  $ticketfusion[$n]->tipotonerentregado3="";
                  $ticketfusion[$n]->cantidadtonerentregado4=0;
                  $ticketfusion[$n]->tipotonerentregado4="";
                  
                //se crean las bariables desde dependencia asta SolicitadoTipo4 ya que el dato puede existir o no con esto se formara una funcion 
                  $n++;     

          }
                $i=0;
             
                
      foreach ($ticketfusion as $sacando_dato) {  
            foreach ($sacando_dato->compuesto as $otroarreglo) {                                    
                  if(strncasecmp($otroarreglo,'%%%%Required7 ',14)===0){
                      $ticketfusion[$i]->dependencia= preg_replace('/%%%%Required7/','',$otroarreglo);                                                                                
                    }
                  if(strncasecmp($otroarreglo,'%%%%Required64',14)===0){
                    $ticketfusion[$i]->cantidad1 = (int)preg_replace ('/%%%%Required64/',' ',$otroarreglo);
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required65',14)===0){
                    $ticketfusion[$i]->Tipo_toner1= preg_replace('/%%%%Required65/',' ',$otroarreglo);                                        
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required66',14)===0){
                    $ticketfusion[$i]->cantidad2 =(int) preg_replace ('/%%%%Required66/',' ',$otroarreglo);                                           
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required67',14)===0){
                    $ticketfusion[$i]->tipotoner2 = preg_replace ('/%%%%Required67/',' ',$otroarreglo);                                                                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required68',14)===0){
                    $ticketfusion[$i]->cantidad3 = preg_replace ('/%%%%Required68/',' ',$otroarreglo);
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required69' ,14)===0){                                      
                    $ticketfusion[$i]->tipotoner3 = preg_replace('/%%%%Required69/',' ',$otroarreglo); 
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required34',14)===0){
                    $ticketfusion[$i]->comentario_entrega = preg_replace ('/%%%%Required34/',' ',$otroarreglo);                                                             
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required35',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado1 = (int)preg_replace('/%%%%Required35/',' ',$otroarreglo);                                       
                  }      
                  if(strncasecmp($otroarreglo,'%%%%Required53',14)===0){
                    $ticketfusion[$i]->tipotonerentregado1 = preg_replace('/%%%%Required53/','',$otroarreglo);                                          
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required56',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado2 = (int)preg_replace('/%%%%Required56/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required57',14)===0){
                    $ticketfusion[$i]->tipotonerentregado2 = preg_replace('/%%%%Required57/','',$otroarreglo);                                          
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required60',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado3 = (int)preg_replace('/%%%%Required60/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required61',14)===0){
                    $ticketfusion[$i]->tipotonerentregado3 = preg_replace('/%%%%Required61/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required62',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado4 = preg_replace('/%%%%Required62/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required63',14)===0){
                    $ticketfusion[$i]->tipotonerentregado4 = preg_replace('/%%%%Required63/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required71',14)===0){
                    $ticketfusion[$i]->SolicitadoTipo4 = preg_replace('/%%%%Required71/','',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required70',14)===0){
                    $ticketfusion[$i]->cantidad4=preg_replace('/%%%%Required70/','',$otroarreglo);                                       
                  }  
                  
                          
          }    
                
        
        $i++;                     
      }   
     
          // dd ($ticketfusion);
     return Datatables::of($ticketfusion)->toJson();
  ;}







public function constot(){
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
          foreach ($ticketfusion as $tktcompusto) {
                  $eliminados1 = preg_replace('/FieldName/','',$tktcompusto->ticket_compuesto);
                  $eliminados2 = preg_replace('/[\&\$\{\}""]+/','',$eliminados1);
                  $eliminados  = preg_replace('/ITSMReview/','',$eliminados2);
                  $eliminados3 = preg_replace('/@/','',$eliminados);
                  $eliminados4 = preg_replace('/#/','',$eliminados3);
                  $eliminados5 = preg_replace('/a-Vacio/','',$eliminados4);
                  $eliminados6 = preg_replace('/%%Value%%/',' ',$eliminados5);
                  $eliminados7 = preg_replace('/%%OldValue%%0/',' ',$eliminados6);
                  $modificacion8 = preg_replace('/%%OldValue%%/',' ',$eliminados7);
                  $ticketfusion[$n]->compuesto= array_pad(explode(',',$modificacion8 ),25," ");
                  $ticketfusion[$n]->dependencia="";
                  $ticketfusion[$n]->cantidad1=0;
                  $ticketfusion[$n]->Tipo_toner1="";
                  $ticketfusion[$n]->cantidad2=0;
                  $ticketfusion[$n]->tipotoner2="";
                  $ticketfusion[$n]->cantidad3=0;
                  $ticketfusion[$n]->tipotoner3="";
                  $ticketfusion[$n]->cantidad4=0;
                  $ticketfusion[$n]->SolicitadoTipo4 ="";
                  $ticketfusion[$n]->comentario_entrega="";
                  $ticketfusion[$n]->cantidadtonerentregado1=0;
                  $ticketfusion[$n]->tipotonerentregado1="";
                  $ticketfusion[$n]->cantidadtonerentregado2=0;
                  $ticketfusion[$n]->tipotonerentregado2="";
                  $ticketfusion[$n]->cantidadtonerentregado3=0;
                  $ticketfusion[$n]->tipotonerentregado3="";
                  $ticketfusion[$n]->cantidadtonerentregado4=0;
                  $ticketfusion[$n]->tipotonerentregado4="";                  
                //se crean las bariables desde dependencia asta SolicitadoTipo4 ya que el dato puede existir o no con esto se formara una funcion 
                  $n++;     
          }
                $i=0;                             
      foreach ($ticketfusion as $sacando_dato) {  
            foreach ($sacando_dato->compuesto as $otroarreglo) {                                    
                  if(strncasecmp($otroarreglo,'%%%%Required7 ',14)===0){
                      $ticketfusion[$i]->dependencia= preg_replace('/%%%%Required7/','',$otroarreglo);                                                                                
                    }
                  if(strncasecmp($otroarreglo,'%%%%Required64',14)===0){
                    $ticketfusion[$i]->cantidad1 = (int)preg_replace ('/%%%%Required64/',' ',$otroarreglo);
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required65',14)===0){
                    $ticketfusion[$i]->Tipo_toner1= preg_replace('/%%%%Required65/',' ',$otroarreglo);                                        
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required66',14)===0){
                    $ticketfusion[$i]->cantidad2 =(int) preg_replace ('/%%%%Required66/',' ',$otroarreglo);                                           
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required67',14)===0){
                    $ticketfusion[$i]->tipotoner2 = preg_replace ('/%%%%Required67/',' ',$otroarreglo);                                                                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required68',14)===0){
                    $ticketfusion[$i]->cantidad3 = preg_replace ('/%%%%Required68/',' ',$otroarreglo);
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required69' ,14)===0){                                      
                    $ticketfusion[$i]->tipotoner3 = preg_replace('/%%%%Required69/',' ',$otroarreglo); 
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required34',14)===0){
                    $ticketfusion[$i]->comentario_entrega = preg_replace ('/%%%%Required34/',' ',$otroarreglo);                                                             
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required35',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado1 = (int)preg_replace('/%%%%Required35/',' ',$otroarreglo);                                       
                  }      
                  if(strncasecmp($otroarreglo,'%%%%Required53',14)===0){
                    $ticketfusion[$i]->tipotonerentregado1 = preg_replace('/%%%%Required53/',' ',$otroarreglo);                                          
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required56',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado2 = (int)preg_replace('/%%%%Required56/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required57',14)===0){
                    $ticketfusion[$i]->tipotonerentregado2 = preg_replace('/%%%%Required57/',' ',$otroarreglo);                                          
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required60',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado3 = (int)preg_replace('/%%%%Required60/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required61',14)===0){
                    $ticketfusion[$i]->tipotonerentregado3 = preg_replace('/%%%%Required61/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required62',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado4 = preg_replace('/%%%%Required62/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required63',14)===0){
                    $ticketfusion[$i]->tipotonerentregado4 = preg_replace('/%%%%Required63/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required71',14)===0){
                    $ticketfusion[$i]->SolicitadoTipo4 = preg_replace('/%%%%Required71/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required70',14)===0){
                    $ticketfusion[$i]->cantidad4=preg_replace('/%%%%Required70/',' ',$otroarreglo);                                       
                  }                                              
          }                            
        $i++;                     
      }
      return $ticketfusion;
}
public function kyocesrapaño($anno){
  $fecha_actual = Carbon::now()->toDateString();
  $fecha_mes = Carbon::now()->format('m');
  $fecha_dia = Carbon::now()->format('d');
  $fecha_año = Carbon::now()->format('Y');

  $ticketfusion=DB::connection('pgsql2')       
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
                WHERE     tn ='10004197'                                         and
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
                  and( extract(year from ticket.create_time) = $anno)  

                GROUP BY 
                  ticket_id,
                  ticket.create_time,
                  ticket.title,
                  ticket.tn,
                  ticket_history.ticket_id,
                  ticket_state.name,
                  queue.name       
                ORDER BY ticket_id ASC,create_time DESC");                
                $n=0;
          foreach ($ticketfusion as $tktcompusto) {
                  $eliminados1 = preg_replace('/FieldName/','',$tktcompusto->ticket_compuesto);
                  $eliminados2 = preg_replace('/[\&\$\{\}""]+/','',$eliminados1);
                  $eliminados  = preg_replace('/ITSMReview/','',$eliminados2);
                  $eliminados3 = preg_replace('/@/','',$eliminados);
                  $eliminados4 = preg_replace('/#/','',$eliminados3);
                  $eliminados5 = preg_replace('/a-Vacio/','',$eliminados4);
                  $eliminados6 = preg_replace('/%%Value%%/',' ',$eliminados5);
                  $eliminados7 = preg_replace('/%%OldValue%%0/',' ',$eliminados6);
                  $modificacion8 = preg_replace('/%%OldValue%%/',' ',$eliminados7);
                  $ticketfusion[$n]->compuesto= array_pad(explode(',',$modificacion8 ),25," ");
                  $ticketfusion[$n]->dependencia="";
                  $ticketfusion[$n]->cantidad1=0;
                  $ticketfusion[$n]->Tipo_toner1="";
                  $ticketfusion[$n]->cantidad2=0;
                  $ticketfusion[$n]->tipotoner2="";
                  $ticketfusion[$n]->cantidad3=0;
                  $ticketfusion[$n]->tipotoner3="";
                  $ticketfusion[$n]->cantidad4=0;
                  $ticketfusion[$n]->SolicitadoTipo4 ="";
                  $ticketfusion[$n]->comentario_entrega="";
                  $ticketfusion[$n]->cantidadtonerentregado1=0;
                  $ticketfusion[$n]->tipotonerentregado1="";
                  $ticketfusion[$n]->cantidadtonerentregado2=0;
                  $ticketfusion[$n]->tipotonerentregado2="";
                  $ticketfusion[$n]->cantidadtonerentregado3=0;
                  $ticketfusion[$n]->tipotonerentregado3="";
                  $ticketfusion[$n]->cantidadtonerentregado4=0;
                  $ticketfusion[$n]->tipotonerentregado4="";                  
                //se crean las bariables desde dependencia asta SolicitadoTipo4 ya que el dato puede existir o no con esto se formara una funcion 
                  $n++;     
          }
                $i=0;                             
      foreach ($ticketfusion as $sacando_dato) {  
            foreach ($sacando_dato->compuesto as $otroarreglo) {                                    
                  if(strncasecmp($otroarreglo,'%%%%Required7 ',14)===0){
                      $ticketfusion[$i]->dependencia= preg_replace('/%%%%Required7/','',$otroarreglo);                                                                                
                    }
                  if(strncasecmp($otroarreglo,'%%%%Required64',14)===0){
                    $ticketfusion[$i]->cantidad1 = (int)preg_replace ('/%%%%Required64/',' ',$otroarreglo);
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required65',14)===0){
                    $ticketfusion[$i]->Tipo_toner1= preg_replace('/%%%%Required65/',' ',$otroarreglo);                                        
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required66',14)===0){
                    $ticketfusion[$i]->cantidad2 =(int) preg_replace ('/%%%%Required66/',' ',$otroarreglo);                                           
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required67',14)===0){
                    $ticketfusion[$i]->tipotoner2 = preg_replace ('/%%%%Required67/',' ',$otroarreglo);                                                                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required68',14)===0){
                    $ticketfusion[$i]->cantidad3 = preg_replace ('/%%%%Required68/',' ',$otroarreglo);
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required69' ,14)===0){                                      
                    $ticketfusion[$i]->tipotoner3 = preg_replace('/%%%%Required69/',' ',$otroarreglo); 
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required34',14)===0){
                    $ticketfusion[$i]->comentario_entrega = preg_replace ('/%%%%Required34/',' ',$otroarreglo);                                                             
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required35',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado1 = (int)preg_replace('/%%%%Required35/',' ',$otroarreglo);                                       
                  }      
                  if(strncasecmp($otroarreglo,'%%%%Required53',14)===0){
                    $ticketfusion[$i]->tipotonerentregado1 = preg_replace('/%%%%Required53/',' ',$otroarreglo);                                          
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required56',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado2 = (int)preg_replace('/%%%%Required56/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required57',14)===0){
                    $ticketfusion[$i]->tipotonerentregado2 = preg_replace('/%%%%Required57/',' ',$otroarreglo);                                          
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required60',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado3 = (int)preg_replace('/%%%%Required60/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required61',14)===0){
                    $ticketfusion[$i]->tipotonerentregado3 = preg_replace('/%%%%Required61/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required62',14)===0){
                    $ticketfusion[$i]->cantidadtonerentregado4 = preg_replace('/%%%%Required62/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required63',14)===0){
                    $ticketfusion[$i]->tipotonerentregado4 = preg_replace('/%%%%Required63/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required71',14)===0){
                    $ticketfusion[$i]->SolicitadoTipo4 = preg_replace('/%%%%Required71/',' ',$otroarreglo);                                       
                  }
                  if(strncasecmp($otroarreglo,'%%%%Required70',14)===0){
                    $ticketfusion[$i]->cantidad4=preg_replace('/%%%%Required70/',' ',$otroarreglo);                                       
                  }                                              
          }                            
        $i++;                     
      }
      return $ticketfusion;
}



  public function toneraj()
  {   
    $fecha_año = Carbon::now()->format('Y');
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
   // var_dump($ticketfusion); exit;  
     $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
     $tickte = DB::connection('pgsql2')->table('ticket')->count();
     //dd($ticketfusion);     
$solokyocol1 =array(); //arreglo que guarda todos los toners col  entregados1
$Ttfusion =$this->constot(); // obtiene los datos de la consulta con constot
      // fila de solo las cantidades col1 despues la suma  
      foreach ($Ttfusion as $yamecanse) {
        if(strncasecmp($yamecanse->tipotonerentregado1,'  Toner-Kyocera FS-4200DN ',26)===0){          
          array_push($solokyocol1,$yamecanse->cantidadtonerentregado1);                                        
        }               
      }    
       $sumakyosera=0;//suma toner col 2 
       foreach ($solokyocol1 as $sumakyo) {
         $sumakyosera+=$sumakyo;           
       }  

$solokyoano2019 = array();
$kyoserasolano = $this->kyocesrapaño(2019);
foreach ($kyoserasolano as $yamecanse) {
  if(strncasecmp($yamecanse->tipotonerentregado1,'  Toner-Kyocera FS-4200DN ',26)===0){          
    array_push($solokyoano2019,$yamecanse->cantidadtonerentregado1);                                        
  }               
}
//dd($kyoserasolano);  

 $sumakyoseraano2019=0;//suma toner col 2 
 foreach ($solokyoano2019 as $sumakyo) {
   $sumakyoseraano2019+=$sumakyo;           
 }

 $solokyoano2020 = array();
$kyoserasolano2020 = $this->kyocesrapaño(2020);
foreach ($kyoserasolano2020 as $yamecanse) {
  if(strncasecmp($yamecanse->tipotonerentregado1,'  Toner-Kyocera FS-4200DN ',26)===0){          
    array_push($solokyoano2020,$yamecanse->cantidadtonerentregado1);                                        
  }               
}    
 $sumakyoseraano=0;//suma toner col 2 
 foreach ($solokyoano2020 as $sumakyo) {
   $sumakyoseraano+=$sumakyo;           
 }
 

//**************************************************************************************************************************** */
    return view('Tickets/EstructuraDTT/dtttoner')      
      ->with('solicitudToner', $solicitudToner)
      ->with('ticket', $tickte)
      ->with('areas_filastkts',$areas_filastkts)
      ->with('estado_graf',$estado_graf)     
      ->with('sumakyosera', $sumakyosera) 
      ->with('sumakyoseraano2019',$sumakyoseraano2019)   
      
       ;}


public function monitoreo_tickets_area_n(){                
       $areas= DB::connection('pgsql2')        
       ->SELECT("SELECT  DISTINCT queue.id as identificador, queue.name as nombrea , COUNT(queue_id) OVER(PARTITION BY queue_id)as tickets 
       FROM queue
       FULL JOIN ticket ON  queue.id = ticket.queue_id 
       WHERE ticket.ticket_state_id = 12
       ORDER BY queue.id ASC");
//dd($areas);

$t=1;
$st_sum = 0;
$sissum = 0;
$e=0;
$arreglodsl = array( );
$ssumm =array('ST'=>0,'cancelacion'=>0,'capital'=>0,'DASI'=>0,'DECSI'=>0,'Mesa'=>0,'Normatividad'=>0,'Seguridad'=>0,'Sistemas'=>0 );
$id_ST=array();
$id_Sis=array();
$id_Can=array();
$id_CapH=array();
$id_Das=array();
$id_Dec=array();
$id_Mesa=array();
$id_Normat=array();
$id_Segur=array();



        foreach ($areas as $r) {
         $dosletras = array(substr($r->nombrea, 0,3)); // Obtiene las 3 primeras letras del nombre del area      
         $arreglodsl[$r->nombrea]=$dosletras;
         
          if (strncasecmp($r->nombrea,'ST',2)===0 ) {
            $st_sum +=  $r->tickets;                                               
            $ssumm["ST"]+= $r->tickets;
            array_push($id_ST,$r->identificador);

          }elseif (strncasecmp($r->nombrea,'Sis',3)===0) {            
            $ssumm["Sistemas"]+= $r->tickets;
            array_push($id_Sis,$r->identificador);               
          }

          elseif (strncasecmp($r->nombrea,'Cancela',7)===0) {            
            $ssumm["cancelacion"]+= $r->tickets;
            array_push($id_Can,$r->identificador);   

          }

          elseif (strncasecmp($r->nombrea,'Capital Humano',14)==0) {            
            $ssumm["capital"]+= $r->tickets; 
            array_push($id_CapH,$r->identificador);               
          }
          elseif (strncasecmp($r->nombrea,'DAS',3)===0) {            
            $ssumm["DASI"]+= $r->tickets; 
            array_push($id_Das,$r->identificador);               
          }
          elseif (strncasecmp($r->nombrea,'DEC',3)===0) {            
            $ssumm["DECSI"]+= $r->tickets;  
            array_push($id_Dec,$r->identificador);    
            
          }
          elseif (strncasecmp($r->nombrea,'Mesa',4)===0) {            
            $ssumm["Mesa"]+= $r->tickets; 
            array_push($id_Mesa,$r->identificador);    
            
          }
          elseif (strncasecmp($r->nombrea,'Normatividad',6)===0) {            
            $ssumm["Normatividad"]+= $r->tickets; 
            array_push($id_Normat,$r->identificador);   
            
          }
          elseif (strncasecmp($r->nombrea,'Seguridad',6)===0) {            
            $ssumm["Seguridad"]+= $r->tickets; 
            array_push($id_Segur,$r->identificador);   
            
          } 
        }        
       $idst = $this->atext($id_ST);
       $idSis = $this->atext($id_Sis);
       $idCan= $this->atext($id_Can);
       $idCapH = $this->atext($id_CapH);
       $idDas=$this->atext($id_Das);
       $idDec=$this->atext($id_Dec);
       $idMesa=$this->atext($id_Mesa);
       $idNormat=$this->atext($id_Normat);
       $idSegur=$this->atext($id_Segur);

       $st="ST";
       $can="Cancelaciones";
       $caph="Capital Humano";
       $Da="DASI";
       $DE="DECSI";
       $mesads="Mesa De Sercivio";
       $nor="Normatividad";
       $seginf="Seguridad Informatica";
       $sistem="Sistemas";



       //dd($id_ST,$idst);
      return view('Tickets.Monitoreo_Tickets.monitoreoqueue')
      ->with([
        'areas'=>$areas,
        'ssumm'=>$ssumm,

        'idst'=>$idst,
        'idSis'=>$idSis,
        'idCan'=>$idCan,
        'idCapH'=>$idCapH,
        'idDas'=>$idDas,
        'idDec'=>$idDec,
        'idMesa'=>$idMesa,
        'idNormat'=>$idNormat,
        'idSegur'=>$idSegur ,
        'st'=>$st,

        'can'=>$can,
        'caph'=>$caph,
        'Da'=>$Da,
        'DE'=>$DE,
        'mesads'=>$mesads,
        'nor'=>$nor,
        'seginf'=>$seginf,
        'sistem'=>$sistem,
      ]);
    }

    public function atext($lista){
      $trnas=implode(",",$lista);
    return $trnas;
    }






    public function areaasignadosdesglose($id){     
      $ttkks = DB::connection('pgsql2')       
      ->select("SELECT * FROM ticket
      WHERE queue_id = $id and ticket_state_id = 12"); 
      return view('Tickets.Monitoreo_Tickets.desgloseareaasignados')->with(['id'=>$id,'tarea'=> $ttkks]);
    }



    public function dataareaasignadosdesglose($id){
      $num = $id;      
      $nombre=DB::connection('pgsql2')->table('queue')->where('id','=',$num)->get('name');
      $nomqueue = $nombre[0];
     
      $tktsxareaarea = DB::connection('pgsql2')
        ->select ("SELECT  queue.id,queue.name,COUNT(*)
        FROM ticket  
        INNER JOIN queue ON ticket.queue_id = queue.id
        WHERE ticket.ticket_state_id = 12 AND queue.id IN ($num)
        GROUP BY queue.id,queue.name       
        ORDER BY queue.id ASC"); 
      //dd($num);
      // return Datatables::of($ttkks)->toJson();    
      $nom_tkt_estatus = "Estado : Asignados ";

     
      return view('Tickets.datatablesis')
      ->with([
        'datoconsulta'=>$tktsxareaarea,
        'num'=>$num,
        'nom_tkt_estatus'=>$nom_tkt_estatus, 
        'nomqueue'=>$nomqueue,
             
      ]);      
      ;}

      public function areajson($id){
        $ttkks = DB::connection('pgsql2')       
        ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
          FROM ticket
          INNER JOIN queue ON ticket.queue_id = queue.id
          INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
          INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
          WHERE queue_id = $id and ticket_state_id = 12
          ORDER BY create_time DESC"); 
          
          return Datatables::of($ttkks)->toJson();
      }


      //Principales areas *********************************
      public function tkstareasPrin($listaids,$name){
        $Nombrearea=$name;      
        $lista_ar=$listaids;      
            return view('Tickets.Monitoreo_Tickets.areas_principales')
            ->with(['nom_tkt_estatus'=>$Nombrearea,
            'lista_ar'=>$lista_ar
          
          ]);
      }
      public function data_tks_principales($listaids){
        $tktlistadps = DB::connection('pgsql2')             

->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre,ticket.id
FROM ticket
INNER JOIN queue ON ticket.queue_id = queue.id
INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
WHERE ticket_state_id = 12 AND queue_id IN ($listaids) 
ORDER BY create_time DESC");                      
           // dd($tktlistadps);
        return Datatables::of($tktlistadps)->toJson();
      }



  public function tickets_en_tramite(){  
        $tickte = DB::connection('pgsql2')->table('ticket')->count();
        $tkts_en_tramite_cant = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id', '=', 18)->count();
        $nom_tkt_estatus = "Tickets En Tramite";               
        $tktporcento = round(($tkts_en_tramite_cant*100)/$tickte,2);
        $tktporcenttot= 100-$tktporcento;
        //dd($tkts_en_tramite);
      return view('Tickets/tickets_en_tramites')
      ->with([
      'ticket'=>$tickte,
      'tkts_en_tramite_cant'=>$tkts_en_tramite_cant,
      'nom_tkt_estatus'=>$nom_tkt_estatus,
      'tktporcento'=>$tktporcento,
      'tktporcenttot'=>$tktporcenttot
      ]);
  }
      public function data_tickets_en_tramite(){        
        $usuario = auth()->user()->area;
        $tkentramite = DB::connection('pgsql2')
        ->select("SELECT ticket.tn,ticket.title,queue.name as qname, ticket.create_time,ticket_state.name, customer_user.first_name as nombre ,ticket.id
        FROM ticket 
        INNER JOIN queue ON ticket.queue_id = queue.id 
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 18 AND queue_id IN ($usuario)                           
        ORDER BY ticket.tn DESC");
        //dd($tkentramite);
    return Datatables::of($tkentramite)->toJson();
      
      }

    

}



