<div class="equipe__content">
    <figure class="equipe__fig">
        <?= get_the_post_thumbnail(null, 'equipe_thumbnail', ['class' => 'equipe__img']); ?>
    </figure>
    <p class="equipe__name"><?= get_field('equipe_name')?></p>
</div>