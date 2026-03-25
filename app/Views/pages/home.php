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
                    <div class="card" style="perspective: 150rem; position: relative; height: 52rem; background-color: #fff; box-shadow: 0 1.5rem 4rem rgba(0,0,0,0.15); border-radius: 3px; overflow: hidden; transition: all .8s ease;">
                        <div class="card__picture" style="background-size: cover; height: 23rem; background-blend-mode: screen; clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%); border-top-left-radius: 3px; border-top-right-radius: 3px; background-image: linear-gradient(to right bottom, #ffb900, #ff7730), url('<?= base_url('uploads/tours/' . $tour['imageCover']) ?>');">
                            &nbsp;
                        </div>
                        <h4 class="card__heading" style="font-size: 2.8rem; font-weight: 300; text-transform: uppercase; text-align: right; color: #fff; position: absolute; top: 12rem; right: 2rem; width: 75%;">
                            <span class="card__heading-span" style="padding: 1rem 1.5rem; -webkit-box-decoration-break: clone; box-decoration-break: clone; background-image: linear-gradient(to right bottom, rgba(255, 185, 0, 0.85), rgba(255, 119, 48, 0.85));">
                                <?= $tour['name'] ?>
                            </span>
                        </h4>
                        <div class="card__details" style="padding: 3rem;">
                            <ul style="list-style: none; width: 80%; margin: 0 auto;">
                                <li style="text-align: center; font-size: 1.5rem; padding: 1rem; border-bottom: 1px solid #eee;"><?= $tour['duration'] ?> day tour</li>
                                <li style="text-align: center; font-size: 1.5rem; padding: 1rem; border-bottom: 1px solid #eee;">Up to <?= $tour['maxGroupSize'] ?> people</li>
                                <li style="text-align: center; font-size: 1.5rem; padding: 1rem; border-bottom: 1px solid #eee;"><?= $tour['difficulty'] ?> difficulty</li>
                            </ul>
                        </div>
                        <div class="card__cta" style="position: absolute; bottom: 3rem; left: 50%; transform: translateX(-50%); text-align: center; width: 100%;">
                            <p class="card__price-value" style="font-size: 4rem; font-weight: 100; margin-bottom: 2rem;">$<?= $tour['price'] ?></p>
                            <a href="<?= base_url('tours/' . $tour['id']) ?>" class="btn btn--white" style="background-color: #55c57a; color: #fff; border-radius: 10rem; padding: 1.2rem 3rem; text-decoration: none; font-size: 1.4rem; text-transform: uppercase;">Details</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No tours found.</p>
            <?php endif; ?>
        </div>
    </section>
<?= $this->endSection() ?>
