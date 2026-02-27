<section class="mt-20" id="comments">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 mb-10 pb-6 border-b border-white/10">
        <div>
            <h2 class="text-3xl font-bold serif-title text-white mb-1">Community Reviews</h2>
            <p class="text-stone-500 text-sm">
                <?= count($comments) ?> comments
            </p>
        </div>
    </div>

    <!-- Comments List -->
    <div class="space-y-6 mb-12" id="comments-list">
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment-card p-6 rounded-2xl bg-[var(--charcoal)] border border-white/5">
                    <div class="flex items-start gap-4">
                        <div class="w-11 h-11 rounded-full flex-shrink-0 overflow-hidden bg-[var(--gold-accent)]/20 flex items-center justify-center">
                            <span class="material-icons-outlined text-[var(--gold-accent)]">person</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex flex-wrap items-center gap-3 mb-2">
                                <span class="font-bold text-white"><?= $comment['username'] ?></span>
                                <span class="text-xs text-stone-500"><?= date('d M Y', strtotime($comment['created_at'])) ?></span>
                            </div>
                            <p class="text-stone-400 leading-relaxed text-sm"><?= $comment['content'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-stone-500 text-center py-12">No comments yet. Be the first to share your experience!</p>
        <?php endif; ?>
    </div>

    <!-- Comment Form -->
    <div class="p-8 rounded-3xl bg-[var(--charcoal)] border border-white/5">
        <h3 class="text-xl font-bold serif-title text-white mb-6">Write a Review</h3>

        <?php if (session()->get('isLoggedIn')): ?>
            <form id="commentForm" method="POST" action="<?= base_url('recipe/addComment') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="id_recipe" value="<?= $recipe['id_recipe'] ?>">

                <div class="mb-6">
                    <textarea name="content" id="comment_text" rows="4"
                        class="w-full px-4 py-3 rounded-xl bg-[var(--deep-black)] border border-white/10 text-white placeholder-stone-600 focus:border-[var(--gold-accent)] transition-colors resize-none text-sm"
                        placeholder="Share your experience with this recipe..." required></textarea>
                </div>

                <button type="submit" class="flex items-center gap-2 bg-[var(--gold-accent)] hover:bg-amber-700 text-black px-8 py-3 rounded-full font-bold transition-all text-sm">
                    <span class="material-icons-outlined text-base">send</span>
                    Post Comment
                </button>
            </form>
        <?php else: ?>
            <p class="text-stone-400 text-center">
                <a href="/login" class="text-[var(--gold-accent)] hover:underline">Login</a> to write a review
            </p>
        <?php endif; ?>
    </div>
</section>