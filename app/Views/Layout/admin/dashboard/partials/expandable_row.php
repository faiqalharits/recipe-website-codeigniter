<tr id="details-row-<?= $recipe['id_recipe'] ?>" class="expandable-row">
    <td colspan="8" class="px-8 py-5">
        <div class="detail-card">
            <div class="flex justify-between items-center mb-4">
                <h4 class="text-lg font-semibold flex items-center gap-2">
                    <span class="material-symbols-outlined text-[var(--primary)]">info</span>
                    Recipe Details
                </h4>
                <button onclick="openDetailModal(<?= $recipe['id_recipe'] ?>)" 
                        class="text-sm bg-[var(--primary)]/10 hover:bg-[var(--primary)]/20 text-[var(--primary)] px-4 py-2 rounded-lg transition-all flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm">edit</span>
                    Edit Details
                </button>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Ingredients -->
                <div>
                    <h5 class="text-white/70 text-sm font-medium mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[var(--primary)] text-lg">kitchen</span>
                        Ingredients
                    </h5>
                    <?php 
                    $ingredients = $details['ingredients'] ?? '[]';
                    $ingredientArray = json_decode($ingredients, true) ?? [];
                    ?>
                    <?php if(!empty($ingredientArray)): ?>
                        <ul class="space-y-2 text-sm text-white/80">
                            <?php foreach($ingredientArray as $item): ?>
                                <li class="flex items-start gap-2">
                                    <span class="text-[var(--primary)] text-xs">•</span>
                                    <span><?= htmlspecialchars($item) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="text-white/30 italic text-sm">No ingredients added yet.</p>
                    <?php endif; ?>
                </div>
                
                <!-- Steps -->
                <div>
                    <h5 class="text-white/70 text-sm font-medium mb-3 flex items-center gap-2">
                        <span class="material-symbols-outlined text-[var(--primary)] text-lg">list</span>
                        Steps
                    </h5>
                    <?php 
                    $steps = $details['steps'] ?? '[]';
                    $stepArray = json_decode($steps, true) ?? [];
                    ?>
                    <?php if(!empty($stepArray)): ?>
                        <ol class="space-y-2 text-sm text-white/80 list-decimal list-inside">
                            <?php foreach($stepArray as $step): ?>
                                <li class="text-white/80"><?= htmlspecialchars($step) ?></li>
                            <?php endforeach; ?>
                        </ol>
                    <?php else: ?>
                        <p class="text-white/30 italic text-sm">No steps added yet.</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Notes -->
            <?php if(!empty($details['notes'])): ?>
            <div class="mt-6 pt-4 border-t border-white/5">
                <h5 class="text-white/70 text-sm font-medium mb-2 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[var(--primary)] text-lg">note</span>
                    Chef's Notes
                </h5>
                <p class="text-white/60 italic text-sm"><?= nl2br(htmlspecialchars($details['notes'])) ?></p>
            </div>
            <?php endif; ?>
        </div>
    </td>
</tr>