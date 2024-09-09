<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
               font-family: 'Nunito', sans-serif;
               color: #333;
               background-color: #fff;
               margin: 0;
               padding: 0 3%;
          }
          .header {
              
               justify-content: space-between;
               font-size: 12px;
               line-height: 1;
               width: 100%;
          }
          img {
               width: 100px;
               height: 50px;
               margin: 0 auto;
          }

        .first{
            text-align: center;
            font-size: 14px;
        }
        .trait{
            text-align: center;
            margin-top: -30px;
        }
        .drapeau{
            margin-top: 1%;
               height: 30px;
               text-align:center;        
        }
        .Mesri{
            text-align:center;
            margin-top: 3%;
        }
        .Crous{
            text-align:center;
            margin-top: -20px;
        }
        .crous{
            margin-top: 1%;
               height: 30px;
               text-align:center;        
        }
        .DECT{
            text-align:center;
            margin-top: 7px;
        }

        .SEC{
            text-align:center;
            margin-top: -10px;
            color:blue;
        }
        .FI{
            text-align:center;
            margin-top: 3%;
            font-size: 20px;
        }
        table {
               width: 100%;
               border-collapse: collapse;
               margin-top: 5%;
               margin-bottom: 5%;
          }
          .border {
               border: 1px solid #333;
               padding: 10px;
               text-align: center;
          }
          .bordered {
               border: 1px solid #333;
               padding: 50px;
               text-align: center;
          }
          .signature{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 5%;
            margin-bottom: 5%;
            width: 100%;
          }
          .ouvrier, .secteur, .chef {
    font-weight: bolder;
    font-size: 12px;
    text-decoration: underline;
    margin: 1%; /* Réduire la marge pour bien répartir */
    box-sizing: border-box; /* Assurer que les marges n'affectent pas la largeur totale */
}

.ouvrier {
    float: left;
    width: 30%; /* Occupe environ un tiers de la largeur */
}

.secteur {
    float: left;
    width: 25%; /* Occupe environ un tiers de la largeur */
    margin-left: 0; /* Retirer le décalage gauche pour équilibrer */
    text-align: center; /* Centrer le texte si nécessaire */
}

.chef {
    float: right;
    width: 33%; /* Occupe environ un tiers de la largeur */
    margin-right: 0; /* Ajuster les marges pour éviter un décalage */
    text-align: center;
}

    </style>
</head>
<body>
   <header>
    <div class="header">
        <div class="first">
        <p>République du Sénégal</p>
        <p>Un peuple - Un but - Une Foi</p>
        </div>
        <div class="trait">
            <h3>---------------</h3>
        </div>
        <div class= "drapeau">
        <img src="img/dpsenegal.png" alt="drapeau du sénégal">
        </div>
        <div class="Mesri">
            <p>MINISTERE DE L'ENSEIGNMENT SUPERIEUR DE LA RECHERCHE ET DE</p>
            <p>L'INNOVATION</p>
        </div>
        <div class="trait">
            <h3>---------------</h3>
        </div>
        <div class="Crous">
            <p>CENTRE REGIONAL DES OEUVRES UNIVERSITAIRES SOCIALES DE ZIGUINCHOR</p>
            <p>(CROUSZ)</p>
        </div>
        <div class= "crous">
        <img src="img/crous.png" alt="logo crousz">
        </div>
        <div class="DECT">
            <p>DIVISION DE L'ENTRETIEN, DES CONSTRUCTIONS ET DU TRANSPORT</p>
            <p>(D.E.C.T)</p>
        </div>

        <hr>
        <div class="SEC">
            <p>SERVICE DE L'ENTRETIEN ET DE LA CONSTRUCTION (S.E.C)</p>
           
        </div>

        <div class="FI">
            <h4>FICHE D'INTERVENTION</h4>
        </div>
            <hr>
    </div>
    </header>

    <div class="">
        <p>Prénom et Nom de l'ouvrier intervenant: ..................................................</p>
        <p>Secteur de l'ouvrier intervenant: ..................................................................</p>
    </div>

    <table class="table table-striped table-border">
        <thead class="table-dark">
            <tr>
                <th class="border">NATURE DES TRAVAUX</th>
                <th class="border">QUANTITE DE MATERIELS CONSOMMABLE</th>
                <th class="border">LIEU D'INTERVENTION</th>
                <th class="border">OBSERVATION</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="bordered">1</td>
                <td class="bordered">2</td>
                <td class="bordered">2</td>
                <td class="bordered">2</td>
            </tr>
        </tbody>
    </table>

    <div class="signature">
        <div class="ouvrier">Ouvrier intervenant</div>
        <div class="secteur">Secteur demandeur</div>
        <div class="chef">Chef du service  <br> de l'entretien  et de la construction</div>
    </div>

    
</body>
</html>