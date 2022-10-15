<?php
                      $i =0;
                      foreach ($stock->filtre_controlPasse($condition) as $value)  
                      { 
                        $i++;
                    ?> <tr>
                                            <td><?= $value->LIBELLE?></td>
                                            <td><?= $value->ARTICLE?></td>
                                            <td><?= $value->quantite_initiale?></td>
                                            <td>
                                              <?= $value->quantite_rencontre?>        
                                              </td>
                                            <td><?= $value->quantite_vendue?> </td>
                                            
                                            <td><?= $value->date_control?></td>

                                       
                                        </tr>
                                      <?php
                                    }
                                    ?> 