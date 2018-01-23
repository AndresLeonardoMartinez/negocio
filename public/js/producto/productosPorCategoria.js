var productos=[];
var categorias=[];
var n;

function pedirProductos(path){
$.ajax({
        url:   path,
        type:  'get',
	    dataType: 'json',

        success:  function (response) {
                
                parsearProductos(response);
        }
});
};

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
        n = $('#categoria_id').html();
        console.log(n);

        var path = '/productos/categoria/'+n;
        
        pedirProductos(path);
}




function parsearProductos(data){
    
        var columna= document.getElementById('r');
        var name, descripcion, precio, producto, imagen;
        var div,h4,p,h6,img;
        for (i = 0; i < data.length; i++) { 
        producto = data[i];
        name = producto.name;
        descripcion=producto.descripcion;
        precio=producto.precio;
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
            a.href='/categorias/'+n+'/get';
            var cc = categorias [n];
            a.innerHTML = cc.nombre;
            pp=document.createElement("P");
            pp.innerHTML="Categoria:";
            pp.appendChild(a);
            h4.innerHTML=name;
        p.innerHTML=descripcion;
        h6.innerHTML="$"+precio;
        img =document.createElement("IMG");
        //img.className+="card-img-top";
        console.log(producto.imagen);
        img.src=producto.imagen;
        img.className+="producto";
        img.alt=producto.name;
        // img.height="200";
        // img.width="200";
        div.appendChild(img);
        div.appendChild(h4);
        div.appendChild(p);
        div.appendChild(h6);
        div.appendChild(pp);
        columna.appendChild(div);
        }
}