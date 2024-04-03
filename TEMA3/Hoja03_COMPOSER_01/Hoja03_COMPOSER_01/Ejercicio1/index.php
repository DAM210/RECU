<!DOCTYPE html>
<html>

<head>
    <title>Validador de Código IBAN</title>
</head>

<body>
    <h1>Validador de Código IBAN</h1>
    <form method="post">
        <label for="iban">Ingrese su código IBAN:</label>
        <input type="text" name="iban" id="iban" required>
        <input type="submit" value="Validar" name="enviar">
    </form>
    <?php
    require_once("IBANValidar.class.php");
    if (isset($_POST["enviar"])) {
        $iban = $_POST["iban"];
        if (IBANValidar::validaIBAN($iban)) {
            echo "El IBAN es válido.";
        } else {
            echo "El IBAN no es válido.";
        }
    }
    ?>
</body>

</html>
