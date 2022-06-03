<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style="background-color: seashell;">
    <ul class="nav navbar-dark bg-dark">
        <li class="nav-item ">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Feedback</a>
        </li>
    </ul>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $desc = $_POST['desc'];


        // Connecting to a database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "contact";

        // Create a connection
        $conn = mysqli_connect($servername, $username, $password, $database);

        // echo "Connection was successful";
        // Die if the connection was successful
        // if (!$conn) {
        //     die("Sorry we are failed to connect: " . mysqli_connect_error());
        // } 
        $sql = "INSERT INTO `contactus` (`name`, `email`, `concern`, `dt`) VALUES ('$name', '$email', '$desc', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        // Add a new data to the phpsuraksha table in the database
        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your record has been submitted successfully!...
      </div>';
        } else {
            echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            The record was not inserted successfully due to this error ---> " . mysqli_error($conn) 
      </div>';
            
        }
    }
    ?>

    <div class="container mx-3 my-5">
        <h2>Contact us for your concerns.</h2>
        <form action="/phpLearning/17_form.php" method="post">
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="mail" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description</label>
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" name="checkbox" class="form-check-input" id="check">
                <label class="form-check-label" for="exampleCheck1">Check me in</label>
            </div>
            <button type="submit" class="btn btn-primary" id="btn">Submit</button>
        </form>
    </div>
    </div>
</body>
<script>
    (function() {
        var button = document.getElementById('btn');

        button.disabled = true;

        var f = document.getElementById('check');

        f.addEventListener('change', function() {

            if (f.value === '') {

                button.disabled = true;

            } else {
                button.disabled = false;
            }
        });

    })();
</script>

</html>