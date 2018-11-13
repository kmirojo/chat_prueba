<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- ↓↓ JQuery ↓↓ -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- ↓↓ Materialize | CSS ↓↓ -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- ↓↓ Materialize | JS ↓↓ -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- ↓↓ Login ↓↓ -->
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div id="signup" class="row">
        <h3>Registration</h3>
        <form method="post" action="chat.php" name="signup">
            <div class="input-field col s12">
                <input id="last_name" type="text" name="nameReg" autocomplete="off" class="validate">
                <label for="last_name"> Name</label>
            </div>
            <!-- <div class="input-field col s12">
                <input id="last_name" type="password" name="passwordReg" autocomplete="off" class="validate">
                <label for="last_name"> Password </label>
            </div> -->

            <!-- <div class="errorMsg"><?php echo $errorMsgReg; ?></div> -->
            <!-- <input type="submit" class="button btn waves-effect waves-light" name="signupSubmit" value="Signup"> -->

            <button class="btn waves-effect waves-light" type="submit" name="signupSubmit">
                Submit
            </button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            M.updateTextFields();
        });
    </script>
</body>
</html>