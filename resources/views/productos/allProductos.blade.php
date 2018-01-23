@extends('layout.master')

@section ('js')        

		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/>
 
		<script type="text/javascript" src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

		  
@endsection


@section ('contenido')     
@include('productos.modalEliminar')

<center>
	<i><h3> Listado de todos los productos</h3></i>
	<br>
</center>

<div class="container">
    <table id="task" class="table table-hover table-condensed">
        <thead>
        <tr>
			<th>Nombre</th>
            <th>Descripcion</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Stock</th>
			<th>Imagen<th>
        </tr>
        </thead>
    </table>
</div>
 
<script type="text/javascript">
var categorias=[];
$.ajax({
        
        url:   '/categorias',
        type:  'get',
	    dataType: 'json',

        success:  function (response) {
                parsearCategorias(response);
        }
});
function parsearCategorias(data){
	var cat,id;
	for (i = 0; i < data.length; i++) { 
		cat = data[i];
		id = (cat.id).toString();
		categorias[id] = {nombre:cat.name,descripcion:cat.descripcion};
	}
console.log(categorias);
}
    $(document).ready(function() {
        
    	oTable = $('#task')
        .removeClass( 'display' )
		.addClass('table table-striped table-bordered');

        $('#task').DataTable({
        	"language": {
            "lengthMenu": "Ver _MENU_ productos por página",
            "zeroRecords": "No hay productos",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "No hay Productos",
            "infoFiltered": "(filtro hecho sobre un total de _MAX_ productos)"
        },
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('datatable.productos') }}",
            "columns": [
                {data: 'name', name: 'name'},
                {data: 'descripcion', name: 'descripcion'},
                {"data":"categoria_id",
                "render":function ( data, type, val, meta ){
					 
					return "<a href=/categorias/"+data+"/get>"+(categorias[data]).nombre+'</a>';
                	
                }
            	},
                {data: 'precio', name: 'precio'},
                {data: 'stock', name: 'stock'},
                {"data": "imagen",
    			"render": function (data, type, full, meta) {
        		return "<center><img style='width: 125px;height: 125px;'       		 src=" + data  +" ></center>";
    			}},

            ]
        });
    });


function cat(data)	{
}
</script>
				

@endsection
