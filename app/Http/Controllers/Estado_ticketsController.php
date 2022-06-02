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
   
        $tickets_abiertos =ticket::where('ticket_state_id','=',4)
        ->join('ticket_state','ticket_state.id','ticket_state_id')
        ->join('queue','queue.id','queue_id')
        ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
        ->select('ticket.id','ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
        ->get();
          $tickte = DB::connection('pgsql2')->table('ticket')->count();
          $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
         
         return datatables()->collection($tickets_abiertos)->toJson();

    }






    
        public function tickets_asignados(){

          $areasddb = DB :: connection('pgsql2')->table('queue')->select('id','name')->orderBy('id')->get();
          $areas =array(auth()->user()->area);
          $tkasignado =DB::connection('pgsql2')->table('ticket')
            ->join('queue','queue.id','queue_id')
            ->join('ticket_state','ticket_state.id','ticket_state_id')
            ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
            ->where('ticket_state_id','=', 12)  
            //->where('queue.id', '=' ,[$areas])
            //->whereIn('queue.name',[$areas])  
            //->where('queue.name','=' ,$areas)
            ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido','queue.id as id-area')
            ->get();
      
            $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
            $tickte = DB::connection('pgsql2')->table('ticket')->count();
            $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
            $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
            $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
            $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
            $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
            $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
            $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
            $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
            $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
            $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
            $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
            $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();     
            $titulotks =DB::connection('pgsql2')->table('ticket')->select('title')->distinct('title')->get();
            $titulotksJson = json_encode($titulotks);
            
           //dd($areas);
            //dd(auth()->user()->area);
               
      
            return view('Tickets/tickets_asignados')
      
            ->with('tkasignado',$tkasignado)
            ->with('tickets_registro',$tickets_registro)
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
              ->with('titulotksJson',$titulotksJson);
        ;}

        public function tickets_atendidos()
        {
          $tkatendidos =DB::connection('pgsql2')->table('ticket')
          ->where('ticket_state_id','=', 13)
          ->join('queue','queue.id','queue_id')
          ->join('ticket_state','ticket_state.id','ticket_state_id')
          ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
          ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname',      'ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
          ->get();
          $tickets_registro =DB::connection('pgsql2')->table('ticket') ->get();
          
          $tickte = DB::connection('pgsql2')->table('ticket')->count();
            $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
            $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
            $pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
            $solicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
            $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count(); 
            $abierto = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
            $cerradosinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
            $FaltaActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
            $NotificadoAlUsuario = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',11)->count();
            $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
            $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count(); 
            $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
      
          return view('Tickets/tickets_atendidos')
          ->with('tkatendidos',$tkatendidos)
          ->with('tickets_registro',$tickets_registro)
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
          
      
        ;}
    


        public function tickets_cerrados_exitosamente(){
          $ticket = DB::connection('pgsql2')->table('ticket')->count();
          $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
          return view('Tickets/tickets_cerrados_exitosamente')
          ->with('ticket' , $ticket)
          ->with('rticket',$rticket)
          ;}

        public function datatickets_cerrados_exitosamente()
    {    
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
          $tickets_totales = DB::connection('pgsql2')->table('ticket')
          ->join('queue','queue.id','queue_id')
          ->join('ticket_state','ticket_state.id','ticket_state_id')
          ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
          ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
          ->get();      
          return view('Tickets/todos_los_tickets')
          ->with('tickets_totales',$tickets_totales)         
        ;}

        public function datatotodlosticket(){
          $tickets_totales = ticket::
          join('queue','queue.id','queue_id')
          ->join('ticket_state','ticket_state.id','ticket_state_id')
          ->join('customer_user','ticket.customer_id', 'customer_user.customer_id')
          ->select('ticket.tn','ticket.create_time','ticket.title','ticket.user_id','queue.name as qname','ticket_state.name','customer_user.first_name as nombre','customer_user.last_name as apellido')
          ->get();
          return Datatables::of($tickets_totales)->toJson()
        ;}

    
 
    


}

