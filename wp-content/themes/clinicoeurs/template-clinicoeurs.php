<?php /* Template Name: Clinicoeurs page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="clinicoeurs">
        <h2 class="clinicoeurs__title hidden"> Clinicoeurs </h2>
        <section class="clinicoeurs__hero hero">
            <div class="hero__content">
                <h3 class="hero__title title"><?= get_field('clinicoeurs_titre')?> </h3>
                <p class="hero__description"><?= get_field('clinicoeurs_description')?> </p>
            </div>
           <figure class="hero__fig">
                <img src="" alt="" class="hero__img">
            </figure>
        </section>

        <section class="clinicoeurs__services services">
            <h3 class="services__title title">Nos services</h3>
            <?php $services = new WP_Query([
                'post_type' => 'services',
                'posts_per_page' => 4
            ]);
            if($services->have_posts()): while($services->have_posts()): $services->the_post();?>

                <!-- HTML -->
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
            <?php endif; wp_reset_query(); ?>
        </section>

        <section class="clinicoeurs__equipe equipe">
            <h3 class="equipe__title title"> Notre équipe</h3>
            <?php $equipe = new WP_Query([
                'post_type' => 'equipe',
                'posts_per_page' => 4
            ]);
            if($equipe->have_posts()): while($equipe->have_posts()): $equipe->the_post();?>
                <figure class="project__fig">
                    <img src="<?= get_field('_')?>" alt="" class="project__img">
                </figure>

                <p class="equipe__name"><?= get_field('equipe_name')?></p>
            <?php endwhile; else: ?>
                <p class="projects__empty">Il n'y a personne dans l'équipe pour le moment. </p>
            <?php endif; wp_reset_query(); ?>
        </section>

        <section class="clinicoeurs__benevoles benevoles">
            <h3 class="benevoles__title title">Nous recherchons des bénévoles !</h3>
            <div></div>
            <div>
                <h4 class=""></h4>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>