<?php
// Membuat fungsi untuk mencari di Bing
function bing_search($query) {
  // Menggunakan API Bing Search v7
  $url = "https://api.cognitive.microsoft.com/bing/v7.0/search?q=" . urlencode($query);
  // Mengatur kunci langganan dan header permintaan
  $key = "YOUR_SUBSCRIPTION_KEY";
  $headers = array(
    "Ocp-Apim-Subscription-Key: $key",
    "Accept: application/json"
  );
  // Menginisialisasi curl dan mengatur opsi
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // Menjalankan permintaan dan mendapatkan respons
  $response = curl_exec($ch);
  // Menutup curl
  curl_close($ch);
  // Mengembalikan respons sebagai array asosiatif
  return json_decode($response, true);
}

// Membuat fungsi untuk menampilkan hasil pencarian
function display_results($results) {
  // Mengecek apakah ada hasil yang ditemukan
  if (isset($results["webPages"]["value"])) {
    // Menampilkan jumlah hasil dan durasi pencarian
    echo "<p>Ditemukan " . $results["webPages"]["totalEstimatedMatches"] . " hasil dalam " . $results["webPages"]["value"][0]["dateLastCrawled"] . " detik.</p>";
    // Menampilkan setiap hasil dengan judul, url, dan cuplikan
    echo "<ol>";
    foreach ($results["webPages"]["value"] as $result) {
      echo "<li>";
      echo "<a href='" . $result["url"] . "'>" . $result["name"] . "</a><br>";
      echo "<p>" . $result["snippet"] . "</p>";
      echo "</li>";
    }
    echo "</ol>";
  } else {
    // Menampilkan pesan jika tidak ada hasil yang ditemukan
    echo "<p>Maaf, tidak ada hasil yang cocok dengan permintaan Anda.</p>";
  }
}

// Membuat variabel untuk menyimpan kueri pencarian
$query = "microsoft bing features";

// Menjalankan fungsi pencarian dan menyimpan hasilnya
$results = bing_search($query);

// Menampilkan kueri pencarian
echo "<h1>Anda mencari: " . $query . "</h1>";

// Menjalankan fungsi untuk menampilkan hasil pencarian
display_results($results);

?>