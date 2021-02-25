<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//class to connect and operate the database
class DataBase {
    public static function connect($dsn, $user, $password) {

        $connection = new PDO($dsn, $user, $password);

        return $connection;
    }

}
//class to manage the pro players
class Players {
    public static function insertPlayer($nick, $team, $price, $db, $position) {
        $sql = "INSERT INTO players(nick, team, price, points, camp, position) VALUES('$nick', '$team', $price, 0, 'cblol','$position')";
        $stmt = $db->prepare($sql);
        try{
        $stmt->execute();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    
}

//class to manage the app's users
class User {
    //function to send a verification to the user's email
    public static function emailConfirmation($email, $nick, $token){

        $mail = new PHPMailer(true);

        try{
            
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'contact.byone@gmail.com';
            $mail->Password = 'suaSenhaDoEmail';
            $mail->Port = 587;

            $mail->setFrom('contact.byone@gmail.com');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'OSAKA FANTASY - Confirmar o cadastro da sua conta';
            $mail->Body = "Oi $nick, aqui está seu email de confirmação de cadastro na plataforma osaka fantasy.
                     clique no link abaixo, ou copie e cole no seu navegador, para confirmar e finalizar seu cadastro: </br> </br> </br>
                     
                     <a href='http://localhost/fantasyproject/api/confirmRegister/$email/$token'>http://localhost/fantasyproject/api/confirmRegister/$email/$token</a>
                     </br></br></br>
                     
                     Atenciosamente, ByOne development";
                     
            $mail->AltBody = "Olá $nick, este é seu email de confirmação de cadastro na plataforma osaka fantasy.
            clique no link abaixo, ou copie e cole no seu navegador, para confirmar e finalizar seu cadastro:
            
            http://localhost/fantasyproject/api/confirmRegister/$email/$token  .
            
            
            Atenciosamente, ByOne development";

            if($mail->send()){
                
            }else{
                
            }
        }catch(Exception $e){
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        } 
    }


    //FUNCTION TO REGISTER A NEW USER TO THE DATABASE
    public static function registerUser($nick, $email, $password, $token, $db){
        $sql = "INSERT INTO users(nick, email, password, token, verified) VALUES('$nick', '$email', '$password', '$token', 'no')";
        $stmt = $db->prepare($sql);
        try{
        $stmt->execute();
        echo 'usuario cadastrado com sucesso';
        }catch(PDEXception $e){
            echo $e->getMessage();
        }
    }


    //FUNCTION TO VERIFY IF THE USER'S ALLOW TO REGISTER
    public static function verifyRegistration($nick,$email,$db){ 
        //VERIFY THE NICK
        $sql = "SELECT * FROM users WHERE nick = '$nick'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if($result == false){
            $verify = 'valido';
        }else{
            $verify = 'nick invalido';
            return $verify;
        }

        //VERIFY THE EMAIL
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        
        if($result == false){
            $verify = 'valido';  
        }else{$verify = 'email invalido';   
            return $verify;
        }
        return $verify;
    }

    public static function userLogin($email, $password, $db){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        if(count($result) == 0){
            echo "email invalido";
        }else{
            if($password == $result[0]['password'] && $result[0]['verified'] == 'yes'){
                $resultt = array(
                    "status" => "logado com sucesso",
                    "nick" => $result[0]['nick']
                );

                echo json_encode($resultt);
            }
            if($result[0]['verified'] == 'no'){
                echo 'not verified';
            }
        }
    }

    //ROUTE TO CONFIRM EMAIL REGISTER
    public static function confirmRegister($email, $token, $db){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($token == $result[0]['token']){
            $sql = "UPDATE users SET verified = 'yes' WHERE token = '$token'";
            $stmt = $db->prepare($sql);
            $stmt->execute();
        }else{
            echo 'token errado';
        }
    }
}

