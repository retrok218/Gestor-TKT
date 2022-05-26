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
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class AdminController extends Controller
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
    public function index()
    {
        $datos = User::where('id', auth()->user()->id)->get();
        return view('usuarios.perfil', compact('datos'));
    }



    // Se encarga de redireccionar el ingreso si es admin o user 
    public function dashboard()
    {
       $perfil = Auth::user()->hasAnyRole(['SuperAdmin', 'Admin']);
       $fecha_actual = Carbon::now()->toDateString(); //fecha ->toDateString da el formato que maneja la bd
       $fecha_mes = Carbon::now()->format('m');
       $fecha_dia = Carbon::now()->format('d');
       $fecha_año = Carbon::now()->format('Y');
       $fecha_mesp= $fecha_mes-1;
       $fecha_añop= $fecha_año-1;
       $fecha_diap= $fecha_dia-1;
       $ultimoTK =DB::connection('pgsql2')->table('ticket')->orderBy('create_time','DESC')->first();
       
       $tickte = DB::connection('pgsql2')->table('ticket')->count();
       $ticket_all = DB::connection('pgsql2')->table('ticket')->get();
       $nuevo = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',1)->count();
       $rticket = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 2)->count();
       $cerradocinEX = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',3)->count();
       $open = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',4)->count();
       //$removed = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',5)->count();
       //$pendienteRE = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',6)->count();
       //$pendienteatc = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',7)->count();
       //$pendienteAC = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',8)->count();
       //$merged = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',9)->count();
       $cerradoPT = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',10)->count();  
       $notificadoalU = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',11)->count();
       $asignado =DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 12)->count();
       $atendido = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 13)->count();
       $CerradoPT2 = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',14)->count();
       $espinformacion = DB::connection('pgsql2')->table('ticket')->where('ticket_state_id','=', 15)->count();
       $Entramite = DB::connection('pgsql2')-> table('ticket')->where('ticket_state_id','=',18)->count();
       $FaltaDocumentar = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',19)->count();
       $FalteActaRES = DB:: connection('pgsql2')->table('ticket')->where('ticket_state_id','=',21)->count();
       $SolicitudToner = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',79)->count();
       $impresorasintt = DB::connection('pgsql2')-> table('ticket')->where('service_id','=',78)->count();
       $tickets_por_dia=DB::connection('pgsql2')->table('ticket')->whereDate('create_time',('='),$fecha_actual)->count();
       $tickets_por_mes=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',$fecha_mes)
                                           ->whereYear('create_time','=',$fecha_año)->count();
       $tickets_por_año=DB::connection('pgsql2')->table('ticket')->whereYear('create_time','=',$fecha_año)->count();
       
       
       $ticket_mespasado=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',$fecha_mesp)
                                           ->whereYear('create_time','=',$fecha_año)
                                            ->count();
      
       $ticket_diap=DB::connection('pgsql2')->table('ticket')->whereDay('create_time','=',$fecha_diap)
                                       ->whereMonth('create_time','=',$fecha_mes)
                                       ->whereYear('create_time','=',$fecha_año)
                                       ->count();      
 // datos segun el mes
 
       $mes_enero=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 1)
                                     ->whereYear('create_time','=', $fecha_año)
                                     ->count();
       $mes_febrero=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 2)
                                                                   ->whereYear('create_time','=', $fecha_año)
                                                                   ->count();
       $mes_marzo=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 3)
                                                   ->whereYear('create_time','=', $fecha_año)
                                                   ->count();
       $mes_abril=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 4)
                                                               ->whereYear('create_time','=', $fecha_año)
                                                               ->count();
      $mes_mayo=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 5)->whereYear('create_time','=', $fecha_año)->count();
 
     $mes_junio=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',6)->whereYear('create_time','=', $fecha_año)->count();
                                                         
      $mes_julio=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 7)->whereYear('create_time','=', $fecha_año)->count();
                                                         
      $mes_agosto=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 8)->whereYear('create_time','=', $fecha_año)->count();
                                                         
      $mes_septiembre=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 9)->whereYear('create_time','=', $fecha_año)->count();
                                                         
     $mes_octubre=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 10)->whereYear('create_time','=', $fecha_año)->count();
                                                         
      $mes_noviembre=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 11)->whereYear('create_time','=', $fecha_año)->count();
                                                         
      $mes_diciembre=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 12)->whereYear('create_time','=', $fecha_año)->count();                                                
       
       
                                                               // Grafica lineal mes pasado
       $mes_enero2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 1)
                                     ->whereYear('create_time','=', $fecha_añop)
                                     ->count();
       $mes_febrero2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 2)
                                                                   ->whereYear('create_time','=', $fecha_añop)
                                                                   ->count();
       $mes_marzo2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 3)
                                                   ->whereYear('create_time','=', $fecha_añop)
                                                   ->count();
 
       $mes_abril2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 4)->whereYear('create_time','=', $fecha_añop)->count();
 
       $mes_mayo2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 5)->whereYear('create_time','=', $fecha_añop)->count();
 
       $mes_junio2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',6)->whereYear('create_time','=', $fecha_añop)->count();
 
       $mes_julio2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',7)->whereYear('create_time','=', $fecha_añop)->count();
 
       $mes_agosto2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',8)->whereYear('create_time','=', $fecha_añop)->count();
 
       $mes_septiembre2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=',9)->whereYear('create_time','=', $fecha_añop)->count();
 
       $mes_octubre2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 10)->whereYear('create_time','=', $fecha_añop)->count();
 
       $mes_noviembre2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 11)->whereYear('create_time','=', $fecha_añop)->count();
 
       $mes_diciembre2=DB::connection('pgsql2')->table('ticket')->whereMonth('create_time','=', 12)->whereYear('create_time','=', $fecha_añop)->count();
 //fin datos segun el mes 
 
 /*Para automatizar la grafica mes año  falta agregar con with
 
       $tksañop = array();
       $mes_comienza=0;
         for($mes_comienza; $mes_comienza<=12; $mes_comienza++){
           $tksañop[]=DB::connection('pgsql2')->table('ticket')
           ->whereMonth('create_time','=',$mes_comienza)
           ->whereYear('create_time','=',$fecha_añop)
           ->count();
         };
         $tksañoactual = array();
         $mes_comienza=0;
         for($mes_comienza; $mes_comienza<=12; $mes_comienza++){
           $tksañoactual[]=DB::connection('pgsql2')->table('ticket')
           ->whereMonth('create_time','=',$mes_comienza)
           ->whereYear('create_time','=',$fecha_año)
           ->count();
         };
         $tksañopJosn= json_encode($tksañop);
         $tksañoactualJson= json_encode($tksañoactual);
 */
                                                                 
       // ticket por Area
       $tk_por_area_1=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',1)->count();
       $tk_por_area_2=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',2)->count();
       $tk_por_area_3=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',3)->count();
       $tk_por_area_4=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',4)->count();
       $tk_por_area_5=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',5)->count();
       $tk_por_area_6=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',6)->count();
       $tk_por_area_7=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',7)->count();
       $tk_por_area_8=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',8)->count();
       $tk_por_area_9=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',9)->count();
       $tk_por_area_10=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',10)->count();
       $tk_por_area_11=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',11)->count();
       $tk_por_area_12=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',12)->count();
       $tk_por_area_13=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',13)->count();
       $tk_por_area_14=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',14)->count();
       $tk_por_area_15=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',15)->count();
       $tk_por_area_16=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',16)->count();
       $tk_por_area_17=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',17)->count();
       $tk_por_area_18=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',18)->count();
       $tk_por_area_19=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',19)->count();
       $tk_por_area_20=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',20)->count();
       $tk_por_area_21=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',21)->count();
       $tk_por_area_22=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',22)->count();
       $tk_por_area_23=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',23)->count();
       $tk_por_area_24=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',24)->count();
       $tk_por_area_25=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',25)->count();
       $tk_por_area_26=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',26)->count();
       $tk_por_area_27=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',27)->count();
       $tk_por_area_28=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',28)->count();
       $tk_por_area_29=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',29)->count();
       $tk_por_area_30=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',30)->count();
       $tk_por_area_31=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',31)->count();  
       $tk_por_area_32=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',32)->count();
       $tk_por_area_33=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',33)->count();
       $tk_por_area_34=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',34)->count();
       $tk_por_area_35=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',35)->count();
       $tk_por_area_36=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',36)->count();
       $tk_por_area_37=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',37)->count();
       $tk_por_area_38=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',38)->count();
       $tk_por_area_39=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',39)->count();
       $tk_por_area_40=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',40)->count();
       $tk_por_area_41=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',41)->count();
       $tk_por_area_42=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',42)->count();
       $tk_por_area_43=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',43)->count();
       $tk_por_area_44=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',44)->count();
       $tk_por_area_45=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',45)->count();
       $tk_por_area_46=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',46)->count();
       $tk_por_area_47=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',47)->count();
       $tk_por_area_48=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',48)->count();
       $tk_por_area_49=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',49)->count();
       $tk_por_area_50=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',50)->count();
       $tk_por_area_51=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',51)->count();
       $tk_por_area_52=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',52)->count();
       $tk_por_area_53=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',53)->count();
       $tk_por_area_54=DB::connection('pgsql2')->table('ticket')->where('queue_id','=',54)->count();
 
 
       // consulta por mes
 // variables para  generar la grafica lineal de  mes año 
   $inicioaño=2019;      
   $iniciomes = 0;
   $n=0;
   $totalmes= array ();    
   for ($iniciomes ; $iniciomes <= 12 ; $iniciomes++) {
     $totalmes[$n] =DB::connection('pgsql2')->table('ticket')
      ->whereMonth('create_time','=', $iniciomes)
      ->whereYear('create_time','=', $inicioaño)
      ->count();         
      $n++;
      if ($iniciomes === 12) {   
        if ($inicioaño <= $fecha_año ) {
          $inicioaño++;
          $iniciomes=1;
        }                          
      };      
  };
 
 $totalMesJson = json_encode($totalmes); 
 //$ticket_allJson = json_encode($ticket_all);
 // Fin consulta por mes      


       return view('admin.dashboard')
      ->with('ultimoTK',$ultimoTK)
      //prueva creacion de funcion de auto update
      ->with('totalmes',$totalmes)
      ->with('totalMesJson',$totalMesJson)
      ->with('ticket', $tickte)
      ->with('asignado',$asignado)
      ->with('atendido',$atendido)
      ->with('espinformacion',$espinformacion)
      ->with('rticket', $rticket)
      //->with('pendiente', $pendiente)
      //->with('abierto' , $abierto)
      //seleccionados
      //->with('pendienteatc',$pendienteatc)
      ->with('nuevo',$nuevo)
      ->with('cerradocinEX',$cerradocinEX)
      ->with('open',$open)
      //->with('removed',$removed)
      //->with('pendienteRE',$pendienteRE)
      //->with('pendienteAC',$pendienteAC)
      //->with('merged',$merged)
      ->with('cerradoPT',$cerradoPT)
      ->with('notificadoalU',$notificadoalU)
      ->with('CerradoPT2',$CerradoPT2)
      //->with('merged',$merged)
      //->with('Documentofirmado',$Documentofirmado)
      ->with('Entramite',$Entramite)
      ->with('FaltaDocumentar',$FaltaDocumentar)
      ->with('FalteActaRES',$FalteActaRES)


      ->with('solicitudroner',$SolicitudToner)
      ->with('impresorasintt',$impresorasintt)
      ->with('tickets_por_mes',$tickets_por_mes)
      ->with('tickets_por_dia',$tickets_por_dia)
      ->with('ticket_por_año',$tickets_por_año)

      // ->with('pmes',$tickets_prueva_mes)
      // ->with('ticket_por_mes',$ticket_por_mes)

      // fecha fragmentada
      

      ->with('mes',$fecha_mes)
      ->with('dia',$fecha_dia)
      ->with('año',$fecha_año)
      ->with('mesp',$ticket_mespasado)
      ->with('diap',$ticket_diap)
      ->with('pruemesp',$ticket_mespasado)
      ->with('añop',$fecha_añop)

      ->with('mes_enero',$mes_enero)
      ->with('mes_febrero',$mes_febrero)
      ->with('mes_marzo',$mes_marzo)
      ->with('mes_abril',$mes_abril)
      ->with('mes_mayo',$mes_mayo)
      ->with('mes_junio',$mes_junio)
      ->with('mes_julio',$mes_julio)
      ->with('mes_agosto',$mes_agosto)
      ->with('mes_septiembre',$mes_septiembre)
      ->with('mes_octubre',$mes_octubre)
      ->with('mes_noviembre',$mes_noviembre)
      ->with('mes_diciembre',$mes_diciembre)
      
      ->with('mes_enero2',$mes_enero2)
      ->with('mes_febrero2',$mes_febrero2)
      ->with('mes_marzo2',$mes_marzo2)
      ->with('mes_abril2',$mes_abril2)
      ->with('mes_mayo2',$mes_mayo2)
      ->with('mes_junio2',$mes_junio2)
      ->with('mes_julio2',$mes_julio2)
      ->with('mes_agosto2',$mes_agosto2)
      ->with('mes_septiembre2',$mes_septiembre2)
      ->with('mes_octubre2',$mes_octubre2)
      ->with('mes_noviembre2',$mes_noviembre2)
      ->with('mes_diciembre2',$mes_diciembre2)
      
      //ticket por area
      ->with('tk_por_area_1',$tk_por_area_1)
      ->with('tk_por_area_2',$tk_por_area_2)
      ->with('tk_por_area_3',$tk_por_area_3)
      ->with('tk_por_area_4',$tk_por_area_4)
      ->with('tk_por_area_5',$tk_por_area_5)
      ->with('tk_por_area_6',$tk_por_area_6)
      ->with('tk_por_area_7',$tk_por_area_7)
      ->with('tk_por_area_8',$tk_por_area_8)
      ->with('tk_por_area_9',$tk_por_area_9)
      ->with('tk_por_area_10',$tk_por_area_10)
      ->with('tk_por_area_11',$tk_por_area_11)
      ->with('tk_por_area_12',$tk_por_area_12)
      ->with('tk_por_area_13',$tk_por_area_13)
      ->with('tk_por_area_14',$tk_por_area_14)
      ->with('tk_por_area_15',$tk_por_area_15)
      ->with('tk_por_area_16',$tk_por_area_16)
      ->with('tk_por_area_17',$tk_por_area_17)
      ->with('tk_por_area_18',$tk_por_area_18)
      ->with('tk_por_area_19',$tk_por_area_19)
      ->with('tk_por_area_20',$tk_por_area_20)
      ->with('tk_por_area_21',$tk_por_area_21)
      ->with('tk_por_area_22',$tk_por_area_22)
      ->with('tk_por_area_23',$tk_por_area_23)
      ->with('tk_por_area_24',$tk_por_area_24)
      ->with('tk_por_area_25',$tk_por_area_25)
      ->with('tk_por_area_26',$tk_por_area_26)
      ->with('tk_por_area_27',$tk_por_area_27)
      ->with('tk_por_area_28',$tk_por_area_28)
      ->with('tk_por_area_29',$tk_por_area_29)
      ->with('tk_por_area_30',$tk_por_area_30)
      ->with('tk_por_area_31',$tk_por_area_31)
      ->with('tk_por_area_32',$tk_por_area_32)
      ->with('tk_por_area_33',$tk_por_area_33)
      ->with('tk_por_area_34',$tk_por_area_34)
      ->with('tk_por_area_35',$tk_por_area_35)
      ->with('tk_por_area_36',$tk_por_area_36)
      ->with('tk_por_area_37',$tk_por_area_37)
      ->with('tk_por_area_38',$tk_por_area_38)
      ->with('tk_por_area_39',$tk_por_area_39)
      ->with('tk_por_area_40',$tk_por_area_40)
      ->with('tk_por_area_41',$tk_por_area_41)
      ->with('tk_por_area_42',$tk_por_area_42)
      ->with('tk_por_area_43',$tk_por_area_43)
      ->with('tk_por_area_44',$tk_por_area_44)
      ->with('tk_por_area_45',$tk_por_area_45)
      ->with('tk_por_area_46',$tk_por_area_46)
      ->with('tk_por_area_47',$tk_por_area_47)
      ->with('tk_por_area_48',$tk_por_area_48)
      ->with('tk_por_area_49',$tk_por_area_49)
      ->with('tk_por_area_50',$tk_por_area_50)
      ->with('tk_por_area_51',$tk_por_area_51)
      ->with('tk_por_area_52',$tk_por_area_52)
      ->with('tk_por_area_53',$tk_por_area_53)
      ->with('tk_por_area_54',$tk_por_area_54) 
       ;
       
 }








    public function create() {
                $roles = DB::table('roles')->get();
                return view('modals/users/add_user')->with('roles', $roles);
        }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuarios\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;
        $datosRoles = User::getRol($id);
        $roles = DB::table('roles')->get();
        $user = User::find($id);
        return view('modals/users/edit_user')
            ->with(compact('user'))
            ->with(compact('datosRoles'))
            ->with(compact('roles'));
    }
    /**
     * Actualizar usuario.
     *
     * @param  Request  $request
     * @param  Users  $users
     * @return Response
     */
    public function update(Request $request, User $users)
    {
        \Log::info(__METHOD__);
        try {
            $id = $request->id_usuario;
            $id_rol = $request->id_rol;
            $estatus = ($request->estatus_user == "on" )? 1 : 0;

            $users = User::find($id);
            $users->name = $request->nombres;
            $users->apellido_paterno = $request->apellido_paterno;
            $users->apellido_materno = $request->apellido_materno;
            $users->email = $request->correo;
            $users->estatus = $estatus;
            $users->id_rol = $id_rol;
            // Actualización de password
            if ($request->filled('password') && $request->filled('password2') ) {
                $password = $request->password;
                $pass2 = $request->password2;
                if ($password == $pass2) {
                    $password = Hash::make($password);
                    $users->password = $password;
                }
            }
            $users->save();
            $idUsuarioRol = DB::table('model_has_roles')->where('model_id', '=', $id)->first();
            $idUsuarioRolAnterior = $idUsuarioRol->role_id;

            ModelHasRole::where('model_id', $id)
               ->where('role_id', $idUsuarioRolAnterior)
               ->update(['role_id' => $id_rol]);

            //$user->assignRole($grol->name);
            $response = ['success' => true, 'message' => 'Usuario actualizado satisfactoriamente.'];
        } catch (\Exception $th) {
          //  Bitacoras::registerError(__METHOD__, $th, 'Error al actualizar usuario (Exception).');
            $response = ['success' => false, 'message' => 'Error al actaulizar el usuario.'];
        }

        return $response;
    }
    public function store(Request $request) {
           \Log::info(__METHOD__.' Crear nuevo Usuario');
           try {
               $id_rol = $request->id_rol;
               DB::beginTransaction();
               $user = User::create([
                       'name' => $request->nombre,
                       'apellido_paterno' => $request->apellido_paterno,
                       'apellido_materno' => $request->apellido_materno,
                       'usuario' => $request->usuario,
                       'id_rol' => $id_rol,
                       'password' => bcrypt($request->password),
                       'email' => $request->email,
                       'estatus' => (!$request->cat_status) ? '0' : '1',
                       'id_ubicacion' => '1'
                   ]);
               $grol = DB::table('roles')->where('id', '=', $id_rol)->first();
               // Le asignamos el rol
               $user->assignRole($grol->name);
               $response = array('success' => true, 'message' => 'Usuario creado correctamente.');
               DB::commit();
           } catch (\Exception $th) {

               DB::rollback();
               $response = ['success' => false, 'message' => 'Error al guardar el usuario.'];
           }
           return $response;
       }

    public function listar_usuarios()
    {
        return view('usuarios.listar_usuarios');
    }

    public function data_listar_usuarios()
    {
        $users = User::select();
        return Datatables::of($users)->toJson();
    }
    public function listar_roles()
    {
        $roles = Role::all();//Get all roles
   //     return view('roles.index')->with('roles', $roles);
    return view('admin.roles.listar_roles')->with('roles', $roles);
    }

    public function data_listar_roles()

    {
        $role = Role::all();//Get all roles
      //  $permisos = =Permissions::getAllPermisos()
        //$role->permissions()->pluck('name');
     return Datatables::of($role)->toJson();
    }
    public function listar_permisos()
    {
        return view('usuarios.listar_permisos');
    }

    public function data_listar_permisos()
    {

        return Datatables::of(Permissions::getAllPermisos())

            ->toJson();
        //return view('usuarios.listar_usuarios', compact('users'));

    }

}
