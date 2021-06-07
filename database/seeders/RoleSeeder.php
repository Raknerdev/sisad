<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r_root = Role::create(['name'=>'root']);
        $r_admin = Role::create(['name'=>'admin']);
        $r_Facturation = Role::create(['name' => 'facturacion']);
        $r_Tesoreria = Role::create(['name' => 'tesoreria']);
        $r_RRHH = Role::create(['name' => 'rrhh']);
        
        Permission::create(['name' => 'crear usuario'])->syncRoles([$r_root, $r_admin]);
        // permisos modulo de facturacion
        Permission::create(['name' => 'crear factura venta'])->syncRoles([$r_root, $r_Facturation, $r_admin]);
        Permission::create(['name' => 'editar factura venta'])->syncRoles([$r_root, $r_Facturation, $r_admin]);
        Permission::create(['name' => 'eliminar factura venta'])->assignRole($r_root);
        Permission::create(['name' => 'crear factura compra'])->syncRoles([$r_root, $r_Facturation, $r_admin]);
        Permission::create(['name' => 'editar factura compra'])->syncRoles([$r_root, $r_Facturation, $r_admin]);
        Permission::create(['name' => 'eliminar factura compra'])->assignRole($r_root);
        Permission::create(['name' => 'crear nota de entrega'])->syncRoles([$r_root, $r_Facturation, $r_admin]);
        Permission::create(['name' => 'editar nota de entrega'])->syncRoles([$r_root, $r_Facturation, $r_admin]);
        Permission::create(['name' => 'eliminar nota de entrega'])->assignRole($r_root);
        Permission::create(['name' => 'crear guia despacho'])->syncRoles([$r_root, $r_Facturation, $r_admin]);
        Permission::create(['name' => 'editar guia despacho'])->syncRoles([$r_root, $r_Facturation, $r_admin]);
        Permission::create(['name' => 'eliminar guia despacho'])->assignRole($r_root);
    }
}
