<!-- Hero Section -->
<header class="relative w-full h-[70vh] flex items-end overflow-hidden pt-16">
    <img alt="<?= $recipe['title'] ?? 'Recipe Image' ?>"
        class="absolute inset-0 w-full h-full object-cover"
        src="<?= base_url('uploads/recipes/' . ($recipe['image'] ?? 'default.jpg')) ?>" />
    <div class="absolute inset-0 hero-gradient"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 w-full">
        <div class="max-w-3xl">
            <span class="inline-block px-3 py-1 rounded-full bg-[var(--primary)]/20 text-[var(--primary)] text-xs font-bold uppercase tracking-widest mb-4 backdrop-blur-sm border border-[var(--primary)]/30">
                <?= $recipe['category_name'] ?? 'Szechuan Fusion' ?>
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white serif-title leading-tight mb-6">
                <?= $recipe['title'] ?? 'Spicy Shrimp Stir-fry' ?>
            </h1>
            <div class="flex flex-wrap gap-4">
                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="/recipe/toggleFavorite/<?= $recipe['id_recipe'] ?>"
                        class="flex items-center gap-2 <?= $is_favorite ? 'bg-[var(--primary)]' : 'bg-[var(--primary)]/80 hover:bg-[var(--primary)]' ?> text-white px-6 py-3 rounded-full font-bold transition-all shadow-lg shadow-[var(--primary)]/20">
                        <span class="material-symbols-outlined text-sm"><?= $is_favorite ? 'favorite' : 'favorite_border' ?></span>
                        <?= $is_favorite ? 'Saved to Favorites' : 'Save to Favorites' ?>
                    </a>
                <?php else: ?>
                    <a href="/login" class="flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/20 px-6 py-3 rounded-full font-bold transition-all">
                        <span class="material-symbols-outlined text-sm">favorite_border</span>
                        Login to Save
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>