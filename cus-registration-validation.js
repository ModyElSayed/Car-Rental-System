function customer_registration() {
    const fname = document.getElementById("fname").value;
    const lname = document.getElementById("lname").value;
    const ssn = document.getElementById("ssn").value;
    const dob = document.getElementById("dob").value;
		const address   = document.getElementById("address").value;
		const city  = document.getElementById("city").value;
    const zip = document.getElementById("zip").value;
    const country  = document.getElementById("country").value;

    //email id expression code
		const pwd_expression = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])/;
    const letters = /^[A-Za-z]+$/;
		const filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    const birthday = new Date(dob);
    const date = new Date();

    const year = date.getFullYear() - birthday.getFullYear();
    const month = date.getMonth() - birthday.getMonth();
    const day = date.getDate() - birthday.getDate();

    if(fname==='') {
			alert('Please enter your first name');
			return false;
    } else if(!letters.test(fname)) {
			alert('First Name field requires only alphabet characters');
			return false;
    } else if(lname==='') {
			alert('Please enter your last name');
			return false;
    } else if(!letters.test(lname)) {
			alert('Last Name field requires only alphabet characters');
			return false;
    } else if(ssn==='') {
      alert('Please enter your ssn');
      return false;
    } else if(ssn.length != 9) {
      alert('Please a vaild ssn');
      return false;
    } else if(year < 18 || (year == 18 && ((month < 0) || (month == 0 && day < 0)))) {
      alert('Make sure you are 18+');
      return false;
    } else if(address==='') {
			alert('Please enter your address');
			return false;
    } else if(city==='') {
			alert('Please enter your city');
			return false;
    } else if(!letters.test(city)) {
			alert('City field requires only alphabet characters');
			return false;
    } else if (zip==='') {
      alert('Please enter your zip');
      return false;
    } else if (zip.length != 5) {
      alert('Please enter a valid zip');
      return false;
    } else if(country==='Select Country') {
      alert('Please select a country');
			return false;
    }

		return true;
}

function clearFuncForRegistration()	{
		document.getElementById("fname").value="";
		document.getElementById("lname").value="";
		document.getElementById("ssn").value="";
    document.getElementById("dob").value= new Date();
		document.getElementById("zip").value="";
		document.getElementById("address").value="";
    document.getElementById("city").value="";
    document.getElementById("country").value="Select Country";

}
