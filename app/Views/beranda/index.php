<!DOCTYPE html>
<html>
<head>
  <title>Gambar Bergerak</title>
  <style>
    /* Animasi bergerak dengan durasi 2 detik */
    @keyframes slide {
      0% { margin-left: 0; }
      100% { margin-left: 300px; } /* Ubah nilai 300px sesuai dengan lebar gambar */
    }

    /* Gaya untuk elemen gambar */
    img {
      width: 200px; /* Lebar gambar */
      position: relative;
      animation: slide 2s infinite; /* Menggunakan animasi 'slide' dengan durasi 2 detik dan diulang secara terus-menerus (infinite) */
    }
  </style>
</head>
<body>
  <img src="gambar_anda.jpg" alt="Gambar Bergerak">
</body>
</html>
