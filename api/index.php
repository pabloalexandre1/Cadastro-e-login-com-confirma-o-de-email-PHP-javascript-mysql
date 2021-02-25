<?php
header('Content-Type: application/json');
require __DIR__.'/vendor/autoload.php';

if(isset($_REQUEST['url'])){
    //CONNECT TO THE DATABASE
    $db = DataBase::connect(MainDB::$dsn,MainDB::$user,MainDB::$password);

$url = explode('/', $_REQUEST['url']);

    //verify the access to the API
    if($url[0] == GeneralConfigs::$apiPassword){

        //route to view all players
        if($url[1] == 'players' && $url[2] == 'view'){
            if($url[3] == 'all' && $url[4] == 'cblol'){
                $sql = "SELECT * FROM players WHERE camp = 'cblol'";
                $stmt = $db-> prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                echo json_encode($result);
            }
        }
        //verify and register new users
        if($url[1] == 'register'){
            $nick = $url[2];
            $email = $url[3];
            $password = $url[4];
            $token = rand(1, 50000);

            $verify = User::verifyRegistration($nick, $email, $db);
            if($verify == 'valido'){
                User::registerUser($nick, $email, $password, $token, $db);
                user::emailConfirmation($email, $nick, $token);
            }else{
                echo $verify;
            }
        }
        //verify and login
        if($url[1] == 'login'){
            $email = $url[2];
            $password = $url[3];
            
            User::userLogin($email, $password, $db);
        }
    }
    if($url[0] == 'confirmRegister'){
        $email = $url[1];
        $token = $url[2];
        User::confirmRegister($email, $token, $db);
    }
}







