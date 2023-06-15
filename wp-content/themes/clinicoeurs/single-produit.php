<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<?php $photos = get_field('categorie_gallery');?>
<main class="catgeory">
    <h2 class="hidden"><?= get_field('categorie_name');?></h2>
    <section class="category__hero hero flex">
        <div class="hero__content">
            <h3 class="hero__principaltitle title"><?= get_field('categorie_name');?></h3>
            <p class="hero__intro"><?= get_field('categorie_intro');?></p>
        </div>
        <figure class="hero__fig">
            <?= get_the_post_thumbnail(null, 'clinicoeurs_thumbnail', ['class' => 'hero__img']); ?>
        </figure>
    </section>

    <section class="category__gallery gallery">
    <h3 class="gallery__principaltitle title">Ce que nous <span>proposons</span></h3>
        <div class="gallery__wrapper flex">
            <?php foreach ($photos as $photo):?>
                <figure class="gallery__fig">
                    <img srcset="<?= $photo['sizes']['thumbnail']?> 150w, <?= $photo['sizes']['medium']?> 300w,<?= $photo['sizes']['large']?> 600w" sizes="(max-width: 300px) 150px,(max-width: 500px)300px,(max-width: 1200px) 600px" src="<?= $photo['sizes']['thumbnail']?>"  alt="" class="gallery__img">
                </figure>
            <?php endforeach;?>
        </div>
    </section>

    <section class="category__contact background-blue contact flex column">
        <h3 class="hidden"> Contactez-nous</h3>
        <div class="contact__content flex column">
            <p class="contact__text"><?= get_field('categorie_contact')?></p>
            <div class="contact__wrapper flex">
                <a href="<?= get_field('soutiens_link')?>" class="contact__link">Contactez-nous !</a>
            </div>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>

