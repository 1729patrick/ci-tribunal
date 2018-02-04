<div class="container">
    <h1>Lista de Vítimas</h1>
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
            foreach ($vitima as $v) {
                ?>
                <tr>
                    <td><?= $v->id; ?></td>
                    <td><?= $v->nomepessoa; ?></td>
                    <td><?= $v->cpfpessoa; ?></td>
                    <td><?= $v->rgpessoa; ?></td>
                    <td><?= $v->telefonepessoa; ?></td>
                    <td><?= $v->enderecopessoa; ?></td>                    
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?= $this->config->base_url() . 'index.php/Vitima/Alterar/' . $v->id; ?>">
                             <i class="glyphicon glyphicon-pencil"></i> Alterar </a>

                        <a class="btn btn-sm btn-danger" href="<?= $this->config->base_url() . 'index.php/Vitima/Excluir/' . $v->id; ?>">
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