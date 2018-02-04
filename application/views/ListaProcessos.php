<div class="container">
    <h1>Lista de Processos</h1>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Cód Processo</th>
                <th>Juiz</th>
                <th>Advogado</th>
                <th>Data de Início</th>
                <th>Hora de Início</th>
                <th>Data do Fim</th>
                <th>Hora do Fim</th>
                <th>Local</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>                
            <?php
            foreach ($processo as $p) {

                if ($p->status){
                    $p->status = "Em andamento"; //1
                }else{
                    $p->status = "Concluido"; //0
                }
                ?>
                <tr>
                    <td><?= $p->id; ?></td>
                    <td><?= $p->nomejuiz; ?></td>
                    <td><?= $p->nomeadvogado; ?></td>
                    <td><?= $p->datainicio; ?></td>
                    <td><?= $p->horainicio; ?></td>
                    <td><?= $p->datafim; ?></td>
                    <td><?= $p->horafim; ?></td>
                    <td><?= $p->local; ?></td>
                    <td><?= $p->status; ?></td>                   
                   
                    <td>
                        <a class="btn btn-sm btn-warning" href="<?= $this->config->base_url() . 'index.php/Processo/Alterar/' . $p->id; ?>">
                            <i class="glyphicon glyphicon-pencil"></i> Alterar </a>

                        <a style="margin-top: 5px" class="btn btn-sm btn-danger" href="<?= $this->config->base_url() . 'index.php/Processo/Excluir/' . $p->id; ?>">
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