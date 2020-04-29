<?php


$permission = Permission::create([
    'name' => 'List user',
    'slug' => 'user.index',
    'description' => 'A user can list user'
]);
$permission_all[] = $permission->id;

$permission = Permission::create([
    'name' => 'Show user',
    'slug' => 'user.show',
    'description' => 'A user can see user'
]);
$permission_all[] = $permission->id;

$permission = Permission::create([
    'name' => 'Create user',
    'slug' => 'user.create',
    'description' => 'A user can create user'
]);
$permission_all[] = $permission->id;

$permission = Permission::create([
    'name' => 'Edit user',
    'slug' => 'user.edit',
    'description' => 'A user can edit user'
]);
$permission_all[] = $permission->id;

$permission = Permission::create([
    'name' => 'Destroy user',
    'slug' => 'user.destroy',
    'description' => 'A user can destroy user'
]);
$permission_all[] = $permission->id;
