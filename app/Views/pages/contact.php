<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<main class="main" style="padding: 10rem 0; background-color: #f7f7f7;">
    <div class="u-center-text u-margin-bottom-big" style="text-align: center; margin-bottom: 8rem;">
        <h2 class="heading-secondary" style="font-size: 3.5rem; text-transform: uppercase; font-weight: 700; display: inline-block; background-image: linear-gradient(to right, #7ed56f, #28b485); -webkit-background-clip: text; color: transparent; letter-spacing: 2px;">
            Contact Us
        </h2>
    </div>

    <div class="row" style="max-width: 80rem; margin: 0 auto; background-color: #fff; padding: 6rem; border-radius: 3px; box-shadow: 0 1.5rem 4rem rgba(0,0,0,0.1);">
        <form action="#" class="form">
            <div class="form__group" style="margin-bottom: 2rem;">
                <input type="text" class="form__input" placeholder="Full name" id="name" required style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.5rem 2rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f7f7f7; border-radius: 2px;">
                <label for="name" class="form__label" style="font-size: 1.2rem; font-weight: 700; margin-left: 2rem; margin-top: 0.7rem; display: block; transition: all 0.3s;">Full name</label>
            </div>

            <div class="form__group" style="margin-bottom: 2rem;">
                <input type="email" class="form__input" placeholder="Email address" id="email" required style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.5rem 2rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f7f7f7; border-radius: 2px;">
                <label for="email" class="form__label" style="font-size: 1.2rem; font-weight: 700; margin-left: 2rem; margin-top: 0.7rem; display: block; transition: all 0.3s;">Email address</label>
            </div>

            <div class="form__group" style="margin-bottom: 4rem;">
                <textarea rows="5" class="form__input" placeholder="Message" id="message" required style="display: block; font-family: inherit; color: inherit; font-size: 1.5rem; padding: 1.5rem 2rem; border: none; border-bottom: 3px solid transparent; width: 100%; transition: all 0.3s; background-color: #f7f7f7; border-radius: 2px;"></textarea>
                <label for="message" class="form__label" style="font-size: 1.2rem; font-weight: 700; margin-left: 2rem; margin-top: 0.7rem; display: block; transition: all 0.3s;">Message</label>
            </div>

            <div class="form__group">
                <button class="btn btn--green" style="font-size: 1.6rem; text-transform: uppercase; padding: 1.5rem 4rem; border-radius: 10rem; border: none; background-color: #55c57a; color: #fff; cursor: pointer; transition: all .2s;">Send Message &rarr;</button>
            </div>
        </form>
    </div>
</main>

<style>
    .form__input:placeholder-shown + .form__label {
        opacity: 0;
        visibility: hidden;
        transform: translateY(-4rem);
    }
    .form__input:focus {
        outline: none;
        box-shadow: 0 1rem 2rem rgba(0,0,0,0.1);
        border-bottom: 3px solid #55c57a;
    }
    .form__input:focus:invalid {
        border-bottom: 3px solid #ff7730;
    }
</style>
<?= $this->endSection() ?>
