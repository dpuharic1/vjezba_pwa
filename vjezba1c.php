<?php
$naslov = "PHP dokument - vjezba 1c";
$autor = "Duje Puharić";
$opis = "Ova stranica demonstrira upotrebu PHP varijabli i HTML strukture s dinamičkim sadržajem.";
$linkInfo = "https://www.php.net";
$linkNatrag = "vjezba1b.php";
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo htmlspecialchars($naslov); ?></title>
  
  <style>
    :root {
      --bg: #f5f5f5;
      --card: #ffffff;
      --text: #2c3e50;
      --muted: #7f8c8d;
      --accent: #3498db;
    }

    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      background: var(--bg);
      color: var(--text);
      font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
      font-size: 16px;
      line-height: 1.6;
    }

    .wrap {
      max-width: 720px;
      margin: 48px auto;
      background: var(--card);
      padding: 32px;
      border-radius: 16px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    h1 {
      margin-top: 0;
      margin-bottom: 16px;
      font-size: 2rem;
    }

    p {
      margin-bottom: 16px;
      line-height: 1.6;
    }

    .secondary {
      font-size: 0.9rem;
      color: var(--muted);
    }

    .btn {
      display: inline-block;
      padding: 10px 16px;
      border: 1px solid var(--accent);
      border-radius: 10px;
      text-decoration: none;
      color: var(--accent);
      background: transparent;
      transition: all 0.15s ease;
      cursor: pointer;
      font-size: 1rem;
    }

    .btn:hover {
      background: var(--accent);
      color: #ffffff;
    }

    .btn:focus-visible {
      outline: 3px solid var(--accent);
      outline-offset: 2px;
    }

    .btn:active {
      opacity: 0.85;
    }

    a {
      color: var(--text);
      text-decoration: none;
    }

    a:not(.btn):hover {
      text-decoration: underline;
      color: var(--accent);
    }

    @media (prefers-reduced-motion: reduce) {
      * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }

    @media (max-width: 768px) {
      .wrap {
        margin: 24px auto;
        padding: 24px;
      }

      h1 {
        font-size: 1.75rem;
      }
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
    <p>
      <a class="btn" href="<?php echo htmlspecialchars($linkInfo); ?>"
         target="_blank" rel="noopener">Saznaj vise o PHP-u</a>
      <a class="btn" href="<?php echo htmlspecialchars($linkNatrag); ?>">Natrag na vjezba 1b</a>
    </p>
    <footer>&copy; <?php echo date('Y'); ?> - Demo za PHP</footer>
  </main>
</body>
</html>
<!-- Naziv datoteke: vjezba1c.php -->