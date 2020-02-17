var carte = document.querySelector(".carte");

var boutonCreation = document.querySelector(".btnCreation");
var boutonConnexion = document.querySelector(".btnConnexion");
boutonCreation.addEventListener("click",function(e){
  carte.style.transform = "rotateY(180deg)";
});
boutonConnexion.addEventListener("click",function(e){
  carte.style.transform = "rotateY(0deg)";
});
