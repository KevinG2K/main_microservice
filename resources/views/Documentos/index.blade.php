@extends('layouts.sidebar')
@section('contenido')
<link rel="stylesheet" href={{ asset('documentocss/documento.css') }}>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<div class="document-container">
    <h2>Generador de Documentos</h2>
    <head>
      <style>
          .section {
              margin-bottom: 20px;
          }
          .title {
              font-weight: bold;
              margin-bottom: 10px;
          }
          .button {
              margin-right: 10px;
          }
      </style>
  </head>
  <body>
      <div class="section">
          <div class="title">Listado de asesores</div>
          <button class="button" id="generar-pdf-asesor" >Generar PDF</button>
          <button class="button" id="generar-csv-asesor">Generar CSV</button>
      </div>
  
      <div class="section">
          <div class="title">Listado de inmuebles</div>
          <button class="button" id="generar-pdf-inmuebles" >Generar PDF</button>
          <button class="button" id="generar-csv-inmuebles" >Generar CSV</button>
      </div>
  
      <div class="section">
          <div class="title">Listado de transacciones</div>
          <button class="button" id="generar-pdf-transacciones" >Generar PDF</button>
          <button class="button" id="generar-csv-transacciones" >Generar CSV</button>
      </div>
  </body>


    <!--<button id="generar-pdf-final">Generar PDF</button>
    <button id="generar-csv">Generar CSV</button>-->
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>


<script>
  //Asesores-PDF
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
    $('#generar-pdf-asesor').click(function() {
      obtenerAsesores();
      clicke();
    });

    function clicke() {
    $.ajax({
      url: 'https://microservice-generatordocument-production.up.railway.app/auth',
      method: 'POST',
      success: function(response) {
        // La solicitud se realizó con éxito
        console.log('La solicitud POST se completó correctamente');
        console.log(response); // Puedes mostrar la respuesta en la consola o realizar acciones adicionales si es necesario
      },
      error: function(xhr, status, error) {
        // Ocurrió un error al realizar la solicitud POST
        console.log('Error al realizar la solicitud POST');
        console.log(error);
      }
    });
  }

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
//Asesores-CSV
$(document).ready(function() {
$('#generar-csv-asesor').click(function() {
    obtenerAsesores();
    clicke();
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
    function clicke() {
    $.ajax({
      url: 'https://microservice-generatordocument-production.up.railway.app/auth',
      method: 'POST',
      success: function(response) {
        // La solicitud se realizó con éxito
        console.log('La solicitud POST se completó correctamente');
        console.log(response); // Puedes mostrar la respuesta en la consola o realizar acciones adicionales si es necesario
      },
      error: function(xhr, status, error) {
        // Ocurrió un error al realizar la solicitud POST
        console.log('Error al realizar la solicitud POST');
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

// Inmuebles-PDF
$(document).ready(function() {
  $('#generar-pdf-inmuebles').click(function() {
    obtenerInmuebles();
    clicke();
  });

  function clicke() {
    $.ajax({
      url: 'https://microservice-generatordocument-production.up.railway.app/auth',
      method: 'POST',
      success: function(response) {
        // La solicitud se realizó con éxito
        console.log('La solicitud POST se completó correctamente');
        console.log(response); // Puedes mostrar la respuesta en la consola o realizar acciones adicionales si es necesario
      },
      error: function(xhr, status, error) {
        // Ocurrió un error al realizar la solicitud POST
        console.log('Error al realizar la solicitud POST');
        console.log(error);
      }
    });
  }

  function obtenerInmuebles() {
    $.ajax({
      url: '/inmuebles/api', // Actualiza la URL de la API de inmuebles
      method: 'GET',
      success: function(response) {
        generarPDF(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }

  function generarPDF(inmuebles) {
    const docDefinition = {
      content: [
        { text: 'Inmuebles', style: 'header' },
        { text: '\n\n' }
      ],
      styles: {
        header: {
          fontSize: 18,
          bold: true
        }
      }
    };
    inmuebles.forEach((inmueble, index) => {
      const inmuebleData = [
        { text: `${index + 1}. Propietario: ${inmueble.propietario}` },
        { text: `   Precio: ${inmueble.precio}` },
        { text: `   Ubicación: ${inmueble.ubicacion}` },
        { text: `   Asesor ID: ${inmueble.asesor_id}` },
        { text: '\n' }
      ];
      docDefinition.content.push(...inmuebleData);
    });

    pdfMake.createPdf(docDefinition).download('inmueble.pdf');
  }
});

//Inmuebles-CSV
$(document).ready(function() {
$('#generar-csv-inmuebles').click(function() {
    obtenerInmuebles();
    clicke();
  });

  function obtenerInmuebles() {
      $.ajax({
        url: '/inmuebles/api',
        method: 'GET',
        success: function(response) {
          generarCSV(response);
        },
        error: function(error) {
          console.log(error);
        }
      });
    }
    function clicke() {
    $.ajax({
      url: 'https://microservice-generatordocument-production.up.railway.app/auth',
      method: 'POST',
      success: function(response) {
        // La solicitud se realizó con éxito
        console.log('La solicitud POST se completó correctamente');
        console.log(response); // Puedes mostrar la respuesta en la consola o realizar acciones adicionales si es necesario
      },
      error: function(xhr, status, error) {
        // Ocurrió un error al realizar la solicitud POST
        console.log('Error al realizar la solicitud POST');
        console.log(error);
      }
    });
  }

function generarCSV(inmuebles) {
  let csvContent = 'Propietario,Precio,Ubicacion,Asesor ID\n';
  inmuebles.forEach((inmueble) => {
    csvContent += `${inmueble.propietario},${inmueble.precio},${inmueble.ubicacion},${inmueble.asesor_id}\n`;
  });
  const encodedUri = encodeURI('data:text/csv;charset=utf-8,' + csvContent);
  const link = document.createElement('a');
  link.setAttribute('href', encodedUri);
  link.setAttribute('download', 'inmuebles.csv');
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}

});
// Transacciones-PDF
$(document).ready(function() {
  $('#generar-pdf-transacciones').click(function() {
    obtenerTransacciones();
    clicke();
  });

  function clicke() {
    $.ajax({
      url: 'https://microservice-generatordocument-production.up.railway.app/auth',
      method: 'POST',
      success: function(response) {
        // La solicitud se realizó con éxito
        console.log('La solicitud POST se completó correctamente');
        console.log(response); // Puedes mostrar la respuesta en la consola o realizar acciones adicionales si es necesario
      },
      error: function(xhr, status, error) {
        // Ocurrió un error al realizar la solicitud POST
        console.log('Error al realizar la solicitud POST');
        console.log(error);
      }
    });
  }

  function obtenerTransacciones() {
    $.ajax({
      url: '/transacciones/api', // Actualiza la URL de la API de transacciones
      method: 'GET',
      success: function(response) {
        generarPDF(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }

  function generarPDF(transacciones) {
    const docDefinition = {
      content: [
        { text: 'Transacciones', style: 'header' },
        { text: '\n\n' }
      ],
      styles: {
        header: {
          fontSize: 18,
          bold: true
        }
      }
    };
    transacciones.forEach((transaccion, index) => {
      const transaccionData = [
        { text: `${index + 1}. Fecha: ${transaccion.fecha}` },
        { text: `   Tipo: ${transaccion.tipo}` },
        { text: `   Estado: ${transaccion.estado}` },
        { text: `   Inmueble ID: ${transaccion.inmueble_id}` },
        { text: '\n' }
      ];
      docDefinition.content.push(...transaccionData);
    });

    pdfMake.createPdf(docDefinition).download('transaccion.pdf');
  }
});


// Transacciones-CSV
$(document).ready(function() {
  $('#generar-csv-transacciones').click(function() {
    obtenerTransacciones();
    clicke();
  });

  function obtenerTransacciones() {
    $.ajax({
      url: '/transacciones/api', // Actualiza la URL de la API de transacciones
      method: 'GET',
      success: function(response) {
        generarCSV(response);
      },
      error: function(error) {
        console.log(error);
      }
    });
  }

  function clicke() {
    $.ajax({
      url: 'https://microservice-generatordocument-production.up.railway.app/auth',
      method: 'POST',
      success: function(response) {
        // La solicitud se realizó con éxito
        console.log('La solicitud POST se completó correctamente');
        console.log(response); // Puedes mostrar la respuesta en la consola o realizar acciones adicionales si es necesario
      },
      error: function(xhr, status, error) {
        // Ocurrió un error al realizar la solicitud POST
        console.log('Error al realizar la solicitud POST');
        console.log(error);
      }
    });
  }

  function generarCSV(transacciones) {
    let csvContent = 'Fecha,Tipo,Estado,Inmueble ID\n';
    transacciones.forEach((transaccion) => {
      csvContent += `${transaccion.fecha},${transaccion.tipo},${transaccion.estado},${transaccion.inmueble_id}\n`;
    });
    const encodedUri = encodeURI('data:text/csv;charset=utf-8,' + csvContent);
    const link = document.createElement('a');
    link.setAttribute('href', encodedUri);
    link.setAttribute('download', 'transacciones.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  }
});


</script>
@endsection
