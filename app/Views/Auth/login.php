<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="min-h-screen flex items-center justify-center px-8 py-32">
    <div class="max-w-md w-full">
        <!-- Logo -->
        <div class="text-center mb-12">
            <span class="text-4xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
        </div>
        
        <!-- Login Card -->
        <div class="bg-[var(--charcoal)] border border-white/5 p-12">
            <h1 class="text-3xl font-light text-white mb-8 text-center">Access Gallery</h1>
            
            <!-- Error Messages -->
            <?php if(session()->getFlashdata('error')): ?>
                <div class="mb-6 p-4 bg-red-500/10 border border-red-500/20">
                    <p class="text-red-400 text-sm text-center"><?= session()->getFlashdata('error') ?></p>
                </div>
            <?php endif; ?>
            
            <?php if(session()->getFlashdata('success')): ?>
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/20">
                    <p class="text-green-400 text-sm text-center"><?= session()->getFlashdata('success') ?></p>
                </div>
            <?php endif; ?>
            
            <!-- Login Form -->
            <form action="/auth/doLogin" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-6">
                    <label for="username" class="block text-[10px] uppercase tracking-[0.3em] text-white/50 mb-3">Username</label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           class="w-full bg-transparent border border-white/10 px-6 py-4 text-white text-sm focus:border-[var(--gold-accent)] transition-colors outline-none"
                           placeholder="Enter username"
                           required>
                </div>
                
                <div class="mb-8">
                    <label for="password" class="block text-[10px] uppercase tracking-[0.3em] text-white/50 mb-3">Password</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="w-full bg-transparent border border-white/10 px-6 py-4 text-white text-sm focus:border-[var(--gold-accent)] transition-colors outline-none"
                           placeholder="Enter password"
                           required>
                </div>
                
                <button type="submit" 
                        class="w-full bg-[var(--burnt-orange)] text-black py-4 text-xs tracking-widest uppercase font-bold hover:bg-orange-700 transition-all duration-300">
                    Login
                </button>
            </form>
            
            <!-- Register Link -->
            <div class="mt-8 text-center">
                <p class="text-white/40 text-sm">
                    Belum punya akun? 
                    <a href="/register" class="text-[var(--gold-accent)] hover:underline">Register</a>
                </p>
            </div>
        </div>
        
        <!-- Back to Home -->
        <div class="text-center mt-8">
            <a href="/" class="text-white/30 text-xs tracking-widest uppercase hover:text-[var(--gold-accent)] transition-colors">
                ← Back to Home
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>