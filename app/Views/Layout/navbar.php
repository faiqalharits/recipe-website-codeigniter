<nav class="fixed top-0 z-[100] w-full bg-transparent py-8 transition-all duration-500">
    <div class="max-w-[1400px] mx-auto px-8 lg:px-16">
        <div class="flex justify-between items-center nav-blur bg-[var(--glass-bg)] border border-white/5 px-8 py-4 rounded-full">
            <!-- Logo -->
            <div class="flex items-center gap-12">
                <a href="/" class="flex items-center gap-2">
                    <span class="text-2xl font-bold tracking-tighter text-white italic">FR<span class="text-[var(--gold-accent)]">.</span></span>
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-12">
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors <?= uri_string() == '' ? 'text-[var(--gold-accent)]' : '' ?>" href="/">Home</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors <?= uri_string() == 'about' ? 'text-[var(--gold-accent)]' : '' ?>" href="/about">About</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors <?= uri_string() == 'recipe' ? 'text-[var(--gold-accent)]' : '' ?>" href="/recipe">Recipe</a>
                    <a class="text-[10px] uppercase tracking-[0.4em] font-medium text-white/50 hover:text-[var(--gold-accent)] transition-colors <?= uri_string() == 'favorites' ? 'text-[var(--gold-accent)]' : '' ?>" href="/favorites">Favorites</a>
                </div>
            </div>
            
            <!-- Right Section: Username + Dropdown -->
            <div class="flex items-center gap-4">
                <?php if(session()->get('isLoggedIn')): ?>
                    <!-- Username (Desktop) -->
                    <span class="hidden lg:block text-white/70 text-xs tracking-wider">
                        <?= session()->get('username') ?>
                    </span>
                    
                    <!-- Dropdown Container -->
                    <div class="relative" id="dropdown-container">
                        <!-- Menu Button (3 garis) -->
                        <button id="dropdown-toggle" class="text-white/80 hover:text-white transition-colors focus:outline-none">
                            <span class="material-symbols-outlined font-light text-2xl">menu</span>
                        </button>
                        
                        <!-- Dropdown Menu (hidden by default) -->
                        <div id="dropdown-menu" class="absolute right-0 mt-3 w-56 bg-[var(--charcoal)] border border-white/10 rounded-xl shadow-2xl py-2 hidden z-50">
                            <!-- User Info (Mobile) -->
                            <div class="px-4 py-3 border-b border-white/10 lg:hidden">
                                <p class="text-white text-sm font-medium"><?= session()->get('username') ?></p>
                                <p class="text-white/50 text-xs"><?= session()->get('email') ?></p>
                            </div>
                            
                            <!-- Menu Items -->
                            <a href="/favorites" class="flex items-center gap-3 px-4 py-3 text-sm text-white/70 hover:text-white hover:bg-white/5 transition-colors">
                                <span class="material-symbols-outlined text-[var(--gold-accent)] text-lg">favorite</span>
                                My Favorites
                            </a>
                            
                            <a href="/profile" class="flex items-center gap-3 px-4 py-3 text-sm text-white/70 hover:text-white hover:bg-white/5 transition-colors">
                                <span class="material-symbols-outlined text-[var(--gold-accent)] text-lg">person</span>
                                Profile
                            </a>
                            
                            <?php if(session()->get('role') == 'admin'): ?>
                            <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 text-sm text-white/70 hover:text-white hover:bg-white/5 transition-colors">
                                <span class="material-symbols-outlined text-[var(--gold-accent)] text-lg">dashboard</span>
                                Admin Dashboard
                            </a>
                            <?php endif; ?>
                            
                            <div class="border-t border-white/10 my-1"></div>
                            
                            <a href="/logout" class="flex items-center gap-3 px-4 py-3 text-sm text-red-400 hover:text-red-300 hover:bg-white/5 transition-colors">
                                <span class="material-symbols-outlined text-lg">logout</span>
                                Logout
                            </a>
                        </div>
                    </div>
                    
                <?php else: ?>
                    <!-- Guest Menu -->
                    <div class="hidden lg:flex items-center gap-4">
                        <a href="/login" class="text-white/80 hover:text-white text-[10px] uppercase tracking-[0.4em] font-medium transition-colors">Login</a>
                        <a href="/register" class="bg-[var(--gold-accent)] text-black px-4 py-2 text-[10px] uppercase tracking-[0.4em] font-bold rounded-full hover:bg-amber-700 transition-all">Register</a>
                    </div>
                    
                    <!-- Mobile Menu Button (for guest) -->
                    <div class="relative lg:hidden" id="dropdown-container-guest">
                        <button id="dropdown-toggle-guest" class="text-white/80 hover:text-white transition-colors focus:outline-none">
                            <span class="material-symbols-outlined font-light text-2xl">menu</span>
                        </button>
                        
                        <div id="dropdown-menu-guest" class="absolute right-0 mt-3 w-48 bg-[var(--charcoal)] border border-white/10 rounded-xl shadow-2xl py-2 hidden z-50">
                            <a href="/login" class="flex items-center gap-3 px-4 py-3 text-sm text-white/70 hover:text-white hover:bg-white/5 transition-colors">
                                <span class="material-symbols-outlined text-[var(--gold-accent)] text-lg">login</span>
                                Login
                            </a>
                            <a href="/register" class="flex items-center gap-3 px-4 py-3 text-sm text-white/70 hover:text-white hover:bg-white/5 transition-colors">
                                <span class="material-symbols-outlined text-[var(--gold-accent)] text-lg">person_add</span>
                                Register
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- JavaScript for Dropdown -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Dropdown for logged in users
    const dropdownToggle = document.getElementById('dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');
    
    if (dropdownToggle && dropdownMenu) {
        dropdownToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });
    }
    
    // Dropdown for guests
    const guestToggle = document.getElementById('dropdown-toggle-guest');
    const guestMenu = document.getElementById('dropdown-menu-guest');
    
    if (guestToggle && guestMenu) {
        guestToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            guestMenu.classList.toggle('hidden');
        });
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', function() {
        if (dropdownMenu) dropdownMenu.classList.add('hidden');
        if (guestMenu) guestMenu.classList.add('hidden');
    });
    
    // Prevent closing when clicking inside dropdown
    if (dropdownMenu) {
        dropdownMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
    
    if (guestMenu) {
        guestMenu.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
});
</script>