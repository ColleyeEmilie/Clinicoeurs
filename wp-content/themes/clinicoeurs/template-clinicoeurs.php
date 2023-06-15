<?php /* Template Name: Clinicoeurs page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main class="clinicoeurs">
        <h2 class="clinicoeurs__title hidden"> Clinicoeurs </h2>
        <section class="clinicoeurs__hero hero">
            <div class="hero__all flex">
                <div class="hero__content">
                    <h3 class="hero__title title">Apporter du <span class="bold">réconfort</span> mais pas que! </h3>
                    <p class="hero__description"><?= get_field('clinicoeurs__description')?> </p>
                </div>
                <figure class="hero__fig">
                    <?= get_the_post_thumbnail(null, 'clinicoeurs_thumbnail', ['class' => 'hero__img']); ?>
                </figure>
            </div>
        </section>
        <section class="clinicoeurs__services services">
            <h3 class="services__principaltitle title">Que <span class="bold rect_green">faisons-nous ?</span></h3>
            <div class="services__all flex">
                <?php $services = new WP_Query([
                    'post_type' => 'services',
                    'posts_per_page' => 100
                ]);
                if($services->have_posts()): while($services->have_posts()): $services->the_post();?>
                    <div class="services__content">
                        <h4 class="services__title bold"><?= get_the_title() ?></h4>
                        <p class="services__text"><?= get_field('services_description') ?></p>
                    </div>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>
        <section class="clinicoeurs__equipe background-blue tri">
            <h3 class="equipe__principaltitle title"> Notre équipe</h3>
            <?php $types = get_terms(['taxonomy' => 'section']); ?>
            <ul class="tri__items flex">
                <?php foreach($types as $type): ?>
                    <li class="tri__item">
                        <a href="<?= get_term_link($type) ?>"><?php echo $type->name; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="flex column">
                <h4>Clinicoeurs</h4>
                <div class="equipe__wrapper equipe__wrapper--clinicoeur flex">
                    <?php $equipe = new WP_Query([
                        'post_type' => 'equipe',
                        'posts_per_page' => 100
                    ]);
                    if($equipe->have_posts()): while($equipe->have_posts()): $equipe->the_post();?>
                        <?php $tax = get_the_terms( get_the_ID() , 'section' );?>
                        <div class="equipe__content">
                            <figure class="equipe__fig">
                                <?= get_the_post_thumbnail(null, 'equipe_thumbnail', ['class' => 'equipe__img']); ?>
                            </figure>
                            <p class="equipe__name"><?= get_field('equipe_name')?></p>
                        </div>
                    <?php endwhile; else: ?>
                        <p class="projects__empty">Il n'y a personne dans l'équipe pour le moment. </p>
                    <?php endif; wp_reset_query(); ?>
                </div>
            </div>
        </section>
        <section class="clinicoeurs__benevoles benevoles">
            <h3 class="benevoles__principaltitle title">Nous recherchons des <span class="bold">bénévoles !</span></h3>
            <div class="benevoles__all flex">
                <?php $profils = new WP_Query([
                    'post_type' => 'benevolat',
                    'posts_per_page' => 100
                ]);
                if($profils->have_posts()): while($profils->have_posts()): $profils->the_post();?>
                <div class="benevoles__wrapper flex column">
                    <div class="benevoles__content">
                        <h4 class="benevoles__fonction title bold"><?= get_field('profil_fonction') ?></h4>
                    </div>
                    <div class="benevoles__content">
                        <h4 class="benevoles__title bold">Description</h4>
                        <p class="benevoles__text"><?= get_field('profil_description') ?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 class="benevoles__title bold">Competence(s) requise(s)</h4>
                        <p class="benevoles__text"><?= get_field('profil_competences')?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 class="benevoles__title bold">Fréquence de disponibilité</h4>
                        <p class="benevoles__text"><?= get_field('services_frequence') ?></p>
                    </div>
                    <div class="benevoles__content">
                        <h4 class="benevoles__title bold">Lieu</h4>
                        <p class="benevoles__text"><?= get_field('profil_lieu') ?></p>
                    </div>
                </div>
                <?php endwhile; else: ?>
                    <p class="projects__empty">Il n'y a pas de services pour le moment. </p>
                <?php endif; wp_reset_query(); ?>
            </div>
        </section>
        <section class="clinicoeurs__benevolat benevolat">
            <h3 class="hidden">Bénévolat</h3>
            <div class="benevolat__wrapper flex">
                <div class="benevolat__content flex column">
                    <h4 class="benevolat__title title"><?= get_field('clinicoeurs_benevole_titre')?></h4>
                    <p class="benevolat__texte"><?= get_field('clinicoeurs_benevole_description')?></p>
                </div>
                <figure class="benevolat__fig">
                    <img src="<?= get_field('benevolat_image_3')?>" alt="" class="benevolat__img">
                </figure>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>