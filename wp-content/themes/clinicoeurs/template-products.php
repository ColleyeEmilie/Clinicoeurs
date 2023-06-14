<?php /* Template Name: Products page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="products">
    <h2 class="hidden">Nos produits</h2>
    <section class="products__hero hero">
        <div class="hero__content">
            <div>
                <h3 class="hidden"><?= get_field('product_title')?></h3>
                <p class="hero__intro"><?= get_field('product_introduction')?></p>
            </div>
            <div>
                <h3 class="hidden"><?= get_field('product_title_1')?></h3>
                <p class="hero__intro"><?= get_field('product_intro_2')?></p>
            </div>
        </div>
        <figure>
            <!-- thumbnail -->
        </figure>
    </section>

    <section class="products__items items">
        <h3 class="hidden"><?= get_field('product_title_2')?></h3>
        <?php $produits = new WP_Query([
            'post_type' => 'produit',
            'posts_per_page' => 100
        ]);
        if($produits->have_posts()): while($produits->have_posts()): $produits->the_post();?>
        <div>
            <h4 class="items__title title"><?= get_field('categorie_name')?></h4>
            <figure>
                <!-- thumbnail -->
            </figure>
        </div>
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
    </section>

    <section class="products__boutique boutique">
        <h3 class="boutique__title title"><?= get_field('product_title_3')?></h3>
        <div>
            <figure>
                <img src="" alt="">
            </figure>
            <div>
                <p class="boutique__text"><?= get_field('product_boutique')?></p>
            </div>
        </div>
    </section>

    <section class="product__contact contact">
        <h3 class="hidden"> Contactez-nous</h3>
        <p class="contact__text"><?= get_field('product_contact')?></p>
        <div class="contact__wrapper">
            <a href="<?= get_field('benevolat_link')?>" class="contact__link">Contactez-nous !</a>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>