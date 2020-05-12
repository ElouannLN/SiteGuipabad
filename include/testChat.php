<?php
session_start();
if(isset($_SESSION["privilege"]))
{
?>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="chatFenetre">
            <div class="chatEntete">
                Ceci est le chat
            </div>

            <div class="chatConversation">

            </div>

            <div class="chatBarreCommunication">
                <input type="text" class="chatEcrireMessage">
                <div class="chatBoutonEnvoyerMessage"></div>
            </div>
        </div>
        <script>
        var boutonEnvoyerMessage = document.querySelector(".chatBoutonEnvoyerMessage");
        var inputMessage = document.querySelector(".chatEcrireMessage");
        var conversation = document.querySelector(".chatConversation");
        boutonEnvoyerMessage.addEventListener("click",function(e){
            var message = document.createElement("p");
            message.innerText = inputMessage.value;
            document.querySelector(".chatConversation").appendChild(message);
            inputMessage.value = "";
            conversation.scrollTop = conversation.scrollHeight;
        });



        var identifiant = "<?php echo $_SESSION["identifiant"]; ?>";
        var mdp = "<?php echo $_SESSION["mdp"]; ?>";
        var idAuteur = 1, idReceveur = 2;
        var XHR = new XMLHttpRequest();
        XHR.open("GET","envoyerMessage.php?id1=" + idAuteur + "&id2=" + idReceveur + "&identifiant=" + identifiant + "&mdp=" + mdp);
        //alert("envoyerMessage.php?id1=" + idAuteur + "&id2=" + idReceveur + "&identifiant=" + identifiant + "&mdp" + mdp);
        XHR.send(null);
        XHR.addEventListener("readystatechange",function()
        {
            if(XHR.readyState === XMLHttpRequest.DONE)
            {
                var leDocXML = XHR.responseXML;
                if(leDocXML.childNodes[0].childNodes.length > 0)
                {
                    var lesMessages = leDocXML.childNodes[0].childNodes;
                    for(var i = 0; i < lesMessages.length;i++)
                    {
                        var leMessage = lesMessages[i].childNodes;
                        for(var j = 0; j < leMessage.length;j++)
                        {
                            var yolo = leMessage[j].childNodes[0].nodeValue;
                            var message = document.createElement("p");
                            message.innerText = yolo;
                            conversation.appendChild(message);
                        }
                    }
                }
            }
        });

        </script>
    </body>
    </html>
<?php
}
?>