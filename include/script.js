
var compteur = 0;
var carte = document.querySelector(".carte");
var boutonCreation = document.querySelector(".btnCreation");
var boutonConnexion = document.querySelector(".btnConnexion");
boutonCreation.addEventListener("click",function(e){
  carte.style.transform = "rotateY(180deg)";
  compteur = compteur + 1;
  if(compteur > 4)
  {
    var = document.querySelector("body").style.backgroundColor ="red";
  }
});
boutonConnexion.addEventListener("click",function(e){
  carte.style.transform = "rotateY(0deg)";
});
