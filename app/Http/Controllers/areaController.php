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
class areaController extends Controller
{
    public function areainicio(){

        $usuario = auth()->user()->area;
        $areasarreglo = explode(',',$usuario);        
        
        $t=0;

        // conteo de todos los tickets con las areas del usuario
        $totaltktsarea = DB::connection('pgsql2')->select ("SELECT  COUNT (*)
        FROM (ticket INNER JOIN queue ON ticket.queue_id = queue.id )
        INNER JOIN ticket_state ON ticket.ticket_state_id = ticket_state.id
        INNER JOIN customer_user ON ticket.customer_id = customer_user.customer_id
        WHERE ticket_state_id = 12 AND queue_id IN ($usuario)"); 

        //conteo de tickets area por Area con la que cuete el usuario 
       

        $tktsxareaarea = DB::connection('pgsql2')
        ->select ("SELECT  queue.id,queue.name,COUNT(*)
        FROM ticket  
        INNER JOIN queue ON ticket.queue_id = queue.id
        WHERE ticket.ticket_state_id = 12 AND queue.id IN ($usuario)
        GROUP BY queue.id,queue.name       
        ORDER BY queue.id ASC"); 

       

        //la consulta con in genera el where buscando en la lista dentro del in que es una lista de areas eje (1,2,3,4)    
        //var_dump($totaltktsarea); exit;

        //dd( $tktsxareaarea); exit;
        return view('Tickets.soloarea')->with([
            'tktsxareaarea'=>$tktsxareaarea,
            'totaltktsarea'=>$totaltktsarea,
            

        
        ]);
    }
}
