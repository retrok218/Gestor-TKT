@extends('home')
@section('content')

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet__head">
        <div class="header_titulo_monitoreo_tkts text-center" >
            <div class="card-header" >
                <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(0.8em + 1vw);">
                    Tablero Mesa de Servicio                           
                </span>
                <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(0.8em + 1vw);">(Area / Asignados)</span>    
            </div>          
        </div>
    </div>

    <div class="kt-container kt-container--fluid" style="background-color:white ;">
    <div id="GraficaMonitoreoArea" style="height: 30em; width: 100%;"></div>
    </div>
    
<div class="kt-container kt-container--fluid" style="margin-top: 10px;">
    <div class="row">
        @foreach($datos_monitoreo_area as $datoarea)           

                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card bg-white p-3 mb-4 shadow">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="user-info">
                                    
                                    <div class="user-info__basic">
                                        <h5 class="mb-0">{{$datoarea->name}}</h5>									
                                    </div>
                                </div>
                              
                            </div>
                            <div class="kt-timeline-v3__item kt-timeline-v3__item--warning">
                                    
                                    <div class="kt-timeline-v3__item-desc">
                                        
                                        <h6 class="mb-0" style="position: absolute;top: 50px;left: 45%;font-size: 2em;color: rgb(14 14 14 / 31%);pointer-events: none;"> 
                                            <div class="fas fa-ticket-alt fa-lg" id="ticketm"></div>
                                            {{$datoarea->tikets_area_grupo}}
                                        </h6>	 
                                    </div>
                                   
                            </div>  

                                
                                   
                            <div class="d-flex justify-content-between mt-4">
                            <!-- <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#ConsultarGrupo" data-nombregrupo="{{$datoarea->name}}" data-idgrupo="{{$datoarea->id}}" onclick="" >Consultar</button> -->
                            <button onclick="subclases({{$datoarea->id}});" type="button">consultar</button>
                                
                            </div>
                        </div>
                    </div>				
        @endforeach		                                        
    </div>
</div>



<div> 
   <div id="here">
        <span> {{$datos_monitoreo_area[1]->name}} </span>
       <span id="cantidad_ventana"> {{ $datos_monitoreo_area[1]->tikets_area_grupo }}</span>
   </div>

   <div>
    <p></p>
   </div>
</div>




<!-- Modal para sub grupos -->



<!-- Fin modal Subgrupos -->







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


   function subclases(id){  
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : url+'/data/subclase/'+id,
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



<script>
 $('#ConsultarGrupo').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('nombregrupo') //nombre del grupo
    var idgrp= button.data('idgrupo')  // id del grupo      
   
    var modal = $(this)
    modal.find('.modal-title').text('Nombre del Grupo ; ' + name +" "+ " ID " + idgrp )
    modal.find('.modal-body').val($phpvar =1)       
    })
</script>





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





// etiquetamodal


</script>


 
@endsection
@endsection



