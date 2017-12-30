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


function parsearProductos(data){
	var columna= document.getElementById('r');
	var name, descripcion, precio, categoria_id,producto;
	var div,h4,p,h6;
	for (i = 0; i < data.length; i++) { 
    	producto = data[i];
    	name = producto.name;
    	descripcion=producto.descripcion;
    	precio=producto.precio;
    	categoria_id= producto.categoria_id;
    	productos[i]=data[i];
    	div =document.createElement("DIV");
    	div.className += "card";
    	h4=document.createElement("H4");
    	h4.className += 'card-title';
    	p=document.createElement("P");
    	p.className += 'card-text';
    	h6=document.createElement("H6");
    	h6.className += 'card-subtitle mb-2 text-muted';
	    a=document.createElement("A");
	    a.href='http://localhost/categorias/'+categoria_id;
	    a.innerHTML = categorias [categoria_id].nombre;
	    pp=document.createElement("P");
	    pp.innerHTML="Categoria:";
	    pp.appendChild(a);
		h4.innerHTML=name;
    	p.innerHTML=descripcion;
    	h6.innerHTML="$"+precio;
    	div.appendChild(h4);
    	div.appendChild(p);
    	div.appendChild(h6);
    	div.appendChild(pp);
    	columna.appendChild(div);
	}

}

function parsearCategorias(data){
	var cat,id;
	for (i = 0; i < data.length; i++) { 
		cat = data[i];
		id = (cat.id).toString();
		categorias[id] = {nombre:cat.name,descripcion:cat.descripcion};
	}
	pedirProductos();
}

$(document).on('click','#Ordenar',function(){

	var columna= document.getElementById('r');
	while (columna.firstChild) {
    	columna.removeChild(columna.firstChild);
	}
	productos.sort(function (a, b) {
	  return a.precio - b.precio;
	});
	parsearProductos(productos);

});
$(document).on('click','#OrdenarMenor',function(){

	var columna= document.getElementById('r');
	while (columna.firstChild) {
    	columna.removeChild(columna.firstChild);
	}
	productos.sort(function (a, b) {
	  return a.precio - b.precio;
	});
	parsearProductos(productos);

});
$(document).on('click','#OrdenarMayor',function(){

	var columna= document.getElementById('r');
	while (columna.firstChild) {
    	columna.removeChild(columna.firstChild);
	}
	productos.sort(function (a, b) {
	  return  b.precio -a.precio;
	});
	parsearProductos(productos);

});
