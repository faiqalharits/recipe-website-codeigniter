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
<main class="flex-1 flex flex-col bg-[var(--bg-charcoal)] overflow-y-auto">
<header class="h-20 glass-panel border-t-0 border-l-0 border-r-0 px-8 flex items-center justify-between sticky top-0 z-10">
<div class="flex items-center gap-4 flex-1">
<div class="relative w-full max-w-md">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-white/30 text-xl">search</span>
<input class="w-full bg-white/5 border-white/10 rounded-full py-2 pl-10 pr-4 text-sm focus:ring-[var(--primary)] focus:border-[var(--primary)] text-white placeholder:text-white/30" placeholder="Search across recipes, users..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<button class="relative text-white/60 hover:text-white transition-colors">
<span class="material-symbols-outlined">notifications</span>
<span class="absolute top-0 right-0 w-2 h-2 bg-[var(--primary)] rounded-full border-2 border-[var(--bg-charcoal)]"></span>
</button>
<div class="h-8 w-[1px] bg-white/10"></div>
<div class="flex items-center gap-3">
<div class="text-right">
<p class="text-xs font-semibold">Admin User</p>
<p class="text-[10px] text-white/40">Super Administrator</p>
</div>
<img alt="Admin Profile" class="w-10 h-10 rounded-full border border-white/10 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUocqaMNszkB2LvvkeahcVuT-HVMwFgFfye-jZ9gFXS2NcOZ1bTth_lRjmsiwCVuB6gBs-MDljt3gAUTuPWZptR11pzKZ9ZVLhGm-fEx6l_nF7bxy8BrxM-ns83xxeMW8J2D0edVj6cgXJkoOV_m9yexlJlhGsOudyV3li5pIdExHWECTh4Tvd_TM4sqFFA9rdGmzesdZscm73s7hwGHG-SA4xcjWn9BctQ-h98ojDEcDWxI-ue9oYPhHXoUJYQUjkhsr3amt1eQOy"/>
</div>
</div>
</header>
<div class="p-10 max-w-7xl mx-auto w-full">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
<div>
<h2 class="serif text-4xl font-bold tracking-tight mb-2">Recipe Management</h2>
<p class="text-white/40 text-sm">Curate and manage the finest culinary experiences in the database.</p>
</div>
<button class="bg-[var(--primary)] hover:bg-[#ea580c] transition-all px-6 py-3 rounded-lg font-semibold text-sm flex items-center gap-2 shadow-lg shadow-orange-950/20">
<span class="material-symbols-outlined text-xl">add</span>
                    Add New Recipe
                </button>
</div>
<div class="glass-panel rounded-2xl overflow-hidden shadow-2xl">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-white/5">
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">ID</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Dish Name</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Category</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5 text-sm font-medium text-white/30">#001</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="h-12 w-16 rounded-lg overflow-hidden flex-shrink-0 border border-white/10">
<img alt="Truffle Pasta" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAm8Tj_q3DGKF8RQtEbAtvWlECdi2YzUCe_3_rlSHBG8gjDO4wUy19pDCfRDaBAYyZeKLmOkDi6-bdUgJvox88PDaNkDj63gIoJr31G5riM5MeNRwFJLYgKNNAWUBi5ofwVaxJLvVZ2Ju5he74DFeO9JZKJOhn91Ui232Y08fRWXtBs6LmUp2NbwQrdrGM5mm1ToFc7iDXHzf2f0XbL5vjcYiswaBoLZF8U4ur_qXZyIM3h7lT7URJkPDMcaRnDDiibqWr-iXHFILBf"/>
</div>
<span class="font-medium text-white/90 group-hover:text-white transition-colors">Black Truffle Tagliatelle</span>
</div>
</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">Italian Fine Dining</span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-3">
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all">
<span class="material-symbols-outlined text-lg">edit</span>
</button>
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all">
<span class="material-symbols-outlined text-lg">delete</span>
</button>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5 text-sm font-medium text-white/30">#002</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="h-12 w-16 rounded-lg overflow-hidden flex-shrink-0 border border-white/10">
<img alt="Salmon" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQx2bc-er448odsCDfIgSExb5AFqaQoJxl3ySotHaDqhydI7fiFsa2Co4YEAq3x9k2__0zWjSv2bGZuL-pipMg45wMTnEsppFDnLEBzsPP2JboFZeg1nzefFBx0n7uf4544o6PYs86uTassxB7cohS5sKk4yn-YBUG8Z8jRxkGu6wrsIvKKa7aQHbgvlgQXoR6tK3b4zmdNqCWeLF6c-KmkK9oCxFSYTONRpGEfl9_Q-D3az9iJIRYWqeIbSdfGCYGK2K8BCg27Mc4"/>
</div>
<span class="font-medium text-white/90 group-hover:text-white transition-colors">Glazed Miso Salmon</span>
</div>
</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">Modern Asian</span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-3">
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all">
<span class="material-symbols-outlined text-lg">edit</span>
</button>
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all">
<span class="material-symbols-outlined text-lg">delete</span>
</button>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5 text-sm font-medium text-white/30">#003</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="h-12 w-16 rounded-lg overflow-hidden flex-shrink-0 border border-white/10">
<img alt="Duck" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlaX9quX3a3Ou2EPcMCH3SYpkhszyFjlPbEK_A4L7m4zabBqu0vksBq6CukqXLGfRENJvxcgr424gW8YJM6SW91mg8gr8YdOKghPv_6ZQHtv3pwi-MhlLbtZJWx1gMXI2U7dqT_IjV3ZNAjc0_gP4rNFnG-TZsEAFp2lZY8VlZqeTdS2asdrJ0sOzffcixZ0v49N5wZ46K2JZdXwdi6nZmjkYjkJlZ6I06RnpGrJlHwTe0Su2m5ZKbC37HFIaEL2Xh6pDqlUdjxIeZ"/>
</div>
<span class="font-medium text-white/90 group-hover:text-white transition-colors">Pan-Seared Duck Breast</span>
</div>
</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">French Classic</span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-3">
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all">
<span class="material-symbols-outlined text-lg">edit</span>
</button>
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all">
<span class="material-symbols-outlined text-lg">delete</span>
</button>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5 text-sm font-medium text-white/30">#004</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="h-12 w-16 rounded-lg overflow-hidden flex-shrink-0 border border-white/10">
<img alt="Dessert" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_DuH6YfNjls7how7oXsrV6BCNekcE0K7CcyxqLlqWbQDTicr-z_DDFRgpAeauWoz2oqJxzGFwuPcNJaiyKyXDmpwiTbwoUf2bJe5UtnJ1T-ymk9GaVi2oRkn5x-Pa45rpsdh8lOqati1_-vLETTCVHrS91g6t2mmHrDAnB0Eco0ssg7YekXB7orN1924_xX6s8wOIX7Fm8nf7a59YAjZymdxR4xzxiVwBX_-uVqObahFgk2zsY3_M6Da2pOaQMoaZ2RqoRuZujSjl"/>
</div>
<span class="font-medium text-white/90 group-hover:text-white transition-colors">Saffron Poached Pears</span>
</div>
</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">Patisserie</span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-3">
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all">
<span class="material-symbols-outlined text-lg">edit</span>
</button>
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all">
<span class="material-symbols-outlined text-lg">delete</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-6 flex items-center justify-between border-t border-white/5">
<p class="text-xs text-white/30">Showing <span class="text-white/60">1-4</span> of <span class="text-white/60">128</span> recipes</p>
<div class="flex items-center gap-2">
<button class="px-4 py-2 bg-white/5 hover:bg-white/10 rounded-lg text-xs font-medium text-white/60 transition-all">Previous</button>
<button class="px-4 py-2 bg-[var(--primary)] text-white rounded-lg text-xs font-medium shadow-lg shadow-orange-950/20">1</button>
<button class="px-4 py-2 bg-white/5 hover:bg-white/10 rounded-lg text-xs font-medium text-white/60 transition-all">2</button>
<button class="px-4 py-2 bg-white/5 hover:bg-white/10 rounded-lg text-xs font-medium text-white/60 transition-all">Next</button>
</div>
</div>
</div>
</div>
</main>

</body></html>