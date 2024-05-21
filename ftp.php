<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['host']) && isset($_POST['email']) && isset($_POST['password'])) {
        $host = $_POST['host'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // FTP bağlantısı kurulur
        $conn = ftp_connect($host);
        if (!$conn) {
            die("FTP connection failed");
        }

        $login = ftp_login($conn, $email, $password);

        if ($login) {
            echo "Connected to $host as $email";
        } else {
            echo "Failed to connect";
        }

        ftp_close($conn);
    } else {
        echo "Missing required parameters";
    }
} else {
    echo "Invalid request method";
}
?>
