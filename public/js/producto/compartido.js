function parsearProductos(data){
	var columna= document.getElementById('r');
	var name, descripcion, precio, categoria_id,producto, imagen,stock,nuevo;
	var div,h4,p,h6,img,divGrande;
	for (i = 0; i < data.length; i++) { 
    	producto = data[i];
    	name = producto.name;
        stock=producto.stock;
    	descripcion=producto.descripcion;
    	precio=producto.precio;
    	categoria_id= producto.categoria_id;
    	productos[i]=data[i];
    	//div =document.createElement("DIV");
    	divGrande = document.createElement("DIV");
    	divGrande.className+="col-xs-6 col-sm-4 col-md-4";
    	// div.className += "tarjeta";
    	h4=document.createElement("H4");
    	h4.className += 'card-title';
    	p=document.createElement("P");
        var stockp = document.createElement("p");
        stockp.innerHTML="Disponibles: "+stock;
        p.className += 'card-text';
        h6=document.createElement("H6");
        h6.className += 'card-subtitle mb-2 text-muted';
        a=document.createElement("A");
        a.href='/categorias/'+categoria_id+'/get';
        a.innerHTML = categorias [categoria_id].nombre;
        pp=document.createElement("P");
        pp.innerHTML="Categoria:";
        pp.appendChild(a);
        h4.innerHTML=name;
        p.innerHTML=descripcion;
        h6.innerHTML="$"+precio;
        img =document.createElement("IMG");
        
        img.className+="producto";
        img.src=producto.imagen;
        img.alt=producto.name;
        divGrande.appendChild(img);
        divGrande.appendChild(h4);
        divGrande.appendChild(p);
        divGrande.appendChild(h6);
        divGrande.appendChild(stockp);
        divGrande.appendChild(pp);
        
        //div.appendChild(divGrande);
    	columna.appendChild(divGrande);
	}
}

$(document).on('click','#OrdenarMenor',function(){

	eliminarContenido();
	productos.sort(function (a, b) {
	  return a.precio - b.precio;
	});
	parsearProductos(productos);

});
$(document).on('click','#OrdenarMayor',function(){

	eliminarContenido();
	productos.sort(function (a, b) {
	  return  b.precio -a.precio;
	});
	parsearProductos(productos);

});
$(document).on('click','#stockMayor',function(){

    eliminarContenido();
    productos.sort(function (a, b) {
      return  b.stock -a.stock;
    });
    parsearProductos(productos);

});
$(document).on('click','#stockMenor',function(){

    eliminarContenido();
    productos.sort(function (a, b) {
      return  a.stock -b.stock;
    });
    parsearProductos(productos);

});

function eliminarContenido(){
    var columna= document.getElementById('r');
    while (columna.firstChild) {
        columna.removeChild(columna.firstChild);
    }
}