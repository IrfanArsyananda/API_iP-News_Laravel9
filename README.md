# API_iP-News_Laravel9

-   Framework : Laravel
-   Database : MySQL
-   References :

# Cara Hosting Laravel 9

1. Unggah proyek ke 'public_html/'
   *zip : ekstrak ke 'public_html/'
   *git clone : ke folder 'public_html/'
2. Buat database di server hosting, catat (nama, user, pass) database
3. Masuk [folder_proyek], ubah isi '.env' sesuai catatan di step 2
4. Masuk [folder_proyek/public], pindah semua isinya ke 'public_html/folder_baru/'
5. Masuk ke [folder_baru], ubah 'index.php' dengan menambahkan :
    - Line 19 : diantara '/../[folder_proyek/]storage/framework/
    - Line 34 : diantara '/../[folder_proyek/]vendor/autoload.php
    - Line 19 : diantara '/../[folder_proyek/]bootstrap/app.php
6. Masuk ke [folder_baru] buka '.htaccess', tambahkan di paling bawah :
   RewriteCond %{REQUEST_FILENAME} !-d
   RewriteCond %{REQUEST_FILENAME} !-f
   RewriteRule ^ index.php [L]
7. Masuk ke [folder_baru] buka 'index.php', tambahkan dibawah $app (line 47): 
$app->bind('path.public', function() {
   return **DIR**;
   });
8. Akses web di [alamatwebsite]/[folder_baru]
