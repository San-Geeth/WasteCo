<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/logo1.png">
    <link rel="stylesheet" href="./assets/css/login.css">

    <script>
        function validateData() {
            var fname = document.getElementById("firstname").value;
            var lname = document.getElementById("lastname").value;
            var email = document.getElementById("lastname").value;
            var contact = document.getElementById("contact").value;
            if ((fname == "" || fname == null) || (lname == "" || lname == null) || (email == "" || email == null) || (contact == "" || contact == null)) {
                alert("Please Check Your Details!")
                return false;
            }
            return true;
        }

        function confirmRegi() {
            if (validateData())
                return confirm('Are you sure you want to create WateCo account?');
        }

    </script>

</head>
<body>
<div id="container" class="container">
    <form action="Actionnewuser.php" method="post">
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" placeholder="First Name" name="firstname" id="firstname"
                                   autocomplete="off" style="text-transform:capitalize" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="text" placeholder="Last Name" name="lastname" id="lastname" autocomplete="off"
                                   required style="text-transform:capitalize">
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input type="email" placeholder="Email" name="email" id="email" autocomplete="off" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" placeholder="Password" name="pwd" id="pwd" autocomplete="off"
                                   required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" placeholder="Confirm password" name="cpwd" id="cpwd"
                                   autocomplete="off" required>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <select name="location" id="location" required>
                                <option value="ampara">Ampara</option>
                                <option value="anuradhapura">Anuradhapura</option>
                                <option value="badulla">Badulla</option>
                                <option value="batticaloa">Batticaloa</option>
                                <option value="colombo">Colombo</option>
                                <option value="galle">Galle</option>
                                <option value="gampaha">Gampaha</option>
                                <option value="hambantota">Hambantota</option>
                                <option value="jaffna">Jaffna</option>
                                <option value="kalutara">Kalutara</option>
                                <option value="kandy">Kandy</option>
                                <option value="kegalle">Kegalle</option>
                                <option value="kilinochchi">Kilinochchi</option>
                                <option value="kurunegala">Kurunegala</option>
                                <option value="mannar">Mannar</option>
                                <option value="matale">Matale</option>
                                <option value="matara">Matara</option>
                                <option value="moneragala">Moneragala</option>
                                <option value="mullativu">Mullativu</option>
                                <option value="nuwara eliya">Nuwara Eliya</option>
                                <option value="polonnaruwa">Polonnaruwa</option>
                                <option value="puttalam">Puttalam</option>
                                <option value="ratnapura">Rathnapura</option>
                                <option value="trincomalee">Trincomalee</option>
                                <option value="vavuniya">Vavuniya</option>
                                <option value="anuradhapura">Anuradhapura</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="text" placeholder="Contact Number" name="contact" id="contact"
                                   autocomplete="off" required>
                        </div>
                        <input class="button" type="submit" name="register" value="Register"
                               onclick="confirmRegi()">
                        <p>
							<span>
								Already have an account?
							</span>
                            <b onclick="toggle()" class="pointer">
                                Sign in here
                            </b>
                        </p>
                    </div>
                </div>

            </div>
            <!-- END SIGN UP -->
    </form>


    <!-- SIGN IN -->
    <div class="col align-items-center flex-col sign-in">
        <div class="form-wrapper align-items-center">
            <form action="Actionlogin.php" method="post">
                <div class="form sign-in">
                    <div class="input-group">
                        <i class='bx bxs-user'></i>
                        <input type="email" placeholder="Email" name="email" id="email" required>
                    </div>
                    <div class="input-group">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" placeholder="Password" name="pwd" id="pwd" required>
                    </div>
                    <input class="button" type="submit" name="login" value="Login">
                    <p>
                        <b>
                            Forgot password?
                        </b>
                    </p>
                    <p>
							<span>
								Don't have an account?
							</span>
                        <b onclick="toggle()" class="pointer">
                            Sign up here
                        </b>
                    </p>
                    <p>
                        <a href="index.php">
                            <img src="assets/img/logo1.png" width="50" height="50" alt="">
                        </a>
                        <br>
                        <span>
								Click On Logo To Visit WasteCo!
							</span>
                    </p>

                </div>
            </form>
        </div>
        <div class="form-wrapper">

        </div>
    </div>
    <!-- END SIGN IN -->

</div>


<!-- END FORM SECTION -->

<!-- CONTENT SECTION -->
<div class="row content-row">
    <!-- SIGN IN CONTENT -->
    <div class="col align-items-center flex-col">
        <div class="text sign-in">
            <h2>
                Welcome
            </h2>

        </div>
        <div class="img sign-in">

        </div>
    </div>
    <!-- END SIGN IN CONTENT -->
    <!-- SIGN UP CONTENT -->
    <div class="col align-items-center flex-col">
        <div class="img sign-up">

        </div>
        <div class="text sign-up">
            <h2>
                Join with us
            </h2>

        </div>
    </div>
</div>
<!-- END SIGN UP CONTENT -->
</div>
<!-- END CONTENT SECTION -->
</div>

<script type="text/javascript" src="./assets/js/login.js"></script>
</body>
</html>