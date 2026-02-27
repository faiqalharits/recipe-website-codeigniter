<footer class="bg-[var(--deep-black)] pt-32 pb-16">
    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-20 mb-32">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-2 mb-10">
                    <span class="text-4xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
                </div>
                <p class="text-stone-500 text-lg font-light max-w-md leading-relaxed mb-12">
                    Redefining home gastronomy through high-definition visual narratives and expert techniques. Join the elite circle of home chefs.
                </p>
                <div class="flex gap-10">
                    <a class="text-white/40 hover:text-[var(--gold-accent)] transition-colors" href="#"><span class="material-symbols-outlined">public</span></a>
                    <a class="text-white/40 hover:text-[var(--gold-accent)] transition-colors" href="#"><span class="material-symbols-outlined">photo_camera</span></a>
                    <a class="text-white/40 hover:text-[var(--gold-accent)] transition-colors" href="#"><span class="material-symbols-outlined">movie</span></a>
                </div>
            </div>
            <div>
                <h4 class="text-white text-xs font-bold uppercase tracking-[0.4em] mb-10">Directory</h4>
                <ul class="space-y-6">
                    <li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Private Gallery</a></li>
                    <li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Artisan Masterclasses</a></li>
                    <li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Member Reserve</a></li>
                    <li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Culinary Journal</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white text-xs font-bold uppercase tracking-[0.4em] mb-10">Intelligence</h4>
                <p class="text-stone-500 text-sm font-light mb-8 leading-loose">Subscribe for seasonal briefings on the world's most exclusive ingredients.</p>
                <div class="relative">
                    <input class="w-full bg-transparent border-b border-white/10 py-4 text-sm font-light focus:outline-none focus:border-[var(--gold-accent)] text-white transition-colors" placeholder="Professional Email" type="email"/>
                    <button class="absolute right-0 top-1/2 -translate-y-1/2 text-[var(--gold-accent)]">
                        <span class="material-symbols-outlined">arrow_right_alt</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="pt-12 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="text-[9px] text-stone-600 uppercase tracking-[0.5em] font-medium">
                © <?= date('Y') ?> Food Recipe Elite. All rights Reserved.
            </div>
            <div class="flex gap-12 text-[9px] uppercase tracking-[0.4em] text-white/30">
                <a class="hover:text-white transition-colors" href="#">Privacy</a>
                <a class="hover:text-white transition-colors" href="#">Terms</a>
                <a class="hover:text-white transition-colors" href="#">Legal</a>
            </div>
        </div>
    </div>
</footer>