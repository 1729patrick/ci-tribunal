<div class="container">
    <h1>Lista de Juizes</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>RG</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Registro OAB</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>                
            <?php
            foreach ($juizes as $j) {
                ?>
                <tr>
                    <td><?= $j->nome; ?></td>
                    <td><?= $j->rg; ?></td>
                    <td><?= $j->cpf; ?></td>
                    <td><?= $j->telefone; ?></td>
                    <td><?= $j->email; ?></td>
                    <td><?= $j->oab; ?></td>
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?= $this->config->base_url() . 'index.php/Juiz/Alterar/' . $j->id; ?>">
                            <i class="glyphicon glyphicon-pencil"></i> Alterar </a>

                        <a class="btn btn-sm btn-danger" href="<?= $this->config->base_url() . 'index.php/Juiz/Excluir/' . $j->id; ?>">
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
    $(document).ready(function(){
       $('table').DataTable(); 
    });
</script>