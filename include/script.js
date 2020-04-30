(function() {
  var imageErwan = document.createElement("img");
  imageErwan.src = "image/erwan.jpg";
  imageErwan.className = "test";
  var recto = document.querySelector(".recto");
  var compteur = 0;
  var carte = document.querySelector(".carte");
  var boutonCreation = document.querySelector(".btnCreation");
  var boutonConnexion = document.querySelector(".btnConnexion");
  boutonCreation.addEventListener("click", function(e)
  {
    carte.style.transform = "rotateY(180deg)";
    compteur = compteur + 1;
    if (compteur > 1)
    {
      var formulaire = document.querySelector(".recto form");
      formulaire.remove();
      recto.appendChild(imageErwan);
      document.querySelector(".recto h1").remove();
    }
  });
  boutonConnexion.addEventListener("click", function(e)
  {
    carte.style.transform = "rotateY(0deg)";
  });
})();