</head>
<body>
    <?php include ("include/nav_view.php")?>

    <form action="">
    <label for="fname">Localizar SH:</label>
    <input type="text" id="fname" name="fname" onkeyup="showSuperheroes(this.value)">
    </form>
    <p><h4>Listado de SuperHéroes</h4> 
    <span id="txtHint">
    <?php
       include ("include/list_superheroes_view.php");

   /* Código para trabajar sin ajax
               foreach ($data as $keySH=>$valorSH) {
                        echo $valorSH['nombre'] ." ";
                        echo $valorSH['velocidad'];
                        echo '<a href="'.DIRPUBLIC.'/index.php/superheroes/edit/'.$valorSH['id'].'"> Edit</a>';
                        echo '<a href="'.DIRPUBLIC.'/index.php/superheroes/del/'.$valorSH['id'].'"> Del</a>';
                        echo "<br/>";