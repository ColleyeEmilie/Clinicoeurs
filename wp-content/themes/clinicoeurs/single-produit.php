<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<?php $photos = get_field('categorie_gallery');?>
<main class="catgeory">
    <h2 class="hidden"><?= get_field('categorie_name');?></h2>
    <section class="category__hero hero">
        <h3 class="hero__title title"><?= get_field('categorie_name');?></h3>
        <p class="hero__intro"><?= get_field('categorie_intro');?></p>
    </section>

    <section class="category__gallery gallery">
    <h3 class="gellery__title title">Ce que nous <span>proposons</span>proposons</h3>
    <?php foreach ($photos as $photo):?>
        <figure class="gallery__figure">
            <img srcset="<?= $photo['sizes']['thumbnail']?> 150w, <?= $photo['sizes']['medium']?> 300w,<?= $photo['sizes']['large']?> 600w" sizes="(max-width: 300px) 150px,(max-width: 500px)300px,(max-width: 1200px) 600px" src="<?= $photo['sizes']['thumbnail']?>"  alt="" class="category__img">
        </figure>
    <?php endforeach;?>
    </section

    <section class="category__contact contact">
        <h3 class="hidden"> Contactez-nous</h3>
        <p class="contact__text"><?= get_field('category_contact')?></p>
        <div class="contact__wrapper">
            <a href="<?= get_field('benevolat_link')?>" class="contact__link">Contactez-nous !</a>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>

