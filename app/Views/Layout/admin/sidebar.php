<aside class="w-64 bg-black flex-shrink-0 border-r border-white/5 flex flex-col">
    <div class="p-8">
        <h1 class="serif text-3xl font-bold tracking-tighter text-[var(--primary)]">FR</h1>
        <p class="text-[10px] tracking-[0.2em] text-white/40 mt-1 uppercase">Food Recipe Elite</p>
    </div>
    
    <nav class="flex-1 px-4 space-y-1">
        <?php 
        $currentUrl = service('uri')->getPath();
        $isActive = function($path) use ($currentUrl) {
            return strpos($currentUrl, $path) !== false ? 'active' : '';
        };
        ?>
        
        <a class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium transition-all rounded-lg <?= $isActive('admin') && !$isActive('admin/users') ? 'bg-[var(--primary)]/10 text-[var(--primary)]' : 'text-white/60 hover:text-white hover:bg-white/5' ?>" 
           href="<?= base_url('admin') ?>">
            <span class="material-symbols-outlined text-xl">dashboard</span>
            Dashboard
        </a>
        
        <a class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium transition-all rounded-lg <?= $isActive('admin/users') ? 'bg-[var(--primary)]/10 text-[var(--primary)]' : 'text-white/60 hover:text-white hover:bg-white/5' ?>" 
           href="<?= base_url('admin/users') ?>">
            <span class="material-symbols-outlined text-xl">group</span>
            Users
        </a>
        
        <a class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium transition-all rounded-lg <?= $isActive('admin/recipes') ? 'bg-[var(--primary)]/10 text-[var(--primary)]' : 'text-white/60 hover:text-white hover:bg-white/5' ?>" 
           href="<?= base_url('admin/recipes') ?>">
            <span class="material-symbols-outlined text-xl">restaurant_menu</span>
            Recipes
        </a>
        
        <a class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium transition-all rounded-lg <?= $isActive('admin/comments') ? 'bg-[var(--primary)]/10 text-[var(--primary)]' : 'text-white/60 hover:text-white hover:bg-white/5' ?>" 
           href="<?= base_url('admin/comments') ?>">
            <span class="material-symbols-outlined text-xl">chat_bubble</span>
            Comments
        </a>
        
        <a class="sidebar-link flex items-center gap-3 px-4 py-3 text-sm font-medium transition-all rounded-lg <?= $isActive('admin/favorites') ? 'bg-[var(--primary)]/10 text-[var(--primary)]' : 'text-white/60 hover:text-white hover:bg-white/5' ?>" 
           href="<?= base_url('admin/favorites') ?>">
            <span class="material-symbols-outlined text-xl">favorite</span>
            Favorites
        </a>
    </nav>
    
    <div class="p-6 border-t border-white/5">
        <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-4 py-2 text-white/40 hover:text-white text-sm transition-all rounded-lg">
            <span class="material-symbols-outlined text-xl">logout</span>
            Sign Out
        </a>
    </div>
</aside>

<style>
    .sidebar-link.active {
        color: var(--primary);
        background: rgba(249, 115, 22, 0.1);
    }
</style>