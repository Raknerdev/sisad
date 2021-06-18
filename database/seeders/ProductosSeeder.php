<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\admin\Productos;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Productos::create([
            'id_producto'=>1,
            'codigo'=>'PROD-001',
            'name'=>'Laton',
            'VIP'=>4,
            'Mayorista'=>3.7,
            'Minorista'=>3.5
        ]);
        Productos::create([
            'id_producto'=>2,
            'codigo'=>'PROD-002',
            'name'=>'Duro',
            'VIP'=>0.85,
            'Mayorista'=>0.8,
            'Minorista'=>0.7
        ]);
        Productos::create([
            'id_producto'=>3,
            'codigo'=>'PROD-003',
            'name'=>'Mixto',
            'VIP'=>0.85,
            'Mayorista'=>0.8,
            'Minorista'=>0.7
        ]);
    }
}
