<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES Pizza</title>

<!--     No vamos a perder el tiempo ahora con css, voy a https://materializecss.com/
    entro en Get Started y selecciono el link a continuación: -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <style type = "text/css">
        .brand{
            background: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c !important;
        }
        form{
            max-width:460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>

<!-- Vamos al body y creamos algo de contenido añadiendo estilo -->
<body class = "grey lighten-1">
    <!-- Dentro del body creamos una navegación -->
    <nav class = "white z-deph-0">
        <div class="container">
            <a href=".\index.php" class = "brand-logo brand-text">DWES Pizza</a>
            <ul id="nav-mobile" class = "right hide-on-small-down">
                <li><a href=".\add.php" class = "btn brand z-depth-0">Afegir Pizza</a></li>
            </ul>
        </div>
    </nav>