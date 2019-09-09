var Usuario= "0";

function getCredenciales(user,pass)
						{
						User = user;
						var Pass = pass;
						if (User == "TDP2019" && Pass == "1234" ) 
						{
							alert("Credenciales Correctas");
							Usuario= "1";
							
							   window.location = "TDPAuto.html";
							   
							}
							else  {
							   alert("Credenciales Incorrectas");
							}
						
						}





function sesion()
{

if (Usuario == "0" ) 
{
	alert("Tiene que inicar sesion");
	window.location = "Login.html";
	}
	else  {
		alert("Inicio Sesion");
		   window.location = "TDPAuto.html";
	   
	}

}