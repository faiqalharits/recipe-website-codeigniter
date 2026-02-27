<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Food Recipe Elite</title>
    
    <!-- INI YANG PALING PENTING: Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --burnt-orange: #d97706;
            --deep-black: #080808;
            --charcoal: #121212;
            --gold-accent: #c5a059;
            --glass-bg: rgba(18, 18, 18, 0.7);
        }
        body {
            background-color: var(--deep-black);
            color: #d4d4d4;
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4 {
            font-family: 'Playfair Display', serif;
        }
        .text-gold-gradient {
            background: linear-gradient(135deg, #fef3c7 0%, #d97706 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            color: transparent;
        }
        .nav-blur {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="overflow-x-hidden">
    <!-- Navbar -->
    <?= $this->include('layout/navbar') ?>

    <!-- Content -->
    <?= $this->renderSection('content') ?>

    <!-- Footer -->
    <?= $this->include('layout/footer') ?>
</body>
</html>