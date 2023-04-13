<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
                require '../../config1.php' ;

class UtilisateurC 
{


      public function AjouterUtilisateur($user)
        {
                $pdo = getConnexion();


            try {
                $query = $pdo->prepare(
                    'INSERT INTO utilisateur (FirstName , LastName , Email , Password , Role)
                                 VALUES(:FirstName , :LastName , :Email , :Password , :Role ) '
                 );
                    $query->bindValue(':FirstName',$user->getFirstName());
                    $query->bindValue(':LastName' ,$user->getLastName());
                    $query->bindValue(':Email',$user->getEmail());
                    $query->bindValue(':Password',$user->getPassword());
                    $query->bindValue(':Role',2);
                    $query->execute();

                    session_start();
                    /*session is started if you don't write this line can't use $_Session  global variable*/
                    $_SESSION["user"]=$user->getEmail();
                    /*session created*/
                   // echo $_SESSION["newsession"];
                    /*session was getting*/

                    

                }
            catch (PDOExeption $e){ 
                $e->getMessage();
                unset($_SESSION["user"]);
            }

        }

        public function AfficherUtilisateur()
        {
                $pdo = getConnexion();

             try{
                 $query = $pdo->prepare('SELECT * FROM utilisateur');
                 $query->execute();

                 $result = $query->fetchALL();
             }
             catch(PDOException $e) {
                 $e->getMessage();
             }
            return $result ;
        }
        
      
        public function ModiferrUtilisateur($email , $mtp)
        {           
                //require '../../config1.php' ;
                $pdo = getConnexion();

            try{
                $query = $pdo->prepare('UPDATE utilisateur SET Password = :Password WHERE Email = :Email');
                $query->bindValue(':Password',$mtp);
                $query->bindValue(':Email',$email);
                
                $query->execute();
                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
            
        }
        public function DeleteUtilisateur($email)
        {              
                  $pdo = getConnexion();

            echo $email;
            try{
                $query = $pdo->prepare('DELETE FROM utilisateur WHERE Email = :Email');
                $query->bindValue(':Email',$email);
                
                $query->execute();

                session_start();
                    unset($_SESSION["user"]);

                 //header('Location: http://localhost/Projet2/');
                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
        }
        
        
        public function ChercherUtilisateur($user)
        {
               // require '../../config1.php' ;
                                $pdo = getConnexion();

            try{

                $query = $pdo->prepare(
                    'SELECT Email FROM utilisateur WHERE ( (Email = :Email) AND (Password = :Password) )' );
                    $query->bindValue(':Email',$user->getEmail());
                    $query->bindValue(':Password',$user->getPassword());
                    
                    $query->execute();
                    $result = $query->fetchAll();
                }
                catch (PDOExeption $e){ 
                $e->getMessage();
                
                  }
                
               /* if( isset($pass) ){
                    
                    foreach ($pass as $row) {
                        echo $row['Email']."<br />\n";   
                        session_start();
                        $_SESSION["newsession"]=$user->getEmail();
                        echo $_SESSION["newsession"];
                       // header('Location: http://firstpage/Projet/');
                    }
                }
                if ( $pass == null ){
                    session_start();
                    echo $_SESSION["newsession"];
                    
                    unset($_SESSION["newsession"]);
                    
                    
                   // header('Location: http://firstpage/Projet/');
                     }*/
                     return $result ;
                        
        }
        public function UserSignUpRecherche($user)
        {
                $pdo = getConnexion();

            try{
                    $query = $pdo->prepare('SELECT Email FROM utilisateur WHERE Email = :Email');
                    $query->bindValue(':Email',$user->getEmail());
                    
                    $query->execute(); 
                    $result = $query->fetchALL();
                
                }
                catch (PDOExeption $e){ 
                    $e->getMessage();
                    
                }

                return $result ;
        
                        
                        
        }




 public function DeleteUtilisateurAdmin($email)
        {              

                require '../../config1.php' ;
                $pdo = getConnexion();

            try{
                $query = $pdo->prepare('DELETE FROM utilisateur WHERE Email = :Email');
                $query->bindValue(':Email',$email);
                
                $query->execute();
                
            }
            catch (PDOExeption $e){ 
                $e->getMessage();
                
            }
        }

        
        public function RechercheAdmin($email)
        {
                require '../../config1.php' ;
                $pdo = getConnexion();

            try{
                    $query = $pdo->prepare('SELECT * FROM utilisateur WHERE Email LIKE "%:Email%" ');
                    $query->bindValue(':Email',$email);
                    
                    $query->execute(); 
                    $result = $query->fetchALL();
                
                }
                catch (PDOExeption $e){ 
                    $e->getMessage();
                    
                }

                return $result ;
        
                        
                        
        }

        
}

?>