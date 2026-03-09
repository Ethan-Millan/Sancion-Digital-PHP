<?php

    require_once '../Config/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    class PDF {
        
        public function generarPDF($html) {
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);

            // Configurar tamaño de página y orientación
            $dompdf->setPaper('A4', 'portrait');

            // Renderizar el PDF
            $dompdf->render();

            // Enviar el PDF al navegador
            $dompdf->stream("documento.pdf", array("Attachment" => 1)); // Cambia a 0 para abrir en navegador
        }
    }

?>