
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de Prácticas</title>
    <style>
    @page {
        margin: 0;
    }

    body {

        margin: 0;
        padding: 50px; /* Conserva espacio interior sin márgenes exteriores */
        font-family: Arial, sans-serif;
        font-size: 10pt;
        line-height: 1.6;
        background-image: url('http://localhost/Proyecto_Instituto/GestionDocumental_02/xd/proyect/img/imagen_Practicas.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        -webkit-print-color-adjust: exact;
    }
    #celda{
        border:solid black 1px; 
        text-align: center ;
    }
    th{
        border:solid black 1px;
    }

    .justificado {
        text-align: justify;
    }

    .section-title {
        font-weight: bold;
        margin-top: 30px;
    }
</style>


</head>
<body>
<body class="container my-4">
<br>

<p class="text-end"><?= sanitize($_POST['ciudad'] ?? 'Cayambe') ?>, <?= sanitize($_POST['dia']) ?> de <?= sanitize($_POST['mes']) ?> de <?= sanitize($_POST['anio']) ?></p>
<p>PhD. Juan Ushiña G. <br>
    RECTOR DEL INSTITUTO SUPERIOR TECNOLÓGICO “NELSON TORRES”<br>
    <br>
    Presente. -
</p>

<p class="justificado">De mi consideración:</p>

<p class="justificado">
    Reciba un cordial y afectuoso saludo, a la vez deseándole éxito en las funciones que muy acertadamente dirige en beneficio de la educación superior.
    <br>
    Conforme lo que establece el <strong>Reglamento de la Unidad de Prácticas Pre profesionales. </strong>Art. 21. Derechos de los estudiantes practicantes o pasantes. <em>- Son derechos de los estudiantes practicantes del INT: 1. Realizar las prácticas y pasantías determinadas en el presente reglamento, recibir el asesoramiento respectivo a fin de cumplir a cabalidad las mismas, participar en el diseño de planificación y elaboración de las prácticas, así como en el escogimiento de las empresas e instituciones en donde se desenvolverá.</em>
    <br>
    En tal virtud, pongo en su conocimiento la presente solicitud, para la realización de las PRÁCTICAS PRE PROFESIONALES, en el período del:
    <?= sanitize($_POST['fecha_inicio']) ?> al <?= sanitize($_POST['fecha_fin']) ?>
    <br>
    Tipo de Práctica: <?= sanitize($_POST['tipo']) ?><br>
    Total horas de prácticas: <?= sanitize($_POST['horas']) ?>
</p>

<p>
    Fecha: <?= sanitize($_POST['v1_fecha']) ?> &nbsp;&nbsp;&nbsp; Visita 1. Avance en Horas:</strong> <?= sanitize($_POST['v1_avance']) ?><br>
    Fecha: <?= sanitize($_POST['v2_fecha']) ?> &nbsp;&nbsp;&nbsp;
    Visita 2. Avance en horas: <?= sanitize($_POST['v2_avance']) ?><br>
    Fecha: <?= sanitize($_POST['v3_fecha']) ?> &nbsp;&nbsp;&nbsp;
    Visita 3. Avance en horas: <?= sanitize($_POST['v3_avance']) ?>
</p>

<p class="justificado">
    Por lo antes mencionado, solicito su aprobación para poder iniciar con la realización de las prácticas pre profesionales.
</p>

<table style="width: 100%; border-collapse: collapse; font-size: 9pt; border:solid black 2px;">
    <thead>
        <tr style="text-align: center;">
            <th>Apellidos y nombres</th>
            <th>Cédula</th>
            <th>Carrera</th>
            <th>Nivel / Paralelo</th>
            <th>Contactos</th>
            <th>Correo</th>
            <th>Firma(estudiante)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td id="celda" style="white-space: pre-line;"><?= sanitize($_POST['nombre']) ?></td>
            <td id="celda"><?= sanitize($_POST['cedula']) ?></td>
            <td id="celda"style="white-space: pre-line;"><?= sanitize($_POST['carrera']) ?></td>
            <td id="celda"><?= sanitize($_POST['nivel']) ?></td>
            <td id="celda"><?= sanitize($_POST['contacto']) ?></td>
            <td id="celda"><?= sanitize($_POST['correo']) ?></td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>

<br>

<table style="width: 100%; font-size: 11pt;">
    <tr>
        <td colspan="2">
            <strong>Empresa:</strong> <?= sanitize($_POST['empresa']) ?><br>
            <strong>Dirección:</strong> <?= sanitize($_POST['direccion']) ?><br>
            <strong>Representante legal:</strong> <?= sanitize($_POST['representante']) ?><br>
<strong>Correo:</strong> <a href="mailto:<?= sanitize($_POST['correo_empresa'] ?? '') ?>"><?= sanitize($_POST['correo_empresa'] ?? '') ?></a><br>
            <strong>Área(s) de prácticas:</strong> <?= sanitize($_POST['area']) ?>
        </td>
        <td style="vertical-align: top; padding-left: 20px;">
            <strong>Contacto:</strong> <?= sanitize($_POST['contacto_empresa']) ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>Tutor empresarial:</strong> <?= sanitize($_POST['tutor_empresarial']) ?><br>
            <strong>Mail:</strong> <?= sanitize($_POST['correo_empresarial']) ?>
        </td>
        <td style="vertical-align: top; padding-left: 20px;">
            <strong>Contacto:</strong> <?= sanitize($_POST['contacto_empresarial']) ?>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <strong>Tutor académico:</strong> <?= sanitize($_POST['tutor_academico']) ?><br>
            <strong>Mail:</strong> <?= sanitize($_POST['correo_academico']) ?>
        </td>
        <td style="vertical-align: top; padding-left: 20px;">
            <strong>Contacto:</strong> <?= sanitize($_POST['contacto_academico']) ?>
        </td>
    </tr>
</table>

</body>
</html>
