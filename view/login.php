<?php
ob_start();
?>

<section id="wrapper">
    <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material" id="loginform" action="<?= WEBROOT?>login" method="post">
                    <h3 class="box-title m-b-20">Connexion</h3>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" name="login" placeholder="Login"> </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" required="" name="password" placeholder="Mot de passe"> </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember me</label>
                                <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Mot de passe oublier?</a> 
                            </div> 
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <div class="col-xs-12 p-b-20">
                            <button class="btn btn-block btn-lg text-white btn-rounded" style="background-color: #87e7e1" type="submit">Se connecter</button>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recupere le mot de passe</h3>
                            <p class="text-muted">Entrer ton Email et instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
    $vue_home_content = ob_get_clean();
    require_once('view/tamplete.php');
?>