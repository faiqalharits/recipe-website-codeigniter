<div class="sticky top-24 p-8 rounded-3xl bg-[var(--charcoal)] border border-white/5">
    <h3 class="text-2xl font-bold serif-title text-white mb-8 border-b border-white/10 pb-4">Ingredients</h3>
    <?php if (!empty($ingredients) && is_array($ingredients)): ?>
        <ul class="space-y-4">
            <?php foreach ($ingredients as $ingredient): ?>
                <li>
                    <label class="flex items-center cursor-pointer group">
                        <input type="checkbox" class="w-5 h-5 rounded border-white/20 text-[var(--gold-accent)] focus:ring-[var(--gold-accent)] bg-transparent ingredient-checkbox" />
                        <span class="ml-3 text-stone-300 group-hover:text-[var(--gold-accent)] transition-colors">
                            <?= is_array($ingredient) ? ($ingredient['name'] ?? $ingredient[0] ?? '') : $ingredient ?>
                        </span>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="text-stone-500">No ingredients listed.</p>
    <?php endif; ?>
</div>