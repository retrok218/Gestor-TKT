@extends('home')
@section('content')

<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet__head">
        <div class="header_titulo_monitoreo_tkts text-center" >
            <div class="card-header" >
                <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(0.8em + 1vw);">
                    Tablero Mesa de Servicio                           
                </span>
                <span style="display: block; font-style: normal;  color: #2e2e2e; font-weight: 600; font-size: calc(0.8em + 1vw);">(Area)</span>    
            </div>          
        </div>
    </div>

    <div class="kt-container kt-container--fluid" style="background-color:white ;">
    <div id="GraficaMonitoreoArea" style="height: 30em; width: 100%;"></div>
    </div>
    

    
<!--      
    <div class="kt-portlet">
        <div class="kt-portlet__body">
        <div class="kt-widget25">
            <div class="row">
                
                                            
                        <div class="col-sm-12">   
                            <div class="card-group ">                          
                                <div class="card">
                                    <div class="card-header">dato nombre 1 </div>                                    
                                    <div class="card-body">Dato cantidad 1 </div>
                                </div>                              
                         
                                                    
                                <div class="card">
                                    <div class="card-header">dato nombre 1 </div>                                    
                                    <div class="card-body">Dato cantidad 1 </div>
                                </div>                              
                         
                                                    
                                <div class="card">
                                    <div class="card-header">dato nombre 1 </div>                                    
                                    <div class="card-body">Dato cantidad 1 </div>
                                </div>                              
                        
                                         
                    </div>
                    </div>
                    </div> 
            
          
           
                      
        </div>
    </div>
</div> -->
<!-- Creacion de cards en la vista  -->
<div class="kt-container kt-container--fluid" style="margin-top: 10px;">
    <div class="row">
        @foreach($datos_monitoreo_area as $datoarea)
                    <div class="col-sm-6 col-md-6 col-lg-4">
                        <div class="card bg-white p-3 mb-4 shadow">
                            <div class="d-flex justify-content-between mb-4">
                                <div class="user-info">
                                    <!-- <div class="user-info__img">
                                        <img src="#" alt="User Img">
                                    </div> -->
                                    <div class="user-info__basic">
                                        <h5 class="mb-0">{{$datoarea->name}}</h5>									
                                    </div>
                                </div>
                                <!-- <div class="dropdown open">
                                    <a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    
                                </div> -->
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
                            <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#ConsultarGrupo" data-nombregrupo="{{$datoarea->name}}">Consultar</button>
                                
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

<div class="modal fade" id="ConsultarGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div> -->
    </div>
  </div>
</div>

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

   
</script>



<script>
 $('#ConsultarGrupo').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var name = button.data('nombregrupo') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('Grupo ' + name)



    
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
                click:onClick,                        
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
    $(function(){
        $('#ConsultarGrupo').modal()
    });    
}





// etiquetamodal


</script>


 
@endsection
@endsection


