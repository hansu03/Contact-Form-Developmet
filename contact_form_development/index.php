<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <hr>
    <h1>CONTACT FORM DEVELOPMENT </h1>
    <hr>

    <div class="message" style="color:red;font-size:2rem;">
        <?php
            session_start();
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
    </div>
    <div class="form-container">
        <form action="process_form.php" method="post">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required maxlength="100">

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required maxlength="20">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required maxlength="100">

            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required maxlength="100">

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
