@extends('layouts.sidebar')
@section('contenido')
<link rel="stylesheet" href={{ asset('documentocss/documento.css') }}>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<div class="document-container">
    <h2>Generador de Documentos</h2>
  
    <button id="generar-pdf-final">Generar PDF</button>
    <button id="generar-csv">Generar CSV</button>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>



<script>
  $(document).ready(function() {
    $('#generar-pdf').click(function() {
      $.ajax({
        url: '/asesores/api/upload',
        method: 'POST',
        data: new FormData(),
        processData: false,
        contentType: false,
        success: function(response) {
          console.log(response);
        },
        error: function(error) {
          console.log(error);
        }
      });
    });
  });
  

  $(document).ready(function() {
    $('#generar-pdf-final').click(function() {
      obtenerAsesores();
    });

  function obtenerAsesores() {
      $.ajax({
        url: '/asesores/api',
        method: 'GET',
        success: function(response) {
          generarPDF(response);
        },
        error: function(error) {
          console.log(error);
        }
      });
    }

    function generarPDF(asesores) {
  const docDefinition = {
    content: [
      { text: 'Asesores', style: 'header' },
      { text: '\n\n' }
    ],
    styles: {
      header: {
        fontSize: 18,
        bold: true
      }
    }
  };
  asesores.forEach((asesor, index) => {
    const asesorData = [
      { text: `${index + 1}. Nombre: ${asesor.nombre}` },
      { text: `   Correo: ${asesor.correo}` },
      { text: `   Teléfono: ${asesor.telefono}` },
      { text: `   Código: ${asesor.codigo}` },
      { text: '\n' }
    ];
    docDefinition.content.push(...asesorData);
  });

  pdfMake.createPdf(docDefinition).download('asesores.pdf');
}

});

$(document).ready(function() {
$('#generar-csv').click(function() {
    obtenerAsesores();
  });

  function obtenerAsesores() {
      $.ajax({
        url: '/asesores/api',
        method: 'GET',
        success: function(response) {
          generarCSV(response);
        },
        error: function(error) {
          console.log(error);
        }
      });
    }

function generarCSV(asesores) {
  let csvContent = 'Nombre,Correo,Teléfono,Código\n';
  asesores.forEach((asesor) => {
    csvContent += `${asesor.nombre},${asesor.correo},${asesor.telefono},${asesor.codigo}\n`;
  });
  const encodedUri = encodeURI('data:text/csv;charset=utf-8,' + csvContent);
  const link = document.createElement('a');
  link.setAttribute('href', encodedUri);
  link.setAttribute('download', 'asesores.csv');
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

});


</script>
@endsection
