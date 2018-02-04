<?php
error_reporting(0);
if (isset($processo)) {
    $action = $this->config->base_url() . 'index.php/Processo/Alterar/' . $processo->id;
} else {
    $action = $this->config->base_url() . 'index.php/Processo/Cadastrar';
}
?>
<div class="container">
    <h1>Cadastro de Processos</h1>
    <form name="processo" method="POST" action="<?= $action; ?>">
        <div class="form-group">

            <div class="form-group">
                <label for="idjuiz">Juiz</label>
                <select class="form-control" name="idjuiz">
                    <?php
                    foreach ($juizes as $j) {
                        if ((isset($processo)) && ($processo->idjuiz == $j->id)) {
                            $s = 'selected';
                        } else {
                            $s = '';
                        }
                        echo "<option value='$j->id' $s>$j->nome</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="idadvogado">Advogado</label>
                <select class="form-control" name="idadvogado">
                    <?php
                    foreach ($advogados as $a) {
                        if ((isset($processo)) && ($processo->idadvogado == $a->id)) {
                            $s = 'selected';
                        } else {
                            $s = '';
                        }
                        echo "<option value='$a->id' $s>$a->nome</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="datainicio">Data de Início:</label>
                <input type="text" class="form-control" id="datainicio" name="datainicio" value="<?= $processo->datainicio; ?>">
            </div>
            <div class="form-group">
                <label for="horainicio">Hora de Início:</label>
                <input type="text" class="form-control" id="horainicio" name="horainicio" value="<?= $processo->horainicio; ?>">
            </div>
            <div class="form-group">
                <label for="datafim">Data do Fim:</label>
                <input type="text" class="form-control" id="datafim" name="datafim" value="<?= $processo->datafim; ?>">
            </div>
            <div class="form-group">
                <label for="horafim">Hora do Fim:</label>
                <input type="text" class="form-control" id="horafim" name="horafim" value="<?= $processo->horafim; ?>">
            </div>
            <div class="form-group">
                <label for="local">Local:</label>
                <input type="text" class="form-control" id="local" name="local" value="<?= $processo->local; ?>">
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" >
                    <option  value="1"> Em andamento </option>
                    <option value="0" > Concluido </option>
                </select>
            </div>
        </div>
      
        <button type="submit" class="btn btn-success">
            <i class="glyphicon glyphicon-ok"> </i> Salvar
        </button>
    </form>
</div>


<script type="text/javascript">
    $('#datainicio').mask('00/00/0000');
    $('#horainicio').mask('00:00:00');
    $('#datafim').mask('00/00/0000');
    $('#horafim').mask('00:00:00');

    $('form').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: true,
        rules: {
            datainicio: 'required',
            horafim: 'required',
            datafim: 'required',
            horainicio: 'required',
            local: 'required',
       },
        messages: {
            datainicio: 'Por favor, Insira a Data de Início.',
            horainicio: 'Por favor, Insira a Hora de Início.',
            horafim: 'Por favor, Insira a Data Fim.',
            datafim: 'Por favor, Insira a Hora Fim.',
            local: 'Por favor, Insira o Local',
        },
        success: function (e) {
            $(e).closest('.control-group').removeClass('error');
            $(e).remove();
        },
        errorPlacement: function (error, element) {
            if (element.is(':checkbox') || element.is(':radio')) {
                var controls = element.closest('div[class*="col-"]');
                if (controls.find(':checkbox,:radio').length > 1)
                    controls.append(error);
                else
                    error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
            } else if (element.is('.select2')) {
                error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
            } else if (element.is('.chosen-select')) {
                error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
            } else
                error.insertAfter(element.parent());
        }
    });
</script>