 <?php
    ob_start();
    require_once('modele/vente.class.php');
    require_once("modele/production.class.php");
     require_once("modele/stock.class.php");
    require_once 'view/dashboard_RaportGraph.php';
   // require_once('view/stock/synthese_dash.php');


    //print_r(preg_split("#[_]+#", $res_etatVente));

    //echo $depense_mensuel_graph;
    /*$data_vente =array();
    $query_local = $vente->rapport_vente();
 
    foreach ($query_local as $value) 
    {
        $data_vente = array(['label'  =>'categorie','value'=>$value->nom_categorie],['label'  => 'quantite recue','value'=>$value->nb],['label' => 'quantite vendue','value' => $value->quantite_vendue],['label' => 'quantite retour','value' => $value->quantite_retour],['label' => 'manquant','value' => $value->manquant],['label' => 'montant','value' => $value->montant]);
    }
    $data_vente = json_encode($data_vente);
            
    $vente = new Vente();
    $production = new Production();

    // DONNEE PRODUCTION 
    $data_production = array();
    $query_local = $production->rapport_production();
    foreach ($query_local as $value) 
    {
        $data_production[] = array(
        'label'  =>$value->nom_categorie,
        'value'  => $value->nb

        
        );
    }
    $data_production = json_encode($data_production);*/
?>


<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar" style="height: 40px;" style="background-color: #87e7e1">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark" style="background-color: #87e7e1">
        <!-- ============================================================== -->
        <!-- Logo -->
        <!-- ============================================================== -->
        <div class="navbar-header" >
          <!--img src="assets/images/alain.jpg" alt="homepage"  style="width: 100px;" /-->
            <!--<a class="navbar-brand" href="#">
                <!- Logo icon -<b>
                    <!-You can put here icon as well // <i class="wi wi-sunset"></i> //-
                    <!- Dark Logo icon- 
                    <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                    <!- Light Logo icon-
                    <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                </b>
                <!-End Logo icon -
                <!- Logo text -<span class="hidden-sm-down">
                 <!- dark Logo text -
                 <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                 <!- Light Logo text -    
                 <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>-->
        </div>
        
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="text-center"><h3  class="text-white" style="font-weight: bold;"> NOVELLA ICE CREAM</h3></div>
        <div class="navbar-collapse" style="margin-top: -13px;" >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav mr-auto">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler d-none waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
              
            </ul>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
            <ul class="navbar-nav my-lg-0">
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <!--li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i-->

                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-success btn-circle"><i class="fa fa-link"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Luanch Admin</h5> <span class="mail-desc">Just see the my new admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-success btn-circle"><i class="ti-calendar"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Event today</h5> <span class="mail-desc">Just a reminder that you have event</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-info btn-circle"><i class="ti-settings"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Settings</h5> <span class="mail-desc">You can customize this template as you want</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <!--a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="icon-note"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a-->
                    <div class="dropdown-menu mailbox dropdown-menu-right animated bounceInDown" aria-labelledby="2">
                        <ul>
                            <li>
                                <div class="drop-title">You have 4 new messages</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:30 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="assets/images/users/3.jpg" alt="user" class="img-circle"> <span class="profile-status away pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Arijit Sinh</h5> <span class="mail-desc">I am a singer!</span> <span class="time">9:08 AM</span> </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)">
                                        <div class="user-img"> <img src="assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link" href="javascript:void(0);"> <strong>See all e-Mails</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- User Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown u-pro">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <!--php
                            foreach ($utilisateur->image_user($_SESSION['ID_utilisateur']) as  $value) 
                            {?>
                                <img src="<=WEBROOT?>photo_profil/<php echo $value->photo?>" alt="user" class="" heigth="50" width="50" />
                            <php
                            }
                            -->
                        <span class="hidden-md-down text-white"><?= $_SESSION['nom_utilisateur']?> &nbsp;
                        <i class="fa fa-angle-down"></i></span> </a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <!-- text-->
                        <a href="<?=WEBROOT;?>monprofil-<?=$_SESSION['ID_utilisateur'];?>" class="dropdown-item"><i class="ti-user"></i> Mon Profile</a>
                        <div class="dropdown-divider"></div>
                        <!-- text-->
                        <a href="<?=WEBROOT;?>deconnexion" class="dropdown-item"><i class="fa fa-power-off"></i> Deconnexion</a>
                        <!-- text-->
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End User Profile -->
                <!-- ============================================================== -->
                <li class="nav-item right-side-toggle"> 
                    <a class="nav-link  waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href=""><i class="ti-settings"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" class="text-dark">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" class="text-dark">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav" class="text-dark">
            <ul id="sidebarnav" class="text-dark">
                <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                        <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <li class="nav-small-cap">--- PERSONAL</li> 
                <?php
                if ($utilisateur->verifierPermissionDunePage('dashboard',$_SESSION['ID_utilisateur'])->fetch()) 
                {?>
                <li> <a href="<?= WEBROOT;?>dashboard">Tableau de bord</a></li>
                <?php
                }
                if ($utilisateur->verifierPermissionDunePage('achat',$_SESSION['ID_utilisateur'])->fetch()) 
                { ?>
                    <li><a href="<?= WEBROOT;?>achat">Achat</a></li>
                    <?php
                }
                if ($utilisateur->verifierPermissionDunePage('production',$_SESSION['ID_utilisateur'])->fetch()) 
                { ?>

                  <li><a href="<?= WEBROOT;?>production">Production</a></li>
                  <?php
                }
                if ($utilisateur->verifierPermissionDunePage('vente',$_SESSION['ID_utilisateur'])->fetch()) 
                { ?>
                  <li><a href="<?= WEBROOT;?>vente">Vente</a></li>
                  <?php
                }
                if ($utilisateur->verifierPermissionDunePage('rapport',$_SESSION['ID_utilisateur'])->fetch()) 
                { ?>
                  <!--li><a href="<?= WEBROOT;?>rapport">Rapport</a></li-->
                  <?php
                }
                if ($utilisateur->verifierPermissionDunePage('vendeur',$_SESSION['ID_utilisateur'])->fetch()) 
                { ?>
                  <li><a href="<?=WEBROOT;?>vendeur">Vendeur</a></li>
                  <?php
                }
               
                ?>
                <li> <?php
                if ($utilisateur->verifierPermissionDunePage('dashstock',$_SESSION['ID_utilisateur'])->fetch()) 
                    {
                        ?>
                     <a href="<?= WEBROOT;?>dashstock">Inventaire</a>
                     <?php
                  }
                 ?>
                        <ul aria-expanded="false" class="collapse">
                         <?php
                         if ($utilisateur->verifierPermissionDunePage('article',$_SESSION['ID_utilisateur'])->fetch())
                         {
                            ?>
                         
                            <li><a href="<?=WEBROOT;?>article">Les entrées </a></li>
                            <?php
                        }
                        if ($utilisateur->verifierPermissionDunePage('stock',$_SESSION['ID_utilisateur'])->fetch())
                        {
                        ?>

                            <li><a href="<?= WEBROOT;?>stock">Stock</a></li>
                            <?php
                        }
                        ?>
                        </ul>
                 </li>
                        <?php
                if ($utilisateur->verifierPermissionDunePage('utilisateur',$_SESSION['ID_utilisateur'])->fetch()) 
                { ?>
                  <li><a href="<?= WEBROOT;?>utilisateur">Utilisateur</a></li> 
                  <?php
                }
                ?>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        
        <?php
        if (isset($home_content)) 
        {
            echo $home_content;
        }
        else
        {   

        }
        ?> 
        
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->

<?php
 $vue_home_content = ob_get_clean();
 require_once('view/tamplete.php');
?>