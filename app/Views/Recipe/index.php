<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Elite Gallery | FR Culinary</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&amp;family=Inter:wght@200;300;400;500;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style type="text/tailwindcss">
        :root {
            --burnt-orange: #E67E22;
            --deep-black: #080808;
            --charcoal: #121212;
            --gold-accent: #c5a059;
            --glass-bg: rgba(18, 18, 18, 0.85);
        }
        @layer base {
            body {
                @apply bg-[var(--charcoal)] text-stone-300 font-['Inter'] selection:bg-[var(--burnt-orange)] selection:text-white;
            }
            h1, h2, h3, h4 {
                @apply font-['Playfair_Display'];
            }
        }
        .nav-blur {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .recipe-card {
            transition: all 0.5s cubic-bezier(0.2, 0, 0.2, 1);
        }
        .recipe-card:hover {
            border-color: rgba(197, 160, 89, 0.3);
            transform: translateY(-4px);
        }
        .monochrome-img {
            filter: grayscale(100%) brightness(0.8);
            transition: all 0.8s ease;
        }
        .recipe-card:hover .monochrome-img {
            filter: grayscale(0%) brightness(1);
        }
    </style>
</head>
<body class="overflow-x-hidden">
<nav class="fixed top-0 z-[100] w-full bg-transparent py-8 transition-all duration-500">
<div class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="flex justify-between items-center nav-blur bg-[var(--glass-bg)] border border-white/5 px-10 py-4 rounded-full">
<div class="flex items-center gap-16">
<div class="flex items-center gap-2">
<span class="text-3xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
</div>
<div class="hidden lg:flex items-center space-x-12">
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('/') ?>">Home</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('about') ?>">About</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('recipe') ?>">Recipe</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('favorites') ?>">Favorites</a>
</div>
</div>
<div class="flex items-center gap-8">
<button class="text-white/80 hover:text-white">
<span class="material-symbols-outlined font-light text-2xl">search</span>
</button>
<button class="text-white/80 hover:text-white lg:hidden">
<span class="material-symbols-outlined font-light text-2xl">menu</span>
</button>
</div>
</div>
</div>
</nav>
<main class="pt-48 pb-32">
<section class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="mb-20">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.6em] uppercase mb-4 block">Masterclass Archive</span>
<h1 class="text-6xl lg:text-7xl font-light text-white mb-6"><span class="italic">Elite</span> Culinary Gallery</h1>
<p class="text-stone-500 font-light max-w-2xl text-lg leading-relaxed">
                    Explore our curated collection of haute cuisine, where every dish is a symphony of rare ingredients and avant-garde techniques.
                </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
<div class="recipe-card group bg-[var(--deep-black)] border border-white/5 overflow-hidden flex flex-col">
<div class="relative aspect-[4/5] overflow-hidden">
<img alt="Exquisite dish" class="monochrome-img w-full h-full object-cover group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7hXnlCVYLI0DQVDD3w9skBUxbGR8WnuwtD2gT-VR5JU0chlBHldfA_1hzI45VaKZBfKyHWGlF_-buczugVnikMrcOg-lRvbgGXz6ruQonYvzYQsOyi-mXSK2OexfRiOFQ4dFLIneU3IkW5oV8X7KsUsurmjYvwmtEQsJpGBuOkATGmIqHxl-3i3nowczTAw9uJHrqQLNMZIPeldW0fQnk73UAQUzsfRSxqL_4UUctbp859vAskUlwcPm0LtFZkdtIHOnUL6qY6Ati"/>
</div>
<div class="p-8 flex flex-col flex-grow">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-3 block">ZENITH COLLECTION</span>
<h3 class="text-2xl font-light text-white mb-4">The Ember Charred Ribeye</h3>
<p class="text-stone-500 text-sm font-light leading-relaxed mb-8">
                            Signature aged protein finished with fermented black garlic reduction and wild hickory smoke.
                        </p>
<div class="mt-auto pt-6 flex flex-col gap-4">
<button onclick="window.location.href='<?= base_url('recipe/1') ?>'"
    class="w-full py-4 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:brightness-110 transition-all">
    View Recipe
</button>
<a class="text-center text-white/40 hover:text-white text-[9px] font-bold tracking-[0.3em] uppercase transition-colors" href="#">
                                Save to Favorites
                            </a>
</div>
</div>
</div>
<div class="recipe-card group bg-[var(--deep-black)] border border-white/5 overflow-hidden flex flex-col">
<div class="relative aspect-[4/5] overflow-hidden">
<img alt="Plated course" class="monochrome-img w-full h-full object-cover group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7hXnlCVYLI0DQVDD3w9skBUxbGR8WnuwtD2gT-VR5JU0chlBHldfA_1hzI45VaKZBfKyHWGlF_-buczugVnikMrcOg-lRvbgGXz6ruQonYvzYQsOyi-mXSK2OexfRiOFQ4dFLIneU3IkW5oV8X7KsUsurmjYvwmtEQsJpGBuOkATGmIqHxl-3i3nowczTAw9uJHrqQLNMZIPeldW0fQnk73UAQUzsfRSxqL_4UUctbp859vAskUlwcPm0LtFZkdtIHOnUL6qY6Ati"/>
</div>
<div class="p-8 flex flex-col flex-grow">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-3 block">HERITAGE SELECTION</span>
<h3 class="text-2xl font-light text-white mb-4">Truffle Infused Essence</h3>
<p class="text-stone-500 text-sm font-light leading-relaxed mb-8">
                            An exploration of earth and air, featuring seasonal black winter truffles and cold-pressed reduction.
                        </p>
<div class="mt-auto pt-6 flex flex-col gap-4">
<button class="w-full py-4 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:brightness-110 transition-all">
                                View Recipe
                            </button>
<a class="text-center text-white/40 hover:text-white text-[9px] font-bold tracking-[0.3em] uppercase transition-colors" href="#">
                                Save to Favorites
                            </a>
</div>
</div>
</div>
<div class="recipe-card group bg-[var(--deep-black)] border border-white/5 overflow-hidden flex flex-col">
<div class="relative aspect-[4/5] overflow-hidden">
<img alt="Dessert art" class="monochrome-img w-full h-full object-cover group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJ_xB7Z8pR1yW0dmiTyUBapO9IEEx0xbGE3ljhd_rl2tbYp7vnJVHf7Gtp7ObInNERYgHTPpq_ve3XT8v64QOrvHlTSnMncTXYw6EucoYfk5tdA3pAMySNX70Iug-5qaFP3XjCjspeewwMdfyFzXhvAfG5Rg0AiIpIKe5Z_E-CJJ-QomSGsPSDRvp3uNDRzyhwLWfOUYkXaLh2gUCAiqh0ncJ8VHG_MtU3wcH3kV0NZUYt5POTZMWpjQ_POjgmoExo1ABysY7Dg2ZT"/>
</div>
<div class="p-8 flex flex-col flex-grow">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-3 block">DECADENCE ARCHIVE</span>
<h3 class="text-2xl font-light text-white mb-4">Architectural Patisserie</h3>
<p class="text-stone-500 text-sm font-light leading-relaxed mb-8">
                            Layers of Venezuelan cacao and Madagascar vanilla, structured with geometric precision and velvet textures.
                        </p>
<div class="mt-auto pt-6 flex flex-col gap-4">
<button class="w-full py-4 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:brightness-110 transition-all">
                                View Recipe
                            </button>
<a class="text-center text-white/40 hover:text-white text-[9px] font-bold tracking-[0.3em] uppercase transition-colors" href="#">
                                Save to Favorites
                            </a>
</div>
</div>
</div>
<div class="recipe-card group bg-[var(--deep-black)] border border-white/5 overflow-hidden flex flex-col">
<div class="relative aspect-[4/5] overflow-hidden">
<img alt="Gourmet dish" class="monochrome-img w-full h-full object-cover group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDiBouQQsEjHq5-VECp6HW_HT4Mxfdt3oSXqqyAZl88CXZ8HHUdlcSovkadhoJLH78DT9EOWEUtjAKVPv2rSiM4Fvkhg_NpBd-_6kmgwGGLOisU7pSY55qa8R69mC3OzGZTR1l60pDI5rymTUrIhXedpavzxE7XEqgcLX-dRvjDmXXa4nJvOfi46TUt5yLBeN0IBJ2cWnrCS4XkdZQCugtnhMvI2n6_FoN3a6mRwPrTgWQcoBaS1zaf2AhC-3a04lyYO-5vYDB2MTF7"/>
</div>
<div class="p-8 flex flex-col flex-grow">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-3 block">PACIFIC RIM</span>
<h3 class="text-2xl font-light text-white mb-4">Saffron Poached Halibut</h3>
<p class="text-stone-500 text-sm font-light leading-relaxed mb-8">
                            Wild-caught halibut gently infused with Persian saffron, served with a delicate emulsion of sea minerals.
                        </p>
<div class="mt-auto pt-6 flex flex-col gap-4">
<button class="w-full py-4 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:brightness-110 transition-all">
                                View Recipe
                            </button>
<a class="text-center text-white/40 hover:text-white text-[9px] font-bold tracking-[0.3em] uppercase transition-colors" href="#">
                                Save to Favorites
                            </a>
</div>
</div>
</div>
<div class="recipe-card group bg-[var(--deep-black)] border border-white/5 overflow-hidden flex flex-col">
<div class="relative aspect-[4/5] overflow-hidden">
<img alt="Elegant culinary" class="monochrome-img w-full h-full object-cover group-hover:scale-105" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD_4YsvxOEU1eRc066XjdBwStAR-p84m8YLKFueWNShDdeIwH7_klECKAKBwBCydBBYuSag0FLBk8riBOwiQwgpcY7GbcCSWCyLxRQ_pYlo0DquWRRRynw78KxVfRKCwizHPvUHqvm31hwHXq1r_ggF8ID0Ikm7NsHBh4FVxsus7ydqBleEvXO-hRWynto6zr2fxpBERcKF88hr7YbcmBYUzY3P30kbsaZ0-auJh2yLKzUVNCdWk7J0K8t7TbVmKfMYopvqidaYs2w6"/>
</div>
<div class="p-8 flex flex-col flex-grow">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-3 block">TERROIR SERIES</span>
<h3 class="text-2xl font-light text-white mb-4">Smoked Duck Breast</h3>
<p class="text-stone-500 text-sm font-light leading-relaxed mb-8">
                            Maple-wood smoked breast served with a vibrant beet reduction and parsnip purée.
                        </p>
<div class="mt-auto pt-6 flex flex-col gap-4">
<button class="w-full py-4 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:brightness-110 transition-all">
                                View Recipe
                            </button>
<a class="text-center text-white/40 hover:text-white text-[9px] font-bold tracking-[0.3em] uppercase transition-colors" href="#">
                                Save to Favorites
                            </a>
</div>
</div>
</div>
<div class="border border-white/5 border-dashed flex flex-col items-center justify-center p-12 text-center group hover:border-[var(--gold-accent)]/30 transition-all">
<span class="material-symbols-outlined text-5xl text-white/10 mb-6 group-hover:text-[var(--gold-accent)] transition-colors">auto_awesome</span>
<h3 class="text-xl text-white/50 mb-4">The Custom Experience</h3>
<p class="text-stone-600 text-sm font-light mb-8 max-w-[240px]">Request a bespoke menu tailored to your private gathering.</p>
<a class="text-[10px] uppercase tracking-[0.3em] text-[var(--gold-accent)] font-bold hover:text-white transition-colors" href="#">Contact Concierge</a>
</div>
</div>
</section>
</main>
<footer class="bg-[var(--deep-black)] pt-32 pb-16 border-t border-white/5">
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
<li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Home</a></li>
<li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Recipes</a></li>
<li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">The Chef</a></li>
<li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Favorites</a></li>
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
                    © MMXXIV FR Elite. All rights Reserved.
                </div>
<div class="flex gap-12 text-[9px] uppercase tracking-[0.4em] text-white/30">
<a class="hover:text-white transition-colors" href="#">Privacy</a>
<a class="hover:text-white transition-colors" href="#">Terms</a>
<a class="hover:text-white transition-colors" href="#">Legal</a>
</div>
</div>
</div>
</footer>

</body></html>