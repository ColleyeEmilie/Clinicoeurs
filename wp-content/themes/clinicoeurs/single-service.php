<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="service">
    <h2 class="hidden"><?= get_the_title()?></h2>
    <section class="service__presentation presentation1">
        <div>
            <h3>

            </h3>
            <p>

            </p>
            <h3>

            </h3>
            <p>

            </p>
        </div>
        <figure>
            <img src="" alt="">
        </figure>
    </section>

    <section class="service__presentation presentation2">
        <div>
            <h3></h3>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>