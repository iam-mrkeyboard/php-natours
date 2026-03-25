<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <section class="section-header" style="height: 38vw; position: relative; clip-path: polygon(0 0, 100% 0, 100% 82%, 0 100%);">
        <div class="header__hero" style="height: 100%;">
            <img src="<?= base_url('uploads/tours/' . $tour['imageCover']) ?>" alt="<?= $tour['name'] ?>" style="object-fit: cover; height: 100%; width: 100%;">
        </div>
        <div class="heading-box" style="position: absolute; bottom: 13vw; left: 50%; transform: translateX(-50%); text-align: center; width: 100%;">
            <h1 class="heading-primary">
                <span><?= esc($tour['name']) ?> tour</span>
            </h1>
            <div class="heading-box__group" style="display: flex; justify-items: center; justify-content: center;">
                <div class="heading-box__detail" style="font-size: 1.5rem; font-weight: 700; text-transform: uppercase; color: #fff; padding: 0 1.5rem;">
                    <span><?= esc($tour['duration']) ?> days</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section-description" style="background-color: #fcfcfc; display: flex; gap: 3rem; margin-top: -9vw; padding: 0 3.5rem;">
        <div class="overview-box" style="background-color: #f7f7f7; flex: 1; padding: 15rem 0;">
            <div style="max-width: 45rem; margin: 0 auto; text-align: center;">
                <h2 class="heading-secondary" style="margin-bottom: 3.5rem;">Quick facts</h2>
                <div class="overview-box__detail"><span style="font-weight: 700;">Difficulty:</span> <?= esc($tour['difficulty']) ?></div>
                <div class="overview-box__detail"><span style="font-weight: 700;">Participants:</span> <?= esc($tour['maxGroupSize']) ?> people</div>
                <div class="overview-box__detail"><span style="font-weight: 700;">Rating:</span> <?= esc($tour['ratingsAverage']) ?> / 5</div>
            </div>
        </div>

        <div class="description-box" style="flex: 1; padding: 15rem 0;">
            <h2 class="heading-secondary" style="margin-bottom: 3.5rem;">About <?= esc($tour['name']) ?> tour</h2>
            <p class="description__text" style="font-size: 1.7rem; margin-bottom: 2rem;">
                <?= esc($tour['description']) ?>
            </p>
        </div>
    </section>
<?= $this->endSection() ?>
