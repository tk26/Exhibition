
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
   
    return ok;
}

