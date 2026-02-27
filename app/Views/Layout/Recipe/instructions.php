<section class="prose prose-invert max-w-none">
    <h2 class="text-3xl font-bold serif-title text-white mb-8">Cooking Instructions</h2>
    <?php if (!empty($steps) && is_array($steps)): ?>
        <div class="space-y-12">
            <?php foreach ($steps as $index => $step): ?>
                <div class="flex gap-6">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full <?= $index == 0 ? 'bg-[var(--gold-accent)] text-black' : 'bg-[var(--charcoal)] text-stone-500' ?> flex items-center justify-center font-bold text-xl">
                        <?= $index + 1 ?>
                    </div>
                    <div>
                        <p class="text-stone-400 leading-relaxed">
                            <?= is_array($step) ? ($step['description'] ?? $step[0] ?? '') : $step ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-stone-500">No instructions available.</p>
    <?php endif; ?>
</section>