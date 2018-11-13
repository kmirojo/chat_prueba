<?php

require_once('../sql/config.php');
session_start();

switch ($_REQUEST['action']) {
    case 'sendMessage':
        
        $query = $db->prepare("INSERT INTO messages SET user=?, message=?");

        $run = $query->execute([$_SESSION['username'], $_REQUEST['message']]);//Nombre Usuario, Asignar valor a variable '?'

        if($run) {
            echo 1;
            exit;
        }

        break;
    
    case "getMessages":
        
        $query = $db->prepare("SELECT * FROM messages");
        $run = $query->execute();

        $query_fetch = $query->fetchAll(PDO::FETCH_OBJ);

        $chat = '';

        foreach($query_fetch as $message){
            $chat .= ' <div class="message">
                            <div class="cloud animated bounceIn theirs"> 
                                <img class="profile_img" src="http://mongui.es/codepen/VLdNKN-avatar03.png" alt="">
                                <div class="cloud_userName">' . $message->user . '</div>
                                <div class="cloud_message">' . $message->message . '</div>
                                <div class="cloud_hour">' . date('h:i a', strtotime($message->date)) . '</div>
                            </div>
                        </div>';
        }
        
        echo $chat;

        break;    
    default:
        # code...
        break;
}