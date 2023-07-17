<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permissions
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'about-list',
            'about-create',
            'about-edit',
            'about-delete',
            'album-list',
            'album-create',
            'album-edit',
            'album-delete',
            'banner-list',
            'banner-create',
            'banner-edit',
            'banner-delete',
            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',
            'gallery-list',
            'gallery-create',
            'gallery-edit',
            'gallery-delete',
            'knowledge-list',
            'knowledge-create',
            'knowledge-edit',
            'knowledge-delete',
            'menu-list',
            'menu-create',
            'menu-edit',
            'menu-delete',
            'news-and-events-list',
            'news-and-events-create',
            'news-and-events-edit',
            'news-and-events-delete',
            'partners-list',
            'partners-create',
            'partners-edit',
            'partners-delete',
            'social-list',
            'social-create',
            'social-edit',
            'social-delete',
            'working-areas-list',
            'working-areas-create',
            'working-areas-edit',
            'working-areas-delete',
        ];
       
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}