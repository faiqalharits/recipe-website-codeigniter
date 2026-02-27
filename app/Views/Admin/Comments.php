<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('title') ?>Comments Management<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
    <div>
        <h2 class="serif text-4xl font-bold tracking-tight mb-2">Comments Management</h2>
        <p class="text-white/40 text-sm">Manage all user comments.</p>
    </div>
</div>

<div class="glass-panel rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/5">
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">ID</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">User</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Recipe</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Comment</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Date</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php foreach($comments as $comment): ?>
                <tr class="hover:bg-white/[0.02] transition-colors" id="comment-row-<?= $comment['id_comment'] ?>">
                    <td class="px-8 py-5 text-sm font-medium text-white/30">#<?= $comment['id_comment'] ?></td>
                    <td class="px-8 py-5 font-medium text-white/90"><?= $comment['username'] ?></td>
                    <td class="px-8 py-5 text-white/70"><?= $comment['recipe_title'] ?></td>
                    <td class="px-8 py-5 max-w-md">
                        <p class="text-white/70 text-sm"><?= $comment['content'] ?></p>
                    </td>
                    <td class="px-8 py-5 text-white/50 text-sm"><?= date('d M Y', strtotime($comment['created_at'])) ?></td>
                    <td class="px-8 py-5 text-right">
                        <button onclick="deleteComment(<?= $comment['id_comment'] ?>)" 
                                class="w-9 h-9 inline-flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all"
                                title="Delete Comment">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function deleteComment(id) {
    if (confirm('Yakin ingin menghapus komentar ini?')) {
        fetch('<?= base_url('admin/deleteComment') ?>/' + id)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Komentar berhasil dihapus!');
                    document.getElementById('comment-row-' + id).remove();
                } else {
                    alert('Gagal: ' + data.message);
                }
            });
    }
}
</script>

<?= $this->endSection() ?>