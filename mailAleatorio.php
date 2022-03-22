<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $name = strip_tags(trim($_POST["name"]));
		$name = str_replace(array("\r","\n"),array(" "," "),$name);
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_POST["phone"]);
        $web = trim($_POST["web"]);
        $message = trim($_POST["message"]);

        // Check that data was sent to the mailer.
        if ( empty($name) OR empty($phone) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Por favor completa el formulario.";
            exit;
        }

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        $recipient = array("up190451@alumnos.upa.edu.mx", "up190671@alumnos.upa.edu.mx", "up190316@alumnos.upa.edu.mx");
        $recipient1 = "armandolopezmendoza7@gmail.com";
        $randIndex  =  array_rand($recipient, 1);
        /* $recipient = "armandolopezmendoza7@gmail.com"; */
        
        // Set the email subject.
        $subject = "Nuevo contacto de Max Lifter $name";

        // Build the email content.
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Phone: $phone\n\n";
        $email_content .= "message: $message\n\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient[$randIndex], $subject, $email_content, $email_headers) && mail($recipient1, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Gracias! Tu mensaje se ha enviado";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Algo no funciona y no fue posible enviar el mensaje. Puedes intentar por WhatsApp";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "Hubo un problema, por favor intenta de nuevo.";
    }

?>