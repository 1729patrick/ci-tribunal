<?php
error_reporting(0);
if (isset($reu)) {
    $action = $this->config->base_url() . 'index.php/Reu/Alterar/' . $reu->id;
} else {
    $action = $this->config->base_url() . 'index.php/Reu/Cadastrar';
}
?>
<div class="container">
    <h1>Cadastro de Réus</h1>
    <form name="reu" method="POST"  action="<?= $action; ?>">
        <div class="form-group">
            <label for="idpessoa">Pessoas</label>
            <select class="form-control" name="idpessoa">
                <?php
                foreach ($pessoas as $p) {
                    if ((isset($reu)) && ($reu->idpessoa == $p->id)) {
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