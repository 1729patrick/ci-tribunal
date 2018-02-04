<?php
error_reporting(0);
if (isset($jurado)) {
    $actionado = $this->config->base_url() . 'index.php/Jurado/Alterar/' . $jurado->id;
} else {
    $action = $this->config->base_url() . 'index.php/Jurado/Cadastrar';
}
?>
<div class="container">
    <h1>Cadastro de Jurados</h1>
    <form name="jurado" method="POST"  action="<?= $action; ?>">
        <div class="form-group">
            <label for="idpessoa">Pessoas</label>
            <select class="form-control" name="idpessoa">
                <?php
                foreach ($pessoas as $p) {
                    if ((isset($jurados)) && ($jurados->idpessoa == $p->id)) {
                        $s = 'selected';
                    } else {
                        $s = '';
                    }
                    echo "<option value='$p->id' $s>$p->nome</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="glyphicon glyphicon-ok"></i> Salvar
        </button>
    </form>
</div>