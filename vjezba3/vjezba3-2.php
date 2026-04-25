<?php
$rezultat = "";
$operacija = "";

if ($_POST) {
    $broj1 = $_POST['broj1'];
    $broj2 = $_POST['broj2'];
    $operacija = $_POST['operacija'];

    switch ($operacija) {
        case '+':
            $rezultat = $broj1 + $broj2;
            break;
        case '-':
            $rezultat = $broj1 - $broj2;
            break;
        case '*':
            $rezultat = $broj1 * $broj2;
            break;
        case '/':
            if ($broj2 != 0) {
                $rezultat = $broj1 / $broj2;
            } else {
                $rezultat = "Greška: dijeljenje sa nulom!";
            }
            break;
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        input, select {
            width: 100px;
            padding: 5px;
            font-size: 16px;
            margin: 5px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 20px;
            font-weight: bold;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <h1>Kalkulator (Switch naredba)</h1>

    <form method="POST" action="">
        <label>Upiši prvi broj *</label><br>
        <input type="number" name="broj1" required><br>

        <label>Upiši drugi broj *</label><br>
        <input type="number" name="broj2" required><br>

        <label>Rezultat:</label><br>
        <select name="operacija" required>
            <option value="">Odaberi operaciju</option>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select><br>

        <button type="submit">Izračunaj</button>
    </form>

    <?php if ($rezultat !== ""): ?>
    <div class="result">
        <?php echo $rezultat; ?>
    </div>
    <?php endif; ?>
</body>
</html>
