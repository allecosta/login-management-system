<?php require('include/header.php'); ?>

<div class="container text-center">
    <h1>Sistema de Gerenciamento de Login de Usuario</h1>
</div>

<div class="container">
    <form action="submit.php" method="POST" name="login-form" id="login-form" autocomplete="off">
        <label for="Email" class="sr-only">Email</label>
        <input type="email" name="Email" id="Email" class="form-control" placeholder="Email" required autofocus>

        <label for="Password" class="sr-only">Password</label>
        <input type="password" name="Password" id="Password" class="form-control" placeholder="Password" required pattern=".{6,12}" title="6 a 12 caracteres.">

        <div id="display-error" class="alert alert-danger fade in"></div>

        <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
        <button type="button" class="btn btn-lg btn-info btn-block" data-toggle="modal" data-target="#registration-modal">Crie uma conta</button>
    </form>

    <div class="modal fade" role="dialog" id="registration-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="submit.php" method="POST" name="registration-form" id="registration-form" autocomplete="off">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismmiss="modal">&times;</button>
                        <h4 class="modal-title">Formulario de Registro</h4>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Name">Nome Completo</label>
                            <input type="text" name="Name" id="Name" class="form-content" required pattern=".{2,100}" title="min 2 caracteres." autofocus>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="Email" id="Email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Password">Nova Senha</label>
                            <input type="password" name="Password" id="Password" class="form-control" required pattern=".{6,12}" title="6 a 12 caracteres.">
                        </div>
                        <div id="display-error" class="alert alert-danger fade in"></div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-lg btn-success" value="Submit" id="submit">
                        <button type="button" class="btn btn-lg btn-default" data-dismmiss="">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require('include/footer.php') ?>