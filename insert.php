<?php
    require('db.php');
    require('sessions.php');
    if(isset($_POST["submit"])){
        $name = htmlentities($_POST["name"]);
        $fname = htmlentities($_POST["fname"]);
        $age = htmlentities($_POST["age"]);

        if($name == "" || $fname == "" || $age == ""){
            $_SESSION["errorMessage"] = "Please fill out all the required fields to proceed";
        }
        else{
            global $connection;
            $query = "INSERT INTO ciud(Name,FatherName,Age)
            VALUES('$name','$fname','$age')";

            $execute = mysqli_query($connection,$query);

            if($execute){
                $_SESSION["SuccessMessage"] = "Data Inserted Successfully";
            }else{
                $_SESSION["errorMessage"] = "Something Went Wrong!";
            }
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
    <title>CRUD</title>
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
    

    <h1 class="text-center">Please fill out for Insertion</h1>
    <div class="text-center container">
        <?php
            echo errorMessage();
            echo SuccessMessage();
        ?>
    </div>

    <div class="row">
        <div class="col-md-4 offset-md-4">
            <form action="insert.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Enter Your Name" name="name" class="form-control mb-2">

                    <label for="fathername">Father Name</label>
                    <input type="text" placeholder="Enter Your Father Name" name="fname" class="form-control mb-2">

                    <label for="age">Age</label>
                    <input type="text" placeholder="Enter Your Age" name="age" class="form-control mb-2">

                    <input type="submit" name="submit" class="form-control btn btn-primary mt-3" value="Submit">

                    <a href="display.php" class="btn btn-info form-control mt-3">View Records</a>
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