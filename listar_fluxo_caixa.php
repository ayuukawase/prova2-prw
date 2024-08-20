<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/listagem.css">
    <title>Listagem de fluxo de caixa</title>
</head>

<body>
    <section>
        <div class="principal flex inverter_column">
            <?php
            include('includes/conexao.php');
            $sql = "SELECT id, data, tipo, valor, historico, cheque FROM fluxo_caixa";
            // Executa a consulta
            $result = mysqli_query($con, $sql);
            ?>
            <h1>Listagem de fluxo de caixa</h1>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Historico</th>
                        <th>Cheque</th>
                        <th>Alterar</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['data'] . "</td>";
                        echo "<td>" . $row['tipo'] . "</td>";
                        echo "<td>" . $row['valor'] . "</td>";
                        echo "<td>" . $row['historico'] . "</td>";
                        echo "<td>" . $row['cheque'] . "</td>";
                        echo "<td><a href='altera_fluxo_caixa.php?id=" . $row['id'] . "'>Alterar</a></td>";
                        echo "<td><a href='deleta_fluxo_caixa.php?id=" . $row['id'] . "'>Deletar</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>