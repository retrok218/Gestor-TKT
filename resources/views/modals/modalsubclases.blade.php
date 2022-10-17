<div class="modal fade" id="ConsultarGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Areas de {{ $nombre }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     
       <div class="modal-body">
       <table class="table table-bordered">
        @foreach($filass as $fila)                     
            <thead>
              <tr>                                
                <th >Area/Fila</th>
                <th >Tickets Asignados </th>
                
              </tr>
            </thead>
            <tbody>
              <tr>                
                <td><a  href="{{url("/tkts_area_asignados/{$fila->id}") }}" target="_blank" title="Desglose del area"> {{$fila->name}} </a> </td>
                <td>{{$fila->numfila}}</td>                                                           
              </tr>                         
            </tbody>                          
        @endforeach
        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
      </div> 
    </div>
  </div>
</div>


