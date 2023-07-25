<!-- app/Views/post/detail.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Detail Post</title>
</head>
<body>
    <?php if ($post && $Kembali): ?>
        <h1><?= $post['nm_buku']; ?></h1>
        <p><?= $post['pinjam']; ?></p>
        <!-- Tampilkan data dari Kembali jika ditemukan -->
        <h2>Data Kembali</h2>
        <?php if ($Kembali): ?>
            <p>Tanggal Kembali: <?= $Kembali['kembali']; ?></p>
        <?php else: ?>
            <p>Belum dikembalikan</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Post not found.</p>
    <?php endif; ?>
</body>
</html>
