function getCredenciales()
						{
	
						var User = document.getElementById("User").value;
						var Pass = document.getElementById("Pass").value;
						if (User == "TDP2019" && Pass == "1234" ) {
							   window.location = "TDPAuto.html";
							}
							else  {
							   alert("Credenciales Incorrectas");
							}
						
						}