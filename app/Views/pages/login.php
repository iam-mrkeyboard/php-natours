<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<main class="main" style="background-color: #f7f7f7; padding: 8rem 0; min-height: 80vh; display: flex; align-items: center; justify-content: center;">
    <div class="login-form" style="margin: 0 auto; max-width: 55rem; background-color: #fff; box-shadow: 0 2.5rem 8rem 2rem rgba(0, 0, 0, 0.06); padding: 5rem 7rem; border-radius: 5px;">
        <h2 class="heading-secondary u-margin-bottom-medium" style="font-size: 2.25rem; text-transform: uppercase; font-weight: 700; background-image: linear-gradient(to right, #7ed56f, #28b485); -webkit-background-clip: text; color: transparent; letter-spacing: 0.1rem; line-height: 1.3; display: inline-block; margin-bottom: 3rem;">Log into your account</h2>
        
        <form class="form form--login">
            <div class="form__group" style="margin-bottom: 2.5rem;">
                <label class="form__label" for="email" style="display: block; font-size: 1.6rem; font-weight: 700; margin-bottom: 0.75rem;">Email address</label>
                <input class="form__input" id="email" type="email" placeholder="you@example.com" required style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.25rem 1.75rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f2f2f2; border-radius: 4px;">
            </div>
            <div class="form__group u-margin-bottom-medium" style="margin-bottom: 3rem;">
                <label class="form__label" for="password" style="display: block; font-size: 1.6rem; font-weight: 700; margin-bottom: 0.75rem;">Password</label>
                <input class="form__input" id="password" type="password" placeholder="••••••••" required minlength="8" style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.25rem 1.75rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f2f2f2; border-radius: 4px;">
            </div>
            <div class="form__group">
                <button class="btn btn--green" style="background-color: #55c57a; color: #fff; text-transform: uppercase; text-decoration: none; padding: 1.5rem 4rem; display: inline-block; border-radius: 10rem; transition: all 0.2s; font-size: 1.6rem; border: none; cursor: pointer; width: 100%;">Login</button>
            </div>
        </form>
    </div>
</main>
<?= $this->endSection() ?>
