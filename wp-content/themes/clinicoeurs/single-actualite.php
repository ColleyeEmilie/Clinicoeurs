<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="singleActualite">
        <section class="singleActualite__actualite actualite">
            <h3 class="actualite__title"><?= get_field('');?></h3>
            <div class="actualite__wrapper">
                <figure class="actualite__fig">
                    <img src="<?= get_field('article_image');?>" alt="" class="actualite__img">
                </figure>
                <div class="actualite__content">
                    <p class="actualite__texte">
                        <?= get_field('article_description');?>
                    </p>
                    <p class="actualite__date">
                        <?= get_field('article_date');?>
                    </p>
                </div>
            </div>
        </section>

        <section class="singleActualite__like like">
            <h3 class="like__title">Vous pourriez aussi <span>aimer</span></h3>
            <div class="like__wrapper">
                <?php $actualite = new WP_Query([
                    'post_type' => 'actualite',
                    'posts_per_page' => 3
                ]);
                if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                    <a href="<?= get_the_permalink();?>" class="tri__link">
                        <article class="like__content content">
                            <h4 class="content__title"><?= get_the_title()?></h4>
                            <figure class="content__fig">
                                <img src="<?= get_field('article_image')?>" alt="" class="content__img">
                            </figure>
                        </article>
                    </a>
                <?php endwhile; else: ?>
                    <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
