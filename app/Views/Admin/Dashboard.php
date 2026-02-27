<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
    <div>
        <h2 class="serif text-4xl font-bold tracking-tight mb-2">Dashboard Overview</h2>
        <p class="text-white/40 text-sm">Welcome back, <?= session()->get('username') ?? 'Admin' ?>!</p>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
    <div class="glass-panel rounded-2xl p-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-[var(--primary)]/10 rounded-xl">
                <span class="material-symbols-outlined text-[var(--primary)]">group</span>
            </div>
            <div>
                <p class="text-white/40 text-xs uppercase tracking-wider">Total Users</p>
                <h3 class="text-2xl font-bold"><?= $total_users ?? 0 ?></h3>
            </div>
        </div>
    </div>
    
    <div class="glass-panel rounded-2xl p-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-[var(--primary)]/10 rounded-xl">
                <span class="material-symbols-outlined text-[var(--primary)]">restaurant_menu</span>
            </div>
            <div>
                <p class="text-white/40 text-xs uppercase tracking-wider">Total Recipes</p>
                <h3 class="text-2xl font-bold"><?= $total_recipes ?? 0 ?></h3>
            </div>
        </div>
    </div>
    
    <div class="glass-panel rounded-2xl p-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-[var(--primary)]/10 rounded-xl">
                <span class="material-symbols-outlined text-[var(--primary)]">chat_bubble</span>
            </div>
            <div>
                <p class="text-white/40 text-xs uppercase tracking-wider">Comments</p>
                <h3 class="text-2xl font-bold"><?= $total_comments ?? 0 ?></h3>
            </div>
        </div>
    </div>
    
    <div class="glass-panel rounded-2xl p-6">
        <div class="flex items-center gap-4">
            <div class="p-3 bg-[var(--primary)]/10 rounded-xl">
                <span class="material-symbols-outlined text-[var(--primary)]">favorite</span>
            </div>
            <div>
                <p class="text-white/40 text-xs uppercase tracking-wider">Favorites</p>
                <h3 class="text-2xl font-bold"><?= $total_favorites ?? 0 ?></h3>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>