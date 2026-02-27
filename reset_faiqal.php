<?php
// reset_faiqal.php
require_once 'vendor/autoload.php';

$db = db_connect();

// Password baru yang akan digunakan
$new_password = 'faiqal123';
$hashed = password_hash($new_password, PASSWORD_DEFAULT);

// Update user faiqal
$db->table('user')
   ->where('username', 'faiqal')
   ->update(['password' => $hashed]);

echo "✅ Password untuk user 'faiqal' telah direset!\n";
echo "Username: faiqal\n";
echo "Password baru: " . $new_password . "\n\n";
echo "Hash baru: " . $hashed . "\n";

// Verifikasi hasil
$updated = $db->table('user')->where('username', 'faiqal')->get()->getRow();
echo "\nVerifikasi password baru:\n";
$verify = password_verify($new_password, $updated->password);
echo "Status: " . ($verify ? "✅ BERHASIL" : "❌ GAGAL") . "\n";