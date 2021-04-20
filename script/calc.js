function addListeners(){
	document.getElementById("btnCalc").addEventListener("click", calcBal);
}

function calcBal(){
	var a = document.getElementById("tdebit").value;
	var b = document.getElementById("tcredit").value;
	var c = a - b;
	document.getElementById("tbalance").value = c.toFixed(2);
	document.getElementById("tamount").value = c.toFixed(2);
	var d = document.getElementById("odebit").value;
	var e = document.getElementById("ocredit").value;
	var f = d - e;
	document.getElementById("obalance").value = f.toFixed(2);
	document.getElementById("oamount").value = f.toFixed(2);
	var g = c + f;
	document.getElementById("total").value = g.toFixed(2);
}
window.onload = addListeners();