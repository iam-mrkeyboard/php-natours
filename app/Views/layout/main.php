<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natours | <?= $title ?? 'Exciting tours for adventurous people' ?></title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="shortcut icon" type="image/png" href="<?= base_url('img/favicon.png') ?>">
</head>
<body>
    <!-- 
        Main Header & Navigation 
        The header class is styled as a full-height hero by default, 
        but we'll adjust this in CSS if we're not on the home page.
    -->
    <header class="<?= (isset($showHero) && $showHero) ? 'header' : 'header--small' ?>">
        <div class="header__nav-container">
            <nav class="nav nav--tours">
                <a href="<?= site_url('/') ?>" class="nav__el">All tours</a>
                <a href="#" class="nav__el">About us</a>
                <a href="#" class="nav__el">Contact</a>
            </nav>
            <div class="header__logo-box">
                <img src="<?= site_url('img/logo-white.png') ?>" alt="Logo" class="header__logo">
            </div>
            <nav class="nav nav--user" style="display: flex; align-items: center;">
                <?php if (session()->has('user')): ?>
                    <?php $user = session()->get('user'); ?>
                    <a href="<?= site_url('logout') ?>" class="nav__el">Log out</a>
                    <a href="<?= site_url('me') ?>" class="nav__el" style="display: flex; align-items: center; text-decoration: none; color: #fff;">
                        <img src="<?= base_url('img/users/' . ($user['photo'] ?? 'default.jpg')) ?>" alt="User photo" class="nav__user-img" style="height: 3.5rem; width: 3.5rem; border-radius: 50%; margin-right: 1rem;">
                        <span style="font-size: 1.2rem; text-transform: uppercase;"><?= explode(' ', $user['name'])[0] ?></span>
                    </a>
                <?php else: ?>
                    <a href="<?= site_url('login') ?>" class="nav__el">Log in</a>
                    <a href="<?= site_url('signup') ?>" class="nav__el nav__el--cta">Sign up</a>
                <?php endif; ?>
            </nav>
        </div>

        <?php if (isset($showHero) && $showHero): ?>
            <!-- Hero Content - only shown on the landing page -->
            <div class="header__text-box">
                <h1 class="heading-primary">
                    <span class="heading-primary--main">Outdoors</span>
                    <span class="heading-primary--sub">is where life happens</span>
                </h1>

                <a href="#section-tours" class="btn btn--white btn--animated">Discover our tours</a>
            </div>
        <?php endif; ?>
    </header>

    <!-- Main Content Area -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer Section: Constant for SEO and navigation -->
    <footer class="footer">
        <!-- Footer content will go here in later steps -->
    </footer>
</body>
</html>
