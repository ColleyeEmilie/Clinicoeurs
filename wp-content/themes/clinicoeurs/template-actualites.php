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

            <!-- HTML -->
        <?php endwhile; else: ?>
            <p class="projects__empty">Il n'y a aucune actualité pour pour le moment.  </p>
        <?php endif; wp_reset_query(); ?>
    </section>
     <section class="actualite__tri">

     </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>