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
							<div class="dropdown open">
								<a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-ellipsis-v"></i>
								</a>
								<div class="dropdown-menu" aria-labelledby="triggerId1">
									<a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Consultar </a>
									<!-- <a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i> Delete</a> -->
								</div>
							</div>
						</div>
						<h6 class="mb-0">{{$datoarea->tikets_area_grupo}}</h6>
						
						<div class="d-flex justify-content-between mt-4">
							<a href="#"><span class="text-success font-weight-bold">Consult</span></a>
							
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

<script type="text/javascript">

window.onload = function () {
	var chart = new CanvasJS.Chart("GraficaMonitoreoArea", {
        theme: "light1", // "light1", "light2", "dark1"

        animationEnabled: true,          
          title: {
            fontColor: "#fdf9f9",
            fontSize: 14,           
            text: "Total Areas" + {{$sumareas}}           
        },

        axisX: {
			labelMaxWidth: 500,
			labelWrap: true,   // change it to false
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
    alert(  e.dataSeries.type + ", dataPoint { x:" + e.dataPoint.label + ", y: "+ e.dataPoint.y + " }" );
}



</script>
 
@endsection
@endsection


