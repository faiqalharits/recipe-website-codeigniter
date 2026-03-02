<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>The Art of Exquisite Taste<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- HERO SECTION -->
<section class="relative h-screen flex flex-col lg:flex-row overflow-hidden">
    <div class="w-full lg:w-1/2 h-full split-hero-left flex flex-col justify-center px-8 lg:px-24 relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none">
            <div class="w-full h-full bg-[radial-gradient(circle_at_center,_var(--gold-accent)_0%,_transparent_70%)]"></div>
        </div>
        <div class="relative z-10">
            <span class="inline-block text-[var(--gold-accent)] font-medium tracking-[0.5em] uppercase text-[10px] mb-2">Est. MMXXIV</span>
            <h1 class="text-6xl lg:text-8xl font-medium text-white mb-10 leading-[1.05] italic">
                The Art of <br/>
                <span class="text-gold-gradient font-bold not-italic">Exquisite</span> <br/>
                Taste
            </h1>
            <p class="text-stone-400 text-lg font-light mb-12 max-w-lg leading-relaxed">
                A sensory journey into the depths of culinary craftsmanship, where fire meets finesse and every ingredient tells a story of heritage.
            </p>
            <div class="flex items-center gap-10">
                <a class="group flex items-center gap-4 text-white text-sm font-semibold tracking-widest uppercase" href="<?= base_url('recipe') ?>">
                    Explore
                    <span class="w-12 h-px bg-[var(--gold-accent)] transition-all group-hover:w-20"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="w-full lg:w-1/2 h-full relative">
        <img alt="Flame-grilled dish with embers" class="w-full h-full object-cover" src="https://i.pinimg.com/1200x/ac/63/03/ac630338f1b8cc2961b2602f36d76318.jpg"/>
        <div class="absolute inset-0 bg-gradient-to-r from-[var(--charcoal)] via-transparent to-transparent hidden lg:block"></div>
        <div class="absolute bottom-12 right-12 flex flex-col items-end gap-2">
            <span class="text-[10px] uppercase tracking-[0.4em] text-white/40">Visual Experience</span>
            <div class="w-px h-24 bg-gradient-to-b from-transparent to-[var(--gold-accent)]"></div>
        </div>
    </div>
</section>

<!-- CURATED COLLECTIONS -->
<section class="py-40 px-8 lg:px-16 bg-[var(--deep-black)]">
    <div class="max-w-[1400px] mx-auto">
        <div class="mb-24 flex flex-col md:flex-row md:items-end justify-between gap-12">
            <div class="max-w-2xl">
                <span class="text-[var(--burnt-orange)] text-[10px] font-bold tracking-[0.6em] uppercase mb-4 block">Archive</span>
                <h2 class="text-5xl lg:text-7xl font-light text-white leading-tight">Curated Collections</h2>
            </div>
            <div class="md:w-1/3">
                <p class="text-stone-500 font-light leading-relaxed">Systematically organized by emotional resonance and flavor profiles, our archives represent the pinnacle of gastronomic research.</p>
            </div>
        </div>
        
        <!-- CATEGORY CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php if(isset($categories) && !empty($categories)): ?>
                <?php 
                $displayCategories = array_slice($categories, 0, 3);
                $images = [
                    'https://i.pinimg.com/1200x/1e/92/70/1e92708d4c30a0c225cd6e2a8d6aac8b.jpg',
                    'https://i.pinimg.com/1200x/5f/66/39/5f66391ae599dfeb0b9338bef8e81897.jpg',
                    'https://i.pinimg.com/736x/19/03/be/1903be255b1d8bdc93492f51c9b2b428.jpg'
                ];
                $subtitles = ['Sweet Finale', 'Main Attraction', 'Grand Opening'];
                
                foreach($displayCategories as $index => $category): 
                ?>
                <div class="group relative aspect-[3/4] overflow-hidden border border-white/5 transition-all duration-500 hover:border-[var(--gold-accent)] parallax-card <?= $index == 1 ? 'mt-12 md:mt-24' : '' ?>">
                    <img alt="<?= $category['category_name'] ?>" class="absolute inset-0 w-full h-full object-cover grayscale transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-110" src="<?= $images[$index] ?>"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-[var(--deep-black)] via-[var(--deep-black)]/20 to-transparent flex flex-col justify-end p-12">
                        <span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-4"><?= $subtitles[$index] ?></span>
                        <h3 class="text-4xl font-light text-white mb-6"><?= $category['category_name'] ?></h3>
                        <p class="text-stone-400 text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-500 max-w-xs">
                            <?= $category['description'] ?? 'Explore our collection of ' . $category['category_name'] . ' recipes' ?>
                        </p>
                        <a href="<?= base_url('recipe?category=' . $category['id_category']) ?>" class="mt-4 text-[var(--gold-accent)] text-xs tracking-widest uppercase opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            View Collection →
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Placeholder cards -->
                <div class="group relative aspect-[3/4] overflow-hidden border border-white/5 transition-all duration-500 hover:border-[var(--gold-accent)] parallax-card">
                    <img alt="Dessert" class="absolute inset-0 w-full h-full object-cover grayscale transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-110" src="https://images.unsplash.com/photo-1558030006-4506753931b2?q=80&w=1000"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-[var(--deep-black)] via-[var(--deep-black)]/20 to-transparent flex flex-col justify-end p-12">
                        <span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-4">Sweet Finale</span>
                        <h3 class="text-4xl font-light text-white mb-6">Dessert</h3>
                        <p class="text-stone-400 text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-500 max-w-xs">Sweet dishes served after the main meal.</p>
                    </div>
                </div>
                <div class="group relative aspect-[3/4] overflow-hidden border border-white/5 transition-all duration-500 hover:border-[var(--gold-accent)] parallax-card mt-12 md:mt-24">
                    <img alt="Main Course" class="absolute inset-0 w-full h-full object-cover grayscale transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-110" src="https://images.unsplash.com/photo-1558030006-4506753931b2?q=80&w=1000"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-[var(--deep-black)] via-[var(--deep-black)]/20 to-transparent flex flex-col justify-end p-12">
                        <span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-4">Main Attraction</span>
                        <h3 class="text-4xl font-light text-white mb-6">Main Course</h3>
                        <p class="text-stone-400 text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-500 max-w-xs">The main dish of a meal.</p>
                    </div>
                </div>
                <div class="group relative aspect-[3/4] overflow-hidden border border-white/5 transition-all duration-500 hover:border-[var(--gold-accent)] parallax-card">
                    <img alt="Appetizer" class="absolute inset-0 w-full h-full object-cover grayscale transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-110" src="https://images.unsplash.com/photo-1558030006-4506753931b2?q=80&w=1000"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-[var(--deep-black)] via-[var(--deep-black)]/20 to-transparent flex flex-col justify-end p-12">
                        <span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-4">Grand Opening</span>
                        <h3 class="text-4xl font-light text-white mb-6">Appetizer</h3>
                        <p class="text-stone-400 text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-500 max-w-xs">Small dish served before the main course.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CHEF'S SIGNATURE SECTION -->
<?= $this->endSection() ?>