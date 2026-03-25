<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
    <section class="section-about" style="padding: 25rem 0; margin-top: -20vh; background-color: #f7f7f7;">
        <div class="u-center-text u-margin-bottom-big" style="text-align: center; margin-bottom: 8rem;">
            <h2 class="heading-secondary" style="font-size: 3.5rem; text-transform: uppercase; font-weight: 700; display: inline-block; background-image: linear-gradient(to right, #7ed56f, #28b485); -webkit-background-clip: text; color: transparent; letter-spacing: 2px;">
                Exciting tours for adventurous people
            </h2>
        </div>

        <div class="row" style="max-width: 114rem; margin: 0 auto; display: flex; gap: 6rem;">
            <div class="col-1-of-2" style="flex: 1;">
                <h3 class="heading-tertiary" style="font-size: 1.6rem; font-weight: 700; text-transform: uppercase; margin-bottom: 1.5rem;">
                    You're going to fall in love with nature
                </h3>
                <p class="paragraph" style="font-size: 1.6rem; margin-bottom: 3rem;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, ipsum sapiente aspernatur libero repellat quis consequatur ducimus quam nisi exercitationem omnis earum qui.
                </p>

                <h3 class="heading-tertiary" style="font-size: 1.6rem; font-weight: 700; text-transform: uppercase; margin-bottom: 1.5rem;">
                    Live adventures like you never have before
                </h3>
                <p class="paragraph" style="font-size: 1.6rem;">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores nulla deserunt voluptatum nam.
                </p>
                
                <a href="#" class="btn-text" style="font-size: 1.6rem; color: #55c57a; display: inline-block; text-decoration: none; border-bottom: 1px solid #55c57a; padding: 3px; transition: all .2s;">Learn more &rarr;</a>
            </div>
            <div class="col-1-of-2" style="flex: 1;">
               <!-- Composition of images would go here -->
               <div class="composition">
                   <p style="text-align:center; font-style: italic;">[Image Composition Placeholder]</p>
               </div>
            </div>
        </div>
    </section>

    <section class="section-tours" id="section-tours" style="background-color: #f7f7f7; padding: 15rem 0 10rem 0;">
        <div class="u-center-text u-margin-bottom-big" style="text-align: center; margin-bottom: 8rem;">
            <h2 class="heading-secondary" style="font-size: 3.5rem; text-transform: uppercase; font-weight: 700; display: inline-block; background-image: linear-gradient(to right, #7ed56f, #28b485); -webkit-background-clip: text; color: transparent; letter-spacing: 2px;">
                Most popular tours
            </h2>
        </div>

        <div class="row" style="max-width: 114rem; margin: 0 auto; display: grid; grid-template-columns: repeat(3, 1fr); gap: 6rem;">
            <?php if (!empty($tours) && is_array($tours)): ?>
                <?php foreach ($tours as $tour): ?>
                    <div class="card">
                        <div class="card__side card__side--front">
                            <div class="card__picture" style="background-image: linear-gradient(to right bottom, rgba(255, 185, 0, 0.5), rgba(255, 119, 48, 0.5)), url('<?= base_url('uploads/tours/' . $tour['imageCover']) ?>');">
                                &nbsp;
                            </div>
                            <h4 class="card__heading">
                                <span class="card__heading-span">
                                    <?= esc($tour['name']) ?>
                                </span>
                            </h4>
                            <div class="card__details">
                                <ul>
                                    <li><?= esc($tour['duration']) ?> day tour</li>
                                    <li>Up to <?= esc($tour['maxGroupSize']) ?> people</li>
                                    <li><?= esc($tour['difficulty']) ?> difficulty</li>
                                    <li>Rating: <?= esc($tour['ratingsAverage']) ?> / 5</li>
                                </ul>
                            </div>
                            <div class="card__cta">
                                <div class="card__price-box">
                                    <p class="card__price-value">$<?= $tour['price'] ?></p>
                                </div>
                                <a href="<?= base_url('tours/' . $tour['id']) ?>" class="btn btn--green">Details</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="u-center-text">
                    <p>No tours found. Please ensure the database is seeded.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?= $this->endSection() ?>
