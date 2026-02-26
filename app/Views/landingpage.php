<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Food Recipe Elite | The Art of Exquisite Taste</title>
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
            --glass-bg: rgba(18, 18, 18, 0.7);
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
        .split-hero-left {
            background-color: var(--charcoal);
        }
        .parallax-card {
            transition: transform 0.8s cubic-bezier(0.2, 0, 0.2, 1);
        }
        .parallax-card:hover {
            border-color: var(--gold-accent);
        }
        .nav-blur {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
    </style>
</head>
<body class="overflow-x-hidden">
<nav class="fixed top-0 z-[100] w-full bg-transparent py-8 transition-all duration-500">
<div class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="flex justify-between i-[var(--gltems-center nav-blur bgass-bg)] border border-white/5 px-8 py-4 rounded-full">
<div class="flex items-center gap-12">
<div class="flex items-center gap-2">
<span class="text-2xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
</div>
<div class="hidden lg:flex items-center space-x-12">
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('/') ?>">Home</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('about') ?>">About</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('recipe') ?>">Recipe</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('favorites') ?>">Favorites</a>
</div>
</div>
<div class="flex items-center gap-8">
<button class="text-white/80 hover:text-white">
<span class="material-symbols-outlined font-light text-2xl">menu</span>
</button>
</div>
</div>
</div>
</nav>
<main>
<section class="relative h-screen flex flex-col lg:flex-row overflow-hidden">
<div class="w-full lg:w-1/2 h-full split-hero-left flex flex-col justify-center px-8 lg:px-24 relative overflow-hidden">
<div class="absolute top-0 left-0 w-full h-full opacity-5 pointer-events-none">
<div class="w-full h-full bg-[radial-gradient(circle_at_center,_var(--gold-accent)_0%,_transparent_70%)]"></div>
</div>
<div class="relative z-10">
<span class="inline-block text-[var(--gold-accent)] font-medium tracking-[0.5em] uppercase text-[10px] mb-12">Est. MCMLXXXVIII</span>
<h1 class="text-6xl lg:text-8xl font-medium text-white mb-10 leading-[1.05] italic">
                    The Art of <br/>
<span class="text-gold-gradient font-bold not-italic">Exquisite</span> <br/>
                    Taste
                </h1>
<p class="text-stone-400 text-lg font-light mb-12 max-w-lg leading-relaxed">
                    A sensory journey into the depths of culinary craftsmanship, where fire meets finesse and every ingredient tells a story of heritage.
                </p>
<div class="flex items-center gap-10">
<a class="group flex items-center gap-4 text-white text-sm font-semibold tracking-widest uppercase" href="#">
                        Explore
                        <span class="w-12 h-px bg-[var(--gold-accent)] transition-all group-hover:w-20"></span>
</a>
</div>
</div>
</div>
<div class="w-full lg:w-1/2 h-full relative">
<img alt="Flame-grilled dish with embers" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7hXnlCVYLI0DQVDD3w9skBUxbGR8WnuwtD2gT-VR5JU0chlBHldfA_1hzI45VaKZBfKyHWGlF_-buczugVnikMrcOg-lRvbgGXz6ruQonYvzYQsOyi-mXSK2OexfRiOFQ4dFLIneU3IkW5oV8X7KsUsurmjYvwmtEQsJpGBuOkATGmIqHxl-3i3nowczTAw9uJHrqQLNMZIPeldW0fQnk73UAQUzsfRSxqL_4UUctbp859vAskUlwcPm0LtFZkdtIHOnUL6qY6Ati"/>
<div class="absolute inset-0 bg-gradient-to-r from-[var(--charcoal)] via-transparent to-transparent hidden lg:block"></div>
<div class="absolute bottom-12 right-12 flex flex-col items-end gap-2">
<span class="text-[10px] uppercase tracking-[0.4em] text-white/40">Visual Experience</span>
<div class="w-px h-24 bg-gradient-to-b from-transparent to-[var(--gold-accent)]"></div>
</div>
</div>
</section>
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
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
<div class="group relative aspect-[3/4] overflow-hidden border border-white/5 transition-all duration-500 hover:border-[var(--gold-accent)] parallax-card">
<img alt="Fine Dining" class="absolute inset-0 w-full h-full object-cover grayscale transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7hXnlCVYLI0DQVDD3w9skBUxbGR8WnuwtD2gT-VR5JU0chlBHldfA_1hzI45VaKZBfKyHWGlF_-buczugVnikMrcOg-lRvbgGXz6ruQonYvzYQsOyi-mXSK2OexfRiOFQ4dFLIneU3IkW5oV8X7KsUsurmjYvwmtEQsJpGBuOkATGmIqHxl-3i3nowczTAw9uJHrqQLNMZIPeldW0fQnk73UAQUzsfRSxqL_4UUctbp859vAskUlwcPm0LtFZkdtIHOnUL6qY6Ati"/>
<div class="absolute inset-0 bg-gradient-to-t from-[var(--deep-black)] via-[var(--deep-black)]/20 to-transparent flex flex-col justify-end p-12">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-4">The Zenith</span>
<h3 class="text-4xl font-light text-white mb-6">Fine Dining</h3>
<p class="text-stone-400 text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-500 max-w-xs">Precise techniques met with rarest global ingredients for the ultimate sensory experience.</p>
</div>
</div>
<div class="group relative aspect-[3/4] overflow-hidden border border-white/5 transition-all duration-500 hover:border-[var(--gold-accent)] parallax-card mt-12 md:mt-24">
<img alt="Street Gourmet" class="absolute inset-0 w-full h-full object-cover grayscale transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdWRpPYTlABioGKAYEFg1DzY3_9H4L7K9QujuMWDa0UX2fjMuOr7bXPLNiUVWSiuK5WSoIHGrdeh_MHGqGd5RACAxFar0sSdTcBbaYuv2Tus0EIYu3FlDCtTgz4PBQHovoaAmewA2hVTX3lT1ILUgr17TjZfManu1HWH6AnBlY0riYTd5ESdLQeViwXIHfjcxkw5fMI5WKJjv88aPGKUTAn_Pk29rQqzxyKRgRYY8RZTNoN9sGQ9JZb7Jhnr0eKW_5pG0GJxy8-RdA"/>
<div class="absolute inset-0 bg-gradient-to-t from-[var(--deep-black)] via-[var(--deep-black)]/20 to-transparent flex flex-col justify-end p-12">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-4">Reimagined</span>
<h3 class="text-4xl font-light text-white mb-6">Street Gourmet</h3>
<p class="text-stone-400 text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-500 max-w-xs">Elevating the familiar with haute cuisine standards and unexpected textures.</p>
</div>
</div>
<div class="group relative aspect-[3/4] overflow-hidden border border-white/5 transition-all duration-500 hover:border-[var(--gold-accent)] parallax-card">
<img alt="Vintage Desserts" class="absolute inset-0 w-full h-full object-cover grayscale transition-all duration-1000 group-hover:grayscale-0 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJ_xB7Z8pR1yW0dmiTyUBapO9IEEx0xbGE3ljhd_rl2tbYp7vnJVHf7Gtp7ObInNERYgHTPpq_ve3XT8v64QOrvHlTSnMncTXYw6EucoYfk5tdA3pAMySNX70Iug-5qaFP3XjCjspeewwMdfyFzXhvAfG5Rg0AiIpIKe5Z_E-CJJ-QomSGsPSDRvp3uNDRzyhwLWfOUYkXaLh2gUCAiqh0ncJ8VHG_MtU3wcH3kV0NZUYt5POTZMWpjQ_POjgmoExo1ABysY7Dg2ZT"/>
<div class="absolute inset-0 bg-gradient-to-t from-[var(--deep-black)] via-[var(--deep-black)]/20 to-transparent flex flex-col justify-end p-12">
<span class="text-[var(--gold-accent)] text-[10px] font-bold tracking-[0.4em] uppercase mb-4">Decadence</span>
<h3 class="text-4xl font-light text-white mb-6">Vintage Desserts</h3>
<p class="text-stone-400 text-sm font-light opacity-0 group-hover:opacity-100 transition-opacity duration-500 max-w-xs">Traditional patisserie methods revived with modern architectural presentation.</p>
</div>
</div>
</div>
</div>
</section>
<section class="py-40 bg-[var(--charcoal)] border-y border-white/5">
<div class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="grid lg:grid-cols-2 gap-24 items-center">
<div class="relative group">
<div class="absolute -inset-4 border border-[var(--gold-accent)]/20 -z-10 transition-all duration-700 group-hover:inset-0"></div>
<img alt="Master Chef Portrait" class="w-full aspect-[4/5] object-cover grayscale brightness-75 transition-all duration-1000 group-hover:brightness-100 group-hover:grayscale-0" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDgjGbsrsSBYNKSPi6cwyXDYrm0vLEFL5P0HkLoFbKFWQnuCYhkXf_BKQ9jUVVK_jQYPPp6D5Pzqu7PS5xL8oJzBcLN136NIDcY1UE_ONQM2XzRWS3-z5tTWgR_YAn6g2ZYcA0MD-3IVzBlt7zyr09n_us2YhqSjCIZGoVmVm7HtglhHp0HrGc7xLNNJDMp1tEvr1rmQRvPc6D59UGmROHgzjQwhjEgKU85YKxM6znLgsbXwJm4V0PQdxjssCkcRikiYZ_pCtVWNLjj"/>
<div class="absolute bottom-12 left-12 bg-[var(--deep-black)] p-8 border border-white/10 max-w-xs">
<h4 class="text-white text-2xl mb-2">Julian Vane</h4>
<p class="text-[var(--gold-accent)] text-[10px] tracking-widest uppercase mb-4">Executive Visionary</p>
<p class="text-stone-500 text-xs italic leading-loose">"Complexity is easy. Simplicity is the ultimate sophistication in the kitchen."</p>
</div>
</div>
<div>
<span class="text-[var(--burnt-orange)] text-[10px] font-bold tracking-[0.6em] uppercase mb-8 block">Chef's Signature</span>
<h2 class="text-5xl lg:text-7xl font-light text-white mb-10">The Ember <br/>Charred Ribeye</h2>
<p class="text-stone-400 text-lg font-light leading-relaxed mb-12">
                        This week's featured masterpiece explores the elemental relationship between open fire and dry-aged proteins. Smoked over hickory and finished with a fermented black garlic reduction.
                    </p>
<div class="space-y-8 mb-16">
<div class="flex items-center gap-6 border-b border-white/5 pb-8">
<span class="text-4xl font-light text-[var(--gold-accent)]">01</span>
<div>
<h4 class="text-white text-xl mb-1">Curing Ritual</h4>
<p class="text-stone-500 text-sm">48-hour dry rub with volcanic salt and wild herbs.</p>
</div>
</div>
<div class="flex items-center gap-6 border-b border-white/5 pb-8">
<span class="text-4xl font-light text-[var(--gold-accent)]">02</span>
<div>
<h4 class="text-white text-xl mb-1">Flame Mastery</h4>
<p class="text-stone-500 text-sm">Precision searing at 800°F to lock in natural umami.</p>
</div>
</div>
</div>
<button class="px-12 py-5 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.3em] uppercase hover:bg-orange-700 transition-all duration-300">
                        View Full Recipe
                    </button>
</div>
</div>
</div>
</section>
</main>
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
                © MMXXIV Food Recepi Elite. All rights Reserved.
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