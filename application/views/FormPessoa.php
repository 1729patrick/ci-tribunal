<?php
error_reporting(0);
if (isset($pessoa)) {
    $action = $this->config->base_url() . 'index.php/Pessoa/Alterar/' . $pessoa->id;
} else {
    $action = $this->config->base_url() . 'index.php/Pessoa/Cadastrar';
}
?>
<div class="container">
    <h1>Cadastro de Pessoas</h1>
    <form name="pessoa" method="POST"  action="<?= $action; ?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= $pessoa->nome; ?>">
        </div>
        <div class="form-group">
            <label for="rg">RG:</label>
            <input type="text" class="form-control" id="rg" name="rg" value="<?= $pessoa->rg; ?>">
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= $pessoa->cpf; ?>">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="<?= $pessoa->telefone; ?>">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?= $pessoa->endereco; ?>">
        </div>

        <button type="submit" class="btn btn-success">
            <i class="glyphicon glyphicon-ok"></i> Salvar
        </button>
    </form>
</div>


<script type="text/javascript">
    $('#telefone').mask('(00) 00000-0000');
    $('#rg').mask('0000000');
    $('#cpf').mask(' 000.000.000-00');
    $('form').validate({
        errorElement: 'span',
        errorClass: 'help-inline',
        focusInvalid: true,
        rules: {
            nome: 'required',
            rg: 'required',
            cpf: 'required',
            telefone: 'required',
            endereco: 'required',
       },
        messages: {
            nome: 'Por favor, Insira o nome do Juiz.',
            rg: 'Por favor, Insira o RG.',
            cpf: 'Por favor, Insira o CPF.',
            telefone: 'Por favor, Insira o Telefone.',
            endereco: 'Por favor, Insira o Endereço',
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