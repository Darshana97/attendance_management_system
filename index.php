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

            <a href="view.php" class="btn btn-primary">Views</a>
            <a href="add.php" class="btn btn-primary pull-right" style="float: right">Add Employee</a>
            <form method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Father Name</th>
                            <th>Email</th>
                            <th>Attendance</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php

                        $query = "select * from employee";
                        $result = $link->query($query);
                        while ($show = $result->fetch_assoc()) {



                        ?>

                            <tr>
                                <td><?php echo $show['emp_name']; ?></td>
                                <td><?php echo $show['father_name']; ?></td>
                                <td><?php echo $show['email']; ?></td>
                                <td>

                                    Present<input required type="radio" name="attendance[<?php echo $show['emp_id']; ?>]" value="Present">
                                    Absent<input required name="attendance[<?php echo $show['emp_id']; ?>]" value="Absent" type="radio">

                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>


                    <?php

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $att = $_POST['attendance'];
                        $date = date('d-m-y');
                        $query = "select distinct date from attend";
                        $result = $link->query($query);
                        $b = false;
                        if ($result->num_rows > 0) {
                            while ($check = $result->fetch_assoc()) {
                                if ($date == $check['date']) {
                                    $b = true;
                                    echo "<div class='alert alert-danger'>
                        Attendance already taken today!!!;
                    </div>";
                                }
                            }
                        }

                        if (!$b) {

                            foreach ($att as $key => $value) {

                                if ($value == "Present") {

                                    $query = "insert into attend(value,emp_id,date) values('Present',$key,'$date')";
                                    $insertResult = $link->query($query);
                                } else {

                                    $query = "insert into attend(value,emp_id,date) values('Absent',$key,'$date')";
                                    $insertResult = $link->query($query);
                                }
                            }

                            if ($insertResult) {

                                echo "<div class='alert alert-success'>
                        Attendance taken successfully!!!;
                    </div>";
                            }
                        }
                    }

                    ?>

                </table>
                <input class="btn btn-primary" type="submit" value="Take Attendance">
            </form>
            

        </div>

        <div class="panel-footer">

        </div>



    </div>

</body>

</html>