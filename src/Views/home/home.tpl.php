<section class="d-flex flex-column justify-content-between h-100 p-5">
    <?php if ($error) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $error ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <h1 class="text-light text-center">Learnybox - Weather</h1>
    <p class="text-center">Veuillez remplir l'un des trois fromulaire suivant</p>
    <section id="forms" class="d-flex justify-content-around align-items-center mt-5">
        <?php require_once __DIR__ . '/../partials/all-forms.tpl.php'; ?>
    </section>
</section>