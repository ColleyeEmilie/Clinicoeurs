<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="index">
    <section class="index__hero hero">
        <div class="hero__content">
            <div class="hero__regroup">
                <h2 class="hero__title title"><?= get_field('accueil_titre')?> </h2>
                <p class="hero__description"><?= get_field('accueil_description')?></p>
            </div>
            <figure class="hero__fig">

            </figure>
        </div>
    </section>
    <section class="index__services services">
        <?php $services = new WP_Query([
        'post_type' => 'services',
        'posts_per_page' => 4
        ]);
        if($services->have_posts()): while($services->have_posts()): $services->the_post();?>

        <!-- HTML -->
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="index__vendre vendre">
        <p>A faire</p>
    </section>

    <section class="index__soutiens soutiens">
        <?php $soutien = new WP_Query([
            'post_type' => 'soutien',
            'posts_per_page' => 4
        ]);
        if($soutien->have_posts()): while($soutien->have_posts()): $soutien->the_post();?>

            <!-- HTML -->
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune façon de nous soutenir pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="index__actualites actualites">
        <?php $actualite = new WP_Query([
            'post_type' => 'actualite',
            'posts_per_page' => 4
        ]);
        if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>

            <!-- HTML -->
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune actualité pour pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>


    <section class="index__avis avis">
        <?php $avis = new WP_Query([
            'post_type' => 'avis',
            'posts_per_page' => 10
        ]);
        if($avis->have_posts()): while($avis->have_posts()): $avis->the_post();?>

            <!-- HTML -->
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucun avis pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="index__partenaires partenaires">
        <?php $partenaire = new WP_Query([
            'post_type' => 'partenaire',
            'posts_per_page' => 20
        ]);
        if($partenaire->have_posts()): while($partenaire->have_posts()): $partenaire->the_post();?>

            <!-- HTML -->
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a pas de partenaires pour le moment.</p>
        <?php endif; wp_reset_query(); ?>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>