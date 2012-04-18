function toggle2(showHideDiv, switchTextDiv) {
	var ele = document.getElementById(showHideDiv);
	var picture = document.getElementById(switchTextDiv);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		picture="../images/minus.png";
  	}
	else {
		ele.style.display = "block";
		picture="../images/plus.png";
	}
}