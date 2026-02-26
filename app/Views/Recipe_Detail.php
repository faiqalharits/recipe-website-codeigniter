<!DOCTYPE html>
<html class="dark" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Spicy Shrimp Stir-fry | Food Recipe</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"/>
<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#ea580c",
                        "background-light": "#fdfcfb",
                        "background-dark": "#0c0a09",
                        secondary: {
                            light: "#78350f",
                            dark: "#431407",
                        }
                    },
                    fontFamily: {
                        display: ["Playfair Display", "serif"],
                        sans: ["Plus Jakarta Sans", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                    },
                },
            },
        };
    </script>
<style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .serif-title { font-family: 'Playfair Display', serif; }
        .ingredient-checkbox:checked + span { text-decoration: line-through; opacity: 0.5; }
        .hero-gradient { background: linear-gradient(to top, rgba(12,10,9,1) 0%, rgba(12,10,9,0.4) 50%, rgba(12,10,9,0.2) 100%); }

        /* Comment section styles */
        .comment-card { animation: fadeInUp 0.4s ease forwards; opacity: 0; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .star-btn { transition: transform 0.15s ease, color 0.15s ease; }
        .star-btn:hover { transform: scale(1.2); }
        .star-btn.active { color: #f59e0b; }
        .like-btn:active { transform: scale(0.9); }
        .avatar-ring { box-shadow: 0 0 0 2px #ea580c; }
        textarea:focus { outline: none; box-shadow: 0 0 0 2px rgba(234,88,12,0.4); }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-stone-800 dark:text-stone-200 transition-colors duration-300">

<nav class="fixed top-0 z-[100] w-full bg-transparent py-8 transition-all duration-500">
<div class="max-w-[1400px] mx-auto px-8 lg:px-16">
<div class="flex justify-between items-center bg-white/5 backdrop-blur-md border border-white/5 px-10 py-4 rounded-full">
<div class="flex items-center gap-16">
<span class="text-3xl font-bold tracking-tighter text-white italic">FR<span class="text-orange-400">.</span></span>
<div class="hidden lg:flex items-center space-x-12">
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('/') ?>">Home</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('about') ?>">About</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('recipe') ?>">Recipe</a>
<a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="<?= base_url('favorites') ?>">Favorites</a>
</div>
</div>
</div>
</div>
</nav>

<header class="relative w-full h-[70vh] flex items-end overflow-hidden pt-16">
<img alt="Spicy Shrimp Stir-fry" class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDknG0sNqmYXdejxUH-O7LEX_-Zx4gEphCOKGHTwKnyHLJHRoJkx5t_6rwyOKCah5m_okxS0Q49Mm5l5CiQ8uA9TLPzK6QbSsxUQ2kkxRQQDLOlGmxOvWPrZi1paXbiGo7PAyjzJVSnuq9D4T4xuLnUC1er7aKyl6KMVey8655DCC-4lnNZqeHl7hBdaRklJ6H1AG0zngOtVZj-lqeMFo5-KS83XvawltUqcwjVoK6UYoC1ZkaLrFEIzvs8CCbQ5txowaPGq2QBp1gx"/>
<div class="absolute inset-0 hero-gradient"></div>
<div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 w-full">
<div class="max-w-3xl">
<span class="inline-block px-3 py-1 rounded-full bg-primary/20 text-primary text-xs font-bold uppercase tracking-widest mb-4 backdrop-blur-sm border border-primary/30">Szechuan Fusion</span>
<h1 class="text-5xl md:text-7xl font-bold text-white serif-title leading-tight mb-6">Spicy Shrimp Stir-fry with Fresh Broccoli</h1>
<div class="flex flex-wrap gap-4">
<button class="flex items-center gap-2 bg-primary hover:bg-orange-700 text-white px-6 py-3 rounded-full font-bold transition-all shadow-lg shadow-primary/20">
<span class="material-icons-outlined text-sm">favorite</span> Save to Favorites
</button>
<button class="flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white backdrop-blur-md border border-white/20 px-6 py-3 rounded-full font-bold transition-all">
<span class="material-icons-outlined text-sm">print</span> Print Recipe
</button>
</div>
</div>
</div>
</header>

<section class="border-b border-stone-200 dark:border-stone-800 bg-stone-50 dark:bg-stone-900/50">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
<div class="grid grid-cols-2 md:grid-cols-4 gap-8">
<div class="flex items-center gap-3">
<div class="p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-primary"><span class="material-icons-outlined">schedule</span></div>
<div><p class="text-xs uppercase tracking-wider text-stone-500 font-bold">Prep Time</p><p class="font-bold">15 Mins</p></div>
</div>
<div class="flex items-center gap-3">
<div class="p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-primary"><span class="material-icons-outlined">timer</span></div>
<div><p class="text-xs uppercase tracking-wider text-stone-500 font-bold">Cook Time</p><p class="font-bold">10 Mins</p></div>
</div>
<div class="flex items-center gap-3">
<div class="p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-primary"><span class="material-icons-outlined">bar_chart</span></div>
<div><p class="text-xs uppercase tracking-wider text-stone-500 font-bold">Difficulty</p><p class="font-bold">Medium</p></div>
</div>
<div class="flex items-center gap-3">
<div class="p-2 rounded-lg bg-stone-200 dark:bg-stone-800 text-primary"><span class="material-icons-outlined">restaurant</span></div>
<div><p class="text-xs uppercase tracking-wider text-stone-500 font-bold">Servings</p><p class="font-bold">4 People</p></div>
</div>
</div>
</div>
</section>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
<aside class="lg:col-span-4 order-2 lg:order-1">
<div class="sticky top-24 p-8 rounded-3xl bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800">
<h3 class="text-2xl font-bold serif-title mb-8 border-b border-stone-200 dark:border-stone-800 pb-4">Ingredients</h3>
<ul class="space-y-4">
<li><label class="flex items-center cursor-pointer group"><input class="w-5 h-5 rounded border-stone-300 dark:border-stone-700 text-primary focus:ring-primary bg-transparent ingredient-checkbox" type="checkbox"/><span class="ml-3 text-stone-700 dark:text-stone-300 group-hover:text-primary transition-colors">1 lb Jumbo Shrimp, peeled and deveined</span></label></li>
<li><label class="flex items-center cursor-pointer group"><input class="w-5 h-5 rounded border-stone-300 dark:border-stone-700 text-primary focus:ring-primary bg-transparent ingredient-checkbox" type="checkbox"/><span class="ml-3 text-stone-700 dark:text-stone-300 group-hover:text-primary transition-colors">2 cups Fresh Broccoli florets</span></label></li>
<li><label class="flex items-center cursor-pointer group"><input class="w-5 h-5 rounded border-stone-300 dark:border-stone-700 text-primary focus:ring-primary bg-transparent ingredient-checkbox" type="checkbox"/><span class="ml-3 text-stone-700 dark:text-stone-300 group-hover:text-primary transition-colors">3 cloves Garlic, minced</span></label></li>
<li><label class="flex items-center cursor-pointer group"><input class="w-5 h-5 rounded border-stone-300 dark:border-stone-700 text-primary focus:ring-primary bg-transparent ingredient-checkbox" type="checkbox"/><span class="ml-3 text-stone-700 dark:text-stone-300 group-hover:text-primary transition-colors">1 tbsp Ginger, freshly grated</span></label></li>
<li><label class="flex items-center cursor-pointer group"><input class="w-5 h-5 rounded border-stone-300 dark:border-stone-700 text-primary focus:ring-primary bg-transparent ingredient-checkbox" type="checkbox"/><span class="ml-3 text-stone-700 dark:text-stone-300 group-hover:text-primary transition-colors">2 tbsp Low-sodium Soy Sauce</span></label></li>
<li><label class="flex items-center cursor-pointer group"><input class="w-5 h-5 rounded border-stone-300 dark:border-stone-700 text-primary focus:ring-primary bg-transparent ingredient-checkbox" type="checkbox"/><span class="ml-3 text-stone-700 dark:text-stone-300 group-hover:text-primary transition-colors">1 tbsp Szechuan Chili Oil</span></label></li>
<li><label class="flex items-center cursor-pointer group"><input class="w-5 h-5 rounded border-stone-300 dark:border-stone-700 text-primary focus:ring-primary bg-transparent ingredient-checkbox" type="checkbox"/><span class="ml-3 text-stone-700 dark:text-stone-300 group-hover:text-primary transition-colors">1 tsp Sesame Seeds for garnish</span></label></li>
</ul>
<div class="mt-10 pt-6 border-t border-stone-200 dark:border-stone-800">
<div class="flex items-center justify-between mb-4">
<span class="text-stone-500 text-sm">Serving size adjuster</span>
<div class="flex items-center gap-3">
<button class="w-8 h-8 flex items-center justify-center rounded-full bg-stone-200 dark:bg-stone-800 hover:bg-primary hover:text-white transition-all">-</button>
<span class="font-bold">4</span>
<button class="w-8 h-8 flex items-center justify-center rounded-full bg-stone-200 dark:bg-stone-800 hover:bg-primary hover:text-white transition-all">+</button>
</div>
</div>
</div>
</div>
</aside>

<div class="lg:col-span-8 order-1 lg:order-2">
<section class="prose prose-stone dark:prose-invert max-w-none">
<h2 class="text-3xl font-bold serif-title mb-8">Cooking Instructions</h2>
<div class="space-y-12">
<div class="flex gap-6">
<div class="flex-shrink-0 w-12 h-12 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xl shadow-lg shadow-primary/30">1</div>
<div><h4 class="text-xl font-bold mb-2">Prepare the Sauce</h4><p class="text-stone-600 dark:text-stone-400 leading-relaxed">In a small bowl, whisk together the soy sauce, grated ginger, minced garlic, and Szechuan chili oil. If you prefer a thicker sauce, add half a teaspoon of cornstarch to the mixture.</p></div>
</div>
<div class="flex gap-6">
<div class="flex-shrink-0 w-12 h-12 rounded-full bg-stone-200 dark:bg-stone-800 text-stone-500 flex items-center justify-center font-bold text-xl">2</div>
<div><h4 class="text-xl font-bold mb-2">Blanch the Broccoli</h4><p class="text-stone-600 dark:text-stone-400 leading-relaxed">Bring a pot of salted water to a boil. Briefly blanch the broccoli florets for 2 minutes until bright green but still crisp. Immediately plunge them into ice water to stop the cooking process. Drain and set aside.</p></div>
</div>
<div class="flex gap-6">
<div class="flex-shrink-0 w-12 h-12 rounded-full bg-stone-200 dark:bg-stone-800 text-stone-500 flex items-center justify-center font-bold text-xl">3</div>
<div><h4 class="text-xl font-bold mb-2">Sear the Shrimp</h4><p class="text-stone-600 dark:text-stone-400 leading-relaxed">Heat a wok or large skillet over high heat with a tablespoon of vegetable oil. Once shimmering, add the shrimp in a single layer. Sear for 1-2 minutes per side until pink and slightly charred.</p></div>
</div>
<div class="flex gap-6">
<div class="flex-shrink-0 w-12 h-12 rounded-full bg-stone-200 dark:bg-stone-800 text-stone-500 flex items-center justify-center font-bold text-xl">4</div>
<div><h4 class="text-xl font-bold mb-2">Combine and Finish</h4><p class="text-stone-600 dark:text-stone-400 leading-relaxed">Add the blanched broccoli to the wok with the shrimp. Pour the prepared sauce over the mixture. Toss continuously for 1-2 minutes until the sauce has thickened and coated everything evenly.</p></div>
</div>
<div class="flex gap-6">
<div class="flex-shrink-0 w-12 h-12 rounded-full bg-stone-200 dark:bg-stone-800 text-stone-500 flex items-center justify-center font-bold text-xl">5</div>
<div><h4 class="text-xl font-bold mb-2">Garnish and Serve</h4><p class="text-stone-600 dark:text-stone-400 leading-relaxed">Remove from heat. Sprinkle with sesame seeds and fresh scallions if desired. Serve immediately over jasmine rice or rice noodles.</p></div>
</div>
</div>
</section>

<div class="mt-16 p-8 rounded-3xl bg-primary/5 border border-primary/20 relative overflow-hidden">
<div class="absolute top-0 right-0 p-4 opacity-10"><span class="material-icons-outlined text-6xl">lightbulb</span></div>
<h4 class="text-xl font-bold text-primary mb-4 flex items-center gap-2">
<span class="material-icons-outlined">tips_and_updates</span> Chef's Secret Tip
</h4>
<p class="italic text-stone-600 dark:text-stone-400">"For the most authentic flavor, use a seasoned carbon steel wok. The high heat creates 'Wok Hei' (breath of the wok), which adds a complex, smoky aroma that regular non-stick pans can't replicate."</p>
</div>

<!-- ===================== COMMENT SECTION ===================== -->
<section class="mt-20" id="comments">

  <!-- Header + Rating Summary -->
  <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-10 pb-6 border-b border-stone-200 dark:border-stone-800">
    <div>
      <h2 class="text-3xl font-bold serif-title mb-1">Community Reviews</h2>
      <p class="text-stone-500 text-sm" id="comment-count-label">3 reviews · rata-rata 4.7 bintang</p>
    </div>
    <!-- Overall star display -->
    <div class="flex items-center gap-3">
      <div class="flex gap-1" id="avg-stars">
        <!-- filled by JS -->
      </div>
      <span class="text-4xl font-bold text-primary" id="avg-score">4.7</span>
    </div>
  </div>

  <!-- Existing comments list -->
  <div class="space-y-6 mb-12" id="comments-list">

    <!-- Seed comment 1 -->
    <div class="comment-card p-6 rounded-2xl bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800" style="animation-delay:0s">
      <div class="flex items-start gap-4">
        <div class="w-11 h-11 rounded-full avatar-ring flex-shrink-0 overflow-hidden">
          <img src="https://api.dicebear.com/7.x/thumbs/svg?seed=rina&backgroundColor=ea580c" alt="Rina" class="w-full h-full object-cover"/>
        </div>
        <div class="flex-1 min-w-0">
          <div class="flex flex-wrap items-center gap-3 mb-1">
            <span class="font-bold text-stone-800 dark:text-stone-100">Rina Amelia</span>
            <div class="flex gap-0.5" data-rating="5"><!-- stars --></div>
            <span class="text-xs text-stone-400 ml-auto">2 hari lalu</span>
          </div>
          <p class="text-stone-600 dark:text-stone-400 leading-relaxed text-sm">Resepnya enak banget! Saya tambah sedikit madu ke sausnya dan hasilnya makin juara. Wok hei-nya berasa banget kalau apinya beneran gede 🔥</p>
          <div class="flex items-center gap-4 mt-3">
            <button class="like-btn flex items-center gap-1.5 text-xs text-stone-400 hover:text-primary transition-colors" onclick="toggleLike(this)">
              <span class="material-icons-outlined text-base">thumb_up</span>
              <span class="like-count">12</span>
            </button>
            <button class="text-xs text-stone-400 hover:text-primary transition-colors" onclick="triggerReply(this)">
              <span class="material-icons-outlined text-base align-middle">reply</span> Balas
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Seed comment 2 -->
    <div class="comment-card p-6 rounded-2xl bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800" style="animation-delay:0.1s">
      <div class="flex items-start gap-4">
        <div class="w-11 h-11 rounded-full avatar-ring flex-shrink-0 overflow-hidden">
          <img src="https://api.dicebear.com/7.x/thumbs/svg?seed=budi&backgroundColor=0c0a09" alt="Budi" class="w-full h-full object-cover"/>
        </div>
        <div class="flex-1 min-w-0">
          <div class="flex flex-wrap items-center gap-3 mb-1">
            <span class="font-bold text-stone-800 dark:text-stone-100">Budi Santoso</span>
            <div class="flex gap-0.5" data-rating="4"><!-- stars --></div>
            <span class="text-xs text-stone-400 ml-auto">5 hari lalu</span>
          </div>
          <p class="text-stone-600 dark:text-stone-400 leading-relaxed text-sm">Mantap! Tapi menurut saya chili oil-nya bisa ditambah 2x lipat kalau suka pedas. Udangnya sempurna teksturnya, nggak alot sama sekali 👌</p>
          <div class="flex items-center gap-4 mt-3">
            <button class="like-btn flex items-center gap-1.5 text-xs text-stone-400 hover:text-primary transition-colors" onclick="toggleLike(this)">
              <span class="material-icons-outlined text-base">thumb_up</span>
              <span class="like-count">8</span>
            </button>
            <button class="text-xs text-stone-400 hover:text-primary transition-colors" onclick="triggerReply(this)">
              <span class="material-icons-outlined text-base align-middle">reply</span> Balas
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Seed comment 3 -->
    <div class="comment-card p-6 rounded-2xl bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800" style="animation-delay:0.2s">
      <div class="flex items-start gap-4">
        <div class="w-11 h-11 rounded-full avatar-ring flex-shrink-0 overflow-hidden">
          <img src="https://api.dicebear.com/7.x/thumbs/svg?seed=sari&backgroundColor=78350f" alt="Sari" class="w-full h-full object-cover"/>
        </div>
        <div class="flex-1 min-w-0">
          <div class="flex flex-wrap items-center gap-3 mb-1">
            <span class="font-bold text-stone-800 dark:text-stone-100">Sari Dewi</span>
            <div class="flex gap-0.5" data-rating="5"><!-- stars --></div>
            <span class="text-xs text-stone-400 ml-auto">1 minggu lalu</span>
          </div>
          <p class="text-stone-600 dark:text-stone-400 leading-relaxed text-sm">Sudah 3x masak resep ini, selalu jadi favorit keluarga. Langkah blansir brokoli itu kunci banget — warnanya tetap hijau cerah dan nggak lembek. Terima kasih resepnya! ❤️</p>
          <div class="flex items-center gap-4 mt-3">
            <button class="like-btn flex items-center gap-1.5 text-xs text-stone-400 hover:text-primary transition-colors" onclick="toggleLike(this)">
              <span class="material-icons-outlined text-base">thumb_up</span>
              <span class="like-count">21</span>
            </button>
            <button class="text-xs text-stone-400 hover:text-primary transition-colors" onclick="triggerReply(this)">
              <span class="material-icons-outlined text-base align-middle">reply</span> Balas
            </button>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- ── Write a comment form ── -->
  <div class="p-8 rounded-3xl bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800">
    <h3 class="text-xl font-bold serif-title mb-6">Tulis Review Kamu</h3>

    <!-- Name input -->
    <div class="mb-4">
      <label class="block text-xs uppercase tracking-wider font-bold text-stone-500 mb-2">Nama</label>
      <input id="comment-name" type="text" placeholder="Nama kamu..." 
        class="w-full px-4 py-3 rounded-xl bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 text-stone-800 dark:text-stone-200 placeholder-stone-400 focus:border-primary transition-colors text-sm"/>
    </div>

    <!-- Star rating picker -->
    <div class="mb-4">
      <label class="block text-xs uppercase tracking-wider font-bold text-stone-500 mb-2">Rating</label>
      <div class="flex gap-2" id="star-picker">
        <button class="star-btn text-3xl text-stone-300 dark:text-stone-600 hover:text-amber-400" data-val="1">★</button>
        <button class="star-btn text-3xl text-stone-300 dark:text-stone-600 hover:text-amber-400" data-val="2">★</button>
        <button class="star-btn text-3xl text-stone-300 dark:text-stone-600 hover:text-amber-400" data-val="3">★</button>
        <button class="star-btn text-3xl text-stone-300 dark:text-stone-600 hover:text-amber-400" data-val="4">★</button>
        <button class="star-btn text-3xl text-stone-300 dark:text-stone-600 hover:text-amber-400" data-val="5">★</button>
      </div>
      <input type="hidden" id="selected-rating" value="0"/>
    </div>

    <!-- Comment textarea -->
    <div class="mb-6">
      <label class="block text-xs uppercase tracking-wider font-bold text-stone-500 mb-2">Komentar</label>
      <textarea id="comment-text" rows="4" placeholder="Bagaimana pengalaman masak resep ini? Tips, modifikasi, atau cerita seru boleh banget ditulis di sini..."
        class="w-full px-4 py-3 rounded-xl bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 text-stone-800 dark:text-stone-200 placeholder-stone-400 focus:border-primary transition-colors resize-none text-sm"></textarea>
    </div>

    <!-- Error message -->
    <p id="form-error" class="text-red-500 text-xs mb-4 hidden"></p>

    <!-- Submit button -->
    <button onclick="submitComment()" 
      class="flex items-center gap-2 bg-primary hover:bg-orange-700 active:scale-95 text-white px-8 py-3 rounded-full font-bold transition-all shadow-lg shadow-primary/20 text-sm">
      <span class="material-icons-outlined text-base">send</span>
      Kirim Review
    </button>
  </div>

</section>
<!-- ===================== END COMMENT SECTION ===================== -->

</div>
</div>
</main>

<footer class="bg-stone-100 dark:bg-stone-900/50 border-t border-stone-200 dark:border-stone-800 mt-20">
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
<div class="flex flex-col items-center gap-6">
<div class="flex items-center gap-2">
<div class="w-2 h-2 rounded-full bg-primary"></div>
<span class="text-2xl font-bold serif-title">Food Recipe</span>
</div>
<div class="flex gap-8 text-sm text-stone-500">
<a class="hover:text-primary" href="#">Privacy Policy</a>
<a class="hover:text-primary" href="#">Terms of Service</a>
<a class="hover:text-primary" href="#">Sitemap</a>
</div>
<p class="text-stone-400 text-sm">© 2026 Food Recipe Culinary Experiences. All rights reserved.</p>
</div>
</div>
</footer>

<script>
// ── Render stars for existing seed comments ──
document.querySelectorAll('[data-rating]').forEach(el => {
  const r = parseInt(el.dataset.rating);
  el.innerHTML = [1,2,3,4,5].map(i =>
    `<span class="text-base ${i <= r ? 'text-amber-400' : 'text-stone-300 dark:text-stone-600'}">★</span>`
  ).join('');
});

// ── Render average stars ──
function renderAvgStars(avg) {
  const container = document.getElementById('avg-stars');
  container.innerHTML = [1,2,3,4,5].map(i => {
    const filled = i <= Math.round(avg);
    return `<span class="text-2xl ${filled ? 'text-amber-400' : 'text-stone-300 dark:text-stone-600'}">★</span>`;
  }).join('');
}
renderAvgStars(4.7);

// ── Star picker ──
let selectedRating = 0;
const starBtns = document.querySelectorAll('#star-picker .star-btn');
starBtns.forEach(btn => {
  btn.addEventListener('mouseenter', () => highlightStars(parseInt(btn.dataset.val)));
  btn.addEventListener('mouseleave', () => highlightStars(selectedRating));
  btn.addEventListener('click', () => {
    selectedRating = parseInt(btn.dataset.val);
    document.getElementById('selected-rating').value = selectedRating;
    highlightStars(selectedRating);
  });
});
function highlightStars(val) {
  starBtns.forEach(b => {
    const v = parseInt(b.dataset.val);
    b.classList.toggle('text-amber-400', v <= val);
    b.classList.toggle('active', v <= val);
    b.classList.toggle('text-stone-300', v > val);
    b.classList.toggle('dark:text-stone-600', v > val);
  });
}

// ── Like toggle ──
function toggleLike(btn) {
  const countEl = btn.querySelector('.like-count');
  const icon = btn.querySelector('.material-icons-outlined');
  const liked = btn.dataset.liked === 'true';
  const count = parseInt(countEl.textContent);
  if (liked) {
    countEl.textContent = count - 1;
    btn.dataset.liked = 'false';
    btn.classList.remove('text-primary');
    btn.classList.add('text-stone-400');
    icon.textContent = 'thumb_up';
  } else {
    countEl.textContent = count + 1;
    btn.dataset.liked = 'true';
    btn.classList.add('text-primary');
    btn.classList.remove('text-stone-400');
    icon.textContent = 'thumb_up';
  }
}

// ── Submit comment ──
const seedRatings = [5, 4, 5];
let allRatings = [...seedRatings];

function submitComment() {
  const nameEl = document.getElementById('comment-name');
  const textEl = document.getElementById('comment-text');
  const ratingEl = document.getElementById('selected-rating');
  const errorEl = document.getElementById('form-error');

  const name = nameEl.value.trim();
  const text = textEl.value.trim();
  const rating = parseInt(ratingEl.value);

  // Validation
  errorEl.classList.add('hidden');
  if (!name) { showError('Nama tidak boleh kosong.'); return; }
  if (rating === 0) { showError('Pilih rating bintang dulu ya!'); return; }
  if (!text) { showError('Komentar tidak boleh kosong.'); return; }

  // Build card
  const initials = name.split(' ').map(w=>w[0]).join('').toUpperCase().slice(0,2);
  const seed = name.toLowerCase().replace(/\s/g,'');
  const now = 'Baru saja';

  const card = document.createElement('div');
  card.className = 'comment-card p-6 rounded-2xl bg-stone-50 dark:bg-stone-900 border border-stone-200 dark:border-stone-800';
  card.style.animationDelay = '0s';
  card.innerHTML = `
    <div class="flex items-start gap-4">
      <div class="w-11 h-11 rounded-full avatar-ring flex-shrink-0 overflow-hidden">
        <img src="https://api.dicebear.com/7.x/thumbs/svg?seed=${seed}&backgroundColor=ea580c" alt="${name}" class="w-full h-full object-cover"/>
      </div>
      <div class="flex-1 min-w-0">
        <div class="flex flex-wrap items-center gap-3 mb-1">
          <span class="font-bold text-stone-800 dark:text-stone-100">${escHtml(name)}</span>
          <div class="flex gap-0.5">${[1,2,3,4,5].map(i=>`<span class="text-base ${i<=rating?'text-amber-400':'text-stone-300 dark:text-stone-600'}">★</span>`).join('')}</div>
          <span class="text-xs text-stone-400 ml-auto">${now}</span>
        </div>
        <p class="text-stone-600 dark:text-stone-400 leading-relaxed text-sm">${escHtml(text)}</p>
        <div class="flex items-center gap-4 mt-3">
          <button class="like-btn flex items-center gap-1.5 text-xs text-stone-400 hover:text-primary transition-colors" onclick="toggleLike(this)">
            <span class="material-icons-outlined text-base">thumb_up</span>
            <span class="like-count">0</span>
          </button>
          <button class="text-xs text-stone-400 hover:text-primary transition-colors" onclick="triggerReply(this)">
            <span class="material-icons-outlined text-base align-middle">reply</span> Balas
          </button>
        </div>
      </div>
    </div>`;

  document.getElementById('comments-list').prepend(card);

  // Update avg
  allRatings.push(rating);
  const avg = (allRatings.reduce((a,b)=>a+b,0)/allRatings.length).toFixed(1);
  document.getElementById('avg-score').textContent = avg;
  renderAvgStars(parseFloat(avg));
  document.getElementById('comment-count-label').textContent = `${allRatings.length} reviews · rata-rata ${avg} bintang`;

  // Reset form
  nameEl.value = '';
  textEl.value = '';
  ratingEl.value = 0;
  selectedRating = 0;
  highlightStars(0);

  // Scroll to new comment
  card.scrollIntoView({ behavior:'smooth', block:'center' });
}

function showError(msg) {
  const el = document.getElementById('form-error');
  el.textContent = msg;
  el.classList.remove('hidden');
}

function escHtml(str) {
  return str.replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function triggerReply(btn) {
  const card = btn.closest('.comment-card');
  const existing = card.querySelector('.reply-box');
  if (existing) { existing.remove(); return; }
  const box = document.createElement('div');
  box.className = 'reply-box mt-4 ml-14 flex gap-3';
  box.innerHTML = `
    <input type="text" placeholder="Tulis balasan..." 
      class="flex-1 px-3 py-2 rounded-xl bg-white dark:bg-stone-800 border border-stone-200 dark:border-stone-700 text-stone-800 dark:text-stone-200 placeholder-stone-400 text-xs focus:border-primary transition-colors"/>
    <button onclick="sendReply(this)" class="px-4 py-2 bg-primary hover:bg-orange-700 text-white rounded-xl text-xs font-bold transition-all">Kirim</button>`;
  card.querySelector('.flex.items-start').after(box);
  box.querySelector('input').focus();
}

function sendReply(btn) {
  const input = btn.previousElementSibling;
  const text = input.value.trim();
  if (!text) return;
  const box = btn.closest('.reply-box');
  const replyEl = document.createElement('div');
  replyEl.className = 'mt-3 ml-14 pl-4 border-l-2 border-primary/30 text-xs text-stone-500 dark:text-stone-400 italic';
  replyEl.textContent = `Kamu: ${text}`;
  box.replaceWith(replyEl);
}
</script>
</body></html>