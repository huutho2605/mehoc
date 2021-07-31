<?php 
include 'config.php';
$sql = "SELECT id FROM posts";
$result = mysqli_query($conn, $sql);
$base_url = 'http://'.$domain.'/post/?id=';
header("Content-Type: application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;
while($row = mysqli_fetch_array($result)){
    echo '<url>' . PHP_EOL;
    echo '<loc>'.$base_url. $row["id"] .'/</loc>' . PHP_EOL;
    echo '<changefreq>always</changefreq>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
        // $file = 'sitemap.xml';
    // Open the file to get existing content
        // $current = file_get_contents($file);
    // Append a new person to the file
}
echo '</urlset>' . PHP_EOL;
?>

