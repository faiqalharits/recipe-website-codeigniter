<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>FR Admin - User Management</title>
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
<input class="w-full bg-white/5 border-white/10 rounded-full py-2 pl-10 pr-4 text-sm focus:ring-[var(--primary)] focus:border-[var(--primary)] text-white placeholder:text-white/30" placeholder="Search users by name, email, or ID..." type="text"/>
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
<h2 class="serif text-4xl font-bold tracking-tight mb-2">User Management</h2>
<p class="text-white/40 text-sm">Oversee and manage the community members of Food Heaven Elite.</p>
</div>
<button class="bg-[var(--primary)] hover:bg-[#ea580c] transition-all px-6 py-3 rounded-lg font-semibold text-sm flex items-center gap-2 shadow-lg shadow-orange-950/20">
<span class="material-symbols-outlined text-xl">person_add</span>
                Add New User
            </button>
</div>
<div class="glass-panel rounded-2xl overflow-hidden shadow-2xl">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="border-b border-white/5">
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">User ID</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Profile</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Email</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Role</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Join Date</th>
<th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40 text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-white/5">
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5 text-sm font-medium text-white/30">#USR-1092</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<img alt="User Avatar" class="w-10 h-10 rounded-full border border-white/10 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDxwVlk9lVxxUqomijg3cxpenPxkvoUIZEtG--a_b3O2gpVyF-jHqS9vAG8WLN2cUM1DDFsmOOvmjMhw1qy_Z8iHjQIb13gr-mc8-uct6GmXF60_CaAHPFQdiOdIa8cVsDallrY-n4fCu5g7d4IUknJGJLQIwfLfwNYU2kRRJ0IhsTL46E616XcPeW3eVpuwKgSsleff-e-aI6U7XtmmaTi8fm_TQgZLeIAh1ehpJ60B-9k0BkkryXUAjOZn6U4LOssfGFdHXu57Irf"/>
<span class="font-medium text-white/90 group-hover:text-white transition-colors">Julianne Sterling</span>
</div>
</td>
<td class="px-8 py-5 text-sm text-white/60">j.sterling@luxury.com</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-orange-500/10 border border-orange-500/20 rounded-full text-[10px] font-bold uppercase tracking-wider text-[var(--primary)]">Admin</span>
</td>
<td class="px-8 py-5 text-sm text-white/40">Oct 12, 2023</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-3">
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all" title="Edit User">
<span class="material-symbols-outlined text-lg">edit</span>
</button>
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all" title="Deactivate User">
<span class="material-symbols-outlined text-lg">block</span>
</button>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5 text-sm font-medium text-white/30">#USR-1085</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<img alt="User Avatar" class="w-10 h-10 rounded-full border border-white/10 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBAKjo8U98GzMzM-vfcX4mLRzA0Ysm6bo5Q-2bLOrjpyUPiNyVvG98PqjppFCnds2kbxN4Wkl8y0Lys2HL7I8MwQB0ZOto_3YmT1Q5TO_xSHpV1gPlLpYUzcfhMsK5PWT7vT-5oHyUHQZhFHImDx7ky1ZMzfHS5bX1zJQe_8g7nNj2oGki8wzM_rcb5nvnoF8pE4phvx70Jb9TvnVMv0vbYRnveLka6eHMBN49rcEwlIjacFftoB1tpgZsj4zEGiw4mBhFJXRkD3CPx"/>
<span class="font-medium text-white/90 group-hover:text-white transition-colors">Marcus Thorne</span>
</div>
</td>
<td class="px-8 py-5 text-sm text-white/60">m.thorne@epicurean.net</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[10px] font-bold uppercase tracking-wider text-white/60">User</span>
</td>
<td class="px-8 py-5 text-sm text-white/40">Nov 05, 2023</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-3">
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all" title="Edit User">
<span class="material-symbols-outlined text-lg">edit</span>
</button>
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all" title="Deactivate User">
<span class="material-symbols-outlined text-lg">block</span>
</button>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5 text-sm font-medium text-white/30">#USR-1077</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<img alt="User Avatar" class="w-10 h-10 rounded-full border border-white/10 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCA7aru4sqv3VgChUEw8m8hPlTb18Hy9vAP1PJtTTLZyY-uNVIPhnyZFvfXtHfaMXxkYJfgtXpgdQhd55NRfz2S1vL1sdFkB62KXCjMx_WVeMz-5sCJLF-4ccPrRCkT3PI0O4trfJWpCylQ4zlsoFkoKNf6EtAkbRufShSfaVogMejmJAkmMx2es2-ICdpjOw6Lg8iDJ1R5O0VN9xWaiFsV2vQQNJYoS-tvgCKB7jzpyR-vA44-s0qSulH_1ZP23eFXwNRjq1pdC-2r"/>
<span class="font-medium text-white/90 group-hover:text-white transition-colors">Elena Rossi</span>
</div>
</td>
<td class="px-8 py-5 text-sm text-white/60">elena.rossi@gastronomy.it</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[10px] font-bold uppercase tracking-wider text-white/60">User</span>
</td>
<td class="px-8 py-5 text-sm text-white/40">Dec 18, 2023</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-3">
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all" title="Edit User">
<span class="material-symbols-outlined text-lg">edit</span>
</button>
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all" title="Deactivate User">
<span class="material-symbols-outlined text-lg">block</span>
</button>
</div>
</td>
</tr>
<tr class="hover:bg-white/[0.02] transition-colors group">
<td class="px-8 py-5 text-sm font-medium text-white/30">#USR-1064</td>
<td class="px-8 py-5">
<div class="flex items-center gap-4">
<img alt="User Avatar" class="w-10 h-10 rounded-full border border-white/10 object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCT2ujWrsrhA0vTW70F_Tw3lEUlwpAO8Z0JvK374DvnkmONgX70g-DC7ZPrGcz4OpboJ8K2tPh7VkhTzIsyYjqLxsem9X-GpzUETgqWI6HXgF5NfwZiz0UEFMtMeiHTOkuw-vV5NHjm6VToUUdyki84_tjAwuxVfvplRchJFyxqZRikgdSTdVkIgGEYevmwy-L6mMOKSo3ZWH3kVvvZ8PncpkM98srCdumpYC8zLjQhZ5k45xXfj9XTJHoTPqfkT0-b3RI0HKvcy_bx"/>
<span class="font-medium text-white/90 group-hover:text-white transition-colors">David Chen</span>
</div>
</td>
<td class="px-8 py-5 text-sm text-white/60">d.chen@oriental.com</td>
<td class="px-8 py-5">
<span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[10px] font-bold uppercase tracking-wider text-white/60">User</span>
</td>
<td class="px-8 py-5 text-sm text-white/40">Jan 22, 2024</td>
<td class="px-8 py-5 text-right">
<div class="flex items-center justify-end gap-3">
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all" title="Edit User">
<span class="material-symbols-outlined text-lg">edit</span>
</button>
<button class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all" title="Deactivate User">
<span class="material-symbols-outlined text-lg">block</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<div class="px-8 py-6 flex items-center justify-between border-t border-white/5">
<p class="text-xs text-white/30">Showing <span class="text-white/60">1-4</span> of <span class="text-white/60">412</span> users</p>
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