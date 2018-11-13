<?php 
session_start();

$_SESSION['username'] = $_POST['nameReg'];
// $_SESSION['username'] = 'User #1';
$userName = $_POST['nameReg'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- ↓↓ Materialize ↓↓ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- ↓↓ Custom ↓↓ -->
    <link rel="stylesheet" href="styles/custom.css">
    <!-- ↓↓ JQuery ↓↓ -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
</head>
<body>

    <div id="wrapper">
        <h1><?php echo $userName;?></h1>

        <div class="chat_wrapper">
            <div id="chat" class="chat_content"></div>
            <form action="" method="POST" id="messageForm">
                <textarea name="message" id="" cols="30" rows="10" class="textarea"></textarea>
            </form>
        </div>
    </div>

    <script>
        LoadChat();

        setInterval(() => {
            LoadChat();
        }, 1000);

        // ============================================================================
        // --- ↓↓ Carga de mensajes ↓↓ ------------------------------------------------
        // ============================================================================
        function LoadChat(){
            $.post('handlers/messages.php?action=getMessages', (response)=>{
                $('#chat').html(response);
            });
        }

        // ============================================================================
        // --- ↓↓ Acción de  Envío ↓↓ -------------------------------------------------
        // ============================================================================
        $('.textarea').keydown((e)=>{
            // console.log('Tecla => ' + e.which);

            if(e.which == 13 && !e.shiftKey) { // Si la tecla presionada es "Enter" sin "Shift"
                e.preventDefault(); // Prevenir salto de linea

                if($('.textarea').val() != ''){
                    $('form').submit();
                } else {
                    alert('Mensaje en Blanco! :(');
                }
            }
        })

        // ============================================================================
        // --- ↓↓ Submit del Chat ↓↓ --------------------------------------------------
        // ============================================================================
        $('form').submit(() => {
            var message = $('.textarea').val();

            $.post('handlers/messages.php?action=sendMessage&message=' + message, (response)=>{
                // console.log('↓↓ Respuesta ↓↓');
                // console.log(response);

                if(response == 1){
                    document.getElementById('messageForm').reset();
                    alert('Mensaje Enviado! ;)');
                }
            });

            return false;
        })
    </script>
</body>
</html>