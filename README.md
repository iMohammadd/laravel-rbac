***Laravel Rbac***
------------
*role based access control for laravel framework*


***Installing***
-------------
install via composer:

``composer require aries/laravel-rbac``

then run migration to create roles and abilitie table:

``php artisan migrate``


***Setup***
---------
you need to extend your `User` model from `Aries\LaravelRbac\Models\User` like this:  

```php
<?php
namespace App/Models;
...
use Aries\LaravelRbac\Models\User as RbacUser;
...
class User extends RbacUser
{
...
```
***Creating a role and assign it to user***
----
you can create role for a user like this:  
```php
$user = App\Models\User::first();

$user->roles()->create([
    'name' => 'role-name',
    'label' => 'optional role label'
]);
```
also you can sync user roles with existing roles like this:  
```php
$user = App\Models\User::first();

$roles = Aries\LaravelRbac\Models\Role::all()->pluck('id')->toArray();

$user->roles()->attach($roles);
```

***Create Ability and assign it to a role***
---
you can create an ability like this:  
```php
$ability = Aries\LaravelRbac\Models\Ability::create([
    'name' => 'ability-name',
    'label' => 'optional ability label'
]);
```
also you can create an ability throgh role model like this:  
```php
$role = Aries\LaravelRbac\Models\Role::first();

$role->abilities()->create([...]);
```
or you can assign many existing abilities to a role like this:
```php
$abilities = Aries\LaravelRbac\Models\Ability::all()->pluck('id')->toArray();

$role = Aries\LaravelRbac\Models\Role::first();

$role->abilities()->attach($abilities);
```

***Usage***
---
this package defined Gate for each ability and you can use it in middlewares, controllers or views by default.  
read [official document for Gate and Policy.]('https://laravel.com/docs/authorization')  
also you can check a user has a role or ability throgh user model:
```php
$user = App\Models\User::first();

$user->hasRole('role-name') # return bool

$user->hasAbility('ability-name') # return bool
```