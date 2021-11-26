<?php 
    require('db.php');
    require('sessions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Display Records</title>
</head>
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
<body>
    <div class="container">
        <h1 class="text-center">Records</h1>
        <div class="container text-center">
            <?php
                
                echo errorMessage();
                echo SuccessMessage();

            ?>
        </div>
        <div class="table-repsonsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Father Name</th>
                    <th>Age</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>

                <?php 
                    global $connection;
                    $query = "SELECT * FROM ciud";
                    $execute = mysqli_query($connection,$query);
                    $data = mysqli_fetch_all($execute, MYSQLI_ASSOC);
                    mysqli_free_result($execute);
                    $SR_No = 0;

                    foreach($data as $value){
                        $id = $value["id"];
                        $Name = $value["Name"];
                        $fName = $value["FatherName"];
                        $Age = $value["Age"];
                        $SR_No++;

                        ?>

                        <tr>
                            <td><?php echo $SR_No; ?></td>
                            <td><?php echo $Name; ?></td>
                            <td><?php echo $fName; ?></td>
                            <td><?php echo $Age; ?></td>
                            <td><a href="delete.php?id=<?php echo $id; ?>">
                            <span class="btn btn-danger">Delete</span>
                            </a></td>
                            <td><a href="update.php?id=<?php echo $id; ?>">
                            <span class="btn btn-success">Update</span>
                            </a></td>
                        </tr>

                        <?php
                    }
                ?>

            </table>
        </div>

        <a href="insert.php" class="btn btn-info btn-block">Insert Record</a>
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