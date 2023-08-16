<?php /* Template Name: Partenaire page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="partenaire">
    <h2 aria-level="2" class="hidden">Nos partenaires</h2>
    <section class="partenaire__hero hero">
        <div class="hero__all flex">
            <div class="hero__content">
                <h3 aria-level="3" class="hero__principaltitle title"><?= get_field('partenaire_titre') ?></h3>
                <p class="hero__text"><?= get_field('partenaire_accroche') ?></p>
            </div>
            <figure class="hero__fig">
                <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'hero__img']); ?>
            </figure>
        </div>
    </section>

    <section class="partenaire__partenaires partenaires">
        <h3 aria-level="3" class="partenaires__principaltitle title">Nos partenaires</h3>
        <div class="partenaires__wrapper flex">
            <?php $partenaire = new WP_Query([
                'post_type' => 'partenaire',
                'posts_per_page' => 100
            ]);
            if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>
                <?php $tax = get_the_terms( get_the_ID() , 'partenariat' );?>
                <?php if($tax[0]->slug === 'partenaire'):?>
                    <div class="partenaires__content">
                        <h4 aria-level="4"  class="hidden"><?= get_field('partenaire_name')?></h4>
                        <figure class="partenaires__fig">
                            <?= get_the_post_thumbnail(null, 'partenaire_thumbnail', ['class' => 'partenaires__img']); ?>
                        </figure>
                    </div>
                <?php endif;?>
            <?php endwhile; else: ?>
                <p class="partenaire__empty">Il n'y a aucune actualité pour le moment.  </p>
            <?php endif; wp_reset_query(); ?>
    </section>
        </div>

    <section class="partenaire__contact background-blue contact flex column">
        <h3 aria-level="3" class="hidden"> Contactez-nous</h3>
        <div class="contact__content flex column">
            <p class="contact__text"><?= get_field('partenaire_contact')?></p>
            <div class="contact__wrapper flex">
                <a href="<?= get_field('partenaire_link')?>" class="contact__link">Contactez-nous !</a>
            </div>
        </div>
    </section>

</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>