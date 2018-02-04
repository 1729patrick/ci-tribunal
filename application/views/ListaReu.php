<div class="container">
    <h1>Lista de Réus</h1>
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
            foreach ($reu as $r) {
                ?>
                <tr>
                    <td><?= $r->id; ?></td>
                    <td><?= $r->nomepessoa; ?></td>
                    <td><?= $r->cpfpessoa; ?></td>
                    <td><?= $r->rgpessoa; ?></td>
                    <td><?= $r->telefonepessoa; ?></td>
                    <td><?= $r->enderecopessoa; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?= $this->config->base_url() . 'index.php/Reu/Alterar/' . $r->id; ?>">
                           <i class="glyphicon glyphicon-pencil"></i> Alterar </a>

                        <a class="btn btn-sm btn-danger" href="<?= $this->config->base_url() . 'index.php/Reu/Excluir/' . $r->id; ?>">           
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