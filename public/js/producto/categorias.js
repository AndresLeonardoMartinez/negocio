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
	var name, descripcion;
	var div,h3,h4,img,center0,div2,hr;
	for (i = 0; i < data.length; i++) { 
    	categoria = data[i];
    	name = categoria.name;
    	descripcion=categoria.descripcion;
    	id=categoria.id;
    	div =document.createElement("DIV");
        div2 =document.createElement("DIV");
    	center0 =document.createElement("CENTER");
        div.className += "";
        div2.className += "col-xs-6 col-sm-4 col-md-4";
        h4=document.createElement("H4");
        h4.className += 'card-title';
        hr=document.createElement("A");
        hr.href='/categorias/'+id+'/get';
        hr.innerHTML="...";
        h3=document.createElement("p");
        h3.className += 'card-text';
        a=document.createElement("A");
        a.href='/categorias/'+id+'/get';
        
        h4.innerHTML=name;
        a.appendChild(h4);

        
        
        h3.innerHTML=mostrar(descripcion);
        h3.appendChild(hr);
        img =document.createElement("IMG");
        img.className+="categoriaImagen";
        img.src=categoria.imagen;
        img.alt=categoria.name;
        center0.appendChild(img);
        //div.appendChild(center0);
        center0.appendChild(a);
        center0.appendChild(h3);

    	div2.appendChild(div);
        div.appendChild(center0);
        columna.appendChild(div2);
	}

}
	




function mostrar(descripcion){
    largo = descripcion.length;
    if (largo<=80)
        return descripcion;
    
    var texto = descripcion.slice(0,74);
    return texto;
}