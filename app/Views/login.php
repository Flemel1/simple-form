<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Simple Login Form</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/login.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login-form">
        <form action="/login" method="post">
            <?= csrf_field() ?>
            <h1>Login</h1>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="content">
                <div class="input-field">
                    <input type="email" placeholder="Email" name="email" required>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <a href="/reset" class="link">Forgot Your Password?</a>
            </div>
            <div class="action">
                <button type="button" id="register">Register</button>
                <button type="submit">Sign in</button>
            </div>
        </form>
    </div>
    <!-- partial -->
    <script>
        const register = document.querySelector('#register')
        register.addEventListener('click', (e) => {
            window.location.href = '/register'
        })
    </script>

</body>

</html>