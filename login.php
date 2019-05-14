<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<style>

</style>

<body>

    <div class="col-md-4 col-md-offset-4 form-login">
        <div class="outter-form-login">
            <div class="logo-login">
                <em class="glyphicon glyphicon-user"></em>
            </div>

            <form action="check-login.php" class="inner-login" method="post">
                <h3 class="text-center title-login">Login Form</h3>
                <?php
    /* handle success */
            if (isset($_GET['success'])) : ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Success!</strong> <?= base64_decode($_GET['success']); ?>
            </div>
            <?php endif; ?>
            <!-- Hancle error -->
            <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Warning!</strong> <?= base64_decode($_GET['error']); ?>
            </div>
            <?php endif; ?>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <label class="label control-label">User Name</label>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>

                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <label class="label control-label">Password</label>
                    <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
                    <a class="show-hide" id="icon-click">
                        <i class="fa fa-eye" id="icon"></i>
                    </a>
                </div>

                <input type="submit" class="btn btn-info" value="LOGIN" />

                <div class="text-center Daftar">
                    <a href="register.php">Daftar Akun</a>
                </div>

                <div class="text-center forget">
                    <a href="#">Forgot Password ?</a>
                </div>

                <div class="text-center">
                    <p class="text-danger">&copy; Sri Adi Cahyono</p>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/all.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#icon-click").click(function() {
                $('#icon').toggleClass('fa-eye-slash');
                $('#icon').toggleClass('fa-eye');

                var input = $('#pwd');

                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
    </script>
</body>

</html> 