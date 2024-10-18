<?php
include('conexao.php');

// Verifica se o formulário foi enviado
if (isset($_POST['deletar'])) {
    $cod_produto = $_POST['deletar'];

    // SQL para deletar pelo cod_produto
    $sql = "DELETE FROM produto WHERE cod_produto = ?";

    // Preparar a consulta
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 's', $cod_produto);

    // Executar a consulta
    $resultado = mysqli_stmt_execute($stmt);

    if ($resultado) {
        echo "<h1>Produto excluído com sucesso</h1>";
    } else {
        echo "<h1>Produto não foi excluído</h1>" . mysqli_error($conexao);
    }

    // Fechar a consulta e a conexão
    mysqli_stmt_close($stmt);
} else {
    echo "<h1>Nenhum produto especificado para exclusão</h1>";
}

mysqli_close($conexao);
?>

