<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('title') ?>Recipe Details<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="flex items-center gap-4 mb-10">
    <a href="<?= base_url('admin/recipes') ?>" class="text-white/60 hover:text-white">
        <span class="material-symbols-outlined">arrow_back</span>
    </a>
    <h2 class="serif text-4xl font-bold tracking-tight">Details for: <?= $recipe['title'] ?? 'Recipe' ?></h2>
</div>

<div class="glass-panel rounded-2xl p-8">
    <form id="recipeDetailForm">
        <?= csrf_field() ?>
        <input type="hidden" name="recipe_id" value="<?= $recipe_id ?>">
        
        <div class="mb-6">
            <label class="block text-white/70 text-sm mb-2">Ingredients</label>
            <textarea name="ingredients" id="ingredients" rows="8" 
                      class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors font-mono text-sm"
                      placeholder="• 200g pasta&#10;• 2 tbsp olive oil&#10;• 3 cloves garlic, minced&#10;• Salt and pepper to taste"><?= $details['ingredients'] ?? '' ?></textarea>
            <p class="text-white/30 text-xs mt-1">Separate each ingredient with new line. Use • for bullet points.</p>
        </div>
        
        <div class="mb-6">
            <label class="block text-white/70 text-sm mb-2">Steps</label>
            <textarea name="steps" id="steps" rows="10" 
                      class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors font-mono text-sm"
                      placeholder="1. Boil water...&#10;2. Cook pasta...&#10;3. Prepare sauce..."><?= $details['steps'] ?? '' ?></textarea>
            <p class="text-white/30 text-xs mt-1">Separate each step with new line. Use numbers for ordering.</p>
        </div>
        
        <div class="mb-6">
            <label class="block text-white/70 text-sm mb-2">Notes</label>
            <textarea name="notes" id="notes" rows="3" 
                      class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors"
                      placeholder="Additional tips, variations, or notes..."><?= $details['notes'] ?? '' ?></textarea>
        </div>
        
        <div class="flex gap-4">
            <button type="submit" class="bg-[var(--primary)] hover:bg-[#ea580c] px-8 py-3 rounded-lg font-semibold transition-all">
                Save Details
            </button>
            <a href="<?= base_url('admin/recipes') ?>" class="bg-white/5 hover:bg-white/10 px-8 py-3 rounded-lg font-semibold transition-all">
                Back to Recipes
            </a>
        </div>
    </form>
</div>

<script>
document.getElementById('recipeDetailForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?= base_url('admin/saveRecipeDetail') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
        } else {
            alert('Gagal menyimpan detail');
        }
    });
});
</script>

<?= $this->endSection() ?>