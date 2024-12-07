<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <title>Login Dapur</title>
</head>

<body>
    <div class="login-container">
        <h1>LOGIN DAPUR</h1>
        <?php
        session_start();
        if (isset($_SESSION['login_error'])) {
            echo '<p style="color:red;">' . $_SESSION['login_error'] . '</p>';
            unset($_SESSION['login_error']);
        }
        ?>
        <form method="post" action="proses_login_dapur.php"> <!-- Ubah action sesuai dengan file proses login dapur -->
            <label for="username">Username</label>
            <div class="username-container">
                <input type="text" id="username" name="username" required>
            </div>
            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <i class="fas fa-eye toggle-password" id="togglePassword"></i>
            </div>
            <a href="#">Forgot Password?</a>
            <button type="submit">MASUK</button>
        </form>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>