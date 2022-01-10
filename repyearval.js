function registration() {
	const yeara = document.getElementById("yeara");
	const yearaval = yeara.value;
	
	const yearb = document.getElementById("yearb");
	const yearbval = yearb.value;
	
	
	if(yearbval < yearaval)
	{
		alert('Please specify a maximum year equal to or greater than the minimum year');
		return false;
	}
	return true;
}