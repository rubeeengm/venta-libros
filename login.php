<?php require_once 'template/header.php'; ?>

<div class="container mt-5 pt-5">
    <div class="row justify-content-center">
        <div class="col col-md-4">
            <form method="post" action="controladores/UsuarioController.php">
                <div class="form-group">
                    <p class="h4 mb-4">Inicio de Sesión</p>
                    <input type="text" id="loginUsuario" name="loginUsuario" class="form-control mb-4" placeholder="Usuario">
                </div>

                <div class="form-group">
                    <input type="password" id="loginPassword" name="loginPassword" class="form-control mb-4" placeholder="Password">
                </div>

                <button class="btn btn-info btn-block my-4" type="submit">Iniciar Sesión</button>

                <p> ¿Aún no te encuentras registrado?
                    <a href="registro.php">Regístrate</a>
                </p>

                <?php
                    if(isset($_SESSION['error'])) {
                        if(isset($_SESSION['error']) != null) {
                            echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error'] . '</div>';
                            $_SESSION['error'] = null;
                        }
                    }
                ?>
            </form>
        </div>
    </div>
</div>

<?php require_once 'template/footer.php'; ?>