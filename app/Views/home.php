<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Information</title>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Rubik:400,700'>
    <link rel="stylesheet" href="/global.css">
    <link rel="stylesheet" href="/login.css">
</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="login-form">
        <form action="/logout" method="post">
            <?= csrf_field() ?>
            <h1>User Information</h1>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <div class="content">
                <h2>Name <?= session()->get('user_name') ?></h2>
                <p>Email <?= session()->get('user_email') ?></p>
                <img width="400" height="200" src="<?= "uploads/" . session()->get('user_picture') ?>" alt="profile">
            </div>
            <div class="action">
                <button type="submit">Logout</button>
            </div>
        </form>
    </div>
    <!-- partial -->
    <script>
        
    </script>

</body>

</html>