<!-- Creacion de tabla tickets asignados -->
<div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    {{$nom_tkt_estatus}}
                </h3>
            </div>            
        </div>    
        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <form class="kt-form kt-form--fit kt-margin-b-20">                
                <div class="row kt-margin-b-4">
                    <div class="col-lg-12 kt-margin-b-10-tablet-and-mobile">
                        <label>Rango de Busqueda :</label>                       
                        <div class="input-group date">               
                            <div class="input-daterange input-group" id="kt_datepicker">
                                <input class="date_range_filter date " type="text" id="datepicker_from" placeholder="De la Fecha " autocomplete="off" />
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                </div>                            
                                <input class="date_range_filter date" type="text" id="datepicker_to" placeholder="A La Fecha"  autocomplete="off"/>
                              <div class="input-group-append">
                                <span class="input-group-text"><i class="flaticon-calendar"></i></span>
                              </div>                             
                              <button  class="btn  btn-secondary clear-date-filter " id="limpiar-fecha"> <i class="flaticon-delete"></i>Limpiar fecha </button>
                            </div>
                        </div>                                                           
                    </div>                                                            
                </div>                 
            </form>                       
            <!--begin: Datatable -->
            <div class="col-md-12 col-lg-12 col-sm-12 pull-left">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="tablatk">
            <thead>
                    <tr>  
                        <th></th>                     
                        <th>Numero de Tiket</th>
                        <th>Creado</th>
                        <th>Asunto</th>
                        <th>Area</th>
                        <th>Estado del Tiket</th>
                        <th>Nombre Usuario</th>                        
                    </tr>
                </thead>
                <tfoot>
                    <th></th>   
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>Seleccione El Usuario</th>
                </tfoot>
            </table>
            </div>
            <!--end: Datatable -->
        </div>
</div>
