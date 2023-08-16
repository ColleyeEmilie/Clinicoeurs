<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>

<main class="layout__contact">
    <section aria-labelledby="contact" class="contact flex">
        <h2 class="contact__title title hidden" aria-level="2"><?= get_the_title(); ?></h2>
        <div class="asbl__contact flex">
            <h3 class="asbl__title title" aria-level="3">Contactez-nous !</h3>
            <div id="contact" class="contact__asbl flex">
                <section aria-labelledby="coordinate" class="coordinates" itemscope itemtype="https://schema.org/Person">
                    <h4 id="coordinate" class="coordinates__title hidden" aria-level="4"><?= 'Nos coordonnées' ?></h4>
                    <div class="coordinates__content">
                        <section aria-labelledby="mail" class="coordinates__mail">
                            <h5 id="mail" class="coordinates__title bold title" aria-level="5"><?= 'Mail' ?></h5>
                            <p class="coordinates__mail mail" ><a href="mailto:<?= get_field('contact_email')?>" itemprop="email"><?= get_field('contact_email')?></a></p>
                        </section>
                        <section aria-labelledby="telephone" class="coordinates__phone">
                            <h5 id="telephone" class="coordinates__title bold title" aria-level="5"><?= 'Téléphone' ?></h5>
                            <p class="coordinates__mail phone" itemprop="telephone"><?= get_field('contact_telephone')?></p>
                        </section>
                    </div>
                </section>
                <section aria-labelledby="contact" class="contact__content">
                    <h3 id="contact" class="contact__title hidden" aria-level="3">Contactez-moi</h3>
                    <div class="page__form">
                        <?php
                        $feedback = clinicoeurs_session_get('clinicoeurs_contact_form_feedback') ?? false;
                        $errors = clinicoeurs_session_get('clinicoeurs_contact_form_errors') ?? [];
                        ?>
                        <?php if($feedback): ?>
                            <div class="success">
                                <p>Merci&nbsp;! Votre message a bien été envoyé.</p>
                            </div>
                        <?php endif; ?>
                            <?php if($errors): ?>
                                <div class="error">
                                    <p>Attention&nbsp;! Merci de corriger les erreurs du formulaire.</p>
                                </div>
                            <?php endif; ?>

                            <form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="contact__form">
                                <fieldset class="contact__info">
                                    <div class="contact__name">
                                        <div class="contact__field">
                                            <label for="firstname" class="field__label">Prénom</label>
                                            <input type="text" name="firstname" id="firstname" class="field__input" />
                                            <?php if($errors['firstname'] ?? null): ?>
                                                <p class="field__error" style="color:red"><?= $errors['firstname']; ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="contact__field">
                                            <label for="lastname" class="field__label">Nom</label>
                                            <input type="text" name="lastname" id="lastname" class="field__input" />
                                            <?php if($errors['lastname'] ?? null): ?>
                                                <p class="field__error" style="color:red"><?= $errors['lastname']; ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="contact__field">
                                        <label for="email" class="field__label">Email</label>
                                        <input type="email" name="email" id="email" class="field__input" />
                                        <?php if($errors['email'] ?? null): ?>
                                            <p class="field__error" style="color:red"><?= $errors['email']; ?></p>
                                        <?php endif; ?>
                                    </div>

                                    <div class="contact__field">
                                        <label for="subject" class="field__label">Sujet</label>
                                        <select name="subject" id="subject" class="form__select">
                                                <option class="form__option" value="devenir_partenaire">Devenir partenaire</option>
                                                <option class="form__option" value="benevolat">Benevolat</option>
                                                <option class="form__option" value="soutenir">Soutenir l'ASBL</option>
                                                <option class="form__option" value="commande">Passer une commande dans la boutique</option>
                                                <option class="form__option" value="infos">Demande d'informations</option>
                                            <option class="form__option" value="autres">Autre</option>
                                        </select>
                                    </div>

                                    <div class="contact__field">
                                        <label for="message" class="field__label">Message</label>
                                        <textarea name="message" id="message" cols="30" rows="10" class="field__textarea"></textarea>
                                        <?php if($errors['message'] ?? null): ?>
                                            <p class="field__error" style="color:red"><?= $errors['message']; ?></p>
                                        <?php endif; ?>
                                    </div>
                                </fieldset>
                                <div class="contact__footer">
                                    <input type="hidden" name="action" value="clinicoeurs_contact_form" />
                                    <input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('clinicoeurs_contact_form'); ?>" />
                                    <button class="contact__submit" type="submit">Envoyer</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
        <div class="contact__boutique boutique flex">
            <h3 class="asbl__title title" aria-level="3">Notre boutique</h3>
            <div class="boutique__content">
                <div class="boutique__map">
                    <figure class="boutique__fig">
                        <?= get_the_post_thumbnail(null, 'latest_thumbnail', ['class' => 'boutique__img']); ?>
                    </figure>
                </div>
                <div class="coordinates__infos">
                    <section aria-labelledby="mail" class="coordinates__mail">
                        <h4 id="mail" class="coordinates__title bold title" aria-level="4"><?= 'Mail' ?></h4>
                        <p class="coordinates__mail mail" ><a href="mailto:<?= get_field('contact_email')?>" itemprop="email"><?= get_field('contact_email')?></a></p>
                    </section>
                    <section aria-labelledby="telephone" class="coordinates__phone">
                        <h4 id="telephone" class="coordinates__title bold title" aria-level="4"><?= 'Téléphone' ?></h4>
                        <p class="coordinates__mail phone" itemprop="telephone"><?= get_field('contact_telephone')?></p>
                    </section>
                    <section aria-labelledby="address" class="coordinates__address" itemscope itemtype="https://schema.org/PostalAddress">
                        <h4 id="address" class="coordinates__title bold title" aria-level="4"><?= 'Adresse' ?></h4>
                        <p itemprop="streetAddress" class="coordinates__adress"><?= get_field('contact_adresse')?></p>
                    </section>
                    <section class="coordinates__horaire" >
                        <h4 id="horaire" class="coordinates__title bold title" aria-level="4">Horaire d'ouverture</h4>
                        <p  class="coordinates__horaire"><?= get_field('contact_horaire')?></p>
                    </section>
                </div>
            </div>
        </div>
    </section>
</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>