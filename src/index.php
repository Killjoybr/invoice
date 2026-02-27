<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Form</title>
    <link rel="stylesheet" href="../vendor/classless/classless.css">
    <script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
    <header>
        <nav class="noprint">
            <ul>
               <li>Formulário</li>
               <li>lorem</li>
               <li>ipsum</li>
               <li>dolor</li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="./modelos/form_br.php" method="post">
            <div class=col>
                <div class="row">
                <fieldset>
                    <legend>Informações da Empresa</legend>
                    <label for="nome_empresa">Nome da Empresa</label>
                    <input type="text" name="nome_empresa" id="nome_empresa">
                    <label for="cnpj">CNPJ</label>
                    <input class="cnpj" type="text" name="cnpj" id="cnpj">
                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" id="telefone">
                    <label for="endereco">Endereço</label>
                    <input type="text" name="endereco" id="endereco">
                </fieldset>
                <fieldset>
                    <legend>Informações do Cliente</legend>
                    <label for="razao_cliente">Empresa Cliente</label>
                    <input type="text" name="razao_cliente" id="razao_cliente">
                    <label for="cnpj_cliente">CNPJ</label>
                    <input class="cnpj" type="text" name="cnpj_cliente" id="cnpj_cliente">
                </fieldset>
                </div>
                <fieldset>
                    <legend>Informações de Produto</legend>
                    <label for="periodo_contrato">Período do Contrato</label>
                    <input type="text" name="periodo_contrato" id="periodo_contrato">
                </fieldset>
                <fieldset>
                    <legend>Informações de Pagamento</legend>
                    <label for="beneficiario">Beneficiário</label>
                    <input type="text" name="beneficiario" id="beneficiario">
                    <label for="agencia">Agência</label>
                    <input type="text" name="agencia" id="agencia">
                    <label for="numero_conta">Número da Conta</label>
                    <input type="text" name="numero_conta" id="numero_conta">
                    <label for="cnpj_beneficiario">CNPJ</label>
                    <input class="cnpj" type="text" name="cnpj_beneficiario" id="cnpj">
                </fieldset>
            </div>
            <div>
                <button type="submit">Enviar</button>
            </div>
        </form>
    </main>
    <footer class="noprint">
        <hr>
            <a href="https://github.com/Killjoybr/invoice" target="_blank" rel="noopener noreferrer">Repositório</a>
            <br>
            <a href="https://github.com/Killjoybr" target="_blank" rel="noopener noreferrer">Killjoybr</a>
            <br>
            <a href="https://github.com/ThiagoAbrahao" target="_blank" rel="noopener noreferrer">Thiago</a>
    </footer>
</body>
<script>
    $(document).ready(function(){
    $('.cnpj').mask('99.999.999/9999-99');
});
</script>
</html>