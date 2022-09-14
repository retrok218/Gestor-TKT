<div class="modal fade" id="ConsultarGrupo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @php
         $phpvar=15;
      @endphp
       <div class="modal-body">
        @foreach($filass as $fila)      
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tickes Asignados</th>                
                </tr>
            </thead>
            <tbody>
                <tr>               
                    <td>{{$fila->name}}</td>
                    <td>{{$fila->numfila}}</td>               
                </tr>                            
            </tbody>
        </table>              
        @endforeach
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div> 
    </div>
  </div>
</div>