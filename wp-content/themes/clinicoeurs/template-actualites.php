<?php /* Template Name: Actualites page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="actualite">
    <h2 class="hidden">Les actualités</h2>
    <section class="actualite__latest latest">
        <h3 class="latest__title title">Nos dernières <span>actualités</span></h3>
        <?php $actualite = new WP_Query([
            'post_type' => 'actualite',
            'posts_per_page' => 3
        ]);
        if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
            <a href="<?= get_the_permalink();?>" class="latest__link">
                <article class="latest__content ">
                    <h4 class="latest__title"><?= get_the_title()?></h4>
                    <figure class="latest__fig">
                        <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'latest__img']); ?>
                    </figure>
                </article>
            </a>
        <?php endwhile; else: ?>
            <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>

     <section class="actualite__tri tri">
        <h3 class="tri__title title "> Rechercher un article par <span>catégorie </span></h3>
         <?php $types = get_terms(['taxonomy' => 'type']); ?>
         <ul class="tri__items">
            <?php foreach($types as $type): ?>
                <li class="tri__item">
                    <a href="<?= get_term_link($type) ?>"><?php echo $type->name; ?></a>
                </li>
            <?php endforeach; ?>
         </ul>
         <div class="tri__wrapper">
             <?php $actualite = new WP_Query([
                 'post_type' => 'actualite',
                 'posts_per_page' => 100
             ]);
             if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                 <a href="<?= get_the_permalink();?>" class="tri__link">
                 <article class="tri__content content">
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