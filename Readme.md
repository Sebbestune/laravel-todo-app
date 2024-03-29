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
6. Skapa routes och vyer med formulär för Todo hantering
7. Färdigställ controllern
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

### Tips no 1

Använd gärna git även i lekprojekt! Både bra för övning av git och ifall projektet växer till något intressant.

### Skapa Todo modell och hela MVC

Modell och migration: `php artisan make:model -m Todo`

I migrationsfilen
```
Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->boolean('done');
            $table->timestamps();
        });
```

Migrera: `php artisan migrate`

Controller: `php artisan make:controller --resource TodoController`

Vi implementerar kontrollern mer efter relatering mot användare.

### Tips no. 2

Det är alltid en bra idé att lägga sina projekt på github, privata repon för små kul tester eller egna projekt och publika om ni har lust att visa upp det ni jobbar med.

git remote add origin https://github.com/Sebbestune/...
git push -u origin main

### Kopplar användare till todos

Skapar ny migration: `php make:migration add_user_id_fk_to_todos`

```
public function up(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('todos', function (Blueprint $table) {
            if (Schema::hasColumn('todos', 'user_id'))
            Schema::table('todos', function (Blueprint $table) {
                $table->dropColumn('user_id');
            });
        });
    }
```

Migrerar igen: `php artisan migrate`