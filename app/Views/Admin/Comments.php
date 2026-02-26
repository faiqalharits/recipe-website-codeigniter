<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FR Admin - Comment Moderator</title>
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
            --approve-green: #22c55e;
            --pending-orange: #f97316;
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
        }.toggle-checkbox:checked + .toggle-label {
            background-color: var(--primary);
        }
        .toggle-checkbox:checked + .toggle-label .toggle-dot {
            transform: translateX(100%);
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
<input class="w-full bg-white/5 border-white/10 rounded-full py-2 pl-10 pr-4 text-sm focus:ring-[var(--primary)] focus:border-[var(--primary)] text-white placeholder:text-white/30" placeholder="Search comments, users or recipes..." type="text"/>
</div>
</div>
<div class="flex items-center gap-6">
<div class="flex items-center gap-2 px-3 py-1.5 bg-white/5 rounded-lg border border-white/10">
<span class="w-2 h-2 rounded-full bg-[var(--primary)] animate-pulse"></span>
<span class="text-[10px] uppercase tracking-widest text-white/60 font-medium">12 New Comments</span>
</div>
<div class="h-8 w-[1px] bg-white/10"></div>
<div class="flex items-center gap-3">
<div class="text-right">
<p class="text-xs font-semibold">Admin User</p>
<p class="text-[10px] text-white/40">Moderator Level 2</p>
</div>
<img alt="Admin Profile" class="w-10 h-10 rounded-full border border-white/10 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUocqaMNszkB2LvvkeahcVuT-HVMwFgFfye-jZ9gFXS2NcOZ1bTth_lRjmsiwCVuB6gBs-MDljt3gAUTuPWZptR11pzKZ9ZVLhGm-fEx6l_nF7bxy8BrxM-ns83xxeMW8J2D0edVj6cgXJkoOV_m9yexlJlhGsOudyV3li5pIdExHWECTh4Tvd_TM4sqFFA9rdGmzesdZscm73s7hwGHG-SA4xcjWn9BctQ-h98ojDEcDWxI-ue9oYPhHXoUJYQUjkhsr3amt1eQOy"/>
</div>
</div>
</header>
<div class="p-10 max-w-7xl mx-auto w-full">
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
<div>
<h2 class="serif text-4xl font-bold tracking-tight mb-2">Comment Moderator</h2>
<p class="text-white/40 text-sm">Review, approve, or hide user feedback to maintain 'Food Heaven' quality standards.</p>
</div>
<div class="flex gap-3">
<button class="bg-white/5 hover:bg-white/10 border border-white/10 transition-all px-6 py-3 rounded-lg font-semibold text-sm flex items-center gap-2">
<span class="material-symbols-outlined text-xl">filter_list</span>
                    Filter
                </button>
<button class="bg-[var(--primary)] hover:bg-[#ea580c] transition-all px-6 py-3 rounded-lg font-semibold text-sm flex items-center gap-2 shadow-lg shadow-orange-950/20">
<span class="material-symbols-outlined text-xl">done_all</span>
                    Approve All Pending
                </button>
</div>
</div>
<div class="glass-panel rounded-2xl overflow-hidden shadow-2xl">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-white/5">
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">User</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Recipe</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Comment Text</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Date</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Status</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40 text-right">Visibility</th>
</tr>
</thead>
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full overflow-hidden border border-white/10">
<img alt="User" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAbLibZCi1acPrNGrMIelX1OrIqYbRTtCTMTnIKNBzWfS4jT-MA2FYa2Qr6nDuSS2365fs-g0lf-WDGAk9rd_XPKy5cXg1cPS0JsHY9vp2_g_LgVPgnQiBDkpEOcXgtsDLMr7hu9H7b6KEjSQ27Yjw0v0OQWm-lC0i0lT5kNM6QpQDM6wylLN68YX-Zp5PavUMWhwVWYasd8GOlHAmn77ZhG5Jv9GQ626EEfHYPFpAMFCQPppGp7zSYQZU77tsCi5O3MzQE4m7Y9L47"/>
</div>
<span class="text-sm font-medium text-white/90">Julian Vance</span>
</div>
</td>
<td class="px-8 py-5">
<span class="text-sm text-white/60">Black Truffle Tagliatelle</span>
</td>
<td class="px-8 py-5 max-w-xs">
<p class="text-sm text-white/80 line-clamp-2">The depth of flavor in the truffle sauce is incredible. I added a touch of lemon zest to brighten it up.</p>
</td>
<td class="px-8 py-5 text-sm text-white/30 whitespace-nowrap">2 mins ago</td>
<td class="px-8 py-5">
<span class="flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-wider text-[var(--pending-orange)]">
<span class="w-1.5 h-1.5 rounded-full bg-[var(--pending-orange)]"></span>
                                    Pending Review
                                </span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-4">
<button class="px-3 py-1.5 bg-[var(--primary)]/10 hover:bg-[var(--primary)]/20 text-[var(--primary)] text-xs font-bold rounded transition-all border border-[var(--primary)]/20">APPROVE</button>
<div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
<input class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 border-transparent appearance-none cursor-pointer outline-none" id="toggle1" name="toggle" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-white/10 cursor-pointer transition-colors" for="toggle1">
<span class="toggle-dot block h-full w-1/2 bg-white rounded-full shadow-sm transform transition-transform duration-200 ease-in"></span>
</label>
</div>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full overflow-hidden border border-white/10">
<img alt="User" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBe51oBK5d4XE2YQq6p8dOngGKG1xRw7k22EIqeXMeF2GtxPIC-t6pPfWK9TVnUPC8s08xWmSdgz6PEQ3MP8KrCJH1PZRZ-F25za48JtCW-K2emz21Ti14TeRs9zCmYcrFYDV53HoIfAyMKCj643wdCJ_Css9Zx7GasAS7tPo-b_pk5PFBWEgFXPydXqAwsb7FVDaf8GIrHG1grvqnsKdMITouI2dOOwBdbzJuQ1oQPjDbQwqG8-e3c6DcfNUTk-HUQ5JtCBE57jRRP"/>
</div>
<span class="text-sm font-medium text-white/90">Elena Rodriguez</span>
</div>
</td>
<td class="px-8 py-5">
<span class="text-sm text-white/60">Glazed Miso Salmon</span>
</td>
<td class="px-8 py-5 max-w-xs">
<p class="text-sm text-white/80 line-clamp-2">Perfectly balanced glaze. Does anyone know if this works well with cod too?</p>
</td>
<td class="px-8 py-5 text-sm text-white/30 whitespace-nowrap">1 hour ago</td>
<td class="px-8 py-5">
<span class="flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-wider text-[var(--approve-green)]">
<span class="w-1.5 h-1.5 rounded-full bg-[var(--approve-green)]"></span>
                                    Approved
                                </span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-4">
<button class="px-3 py-1.5 bg-white/5 text-white/20 text-xs font-bold rounded cursor-not-allowed border border-white/5" disabled="">APPROVED</button>
<div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 border-transparent appearance-none cursor-pointer outline-none" id="toggle2" name="toggle" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-[var(--primary)] cursor-pointer transition-colors" for="toggle2">
<span class="toggle-dot block h-full w-1/2 bg-white rounded-full shadow-sm transform translate-x-full transition-transform duration-200 ease-in"></span>
</label>
</div>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full overflow-hidden border border-white/10">
<img alt="User" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4R2yXtHcl4N2Th3Kb1ecdRIKxNUhJMJrVNxu269aWOJEc8DzhS7_EgXSPb-uSqq9TFzB4Z726NxaQs4vBfEKONCzaMH_iuVvDMTaNrOGFXn55fVXzdfWUFMQ9-Rhf4k9bcvqXxs-g35KuKXpUNNVmmGTe7wIkCk1-UIrkH_y0Wkm-CflCFIoVwX6mdp4zFhLgoKpuxezs9JJx4tqE3CvYJJ4c4c3Hl4OV34SQ-vHg4tDpPqi8gH-h5vjNYJT22Wp2jhOG8qdex3x3"/>
</div>
<span class="text-sm font-medium text-white/90">Marcus Chen</span>
</div>
</td>
<td class="px-8 py-5">
<span class="text-sm text-white/60">Pan-Seared Duck Breast</span>
</td>
<td class="px-8 py-5 max-w-xs">
<p class="text-sm text-white/80 line-clamp-2">The timing on the sear was exact. The reduction sauce could use a bit more honey next time.</p>
</td>
<td class="px-8 py-5 text-sm text-white/30 whitespace-nowrap">3 hours ago</td>
<td class="px-8 py-5">
<span class="flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-wider text-[var(--approve-green)]">
<span class="w-1.5 h-1.5 rounded-full bg-[var(--approve-green)]"></span>
                                    Approved
                                </span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-4">
<button class="px-3 py-1.5 bg-white/5 text-white/20 text-xs font-bold rounded cursor-not-allowed border border-white/5" disabled="">APPROVED</button>
<div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
<input checked="" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 border-transparent appearance-none cursor-pointer outline-none" id="toggle3" name="toggle" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-[var(--primary)] cursor-pointer transition-colors" for="toggle3">
<span class="toggle-dot block h-full w-1/2 bg-white rounded-full shadow-sm transform translate-x-full transition-transform duration-200 ease-in"></span>
</label>
</div>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-full overflow-hidden border border-white/10">
<img alt="User" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPsGCMWG-oihI9AtxyHpgXVHz4ilPyqxFaLHNzuAsnKlzWgNb3FMGBX1bLmmcr1_3OLvOYjZQrjrWWe74iY59x0i7FypewmhY5jDlh3TNiLMh-USGT-HvJW9J5vZoiBgqDlmXUIoTEY10ZaGozu4HuUy0xrwDsQ-nxVK_175sbWejgeki6ns0ZXOKDC-w2txt7VLhg3u9jcJrRq2vsYnlh5XEH-A64ugslHWgqqEhqdhqbg1oBXUPRa9y_1g3pH78cRditOgKlbzE8"/>
</div>
<span class="text-sm font-medium text-white/90">Sarah Miller</span>
</div>
</td>
<td class="px-8 py-5">
<span class="text-sm text-white/60">Saffron Poached Pears</span>
</td>
<td class="px-8 py-5 max-w-xs">
<p class="text-sm text-white/80 line-clamp-2">Absolutely stunning presentation. My guests were very impressed.</p>
</td>
<td class="px-8 py-5 text-sm text-white/30 whitespace-nowrap">Yesterday</td>
<td class="px-8 py-5">
<span class="flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-wider text-[var(--pending-orange)]">
<span class="w-1.5 h-1.5 rounded-full bg-[var(--pending-orange)]"></span>
                                    Pending Review
                                </span>
</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-4">
<button class="px-3 py-1.5 bg-[var(--primary)]/10 hover:bg-[var(--primary)]/20 text-[var(--primary)] text-xs font-bold rounded transition-all border border-[var(--primary)]/20">APPROVE</button>
<div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
<input class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 border-transparent appearance-none cursor-pointer outline-none" id="toggle4" name="toggle" type="checkbox"/>
<label class="toggle-label block overflow-hidden h-5 rounded-full bg-white/10 cursor-pointer transition-colors" for="toggle4">
<span class="toggle-dot block h-full w-1/2 bg-white rounded-full shadow-sm transform transition-transform duration-200 ease-in"></span>
</label>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-6 flex items-center justify-between border-t border-white/5">
<p class="text-xs text-white/30">Showing <span class="text-white/60">1-4</span> of <span class="text-white/60">42</span> recent comments</p>
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