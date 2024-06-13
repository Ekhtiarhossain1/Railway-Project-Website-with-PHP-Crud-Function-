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

if(isset($_POST['save']))
{
    $id= $_POST["id"];
    $first_name= $_POST["first_name"];
    $last_name= $_POST["last_name"];
    $designation= $_POST["designation"]; 
    $shift= $_POST["shift"];

    $sql_query = "INSERT INTO admins_info (id,first_name, last_name, designation, shift)
    VALUES ('$id','$first_name', '$last_name', '$designation', '$shift')";

    if(mysqli_query($conn, $sql_query))
    {
       header("Location: admins_info.php?msg=Added Successfuly!") ;
    }
    else
    {
        echo "Error: " .$sql ."" . mysqli_error($conn);
    }

    mysqli_close($conn);

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .mainbody {
            height: 650px;
            width: 500px;
            border: 2px solid black;
            border-radius: 10px;
            background-color: aquamarine;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .title {
            font-size: 40px;
            margin-top: 60px;
            margin-bottom: 30px;
        }

        .input_boxes {
            height: 300px;
            width: 420px;
            /* background-color: green; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* align-items: center; */
            font-size: 1.1rem;
            text-align: left;
            font-weight: normal;
            transform: translateX(20px);
        }

        .inpur_box {
            height: 40px;
            width: 400px;
            /* background-color: brown; */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .inpur_box input {
            width: 100%;
            height: 35px;
            border: 2px solid greenyellow;
            border-radius: 10px;
            margin-right: 8px;
            padding-left: 15px;
        }

        .inpur_box input:hover {
            border: 2px solid orchid;
        }

        .forgot_remember {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .forgot_remember label {
            margin-right: 95px;
        }

        .log_button {
            height: 35px;
            width: 380px;
            border-radius: 6px;
            border: 2px solid orchid;
            margin-bottom: 50px;
            margin-top: 40px;
            font-size: 1.1rem;
        }

        .log_button:hover {
            border: 2px solid red;
            background-color: #80ced7;
        }
    </style>
</head>

<body>
    <div class="mainbody">
        <form action="" method="POST">
            <div class="title">Registration</div>

            <div class="input_boxes">
                <p>Identity Number</p>
                <div class="inpur_box">
                    <input type="number" placeholder="1646264" name="id" required />
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <p>First Name</p>
                <div class="inpur_box">
                    <input type="text" placeholder="John" name="first_name" required />
                    <i class="fa-solid fa-file-signature"></i>
                </div>
                <p>Last Name</p>
                <div class="inpur_box">
                    <input type="text" placeholder="Wick" name="last_name" required />
                    <i class="fa-solid fa-signature"></i>
                </div>

                <p>Designation</p>
                <div class="inpur_box">
                    <input type="text" placeholder="Officer" name="designation" required />
                </div>
                <p>Shift</p>
                <div class="inpur_box">
                    <input type="radio" value="Day" name="shift" required />Day
                    <input type="radio" value="Night" name="shift" required />Night
                </div>

            </div>
            <button type="submt" class="log_button" name="save">Submit</button>

        </form>
    </div>
</body>

</html>