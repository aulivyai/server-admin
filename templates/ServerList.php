<body>
    <div class="container">
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <form method="POST">
                    <button class="btn btn-link" name="disconnect" id="disconnect">Disconnect</button>
                </form>
            </li>
        </ul>
        <h2>Server List</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Server</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($servers as $server) { ?>
                        <tr>
                            <td><?= $server->getId() ?></td>
                            <td><?= $server->getName() ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" id="id<?= $server->getId() ?>" name="id" value="<?= $server->getId() ?>" />
                                    <button class="btn btn-link" name="remove" type="submit">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form id="newserver" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="New server name" aria-label="New server name" aria-describedby="add" id="servername" name="servername">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="add" form="newserver" name="add">Add</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</body>