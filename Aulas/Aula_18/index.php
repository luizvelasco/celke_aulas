<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface</title>
</head>
<body>
    <?php
        require_once("./ICurso.php");
        require_once("./CursoPosGraduacao.php");
        require_once("./CursoGraduacao.php");

        $cursoPosGraduacao = new CursoPosGraduacao();
        echo $cursoPosGraduacao->disciplina("Desenvolvimento Web");
        echo $cursoPosGraduacao->professor("Velasco");

        $cursoGraduacao = new CursoGraduacao();
        echo $cursoGraduacao->disciplina("Direito");
        echo $cursoGraduacao->professor("Thaís");
    ?>
</body>
</html>