<?php /* Template Name: Products page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="products">
    <h2 aria-level="2" class="hidden">Nos produits</h2>
    <section class="products__hero hero">
        <div class="hero__all flex">
            <div class="hero__content">
                <div class="hero__part1">
                    <h3 aria-level="3" class="hero__title title"><?= get_field('product_title')?></h3>
                    <p class="hero__intro"><?= get_field('product_introduction')?></p>
                </div>
                <div class="hero__part2">
                    <h3 aria-level="3" class="hero__principaltitle"><?= get_field('product_title_1')?></h3>
                    <p class="hero__intro"><?= get_field('product_intro_2')?></p>
                </div>
            </div>
            <figure class="hero__fig">
                <?= get_the_post_thumbnail(null, 'clinicoeurs_thumbnail', ['class' => 'hero__img']); ?>
            </figure>
        </div>
    </section>

    <section class="products__vendre vendre">
        <div class="vendre__regroup flex">
            <h3 aria-level="3" class="vendre__principaltitle title">Découvrez ce que nous <span class="bold rect rect_yellow">vendons</span></h3>
        </div>
        <?php $produit = new WP_Query([
            'post_type' => 'produit',
            'posts_per_page' => 100
        ]);
        if($produit->have_posts()): while($produit->have_posts()): $produit->the_post();?>
            <div>
                <a href="<?= get_the_permalink();?>" class="vendre__link flex">
                    <article class="vendre__content ">
                        <h4 aria-level="4" class="vendre__title flex"><?= get_the_title()?></h4>
                        <figure class="vendre__fig">
                            <?= get_the_post_thumbnail(null, 'products_thumbnail', ['class' => 'vendre__img']); ?>
                        </figure>
                    </article>
                </a>
            </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune façon de nous soutenir pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="products__boutique boutique">
        <h3 aria-level="3" class="boutique__principaltitle title"><?= get_field('product_title_3')?></h3>
        <div class="boutique__content flex">
            <figure class="boutique__fig">
                <img src="<?= get_field('product_map')?>" alt="Image google maps de l'endroit où se trouve la boutique" class="boutique__img">
            </figure>
            <div class="boutique__p flex">
                <p class="boutique__text"><?= get_field('product_boutique')?></p>
            </div>
        </div>
    </section>

    <section class="products__contact background-blue contact flex column">
        <h3 aria-level="3" class="hidden"> Contactez-nous</h3>
        <div class="contact__content flex column">
            <p class="contact__text"><?= get_field('product_contact')?></p>
            <div class="contact__wrapper flex">
                <a href="<?= get_field('partenaire_link')?>" class="contact__link">Contactez-nous !</a>
            </div>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>