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
	var div,h4,p,img;
	for (i = 0; i < data.length; i++) { 
    	categoria = data[i];
    	name = categoria.name;
    	descripcion=categoria.descripcion;
    	id=categoria.id;
    	div =document.createElement("DIV");
    	div.className += "card";
    	h4=document.createElement("H4");
    	h4.className += 'card-title';
    	p=document.createElement("P");
    	p.className += 'card-text';
	    a=document.createElement("A");
	    a.href='http://localhost/categorias/'+id;
	    a.innerHTML = name;
	    pp=document.createElement("P");
	    pp.innerHTML="Categoria:";
	    pp.appendChild(a);
		h4.innerHTML=name;
    	p.innerHTML=descripcion;
    	img =document.createElement("IMG");
    	img.className+="card-img-top";
    	img.src=categoria.imagen;
    	img.alt=categoria.name;
    	div.appendChild(img);
    	div.appendChild(h4);
    	div.appendChild(p);
    	div.appendChild(pp);
    	columna.appendChild(div);
	}

}
	




