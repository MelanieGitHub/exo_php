<?php
                  $id = $_SESSION['idsession'];

                  $req_commande = "SELECT plat_commande.ID AS ID, commande.Date_Commande AS Date, 
                  commande.Cle_Compte AS Compte, commande.ID_Commande AS N_Com, commande.Total_Commande as Total_Com
                  FROM plat_commande INNER JOIN commande ON commande.ID_Commande = plat_commande.Cle_Commande 
                  WHERE commande.Cle_Compte = '" . $id . "' GROUP BY N_Com";