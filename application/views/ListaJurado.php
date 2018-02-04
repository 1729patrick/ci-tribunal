<div class="container">
    <h1>Lista de Jurados</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>Cód. Réu</th>
            <th>Pessoas</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Ações</th>
            </tr>
        </thead>
        <tbody>                
            <?php
            foreach ($jurados as $j) {
                ?>
                <tr>
                <td><?= $j->id; ?></td>
                    <td><?= $j->nomepessoa; ?></td>
                    <td><?= $j->cpfpessoa; ?></td>
                    <td><?= $j->rgpessoa; ?></td>
                    <td><?= $j->telefonepessoa; ?></td>
                    <td><?= $j->enderecopessoa; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?= $this->config->base_url() . 'index.php/Jurado/Alterar/' . $j->id; ?>">
                            <i class="glyphicon glyphicon-pencil"></i> Alterar </a>

                        <a class="btn btn-sm btn-danger" href="<?= $this->config->base_url() . 'index.php/Jurado/Excluir/' . $j->id; ?>">       
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