<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/Basic.css">
    <link rel="stylesheet" href="css/FOManager.FOManager.css">
    <link rel="stylesheet" href="css/OutSystemsReactWidgets.css">
    <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.css">
    <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.extra.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Estilos responsivos */
        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 20px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: box-shadow 0.3s ease-in-out;
        }

        .login-form:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .login-logo img {
            max-width: 100%;
            height: auto;
        }

        .login-inputs {
            display: flex;
            flex-direction: column;
        }

        .login-inputs .form-group {
            margin-bottom: 15px;
        }

        .columns2 {
            display: flex;
            flex-direction: column;
        }

        .columns-item {
            margin-bottom: 10px;
        }

        .login-button {
            display: flex;
            justify-content: center;
        }

        /* Responsividade para telas maiores */
        @media (min-width: 768px) {
            .columns2 {
                flex-direction: row;
                justify-content: space-between;
            }

            .columns-item {
                margin-bottom: 0;
            }
        }

        /* Ajuste para telas muito pequenas */
        @media (max-width: 480px) {
            .login-form {
                padding: 15px;
                width: 90%; /* Ajuste para garantir que o formulário ocupe menos espaço */
                max-width: none; /* Remove o limite de 400px */
            }

            .login-logo img {
                height: 80px; /* Reduz o tamanho do logo */
            }
        }

        /* Ajuste para iPhones e dispositivos com tela pequena */
        @media (max-width: 390px) {
            .login-form {
                width: 90%; /* O formulário vai ocupar 90% da tela */
                padding: 10px;
            }

            .login-logo img {
                height: 70px; /* Tamanho do logo reduzido para telas pequenas */
            }
        }
    </style>
</head>
<?php require "db/conexao.php" ?>
<body class="windows desktop is-ltr" style="--header-size-content: 40px; --footer-height: 56px;">
    <div id="reactContainer">
        <div id="transitionContainer">
            <div class="active-screen screen-container fade-enter-done">
                <div data-block="Common.LayoutBlank" class="OSBlockWidget" id="$b1">
                    <div data-container="" class="layout layout-native blank">
                        <div data-container="" class="content">
                            <div class="main-content" id="b1-Content">
                                <div data-container="" class="login-screen">
                                    <form data-form="" method="post" action="auth/processa_Login.php" novalidate="" class="login-form" id="LoginForm">
                                        <div data-container="" class="login-logo text-center">
                                            <div data-container="" class="text-center">
                                                <img data-image="" class="border-radius-soft shadow-s" src="img/FOManager.Logo.png" alt="" style="height: 100px;">
                                            </div>
                                            <h1 data-advancedhtml="" class="margin-top-base">
                                                <span data-expression="" class="heading5 text-neutral-8">FOManager</span>
                                            </h1>
                                        </div>
                                        <div data-container="" class="login-inputs margin-top-m">
                                            <div data-container="" class="form-group">
                                                <label for="Input_UsernameVal">Username</label>
                                                <input type="text" class="form-control" id="Input_UsernameVal" name="username" required maxlength="250">
                                            </div>
                                            <div data-container="" class="form-group margin-top-base">
                                                <label for="Input_PasswordVal">Password</label>
                                                <input type="password" class="form-control" id="Input_PasswordVal" name="password" required>
                                            </div>
                                            <div data-container="" class="form-group margin-top-l">
                                                <div class="columns2">
                                                    <div class="columns-item">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="Checkbox1">
                                                            <label class="form-check-label" for="Checkbox1">Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="columns-item text-right">
                                                        <a href="" aria-label="Forgot password? Click here to recover it">Forgot password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div data-container="" class="login-button margin-top-l">
                                                <button type="submit" name="butao" class="btn btn-primary btn-block">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-container="" class="offline-data-sync">
                    <div data-block="Common.OfflineDataSyncEvents" class="OSBlockWidget" id="b1-$b1">
                        <div data-block="Private.OfflineDataSyncCore" class="OSBlockWidget" id="b1-b1-$b1">
                            <div data-block="Private.NetworkStatusChanged" class="OSBlockWidget" id="b1-b1-b1-$b1">
                                <div data-container=""></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
