<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<main class="main" style="background-color: #f7f7f7; padding: 8rem 0; min-height: 80vh;">
    <div class="user-view" style="background-color: #fff; max-width: 120rem; margin: 0 auto; min-height: 75vh; border-radius: 3px; overflow: hidden; box-shadow: 0 2.5rem 8rem 2rem rgba(0, 0, 0, 0.07); display: flex;">
        <!-- Reuse Sidebar from Account -->
        <?= view('pages/account_sidebar', ['user' => $user]) ?>

        <div class="user-view__content" style="flex: 1; padding: 7rem 8rem;">
            <h2 class="heading-secondary u-margin-bottom-medium" style="font-size: 2.25rem; text-transform: uppercase; font-weight: 700; background-image: linear-gradient(to right, #7ed56f, #28b485); -webkit-background-clip: text; color: transparent; letter-spacing: 0.1rem; line-height: 1.3; display: inline-block; margin-bottom: 3rem;">My Bookings</h2>

            <?php if (empty($bookings)): ?>
                <div class="u-center-text">
                    <p style="font-size: 1.6rem;">You haven't booked any tours yet. <a href="<?= site_url('/') ?>" style="color: #55c57a;">Go find one!</a></p>
                </div>
            <?php else: ?>
                <div class="card-container" style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 4rem;">
                    <?php foreach ($bookings as $booking): ?>
                        <div class="card">
                            <!-- Booking Detail Card... can be refined -->
                            <div class="card__side card__side--front">
                                <div class="card__details" style="padding: 2rem;">
                                    <h4 style="font-size: 1.8rem; margin-bottom: 1rem; color: #55c57a;">Booking #<?= $booking['id'] ?></h4>
                                    <p>Amount: $<?= $booking['price'] ?></p>
                                    <p>Date: <?= date('M d, Y', strtotime($booking['createdAt'])) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>
<?= $this->endSection() ?>
