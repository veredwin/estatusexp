<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel='stylesheet prefetch' href='https://29fc400bc7c6efc322b6a1a40991760da398fade.googledrive.com/host/0B_RX8ykIqo8La3ZmT3JLN0xKbzQ/sweetalert/lib/sweet-alert.css'>

        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="css/normalize.css">
     <link rel="stylesheet" href="css/reset.css">
       
<?php
         $tipo=$_SESSION["tipo"];
                    if($tipo=="administrador"){ ?>
        
          <link rel="stylesheet" href="css/style.css">

<?php
                     } elseif ($tipo=="cliente") {
?>
                    <link rel="stylesheet" href="css/stylecliente.css">
<?php
                     } elseif ($tipo=="licenciado") { ?>
  <link rel="stylesheet" href="css/stylelic.css">
        
                        <?php
                     }
			
        ?>
      

        <style>
            .botonrojo{
                   margin-top: 35px;
                background-color: white;
                border: 1px solid #ff4a56;
                line-height: 0;
                font-size: 17px;
                display: inline-block;
                box-sizing: border-box;
                padding: 20px 15px;
                border-radius: 60px;
                color: #ff4a56;
                font-weight: 100;
                letter-spacing: 0.01em;
                /* position: relative;*/
                z-index: 1;
            }
            .transition, form button, form .question label, form .question input[type="text"] {
                -moz-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
                -o-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
                -webkit-transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
                transition: all 0.25s cubic-bezier(0.53, 0.01, 0.35, 1.5);
            }

            * {
                font-family: Helvetica, sans-serif;
                font-weight: light;
                -webkit-font-smoothing: antialiased;
            }
            form {
                position: relative;
                display: inline-block;
                max-width: 700px;
                min-width: 500px;
                box-sizing: border-box;
                padding: 30px 25px;
                background-color: white;
                border-radius: 40px;

                -moz-transform: translate(-50%, 0);
                -ms-transform: translate(-50%, 0);

            }
            form h1 {
                color: #ff4a56;
                font-weight: 100;
                letter-spacing: 0.01em;
                margin-left: 15px;
                margin-bottom: 35px;
                text-transform: uppercase;
            }
            form button {
                margin-top: 35px;
                background-color: white;
                border: 1px solid #ff4a56;
                line-height: 0;
                font-size: 17px;
                display: inline-block;
                box-sizing: border-box;
                padding: 20px 15px;
                border-radius: 60px;
                color: #ff4a56;
                font-weight: 100;
                letter-spacing: 0.01em;
                /* position: relative;*/
                z-index: 1;
            }
            form button:hover, form button:focus {
                color: white;
                background-color: #ff4a56;
            }
            form .question {
                position: relative;
                padding: 10px 0;
            }
            form .question:first-of-type {
                padding-top: 0;
            }
            form .question:last-of-type {
                padding-bottom: 0;
            }
            form .question label {
                transform-origin: left center;
                color: #ff4a56;
                font-weight: 100;
                letter-spacing: 0.01em;
                font-size: 17px;
                box-sizing: border-box;
                padding: 10px 15px;
                display: block;
                position: absolute;
                margin-top: -40px;
                z-index: 2;
                pointer-events: none;
            }
            form .question input[type="text"] {
                appearance: none;
                background-color: none;
                border: 1px solid #ff4a56;
                line-height: 0;
                font-size: 17px;
                width: 100%;
                display: block;
                box-sizing: border-box;
                padding: 10px 15px;
                border-radius: 60px;
                color: #ff4a56;
                font-weight: 100;
                letter-spacing: 0.01em;
                position: relative;
                z-index: 1;
            }
            form .question input[type="text"]:focus {
                outline: none;
                background: #ff4a56;
                color: white;
                margin-top: 30px;
            }
            form .question input[type="text"]:valid {
                margin-top: 30px;
            }
            form .question input[type="text"]:focus ~ label {
                -moz-transform: translate(0, -35px);
                -ms-transform: translate(0, -35px);
                -webkit-transform: translate(0, -35px);
                transform: translate(0, -35px);
            }
            form .question input[type="text"]:valid ~ label {
                text-transform: uppercase;
                font-style: italic;
                -moz-transform: translate(5px, -35px) scale(0.6);
                -ms-transform: translate(5px, -35px) scale(0.6);
                -webkit-transform: translate(5px, -35px) scale(0.6);
                transform: translate(5px, -35px) scale(0.6);
            }</style>

        <style>
            /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */

            .center {
                position: absolute;
                display: inline-block;
                top: 50%; left: 50%;
                transform: translate(-50%, -50%);
            }

            /** Custom Select **/
            .custom-select-wrapper {
                position: relative;
                display: inline-block;
                user-select: none;
            }
            .custom-select-wrapper select {
                display: none;
            }
            .custom-select {
                position: relative;
                display: inline-block;
            }
            .custom-select-trigger {
                position: relative;
                display: block;
                width: auto;
                padding: 0 84px 0 22px;
                font-size: 15px;
                font-weight: 300;
                color: #fff;
                line-height: 60px;
                background: #5c9cd8;
                border-radius: 4px;
                cursor: pointer;
            }
            .custom-select-trigger:after {
                position: absolute;
                display: block;
                content: '';
                width: 10px; height: 10px;
                top: 50%; right: 25px;
                margin-top: -3px;
                border-bottom: 1px solid #fff;
                border-right: 1px solid #fff;
                transform: rotate(45deg) translateY(-50%);
                transition: all .4s ease-in-out;
                transform-origin: 50% 0;
            }
            .custom-select.opened .custom-select-trigger:after {
                margin-top: 3px;
                transform: rotate(-135deg) translateY(-50%);
            }
            .custom-options {
                position: absolute;
                display: block;
                top: 100%; left: 0; right: 0;
                min-width: 100%;
                margin: 15px 0;
                border: 1px solid #b5b5b5;
                border-radius: 4px;
                box-sizing: border-box;
                box-shadow: 0 2px 1px rgba(0,0,0,.07);
                background: #fff;
                transition: all .4s ease-in-out;

                opacity: 0;
                visibility: hidden;
                pointer-events: none;
                transform: translateY(-15px);
            }
            .custom-select.opened .custom-options {
              
           position: relative;
                opacity: 1;
                visibility: visible;
                pointer-events: all;
                transform: translateY(0);
            }
            .custom-options:before {
                position: absolute;
                display: block;
                content: '';
                bottom: 100%; right: 25px;
                width: 7px; height: 7px;
                margin-bottom: -4px;
                border-top: 1px solid #b5b5b5;
                border-left: 1px solid #b5b5b5;
                background: #fff;
                transform: rotate(45deg);
                transition: all .4s ease-in-out;
            }
            .option-hover:before {
                background: #f9f9f9;
            }
            .custom-option {
                position: relative;
                display: block;
                padding: 0 22px;
                border-bottom: 1px solid #b5b5b5;
                font-size: 18px;
                font-weight: 600;
                color: #b5b5b5;
                line-height: 47px;
                cursor: pointer;
                transition: all .4s ease-in-out;
            }
            .custom-option:first-of-type {
                border-radius: 4px 4px 0 0;
            }
            .custom-option:last-of-type {
                border-bottom: 0;
                border-radius: 0 0 4px 4px;
            }
            .custom-option:hover,
            .custom-option.selection {
                background: #f9f9f9;
            }
        </style>
        <style>
            /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
            @import url(http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic);
            * {
                font-family: "Roboto", Arial, sans-serif;
            }



            h1 {
                font-weight: 100;
                color: #777;
            }

            .main-wrapper {
                width: 100px;
                height: 85px;
                border-radius: 4px;
                background-color: white;
                margin-top: -30px;
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
                position: relative;
                font-size: 4rem;
            }
            
             .main-wrapper2 {
                width: 50px;
                height: 42.5px;
                border-radius: 4px;
              
              
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
                position: relative;
            }

            i.material-icons {
                font-size: 1.5rem;
                color: white;
                position: relative;


                margin: 3px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                transition: color 0.2s ease, background-color 0.2s ease, transform 0.3s ease;
            }

            i.material-icons:after {
                content: "";
                width: 100%;
                height: 100%;
                border: solid 2px;
                transform: scale(0.8);
                position: absolute;
                top: -2px;
                left: -2px;
                border-radius: 50%;
                transition: all 0.3s ease;
            }

            i.material-icons:hover:after {
                transform: scale(1);
                box-shadow: 10px 0 20px rgba(0, 0, 0, 0.19), 6px 0 6px rgba(0, 0, 0, 0.23);
            }

            i.material-icons:nth-of-type(4) {
                background-color: #88b999;
            }

            i.material-icons:nth-of-type(4):hover {
                color: #88b999;
            }

            i.material-icons:nth-of-type(4):after {
                border-color: #88b999;
            }

            i.material-icons:nth-of-type(5) {
                background-color: #88b2b9;
            }

            i.material-icons:nth-of-type(5):hover {
                color: #88b2b9;
            }

            i.material-icons:nth-of-type(5):after {
                border-color: #88b2b9;
            }

            i.material-icons:nth-of-type(6) {
                background-color: #8897b9;
            }

            i.material-icons:nth-of-type(6):hover {
                color: #8897b9;
            }

            i.material-icons:nth-of-type(6):after {
                border-color: #8897b9;
            }

            i.material-icons:nth-of-type(7) {
                background-color: #af88b9;
            }

            i.material-icons:nth-of-type(7):hover {
                color: #af88b9;
            }

            i.material-icons:nth-of-type(7):after {
                border-color: #af88b9;
            }

            i.material-icons:nth-of-type(8) {
                background-color: #d59acb;
            }

            i.material-icons:nth-of-type(8):hover {
                color: #d59acb;
            }

            i.material-icons:nth-of-type(8):after {
                border-color: #d59acb;
            }

            i.material-icons:nth-of-type(1) {
                background-color: #cd8484;
            }

            i.material-icons:nth-of-type(1):hover {
                color: #cd8484;
            }

            i.material-icons:nth-of-type(1):after {
                border-color: #cd8484;
            }

            i.material-icons:nth-of-type(2) {
                background-color: #ec9f83;
            }

            i.material-icons:nth-of-type(2):hover {
                color: #ec9f83;
            }

            i.material-icons:nth-of-type(2):after {
                border-color: #ec9f83;
            }

            i.material-icons:nth-of-type(3) {
                background-color: #cdb274;
            }

            i.material-icons:nth-of-type(3):hover {
                color: #cdb274;
            }

            i.material-icons:nth-of-type(3):after {
                border-color: #cdb274;
            }

            i.material-icons:hover {
                background-color: transparent;
                transform: rotate(360deg);
                cursor: pointer;
                box-shadow: none;
            }


            p {
                color: #999;
                font-weight: 300;
                margin-top: 20px;
            }

            @media (min-width:601px) {
                i.material-icons {

                    margin:5px;
              
                }
            }

            @media (min-width:993px) {
                i.material-icons {

                    margin:10px;
               
                }
                i.material-icons:after {
                    border-width:3px;
                    top:-3px;
                    left:-3px;
                }
            }
        </style>

        <script src="js/prefixfree.min.js"></script>
        <title>StatusExp</title>
    </head>
