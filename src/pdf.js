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