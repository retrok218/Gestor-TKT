
<div class="modal fade" id="ConsultarGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Areas de {{$id}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
       <div class="modal-body">



<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">    
        <!-- <div class="kt-portlet__body">                     -->
                    <div class="row row-no-padding row-col-separator-xl">			
                    <div class="col-md-12 col-lg-12 col-sm-12 pull-left" >   <!--  responsive -->
                            <!--begin::Total Profit-->                            
                          <table>
                            <thead>
                                <tr>
                                    <th>Numero de Ticket</th>
                                    <th>Asunto</th>
                                    <th>Creado</th>
                                </tr>                                
                            </thead>
                            @foreach($tarea as $tare)

                            <tbody>
                                <tr>
                                    <td>{{$tare->tn}}</td>
                                    <td>{{$tare->title}}</td>
                                    <td>{{$tarea->create_time}}</td>
                                </tr>

                            </tbody>
                            


                          </table>
                            





                    </div>   
                    </div>
                    
                
    </div>      
    
</div>
<!--se agrega el includ para creacion de datatable -->






      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div> 
    </div>
  </div>
</div>


