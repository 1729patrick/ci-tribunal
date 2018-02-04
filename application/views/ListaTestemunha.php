<div class="container">
    <h1>Lista de Testemunhas</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
            <th>Cód. Testemunha</th>
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
            foreach ($testemunhas as $t) {
                ?>
                <tr>
                    <td><?= $t->id; ?></td>
                    <td><?= $t->nomepessoa; ?></td>
                    <td><?= $t->cpfpessoa; ?></td>
                    <td><?= $t->rgpessoa; ?></td>
                    <td><?= $t->telefonepessoa; ?></td>
                    <td><?= $t->enderecopessoa; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?= $this->config->base_url() . 'index.php/Testemunha/Alterar/' . $t->id; ?>">
                            <i class="glyphicon glyphicon-pencil"></i> Alterar </a>

                        <a class="btn btn-sm btn-danger" href="<?= $this->config->base_url() . 'index.php/Testemunha/Excluir/' . $t->id; ?>">  
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