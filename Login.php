<!DOCTYPE html>
<html lang="pt">

<head>
    <!-- summernote -->
  <link rel="stylesheet" href="css/Basic.css">
  <link rel="stylesheet" href="css/FOManager.FOManager.css">
  <link rel="stylesheet" href="css/OutSystemsReactWidgets.css">
  <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.css">
  <link rel="stylesheet" href="css/OutSystemsUI.OutSystemsUI.extra.css">
</head>
<?php require "conexao.php" ?>
<body class="windows desktop is-ltr" style="--header-size-content: 40px; --footer-height: 56px;">
  <div id="reactContainer">
    <div id="transitionContainer">
      <div class="active-screen screen-container fade-enter-done">
        <div data-block="Common.LayoutBlank" class="OSBlockWidget" id="$b1">
          <div data-container="" class="layout layout-native blank">
            <div data-container="" class="content">
              <div class="main-content" id="b1-Content">
                <div data-container=""   class="login-screen">

                  

                          
                  <form data-form="" method="post" action="processaLogin.php" novalidate="" class="login-form" id="LoginForm">
                    <div data-container="" class="login-logo" style="text-align: center;">
                      <div data-container="" style="text-align: center;">
                        <img data-image="" class="border-radius-soft shadow-s" src="img/FOManager.Logo.png" alt="" style="height: 100px;">
                      </div>
                      <h1 data-advancedhtml="" class="margin-top-base">
                        <span data-expression="" class="heading5 text-neutral-8">FOManager</span>
                      </h1>
                    </div>
                    <div data-container="" class="login-inputs margin-top-m">
                      <div data-container="">
                        <div data-block="Interaction.AnimatedLabel" class="OSBlockWidget" id="$b2">
                          <div data-container="" class="animated-label active" name="0.a6noryoormv" id="b2-AnimatedLabel">
                            <div class="animated-label-text" id="b2-Label">
                              <label data-label="" class="mandatory OSFillParent" for="Input_UsernameVal">Username</label>
                            </div>
                            <div class="animated-label-input" id="b2-Input">
                              <span class="input-text">
                                <input data-input="" class="form-control OSFillParent" required="" type="text" name="username" aria-required="true" maxlength="250" value="" id="Input_UsernameVal" placeholder="" wfd-id="id0">
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-container="" class="margin-top-base">
                        <div data-block="Interaction.AnimatedLabel" class="OSBlockWidget" id="$b3">
                          <div data-container="" class="animated-label" name="0.mnfsnr64vfb" id="b3-AnimatedLabel">
                            <div class="animated-label-text" id="b3-Label">
                              <label data-label="" class="mandatory OSFillParent" for="Input_PasswordVal">Password</label>
                            </div>
                            <br>
                            <div class="animated-label-input" id="b3-Input">
                              <span class="input-password">
                                <input data-input="" class="form-control login-password OSFillParent" required="" name="password" type="password" aria-required="true" value="" id="Input_PasswordVal" placeholder="" wfd-id="id1">
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-container="" class="margin-top-l">
                        <div data-block="Adaptive.Columns2" class="OSBlockWidget" id="$b4">
                          <div data-container="" class="columns columns2 gutter-base tablet-break-none phone-break-none align-items-center">
                            <div class="columns-item" id="b4-Column1">
                              <div data-block="Utilities.AlignCenter" class="OSBlockWidget" id="$b5">
                                <div class="vertical-align flex-direction-row" id="b5-Content">
                                  <span>
                                    <input data-checkbox="" class="checkbox" type="checkbox" aria-label="Remember me the password" id="Checkbox1" wfd-id="id2">
                                  </span>
                                  <label data-label="" class="font-size-s margin-left-s OSFillParent" for="Checkbox1">Remember me</label>
                                </div>
                              </div>
                            </div>
                            <div class="columns-item" id="b4-Column2">
                              <div data-container="" style="text-align: right;">
                                <a data-link="" href="" aria-label="Forgot password? Click here to recover it">Forgot password?</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div data-container="" class="login-button margin-top-l">
                        <div data-block="Utilities.ButtonLoading" class="OSBlockWidget" id="$b6">
                          <div class="osui-btn-loading OSInline full-width osui-btn-loading-show-spinner" name="0.nr6eot7508" id="b6-Button" aria-live="polite" atomic="true">
                            <button data-button="" name="butao" class="btn btn-primary OSFillParent" type="submit">
                              <div data-container="" class="osui-btn-loading__spinner-animation" aria-hidden="true"></div>Login</button>
                          </div>
                        </div>
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
</body>

</html>
