<?= $this->extend('layout/admin/admin_layout') ?>

<?= $this->section('title') ?>Users Management<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
    <div>
        <h2 class="serif text-4xl font-bold tracking-tight mb-2">Users Management</h2>
        <p class="text-white/40 text-sm">Manage all registered users.</p>
    </div>
</div>

<div class="glass-panel rounded-2xl overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-white/5">
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">ID</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Username</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Email</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40">Role</th>
                    <th class="px-8 py-6 text-[11px] uppercase tracking-[0.2em] font-semibold text-white/40 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                <?php foreach($users as $user): ?>
                <tr class="hover:bg-white/[0.02] transition-colors">
                    <td class="px-8 py-5 text-sm font-medium text-white/30">#<?= $user['id_user'] ?></td>
                    <td class="px-8 py-5 font-medium text-white/90"><?= $user['username'] ?></td>
                    <td class="px-8 py-5 text-white/70"><?= $user['email'] ?></td>
                    <td class="px-8 py-5">
                        <span class="px-3 py-1 bg-white/5 border border-white/10 rounded-full text-[11px] font-medium capitalize <?= $user['role'] == 'admin' ? 'text-[var(--primary)]' : 'text-white/60' ?>">
                            <?= $user['role'] ?>
                        </span>
                    </td>
                    <td class="px-8 py-5 text-right">
                        <div class="flex items-center justify-end gap-3">
                            <a href="<?= base_url('admin/users/edit/' . $user['id_user']) ?>" 
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-white/5 hover:bg-white/10 text-white/60 hover:text-white transition-all">
                                <span class="material-symbols-outlined text-lg">edit</span>
                            </a>
                            <a href="<?= base_url('admin/users/delete/' . $user['id_user']) ?>" 
                               class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500/10 hover:bg-red-500/20 text-red-400 hover:text-red-300 transition-all"
                               onclick="return confirm('Delete this user?')">
                                <span class="material-symbols-outlined text-lg">delete</span>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>