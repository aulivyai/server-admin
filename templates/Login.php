<body class="center">
    <div class="container">

        <form class="form-signin" method="POST">
            <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
            <?php
            if (!empty($errors["global"])) {
            ?>
                <div class="text-danger">
                    <?= $errors["global"] ?>
                </div>
            <?php
            }
            ?>
            <label for="inputUsername" class="sr-only">Username</label>
            <input type="text" id="inputUsername" name="inputUsername" class="form-control <?= (!empty($errors["username"]) ? " is-invalid" : "") ?>" placeholder="Username" required autofocus>
            <div class="invalid-feedback">

                <?php foreach ($errors["username"] as $error) { ?>
                    <div><?= $error ?></div>
                <?php } ?>
            </div>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control <?= (!empty($errors["password"]) ? " is-invalid" : "") ?>" placeholder="Password" required>
            <div class="invalid-feedback">

                <?php foreach ($errors["password"] as $error) { ?>
                    <div><?= $error ?></div>
                <?php } ?>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
        </form>


    </div>
</body>