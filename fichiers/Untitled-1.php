            <!-- //////////////////////////////////////////////////////////////////////// -->
            <!-- ////////////////////// SECTION DETAILS COMMANDE /////////////////////////////// -->
            <!-- //////////////////////////////////////////////////////////////////////// -->

            <section id='sctAllCommande'>
                  <?php

                  $req_commande = "SELECT 
                  plat.Libelle AS Plat, 
                  plat.Image AS Image, 
                  commande.ID_Commande AS Numero_Commande, 
                  plat_commande.Quantite, 
                  plat.Prix AS Prix_Unitaire, 
                  ROUND(plat.Prix * plat_commande.Quantite, 2) AS Total_Quantite_Plat, 
                  commande.Total_Commande as Total_Commande
                  FROM plat_commande 
                  INNER JOIN plat ON plat.ID = plat_commande.Cle_plat 
                  INNER JOIN commande ON commande.ID_Commande = plat_commande.Cle_Commande 
                  GROUP BY plat.ID HAVING commande.Cle_Compte = '1' AND plat_commande.Cle_Commande = '1'";

                  // WHERE commande.Cle_Compte = '1' AND plat_commande.Cle_Commande = '1' 
                  // GROUP BY plat.ID";

                  $exec_requete_commande = mysqli_query($db, $req_commande);

                  $num_commande = mysqli_fetch_assoc($exec_requete_commande);
                  ?>


                  <div class='border border-danger mb-3'>
                        <div class='col-12 text-center mb-3'>
                              <div class='bg-warning col-6 m-auto rounded py-2 d-flex justify-content-around'>
                                    <p>
                                          <span class='font-weight-bold'>Commande n° : </span>
                                          <span><?php echo $num_commande['Numero_Commande']; ?></span>
                                    </p>
                                    <p>
                                          <span class='font-weight-bold'>Total : </span>
                                          <span><?php echo $num_commande['Total_Commande']; ?></span>
                                    </p>
                              </div>
                        </div>
                        <?php

                        while ($data = mysqli_fetch_assoc($exec_requete_commande)) {

                              ?>

                              <div class='border-bottom border-dark p-3 d-flex'>
                                    <div class='col-2 align-center my-auto'>
                                          <p>
                                                <img src="<?php echo $data['Image']; ?>" width='100%' alt="">
                                          </p>
                                    </div>
                                    <div class='col-10'>
                                          <div class='d-flex justify-content-between border-bottom p-3'>
                                                <p class='col-4'>
                                                      <span class='font-weight-bold'><?php echo $data['Plat']; ?></span> - <span class='font-italic'>Plat chaud</span>
                                                </p>

                                                <p class='col-4 d-flex justify-content-start'>
                                                      <label class='align-self-center' for="">Quantité : </label>
                                                      <input class='ml-3 w-50 form-control text-center' type="number" step='1' value='<?php echo $data['Quantite']; ?>' readonly onfocus="this.removeAttribute('readonly');">
                                                </p>


                                          </div>
                                          <div class='d-flex justify-content-start border-bottom p-3'>
                                                <p class='col-4'>
                                                      <label for="">Prix : </label>
                                                      <span class='font-weight-bold text-info'><?php echo $data['Prix_Unitaire']; ?></span>
                                                </p>
                                                <p class='col-4'>
                                                      <label for="">Prix : </label>
                                                      <span class='font-weight-bold text-info'><?php echo $data['Total_Quantite_Plat']; ?></span>
                                                </p>
                                          </div>

                                    </div>
                              </div>
                  </div>

            <?php
            }
            ?>
            </section>
