<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Elite Favorites | Food Heaven</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&amp;family=Inter:wght@200;300;400;500&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<style type="text/tailwindcss">
        :root {
            --burnt-orange: #d97706;
            --deep-black: #080808;
            --charcoal: #121212;
            --gold-accent: #c5a059;
            --glass-bg: rgba(18, 18, 18, 0.85);
        }
        @layer base {
            body {
                @apply bg-[var(--deep-black)] text-stone-300 font-['Inter'] selection:bg-[var(--burnt-orange)] selection:text-white;
            }
            h1, h2, h3, h4 {
                @apply font-['Playfair_Display'];
            }
        }
        .text-gold-gradient {
            background: linear-gradient(135deg, #fef3c7 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .nav-blur {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .favorite-card {
            transition: all 0.5s cubic-bezier(0.2, 0, 0.2, 1);
        }
        .favorite-card:hover {
            border-color: var(--gold-accent);
            transform: translateY(-4px);
        }
    </style>
</head>
<body class="overflow-x-hidden">
<nav class="fixed top-0 z-[100] w-full py-8 transition-all duration-500">
<div class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="flex justify-between items-center nav-blur bg-[var(--glass-bg)] border border-white/5 px-10 py-5 rounded-full">
<div class="flex items-center gap-16">
<div class="flex items-center">
<span class="text-3xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
</div>
<div class="hidden lg:flex items-center space-x-12">
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('/') ?>">Home</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('about') ?>">About</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('recipe') ?>">Recipe</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-bold text-white transition-colors border-b border-[var(--gold-accent)] pb-1" href="<?= base_url('favorites') ?>">Favorites</a>
</div>
</div>
<div class="flex items-center gap-8">
<button class="text-white/80 hover:text-white transition-colors">
<span class="material-symbols-outlined font-light text-2xl">search</span>
</button>
<button class="text-white/80 hover:text-white transition-colors lg:hidden">
<span class="material-symbols-outlined font-light text-2xl">menu</span>
</button>
</div>
</div>
</div>
</nav>
<main class="pt-48 pb-32">
<section class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="mb-20">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.6em] uppercase mb-4 block">Personal Selection</span>
<h1 class="text-6xl lg:text-7xl font-light text-white mb-6">Your <span class="italic">Elite</span> Favorites</h1>
<p class="text-stone-500 font-light max-w-xl text-lg leading-relaxed">
                    A private archive of your most cherished culinary discoveries. Curated for the discerning palate and refined home kitchen.
                </p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-12">
<div class="favorite-card group bg-[var(--charcoal)] border border-white/5 overflow-hidden">
<div class="relative aspect-[16/10] overflow-hidden">
<img alt="Flame-grilled dish" class="w-full h-full object-cover grayscale brightness-75 transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-105 group-hover:brightness-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7hXnlCVYLI0DQVDD3w9skBUxbGR8WnuwtD2gT-VR5JU0chlBHldfA_1hzI45VaKZBfKyHWGlF_-buczugVnikMrcOg-lRvbgGXz6ruQonYvzYQsOyi-mXSK2OexfRiOFQ4dFLIneU3IkW5oV8X7KsUsurmjYvwmtEQsJpGBuOkATGmIqHxl-3i3nowczTAw9uJHrqQLNMZIPeldW0fQnk73UAQUzsfRSxqL_4UUctbp859vAskUlwcPm0LtFZkdtIHOnUL6qY6Ati"/>
<div class="absolute top-6 right-6">
<button class="bg-black/50 backdrop-blur-md p-3 rounded-full text-white/50 hover:text-red-500 transition-colors">
<span class="material-symbols-outlined text-xl">delete</span>
</button>
</div>
</div>
<div class="p-10">
<div class="flex justify-between items-start mb-6">
<div>
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-2 block">Chef Julian Vane</span>
<h3 class="text-3xl font-light text-white">The Ember Charred Ribeye</h3>
</div>
</div>
<p class="text-stone-500 text-sm font-light leading-relaxed mb-10 max-w-md">
                            Signature aged protein finished with fermented black garlic reduction and wild hickory smoke.
                        </p>
<div class="flex items-center gap-6">
<button class="px-10 py-4 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:bg-orange-700 transition-all duration-300">
                                View Recipe
                            </button>
<button class="text-white/40 hover:text-white text-[10px] font-bold tracking-[0.3em] uppercase transition-colors">
                                Remove
                            </button>
</div>
</div>
</div>
<div class="favorite-card group bg-[var(--charcoal)] border border-white/5 overflow-hidden">
<div class="relative aspect-[16/10] overflow-hidden">
<img alt="Fine Dining Course" class="w-full h-full object-cover grayscale brightness-75 transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-105 group-hover:brightness-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7hXnlCVYLI0DQVDD3w9skBUxbGR8WnuwtD2gT-VR5JU0chlBHldfA_1hzI45VaKZBfKyHWGlF_-buczugVnikMrcOg-lRvbgGXz6ruQonYvzYQsOyi-mXSK2OexfRiOFQ4dFLIneU3IkW5oV8X7KsUsurmjYvwmtEQsJpGBuOkATGmIqHxl-3i3nowczTAw9uJHrqQLNMZIPeldW0fQnk73UAQUzsfRSxqL_4UUctbp859vAskUlwcPm0LtFZkdtIHOnUL6qY6Ati"/>
<div class="absolute top-6 right-6">
<button class="bg-black/50 backdrop-blur-md p-3 rounded-full text-white/50 hover:text-red-500 transition-colors">
<span class="material-symbols-outlined text-xl">delete</span>
</button>
</div>
</div>
<div class="p-10">
<div class="flex justify-between items-start mb-6">
<div>
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-2 block">Zenith Collection</span>
<h3 class="text-3xl font-light text-white">Truffle Infused Essence</h3>
</div>
</div>
<p class="text-stone-500 text-sm font-light leading-relaxed mb-10 max-w-md">
                            An exploration of earth and air, featuring seasonal black winter truffles and cold-pressed reduction.
                        </p>
<div class="flex items-center gap-6">
<button class="px-10 py-4 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:bg-orange-700 transition-all duration-300">
                                View Recipe
                            </button>
<button class="text-white/40 hover:text-white text-[10px] font-bold tracking-[0.3em] uppercase transition-colors">
                                Remove
                            </button>
</div>
</div>
</div>
<div class="favorite-card group bg-[var(--charcoal)] border border-white/5 overflow-hidden">
<div class="relative aspect-[16/10] overflow-hidden">
<img alt="Vintage Dessert" class="w-full h-full object-cover grayscale brightness-75 transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-105 group-hover:brightness-100" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJ_xB7Z8pR1yW0dmiTyUBapO9IEEx0xbGE3ljhd_rl2tbYp7vnJVHf7Gtp7ObInNERYgHTPpq_ve3XT8v64QOrvHlTSnMncTXYw6EucoYfk5tdA3pAMySNX70Iug-5qaFP3XjCjspeewwMdfyFzXhvAfG5Rg0AiIpIKe5Z_E-CJJ-QomSGsPSDRvp3uNDRzyhwLWfOUYkXaLh2gUCAiqh0ncJ8VHG_MtU3wcH3kV0NZUYt5POTZMWpjQ_POjgmoExo1ABysY7Dg2ZT"/>
<div class="absolute top-6 right-6">
<button class="bg-black/50 backdrop-blur-md p-3 rounded-full text-white/50 hover:text-red-500 transition-colors">
<span class="material-symbols-outlined text-xl">delete</span>
</button>
</div>
</div>
<div class="p-10">
<div class="flex justify-between items-start mb-6">
<div>
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-2 block">Decadence Archive</span>
<h3 class="text-3xl font-light text-white">Architectural Patisserie</h3>
</div>
</div>
<p class="text-stone-500 text-sm font-light leading-relaxed mb-10 max-w-md">
                            Layers of Venezuelan cacao and Madagascar vanilla, structured with geometric precision and velvet textures.
                        </p>
<div class="flex items-center gap-6">
<button class="px-10 py-4 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:bg-orange-700 transition-all duration-300">
                                View Recipe
                            </button>
<button class="text-white/40 hover:text-white text-[10px] font-bold tracking-[0.3em] uppercase transition-colors">
                                Remove
                            </button>
</div>
</div>
</div>
<div class="group border border-white/5 border-dashed flex flex-col items-center justify-center p-20 transition-all hover:border-[var(--gold-accent)]/30">
<span class="material-symbols-outlined text-6xl text-white/10 mb-6 group-hover:text-[var(--gold-accent)]/30 transition-colors">bookmark_add</span>
<h3 class="text-xl text-white/40 mb-2">Discover More</h3>
<p class="text-stone-600 text-sm font-light text-center mb-8 max-w-[200px]">Browse our masterclasses to add to your elite collection.</p>
<a class="text-[10px] uppercase tracking-[0.3em] text-[var(--gold-accent)] font-bold" href="#">Explore Collections</a>
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