<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<main class="main" style="background-color: #f7f7f7; padding: 8rem 0; min-height: 80vh;">
    <div class="user-view" style="background-color: #fff; max-width: 120rem; margin: 0 auto; min-height: 75vh; border-radius: 3px; overflow: hidden; box-shadow: 0 2.5rem 8rem 2rem rgba(0, 0, 0, 0.07); display: flex;">
        <!-- Sidebar Navigation -->
        <nav class="user-view__menu" style="flex: 32rem 0 0; background-image: linear-gradient(to right bottom, #7ed56f, #28b485); padding: 4rem 0;">
            <ul class="side-nav" style="list-style: none;">
                <li class="side-nav--active" style="border-left: 3px solid #fff; transition: all 0.2s;">
                    <a href="#" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem;">
                        Settings
                    </a>
                </li>
                <li style="margin: 1rem 0;">
                    <a href="#" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem; opacity: 0.8;">
                        My bookings
                    </a>
                </li>
                <li style="margin: 1rem 0;">
                    <a href="#" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem; opacity: 0.8;">
                        My reviews
                    </a>
                </li>
                <li style="margin: 1rem 0;">
                    <a href="#" style="padding: 1rem 4rem; display: flex; align-items: center; color: #fff; text-transform: uppercase; text-decoration: none; font-size: 1.5rem; opacity: 0.8;">
                        Billing
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

        <!-- Main Content Area -->
        <div class="user-view__content" style="flex: 1; padding: 7rem 8rem;">
            <div class="user-view__form-container">
                <h2 class="heading-secondary u-margin-bottom-medium" style="font-size: 2.25rem; text-transform: uppercase; font-weight: 700; background-image: linear-gradient(to right, #7ed56f, #28b485); -webkit-background-clip: text; color: transparent; letter-spacing: 0.1rem; line-height: 1.3; display: inline-block; margin-bottom: 3rem;">Your account settings</h2>
                
                <form class="form form-user-data">
                    <div class="form__group" style="margin-bottom: 2rem;">
                        <label class="form__label" for="name" style="display: block; font-size: 1.6rem; font-weight: 700; margin-bottom: 0.75rem;">Name</label>
                        <input class="form__input" id="name" type="text" value="<?= esc($user['name']) ?>" required name="name" style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.25rem 1.75rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f2f2f2; border-radius: 4px;">
                    </div>
                    <div class="form__group" style="margin-bottom: 2.5rem;">
                        <label class="form__label" for="email" style="display: block; font-size: 1.6rem; font-weight: 700; margin-bottom: 0.75rem;">Email address</label>
                        <input class="form__input" id="email" type="email" value="<?= esc($user['email']) ?>" required name="email" style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.25rem 1.75rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f2f2f2; border-radius: 4px;">
                    </div>

                    <div class="form__group form__photo-upload" style="display: flex; align-items: center; margin-bottom: 3rem;">
                        <img class="form__user-photo" src="<?= base_url('img/users/' . ($user['photo'] ?? 'default.jpg')) ?>" alt="User photo" style="height: 7.5rem; width: 7.5rem; border-radius: 50%; margin-right: 2rem;">
                        <input class="form__upload" type="file" accept="image/*" id="photo" name="photo" style="display: none;">
                        <label for="photo" style="cursor: pointer; color: #55c57a; font-size: 1.5rem; text-decoration: underline;">Choose new photo</label>
                    </div>

                    <div class="form__group right" style="text-align: right;">
                        <button class="btn btn--small btn--green" style="font-size: 1.4rem; padding: 1rem 3rem; background-color: #55c57a; color: #fff; border-radius: 10rem; border: none; text-transform: uppercase; cursor: pointer;">Save settings</button>
                    </div>
                </form>
            </div>
            
            <div class="line" style="margin: 6rem 0; width: 100%; height: 1px; background-color: #e0e0e0;">&nbsp;</div>
            
            <div class="user-view__form-container">
                <h2 class="heading-secondary u-margin-bottom-medium" style="font-size: 2.25rem; text-transform: uppercase; font-weight: 700; background-image: linear-gradient(to right, #7ed56f, #28b485); -webkit-background-clip: text; color: transparent; letter-spacing: 0.1rem; line-height: 1.3; display: inline-block; margin-bottom: 3rem;">Password change</h2>
                
                <form class="form form-user-password">
                    <div class="form__group" style="margin-bottom: 2rem;">
                        <label class="form__label" for="password-current" style="display: block; font-size: 1.6rem; font-weight: 700; margin-bottom: 0.75rem;">Current password</label>
                        <input class="form__input" id="password-current" type="password" placeholder="••••••••" required minlength="8" style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.25rem 1.75rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f2f2f2; border-radius: 4px;">
                    </div>
                    <div class="form__group" style="margin-bottom: 2rem;">
                        <label class="form__label" for="password" style="display: block; font-size: 1.6rem; font-weight: 700; margin-bottom: 0.75rem;">New password</label>
                        <input class="form__input" id="password" type="password" placeholder="••••••••" required minlength="8" style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.25rem 1.75rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f2f2f2; border-radius: 4px;">
                    </div>
                    <div class="form__group" style="margin-bottom: 3rem;">
                        <label class="form__label" for="password-confirm" style="display: block; font-size: 1.6rem; font-weight: 700; margin-bottom: 0.75rem;">Confirm password</label>
                        <input class="form__input" id="password-confirm" type="password" placeholder="••••••••" required minlength="8" style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.25rem 1.75rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f2f2f2; border-radius: 4px;">
                    </div>
                    <div class="form__group right" style="text-align: right;">
                        <button class="btn btn--small btn--green btn--save-password" style="font-size: 1.4rem; padding: 1rem 3rem; background-color: #55c57a; color: #fff; border-radius: 10rem; border: none; text-transform: uppercase; cursor: pointer;">Save password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
