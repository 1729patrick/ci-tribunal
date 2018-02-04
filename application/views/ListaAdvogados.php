<div class="container">
    <h1>Lista de Advogados</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Email</th>
                <th>Registro OAB</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>                
            <?php
            foreach ($advogado as $a) {
                ?>
                <tr>
                    <td><?= $a->nome; ?></td>
                    <td><?= $a->rg; ?></td>
                    <td><?= $a->cpf; ?></td>
                    <td><?= $a->telefone; ?></td>
                    <td><?= $a->endereco; ?></td>
                    <td><?= $a->email; ?></td>
                    <td><?= $a->oab; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?= $this->config->base_url() . 'index.php/Advogado/Alterar/' . $a->id; ?>">
                            <i class="glyphicon glyphicon-pencil"></i> Alterar </a>

                        <a class="btn btn-sm btn-danger" href="<?= $this->config->base_url() . 'index.php/Advogado/Excluir/' . $a->id; ?>">
                            <i class="glyphicon glyphicon-trash"></i> Excluir </a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('table').DataTable();
    });
</script>