@extends('home')
{{--<meta http-equiv="refresh" content="10"/>--}}
@section('content')

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    
    <div class="kt-portlet__head">
        <div class="header_titulo_monitoreo_tkts text-center" >
            
                <div class="card-header"  style="background-image:url({{url('../assets/media/logos/fondo3.jpg')}})  !important;background-size: 100%;background-repeat: no-repeat;">
                    <div class="containerglass ">
                    <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(0.8em + 1vw);">
                        Tablero Mesa de Servicio                                              
                    </span>
                    <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(0.8em + 1vw);">(SIRADI)</span>    
                </div>
            </div>  

        </div>
    </div>

    <div class="row">
        @foreach($datos_monitoreo_area as $datoarea)           
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card bg-white p-3 mb-4 shadow" style="padding: 0.5rem !important; margin-bottom: 0.5rem !important; background-color: #ffffffc7 !important;">                            
                            <div class="d-flex justify-content-between ">
                                <div class="user-info">
                                    
                                    <div class="user-info__basic">
                                        <h6 class="mb-0" style="color: #bc955b;">{{$datoarea->name}}</h6>									
                                    </div>
                                </div>
                              
                            </div>
                            <hr>
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">                                    
                                    <div class="kt-timeline-v3__item-desc">                                        
                                        <h6 class="mb-0" style="position: absolute;top: 70px;left: 65%;font-size: 2em;color: rgb(160 32 66 / 65%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$datoarea->tikets_area_grupo}}
                                        </h6>	 
                                    </div>                                   
                            </div>                                                                     
                            <div class="d-flex justify-content-between mt-4" style="margin-top: 0.5rem;">                           
                            <button onclick="subclases('{{$datoarea->id}}','{{$datoarea->name}}');" type="button" class="btn btn-outline-success">Consultar</button>                                
                            </div>

                            
                        </div>
                    </div>				
        @endforeach		                                        
    </div>          
</div>






@section('scripts')
<script>
   $(document).ready(function(){ 
    let nn = 0;      
     window.setInterval(function(){            
        let cantarea =  $("#cantidad_ventana").text();                        
        $("p").text(cantarea);
        console.log('Cargando'+nn);
        nn++;
        // Por cada dato en $datos_monitoreo_area  generar un <div class="col-sm-4"> como en el html 
    },3000);
   });



   function subclases(id,nombre){   
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url+'/data/subclase/'+id+'/'+nombre,
        dataType: 'html',
        success: function(resp_success) {
            var modal = resp_success;
            $(modal).modal().on('shown.bs.modal', function() {
                $("[class='make-switch']").bootstrapSwitch('animate', true);
                $('.select2').select2({dropdownParent: $("#ConsultarGrupo")});
            }).on('hidden.bs.modal', function() {
                $(this).remove();
            });
        },
        error: function(respuesta) {
            Swal.fire('¡Alerta!','Error de conectividad de red USR-01','warning');
        }
    });  
    //console.log(id);
   };
   
</script>













{{--  scrip para grafica de barras para las areas 
<script type="text/javascript">

window.onload = function () {
	var chart = new CanvasJS.Chart("GraficaMonitoreoArea", {
        theme: "light1", // "light1", "light2", "dark1"
        animationEnabled: true,
        exportEnabled: true,

                 
          title: {
           
            fontSize: 14,           
            text: "Total Areas " + {{$sumareas}}           
        },

        axisX: {
			labelMaxWidth: 500,
			 
			interval: 1,
            labelFontSize: 12,            
            margin: 10,
            labelPlacement: "inside",
            tickPlacement: "inside",
            labelFontWeight: "bold",
            
		},

       

		data: [              
            {						
                type: "bar",
                axisYType: "secondary",           
                click:subclases,                        
                dataPoints: [               
                    @foreach ($datos_monitoreo_area as $areasdatos )
                        {label:"{{$areasdatos->name}}", y:{{$areasdatos->tikets_area_grupo}}},                
                    @endforeach
                ]
            }
		]
	});
	chart.render();
    setInterval(chart.render(), 500);
};


function onClick(e) {    
    subclases(id);   
}

</script>
--}}

 
@endsection
@endsection



