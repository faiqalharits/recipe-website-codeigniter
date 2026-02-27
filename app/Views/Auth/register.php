<?= $this->extend('Layout/main') ?>

<?= $this->section('title') ?>Register | Join the Elite<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    :root {
        --burnt-orange: #d97706;
        --deep-black: #080808;
        --charcoal: #121212;
        --gold-accent: #c5a059;
        --glass-bg: rgba(18, 18, 18, 0.7);
    }
    .nav-blur {
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    .text-gold-gradient {
        background: linear-gradient(135deg, #fef3c7 0%, #d97706 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
    }
</style>

<!-- Navbar (sama seperti landing page) -->
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
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors" href="/favorites">Favorites</a>
                </div>
            </div>
            <div class="flex items-center gap-8">
                <a href="/login" class="text-white/80 hover:text-white text-[10px] uppercase tracking-[0.4em] font-medium">
                    Login
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- Register Form -->
<div class="min-h-screen flex items-center justify-center px-8 pt-40 pb-20">
    <div class="max-w-md w-full">
        
        <!-- Logo -->
        <div class="text-center mb-12">
            <span class="text-5xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
            <p class="text-stone-500 text-xs tracking-[0.4em] uppercase mt-4">Join the Collective</p>
        </div>
        
        <!-- Register Card -->
        <div class="bg-[var(--charcoal)] border border-white/5 p-12 rounded-2xl">
            <h1 class="text-3xl font-light text-white mb-8 text-center serif-title">Become a Member</h1>
            
            <!-- Error Messages -->
            <?php if(session()->getFlashdata('errors')): ?>
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-lg">
                    <?php foreach(session()->getFlashdata('errors') as $error): ?>
                        <p class="text-red-400 text-sm text-center"><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('error')): ?>
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20 rounded-lg">
                    <p class="text-red-400 text-sm text-center"><?= session()->getFlashdata('error') ?></p>
                </div>
            <?php endif; ?>
            
            <!-- Register Form -->
            <form action="/auth/doRegister" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label for="username" class="block text-[10px] uppercase tracking-[0.3em] text-white/50 mb-3">Username</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-white/30">
                            <span class="material-symbols-outlined text-lg">person</span>
                        </span>
                        <input type="text" 
                               id="username" 
                               name="username" 
                               class="w-full bg-[var(--deep-black)] border border-white/10 pl-12 pr-6 py-4 text-white text-sm focus:border-[var(--gold-accent)] transition-colors outline-none rounded-lg"
                               placeholder="Your username"
                               value="<?= old('username') ?>"
                               required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="email" class="block text-[10px] uppercase tracking-[0.3em] text-white/50 mb-3">Email</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-white/30">
                            <span class="material-symbols-outlined text-lg">mail</span>
                        </span>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="w-full bg-[var(--deep-black)] border border-white/10 pl-12 pr-6 py-4 text-white text-sm focus:border-[var(--gold-accent)] transition-colors outline-none rounded-lg"
                               placeholder="your@email.com"
                               value="<?= old('email') ?>"
                               required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="password" class="block text-[10px] uppercase tracking-[0.3em] text-white/50 mb-3">Password</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-white/30">
                            <span class="material-symbols-outlined text-lg">lock</span>
                        </span>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="w-full bg-[var(--deep-black)] border border-white/10 pl-12 pr-6 py-4 text-white text-sm focus:border-[var(--gold-accent)] transition-colors outline-none rounded-lg"
                               placeholder="Min. 6 characters"
                               required>
                    </div>
                </div>
                
                <div class="mb-8">
                    <label for="confirm_password" class="block text-[10px] uppercase tracking-[0.3em] text-white/50 mb-3">Confirm Password</label>
                    <div class="relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-white/30">
                            <span class="material-symbols-outlined text-lg">lock</span>
                        </span>
                        <input type="password" 
                               id="confirm_password" 
                               name="confirm_password" 
                               class="w-full bg-[var(--deep-black)] border border-white/10 pl-12 pr-6 py-4 text-white text-sm focus:border-[var(--gold-accent)] transition-colors outline-none rounded-lg"
                               placeholder="Re-enter password"
                               required>
                    </div>
                </div>
                
                <button type="submit" 
                        class="w-full bg-[var(--gold-accent)] text-black py-4 text-xs tracking-widest uppercase font-bold hover:bg-amber-700 transition-all duration-300 rounded-lg">
                    Join the Collective
                </button>
            </form>
            
            <!-- Login Link -->
            <div class="mt-8 text-center">
                <p class="text-white/40 text-sm">
                    Already a member? 
                    <a href="/login" class="text-[var(--gold-accent)] hover:underline font-medium">Login</a>
                </p>
            </div>
        </div>
        
        <!-- Back to Home -->
        <div class="text-center mt-8">
            <a href="/" class="text-white/30 text-[10px] tracking-widest uppercase hover:text-[var(--gold-accent)] transition-colors inline-flex items-center gap-2">
                <span class="material-symbols-outlined text-sm">arrow_back</span>
                Return to Gallery
            </a>
        </div>
    </div>
</div>

<!-- Footer (minimal) -->
<footer class="bg-[var(--deep-black)] border-t border-white/5 py-8">
    <div class="max-w-[1400px] mx-auto px-8 text-center">
        <p class="text-stone-600 text-[9px] uppercase tracking-[0.5em]">© <?= date('Y') ?> FOOD RECIPE ELITE. ALL RIGHTS RESERVED.</p>
    </div>
</footer>

<?= $this->endSection() ?>