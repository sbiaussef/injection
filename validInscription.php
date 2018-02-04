<?php 

include ('connexion.php');
include ('validInput.php');

$cnix=new inject();

$cnx=$cnix->connect();
try {
    if ( $stmt = $cnx->prepare("INSERT INTO `USER`(`EMAIL`, `NOM`, `PASSWORD`) VALUES (:EMAIL,:NOM,:PASSWORD)") )
      {
            if($_POST['email']!=null && $_POST['username']!=null && $_POST['password']!=null)
            {

                    $stmt->bindParam(":EMAIL",$email);
                    $stmt->bindParam(":NOM",$name);
                    $stmt->bindParam(":PASSWORD",$pass);

                    $email=test_input($_POST['email']);
                    $name=test_input($_POST['username']);
                    $pass=test_input($_POST['password']);
                
                
                    $stmt->execute();
                    echo "<h1>New record created successfully</h1>";
            }
            else
            {
                    header('Location: index.php');
            }
                    
      }
    }
      catch(PDOException $e)
    {
      echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>