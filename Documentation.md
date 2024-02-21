# Todo lista (U4) i Laravel

## Krav

- PHP/HTML/CSS och SQL
- Uppgifter `todos`
    - unikt-id, titel, uppgiftstext, färdigmarkering
    - hanteras med CRUD
- Användare
    - CRUD:a uppgifter
- Ändringar sparas i DB
- Grundläggande formulär
- Minst ett formulär
- Användare (Extra)
- TailwindCSS

## Planering

1. Skapa projektet med composer
2. koppla DB genom .env filen
3. använda breeze/sanctum för begynnande kod för inlogg/registrering av användare (TailwindCSS konfigureras även av Breeze)
4. Skapa `Todo` Model och migration samt controller.
5. Skapa relation mellan Todos och användare (`user_id till todos`)
6. Skapa routes och vyer för Todo hantering
7. Skapa formulär
8. Testa lösningen

## Utförande 

### Skapa projekt 
composer create-project laravel/laravel todo-app
cd todo-app/

### Ändrar env filen

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:sZ2JwS4JjIau6JFLyUzkrXM3vq6mgLbukhnkv16+EdI=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=mariadb
DB_USERNAME=mariadb
DB_PASSWORD=mariadb
```

### Scaffold:a login/register och users

composer require laravel/breeze --dev
php artisan breeze:install
php artisan migrate
npm install
npm run dev

- Blade with Alpine
- Dark mode som du vill
- Unit testing PHPUnit (egentligen som du vill)

Om det inte fungerar med npm i vårt fall kan vi köra:

```
sudo npm install -g n
sudo n latest
sudo npm install && sudo npm upgrade
```

- Starta om terminale du kör npm i
- Kör kommandot npm run dev