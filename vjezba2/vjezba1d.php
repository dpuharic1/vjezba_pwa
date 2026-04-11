<?php
$naslov = "Forma i slika - vjezba 1d";
$autor = "Duje Puharić";
$opis = "Ova stranica demonstrira rad s GET parametrima, HTML formama i dinamičkim sadržajem.";

$tema = isset($_GET['tema']) ? $_GET['tema'] : 'dark';
$slika = isset($_GET['slika']) ? $_GET['slika'] : 'php';
$prikaziOpis = isset($_GET['opis']);

$slike = [
  'php' => 'img/php.jpg',
  'server' => 'img/server.webp',
  'code' => 'img/code.jpg'
];

$slikaBroj = isset($slike[$slika]) ? $slike[$slika] : $slike['php'];

$bgColor = ($tema === 'light') ? '#f5f5f5' : '#0f172a';
$cardColor = ($tema === 'light') ? '#ffffff' : '#1e293b';
$textColor = ($tema === 'light') ? '#111827' : '#f8fafc';
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo htmlspecialchars($naslov); ?></title>
  <style>
    :root {
      --bg: <?php echo $bgColor; ?>;
      --card: <?php echo $cardColor; ?>;
      --text: <?php echo $textColor; ?>;
      --muted: <?php echo ($tema === 'light') ? '#6b7280' : '#cbd5e1'; ?>;
      --accent: #2563eb;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      background: var(--bg);
      color: var(--text);
      transition: background 0.2s ease;
    }

    .wrap {
      max-width: 720px;
      margin: 48px auto;
      background: var(--card);
      padding: 32px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
      transition: background 0.2s ease;
    }

    h1 {
      margin: 0 0 12px;
      font-size: 2rem;
    }

    p {
      margin: 0 0 14px;
      line-height: 1.6;
    }

    img {
      max-width: 100%;
      height: auto;
      border-radius: 10px;
      margin: 16px 0;
    }

    form {
      background: rgba(0, 0, 0, 0.05);
      padding: 20px;
      border-radius: 10px;
      margin: 20px 0;
    }

    .form-group {
      margin-bottom: 16px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: 500;
    }

    input[type="radio"],
    input[type="checkbox"],
    select {
      margin-right: 8px;
      cursor: pointer;
    }

    select {
      padding: 8px;
      border: 1px solid var(--muted);
      border-radius: 6px;
      font-size: 1rem;
      width: 100%;
      background: var(--card);
      color: var(--text);
    }

    .btn {
      display: inline-block;
      padding: 10px 16px;
      border: 1px solid var(--accent);
      border-radius: 10px;
      background: var(--accent);
      color: #fff;
      text-decoration: none;
      cursor: pointer;
      font-size: 1rem;
      transition: all 0.15s ease;
      margin-right: 10px;
      margin-bottom: 10px;
    }

    .btn:hover {
      background: #1d4ed8;
      border-color: #1d4ed8;
    }

    .btn:focus-visible {
      outline: 3px solid var(--accent);
      outline-offset: 2px;
    }

    .btn:active {
      opacity: 0.85;
    }

    .btn-secondary {
      background: transparent;
      color: var(--accent);
      border: 1px solid var(--accent);
    }

    .btn-secondary:hover {
      background: var(--accent);
      color: #fff;
    }

    footer {
      margin-top: 20px;
      font-size: 0.9rem;
      color: var(--muted);
    }
  </style>
</head>
<body>
  <main class="wrap">
    <h1><?php echo htmlspecialchars($naslov); ?></h1>
    <p><?php echo htmlspecialchars($opis); ?></p>
    <p>Ovu stranicu izradio je <strong><?php echo htmlspecialchars($autor); ?></strong>.</p>

    <?php if (file_exists($slikaBroj)): ?>
      <img src="<?php echo htmlspecialchars($slikaBroj); ?>" alt="Odabrana slika">
    <?php else: ?>
      <p style="color: var(--muted);">Slika nije dostupna.</p>
    <?php endif; ?>

    <?php if ($prikaziOpis): ?>
      <p style="background: rgba(0, 0, 0, 0.05); padding: 12px; border-radius: 8px;">
        <strong>Dodatni opis:</strong> Odabrali ste sliku tipa
        <?php
          $opisiSlike = [
            'php' => 'PHP programskog jezika',
            'server' => 'web servera',
            'code' => 'pisanja koda'
          ];
          echo isset($opisiSlike[$slika]) ? htmlspecialchars($opisiSlike[$slika]) : 'nepoznato';
        ?>.
      </p>
    <?php endif; ?>

    <form method="GET" action="">
      <div class="form-group">
        <label><strong>Odaberi temu:</strong></label>
        <label>
          <input type="radio" name="tema" value="dark" <?php echo ($tema === 'dark') ? 'checked' : ''; ?>>
          Tamna (dark)
        </label>
        <label>
          <input type="radio" name="tema" value="light" <?php echo ($tema === 'light') ? 'checked' : ''; ?>>
          Svijetla (light)
        </label>
      </div>

      <div class="form-group">
        <label for="slika"><strong>Odaberi sliku:</strong></label>
        <select name="slika" id="slika">
          <option value="php" <?php echo ($slika === 'php') ? 'selected' : ''; ?>>PHP</option>
          <option value="server" <?php echo ($slika === 'server') ? 'selected' : ''; ?>>Server</option>
          <option value="code" <?php echo ($slika === 'code') ? 'selected' : ''; ?>>Code</option>
        </select>
      </div>

      <div class="form-group">
        <label>
          <input type="checkbox" name="opis" <?php echo $prikaziOpis ? 'checked' : ''; ?>>
          Prikaži dodatni opis
        </label>
      </div>

      <button type="submit" class="btn">Primijeni odabir</button>
      <a href="vjezba1c.php" class="btn btn-secondary">Natrag na vjezba 1c</a>
    </form>

    <footer>&copy; <?php echo date('Y'); ?> - Demo za PHP</footer>
  </main>
</body>
</html>
<!-- Naziv datoteke: vjezba1d.php -->