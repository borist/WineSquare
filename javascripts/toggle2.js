function toggle2(showHideDiv, switchImgDiv) {
	var ele = document.getElementById(showHideDiv);
	var picture = document.getElementById(switchImgDiv);
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		picture="../images/plus.png";
  	}
	else {
		ele.style.display = "block";
		picture="../images/minus.png";
	}
}