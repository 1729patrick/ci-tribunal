<?php
error_reporting(0);
if (isset($vitimas)) {
    $actionado = $this->config->base_url() . 'index.php/Vitima/Alterar/' . $vitimas->id;
} else {
    $action = $this->config->base_url() . 'index.php/Vitima/Cadastrar';
}
?>
<div class="container">
    <h1>Cadastro de Vítimas</h1>
    <form name="vitima" method="POST"  action="<?= $action; ?>">
        <div class="form-group">
            <label for="idpessoa">Pessoas</label>
            <select class="form-control" name="idpessoa">
                <?php
                foreach ($pessoas as $p) {
                    if ((isset($vitima)) && ($vitima->idpessoa == $p->id)) {
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