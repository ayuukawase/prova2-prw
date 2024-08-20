<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de fluxo de caixa</title>
</head>
<body>
    <legend>Consulta de fluxo de caixa</legend>
    <?php

    include('includes/conexao.php');

    $tipo = $_POST['consulta'];
    $texto = $_POST['texto'];

    switch($tipo) {
        case 'entrada':
            $sql = "SELECT SUM(valor) valor FROM fluxo_caixa WHERE tipo = 'entrada'";
            $texto = "Valor total entrada";
        break;

        case 'saida':
            $sql = "SELECT SUM(valor) valor FROM fluxo_caixa WHERE tipo = 'saida'";
            $texto = "Valor Total Saída";
        break;

        case 'saldo':
            $sql = "SELECT SUM(CASE WHEN tipo = 'entrada' THEN valor ELSE 0 END) - SUM(CASE WHEN tipo = 'saida' THEN valor ELSE 0 END) AS valor FROM fluxo_caixa";
            $texto = "Valor Saldo Total";
        break;
    }

    $result = mysqli_query($con, $sql);
    if($result) {
        echo "Dados atualizados\n";
    } else {
        echo "Erro ao atualizar dados!\n".mysqli_error($con);"
    }

    $row = mysqli_fetch_array($result);
    echo "$texto: $row[valor]";
    
    ?>

</body>
</html>