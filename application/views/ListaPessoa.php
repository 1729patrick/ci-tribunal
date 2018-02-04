<div class="container">
    <h1>Lista de Pessoas</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>                
            <?php
            foreach ($pessoa as $p) {
                ?>
                <tr>
                    <td><?= $p->nome; ?></td>
                    <td><?= $p->cpf; ?></td>
                    <td><?= $p->rg; ?></td>                  
                    <td><?= $p->telefone; ?></td>
                    <td><?= $p->endereco; ?></td>                    
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?= $this->config->base_url() . 'index.php/Pessoa/Alterar/' . $p->id; ?>">
                            <i class="glyphicon glyphicon-pencil"></i> Alterar</a>

                        <a class="btn btn-sm btn-danger" href="<?= $this->config->base_url() . 'index.php/Pessoa/Excluir/' . $p->id; ?>">
                            <i class="glyphicon glyphicon-trash"></i> Excluir</a>
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