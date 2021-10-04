# My Guestbook

Website buku tamu, yang dibuat dengan laravel versi 8

## Tutorial Pemasangan

1. Melakukan git clone terlebih dahulu dengan cara 
   ```
   git clone https://github.com/atmakarimang/myguestbook.git
   ``` 
2. Cek file .env untuk penyesuaian nama database dan user password, untuk default yg saya gunakan
    * Nama DB = guestbook_db
    * User = 'root'
    * Pass = ''
3. Menjalankan perintah migrate dan seed untuk sampling data dan generate user admin
   ```
    php artisan migrate
    php artisan migrate:fresh --seed
   ```
4. Jalankan perintah ``` php artisan serve ``` untuk running laravel nya
6. Buka [localhost:8000](http://localhost:8000), untuk masuk ke login administratornya, jika sesuai maka akan tampil seperti gambar dibawah ini :

   ![Screenshot_1](https://user-images.githubusercontent.com/91459125/135788827-b28179a8-ad25-482c-9442-cddde27918d0.png)
   
   Default email password yg digunakan untuk login adalah :
   ```
   Email : admin@gmail.com
   Password : 12345
   ```
   Jika sudah login maka tampilan nya akan langsung ke dashboard admin seperti ini :
   
   ![Screenshot_2](https://user-images.githubusercontent.com/91459125/135789319-933fb910-dcd3-4fed-95e8-b48d37f190dc.png)
   
6. Buka [localhost:8000/guestbook](http://localhost:8000/guestbook), untuk masuk ke form guestbook nya, jika sesuai tampilan nya akan seperti gambar dibawah ini

   ![Screenshot_3](https://user-images.githubusercontent.com/91459125/135788704-d8ca9331-92a8-41aa-a854-964d60075331.png)
   

Note versi :
* PHP : 7.4.23
* Laravel : 8.62.0
* PhpMyAdmin : 5.1.1
* XAMPP : 7.4.23
* Composer : 2.1.8
