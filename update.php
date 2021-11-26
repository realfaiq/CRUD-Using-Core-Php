<?php 

    require('db.php');
    require('sessions.php');

    if(isset($_POST["submit"])){

        $Name = htmlentities($_POST["name"]);
        $FatherName = htmlentities($_POST["fname"]);
        $age = htmlentities($_POST["age"]);

        global $connection;
        $idFromURL = $_GET["id"];
        $query = "UPDATE ciud SET Name='$Name', FatherName='$FatherName', Age='$age' WHERE id='$idFromURL'";
        $execute = mysqli_query($connection, $query);
        if($execute){
            $_SESSION["SuccessMessage"] = "Record Updated Successfully";
            redirectTo("display.php");
        }else{
            $_SESSION["errorMessage"] = "Something Went Wrong!";
            redirectTo("display.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Update Record</title>
    <style>
        body{
            background: black;
            color: #fff;
            overflow-x: hidden;
        }

        #margin{
            margin-left = 50%;
        }
    </style>
</head>
<body>
    <h1 class="text-center">Update Record</h1>
    
    <?php 
        global $connection;
        $edited = $_GET["id"];
        $query = "SELECT * FROM ciud WHERE id='$edited' ";
        $execute = mysqli_query($connection,$query);
        $data = mysqli_fetch_all($execute, MYSQLI_ASSOC);

        foreach($data as $value){
            $name = $value["Name"];
            $fname = $value["FatherName"];
            $Age = $value["Age"];
        }
    ?>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="update.php?id=<?php echo $edited; ?>" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?php echo $name; ?>" name="name" class="form-control mb-2">

                    <label for="fname">Father Name</label>
                    <input type="text" value="<?php echo $fname; ?>" name="fname" class="form-control mb-2">

                    <label for="age">Age</label>
                    <input type="text" value="<?php echo $Age; ?>" name="age" class="form-control">

                    <input type="submit" name="submit" value="Update" class="btn btn-primary mt-3 form-control">
                </div>
            </form>
        </div>
    </div>

    <footer class="main-footer mt-5">
        <div class="container">
            <h4 class="text-center">Copyright &copy; 2021 <br>
            All Rights Reserved</h4>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>