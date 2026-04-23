<?php
// JSON response yang Anda terima
$jsonResponse = '{"code":200,"message":"Success","data":[{"id":1,"id_index":1,"kode_provinsi":35,"nama_provinsi":"JAWA TIMUR","periode_update":"2025","kategori":"ALOKASI PAGU","jumlah":3577993386000,"satuan":"RUPIAH","tahun":2025},{"id":1,"id_index":2,"kode_provinsi":35,"nama_provinsi":"JAWA TIMUR","periode_update":"2025","kategori":"ALOKASI PAGU DAN SISA DBHCHT","jumlah":4258956889951,"satuan":"RUPIAH","tahun":2025},{"id":1,"id_index":3,"kode_provinsi":35,"nama_provinsi":"JAWA TIMUR","periode_update":"2025","kategori":"REALISASI DBHCHT","jumlah":3754222792584,"satuan":"RUPIAH","tahun":2025}],"error":{},"pagination":{"page":1,"per_page":10,"total_page":1,"total_data":3,"has_next":false,"has_previous":false},"source":{"path":null,"rows":3,"cols":9},"metadata":["id","id_index","kode_provinsi","nama_provinsi","periode_update","kategori","jumlah","satuan","tahun"],"metadata_filter":[{"key":"id_index","type":"select","value":["1","2","3"]},{"key":"kode_provinsi","type":"select","value":["35"]},{"key":"nama_provinsi","type":"select","value":["JAWA TIMUR"]},{"key":"periode_update","type":"select","value":["2025"]},{"key":"kategori","type":"select","value":["ALOKASI PAGU","ALOKASI PAGU DAN SISA DBHCHT","REALISASI DBHCHT"]},{"key":"jumlah","type":"free text","value":[]},{"key":"satuan","type":"select","value":["RUPIAH"]},{"key":"tahun","type":"select","value":["2025"]}]}';

// Ubah JSON menjadi array PHP
$data = json_decode($jsonResponse, true);

// Cek apakah decoding berhasil
if ($data === null) {
    die("Gagal mengubah JSON menjadi array");
}

// Akses data utama
$responseCode = $data['code'];      // 200
$message = $data['message'];         // "Success"
$records = $data['data'];            // Array berisi 3 record
$pagination = $data['pagination'];   // Info pagination

// Tampilkan hasil
echo "Response Code: $responseCode\n";
echo "Message: $message\n";
echo "Total Data: " . count($records) . "\n\n";

// Loop data
foreach ($records as $record) {
    echo "========================\n";
    echo "Kategori: " . $record['kategori'] . "\n";
    echo "Jumlah: " . number_format($record['jumlah'], 0, ',', '.') . " " . $record['satuan'] . "\n";
    echo "Tahun: " . $record['tahun'] . "\n";
}
?>