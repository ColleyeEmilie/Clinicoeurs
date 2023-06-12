<?php /* Template Name: Actualites page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="actualite">
    <section class="actualite__latest latest">
        <?php $actualite = new WP_Query([
            'post_type' => 'actualite',
            'posts_per_page' => 3
        ]);
        if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
            <article class="latest__content content">
                <a href="<?= get_the_permalink();?>" class="content__link">
                    <h4 class="content__title"><?= get_the_title()?></h4>
                    <figure class="content__fig">
                        <img src="<?= get_field('article_image')?>" alt="" class="content__img">
                    </figure>
                </a>
            </article>
        <?php endwhile; else: ?>
            <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>
     <section class="actualite__tri tri">
        <h3></h3>
         <?php $types = get_terms(['taxonomy' => 'type']); ?>
         <ul class="tri__items">
            <?php foreach($types as $type): ?>
                <li class="tri__item">
                    <a href="<?= get_term_link($type) ?>"><?php echo $type->name; ?></a>
                </li>
            <?php endforeach; ?>
         </ul>
    <?php $actualite = new WP_Query([
        'post_type' => 'actualite',
        'posts_per_page' => 100
    ]);
    if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
         <article class="tri__content content">
             <a href="<?= get_the_permalink();?>" class="content__link">
                 <h4 class="content__title"><?= get_the_title()?></h4>
                 <figure class="content__fig">
                     <img src="<?= get_field('article_image')?>" alt="" class="content__img">
                 </figure>
             </a>
         </article>
    <?php endwhile; else: ?>
        <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
    <?php endif; wp_reset_query(); ?>
     </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>