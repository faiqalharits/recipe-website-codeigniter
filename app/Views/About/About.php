<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>About Us | Elite Food Heaven</title>
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
        .nav-blur {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .sepia-elegant {
            filter: sepia(0.2) contrast(1.1) brightness(0.8);
        }
    </style>
</head>
<nav class="fixed top-0 z-[100] w-full py-8">
<div class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="flex justify-between items-center nav-blur bg-[var(--glass-bg)] border border-white/5 px-10 py-5 rounded-full shadow-2xl">
<div class="flex items-center gap-16">
<div class="flex items-center">
<span class="text-3xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
</div>
<div class="hidden lg:flex items-center space-x-12">
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('/') ?>">Home</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-bold text-white transition-colors border-b border-[var(--gold-accent)] pb-1" href="<?= base_url('about') ?>">About</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('recipe') ?>">Recipe</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('favorites') ?>">Favorites</a>
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
<main>
<section class="relative pt-60 pb-32 px-8 lg:px-16">
<div class="max-w-[1400px] mx-auto">
<div class="max-w-4xl">
<span class="text-[var(--burnt-orange)] text-[10px] font-bold tracking-[0.6em] uppercase mb-8 block">Legacy of Excellence</span>
<h1 class="text-7xl lg:text-9xl font-light text-white leading-none mb-16 italic">Our <span class="not-italic font-normal">Story</span></h1>
</div>
<div class="grid lg:grid-cols-2 gap-24 items-start">
<div class="space-y-12">
<p class="text-2xl lg:text-3xl font-light text-stone-200 leading-relaxed italic">
                            "Gastronomy is the silent language of the soul, whispered through the alchemy of fire and the precision of the blade."
                        </p>
<div class="w-24 h-px bg-[var(--gold-accent)]"></div>
<p class="text-stone-400 text-lg font-light leading-relaxed">
                            Founded on the principles of uncompromising quality and cinematic presentation, FR (Food Heaven Elite) was born from a singular vision: to bridge the gap between high-art gastronomy and the home kitchen. We believe that every ingredient carries the weight of history, and every plate is a canvas for legacy.
                        </p>
</div>
<div class="relative group">
<div class="absolute -inset-4 border border-white/5 -z-10 group-hover:border-[var(--gold-accent)]/20 transition-all duration-700"></div>
<img alt="Atmospheric kitchen scene" class="w-full grayscale brightness-75 sepia-elegant object-cover aspect-[4/5]" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDgjGbsrsSBYNKSPi6cwyXDYrm0vLEFL5P0HkLoFbKFWQnuCYhkXf_BKQ9jUVVK_jQYPPp6D5Pzqu7PS5xL8oJzBcLN136NIDcY1UE_ONQM2XzRWS3-z5tTWgR_YAn6g2ZYcA0MD-3IVzBlt7zyr09n_us2YhqSjCIZGoVmVm7HtglhHp0HrGc7xLNNJDMp1tEvr1rmQRvPc6D59UGmROHgzjQwhjEgKU85YKxM6znLgsbXwJm4V0PQdxjssCkcRikiYZ_pCtVWNLjj"/>
<div class="absolute -bottom-8 -left-8 bg-[var(--charcoal)] p-12 border border-white/10 hidden md:block max-w-sm">
<span class="text-[var(--gold-accent)] text-[10px] tracking-[0.4em] uppercase mb-4 block">The Philosophy</span>
<p class="text-white text-lg font-light italic leading-relaxed">"True luxury is found in the restraint of the master, not the excess of the amateur."</p>
</div>
</div>
</div>
</div>
</section>
<section class="py-40 bg-[var(--charcoal)] border-y border-white/5">
<div class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="grid lg:grid-cols-3 gap-20">
<div>
<span class="text-[var(--gold-accent)] text-4xl font-light mb-8 block">01</span>
<h3 class="text-2xl text-white mb-6 uppercase tracking-widest">Provenance</h3>
<p class="text-stone-500 font-light leading-relaxed">We source narratives, not just ingredients. Every element in our repertoire is selected for its heritage and its ability to transform a dish into an experience.</p>
</div>
<div>
<span class="text-[var(--gold-accent)] text-4xl font-light mb-8 block">02</span>
<h3 class="text-2xl text-white mb-6 uppercase tracking-widest">Precision</h3>
<p class="text-stone-500 font-light leading-relaxed">The difference between a meal and a masterpiece is a single degree of heat, a micro-meter of thickness, and the patience of a craftsman.</p>
</div>
<div>
<span class="text-[var(--gold-accent)] text-4xl font-light mb-8 block">03</span>
<h3 class="text-2xl text-white mb-6 uppercase tracking-widest">Presentation</h3>
<p class="text-stone-500 font-light leading-relaxed">Visual storytelling is paramount. We teach the art of the 'plate', ensuring that the eyes feast long before the first bite is taken.</p>
</div>
</div>
</div>
</section>
<section class="py-40 px-8 lg:px-16 overflow-hidden">
<div class="max-w-[1400px] mx-auto">
<div class="flex flex-col lg:flex-row gap-8 mb-8">
<div class="lg:w-2/3">
<img alt="Gourmet detail" class="w-full h-[600px] object-cover grayscale brightness-50 hover:grayscale-0 hover:brightness-100 transition-all duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7hXnlCVYLI0DQVDD3w9skBUxbGR8WnuwtD2gT-VR5JU0chlBHldfA_1hzI45VaKZBfKyHWGlF_-buczugVnikMrcOg-lRvbgGXz6ruQonYvzYQsOyi-mXSK2OexfRiOFQ4dFLIneU3IkW5oV8X7KsUsurmjYvwmtEQsJpGBuOkATGmIqHxl-3i3nowczTAw9uJHrqQLNMZIPeldW0fQnk73UAQUzsfRSxqL_4UUctbp859vAskUlwcPm0LtFZkdtIHOnUL6qY6Ati"/>
</div>
<div class="lg:w-1/3">
<img alt="Fine dining texture" class="w-full h-[600px] object-cover grayscale brightness-50 hover:grayscale-0 hover:brightness-100 transition-all duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7hXnlCVYLI0DQVDD3w9skBUxbGR8WnuwtD2gT-VR5JU0chlBHldfA_1hzI45VaKZBfKyHWGlF_-buczugVnikMrcOg-lRvbgGXz6ruQonYvzYQsOyi-mXSK2OexfRiOFQ4dFLIneU3IkW5oV8X7KsUsurmjYvwmtEQsJpGBuOkATGmIqHxl-3i3nowczTAw9uJHrqQLNMZIPeldW0fQnk73UAQUzsfRSxqL_4UUctbp859vAskUlwcPm0LtFZkdtIHOnUL6qY6Ati"/>
</div>
</div>
<div class="flex flex-col lg:flex-row gap-8">
<div class="lg:w-1/3">
<img alt="Culinary art" class="w-full h-[400px] object-cover grayscale brightness-50 hover:grayscale-0 hover:brightness-100 transition-all duration-1000" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdWRpPYTlABioGKAYEFg1DzY3_9H4L7K9QujuMWDa0UX2fjMuOr7bXPLNiUVWSiuK5WSoIHGrdeh_MHGqGd5RACAxFar0sSdTcBbaYuv2Tus0EIYu3FlDCtTgz4PBQHovoaAmewA2hVTX3lT1ILUgr17TjZfManu1HWH6AnBlY0riYTd5ESdLQeViwXIHfjcxkw5fMI5WKJjv88aPGKUTAn_Pk29rQqzxyKRgRYY8RZTNoN9sGQ9JZb7Jhnr0eKW_5pG0GJxy8-RdA"/>
</div>
<div class="lg:w-2/3 flex items-center justify-center p-20 border border-white/5 bg-[var(--charcoal)]">
<div class="text-center max-w-xl">
<h2 class="text-4xl lg:text-5xl font-light text-white mb-8">Elevate Your Everyday</h2>
<p class="text-stone-400 font-light leading-loose mb-10">Join a global community of culinary purists dedicated to the pursuit of the perfect flavor profile and the ultimate dining aesthetic.</p>
<a class="inline-block px-12 py-5 bg-[var(--burnt-orange)] text-white text-[10px] font-bold tracking-[0.4em] uppercase hover:bg-orange-700 transition-all duration-300" href="#">Join the Collective</a>
</div>
</div>
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
<li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Recipe</a></li>
<li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">About</a></li>
<li><a class="text-stone-500 text-sm font-light hover:text-[var(--gold-accent)] transition-colors" href="#">Favorites</a></li>
</ul>
</div>
<div>
<h4 class="text-white text-xs font-bold uppercase tracking-[0.4em] mb-10">Briefings</h4>
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
                    © MMXXIV FR Elite Gastronomy. All rights Reserved.
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