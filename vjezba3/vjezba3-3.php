<?php
$prosjek = "";
$ocjena = "";
$poruka = "";

if ($_POST) {
    $kolokvij1 = $_POST['kolokvij1'];
    $kolokvij2 = $_POST['kolokvij2'];

    if ($kolokvij1 < 1 || $kolokvij1 > 5 || $kolokvij2 < 1 || $kolokvij2 > 5) {
        $poruka = "Greška: Ocjene moraju biti između 1 i 5!";
    } else {
        $prosjek = ($kolokvij1 + $kolokvij2) / 2;

        if ($kolokvij1 < 2 || $kolokvij2 < 2) {
            $ocjena = "negativna";
        } else {
            $ocjena = round($prosjek);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ocjena iz predmeta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .form-group {
            margin: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        .result {
            margin-top: 30px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 4px;
            text-align: center;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        .success {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Ocjena iz predmeta</h1>

    <form method="POST" action="">
        <div class="form-group">
            <label>Upiši ocjenu I. kolokvija *</label>
            <input type="number" name="kolokvij1" min="1" max="5" required>
        </div>

        <div class="form-group">
            <label>Upiši ocjenu II. kolokvija *</label>
            <input type="number" name="kolokvij2" min="1" max="5" required>
        </div>

        <button type="submit">Izračunaj</button>
    </form>

    <?php if ($poruka): ?>
    <div class="result">
        <p class="error"><?php echo $poruka; ?></p>
    </div>
    <?php elseif ($ocjena !== ""): ?>
    <div class="result">
        <p>Prosjek: <?php echo number_format($prosjek, 2); ?></p>
        <p class="<?php echo $ocjena === "negativna" ? 'error' : 'success'; ?>">Konačna ocjena: <?php echo $ocjena; ?></p>
    </div>
    <?php endif; ?>
</body>
</html>
