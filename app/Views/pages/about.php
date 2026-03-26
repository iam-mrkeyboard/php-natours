<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<main class="main" style="padding: 10rem 0; background-color: #f7f7f7; min-height: 80vh;">
    <div class="u-center-text u-margin-bottom-big" style="text-align: center; margin-bottom: 8rem;">
        <h2 class="heading-secondary" style="font-size: 3.5rem; text-transform: uppercase; font-weight: 700; display: inline-block; background-image: linear-gradient(to right, #7ed56f, #28b485); -webkit-background-clip: text; color: transparent; letter-spacing: 2px;">
            About Natours
        </h2>
    </div>

    <div class="row" style="max-width: 114rem; margin: 0 auto; display: flex; gap: 6rem; align-items: center;">
        <div class="col-1-of-2" style="flex: 1;">
            <h3 class="heading-tertiary u-margin-bottom-small" style="font-size: 1.6rem; font-weight: 700; text-transform: uppercase; margin-bottom: 1.5rem;">We are the nature lovers</h3>
            <p class="paragraph" style="font-size: 1.6rem; margin-bottom: 3rem;">
                Natours is a premium nature tour provider dedicated to bringing people closer to the wild. We believe that adventure should be accessible, safe, and breathtaking. Our team of expert guides ensures that every tour is an unforgettable experience.
            </p>

            <h3 class="heading-tertiary u-margin-bottom-small" style="font-size: 1.6rem; font-weight: 700; text-transform: uppercase; margin-bottom: 1.5rem;">Your safety is our priority</h3>
            <p class="paragraph" style="font-size: 1.6rem;">
                From the highest peaks to the deepest forests, we go everywhere. But we never compromise on safety. Join us for a journey that will change your life.
            </p>
        </div>
        <div class="col-1-of-2" style="flex: 1;">
            <div class="composition" style="position: relative;">
                <img src="<?= base_url('img/tours/tour-1-1.jpg') ?>" alt="Photo 1" class="composition__photo composition__photo--p1" style="width: 55%; box-shadow: 0 1.5rem 4rem rgba(0,0,0,0.4); border-radius: 2px; position: absolute; z-index: 10; transition: all .2s; outline-offset: 2rem; left: 0; top: -2rem;">
                <img src="<?= base_url('img/tours/tour-2-1.jpg') ?>" alt="Photo 2" class="composition__photo composition__photo--p2" style="width: 55%; box-shadow: 0 1.5rem 4rem rgba(0,0,0,0.4); border-radius: 2px; position: absolute; z-index: 10; transition: all .2s; outline-offset: 2rem; right: 0; top: 2rem;">
                <img src="<?= base_url('img/tours/tour-3-1.jpg') ?>" alt="Photo 3" class="composition__photo composition__photo--p3" style="width: 55%; box-shadow: 0 1.5rem 4rem rgba(0,0,0,0.4); border-radius: 2px; position: absolute; z-index: 10; transition: all .2s; outline-offset: 2rem; left: 20%; top: 10rem;">
            </div>
        </div>
    </div>
</main>

<style>
    .composition:hover .composition__photo:not(:hover) {
        transform: scale(0.95);
    }
    .composition__photo:hover {
        outline: 1.5rem solid #55c57a;
        transform: scale(1.05) translateY(-0.5rem);
        box-shadow: 0 2.5rem 4rem rgba(0,0,0,0.5);
        z-index: 20;
    }
</style>
<?= $this->endSection() ?>
