<?php
  session_start();

  require_once('controller/cliente.controller.php');
  $clienteController = new ClienteController;
  $cliente = $clienteController->ObtenerClienteById($_SESSION['clienteId']); 

?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" integrity="sha384-z4tVnCr80ZcL0iufVdGQSUzNvJsKjEtqYZjiQrrYKlpGow+btDHDfQWkFjoaz/Zr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles/navbarBetaStyle.css">
    <link rel="stylesheet" type="text/css" href="styles/sliderStyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rom Market</title>
    <link rel="stylesheet" type="text/css" href="normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Ubuntu:500">
    <link rel="stylesheet" type="text/css" href="styles/inicioStyle.css">
    <link rel="stylesheet" href="styles/profileBetaStyle.css" rel="stylesheet">
    
</head>

<?php include('view/navbarBeta.php');?>

<div class="container light-style flex-grow-1 container-p-y">

    <h2 class="font-weight-bold py-3 mb-4">
      Account settings
    </h2>

    <div class="card overflow-hidden" style="margin-bottom:40px">
      <div class="row no-gutters row-bordered row-border-light">
        <div class="col-md-3 pt-0">
          <div class="list-group list-group-flush account-settings-links">
            <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Cambiar Contraseña</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Saldo</a>
            <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Transacciones</a>

          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="account-general">

              
                <form class="row" style="margin: auto; margin-bottom: 20px; margin-top: 20px;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-email">Usuario</label>
                            <input class="form-control" type="email" id="account-email" value="<?php echo $cliente['usuario'];?>" disabled="">
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-fn">Nombre</label>
                            <input class="form-control" type="text" id="account-fn" value="<?php echo $cliente['nombre'];?>" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-ln">Apellido</label>
                            <input class="form-control" type="text" id="account-ln" value="<?php echo $cliente['apellido'];?>" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-email">Correo</label>
                            <input class="form-control" type="email" id="account-email" value="<?php echo $cliente['correo'];?>" disabled="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-phone">Direccion</label>
                            <input class="form-control" type="text" id="account-phone" value="<?php echo $cliente['direccion'];?>" required="">
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox d-block"></div>
                            <button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Actualizar Perfil</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="tab-pane fade" id="account-change-password">
        

            <form class="row" style="margin: auto; margin-bottom: 20px; margin-top: 20px;" >

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-fn">Contraseña Actual</label>
                        <input class="form-control" type="password" id="account-pass-current" >
                    </div>
                </div>
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-pass">Nueva Contrasña</label>
                        <input class="form-control" type="password" id="account-pass">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="account-confirm-pass">Confirmar Contraseña</label>
                        <input class="form-control" type="password" id="account-confirm-pass">
                    </div>
                </div>
                <div class="col-12">
                    <hr class="mt-2 mb-3">
                    <div class="d-flex flex-wrap justify-content-between align-items-center">
                        <div class="custom-control custom-checkbox d-block">
                        </div>
                        <button class="btn btn-style-1 btn-primary" type="button" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Actualizar Contraseña</button>
                    </div>
                </div>
            </form>
            </div>
            <div class="tab-pane fade" id="account-info">
              <div class="card-body pb-2">

              <form class="row" action="aumentarSaldo.php" method="post" style="margin: auto; margin-bottom: 20px; margin-top: 20px;">
  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-email">Saldo</label>
                            <input class="form-control" type="email" id="account-email" value="<?php echo $cliente['saldo'];?>" disabled="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-phone">Extra</label>
                            <input class="form-control" name="saldoExtra" type="text" id="account-phone" value="0.0" required>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <div class="custom-control custom-checkbox d-block"></div>
                            <button class="btn btn-style-1 btn-primary" type="submit" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Aumentar Saldo</button>
                        </div>
                    </div>
                </form>


              </div>
      
            </div>
            <div class="tab-pane fade" id="account-social-links">
              <div class="card-body pb-2">

                <div class="form-group">
                  <label class="form-label">Twitter</label>
                  <input type="text" class="form-control" value="https://twitter.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Facebook</label>
                  <input type="text" class="form-control" value="https://www.facebook.com/user">
                </div>
                <div class="form-group">
                  <label class="form-label">Google+</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">LinkedIn</label>
                  <input type="text" class="form-control" value="">
                </div>
                <div class="form-group">
                  <label class="form-label">Instagram</label>
                  <input type="text" class="form-control" value="https://www.instagram.com/user">
                </div>

              </div>
            </div>
            <div class="tab-pane fade" id="account-connections">
              <div class="card-body">
                <button type="button" class="btn btn-twitter">Connect to <strong>Twitter</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <h5 class="mb-2">
                  <a href="javascript:void(0)" class="float-right text-muted text-tiny"><i class="ion ion-md-close"></i> Remove</a>
                  <i class="ion ion-logo-google text-google"></i>
                  You are connected to Google:
                </h5>
                nmaxwell@mail.com
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-facebook">Connect to <strong>Facebook</strong></button>
              </div>
              <hr class="border-light m-0">
              <div class="card-body">
                <button type="button" class="btn btn-instagram">Connect to <strong>Instagram</strong></button>
              </div>
            </div>
            <div class="tab-pane fade" id="account-notifications">
              <div class="card-body pb-2">

                <h6 class="mb-4">Activity</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone comments on my article</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone answers on my forum thread</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Email me when someone follows me</span>
                  </label>
                </div>
              </div>
              <hr class="border-light m-0">
              <div class="card-body pb-2">

                <h6 class="mb-4">Application</h6>

                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">News and announcements</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly product updates</span>
                  </label>
                </div>
                <div class="form-group">
                  <label class="switcher">
                    <input type="checkbox" class="switcher-input" checked="">
                    <span class="switcher-indicator">
                      <span class="switcher-yes"></span>
                      <span class="switcher-no"></span>
                    </span>
                    <span class="switcher-label">Weekly blog digest</span>
                  </label>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php include('view/footer.html')?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  