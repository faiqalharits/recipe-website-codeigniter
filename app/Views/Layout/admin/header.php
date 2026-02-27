<header class="h-20 glass-panel border-t-0 border-l-0 border-r-0 px-8 flex items-center justify-between sticky top-0 z-10">
    <div class="flex items-center gap-4 flex-1">
        <div class="relative w-full max-w-md">
            <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-white/30 text-xl">search</span>
            <input class="w-full bg-white/5 border-white/10 rounded-full py-2 pl-10 pr-4 text-sm focus:ring-[var(--primary)] focus:border-[var(--primary)] text-white placeholder:text-white/30" 
                   placeholder="Search across recipes, users..." type="text"/>
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
                <p class="text-xs font-semibold"><?= session()->get('username') ?? 'Admin User' ?></p>
                <p class="text-[10px] text-white/40 capitalize"><?= session()->get('role') ?? 'Administrator' ?></p>
            </div>
            <div class="w-10 h-10 rounded-full bg-[var(--primary)]/20 flex items-center justify-center">
                <span class="material-symbols-outlined text-[var(--primary)]">person</span>
            </div>
        </div>
    </div>
</header>