<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= $recipe['title'] ?? 'Recipe Detail' ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
    :root {
        --burnt-orange: #d97706;
        --deep-black: #080808;
        --charcoal: #121212;
        --gold-accent: #c5a059;
        --glass-bg: rgba(18, 18, 18, 0.7);
        --primary: #ea580c;
    }
    body {
        background-color: var(--deep-black);
        color: #d4d4d4;
        font-family: 'Inter', sans-serif;
    }
    h1, h2, h3, h4 {
        font-family: 'Playfair Display', serif;
    }
    .hero-gradient {
        background: linear-gradient(to top, rgba(8, 8, 8, 1) 0%, rgba(8, 8, 8, 0.4) 50%, rgba(8, 8, 8, 0.2) 100%);
    }
    .ingredient-checkbox:checked+span {
        text-decoration: line-through;
        opacity: 0.5;
    }
    .comment-card {
        animation: fadeInUp 0.4s ease forwards;
        opacity: 0;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(16px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>


<!-- Hero Section -->
<?= view('layout/recipe/header', ['recipe' => $recipe, 'is_favorite' => $is_favorite]) ?>

<!-- Recipe Meta Info -->
<?= view('layout/recipe/meta_info') ?>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">

        <!-- Ingredients Sidebar -->
        <aside class="lg:col-span-4 order-2 lg:order-1">
            <?= view('layout/recipe/ingridients', ['ingredients' => $ingredients]) ?>
        </aside>

        <!-- Instructions & Comments -->
        <div class="lg:col-span-8 order-1 lg:order-2">
            
            <!-- Instructions -->
            <?= view('layout/recipe/instructions', ['steps' => $steps]) ?>
            
            <!-- Chef's Tip (static) -->
            <?= view('layout/recipe/chef_tip') ?>
            
            <!-- Comments Section -->
            <?= view('layout/recipe/comments', [
                'comments' => $comments,
                'recipe' => $recipe
            ]) ?>
            
        </div>
    </div>
</main>


<script>
    // Comment form submission
    document.getElementById('commentForm')?.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch('/recipe/addComment', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                location.reload();
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan');
        });
    });
</script>

<?= $this->endSection() ?>