function showlayer(layer){
var myLayer = document.getElementById(layer).style.display;
if(myLayer=="none"){
document.getElementById(layer).style.display="block";
} else { 
document.getElementById(layer).style.display="none";
}
}

function toggle2(showHideDiv, switchImgDiv) {
	var ele = document.getElementById(showHideDiv);
	var picture = document.getElementById(switchImgDiv);
	var arrow = document.getElementById("arrow1");
	if(ele.style.display == "block") {
    		ele.style.display = "none";
		picture.src="images/plus.png";
		arrow.style.visibility = "hidden";
		
  	}
	else {
		ele.style.display = "block";
		picture.src="images/minus.png";
		arrow.style.visibility = "visible";
	}
}