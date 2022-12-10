<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/loggedIndex.css">
    <title>Upload page</title>
</head>
<body>
    <?php include('../includes/headerON.php') ?>
    <main>
    <?php 
              if(isset($_COOKIE['userEmail'])){
                //Sentencia para sacar el id
                include('../includes/database-conn.php');
                $email = $_COOKIE['userEmail'];
                $stmt = $link->prepare("SELECT * FROM authors WHERE email='$email'");
                $stmt->bindColumn('id',$id);
                $stmt->execute();
                if(!$stmt->fetch()){
                    echo "Error al realizar sequencia";
                }
                    //Sentencia para mostrar las imagenes del usuario
                 $stmt1 = $link->prepare("SELECT * FROM images WHERE author_id = $id");
                 $stmt1->execute();
        ?>
             <div class="photo-container">
                    <?php
                foreach ( $stmt1 as $row) 
                {
                    echo ' <div class="box">
                       
                            <img src="../../imagesuser/'.$row['file'].'" alt="">             
                         <span>'.$row['text'].'</span>
                    </div>';
                }
            }
                ?>

            </div>
    </main>
    <?php include('../includes/footer.php') ?>
    <?php include('../includes/database-close.php'); ?>
</body>
</html>