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
var columna= document.getElementById('r');
	var name, descripcion, precio, categoria_id,producto;
	var div,h3,h4,img,center0;
	for (i = 0; i < data.length; i++) { 
    	categoria = data[i];
    	name = categoria.name;
    	descripcion=categoria.descripcion;
    	id=categoria.id;
    	div =document.createElement("DIV");
    	div.className += "card";
    	h4=document.createElement("H4");
    	h4.className += 'card-title';
    	h3=document.createElement("p");
    	h3.className += 'card-text';
	    a=document.createElement("A");
	    a.href='/categorias/'+id+'/get';
        a.innerHTML = name;
    	h3.innerHTML=descripcion;
    	img =document.createElement("IMG");
    	img.className+="categoriaImagen";
    	img.src=categoria.imagen;
    	img.alt=categoria.name;
    	center0 =document.createElement("CENTER");
        center0.appendChild(img);
        div.appendChild(center0);
        h4.appendChild(a);
        center0.appendChild(h4);
    	center0.appendChild(h3);
    	columna.appendChild(div);
	}

}
	




