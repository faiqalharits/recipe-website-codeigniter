<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FR Admin - Favorites Analytics</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
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
        .bar-gradient {
            background: linear-gradient(to top, rgba(249, 115, 22, 0.2), var(--primary));
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
<input class="w-full bg-white/5 border-white/10 rounded-full py-2 pl-10 pr-4 text-sm focus:ring-[var(--primary)] focus:border-[var(--primary)] text-white placeholder:text-white/30" placeholder="Search analytics..." type="text"/>
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
<div class="mb-10">
<h2 class="serif text-4xl font-bold tracking-tight mb-2">Favorites Analytics</h2>
<p class="text-white/40 text-sm">Tracking the most coveted culinary creations and user engagement trends.</p>
</div>
<div class="glass-panel rounded-2xl p-8 mb-10">
<div class="flex items-center justify-between mb-8">
<div>
<h3 class="text-lg font-semibold">Monthly Save Trends</h3>
<p class="text-xs text-white/40">Total saves across all recipes this month</p>
</div>
<div class="flex gap-2">
<span class="flex items-center gap-1 text-[var(--primary)] text-xs font-bold">
<span class="material-symbols-outlined text-sm">trending_up</span>
                        +24.8%
                    </span>
</div>
</div>
<div class="h-48 flex items-end justify-between gap-2 px-2">
<div class="flex-1 flex flex-col items-center gap-3 group">
<div class="w-full bg-white/5 rounded-t-lg relative overflow-hidden h-full">
<div class="absolute bottom-0 left-0 w-full bar-gradient transition-all" style="height: 45%;"></div>
</div>
<span class="text-[10px] text-white/30 font-medium">MON</span>
</div>
<div class="flex-1 flex flex-col items-center gap-3 group">
<div class="w-full bg-white/5 rounded-t-lg relative overflow-hidden h-full">
<div class="absolute bottom-0 left-0 w-full bar-gradient transition-all" style="height: 65%;"></div>
</div>
<span class="text-[10px] text-white/30 font-medium">TUE</span>
</div>
<div class="flex-1 flex flex-col items-center gap-3 group">
<div class="w-full bg-white/5 rounded-t-lg relative overflow-hidden h-full">
<div class="absolute bottom-0 left-0 w-full bar-gradient transition-all" style="height: 55%;"></div>
</div>
<span class="text-[10px] text-white/30 font-medium">WED</span>
</div>
<div class="flex-1 flex flex-col items-center gap-3 group">
<div class="w-full bg-white/5 rounded-t-lg relative overflow-hidden h-full">
<div class="absolute bottom-0 left-0 w-full bar-gradient transition-all" style="height: 85%;"></div>
</div>
<span class="text-[10px] text-white/30 font-medium">THU</span>
</div>
<div class="flex-1 flex flex-col items-center gap-3 group">
<div class="w-full bg-white/5 rounded-t-lg relative overflow-hidden h-full">
<div class="absolute bottom-0 left-0 w-full bar-gradient transition-all" style="height: 95%;"></div>
</div>
<span class="text-[10px] text-white/30 font-medium">FRI</span>
</div>
<div class="flex-1 flex flex-col items-center gap-3 group">
<div class="w-full bg-white/5 rounded-t-lg relative overflow-hidden h-full">
<div class="absolute bottom-0 left-0 w-full bar-gradient transition-all" style="height: 75%;"></div>
</div>
<span class="text-[10px] text-white/30 font-medium">SAT</span>
</div>
<div class="flex-1 flex flex-col items-center gap-3 group">
<div class="w-full bg-white/5 rounded-t-lg relative overflow-hidden h-full">
<div class="absolute bottom-0 left-0 w-full bar-gradient transition-all" style="height: 60%;"></div>
</div>
<span class="text-[10px] text-white/30 font-medium">SUN</span>
</div>
</div>
</div>
<div class="glass-panel rounded-2xl overflow-hidden shadow-2xl">
<div class="p-6 border-b border-white/5 flex items-center justify-between">
<h3 class="font-semibold text-lg">Top Favorited Recipes</h3>
<div class="flex gap-2">
<button class="px-3 py-1.5 bg-white/5 hover:bg-white/10 rounded-md text-xs font-medium text-white/60 transition-all">All Time</button>
<button class="px-3 py-1.5 bg-[var(--primary)]/10 text-[var(--primary)] rounded-md text-xs font-bold border border-[var(--primary)]/20 transition-all">This Month</button>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-white/5">
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Rank</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Recipe Name</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Category</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40 text-right">Total Saves</th>
</tr>
</thead>
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5">
<span class="w-7 h-7 flex items-center justify-center rounded-full bg-[var(--primary)] text-black font-bold text-xs">1</span>
</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="h-12 w-16 rounded-lg overflow-hidden flex-shrink-0 border border-white/10">
<img alt="Truffle Pasta" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAm8Tj_q3DGKF8RQtEbAtvWlECdi2YzUCe_3_rlSHBG8gjDO4wUy19pDCfRDaBAYyZeKLmOkDi6-bdUgJvox88PDaNkDj63gIoJr31G5riM5MeNRwFJLYgKNNAWUBi5ofwVaxJLvVZ2Ju5he74DFeO9JZKJOhn91Ui232Y08fRWXtBs6LmUp2NbwQrdrGM5mm1ToFc7iDXHzf2f0XbL5vjcYiswaBoLZF8U4ur_qXZyIM3h7lT7URJkPDMcaRnDDiibqWr-iXHFILBf"/>
</div>
<div>
<p class="font-medium text-white/90 group-hover:text-white transition-colors">Black Truffle Tagliatelle</p>
<p class="text-[10px] text-white/30 uppercase tracking-wider">Chef Special</p>
</div>
</div>
</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">Italian Fine Dining</span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex flex-col items-end">
<span class="text-sm font-bold text-white">12,482</span>
<span class="text-[10px] text-green-400">+1.2k this week</span>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5">
<span class="w-7 h-7 flex items-center justify-center rounded-full bg-white/10 text-white/60 font-bold text-xs">2</span>
</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="h-12 w-16 rounded-lg overflow-hidden flex-shrink-0 border border-white/10">
<img alt="Salmon" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCQx2bc-er448odsCDfIgSExb5AFqaQoJxl3ySotHaDqhydI7fiFsa2Co4YEAq3x9k2__0zWjSv2bGZuL-pipMg45wMTnEsppFDnLEBzsPP2JboFZeg1nzefFBx0n7uf4544o6PYs86uTassxB7cohS5sKk4yn-YBUG8Z8jRxkGu6wrsIvKKa7aQHbgvlgQXoR6tK3b4zmdNqCWeLF6c-KmkK9oCxFSYTONRpGEfl9_Q-D3az9iJIRYWqeIbSdfGCYGK2K8BCg27Mc4"/>
</div>
<div>
<p class="font-medium text-white/90 group-hover:text-white transition-colors">Glazed Miso Salmon</p>
<p class="text-[10px] text-white/30 uppercase tracking-wider">Fusion</p>
</div>
</div>
</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">Modern Asian</span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex flex-col items-end">
<span class="text-sm font-bold text-white">9,812</span>
<span class="text-[10px] text-green-400">+842 this week</span>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5">
<span class="w-7 h-7 flex items-center justify-center rounded-full bg-white/10 text-white/60 font-bold text-xs">3</span>
</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="h-12 w-16 rounded-lg overflow-hidden flex-shrink-0 border border-white/10">
<img alt="Duck" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAlaX9quX3a3Ou2EPcMCH3SYpkhszyFjlPbEK_A4L7m4zabBqu0vksBq6CukqXLGfRENJvxcgr424gW8YJM6SW91mg8gr8YdOKghPv_6ZQHtv3pwi-MhlLbtZJWx1gMXI2U7dqT_IjV3ZNAjc0_gP4rNFnG-TZsEAFp2lZY8VlZqeTdS2asdrJ0sOzffcixZ0v49N5wZ46K2JZdXwdi6nZmjkYjkJlZ6I06RnpGrJlHwTe0Su2m5ZKbC37HFIaEL2Xh6pDqlUdjxIeZ"/>
</div>
<div>
<p class="font-medium text-white/90 group-hover:text-white transition-colors">Pan-Seared Duck Breast</p>
<p class="text-[10px] text-white/30 uppercase tracking-wider">Traditional</p>
</div>
</div>
</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">French Classic</span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex flex-col items-end">
<span class="text-sm font-bold text-white">8,540</span>
<span class="text-[10px] text-green-400">+312 this week</span>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5">
<span class="w-7 h-7 flex items-center justify-center rounded-full bg-white/10 text-white/60 font-bold text-xs">4</span>
</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<div class="h-12 w-16 rounded-lg overflow-hidden flex-shrink-0 border border-white/10">
<img alt="Dessert" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB_DuH6YfNjls7how7oXsrV6BCNekcE0K7CcyxqLlqWbQDTicr-z_DDFRgpAeauWoz2oqJxzGFwuPcNJaiyKyXDmpwiTbwoUf2bJe5UtnJ1T-ymk9GaVi2oRkn5x-Pa45rpsdh8lOqati1_-vLETTCVHrS91g6t2mmHrDAnB0Eco0ssg7YekXB7orN1924_xX6s8wOIX7Fm8nf7a59YAjZymdxR4xzxiVwBX_-uVqObahFgk2zsY3_M6Da2pOaQMoaZ2RqoRuZujSjl"/>
</div>
<div>
<p class="font-medium text-white/90 group-hover:text-white transition-colors">Saffron Poached Pears</p>
<p class="text-[10px] text-white/30 uppercase tracking-wider">Sweet</p>
</div>
</div>
</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">Patisserie</span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex flex-col items-end">
<span class="text-sm font-bold text-white">7,221</span>
<span class="text-[10px] text-white/40">+12 this week</span>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-6 flex items-center justify-between border-t border-white/5">
<p class="text-xs text-white/30">Displaying top <span class="text-white/60">4</span> trending recipes</p>
<button class="text-[var(--primary)] text-xs font-bold flex items-center gap-1 hover:underline">
                    View Full Report
                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
</button>
</div>
</div>
</div>
</main>

</body></html>