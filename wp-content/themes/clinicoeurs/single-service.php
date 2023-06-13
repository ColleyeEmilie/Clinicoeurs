<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="service">
    <h2 class="hidden"><?= get_the_title()?></h2>
    <section class="service__presentation presentation1">
        <div class="presentation1__content">
            <h3 class="title presentation1__title--1"><?= get_field('services_titre_1')?></h3>
            <p class="presentation1__description--1"><?= get_field('services_qui')?></p>
            <h3 class=" title presentation1__title--2"><?= get_field('services_titre_2')?></h3>
            <p class="presentation1__description--2"><?= get_field('services_que')?></p>
        </div>
        <figure class="presentation1__fig">
            <img src="<?= get_field('services_img_1')?>" alt="" class="presentation1__img">
        </figure>
    </section>

    <section class="service__presentation presentation2">
        <div class="presentation2__content">
            <h3 class=" title presentation2__title--1"><?= get_field('services_titre_3')?></h3>
            <p class="presentation2__description--1"><?= get_field('services_quoi')?></p>
        </div>
        <figure class="presentation2__fig">
            <img src="<?= get_field('services_img_2')?>" alt="" class="presentation2__img">
        </figure>
    </section>

    <section class="service__equipe equipe">
        <h3 class="equipe__title title"> Découvrez les membres de <span>notre équipe</span></h3>
        <?php $equipe = new WP_Query([
            'post_type' => 'equipe',
            'posts_per_page' => 100

        ]);?>
        <div class="equipe__content">
        <?php if($equipe->have_posts()): while($equipe->have_posts()): $equipe->the_post();?>
            <figure class="equipe__fig">
                <img src="<?= get_field('_')?>" alt="" class="equipe__img">
            </figure>

            <p class="equipe__name"><?= get_field('equipe_name')?></p>
        <?php endwhile; else: ?>
            <p class="equipe__empty">Il n'y a personne dans l'équipe pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>