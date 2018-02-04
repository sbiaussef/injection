<?php 
include ('connexion.php');
include ('validInput.php');
$cnix=new inject();

session_start();

$cnx=$cnix->connect();

try 
     {
        if($stmt = $cnx->prepare("SELECT EMAIL, NOM, PASSWORD FROM USER WHERE EMAIL=:EMAIL AND PASSWORD=:PASSWORD"))
        {
            if($_POST['usr']!=null || $_POST['pwd']!=null)
                {

                        $stmt->bindParam(":EMAIL",$email);
                        $stmt->bindParam(":PASSWORD",$pass);

                        $email=test_input($_POST['usr']);
                        $pass=test_input($_POST['pwd']);

                        $stmt->execute(array(':EMAIL'=>$email, ':PASSWORD'=>$pass));
                        $userRow = $stmt->fetch(PDO::FETCH_ASSOC); 
                    
                            if($stmt->rowCount() > 0)
                                  {
                                     if($pass===$userRow['PASSWORD'])
                                     {
                                        $_SESSION['usr']=$userRow['NOM'];
                                        header('Location: index.php');
                                     }
                                      else{echo 'wrong password';}
                                    
                                  }
                            else
                                  {
                                        echo 'wrong data!!';
                                  }
                }
            else
            { echo'plz fill all inputs';}
        

          }
     }
      catch(PDOException $e)
     {
         echo  $e->getMessage();
     }

$conn = null;

?>
