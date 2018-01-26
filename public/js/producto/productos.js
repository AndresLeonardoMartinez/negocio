var productos=[];
var categorias=[];

$.ajax({
        
        url:   '/categorias',
        type:  'get',
	    dataType: 'json',

        success:  function (response) {
                parsearCategorias(response);
        }
});
function pedirProductos(){
$.ajax({
        url:   '/productos',
        type:  'get',
	    dataType: 'json',

        success:  function (response) {
                
                parsearProductos(response);
        }
});
};



function parsearCategorias(data){
    var cat,id;
    for (i = 0; i < data.length; i++) { 
        cat = data[i];
        id = (cat.id).toString();
        categorias[id] = {nombre:cat.name,descripcion:cat.descripcion};
    }
    pedirProductos();
}
