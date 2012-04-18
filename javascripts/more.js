function showlayer(layer){
var myLayer = document.getElementById(layer).style.display;
if(myLayer=="none"){
document.getElementById(layer).style.display="block";
} else { 
document.getElementById(layer).style.display="none";
}
}