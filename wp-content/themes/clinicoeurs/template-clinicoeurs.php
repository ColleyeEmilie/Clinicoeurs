<?php /* Template Name: Clinicoeurs page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="clinicoeurs">
        <h2 aria-level="2" class="clinicoeurs__title hidden"> Clinicoeurs </h2>
        <section class="clinicoeurs__hero hero">
            <div class="hero__all flex">
                <div class="hero__content">
                    <h3 aria-level="3" class="hero__title title">Apporter du <span class="bold">réconfort</span> mais pas que! </h3>
                    <p class="hero__description"><?= get_field('clinicoeurs__description')?> </p>
                </div>
                <figure class="hero__fig">
                    <?= get_the_post_thumbnail(null, 'clinicoeurs_thumbnail', ['class' => 'hero__img']); ?>
                </figure>
            </div>
        </section>
        <section class="clinicoeurs__services services">
            <h3 aria-level="3" class="services__principaltitle title">Découvrez nos <span class="bold rect rect_green">différents services</span></h3>
            <div class="services__all flex">
                <?php $services = new WP_Query([
                    'post_type' => 'service',
                    'posts_per_page' => 4
                ]);
                if($services->have_posts()): while($services->have_posts()): $services->the_post();?>

                    <a href="<?= get_the_permalink(); ?>" class="services__link">
                        <div class="services__content">
                            <h4 class="services__title bold"><?= get_the_title() ?></h4>
                            <p class="services__text"><?= get_field('services_description') ?></p>
                        </div>
                        <div class="go-corner">
                            <div class="go-arrow">
                                →
                            </div>
                        </div>
                    </a>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>
        <div class="background-blue">
            <section class="clinicoeurs__equipe">
                <div class="background">
                    <h3 aria-level="3" class="equipe__principaltitle title"> Notre équipe</h3>
                    <div class="flex column slide-in">
                        <div class="equipe__wrapper equipe__wrapper--all flex">
                            <?php $equipe = new WP_Query([
                                'post_type' => 'equipe',
                                'posts_per_page' => 100
                            ]);
                            if($equipe->have_posts()): while($equipe->have_posts()): $equipe->the_post();?>
                                <?php require ('parts/equipe.php');?>
                            <?php endwhile; else: ?>
                                <p class="projects__empty">Il n'y a personne dans l'équipe pour le moment. </p>
                            <?php endif; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <section class="clinicoeurs__benevoles benevoles slide-in">
            <h3 aria-level="3" class="benevoles__principaltitle title">Nous recherchons des <span class="bold rect rect_blue">bénévoles !</span></h3>
            <div class="benevoles__all flex">
                <?php $profils = new WP_Query([
                    'post_type' => 'benevolat',
                    'posts_per_page' => 100
                ]);
                if($profils->have_posts()): while($profils->have_posts()): $profils->the_post();?>
                <div class="benevoles__wrapper flex column">
                    <div class="benevoles__content">
                        <h4 aria-level="4" class="benevoles__fonction title bold"><?= get_field('profil_fonction') ?></h4>
                    </div>
                    <div class="benevoles__content">
                        <h4 aria-level="4" class="benevoles__title bold">Description</h4>
                        <p class="benevoles__text"><?= get_field('profil_description') ?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 aria-level="4" class="benevoles__title bold">Competence(s) requise(s)</h4>
                        <p class="benevoles__text"><?= get_field('profil_competences')?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 aria-level="4" class="benevoles__title bold">Fréquence de disponibilité</h4>
                        <p class="benevoles__text"><?= get_field('services_frequence') ?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 aria-level="4" class="benevoles__title bold">Lieu</h4>
                        <p class="benevoles__text"><?= get_field('profil_lieu') ?></p>
                    </div>
                </div>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>
        <section class="clinicoeurs__benevolat benevolat slide-in">
            <div class="benevolat__wrapper flex">
                <div class="benevolat__content flex column">
                    <h3 aria-level="3" class="benevolat__title title"><?= get_field('clinicoeurs_benevole_titre')?></h3>
                    <p class="benevolat__texte"><?= get_field('clinicoeurs_benevole_description')?></p>
                </div>
                <figure class="benevolat__fig">
                    <img src="<?= get_field('clinicoeurs_image')?>" alt="" class="benevolat__img">
                </figure>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>