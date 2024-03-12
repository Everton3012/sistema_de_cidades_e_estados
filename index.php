<?php 

    include('conexao.php');

    $sql_code_states = "SELECT * FROM estados ORDER BY nome ASC";
    $sql_query_states = $mysqli->query($sql_code_states) or die ($mysqli->error);
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="GET">
        <select required name="estado">
            <option value="">Selecione um estado</option>
            <?php while ($estado = $sql_query_states->fetch_assoc()) { ?>
                <option <?php if(isset($_GET['estado']) && $_GET['estado'] == $estado['id']) echo "selected";?> value="<?=$estado['id']?>"><?=$estado['nome']?></option>
            <?php } ?>
        </select>
        <?php if(isset($_GET['estado'])) {?>
            <select required name="cidade">
                <option value="">Selecio uma cidade</option>
                <?php 
                $selectede_state = $mysqli->real_escape_string($_GET['estado']);
                $sql_code_cities =  "SELECT * FROM cidades WHERE id_estado = '$selectede_state' ORDER BY nome ASC";
                $sql_query_cities = $mysqli->query($sql_code_cities) or die ($mysqli->error);
                while ($cidade = $sql_query_cities->fetch_assoc()) { ?>
                    <option value="<?=$cidade['id']?>"><?=$cidade['nome']?></option>
                <?php } ?>
            </select>
        <?php }?>
        <input type="submit" value="Avançar">
    </form>
</body>
</html>