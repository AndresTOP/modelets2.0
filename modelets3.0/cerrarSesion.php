<?php session_start(); ?>
<head>
    <meta charset= "UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    

</head>

<body>
    <?php 
        session_start();
        session_unset();
        session_destroy();
?>
    
    <div class="alert alert-primary" role="alert" >
        <nav aria-label="breadcrumb" role="navigation">
            <li >UIB-BAY</li>
        </nav>
    </div>


<div class = "alert alert-danger" role="alert">
    <?php echo "<a href='index.php'>Se ha cerrado la sesión. Pulse aquí para volver a la página principal.</a>";
    ?>
</div>

</body>