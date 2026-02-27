<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Recipe Collection<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="pt-32 pb-20 px-8 lg:px-16">
    <div class="max-w-[1400px] mx-auto">
        
        <!-- Header -->
        <div class="mb-16">
            <span class="text-[var(--burnt-orange)] text-[10px] font-bold tracking-[0.6em] uppercase mb-4 block">The Collection</span>
            <h1 class="text-6xl lg:text-7xl font-light text-white leading-tight mb-8">Recipe Archive</h1>
            
            <!-- Category Filter -->
            <div class="flex flex-wrap gap-4">
                <a href="/recipe" 
                   class="px-6 py-3 text-xs tracking-widest uppercase border <?= !$selectedCategory ? 'bg-[var(--gold-accent)] text-black' : 'border-white/20 text-white/70 hover:border-[var(--gold-accent)]' ?> transition-all">
                    All
                </a>
                <?php foreach($categories as $category): ?>
                <a href="/recipe?category=<?= $category['id_category'] ?>" 
                   class="px-6 py-3 text-xs tracking-widest uppercase border <?= $selectedCategory == $category['id_category'] ? 'bg-[var(--gold-accent)] text-black' : 'border-white/20 text-white/70 hover:border-[var(--gold-accent)]' ?> transition-all">
                    <?= $category['category_name'] ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Recipe Grid -->
        <?php if(!empty($recipes)): ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($recipes as $index => $recipe): ?>
            <div class="group relative bg-[var(--charcoal)] border border-white/5 hover:border-[var(--gold-accent)] transition-all duration-500 overflow-hidden">
                <div class="aspect-[4/3] overflow-hidden">
                    <img src="<?= base_url('uploads/recipes/' . ($recipe['image'] ?? 'default.jpg')) ?>" 
                         alt="<?= $recipe['title'] ?>"
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700">
                </div>
                <div class="p-8">
                    <span class="text-[var(--gold-accent)] text-[10px] tracking-[0.3em] uppercase mb-3 block">
                        <?= $recipe['category_name'] ?? 'Uncategorized' ?>
                    </span>
                    <h3 class="text-2xl text-white mb-3 font-light"><?= $recipe['title'] ?></h3>
                    <p class="text-stone-500 text-sm font-light mb-6 line-clamp-2">
                        <?= substr($recipe['description'], 0, 100) ?>...
                    </p>
                    <a href="/recipe/<?= $recipe['id_recipe'] ?>" 
                       class="inline-flex items-center gap-4 text-xs tracking-widest uppercase text-white/70 hover:text-[var(--gold-accent)] transition-colors">
                        View Recipe
                        <span class="w-8 h-px bg-[var(--gold-accent)]"></span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-20">
            <p class="text-stone-500 text-lg">No recipes found.</p>
        </div>
        <?php endif; ?>
        
    </div>
</div>
<?= $this->endSection() ?>