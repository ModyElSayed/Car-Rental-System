function cardnumber() {
  const card  = document.getElementById("card").value;

  var masterCard = /^(?:5[1-5][0-9]{14})$/;
  var visaCard = /^(?:4[0-9]{12}(?:[0-9]{3})?)$/;
  var americanExpressCard = /^(?:3[47][0-9]{13})$/;

  if(card.value.match(masterCard) || card.value.match(visaCard) || card.value.match(americanExpressCard)) {
      return true;
  } else {
      alert("Not a valid Card number!");
      return false;
  }

}

function clearFuncForRegistration()	{
		document.getElementById("card").value="";
}
