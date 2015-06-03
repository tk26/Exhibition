
 function myFunction() {
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("password_confirmation").value;
    var ok = true;
    if (pass1 != pass2) {
        alert("Passwords Do not match");
        
        ok = false;
    }
	 if (pass1.length<8) {
        alert("Passwords must be at least 8 characters in length");
        
        ok = false;
    }
   
	
	 var agreed =  document.getElementById("t_and_c").checked;
     if( agreed==false )
	 {
		 alert("You have to agree with the terms and conditions to proceed with registration");
		 ok=false;
	 }
	
    return ok;
}

