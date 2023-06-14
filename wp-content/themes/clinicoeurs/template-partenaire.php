<?php /* Template Name: Partenaire page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="partenaire">
    <h2 class="hidden">Nos partenaires</h2>
    <section class="partenaire__hero hero">
        <h3 class="hero__title title"><?= get_field('partenaire_titre') ?></h3>
        <p class="hero__text"><?= get_field('partenaire_accroche') ?></p>
    </section>

    <section class="partenaire__partenaires partenaires">
        <h3 class="partenaires__title title">Nos partenaires</h3>
    <?php $partenaire = new WP_Query([
        'post_type' => 'partenaire',
        'posts_per_page' => 100
    ]);
    if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>
        <?php $tax = get_the_terms( get_the_ID() , 'partenariat' );?>
       <?php if($tax[0]->slug === 'partenaire'):?>
        <div class="partenaires__content">
            <h4 class="hidden"><?= get_field('partenaire_name')?></h4>
            <figure class="partenaires__fig">
                <?= get_the_post_thumbnail(null, 'partenaire_thumbnail', ['class' => 'partenaires__img']); ?>
            </figure>
            <p class="partenaires_name"><?= get_field('partenaire_name')?></p>
        </div>
        <?php endif;?>
    <?php endwhile; else: ?>
        <p class="partenaire__empty">Il n'y a aucune actualité pour le moment.  </p>
    <?php endif; wp_reset_query(); ?>
        </section>

    <section class="partenaire__collaborateurs collaborateurs">
        <h3 class="partenaires__title title">Nos collaborateurs</h3>
        <?php $partenaire = new WP_Query([
            'post_type' => 'partenaire',
            'posts_per_page' => 100
        ]);
        if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>
            <?php $tax = get_the_terms( get_the_ID() , 'partenariat' ); ?>
            <?php if($tax[0]->slug === 'collaborateurs'):?>
                <div class="collaborateurs__content">
                    <h4 class="hidden"><?= get_field('partenaire_name')?></h4>
                    <figure class="collaborateurs__fig">
                        <?= get_the_post_thumbnail(null, 'partenaire_thumbnail', ['class' => 'partenaires__img']); ?>
                    </figure>
                    <p class="collaborateurs_name"><?= get_field('partenaire_name')?></p>
                </div>
            <?php endif;?>
        <?php endwhile; else: ?>
            <p class="partenaire__empty">Il n'y a aucune actualité pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="partenaire__sponsors sponsors">
        <h3 class="partenaires__title title">Nos sponsors</h3>
        <?php $partenaire = new WP_Query([
            'post_type' => 'partenaire',
            'posts_per_page' => 100
        ]);
        if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>
            <?php $tax = get_the_terms( get_the_ID() , 'partenariat' ); ?>
            <?php if($tax[0]->slug === 'sponsors'):?>
                <div class="sponsors__content">
                    <h4 class="hidden"><?= get_field('partenaire_name')?></h4>
                    <figure class="sponsors__fig">
                        <?= get_the_post_thumbnail(null, 'partenaire_thumbnail', ['class' => 'partenaires__img']); ?>
                    </figure>
                    <p class="sponsors_name"><?= get_field('partenaire_name')?></p>
                </div>
            <?php endif;?>
        <?php endwhile; else: ?>
            <p class="partenaire__empty">Il n'y a aucune actualité pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="partenaire__contact contact">
        <h3 class="hidden">Contactez-nous</h3>
        <p class="contact__text"><?= get_field('partenaire_contact');?></p>
        <a href="<?= get_field('partenaire_link');?>" class="contact__link">Contactez-nous !</a>
    </section>

</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>