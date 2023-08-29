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
            <h3 aria-level="3" class="vendre__principaltitle title">Découvrez ce que nous <span class="bold rect rect_yellow">créons</span></h3>
        </div>
        <div class="vendre__produits flex">
        <?php $produit = new WP_Query([
            'post_type' => 'produit',
            'posts_per_page' => 100
        ]);
        if($produit->have_posts()): while($produit->have_posts()): $produit->the_post();?>
                <a href="<?= get_the_permalink();?>" class="vendre__link flex">
                    <article class="vendre__content ">
                        <h4 aria-level="4" class="vendre__title flex"><?= get_the_title()?></h4>
                        <figure class="vendre__fig">
                            <?= get_the_post_thumbnail(null, 'products_thumbnail', ['class' => 'vendre__img']); ?>
                        </figure>
                    </article>
                </a>
        <?php endwhile; else: ?>

            <p class="projects__empty">Il n'y a aucune façon de nous soutenir pour le moment. </p>
        <?php endif; wp_reset_query(); ?>
        </div>
    </section>

    <section class="products__boutique boutique">

        <h3 aria-level="3" class="boutique__principaltitle title"><?= get_field('product_title_3')?></h3>
        <div class="boutique__content flex">
            <figure class="boutique__fig">
                <iframe class="boutique__img" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8712.004354331506!2d5.911246374170045!3d50.28204048166401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c06e00630e4e9f%3A0x16a7d26408d234c!2sPl.%20de%20Salm%202%2C%206690%20Vielsalm!5e0!3m2!1sfr!2sbe!4v1693323711128!5m2!1sfr!2sbe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </figure>
            <div class="boutique__p flex">
                <p class="boutique__text"><?= get_field('product_boutique')?></p>
                <p class="boutique__text2"><?= get_field('product_fb')?></p>
                <a href="<?= get_field('product_link')?>" class="boutique__link">
                    <div class="boutique__facebook">
                    <p>Notre page Facebook</p>
                    </div>
                </a>
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