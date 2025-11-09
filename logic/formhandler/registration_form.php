<?php

require_once "../validate.php";
require_once "../db.php";

$email = $_POST["email"];


if (!is_email_valid($email)) {
    echo "Email is not valid";
    return;
}

save_newsletter_registration($email);