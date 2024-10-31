<?php


if (!function_exists("uniqueCode32")) {
  function uniqueCode32()
  {
    $timestamp = strtotime("now");
    return base_convert($timestamp, 10, 32) . rand(100, 999);
  }
}


/* TESTER */
if (!function_exists('tester')) {
  function tester($e = "", ...$options) {
      // Parametreleri kontrol etmek için bir dizi oluştur
      $options = array_map('strtolower', $options); // Tüm opsiyonları küçük harfe çevir

      // Eğer 'notheader' yoksa JSON başlığını ekle
      if (!in_array("notheader", $options)) {
          header('Content-Type: application/json');
      }

      // Eğer 'notpretty' yoksa pretty print yap, varsa normal JSON formatı
      echo in_array("notpretty", $options) ? json_encode($e) : json_encode($e, JSON_PRETTY_PRINT);

      // Eğer 'notexit' yoksa scripti sonlandır
      if (!in_array("notexit", $options)) {
          exit;
      }
  }
}
