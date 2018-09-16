<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Aturan Pakai

- Clone repo ini
- Install composer dan npm jika belum ada
- Copy file .env.examples menjadi .env
- Jalankan perintah `php artisan key:generate` untuk mengenerate key app
- Config nama, username, password database
- Jalankan perintah `composer install` untuk menginstall package yang dibutuhkan
- Jalankan perintah `npm i` untuk menginstall depedencies yang dibutuhkan
- Jalankan perintah `php artisan migrate --seed` untuk migrasi database dan melakukan seeder (abaikan `--seed-` jika tidak perlu)
- Jalankan perintah `php artisan serve` dan `npm run watch` di dua terminal (bisa gunakan tmux)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
