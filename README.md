# Roles v0.0.1

Функционал ролей для фреймворка Laravel.

## Подключение

Добавьте ссылку на репозиторий в файл `composer.json`

    "repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:dmitry-rogolev/Roles.git"
        }
    ]

Подключите пакет с помощью команды:

    composer require dmitryrogolev/roles

## Публикация ресурсов

Опубликуйте ресурсы в свой проект с помощью команды:

    php artisan vendor:publish --tag=roles

Также вы можете опубликовать ресурсы по отдельности:

    php artisan vendor:publish --tag=roles-models
    php artisan vendor:publish --tag=roles-factories
    php artisan vendor:publish --tag=roles-migrations
    php artisan vendor:publish --tag=roles-seeders

## Перед использованием

Добавьте трейт `dmitryrogolev\Roles\Traits\HasRoles` и реализуйте интерфейс
`dmitryrogolev\Roles\Contracts\Roleable` в модели.

    <?php

    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use dmitryrogolev\Roles\Contracts\Roleable;
    use dmitryrogolev\Roles\Traits\HasRoles;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    class User extends Authenticatable implements Roleable
    {
    	use HasFactory, Notifiable, HasRoles;

## Использование

### Прикрепление роли

Для присоединения одной роли или множества ролей, можно воспользоваться методом
`attachRole`, который принимает идентификатор или модель роли, а также их
множество.

    $user->attachRole($id);
    $user->attachRole($role);
    $user->attachRole([$id, $role]);

### Отсоединение роли

Для отсоединения одной роли или множества ролей, можно воспользоваться методом
`detachRole`, который принимает идентификатор или модель роли, а также их
множество.

    $user->detachRole($id);
    $user->detachRole($role);
    $user->detachRole([$id, $role]);

### Отсоединение всех ролей

Для отсоединения всех ролей, можно воспользоваться методом `detachAllRoles`.

    $user->detachAllRoles();

### Синхронизация ролей

Для синхронизации ролей можно воспользоваться методом `syncRoles`, который
принимает идентификатор или модель роли, а также их множество.

    $user->syncRoles($id);
    $user->syncRoles($role);
    $user->syncRoles([$id, $role]);

### Проверка наличия роли

Для проверки наличия роли у модели, можно воспользоваться методом `hasRole`,
который принимает идентификатор или модель роли, а также их множество. Если
модель имеет все переданные роли, метод вернет `true`, иначе `false`.

    if ($user->hasRole($id)) {

    }

## Лицензия

Этот пакет является бесплатным программным обеспечением, распространяемым на
условиях [лицензии MIT](./LICENSE).
