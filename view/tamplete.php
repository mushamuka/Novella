<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>novella</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <link href="assets/node_modules/calendar/dist/fullcalendar.css" rel="stylesheet"/>

    <!--alerts CSS -->
    <link href="assets/node_modules/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="dist/css/styles.css">
</head>

<body class="horizontal-nav boxed skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">NOVELLA</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <input type="text" id="action" value="<?=$_SESSION['action']?>" hidden>
    <?php
    if (isset($vue_home_content)) 
    {
        echo  $vue_home_content;
    }
    else
    {

    }
    ?>
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            &copy; 2020 Novella cream
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    <script type="text/javascript">
        var p = 0;
        function addPhoneNumber()
        {
            p++;// nombre de champs de telephone
            if (p < 4) 
            {
                document.getElementById("divAddPhone").innerHTML += '<div class="form-group row" id="element'+p+'"><label for="exampleInputuname3" class="col-sm-3 control-label"></label><div class="col-sm-6"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="mdi mdi-phone-classic"></i></span></div><input type="text" data-mask="+257 99 99 99 99" class="form-control" id="phone'+p+'"></div></div><div class="col-sm-3"><button type="button" class="btn btn-info " onclick="removePhoneNumber()"><i class="mdi mdi-phone-classic"></i><i class="ti-minus text"></i></button></div></div>';
                document.getElementById('nbphone').value = p;
            }
            else p--;
        }
        function removePhoneNumber()
        {
            var number = $('#nbphone').val();
            var divAddPhone = document.getElementById('divAddPhone');
            divAddPhone.removeChild(divAddPhone.childNodes[number-1]);
            number--;
            p--;
            document.getElementById('nbphone').value = number;
        }
        var m = 0;// nombre de champs mail
        function addMailAdress()
        {
            m++;
            if (m < 4) 
            {
                document.getElementById("divAddMail").innerHTML += '<div class="form-group row" id="elementEmail'+m+'"><div class="col-sm-9"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="ti-email"></i></span></div><input type="mail" class="form-control" id="email'+m+'" placeholder="@ email"></div></div><div class="col-sm-3"><button type="button" class="btn btn-info " onclick="removeEmail()"><i class="ti-email"></i><i class="ti-minus text"></i></button></div></div>';
                document.getElementById('nbemail').value = m;
            }
            else m--;
        }
        function removeEmail()
        {
            var number = $('#nbemail').val();
            var divAddMail = document.getElementById('divAddMail');
            divAddMail.removeChild(divAddMail.childNodes[number-1]);
            number--;
            m--;
            document.getElementById('nbemail').value = number;
        }
        var n = 0;
        function ajoutService()
        {
            n++;
            //Conteneur.removeChild(Conteneur.childNodes[i]);
            var element =  '<div id="element'+n+'"><div class="row"><div class="col-lg-6 col-md-6"><div class="row"><label for="exampleInputuname3" class="col-sm-3 control-label">Service</label><div class="form-group col-sm-9"><select id="service'+n+'" class="form-control" onclick="recupererServices(this);"><option value=""></option><option></option></select></div></div></div><div class="col-lg-6 col-md-6"><div class="row"><label for="exampleInputuname3" class="col-sm-3 control-label">Bande passante</label><div class="form-group col-sm-9"><input type="text" id="bandepassante'+n+'" class="form-control"></div></div></div></div><!-- End row --><div class="row"><div class="col-lg-6 col-md-6"><div class="row"><label for="exampleInputuname3" class="col-sm-3 control-label">Rediction</label><div class="form-group col-sm-9"><input type="text" class="form-control" id="rediction'+n+'" data-mask="99"><span class="font-13 text-muted">e.g "99%"</span></div></div></div><div class="col-lg-6 col-md-6"><div class="row"><label for="exampleInputuname3" class="col-sm-3 control-label">Quantite</label><div class="form-group col-sm-9"><input type="text" class="form-control" id="quantite'+n+'"></div></div></div></div><!-- End row --> <div class="row"><div class="col-lg-6 col-md-6"><div class="row"><label for="exampleInputEmail3" class="col-sm-3 control-label">Nom client</label><div class="form-group col-sm-9"><input type="text" class="form-control" id="nom_client'+n+'"></div></div></div><div class="col-lg-6 col-md-6"><div class="row"><label for="exampleInputEmail3" class="col-sm-3 control-label">Adresse</label><div class="form-group col-sm-9"><input type="text" class="form-control" id="adresse'+n+'"></div></div></div></div><hr></div>';
            document.getElementById("divService").innerHTML += element;
            document.getElementById('number').value = n;
        }
        function supService(number)
        {
            var divService = document.getElementById('divService');
            divService.removeChild(divService.childNodes[number-1]);
            n--;
            document.getElementById('number').value = n;
        }

        var data_production = <?php echo $data_production; ?>;

        var etat_vente = [<?=$raport_etat_vante?>];
        var vente_vendeur_mensuelle = [<?=$vente_vendeur_mensuelle?>];
        var retour_mensuelle =[<?= $retour_mensuelle?>];

        var url = document.getElementById('action'); 
        var action = url.value;
        var salaire_vendeur_mensuelle = [<?=$salaire_vendeur_mensuelle?>];

    </script>


   

    <!-- Sweet Alert-->
    <script src="assets/node_modules/sweetalert/sweetalert.min.js"></script>

    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.js"></script>

    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>


    <!-- This is data table -->
    <script src="assets/node_modules/datatables/jquery.dataTables.min.js"></script>
    <!-- Popup message jquery -->
    <!--<script src="assets/node_modules/toast-master/js/jquery.toast.js"></script>-->
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <script src="dist/js/pages/mask.js"></script>
    <!-- Calendar JavaScript -->
    <script src="assets/node_modules/calendar/jquery-ui.min.js"></script>
    <script src="assets/node_modules/moment/moment.js"></script>
    <script src='assets/node_modules/calendar/dist/fullcalendar.min.js'></script>
    <script src="assets/node_modules/calendar/dist/cal-init.js"></script>

     <script src="assets/javascript/achat/achat.js"></script>
    <script src="assets/javascript/production/production.js"></script>
    <script src="assets/javascript/vente/vente.js"></script>
    <script src="assets/javascript/vendeur/vendeur.js"></script>
    <script src="assets/javascript/utilisateur/utilisateur.js"></script>
    <script src="assets/javascript/dashboard/dashboard.js"></script>
    <script src="assets/javascript/stock/stock.js"></script>


    <!--inclusion des fichier javascript-->
    
    <script src="javascript/achat/achat.js"></script>
    <script src="javascript/production/production.js"></script>
     <script src="javascript/vente/vente.js"></script>
      <script src="javascript/vendeur/vendeur.js"></script>
        <script src="javascript/utilisateur/utilisateur.js"></script>
        <script src="javascript/stock/stock.js"></script>


    <!--<script src="javascript/equipement/equipement.js"></script>
    <script src="javascript/typeclient/typeclient.js"></script>
    <script src="javascript/service/service.js"></script>
    <script src="javascript/contract/contract.javascript.js"></script>
    <script src="javascript/tickets/ticket.javascript.js"></script>
    <script src="javascript/parametre/parametre.js"></script>
    <script src="javascript/vehicule/vehicule.js"></script>
    <script src="javascript/article/article.js"></script>
    <script src="javascript/utilisateur/utilisateur.js"></script>
    <script src="javascript/fiches/fiches.js"></script>
    <script src="javascript/localisation/localisation.js"></script>
    <script src="javascript/autocomplate/autocomplete.js"></script>
    <script src="javascript/facture/facture.js"></script>
    <script src="javascript/marketing/marketing.javascript.js"></script>
    <script src="javascript/comptabilite/comptabilite.javascript.js"></script>-->
    
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
        if (action == 'dashstock') 
        {
            var scriptElement = document.createElement('script');
            scriptElement.src = 'javascript/stock/dashstock.js';
            document.body.appendChild(scriptElement);
        }
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv'
        ]
    });
    /*
    * DASHBOARD GRAPH
    */
    /*var action = $('#action').val();
    if (action == 'dashboard') 
    {
        $(document).ready(function(){
            // Nombre de client par type
            var donut_chart = Morris.Donut({
            element: 'morris-donut-chart',
            data: <php echo $data; ?>,
            resize: true,
            colors:['#009efb', '#55ce63', '#2f3d4a']
            });
            // Nombre de client par localisation
            Morris.Donut({
            element: 'morris-donut-chart-localisation',
            data: <php echo $data_local; ?>,
            resize: true,
            colors:['#009efb', '#55ce63', '#2f3d4a']
            });

                   //les types des clients payants la facture

            /*Morris.Donut({
            element: 'morris-donut-chart-localisation',
            data: <php echo $data_local; ?>,
            resize: true,
            colors:['#009efb', '#55ce63', '#2f3d4a']
            });*
        })
            
        /*var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = "javascript/dashboard/adminDashboard.js";
        document.getElementsByTagName('body')[0].appendChild(script);*
    }*/

    $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>

</html>