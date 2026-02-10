<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Form</title>
    <link rel="stylesheet" href="../vendor/classless/classless.css">
</head>
<body>
    <header>
        <nav class="noprint">
            <ul>
               <li>Formulário</li>
               <li>teste</li>
               <li>teste</li>
               <li>teste</li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="./modelos/form_br.php" method="post">
            <label for="nome_empresa">Nome da Empresa</label>
            <input type="text" name="nome_empresa" id="nome_empresa">
            <label for="cnpj">CNPJ</label>
            <input type="number" name="cnpj" id="cnpj">
            <label for="telefone">Telefone</label>
            <input type="tel" name="telefone" id="telefone">
            <label for="endereco">Endereço</label>
            <input type="text" name="endereco" id="endereco">
            <label for="periodo_contrato">Período do Contrato</label>
            <input type="text" name="periodo_contrato" id="periodo_contrato">
            <button type="submit">Enviar</button>
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
</html>