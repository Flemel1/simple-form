<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register Form</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/login.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login-form">
        <?= session()->getFlashdata('error') ?>
        <form action="/register" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <h1>Register</h1>
            <?= validation_list_errors() ?>
            <div class="content">
                <div class="input-field">
                    <input name="email" type="email" placeholder="Email" value="<?= set_value('email') ?>" required>
                </div>
                <div class="input-field">
                    <input name="name" type="text" placeholder="Name" value="<?= set_value('name') ?>" required>
                </div>
                <div class="input-field">
                    <input name="password" type="password" placeholder="Password" value="<?= set_value('password') ?>" required>
                </div>
                <div class="input-field">
                    <input name="image" type="file" required>
                </div>
            </div>
            <div class="action">
                <button type="button" id="sign-in">Sign in</button>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
    <!-- partial -->
    <script>
        const register = document.querySelector('#sign-in')
        register.addEventListener('click', (e) => {
            window.location.href = '/login'
        })
    </script>

</body>

</html>