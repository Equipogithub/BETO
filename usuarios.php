<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Pagina Anime</title>
	<link rel="stylesheet" type="text/css" href="general.css">
</head>
		
<body div   background="img/chica.jpg">
<div class="caja">
     <div class="banner"></div>
    
    <div class="menu"> 
	<nav>
		<ul>
      <li><a href="#" class="Inicio">Concerts</a></li>        
    <li><a href="#" class="Manga">News</a></li>        
    <li><a href="#" class="Peliculas">Radio</a></li>
    <li><a href="#" class="videos">Videos</a></li>        
    <li><a href="#" class="Ovas">Mixes </a></li>         
    <li><a href="#" class="music">Music</a></li>        
    <li><a href="#" class="Club">Featured</a></li>        
    <li><a href="#" class="Salir">Welcome</a></li> 
            <a href="http://tic3ajosealberto.blogspot.mx/2016/06/jose-alberto-hernandezlaurel-las-palmas.html" target="_blank" > Ir a blog</a>
          
		</ul>	
	</nav>
        
             
    
    </div>
         <div class="contenido"> Contenido de la pagina
           
            <aside id="datos">
		<form id="formulario2" action="proceso.php" method="POST" >
		<table >
		<tr>
			<td> <label for="usuario">Usuario :</label></td>
			<td><input type="text" id="txtusr" name="txtusr" placeholder="Usuario" autofocus></td>
		</tr>  
		<tr>
			<td><label for="passwrd">Password :</label></td>
            
			<td><input type="password" id="txtpwd" name="txtpwd" ></td>
		</tr>
		<tr>
			<td><input type="submit" name="btn" value="Aceptar" id="btn"></td>
            <div class="eliminar"> 
                <td><input type="submit" name="btn" value="Eliminar" id="btn"></td>  
            </div>
		</tr>
        </table>
            </form>
            <div class="formulario">
		<table>
		
	  
            <?php
            require_once
            'control/usuarios.php';
            $clsUsuarios = new usuarios();
            $dsUsuarios= $clsUsuarios->getUsers();
            $tablausuarios="<table id='listausuarios'>";
            $tablausuarios=$tablausuarios."<thead>";
            $tablausuarios=$tablausuarios."<tr>";
            $tablausuarios=$tablausuarios."<th></th>";
            $tablausuarios=$tablausuarios."<th>ID</th>";
            $tablausuarios=$tablausuarios."<th>USUARIOS</th>";
                $tablausuarios=$tablausuarios."</tr>";
            $tablausuarios=$tablausuarios."</thead>";
            $tablausuarios=$tablausuarios."<tbody>";
            if(sizeof($dsUsuarios) >0){
                foreach($dsUsuarios as $usuario){
                    
                    $tablausuarios=$tablausuarios."<tr>";
                    $tablausuarios=$tablausuarios."<td><input type='checkbox' name='seleccionar' id='".$usuario->getId()."'/></td>";
                    
                    
                    $tablausuarios=$tablausuarios."<td>".$usuario->getId().'</td>';
                    $tablausuarios=$tablausuarios."<td>".$usuario->getUsername().'</td>';
                    $tablausuarios=$tablausuarios."</tr>";
                    
                }
            }else{
                $tablausuarios=$tablausuarios."<tr>";
                $tablausuarios=$tablausuarios."<td>No existen Usuarios</td>";
                $tablausuarios=$tablausuarios."</tr>";
                
            }
            
                $tablausuarios=$tablausuarios."</tbody>";
                $tablausuarios=$tablausuarios."</table>";
?>
                
            <div style="text-align:right">
            <button id="btnBorrar">Eliminar Registro</button>
			</div>
			<?php echo $tablausuarios; ?>

                
    </table>
    </div>            
    </div>

<div class="destacados"> Area de destacado y relacionado
	
            <section>
		<article>

		</article>
	</section>
	
	<footer></footer>
            
            
 </div>
    
   
    
    <div class="gl"> 
    

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1869.8141202127053!2d-101.22373849190843!3d20.398212446585816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842c8c58dcd0ed3d%3A0x7d052b46eb2332e9!2sUTSOE%2C+Ecologista%2C+38400+Valle+de+Santiago%2C+Gto.!5e0!3m2!1ses!2smx!4v1467813356795" width="750" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
        

    </div>
    
    <div class="pie">Pie de pagina</div>
    </div>    
<script src="public/plugins/jquery-2.1.4.min.js"></script>
<script>
$(document).ready(function(){
	// this is the id of the form
	$("#datos").find("form").on("submit", function (event) {
     event.preventDefault();
		$.ajax({
          url: "proceso.php", 
          type: "POST",
          //datos del formulario
          data: $(this).serialize(),
          //una vez finalizado correctamente
          success: function (response) {
		 	if(response!=""){
				alert(response); 
				// show response from the php script.	
			}
          }
     });
	});
    
    
    $("#btnBorrar").click(function (event) {
		$("input:checkbox[name=seleccionar]:checked").each(function() {
          var parametros = {
          		"ID": $(this).attr("id")
		  	  };
			
		  $.ajax({
	      url: "borrar.php", 
          type: "POST",
          //datos del formulario
          data: parametros,
          //una vez finalizado correctamente
          success: function (response) {
               location.reload();
		  },
          error: function (response) {
               alert(response);
		  },
		  });

    	});
		//window.location.href = path + 'xls/articulosCica2016.xlsx';
     });

    
});
     
    
</script>
</body>
</html>