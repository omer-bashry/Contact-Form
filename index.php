<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $mail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $cell = filter_var($_POST["cellphone"], FILTER_SANITIZE_NUMBER_INT);
    $msg =  filter_var($_POST["message"], FILTER_SANITIZE_STRING);
    $formErrors = array();
    if (strlen($user) < 3) {
        $formErrors[] = "User Name Must Be More Than <strong>3</strong> Charachters" . "<br>";
    }
    if (strlen($msg) < 10) {
        $formErrors[] = "Message Must Be More Than <strong>10</strong> Charachters" . "<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-3">Contact Me !!</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post" class="contact-form">
            <?php if (! empty($formErrors)) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php
                    foreach ($formErrors as $error) {
                        echo $error;
                    }
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <div class="form-group">
                <input
                    class="form-control username"
                    type="text"
                    name="username"
                    placeholder="Enter User Name"
                    value=<?php if (!empty($user)) echo $user ?>>
                <i class="fa-solid fa-user fa-fw"></i>
                <div class="alert alert-danger custom-alert" role="alert">
                    User Name Must Be More Than <strong>3</strong> Charachters
                </div>
            </div>

            <div class="form-group">
                <input
                    class="form-control"
                    type="email"
                    name="email"
                    placeholder="Enter A Valid Email"
                    value=<?php if (!empty($mail)) echo $mail ?>>
                <i class="fa-solid fa-envelope fa-fw"></i>
                <div class="alert alert-danger custom-alert" role="alert">
                    Email Can't Be <strong>Empty</strong>
                </div>
                <!-- Test Connectivity -->
                <!-- Test Connectivity -->
            </div>

            <input
                class="form-control"
                type="text"
                name="cellphone"
                placeholder="Enter Cell Phone"
                value=<?php if (!empty($cell)) echo $cell ?>>
            <i class="fa-solid fa-phone-volume fa-fw"></i>

            <div class="form-group">
                <textarea
                    class="form-control"
                    name="message"
                    placeholder="Enter A Message"><?php if (!empty($msg)) echo $msg ?></textarea>
                <div class="alert alert-danger custom-alert" role="alert">
                    Message Must Be More Than <strong>10</strong> Charachters
                </div>
            </div>
            <input
                type="submit"
                class="btn btn-success"
                value="Send Message">
            <i class="fa-solid fa-paper-plane fa-fw"></i>

        </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.7.1.min.js"></script>`
    <script src="js/custom.js"></script>
</body>


</html>