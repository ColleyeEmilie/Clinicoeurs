<?php /* Template Name: Partenaire page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="partenaire">
    <h2 class="hidden">Nos partenaires</h2>
    <section class="partenaire__hero hero"></section>

    <section class="partenaire__partenaires partenaires">
    <?php $partenaire = new WP_Query([
        'post_type' => 'partenaire',
        'posts_per_page' => 100
    ]);
    if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>
        <?php var_dump(($partenaire));die();?>

    <?php endwhile; else: ?>
        <p class="partenaire__empty">Il n'y a aucune actualité pour le moment.  </p>
    <?php endif; wp_reset_query(); ?>
        </section>

    <section class="partenaire__collaborateurs collaborateurs">
        <?php $partenaire = new WP_Query([
            'post_type' => 'partenaire',
            'posts_per_page' => 100
        ]);
        if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>

        <?php endwhile; else: ?>
            <p class="partenaire__empty">Il n'y a aucune actualité pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="partenaire__sponsors sponsors">
        <?php $partenaire = new WP_Query([
            'post_type' => 'partenaire',
            'posts_per_page' => 100
        ]);
        if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>

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