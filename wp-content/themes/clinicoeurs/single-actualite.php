<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="singleActualite">
        <section class="singleActualite__actualite actualite">
            <h3 class="actualite__principaltitle"><?= get_the_title();?></h3>
            <div class="actualite__wrapper flex">
                <figure class="actualite__fig">
                    <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'actualite__img']); ?>
                </figure>
                <div class="actualite__content flex column">
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
            <div class="like__regroup flex">
                <h3 class="like__principaltitle title">Vous pourriez aussi <span class="bold rect rect_yellow">aimer</span></h3>
            </div>
            <div class="like__all flex">
                <?php $actualite = new WP_Query([
                    'post_type' => 'actualite',
                    'posts_per_page' => 3
                ]);
                if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                    <a href="<?= get_the_permalink();?>" class="like__link">
                        <article class="like__content content flex">
                            <h4 class="like__title"><?= get_the_title()?></h4>
                            <figure class="like__fig">
                                <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'like__img']); ?>
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
