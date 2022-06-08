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


class Estado_ticketsController extends Controller
{
  public function tickets_abiertos(){
    $tickte = ticket::count();
    $abierto = ticket::where('ticket_state_id','=',4)->count();
    return view('Tickets/tickets_abiertos')
    ->with('tickte',$tickte)
    ->with('abierto',$abierto)
    ;}
  public function data_tickets_abiertos (){
    $tickets_abiertos =ticket::where('ticket_state_id','=',4)
      ->join('ticket_state','ticket_state.id','ticket_state_id')
      ->join('queue','queue.id','queue_id')
      ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
      ->select('ticket.id','ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
      ->get();
      return Datatables::of($tickets_abiertos)->toJson();
  }
        public function tickets_asignados(){                       
            $tickte = DB::connection('pgsql2')->table('ticket')->count();
            $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();          
            return view('Tickets/tickets_asignados')            
            ->with('ticket', $tickte)
            ->with('asignado',$asignado)
        ;}

        public function data_ticket_asignado(){
          $tkasignado =DB::connection('pgsql2')->table('ticket')
            ->join('queue','queue.id','queue_id')
            ->join('ticket_state','ticket_state.id','ticket_state_id')
            ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
            ->where('ticket_state_id','=', 12)  
            ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido','queue.id as id-area')
            ->get(); 
            return Datatables::of($tkasignado)->toJson();
        ;}

        public function tickets_atendidos()
        {                            
          $tickte = DB::connection('pgsql2')->table('ticket')->count();            
          $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();                 
          return view('Tickets/tickets_atendidos')                  
          ->with('ticket', $tickte)
          ->with('atendido',$atendido)                  
        ;}
    
        public function data_tickets_atendidos(){
          $tkatendidos =DB::connection('pgsql2')->table('ticket')
          ->where('ticket_state_id','=', 13)
          ->join('queue','queue.id','queue_id')
          ->join('ticket_state','ticket_state.id','ticket_state_id')
          ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
          ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname',      'ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
          ->get();
          return Datatables::of($tkatendidos)->toJson();
        ;}

        public function tickets_cerrados_exitosamente(){
          $ticket = DB::connection('pgsql2')->table('ticket')->count();
          $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
          return view('Tickets/tickets_cerrados_exitosamente')
          ->with('ticket' , $ticket)
          ->with('rticket',$rticket)
          ;}
        public function datatickets_cerrados_exitosamente(){    
          $tickets_cerrados_exitosamente =ticket::where('ticket_state_id','=',2)
                    ->join('ticket_state','ticket_state.id','ticket_state_id')
                    ->join('queue','queue.id','queue_id')
                    ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
                    ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
                    ->get();          
          return Datatables::of($tickets_cerrados_exitosamente)->toJson()
        ;}
        public function todos_los_tkts()
        {       
          // ingresar la tabla de todos los tkts
          return view('Tickets/todos_los_tickets')          
        ;}

        public function data_todos_losticket(){
          $tickets_totales = ticket::
          join('queue','queue.id','queue_id')
          ->join('ticket_state','ticket_state.id','ticket_state_id')
          ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
          ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
          ->get();
          return Datatables::of($tickets_totales)->toJson()
        ;}

        public function tickets_cerradosPT(){
          $tickte = DB::connection('pgsql2')->table('ticket')->count();
          $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
         
          return view('Tickets/tickets_cerradosPT')    
          ->with('ticket', $tickte)
          ->with('cerradoPT',$cerradoPT)
          
          ;}

          public function data_tickets_cerradosPT(){
            $tickets_cerradosPT =DB::connection('pgsql2')->table('ticket')
          ->where('ticket_state_id','=',10)
          ->join('ticket_state','ticket_state.id','ticket_state_id')
          ->join('queue','queue.id','queue_id')
          ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
          ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
          ->get();
          return Datatables::of($tickets_cerradosPT)->toJson()
          ;}


          public function tickets_espera_informacion(){ 
              $ticket = ticket::count();              
              $ticket_espera_info= ticket::where('ticket_state_id','=',15)->count();
            return view('Tickets/tickets_espera_informacion')
            ->with('ticket',$ticket)
            ->with('ticket_espera_info',$ticket_espera_info)
            ;}

          public function data_tickets_espera_informacion(){ 
            $tkts_espera_info = ticket::where('ticket_state_id','=', 15)
            ->join('ticket_state','ticket_state.id','ticket_state_id')
            ->join('queue','queue.id','queue_id')
            ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
            ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
            ->get();
            return Datatables::of($tkts_espera_info)->toJson()
          ;}

          public function falta_acta_responsiva(){
            $ticket = ticket::count(); 
            $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();           
            return view('Tickets/tickets_falta_acta_resp')
            ->with('ticket',$ticket)
            ->with('FaltaActaRES',$FaltaActaRES)
            ;}
          public function data_falta_acta_responsiva(){
            $tickets_falta_acta_responsiva =DB::connection('pgsql2')->table('ticket')
            ->where('ticket_state_id','=', 21)
            ->join('ticket_state','ticket_state.id','ticket_state_id')
            ->join('queue','queue.id','queue_id')
            ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
            ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
            ->get();            
            return Datatables::of($tickets_falta_acta_responsiva)->toJson()
            ;}

            public function notificado_al_usuario(){
              $ticket = ticket::count();
              $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
              return view('Tickets/tickets_notificado_al_usuario')
              ->with('ticket',$ticket)              
              ->with('NotificadoAlUsuario',$NotificadoAlUsuario)              
            ;}

            public function data_notificado_al_usuario(){
              $tickets_notificadosalusuario =ticket::
                where('ticket_state_id','=',11)
                ->join('ticket_state','ticket_state.id','ticket_state_id')
                ->join('queue','queue.id','queue_id')
                ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
                ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
                ->get();
                return Datatables::of($tickets_notificadosalusuario)->toJson()
            ;}

            public function nuevoticket(){
            $nticket=DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
            $ticket = DB::connection('pgsql2')-> table('ticket')->count(); 
            return view('Tickets/tickets_nuevos')
            ->with('nticket',$nticket)
            ->with('ticket',$ticket)
            ;}

            public function data_nuevoticket(){
              $ticket_nuevo = ticket::
              where('ticket_state_id','=',7)
                ->join('ticket_state','ticket_state.id','ticket_state_id')
                ->join('queue','queue.id','queue_id')
                ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
                ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
                ->get();
                return Datatables::of($ticket_nuevo)->toJson()
            ;}

            public function monitoreo_tickets(){             
            $tickte =ticket::count();//0
              $asignado =ticket::where('ticket_state_id','=', 12)->count();//1
              $atendido =ticket::where('ticket_state_id','=', 13)->count();//2
              $pendienteatc =ticket::where('ticket_state_id','=',7)->count();//3
              $solicitudToner =ticket::where('service_id','=',79)->count();//4
              $espinformacion =ticket::where('ticket_state_id','=', 15)->count();//5 
              $abierto =ticket::where('ticket_state_id','=',4)->count();//6
              $cerradosinEX =ticket::where('ticket_state_id','=',3)->count();//7
              $FaltaActaRES =ticket::where('ticket_state_id','=',21)->count();//8
              $NotificadoAlUsuario =ticket::where('ticket_state_id','=',11)->count();//9
              $Entramite =ticket::where('ticket_state_id','=',18)->count();//10
              $cerradoPT =ticket::where('ticket_state_id','=',10)->count(); //11
              $rticket =ticket::where('ticket_state_id','=', 2)->count();//12
              $porcentajes = array($asignado,$atendido,$pendienteatc,$solicitudToner,$espinformacion,
              $abierto,$cerradosinEX,$FaltaActaRES,$NotificadoAlUsuario, $Entramite,$cerradoPT,$rticket
              );
              $tktsporciento = array();
              foreach ($porcentajes as $porcentaje) {                
               $tktsporciento[] = (int)$porcentaje*100/$tickte;
              };            
           
     
              return view('Tickets/Monitoreo_Tickets/Monitoreo_de_Tickets')
                ->with('ticket', $tickte)
                ->with('asignado',$asignado)
                ->with('atendido',$atendido)
                ->with('espinformacion',$espinformacion)
                ->with('pendienteatc',$pendienteatc)
                ->with('solicitudroner',$solicitudToner)
                ->with('abierto',$abierto)
                ->with('FaltaActaRES',$FaltaActaRES)
                ->with('cerradosinEX',$cerradosinEX)
                ->with('NotificadoAlUsuario',$NotificadoAlUsuario)
                ->with('Entramite',$Entramite)
                ->with('cerradoPT',$cerradoPT)
                ->with('cerradoexitosamente',$rticket)
                ->with('porcentajes',$porcentajes) 
                ->with('tktsporciento',$tktsporciento)
            ;}

}


