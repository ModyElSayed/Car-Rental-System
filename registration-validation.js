function registration() {
		const email = document.getElementById("email").value;
		const pwd   = document.getElementById("password").value;
		const cpwd  = document.getElementById("pass_confirm").value;

    //email id expression code
		const pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
		const filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(email==='') {
			alert('Please enter a non-empty email');
			return false;
    } else if (!filter.test(email)) {
			alert('Invalid email');
			return false;
    } else if(pwd==='') {
			alert('Please enter Password');
			clearFuncForRegistration();
			return false;
    } else if(cpwd==='') {
			alert('Enter Confirm Password');
			clearFuncForRegistration();
			return false;
    } else if(!pwd_expression.test(pwd)) {
			alert ('Upper case, Lower case, Special character and Numeric letter are required in Password filed');
			clearFuncForRegistration();
			return false;
    } else if(pwd != cpwd) {
			alert ('Password not Matched');
			clearFuncForRegistration();
			return false;
    } else if(document.getElementById("pass_confirm").value.length < 6) {
			alert ('Password minimum length is 6');
			clearFuncForRegistration();
			return false;
    }

		return true;
}

function clearFuncForRegistration()	{
		document.getElementById("email").value="";
		document.getElementById("password").value="";
		document.getElementById("pass_confirm").value="";
}
