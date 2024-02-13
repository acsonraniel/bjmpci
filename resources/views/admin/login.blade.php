<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/ci_icon.png') }}">
    <title>BJMPCI - Login</title>

    <!-- Custom fonts for this template-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    
<style>
   html, body{
        font-family: "Poppins", sans-serif !important;
    }

    .logo{
        font-size: 50px;
    }

    .logo :nth-child(1){
        color: #FFFFFF !important;
    }

    .logo :nth-child(2){
        font-weight: 700;
        color: #BEBEBE !important;
    }

    .form-group input{
        font-size: 15px !important;
    }

</style>

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/sbadmin2/css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6 col-md-8">

                <!-- BJMPCI Logo -->
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-2 p-0">
                            <img src="{{ asset('assets/img/ci_logo.png') }}" class="w-100" alt="bjmpci logo">
                        </div>
                        <div class="logo row col-9 m-0 p-0 m-auto align-middle">
                            <p>CRIME</p><span>INDEX</span>
                        </div>
                    </div>

                </div>


                <div class="card border-0 shadow-lg my-4">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form class="user" action="index.php?action=authenticate" method="POST">
                                        <div class="form-group">
                                            <input 
                                                type="username" 
                                                class="form-control form-control-user"
                                                id="" 
                                                placeholder="Username" 
                                                name="username">
                                        </div>
                                        <div class="form-group">
                                            <input 
                                                type="password" 
                                                class="form-control form-control-user"
                                                id="" 
                                                placeholder="Password" 
                                                name="password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input 
                                                    type="checkbox" 
                                                    class="custom-control-input" 
                                                    id="check">
                                                <label class="custom-control-label" for="customCheck">
                                                    RememberMe
                                                </label>
                                            </div>
                                        </div>
                                        <button class="btn btn-dark btn-user btn-block" type="submit">
                                        Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/sbadmin2/js/sb-admin-2.min.js') }}"></script>

</body>

</html>