@include('layouts.header')
    <style>
            @import url('https://fonts.googleapis.com/css2?family=Inter&family=Montserrat&family=Nunito+Sans&family=Poppins&family=Raleway&display=swap');
        .lienE{
            color: white;
        }
        .container-eco{
            display: flex;
            height: 90vh;
            flex-direction: column;
            gap: 15px;
        }
        .titre-eco{
            color: #FFC700;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            margin-top: 1vh;
        }
        .pavé{
            text-align: justify;
            width:50vw;
            margin: 0 auto;
            font-family: 'Montserrat', sans-serif;
        }
        .LSV{
            background: linear-gradient(24deg, rgba(180,180,180,1) 0%, rgba(119,119,119,1) 100%);
            opacity: 0.8;
            width:38vw;
            margin: 0 auto;
            border-radius:8px;
            padding:8px;
            font-family: 'Montserrat', sans-serif;
        }
        .LSV-btn{
            background: linear-gradient(24deg, rgba(136,136,136,1) 0%, rgba(84,84,84,1) 100%);
            color:#fff;
            opacity: 0.8;
            width:38vw;
            margin: 0 auto;
            border-radius:8px;
            padding:8px;
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <div style="display: flex;">
        <div class="container-eco" style="flex:0.6;">
            <h1 class="titre-eco">Le tri</h1>
            <div class="pavé">Il est important de notifier que les petits gestes du quotidien combinés peuvent avoir un impactsignificatif sur l’environnement. On peut tous contribuer pour protéger notre planète et ainsipréserver les ressources naturelles pour les générations futures.Le tri selectif est simple mais tellement important pour s’y faire il suffit retenir 4 règles.<br> Règle n°1 : tous emballages en carton, papier, acier, aluminium et briques alimentaires vontdans un bac de tri pour être recyclés<br> Règle n°2 : les emballages en plastiques (bouteilles et flacons) vont aussi dans ce bac de tri<br> Règle n°3 : les bouteilles, pots et bocaux vont eux dans un conteneur en verre.<br> Règle n°4 : la vaisselle et la porcelaine ne se recyclent pas.</div>
        </div>
        <div class="container-eco" style="flex:0.4;">
            <h1 class="titre-eco">Le saviez vous ?</h1>
            <div class="LSV" id="LSV1">Laisser simplement son appareil en veille consomment 10% d’électricité en plus donc pensez bien à éteindre complétement vos appareils électriques</div>
            <div class="LSV" id="LSV2">Un bain consomme 150 a 200 litres d’eau qui contrairement a une douche de 4 a 5 min ne nécessite que 30 à 80 litres d’eau</div>
            <div class="LSV" id="LSV3">Un chewing-gum met plus de 5 ans a se dégrader, 100 ans pour une canette en aluminium et 450 ans pour un sac plastique.</div>
            <button class="LSV-btn" onclick="LSV_info()">Cliquez pour genéré d'autres informations</button>
        </div>
    </div>
    <script>
        function LSV_info(){
            const conseilsEcologiques = ["Laisser simplement son appareil en veille consomme 10% d’électricité en plus donc pensez bien à éteindre complètement vos appareils électriques","Un bain consomme 150 a 200 litres d’eau qui contrairement a une douche de 4 a 5 min ne nécessite que 30 à 80 litres d’eau","Un chewing-gum met plus de 5 ans a se dégrader, 100 ans pour une canette en aluminium et 450 ans pour un sac plastique.","Les ampoules Led consomment en moyenne 80% d’électricité en moins que les ampoules classique pour une durée de vie supérieur","Lorsque vous laissez votre chargeur sur la prise même sans être utilisé ce dernier consomme de l’énergie","Les français gaspillent près de 10 millions de tonnes de produit alimentaire. Essayer de prévoir vos repas a l’avance pour éviter les achats inutiles.","L’industrie du web représente près de 10% des émissions de gaz à effets de serre dans le monde. Privilégiez un moteur de recherche écolo comme Ecosia, Lilo…","Le train est le mode de transport pour les longues distances le moins polluants contrairement à l’avion par exemple","La peau de la pomme contient plus de vitamines et de fibres que le fruit lui-même. Vous pouvez en faire par exemple des chips pour éviter un gaspillage inutile.","Acheter d’occasion a un réel impact sur l’environnement puisqu’au lieu de détruire les objets on les recycles.","Le covoiturage peut être considéré comme une invention formidable puisqu’en partageant les coûts de transport moins de voitures sont utilisé pour déplacer le même nombre de personnes","Est-il plus désagréable pour nous ou pour notre planète de boire avec un verre ? 1 milliard de pailles sont jetées par jour dans le monde entier.","En France, la publicité équivaut à 13,4 millions d’arbres abattus. Si cela ne vous intéresse pas, mettez “stop pub“ sur votre boite aux lettres"];

            let c1 = Math.floor(Math.random() * conseilsEcologiques.length);

            document.getElementById('LSV1').innerHTML=""+conseilsEcologiques[c1]+"";

            let c2 = Math.floor(Math.random() * conseilsEcologiques.length);

            document.getElementById('LSV2').innerHTML=""+conseilsEcologiques[c2]+"";

            let c3 = Math.floor(Math.random() * conseilsEcologiques.length);

            document.getElementById('LSV3').innerHTML=""+conseilsEcologiques[c3]+"";

        }
    </script>
@include('layouts.footer')
