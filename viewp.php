<?php

include_once("connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" href="style.css" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

</head>

<body>

    <div class="panel panel-default container">
        <div class="panel-heading">
            <h1 style="text-align: center;">Attendance Management System</h1>
        </div>

        <div class="panel-body">

            <a href="#" class="btn btn-primary">Views</a>
            <a href="add.php" class="btn btn-primary pull-right" style="float: right">Add Employee</a>
            <form method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Serial No:</th>
                            <th>Date</th>
                            <th>View</th>
                            
                        </tr>
                    </thead>

                        <?php

                            $query = "select distinct date from attend";
                            $result = $link -> query($query);

                            if($result -> num_rows > 0){
                                $i = 0;
                                while($val = $result -> fetch_assoc()){
                                    $i++;
                                

                            

                        ?>

                    <tr>

                        <td><?php echo $i; ?></td>
                        <td><?php  echo $val['date']; ?></td>
                        <td><a href="viewp.php?=<?php echo $val['date'] ?>" class="btn btn-primary">View</a></td>

                    </tr>

                                <?php } } ?>
            

        </div>

        <div class="panel-footer">

        </div>



    </div>

</body>

</html>