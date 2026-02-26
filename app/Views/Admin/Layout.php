<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FR Elite Admin Dashboard</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<style type="text/tailwindcss">
        :root {
            --primary: #f97316;
            --bg-deep: #0a0a0a;
            --bg-charcoal: #121212;
            --glass-bg: rgba(24, 24, 27, 0.7);
            --glass-border: rgba(255, 255, 255, 0.08);
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-deep);
            color: #ffffff;
        }
        .serif {
            font-family: 'Playfair Display', serif;
        }
        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
        }
        .sidebar-link.active {
            color: var(--primary);
            background: rgba(249, 115, 22, 0.1);
            border-right: 3px solid var(--primary);
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">
<aside class="w-64 bg-black flex-shrink-0 border-r border-white/5 flex flex-col">
<div class="p-8">
<h1 class="serif text-3xl font-bold tracking-tighter text-[var(--primary)]">FR</h1>
<p class="text-[10px] tracking-[0.2em] text-white/40 mt-1 uppercase">Food Recipe Elite</p>
</div>
<nav class="flex-1 px-4 space-y-1">
<a class="sidebar-link active flex items-center gap-3 px-4 py-3 text-sm font-medium transition-all" href="<?= base_url('admin') ?>">
<span class="material-symbols-outlined text-xl">dashboard</span>
                Dashboard
            </a>
<a class="sidebar-link flex items-center gap-3 px-4 py-3 text-white/60 hover:text-white hover:bg-white/5 text-sm font-medium transition-all" href="<?= base_url('admin/users') ?>" >
<span class="material-symbols-outlined text-xl">group</span>
                Users
            </a>
<a class="sidebar-link flex items-center gap-3 px-4 py-3 text-white/60 hover:text-white hover:bg-white/5 text-sm font-medium transition-all" href="<?= base_url('admin/recipes') ?>">
<span class="material-symbols-outlined text-xl">restaurant_menu</span>
                Recipes
            </a>
<a class="sidebar-link flex items-center gap-3 px-4 py-3 text-white/60 hover:text-white hover:bg-white/5 text-sm font-medium transition-all" href="<?= base_url('admin/comments') ?>">
<span class="material-symbols-outlined text-xl">chat_bubble</span>
                Comments
            </a>
<a class="sidebar-link flex items-center gap-3 px-4 py-3 text-white/60 hover:text-white hover:bg-white/5 text-sm font-medium transition-all" href="<?= base_url('admin/favorites') ?>">
<span class="material-symbols-outlined text-xl">favorite</span>
                Favorites
            </a>
</nav>
<div class="p-6 border-t border-white/5">
<a class="flex items-center gap-3 px-4 py-2 text-white/40 hover:text-white text-sm transition-all" href="#">
<span class="material-symbols-outlined text-xl">logout</span>
                Sign Out
            </a>
</div>
</aside>
<div class="p-10 max-w-7xl mx-auto w-full">
    <?= $this->renderSection('content') ?>
</div>

</main>

</body></html>