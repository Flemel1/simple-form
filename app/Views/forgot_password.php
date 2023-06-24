<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/login.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login-form">
        <form action="/forgot-password" method="post">
            <?= csrf_field() ?>
            <h1>Forgot Password</h1>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="content">
                <div class="input-field">
                    <input type="email" placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Password" name="password" value="<?= set_value('password') ?>" required>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="New Password" name="new_password" value="<?= set_value('new_password') ?>" required>
                </div>
            </div>
            <div class="action">
                <button type="button" id="signin">Sign in</button>
                <button type="submit">Reset</button>
            </div>
        </form>
    </div>
    <!-- partial -->
    <script>
        const signIn = document.querySelector('#signin')
        signIn.addEventListener('click', (e) => {
            window.location.href = '/login'
        })
    </script>

</body>

</html>