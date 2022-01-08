function signin() {

		const email = document.getElementById("email").value;
		const pwd   = document.getElementById("password").value;

		const letters = /^[A-Za-z]+$/;
		const filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if(email==='') {
			alert('Please enter a non-empty email');
			return false;
    } else if (!filter.test(email)) {
			alert('Invalid email');
			return false;
    } else if(pwd==='') {
			alert('Please enter Password');
			return false;
    }
		return true;

}

function clearFuncForSignIn() {
  		document.getElementById("email").value="";
  		document.getElementById("password").value="";
}
