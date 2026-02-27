<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>My Favorites<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    :root {
        --burnt-orange: #d97706;
        --deep-black: #080808;
        --charcoal: #121212;
        --gold-accent: #c5a059;
        --glass-bg: rgba(18, 18, 18, 0.7);
    }
</style>

<!-- Navbar -->
<nav class="fixed top-0 z-[100] w-full bg-transparent py-8 transition-all duration-500">
    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">
        <div class="flex justify-between items-center nav-blur bg-[var(--glass-bg)] border border-white/5 px-8 py-4 rounded-full">
            <div class="flex items-center gap-12">
                <div class="flex items-center gap-2">
                    <span class="text-2xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
                </div>
                <div class="hidden lg:flex items-center space-x-12">
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="/">Home</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="/about">About</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="/recipe">Recipe</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white hover:text-[var(--gold-accent)] transition-colors" href="/favorites">Favorites</a>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Header -->
<div class="pt-40 pb-20 px-8">
    <div class="max-w-[1400px] mx-auto">
        <div class="text-center mb-16">
            <span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.6em] uppercase mb-4 block">Personal Collection</span>
            <h1 class="text-6xl lg:text-7xl font-light text-white leading-tight mb-8 serif-title">My Favorites</h1>
            <div class="w-24 h-px bg-[var(--gold-accent)] mx-auto"></div>
        </div>
        
        <!-- Favorites Grid -->
        <?php if(!empty($favorites)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($favorites as $favorite): ?>
            <div class="group bg-[var(--charcoal)] border border-white/5 hover:border-[var(--gold-accent)] transition-all duration-500 overflow-hidden rounded-2xl">
                <div class="aspect-[4/3] overflow-hidden">
                    <img src="<?= base_url('uploads/recipes/' . ($favorite['image'] ?? 'default.jpg')) ?>" 
                         alt="<?= $favorite['title'] ?>"
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700">
                </div>
                <div class="p-8">
                    <h3 class="text-2xl text-white mb-3 font-light serif-title"><?= $favorite['title'] ?></h3>
                    <p class="text-stone-500 text-sm font-light mb-6 line-clamp-2">
                        <?= substr($favorite['description'], 0, 100) ?>...
                    </p>
                    <div class="flex justify-between items-center">
                        <a href="/recipe/<?= $favorite['id_recipe'] ?>" 
                           class="text-xs tracking-widest uppercase text-white/70 hover:text-[var(--gold-accent)] transition-colors inline-flex items-center gap-2">
                            View Recipe
                            <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </a>
                        <span class="text-white/30 text-[9px] uppercase tracking-wider">
                            <?= date('d M Y', strtotime($favorite['created_at'])) ?>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-32 border border-white/5 rounded-3xl bg-[var(--charcoal)]/50">
            <span class="material-symbols-outlined text-7xl text-white/20 mb-6">favorite</span>
            <p class="text-stone-500 text-lg mb-8">Your favorites collection is empty.</p>
            <a href="/recipe" class="inline-block px-8 py-4 bg-[var(--gold-accent)] text-black text-xs tracking-widest uppercase font-bold hover:bg-amber-700 transition-all rounded-lg">
                Explore Recipes
            </a>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Footer -->
<footer class="bg-[var(--deep-black)] border-t border-white/5 py-12">
    <div class="max-w-[1400px] mx-auto px-8 text-center">
        <p class="text-stone-600 text-[9px] uppercase tracking-[0.5em]">© <?= date('Y') ?> FOOD RECIPE ELITE. ALL RIGHTS RESERVED.</p>
    </div>
</footer>

<?= $this->endSection() ?>