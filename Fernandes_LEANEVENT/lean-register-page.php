<?php
include '../backend/register.php';
header('Content-Type: text/html; charset=ISO-8859-1');
?>

<html>
<head>
    <title>LEANEVENTO Foundation</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="./css/leanevent.css">
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="index.js"></script>
</head>
<body id="wrapper">
<header>
    <div class="header-content">
        <button class="header-button fas fa-bars" onclick=homepage_mobile_menu(event)></button>
        <div class="logo">
            <img id="header-logo" src="./image/logo-blanco.png">
            <h3 id="header-logo-text">LEANVENTOS</h3>
        </div>
        <div class="menu">
            <nav class="nav-bar">
                <ul>
                    <li class="link"><a href="lean-home-page.php">Inicio</a></li>
                    <li class="link"><a href="lean-about-us-page.php">Quienes Somos</a></li>
                    <li class="link"><a href="#">Blog</a></li>
                    <li class="link active"><a
                                href="lean-register-page.php">Reg&#237strate</a></li>
                    <li class="link"><a href="lean-contact-us.php">Contacto</a></li>
                    <li class="link"><a href="lean-login-page.php">Inciar Sesi&#243n</a></li>
                    <li class="link"><a href="lean-buy-from-us.php">Comprar Boletos</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="mainpage lean-register-page">
    <div class="banner-image-wrapper">
        <div class="banner-image-overlay-text">
            <h2 id="banner-image">REG&#205STRATE</h2>
            <span class="mainpage-overlay-content">INCIO</span><span
                    class="mainpage-overlay-second-content">REG&#205STRATE</span>
        </div>
    </div>
    <div class="position-center">
        <div class="register-user-wrapper">
           <span class="php-success"> <?php
               if ($result) {
                   echo $result;
               }
               ?>
           </span>
            <h3 class="register-heading">Elija el tipo de usuario para registrarse</h3>
            <div class="user-buttons">
                <button type="submit" class="button-primary user-roles individual"
                        onclick=register_individual_modal(event)>Como Individual
                </button>
                <button type="submit" class="button-primary user-roles business"
                        onclick="register_business_modal(event)">Como Negacio O foundation
                </button>
                <button type="submit" class="button-primary user-roles agent"
                        onclick="register_agent_modal(event)">Como agente lean
                </button>
            </div>
        </div>
    </div>
</div>
<div class="social-media-content">
    <div class="label">
        <STRONG>LEAN EN LAS REDES SOCIALES</STRONG>
    </div>
    <div class="footer-elements">
        <span class="fab fa-twitter fa-1x"></span>
        <span class="fab fa-facebook-f fa-1x"></span>
        <span class="fab fa-instagram fa-1x"></span>
    </div>
</div>
<footer>
    <div class="copyright">
        <p>Copyright &#169 2019 All rights reserved | This web is made with &#9829 by <span
                    class="font-color">DiazApps</span></p>
        <div class="scroll-to-top" onclick=scroll_to_top()><span class="fas fa-arrow-up"></span></div>
    </div>
    </div>
</footer>
<div id="lean-register-page-recover-popup"
     class="<?php if ($individualModalClass) echo $individualModalClass; else echo "modal hidden"; ?>">
    <div class="pop-up">
        <h1 class="pop-up-header">Registro individual</h1>
        <div class="pop-up-body">
            <form id="register-individual-page-form" name="individual-form" method="POST"
                  onsubmit="register_individual_page(event,this)">

                <div class="row">
                    <div class="email-add column2x">
                        <label for="email" class="field-label">Correo <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span>
                            <span class="error-php">
                                <?php
                                echo $emailError;
                                ?></span>
                        </label>
                        <input id="email" type="text" name="email" placeholder="xxx@xxx.com" class="field"
                               value="<?php echo htmlspecialchars($email); ?>" required
                               pattern="^(.+)@([^\.].*)\.([a-z]{2,})$"/>

                    </div>
                    <div class="password column2x">
                        <label for="password">Contrasena <span
                                    class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $passwordError; ?></span></label>
                        <input id="password" type="password" name="password" placeholder="0 to 8 Non Space characters" class="field"
                               value="<?php echo htmlspecialchars($password); ?>" required pattern="^\S{0,8}$"/>
                    </div>
                </div>
                <div class="row">
                    <div class="user-name column2x">
                        <label for="name" class="field-label">Nombre* <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $nameError; ?></span></label>
                        <input id="name" type="text" name="username" placeholder="Nombre" class="field"
                               value="<?php echo htmlspecialchars($username); ?>" required/>

                    </div>
                    <div class="last-name column2x">
                        <label for="surname">Apellido <span
                                    class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $lastnameError; ?></span></label>
                        <input id="surname" type="text" name="surname" placeholder="Apellido" class="field"
                               value="<?php echo htmlspecialchars($surname); ?>" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="direction column2x">
                        <label for="direction" class="field-label">Direcc&#237on <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $directionError; ?></span></label>
                        <input id="direction" type="text" name="direction" placeholder="Direcc&#237on" class="field"
                               value="<?php echo htmlspecialchars($direction); ?>" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="city column2x">
                        <label for="ciu" class="field-label">Ciudad <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $ciuError; ?></label>
                        <input id="ciu" type="text" name="ciu" placeholder="Ciudad" class="field"
                               value="<?php echo htmlspecialchars($ciu); ?>" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="state three-fouth-width">
                        <label for="state" class="field-label">Estado<span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $stateError; ?></label>
                        <input list="state" name="state" placeholder="Escoger..." class="field state" required>
                        <datalist id="state3">
                            <option value="TEXAS">TEXAS</option>
                            <option value="CALIFORNIA">CALIFORNIA</option>
                            <option value="COLORADO">COLORADO</option>
                            <option value="NEW-ORLEANS">NEW-ORLEANS</option>
                        </datalist>
                    </div>
                    <div class="pin half-width">
                        <label for="pin">Codigal Postal <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php">
                                <?php
                                echo $pinError;
                                ?></span>
                        </label>
                        <input id="pin" type="text" name="pin" class="field" placeholder="American Zip Code"
                               value="<?php echo htmlspecialchars($pin); ?>" required pattern="^\d{5}(-\d{4})?$"/>
                    </div>
                </div>

                <div class="register-popup">
                    <button type="submit" name="register-individual" class="button-primary">Registrarse</button>
                </div>

                <span
                        class="error-php">
                                 <?php
                                 if (isset($error) && strrpos($error, 'Duplicate entry')) {
                                     echo "User with this email address has already been registered!!!";
                                 } ?>
                               </span>

            </form>
        </div>

        <div class="pop-up-actions">
            <button type="button" onclick="register_individual_cancel(event,this)" class="button-secondary">Cerrar
            </button>
        </div>
    </div>
</div>
<div id="lean-register-business-page-recover-popup"
     class="<?php if ($businessModalClass) echo $businessModalClass; else echo "modal hidden"; ?>">
    <div class="pop-up">
        <h1 class="pop-up-header">Registro Negocio o Fundacion</h1>
        <div class="pop-up-body">
            <form id="register-business-page-form" method="POST" onsubmit="register_business_page(event,this)">
                <div class="row">
                    <div class="business-email-add half-width">
                        <label for="business-email" class="field-label">Correo <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php">
                                <?php
                                echo $emailError;
                                ?></span> </label><br>
                        <input id="business-email" type="text" placeholder="xxx@xxx.com" name="email"  class="field"
                               value="<?php echo htmlspecialchars($email); ?>" required
                               pattern="^(.+)@([^\.].*)\.([a-z]{2,})$"/>
                    </div>
                    <div class="business-password half-width">
                        <label for="business-password">Contrasena <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $passwordError; ?></span></label><br>
                        <input id="business-password" type="password" name="password" placeholder="0 to 8 Non Space characters"
                               class="field" value="<?php echo htmlspecialchars($password); ?> " required pattern="^\S{0,8}$"/>
                    </div>
                </div>
                <div class="row">
                    <div class="business-user-name half-width">
                        <label for="business-name" class="field-label">Nombre <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $nameError; ?></span></label><br>
                        <input id="business-name" type="text" placeholder="Nombre" name="username" class="field"
                               value="<?php echo htmlspecialchars($username); ?>" required/>
                    </div>
                    <div class="business-last-name half-width">
                        <label for="business-surname">Apellido <span
                                    class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $lastnameError; ?></span></label><br>
                        <input id="business-surname" type="text" name="surname" placeholder="Apellido" class="field"
                               value="<?php echo htmlspecialchars($surname); ?>" required/>
                    </div>
                </div>
                <div class="row">
                    <div class="business-direction full-width">
                        <label for="business-direction" class="field-label">Direcc&#237on <span
                                    class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $directionError; ?></span></label><br>
                        <input id="business-direction" type="text" name="direction" placeholder="Direcc&#237on"
                               class="field" value="<?php echo htmlspecialchars($direction); ?>" required/>
                    </div>
                </div>

                <div class="business-foundation full-width">
                    <label for="business-foundation" class="field-label">Foundation <span
                                class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php"> <?php echo $directionError; ?></span></label><br>
                    <input id="business-foundation" type="text" name="foundation" placeholder="Foundation"
                           class="field" value="<?php echo htmlspecialchars($direction); ?>" required/>
                </div>

                <div class="row">
                    <div class="business-city full-width">
                        <label for="business-ciu" class="field-label">Ciudad <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $ciuError; ?></span></label><br>
                        <input id="business-ciu" type="text" name="ciu" placeholder="Ciudad" class="field"
                               value="<?php echo htmlspecialchars($ciu); ?>" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="business-state three-fouth-width">
                        <label for="state" class="field-label">Estado<span
                                    class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $stateError; ?></label>
                        <input list="state" name="state" placeholder="Escoger..." class="field state"
                               value="<?php echo htmlspecialchars($state); ?>" required>
                        <datalist id="state1">
                            <option value="TEXAS">TEXAS</option>
                            <option value="CALIFORNIA">CALIFORNIA</option>
                            <option value="COLORADO">COLORADO</option>
                            <option value="NEW-ORLEANS">NEW-ORLEANS</option>
                        </datalist>
                    </div>
                    <div class="business-pin half-width">
                        <label for="pin">Codigal Postal <span class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"><?php echo $pinError; ?></span>
                        </label>
                        <input id="pin" type="text" name="pin" class="field" placeholder="America Zip Code"
                               value="<?php echo htmlspecialchars($pin); ?>" required pattern="^\d{5}(-\d{4})?$"/>
                    </div>
                </div>


                <div class="row">
                    <div class="business-type">
                        <label>Seleccione el tipo de negocio<span
                                    class="error-label hidden">* This field is required</span><span
                                    class="error-label-format hidden">*This Field is Invalid</span><span
                                    class="error-php"> <?php echo $businessTypeError; ?></span></label>

                        <div class="options">
                            <input name="business-type" type="radio"
                                   value="businesstype1"/>Tipo de negocio
                            1
                            <input name="business-type" type="radio"
                                   value="businesstype2"/>Tipo de negocio
                            2
                            <input name="business-type" type="radio"
                                   value="businesstype3"/>Tipo de negocio
                            3
                        </div>
                    </div>

                </div>
                <div class="register-popup ">
                    <button type="submit" class="button-primary" name="register-business">Registrarse</button>
                </div>
                <span
                        class="error-php">
                                 <?php
                                 if (isset($error) && strrpos($error, 'Duplicate entry')) {
                                     echo "User with this email address has already been registered!!!";
                                 } ?>
                               </span>
            </form>
        </div>
        <div class="pop-up-actions" class="hidden">
            <button type="button" onclick="register_business_cancel(event,this)" class="button-secondary">Cerrar
            </button>
        </div>
    </div>
</div>
<div id="lean-register-agent-page-recover-popup"
     class="<?php if ($agentModalClass) echo $agentModalClass; else echo "modal hidden"; ?>"
">
<div class="pop-up">
    <h1 class="pop-up-header">Registro de Agente LEAN</h1>
    <div class="pop-up-body">
        <form id="register-agent-page-form" method="POST" onsubmit="register_agent_page(event,this)">
            <div class="row">
                <div class="agent-email-add column2x">
                    <label for="agent-email" class="field-label">Correo <span class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php">
                                <?php
                                echo $emailError;
                                ?></span></label>
                    <input id="agent-email" type="text" name="email" placeholder="xxx@xxx.com" class="field"
                           value="<?php echo htmlspecialchars($email); ?>" required
                           pattern="^(.+)@([^\.].*)\.([a-z]{2,})$"/>
                </div>
                <div class="agent-password column2x">
                    <label for="agent-password">Contrasena <span
                                class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php"> <?php echo $passwordError; ?></span></label>
                    <input id="agent-password" type="password" name="password" placeholder="0 to 8 Non Space characters" class="field"
                           value="<?php echo htmlspecialchars($password); ?>" required pattern="^\S{0,8}$"/>
                </div>
            </div>
            <div class="row">
                <div class="agent-name column2x">
                    <label for="agent-name" class="field-label">Nombre <span class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php"> <?php echo $nameError; ?></span></label>
                    <input id="agent-name" type="text" placeholder="Nombre" name="username" class="field"
                           value="<?php echo htmlspecialchars($username); ?>" required/>
                </div>
                <div class="agent-surname column2x">
                    <label for="agent-surname">Apellido <span class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php"> <?php echo $lastnameError; ?></span></label>
                    <input id="agent-surname" type="text" name="surname" placeholder="Apellido" class="field"
                           value="<?php echo htmlspecialchars($surname); ?>" required/>
                </div>
            </div>
            <div class="row">
                <div class="agent-direction column2x">
                    <label for="agent-direction" class="field-label">Direcc&#237on <span class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php"> <?php echo $directionError; ?></span></label>
                    <input id="agent-direction" type="text" name="direction" placeholder="Direcc&#237on" class="field"
                           value="<?php echo htmlspecialchars($state); ?>" required/>
                </div>
            </div>
            <div class="row">
                <div class="agent-city column2x">
                    <label for="city" class="field-label">Ciudad <span class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php"> <?php echo $ciuError; ?></span></label>
                    <input id="city" type="text" placeholder="Ciudad" name="ciu" class="field"
                           value="<?php echo htmlspecialchars($ciu); ?>" required/>
                </div>
            </div>
            <div class="row">
                <div class="agent-state three-fouth-width">
                    <label for="state" class="field-label">Estado<span class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php"> <?php echo $stateError; ?></label>
                    <input list="state" name="state" placeholder="Escoger..." class="field state" required>
                    <datalist id="state">
                        <option value="TEXAS">TEXAS</option>
                        <option value="CALIFORNIA">CALIFORNIA</option>
                        <option value="COLORADO">COLORADO</option>
                        <option value="NEW-ORLEANS">NEW-ORLEANS</option>
                    </datalist>
                </div>
                <div class="agent-pin half-width">
                    <label for="agent-pin">Codigal Postal <span
                                class="error-label hidden">* This field is required</span><span
                                class="error-label-format hidden">*This Field is Invalid</span><span
                                class="error-php"><?php echo $pinError; ?></span></label>
                    <input id="agent-pin" type="text" name="pin" class="field" placeholder="American Zip Code"
                           value="<?php echo htmlspecialchars($pin); ?>" required pattern="^\d{5}(-\d{4})?$"/>
                </div>
            </div>
            <div class="register-popup">
                <button type="submit" class="button-primary" name="register-agent">Registrarse</button>
            </div>
            <span
                    class="error-php">
                                 <?php
                                 if (isset($error) && strrpos($error, 'Duplicate entry')) {
                                     echo "User with this email address has already been registered!!!";
                                 } ?>
                               </span>
        </form>
    </div>
    <div class="pop-up-actions" class="hidden">
        <button type="button" onclick="register_agent_cancel(event,this)" class="button-secondary">Cerrar
        </button>
    </div>
</div>
</div>
</body>
</html>