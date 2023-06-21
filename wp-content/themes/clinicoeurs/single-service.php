<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <?php $title = get_the_title()?>
<main class="service">
    <h2 aria-level="2" class="hidden"><?= get_the_title()?></h2>
    <section class="service__presentation presentation1">
        <div class="presentation1__all flex">
            <div class="presentation1__wrapper">
                <div class="presentation1__content">
                    <h3 aria-level="3"class="title presentation1__title--1"><?= get_field('services_titre_1')?></h3>
                    <p class="presentation1__description--1"><?= get_field('services_qui')?></p>
                </div>
                <div class="presentation1__content slide-in">
                    <h3 aria-level="3"  class=" title presentation1__title--2"><?= get_field('services_titre_2')?></h3>
                    <p class="presentation1__description--2"><?= get_field('services_que')?></p>
                </div>
            </div>
            <figure class="presentation1__fig">
                <?= get_the_post_thumbnail(null, 'clinicoeurs_thumbnail', ['class' => 'presentation1__img']); ?>
            </figure>
        </div>
    </section>
    <section class="service__presentation presentation2 slide-in flex">
        <div class="presentation2__all flex">
            <figure class="presentation2__fig">
                <img src="<?= get_field('services_img_2')?>" alt="" class="presentation2__img">
            </figure>
            <div class="presentation2__wrapper">
                <div class="presentation2__content">
                    <h3 aria-level="3" class=" title presentation2__title--1"><?= get_field('services_titre_3')?></h3>
                    <p class="presentation2__description--1"><?= get_field('services_quoi')?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="service__equipe equipe slide-in tri">
        <h3 aria-level="3" class="equipe__principaltitle title"> Découvrez les membres de <span class="bold rect rect_yellow">notre équipe</span></h3>
        <div class="flex column">
            <div class="equipe__wrapper equipe__wrapper flex">
                <?php $equipe = new WP_Query([
                    'post_type' => 'equipe',
                    'posts_per_page' => 100
                ]);
                if($equipe->have_posts()): while($equipe->have_posts()): $equipe->the_post();?>
                    <?php $tax = get_the_terms( get_the_ID() , 'section' );?>
                <?php if($tax[0]->slug === strtolower($title)):?>
                    <div class="equipe__content">
                        <figure class="equipe__fig">
                            <?= get_the_post_thumbnail(null, 'equipe_thumbnail', ['class' => 'equipe__img']); ?>
                        </figure>
                        <p class="equipe__name"><?= get_field('equipe_name')?></p>
                    </div>
                    <?php endif;?>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a personne dans l'équipe pour le moment. </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    </section>
    <section class="service__actualite slide-in tri">
        <h3 aria-level="3" class="tri__principaltitle title "> Articles liés à ce <span class="bold rect rect_yellow">service</span></h3>
        <div class="tri__wrapper actu actu--all flex">
            <h4 aria-level="4" class="hidden">Toutes les actualites</h4>
            <?php $actualite = new WP_Query([
                'post_type' => 'actualite',
                'posts_per_page' => 100
            ]);
            if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                <?php $tax = get_the_terms( get_the_ID() , 'type' );?>
                <?php if($tax[0]->slug === strtolower($title)):?>
                    <a href="<?= get_the_permalink();?>" class="tri__link">
                        <article class="tri__content content flex">
                            <h5 aria-level="5" class="tri__title"><?= get_the_title()?></h5>
                            <figure class="tri__fig">
                                <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'tri__img']); ?>
                            </figure>
                        </article>
                    </a>
                <?php endif; ?>
            <?php endwhile; else: ?>
                <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
            <?php endif; wp_reset_query(); ?>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>