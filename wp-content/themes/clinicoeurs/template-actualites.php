<?php /* Template Name: Actualites page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="actualite">
    <h2 class="hidden">Les actualités</h2>
    <section class="actualite__actualites actualites">
        <div class="actualites__regroup flex">
            <h3 class="actualites__principaltitle title">Nos dernières <span class="bold rect rect_green">actualités </span></h3>
        </div>
        <div class="actualites__all">
            <?php $actualite = new WP_Query([
                'post_type' => 'actualite',
                'posts_per_page' => 3
            ]);
            if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                <a href="<?= get_the_permalink();?>" class="actualites__link">
                    <article class="actualites__content flex">
                        <h4 class="actualites__title"><?= get_the_title()?></h4>
                        <figure class="actualites__fig">
                            <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'actualites__img']); ?>
                        </figure>
                    </article>
                </a>
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a aucune actualité pour pour le moment.  </p>
            <?php endif; wp_reset_query(); ?>
        </div>
    </section>
     <section class="actualite__tri tri">
        <h3 class="tri__principaltitle title "> Rechercher un article par <span class="bold rect rect_yellow">catégorie </span></h3>
         <?php $types = get_terms(['taxonomy' => 'type']); ?>
         <ul class="tri__items flex">
             <li class="tri__item">
                 <a class="bold" href="#">Tous les articles</a>
             </li>
             <?php foreach($types as $type): ?>
                 <li class="tri__item">
                     <a href="<?= get_term_link($type) ?>"><?php echo $type->name; ?></a>
                 </li>
             <?php endforeach; ?>
         </ul>
         <div class="tri__wrapper flex">
             <h4 class="hidden">Toutes les actualites</h4>
             <?php $actualite = new WP_Query([
                 'post_type' => 'actualite',
                 'posts_per_page' => 100
             ]);
             if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                 <a href="<?= get_the_permalink();?>" class="tri__link">
                 <article class="tri__content content flex">
                         <h5 class="tri__title"><?= get_the_title()?></h5>
                         <figure class="tri__fig">
                             <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'tri__img']); ?>
                         </figure>
                 </article>
                 </a>
             <?php endwhile; else: ?>
                 <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
             <?php endif; wp_reset_query(); ?>
         </div>
         <div class="tri__wrapper hidden flex">
             <h4 class="hidden">Tous les articles liés à la boutique </h4>
             <?php $actualite = new WP_Query([
                 'post_type' => 'actualite',
                 'posts_per_page' => 100
             ]);
             if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                 <?php $tax = get_the_terms( get_the_ID() , 'type' );?>
                 <?php if($tax[0]->slug === 'boutique'):?>
                     <a href="<?= get_the_permalink();?>" class="tri__link">
                         <article class="tri__content content flex">
                             <h5 class="tri__title"><?= get_the_title()?></h5>
                             <figure class="tri__fig">
                                 <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'tri__img']); ?>
                             </figure>
                         </article>
                     </a>
                 <?php endif; ?>
             <?php endwhile; else: ?>
                 <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
             <?php endif; wp_reset_query(); ?>
         </div>
         <div class="tri__wrapper hidden flex">
             <h4 class="hidden">Tous les articles liés aux cliniclowns </h4>
             <?php $actualite = new WP_Query([
                 'post_type' => 'actualite',
                 'posts_per_page' => 100
             ]);
             if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                 <?php $tax = get_the_terms( get_the_ID() , 'type' );?>
                 <?php if($tax[0]->slug === 'cliniclowns'):?>
                     <a href="<?= get_the_permalink();?>" class="tri__link">
                         <article class="tri__content content flex">
                             <h5 class="tri__title"><?= get_the_title()?></h5>
                             <figure class="tri__fig">
                                 <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'tri__img']); ?>
                             </figure>
                         </article>
                     </a>
                 <?php endif; ?>
             <?php endwhile; else: ?>
                 <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
             <?php endif; wp_reset_query(); ?>
         </div>
         <div class="tri__wrapper hidden flex">
             <h4 class="hidden">Tous les articles liés aux clinijuniors </h4>
             <?php $actualite = new WP_Query([
                 'post_type' => 'actualite',
                 'posts_per_page' => 100
             ]);
             if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                 <?php $tax = get_the_terms( get_the_ID() , 'type' );?>
                 <?php if($tax[0]->slug === 'clinijuniors'):?>
                     <a href="<?= get_the_permalink();?>" class="tri__link">
                         <article class="tri__content content flex">
                             <h5 class="tri__title"><?= get_the_title()?></h5>
                             <figure class="tri__fig">
                                 <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'tri__img']); ?>
                             </figure>
                         </article>
                     </a>
                 <?php endif; ?>
             <?php endwhile; else: ?>
                 <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
             <?php endif; wp_reset_query(); ?>
         </div>
         <div class="tri__wrapper hidden flex">
             <h4 class="hidden">Tous les articles liés aux clinisnoezs </h4>
             <?php $actualite = new WP_Query([
                 'post_type' => 'actualite',
                 'posts_per_page' => 100
             ]);
             if($actualite->have_posts()): while($actualite->have_posts()): $actualite->the_post();?>
                 <?php $tax = get_the_terms( get_the_ID() , 'type' );?>
                 <?php if($tax[0]->slug === 'clinisnoezs'):?>
                     <a href="<?= get_the_permalink();?>" class="tri__link">
                         <article class="tri__content content flex">
                             <h5 class="tri__title"><?= get_the_title()?></h5>
                             <figure class="tri__fig">
                                 <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'tri__img']); ?>
                             </figure>
                         </article>
                     </a>
                 <?php endif; ?>
             <?php endwhile; else: ?>
                 <p class="actualite__empty">Il n'y a aucune actualité pour le moment.  </p>
             <?php endif; wp_reset_query(); ?>
         </div>

     </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>