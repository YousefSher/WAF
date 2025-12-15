<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body class="bg-light">
    <?php 
      include 'db.php';
    ?>
        <!-- form -->
    <div class="container mb-3 forms p-4 shadow-lg bg-light container-fluid form border border-primary-subtle rounded-3 w-50 mt-5">
      <div class="container container-fluid">
        <div class="h3 text-center text-primary-emphasis">Log in</div>
                <div class="p text text-center text-primary-emphasis">We can garantee your information safety.
                    <br>
                    Never stop learning!
                </div>
                <br>
                <div class="container">
                    <div class="p">
                        <?php
                        if(isset($_POST['email']) && isset($_POST['pass'])){
                            $email = $_POST['email'];
                            $pass = $_POST['pass'];
                            $sql = "SELECT * FROM `beta_users` WHERE `email` = '$email'";
                            $result = $conn->query($sql);
                            if($result->num_rows >= 1){                                        
                            $row = $result->fetch_assoc();
                                if(password_verify($pass, $row['password'])){
                                $_SESSION['loggedin'] = true;
                                $_SESSION['username'] = $row['name'];
                                $_SESSION['usertype'] = $row['user_type'];
                                $_SESSION['id'] = $row['id'];
                                echo "<div class='alert alert-success' role='alert'>
                                    User logged in successfully!
                                    </div>";
                                    header("Location: user-profile.php");
                                }
                                else{
                                echo "<div class='alert alert-denger' role='alert'>
                                Wrong password, please enter the correct one.
                                </div>";
                                }
                            }
                            else{
                                echo "<div class='alert alert-danger' role='alert'>
                                User doesn't exist.
                                </div>";
                            }
                        }
                        ?>
                    </div>
                </div>
                <br>
              <form action="" method="post">
                <!--email-->
                <div class="input-group mb-3">
                    <input type="email" class="form-control border-info" placeholder="E-mail" name="email" aria-label="email" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">..@example.com</span>
                </div><br>
                <!--pass-->
                <div class="input-group mb-3">
                  <span class="input-group-text" id=""><b>***</b></span>
                  <input type="password" class="form-control border-info" placeholder="Password" name="pass" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div><br>
                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-primary" type="submit">Log in</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/main.js"></script>
</body>
</html>