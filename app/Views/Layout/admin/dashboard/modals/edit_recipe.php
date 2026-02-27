<!-- Edit Recipe Modal -->
<div id="editRecipeModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-[var(--bg-charcoal)] border border-white/10 rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="serif text-2xl font-bold">Edit Recipe</h3>
                <button onclick="closeEditRecipeModal()" class="text-white/60 hover:text-white">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            
            <form id="editRecipeForm" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="recipe_id" id="edit_recipe_id">
                
                <div class="mb-4">
                    <label class="block text-white/70 text-sm mb-2">Recipe Title</label>
                    <input type="text" name="title" id="edit_title" 
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors" required>
                </div>
                
                <div class="mb-4">
                    <label class="block text-white/70 text-sm mb-2">Description</label>
                    <textarea name="description" id="edit_description" rows="4" 
                              class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors" required></textarea>
                </div>
                
                <div class="mb-4">
                    <label class="block text-white/70 text-sm mb-2">Category</label>
                    <select name="id_category" id="edit_id_category" 
                            class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors" required>
                        <option value="">Select Category</option>
                        <?php foreach($categories as $category): ?>
                            <option value="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="mb-4">
                    <label class="block text-white/70 text-sm mb-2">Recipe Image (Optional)</label>
                    <input type="file" name="image" id="edit_image" accept="image/*"
                           class="w-full bg-white/5 border border-white/10 rounded-lg px-4 py-3 text-white focus:border-[var(--primary)] transition-colors">
                    <p class="text-white/30 text-xs mt-1">Leave empty to keep current image</p>
                </div>
                
                <div class="flex gap-4 mt-8">
                    <button type="submit" class="bg-[var(--primary)] hover:bg-[#ea580c] px-8 py-3 rounded-lg font-semibold transition-all">
                        Update Recipe
                    </button>
                    <button type="button" onclick="closeEditRecipeModal()" class="bg-white/5 hover:bg-white/10 px-8 py-3 rounded-lg font-semibold transition-all">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>