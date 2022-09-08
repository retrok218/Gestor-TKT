@extends('home')
@section('content')
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
     window.setInterval(function(){ 
        let cantarea =  $("#cantidad_ventana").text();                        
        $("p").text(cantarea);
    },3000);
   });

   
</script>


<script>

window.onload = function (){
    var chart = new CanvasJS.Chart("grafica_ticket_area",{
      	animationEnabled: true,
        animationDuration: 1000,
      	interactivityEnabled: true,
        exportEnabled: true,
      	// 	 legend:{
        //   fontSize: 8,
        //   horizontalAlign: "center", 
        //   verticalAlign: "bottom",  
        //   itemWrap: false,
        //   itemWidth: 100,
        //   cursor: "default",
        //   markerMargin:1,
        //   itemMaxWidth: 100, 
      	//  },
      	data: [
      			{                           
      			type: "pie",
      			showInLegend: true,
      			legendText: "{label}",
                indexLabel: "{label} - #percent%",
      			dataPoints: [
                            { label: "Tikets Nuevos  ", y: 44  },
                            { label: "Tickets Cerrados Exitosamente ", y: 45  },                             
      						]
      			}
      		]
        });
chart.render(); 
};
</script>
 
@endsection
@endsection


