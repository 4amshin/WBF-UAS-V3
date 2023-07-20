<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtah=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!--Css Link-->
    <link rel="stylesheet" href="<?= base_url(); ?>/css/dashboard.css" />
</head>

<body>
    <div class="container">
        <h1 class="title">Admin Dashboard</h1>
        <a href="<?= base_url('doLogout'); ?>" class="logout-button">LogOut</a>
        <div class="option">
            <?php foreach ($result as $menu) : ?>
                <div class="menu-option">
                    <p class="title">
                        <?= $menu['menu_name']; ?>
                    </p>
                    <a href="<?= base_url('dashboardEditor/'.$menu['menu_id']); ?>" class="edit">Edit</a>
                </div>
            <?php endforeach; ?>
        </div>

        
</body>

</html>