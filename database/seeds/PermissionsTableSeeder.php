<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'categorie_create',
            ],
            [
                'id'    => 18,
                'title' => 'categorie_edit',
            ],
            [
                'id'    => 19,
                'title' => 'categorie_show',
            ],
            [
                'id'    => 20,
                'title' => 'categorie_delete',
            ],
            [
                'id'    => 21,
                'title' => 'categorie_access',
            ],
            [
                'id'    => 22,
                'title' => 'type_create',
            ],
            [
                'id'    => 23,
                'title' => 'type_edit',
            ],
            [
                'id'    => 24,
                'title' => 'type_show',
            ],
            [
                'id'    => 25,
                'title' => 'type_delete',
            ],
            [
                'id'    => 26,
                'title' => 'type_access',
            ],
            [
                'id'    => 27,
                'title' => 'bijoutier_create',
            ],
            [
                'id'    => 28,
                'title' => 'bijoutier_edit',
            ],
            [
                'id'    => 29,
                'title' => 'bijoutier_show',
            ],
            [
                'id'    => 30,
                'title' => 'bijoutier_delete',
            ],
            [
                'id'    => 31,
                'title' => 'bijoutier_access',
            ],
            [
                'id'    => 32,
                'title' => 'paye_create',
            ],
            [
                'id'    => 33,
                'title' => 'paye_edit',
            ],
            [
                'id'    => 34,
                'title' => 'paye_show',
            ],
            [
                'id'    => 35,
                'title' => 'paye_delete',
            ],
            [
                'id'    => 36,
                'title' => 'paye_access',
            ],
            [
                'id'    => 37,
                'title' => 'addb_bijoux_create',
            ],
            [
                'id'    => 38,
                'title' => 'addb_bijoux_edit',
            ],
            [
                'id'    => 39,
                'title' => 'addb_bijoux_show',
            ],
            [
                'id'    => 40,
                'title' => 'addb_bijoux_delete',
            ],
            [
                'id'    => 41,
                'title' => 'addb_bijoux_access',
            ],
            [
                'id'    => 42,
                'title' => 'currency_create',
            ],
            [
                'id'    => 43,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 44,
                'title' => 'currency_show',
            ],
            [
                'id'    => 45,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 46,
                'title' => 'currency_access',
            ],
            [
                'id'    => 47,
                'title' => 'check_article_create',
            ],
            [
                'id'    => 48,
                'title' => 'check_article_edit',
            ],
            [
                'id'    => 49,
                'title' => 'check_article_show',
            ],
            [
                'id'    => 50,
                'title' => 'check_article_delete',
            ],
            [
                'id'    => 51,
                'title' => 'check_article_access',
            ],
            [
                'id'    => 52,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
