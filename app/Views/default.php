<!doctype html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <title>Prueba Técnica - Talana</title>
    </head>
    <body>
        <header>
            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                <h1 class="display-4 fw-normal text-body-emphasis">Usuarios</h1>
                <p class="fs-5 text-body-secondary">Listado de usuarios del sistema</p>
            </div>
        </header>
        <main>
            <div class="row row-cols-1 row-cols-md-1 mb-1 text-center">
                <?= $this->renderSection('content') ?>
            </div>
        </main>
    </body>
</html>