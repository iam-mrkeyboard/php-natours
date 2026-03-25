<nav class="user-view__menu" style="flex: 32rem 0 0; background-image: linear-gradient(to right bottom, #7ed56f, #28b485); padding: 4rem 0;">
    <ul class="side-nav" style="list-style: none;">
        <li class="<?= current_url() == site_url('me') ? 'side-nav--active' : '' ?>" style="<?= current_url() == site_url('me') ? 'border-left: 3px solid #fff;' : '' ?> margin: 1rem 0;">
            <a href="<?= site_url('me') ?>" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem;">
                Settings
            </a>
        </li>
        <li class="<?= current_url() == site_url('my-tours') ? 'side-nav--active' : '' ?>" style="<?= current_url() == site_url('my-tours') ? 'border-left: 3px solid #fff;' : '' ?> margin: 1rem 0;">
            <a href="<?= site_url('my-tours') ?>" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem;">
                My bookings
            </a>
        </li>
        <li style="margin: 1rem 0;">
            <a href="#" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem; opacity: 0.8;">
                My reviews
            </a>
        </li>
    </ul>

    <?php if (isset($user['role']) && $user['role'] === 'admin'): ?>
        <div class="admin-nav" style="margin-top: 5.5rem;">
            <h5 class="admin-nav__heading" style="margin: 0 4rem 1.5rem 4rem; padding-bottom: 0.5rem; border-bottom: 1px solid rgba(255,255,255,0.2); text-transform: uppercase; color: #fff; font-size: 1.2rem;">Admin</h5>
            <ul class="side-nav" style="list-style: none;">
                <li style="margin: 1rem 0;">
                    <a href="#" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem; opacity: 0.8;">Manage tours</a>
                </li>
                <li style="margin: 1rem 0;">
                    <a href="#" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem; opacity: 0.8;">Manage users</a>
                </li>
            </ul>
        </div>
    <?php endif; ?>
</nav>
