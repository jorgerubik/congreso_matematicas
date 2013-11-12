//generación de id aleatorio para usuario, ponencia, cartel, curso y taller
$(document).ready(function()
	{
		$("#Primerap, #Segundoap,#Nombre").keyup(function(){
		
    paterno=document.getElementById('Primerap').value.toUpperCase().substr(0,3);
    materno=document.getElementById('Segundoap').value.substr(0,1);
    nombres=document.getElementById('Nombre').value.substr(0,3);
    aleatorio = Math.floor(Math.random() * 900) + 100;
    cadena=paterno+materno+nombres+aleatorio;

 		 $("#id_usuario").val(cadena);
	});
//genera id para ponencia
	$("#titulo_ponencia").keyup(function() {
		ponencia=document.getElementById('titulo_ponencia').value.toUpperCase().substr(0,3);
		aleatorio = Math.floor(Math.random() * 900) + 100;
		cadena=ponencia+aleatorio;
		$("#id_trabajo").val(cadena);
	});
	
	
//genera id para cartel
	$("#titulo_cartel").keyup(function() {
		ponencia=document.getElementById('titulo_cartel').value.toUpperCase().substr(0,3);
		aleatorio = Math.floor(Math.random() * 900) + 100;
		cadena=ponencia+aleatorio;
		$("#id_trabajo").val(cadena);
	});		
//genera id para curso
	$("#titulo_curso").keyup(function() {
		ponencia=document.getElementById('titulo_curso').value.toUpperCase().substr(0,3);
		aleatorio = Math.floor(Math.random() * 900) + 100;
		cadena=ponencia+aleatorio;
		$("#id_trabajo").val(cadena);
	});		
//genera id para taller
	$("#titulo_taller").keyup(function() {
		ponencia=document.getElementById('titulo_taller').value.toUpperCase().substr(0,3);
		aleatorio = Math.floor(Math.random() * 900) + 100;
		cadena=ponencia+aleatorio;
		$("#id_trabajo").val(cadena);
	});				
})
