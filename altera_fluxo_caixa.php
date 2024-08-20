
<?php
    include('includes/conexao.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM fluxo_caixa WHERE id=$id";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de fluxo de caixa</title>
</head>
<body>
    <form action="altera_fluxo_caixa_exe.php" method="post">
        <fieldset>
        <legend>Ateração de fluxo de caixa</legend>
        <div>
            <label for="nome">Data</label>
            <input type="date" name="data" id="data" value="<?php echo $row['data']?>">
        </div>
        <br>
        <div>
            <label for="tipo">Tipo</label>
            <input type="hidden" name="tipo" id="tipo" value="<?php echo $row['tipo']?>">
            <input type="radio" name="tipo" id="tipo" value="1">Entrada
            <input type="radio" name="tipo" id="tipo" value="2">Saída<br>
        </div>
        <br>
        <div>
            <label for="valor">Valor</label>
            <input type="number" name="valor" id="valor" value="<?php echo $row['valor']?>">
        </div>
        <br>
        <div>
            <label for="historico">Historico</label>
            <input type="text" name="historico" id="historico" value="<?php echo $row['historico']?>">
        </div>
        <br>
        <div>
            <label for="cheque">Cheque</label>
            <select name="cheque" id="cheque" <?php echo $row['cheque']==0?>>
                <option value="sim">Sim</option>
                <option value="nao">Não</option>
            </select>
        </div>        
        <input type="hidden" name="id" 
               value="<?php echo $row['id']?>">
        <br>
        <div>
            <button type="submit">Alterar</button>
        </div>        
        </fieldset>
    </form>
</body>
</html>
