<!-- Adding Navigation Bar -->
<?php include("nav_bar.html"); ?>
<!-- Side Panel Skiped -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendence register</title>

    <!-- Bootstrap -->


<style>
        * {
            margin: 0px;
            border: border-box;
        }

        /* ******************** Body2 ************************** */
        .body {
            background-color: pink;
            display: flex;
            flex-direction: row;
        }

        .body2 {
            background-image: url(stock-vector-abstract-white-and-gray-color-modern-design-stripes-background-with-geometric-round-shape-vector-2275076235.jpg);
            background-size: cover;
            height: 727px;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .heading {
            font-size: 2.5rem;
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .ground-rules {
            /*  height: 100px;
            width: 300px;
            background-color: green; */
            margin-bottom: 50px;
        }

        table,
        tr,
        td,
        th {
            border: 2px solid black;
            border-collapse: collapse;
            color: #0f1111;
        }

        table {
            width: 600px;
            text-align: center;
            justify-self: center;
            margin-bottom: 40px;
        }

        tr:hover {
            background-color: #caf0f8;
        }

        .button_custom {
            font-family: "Roboto", sans-serif;
            font-size: 20px;
            font-weight: bold;
            background-color: #74c69d;
            height: 30px;
            width: 100px;
            padding-top: 8px;
            padding-bottom: 8px;
            padding-left: 10px;
            padding-right: 10px;
            text-align: center;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            border: none;
        }

        .button_custom:hover {
            border: 2px solid orange;
        }

        .log_button {
                    height: 35px;
                    width: 380px;
                    border-radius: 6px;
                    border: 2px solid orchid;
                    margin-bottom: 50px;
                    margin-top: 40px;
                    font-size: 1.1rem;
                    background-color: red;
                }

                .log_button:hover {
                    border: 2px solid red;
                }

</style>


</head>

<body>
    <div>

        <div class="body">

        


            <div class="body2">

            <?php
                if(isset($_GET['msg']))
                {
                    $msg = $_GET['msg'];
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    '. $msg .'
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
                }
                ?>

                <div class="heading">
                    <p>Ticket</p>
                </div>
                
                <div id="table_div">
                    <table>

                        <thead>
                            <tr>
                                <th>Ticket Number</td>
                                <th>Passenger ID</td>
                                <th>Issued By(Admin ID)</td>
                                <th>Train Name</td>
                                <th>Action</td>
                            </tr>
                        </thead>


                        <tbody>
                            <?php 
                            $server_name="localhost";
                            $username="root";
                            $password="";
                            $database_name="railway_management";
                            
                            $conn=mysqli_connect($server_name, $username, $password, $database_name);
                            
                            if(!$conn)
                            {
                                die("Connection Failed: " . mysqli_connect_error());
                            }

                            $sql= "SELECT * FROM ticket";
                            $result = $conn -> query($sql);

                            if(!$result)
                            {
                                die("Query Failed: " . mysqli_connect_error());
                            }
                            
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>" . $row["t_id"] . "</td>
                                        <td>" . $row["p_id"] . "</td>
                                        <td>" . $row["a_id"] . "</td>
                                        <td>" . $row["train_name"] . "</td>
                                        <td> <a href='ticket_delete.php?id= ". $row['t_id'] ."' class='log_button' >Delete</a> </td>
                                      </tr>";
                            }

                            ?>
                           
                        </tbody>
                    </table>
                </div>



                <div class="button">
                    <a href="ticket_form.php" class="button_custom">
                        Add New
                    </a>
                </div>


            </div>

        </div>

    </div>

</body>

</html>

<?php include("footer.html"); ?>