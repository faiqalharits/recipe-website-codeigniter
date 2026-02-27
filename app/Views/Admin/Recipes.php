<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('title') ?>Recipes Management<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Header -->
<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
    <div>
        <h2 class="serif text-4xl font-bold tracking-tight mb-2">Recipes Management</h2>
        <p class="text-white/40 text-sm">Manage all recipes and their details in one place.</p>
    </div>
    <button onclick="openAddRecipeModal()" 
            class="bg-[var(--primary)] hover:bg-[#ea580c] transition-all px-6 py-3 rounded-lg font-semibold text-sm flex items-center gap-2">
        <span class="material-symbols-outlined text-xl">add</span>
        Add New Recipe
    </button>
</div>

<!-- Recipes Table -->
<div class="glass-panel rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/5">
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40 w-16"></th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">ID</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Image</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Title</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Category</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Author</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Status</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php foreach($recipes as $recipe): 
                    $hasDetails = !empty($recipeDetails[$recipe['id_recipe']] ?? null);
                ?>
                <!-- Main Row -->
                <tr class="hover:bg-white/[0.02] transition-colors group main-row" data-recipe-id="<?= $recipe['id_recipe'] ?>">
                    <td class="px-8 py-5">
                        <button onclick="toggleDetails(<?= $recipe['id_recipe'] ?>)" 
                                class="text-white/40 hover:text-[var(--primary)] transition-colors">
                            <span class="material-symbols-outlined expand-icon" id="expand-icon-<?= $recipe['id_recipe'] ?>">
                                expand_more
                            </span>
                        </button>
                    </td>
                    <td class="px-8 py-5 text-sm font-medium text-white/30">#<?= $recipe['id_recipe'] ?></td>
                    <td class="px-8 py-5">
                        <div class="h-12 w-16 rounded-lg overflow-hidden border border-white/10">
                            <img src="<?= base_url('uploads/recipes/' . ($recipe['image'] ?? 'default.jpg')) ?>" 
                                 alt="<?= $recipe['title'] ?>" class="w-full h-full object-cover">
                        </div>
                    </td>
                    <td class="px-8 py-5 font-medium text-white/90"><?= $recipe['title'] ?></td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium text-white/60">
                            <?= $recipe['category_name'] ?? 'Uncategorized' ?>
                        </span>
                    </td>
                    <td class="px-8 py-5 text-white/70"><?= $recipe['username'] ?? 'Admin' ?></td>
                    <td class="px-8 py-5">
                        <?php if($hasDetails): ?>
                            <span class="flex items-center gap-1 text-green-400 text-xs">
                                <span class="material-symbols-outlined text-sm">check_circle</span>
                                Complete
                            </span>
                        <?php else: ?>
                            <span class="flex items-center gap-1 text-yellow-400 text-xs">
                                <span class="material-symbols-outlined text-sm">pending</span>
                                Pending Details
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <button onclick="openEditRecipeModal(<?= $recipe['id_recipe'] ?>)" 
                                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all"
                                    title="Edit Recipe">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </button>
                            <button onclick="deleteRecipe(<?= $recipe['id_recipe'] ?>)" 
                                    class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all"
                                    title="Delete Recipe">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Expandable Details Row -->
                <?= view('layout/admin/dashboard/partials/expandable_row', ['recipe' => $recipe, 'details' => $recipeDetails[$recipe['id_recipe']] ?? null]) ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modals -->
<?= view('layout/admin/dashboard/modals/add_recipe', ['categories' => $categories]) ?>
<?= view('layout/admin/dashboard/modals/edit_recipe', ['categories' => $categories]) ?>
<?= view('layout/admin/dashboard/modals/detail_modal') ?>

<script>
// Toggle expandable details
function toggleDetails(recipeId) {
    const row = document.getElementById('details-row-' + recipeId);
    const icon = document.getElementById('expand-icon-' + recipeId);
    
    row.classList.toggle('expanded');
    icon.classList.toggle('expanded');
}

// Open Detail Modal
function openDetailModal(recipeId) {
    document.getElementById('detail_recipe_id').value = recipeId;
    document.getElementById('detailModalTitle').innerText = 'Edit Details for Recipe #' + recipeId;
    
    // Load existing details via AJAX
    fetch('<?= base_url('admin/getRecipeDetails') ?>/' + recipeId)
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data) {
                loadIngredients(data.data.ingredients);
                loadSteps(data.data.steps);
                document.getElementById('detail_notes').value = data.data.notes || '';
            } else {
                // New recipe, empty fields
                ingredientsList = [];
                stepsList = [];
                renderIngredients();
                renderSteps();
                document.getElementById('detail_notes').value = '';
            }
        });
    
    document.getElementById('detailModal').classList.remove('hidden');
}

function closeDetailModal() {
    document.getElementById('detailModal').classList.add('hidden');
}

// Add Recipe Modal
function openAddRecipeModal() {
    document.getElementById('addRecipeModal').classList.remove('hidden');
}

function closeAddRecipeModal() {
    document.getElementById('addRecipeModal').classList.add('hidden');
    document.getElementById('addRecipeForm').reset();
}

// Edit Recipe Modal
function openEditRecipeModal(id) {
    fetch('<?= base_url('admin/editRecipe') ?>/' + id)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                document.getElementById('edit_recipe_id').value = data.data.id_recipe;
                document.getElementById('edit_title').value = data.data.title;
                document.getElementById('edit_description').value = data.data.description;
                document.getElementById('edit_id_category').value = data.data.id_category;
                document.getElementById('editRecipeModal').classList.remove('hidden');
            } else {
                alert('Gagal memuat data: ' + data.message);
            }
        });
}

function closeEditRecipeModal() {
    document.getElementById('editRecipeModal').classList.add('hidden');
    document.getElementById('editRecipeForm').reset();
}

// Submit Add Recipe
document.getElementById('addRecipeForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    fetch('<?= base_url('admin/saveRecipe') ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Resep berhasil ditambahkan!');
            location.reload();
        } else {
            if (data.errors) {
                let errorMsg = 'Validasi gagal:\n';
                for (let key in data.errors) {
                    errorMsg += '- ' + data.errors[key] + '\n';
                }
                alert(errorMsg);
            } else {
                alert('Gagal: ' + data.message);
            }
        }
    });
});

// Submit Edit Recipe
document.getElementById('editRecipeForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const recipeId = document.getElementById('edit_recipe_id').value;
    
    fetch('<?= base_url('admin/updateRecipe') ?>/' + recipeId, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Resep berhasil diupdate!');
            location.reload();
        } else {
            if (data.errors) {
                let errorMsg = 'Validasi gagal:\n';
                for (let key in data.errors) {
                    errorMsg += '- ' + data.errors[key] + '\n';
                }
                alert(errorMsg);
            } else {
                alert('Gagal: ' + data.message);
            }
        }
    });
});

// Delete Recipe
function deleteRecipe(id) {
    if (confirm('Yakin ingin menghapus resep ini? Semua detail, komentar, dan favorit terkait juga akan dihapus.')) {
        fetch('<?= base_url('admin/deleteRecipe') ?>/' + id, {
            method: 'GET'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Resep berhasil dihapus!');
                location.reload();
            } else {
                alert('Gagal: ' + data.message);
            }
        });
    }
}
</script>

<style>
    .expandable-row {
        display: none;
        background: rgba(255, 255, 255, 0.02);
    }
    .expandable-row.expanded {
        display: table-row;
    }
    .expand-icon {
        transition: transform 0.2s;
    }
    .expand-icon.expanded {
        transform: rotate(180deg);
    }
    .detail-card {
        background: rgba(0, 0, 0, 0.3);
        border-radius: 12px;
        padding: 20px;
        margin: 10px 0;
    }
</style>

<?= $this->endSection() ?>