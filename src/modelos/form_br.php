<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- biblioteca jsPDF para gerar o PDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- biblioteca html2canvas para renderizar o HTML como imagem -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <style>
        /* Estilos personalizados para garantir uma boa aparência no PDF */
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
            .no-print {
                display: none;
            }
        }
        #invoice-box {
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
    </style>
</head>
<!-- Container da Fatura -->
<div id="invoice-box" class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-8">
    <div class="grid grid-cols-2 items-start mb-8">
        <!-- Logo e Nome da Empresa (Fornecedor) -->
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Fatura</h1>
            <p class="text-gray-600"><?= $_REQUEST['nome_empresa'] ?></p> <!-- nome da empresa que vai fazer a cobrança-->
        </div>
        <!-- Detalhes da Fatura -->
        <div class="text-right">
            <p><strong>Fatura:</strong> 01</p><!-- número da fatura (geralmente é sincronizado aos meses do ano-->
            <p><strong>Data de Emissão:</strong> <?=date('d/m/Y')?> <!-- data da cobrança (ex: feito e cobrado dia 02 do mês 02 do ano 2026)-->
            <p><strong>Mês de Referência:</strong> <?=date('m/Y')?></p><!-- mês de referencia da cobrança (cobrado em fevereiro os gastos de janeiro)-->
        </div>
    </div>

    <!-- Informações do Fornecedor e Cliente -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
        <div>
            <h3 class="text-lg font-semibold border-b pb-2 mb-2">Informações do Fornecedor</h3>
            <p><strong>Nome da Empresa:</strong><?= $_REQUEST['nome_empresa'] ?></p><!-- nome da empresa que vai fazer a cobrança-->
            <p><strong>CNPJ:</strong><?= $_REQUEST['cnpj'] ?></p><!-- CNPJ da empresa que vai fazer a cobrança-->
            <p><strong>Inscrição Estadual:</strong>xxxxxxxxxxxxxxxxx</p><!-- registro da empresa que vai fazer a cobrança-->
            <p><strong>Endereço:</strong><?= $_REQUEST['endereco'] ?></p><!-- endereço da empresa que vai fazer a cobrança-->
            <p><strong>Telefone:</strong><?= $_REQUEST['telefone'] ?></p><!-- telefone da empresa que vai fazer a cobrança-->
        </div>
        <div>
            <h3 class="text-lg font-semibold border-b pb-2 mb-2">Informações do Cliente</h3>
            <p><strong>Nome da Empresa:</strong>xxxxxxxxxxxxxxxxxxxxxx</p><!-- nome da empresa que vai ser cobrada-->
            <p><strong>CNPJ:</strong>xxxxxxxxxxxxxxxxxxxx</p><!-- CNPJ da empresa que vai ser cobrada-->
             <p><strong>Período do Contrato:</strong>xxxxxxxxxxxxxxxxxxxxxx</p><!--periodo do contrato da empresa que vai ser cobrada-->
        </div>
    </div>

    <!-- Itens da Fatura -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold border-b pb-2 mb-2">Itens Detalhados</h3>
        <table class="w-full text-left">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 rounded-l-lg">Descrição</th>
                    <th class="p-2">Mês</th>
                    <th class="p-2 text-right rounded-r-lg">Valor Total (BRL)</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td class="p-2">xxxxxxxxxxxxxxxxxxxxx</td><!-- descrição do item cobrado-->
                    <td class="p-2">[month]</td><!-- mês de referência da fatura a ser cobrada-->
                    <td class="p-2 text-right">R$ 00,00</td><!-- valor da cobrança-->
                </tr>

            </tbody>
        </table>
    </div>

    <!-- Total -->
    <div class="flex justify-end mb-8">
        <div class="w-full md:w-1/3">
            <div class="flex justify-between">
                <span class="font-semibold">Subtotal:</span>
                <span>R$ 00,00</span>
            </div>
            <div class="flex justify-between mt-2 pt-2 border-t-2 border-gray-800">
                <span class="font-bold text-xl">TOTAL:</span>
                <span class="font-bold text-xl">R$ 00,00</span>
            </div>
        </div>
    </div>

    <!-- Detalhes do Pagamento -->
    <div class="bg-gray-50 p-4 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Detalhes do Pagamento</h3>
        <p><strong>Beneficiário:</strong>xxxxxxxxxxxxxxxxxxxxxx</p><!-- nome da empresa que vai fazer a cobrança-->
        <p><strong>Agência Bancária:</strong>xxxxxxxxxxxxxx</p><!-- banco ou agência da empresa que vai fazer a cobrança-->
        <p><strong>Número da Conta:</strong>xxxxxxxxxxxxxxxxx</p><!-- número da conta da empresa que vai fazer a cobrança-->
        <p><strong>CNPJ:</strong>xxxxxxxxxxxxxxx</p><!-- CNPJ da empresa que vai fazer a cobrança-->
    </div>
</div>

<!-- Botão de Download -->
<div class="max-w-4xl mx-auto mt-6 text-center no-print">
    <button id="download-button" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
        Download PDF
    </button>
</div>

<script>
    // Lógica para o download do PDF
    window.jsPDF = window.jspdf.jsPDF;

    document.getElementById('download-button').addEventListener('click', function () {
        // Seleciona o elemento que contém a fatura
        const invoice = document.getElementById('invoice-box');
        
        // Usa html2canvas para capturar o elemento como uma imagem
        html2canvas(invoice, { scale: 2 }).then(canvas => {
            const imgData = canvas.toDataURL('image/png');
            
            // Cria uma instância do jsPDF
            // O formato é A4 (210mm x 297mm)
            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4'
            });

            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = pdf.internal.pageSize.getHeight();
            const canvasWidth = canvas.width;
            const canvasHeight = canvas.height;
            const ratio = canvasWidth / canvasHeight;
            
            let newCanvasWidth = pdfWidth - 20; // Margem de 10mm de cada lado
            let newCanvasHeight = newCanvasWidth / ratio;

            // Se a altura da imagem for maior que a altura do PDF, ajusta a escala
            if (newCanvasHeight > pdfHeight - 20) {
                newCanvasHeight = pdfHeight - 20; // Margem de 10mm em cima e em baixo
                newCanvasWidth = newCanvasHeight * ratio;
            }

            const x = (pdfWidth - newCanvasWidth) / 2;
            const y = 10;

            // Adiciona a imagem ao PDF
            pdf.addImage(imgData, 'PNG', x, y, newCanvasWidth, newCanvasHeight);
            
            // Salva o PDF
            pdf.save('invoice.pdf');
        });
    });
</script>