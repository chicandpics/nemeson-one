<?php
include("config.php");
  // Recojo las variables
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $consulta = $_POST['consulta'];

  require_once(__DIR__ . "/PHPMailer/src/PHPMailer.php");
 require_once(__DIR__ . "/PHPMailer/src/Exception.php");
 require_once(__DIR__ . "/PHPMailer/src/SMTP.php");
 $mail = new PHPMailer\PHPMailer\PHPMailer();
 $mail->IsSMTP();
 $mail->SMTPDebug  = 0;                                    // Set mailer to use SMTP
 $mail->Host = 'smtp.ionos.es';                 // Specify main and backup server
 $mail->Port = 587;                                    // Set the SMTP port
 $mail->SMTPAuth = true;                                    // Enable SMTP authentication
 $mail->Username = 'nemeson@nemeson.es';                // SMTP username
 $mail->Password = '#Nemeson28475%';                  // SMTP password
 $mail->SMTPSecure = 'tls';
 $mail->SMTPAutoTLS = true;
 $mail->CharSet = 'UTF-8';

 $mail->From = $email;
 $mail->FromName = $nombre." ".$apellidos;
 $mail->AddAddress('comunicacion@nemeson.es');

 $mail->IsHTML(true);                                  // Set email format to HTML

 $mail->Subject = 'Correo formulario web';
          $mail->Body = "<!DOCTYPE html>
          <html lang='en'>
          <head>
            <title>Nemeson</title>
            <link rel='icon' type='image/png' href='./assets/favicon.ico'>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
            <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js'></script>
            <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>
            <link rel='stylesheet' href='http://procorgolf.com/747363ygcbsaidhfhioebqytobqc4ytcboqtyboq74ytcbqeiwyrtcobq374tycboq7tycw.css'>

          </head>
          <body>


            <div class='container-fluid' id='home' style='text-align:center !important;'>
              <div class='row'>
                  <section style='text-align:center;padding-top:2rem;'>
                  <p id='SemiBold' style='
                font-size: 1.5rem;
                line-height: 1;
                font-weight: bold;
            '>   $consulta </p>
                </section>
                <section>
                  <p>$telefono</p>
                </section>
                </div>
              </div>
            </div>

          </body>
          </html>

          ";
          if ($mail->send()){
            echo "enviado";

         }else{
           echo $e->errorMessage(); //Pretty error messages from PHPMailer

         }

 ?>
