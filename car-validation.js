function registration() {
	const brand = document.getElementById("brand").value;
	const model = document.getElementById("model").value;
	const plateid = document.getElementById("plateid").value;

	const year = document.getElementById("year");
	const yearval = year.value;
	
	const status1 = document.getElementById("status");
	const statusval = status1.value;
		
	const price = document.getElementById("price");
	const priceval = price.value;

	let error = 0;
	
	
	if(brand == "")
	{
		alert('Please specify a brand');
		error = 1;

	}
	if(model == "")
	{
		alert('Please specify a model');
		error = 1;

	}
	if(yearval == "")
	{
		alert('Please select a year');
		error = 1;

	}
	if(statusval == "")
	{
		alert('Please select a status');
		error = 1;

	}
	if(price == "")
	{
		alert('Please specify a price');
		error = 1;

	}
	if(plateid == "")
	{
		alert('Please specify a plate id');
		error = 1;

	}
	if(error == 1)
	{
		return false;
	}
	return true;
}

function clearFuncForRegistration()	{
		document.getElementById("brand").value="";
		document.getElementById("model").value="";
		document.getElementById("year").value="";
		document.getElementById("status").value="";
		document.getElementById("plateid").value="";
		document.getElementById("price").value="";
}