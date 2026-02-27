<!-- DETAIL MODAL (dengan input list dinamis) -->
<div id="detailModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-[var(--bg-charcoal)] border border-white/10 rounded-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
        <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="serif text-2xl font-bold" id="detailModalTitle">Edit Recipe Details</h3>
                <button onclick="closeDetailModal()" class="text-white/60 hover:text-white">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <form id="detailForm">
                <?= csrf_field() ?>
                <input type="hidden" name="recipe_id" id="detail_recipe_id">
                <input type="hidden" name="ingredients_json" id="ingredients_json">
                <input type="hidden" name="steps_json" id="steps_json">
                
                <!-- INGREDIENTS SECTION -->
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-[var(--primary)]">kitchen</span>
                        <h4 class="text-xl font-semibold">Ingredients</h4>
                    </div>
                    
                    <div class="bg-white/5 rounded-xl p-4" id="ingredients-container">
                        <!-- Ingredients list -->
                        <div class="space-y-3 mb-3" id="ingredients-list"></div>
                        
                        <!-- Add new ingredient -->
                        <div class="flex items-center gap-2 mt-4">
                            <input type="text" id="new-ingredient" 
                                   class="flex-1 bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors"
                                   placeholder="Add new ingredient...">
                            <button type="button" onclick="addIngredient()" 
                                    class="bg-[var(--primary)] hover:bg-[#ea580c] w-12 h-12 rounded-lg flex items-center justify-center transition-all">
                                <span class="material-symbols-outlined">add</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- STEPS SECTION -->
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-[var(--primary)]">list</span>
                        <h4 class="text-xl font-semibold">Steps</h4>
                    </div>
                    
                    <div class="bg-white/5 rounded-xl p-4" id="steps-container">
                        <!-- Steps list -->
                        <div class="space-y-3 mb-3" id="steps-list"></div>
                        
                        <!-- Add new step -->
                        <div class="flex items-center gap-2 mt-4">
                            <input type="text" id="new-step" 
                                   class="flex-1 bg-black/50 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors"
                                   placeholder="Add new step...">
                            <button type="button" onclick="addStep()" 
                                    class="bg-[var(--primary)] hover:bg-[#ea580c] w-12 h-12 rounded-lg flex items-center justify-center transition-all">
                                <span class="material-symbols-outlined">add</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- NOTES SECTION -->
                <div class="mb-8">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="material-symbols-outlined text-[var(--primary)]">note</span>
                        <h4 class="text-xl font-semibold">Chef's Notes</h4>
                    </div>
                    <textarea name="notes" id="detail_notes" rows="3" 
                              class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors"
                              placeholder="Additional tips, variations, or notes..."></textarea>
                </div>
                
                <div class="flex gap-4 mt-8">
                    <button type="submit" class="bg-[var(--primary)] hover:bg-[#ea580c] px-8 py-3 rounded-lg font-semibold transition-all">
                        Save Details
                    </button>
                    <button type="button" onclick="closeDetailModal()" class="bg-white/5 hover:bg-white/10 px-8 py-3 rounded-lg font-semibold transition-all">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Data arrays untuk menyimpan ingredients dan steps
let ingredientsList = [];
let stepsList = [];

// Load ingredients dari JSON
function loadIngredients(jsonString) {
    if (jsonString) {
        try {
            ingredientsList = JSON.parse(jsonString);
        } catch {
            // Fallback ke format lama (split new line)
            ingredientsList = jsonString.split('\n').filter(i => i.trim());
        }
    } else {
        ingredientsList = [];
    }
    renderIngredients();
}

// Load steps dari JSON
function loadSteps(jsonString) {
    if (jsonString) {
        try {
            stepsList = JSON.parse(jsonString);
        } catch {
            stepsList = jsonString.split('\n').filter(s => s.trim());
        }
    } else {
        stepsList = [];
    }
    renderSteps();
}

// Render ingredients
function renderIngredients() {
    const container = document.getElementById('ingredients-list');
    const listHtml = ingredientsList.map((ing, index) => `
        <div class="flex items-center gap-2 group">
            <span class="text-[var(--primary)]">•</span>
            <span class="flex-1 text-white/90">${ing}</span>
            <button type="button" onclick="removeIngredient(${index})" 
                    class="opacity-0 group-hover:opacity-100 text-red-400 hover:text-red-300 transition-all">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        </div>
    `).join('');
    
    container.innerHTML = listHtml || '<p class="text-white/30 italic">No ingredients added yet.</p>';
    document.getElementById('ingredients_json').value = JSON.stringify(ingredientsList);
}

// Render steps
function renderSteps() {
    const container = document.getElementById('steps-list');
    const listHtml = stepsList.map((step, index) => `
        <div class="flex items-center gap-2 group">
            <span class="text-[var(--primary)] font-mono">${index + 1}.</span>
            <span class="flex-1 text-white/90">${step}</span>
            <button type="button" onclick="removeStep(${index})" 
                    class="opacity-0 group-hover:opacity-100 text-red-400 hover:text-red-300 transition-all">
                <span class="material-symbols-outlined text-lg">close</span>
            </button>
        </div>
    `).join('');
    
    container.innerHTML = listHtml || '<p class="text-white/30 italic">No steps added yet.</p>';
    document.getElementById('steps_json').value = JSON.stringify(stepsList);
}

// Tambah ingredient
function addIngredient() {
    const input = document.getElementById('new-ingredient');
    const value = input.value.trim();
    
    if (value) {
        ingredientsList.push(value);
        renderIngredients();
        input.value = '';
        input.focus();
    }
}

// Tambah step
function addStep() {
    const input = document.getElementById('new-step');
    const value = input.value.trim();
    
    if (value) {
        stepsList.push(value);
        renderSteps();
        input.value = '';
        input.focus();
    }
}

// Hapus ingredient
function removeIngredient(index) {
    ingredientsList.splice(index, 1);
    renderIngredients();
}

// Hapus step
function removeStep(index) {
    stepsList.splice(index, 1);
    renderSteps();
}

// Enter key untuk add
document.getElementById('new-ingredient')?.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        addIngredient();
    }
});

document.getElementById('new-step')?.addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        addStep();
    }
});

// Submit Detail Form
document.getElementById('detailForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData();
    formData.append('recipe_id', document.getElementById('detail_recipe_id').value);
    formData.append('ingredients', JSON.stringify(ingredientsList));
    formData.append('steps', JSON.stringify(stepsList));
    formData.append('notes', document.getElementById('detail_notes').value);
    formData.append('<?= csrf_token() ?>', document.querySelector('input[name="<?= csrf_token() ?>"]').value);
    
    fetch('<?= base_url('admin/saveRecipeDetail') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('✅ ' + data.message);
            location.reload(); // Refresh to show updated details
        } else {
            alert('❌ Gagal menyimpan detail');
        }
    });
});
</script>