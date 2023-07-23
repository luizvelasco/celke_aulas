<?php

echo "View - Listar os artigos<br>";
// var_dump($this->dados);

foreach ($this->dados['artigos'] as $artigo) {
    // var_dump($artigo);
    extract($artigo);
    echo "ID: $id <br>";
    echo "Título: $titulo <br>";
    echo "Conteúdo: $conteudo <br>";
    echo "<hr>";
}