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
            'id_producto' => 1,
            'codigo' => 'PROD-001',
            'name' => 'ACERO CORTO',
            'VIP' => 0.7,
            'Mayorista' => 0.7,
            'Minorista' => 0.6
        ]);
        Productos::create([
            'id_producto' => 2,
            'codigo' => 'PROD-002',
            'name' => 'ACERO LARGO',
            'VIP' => 0.5,
            'Mayorista' => 0.5,
            'Minorista' => 0.4
        ]);
        Productos::create([
            'id_producto' => 3,
            'codigo' => 'PROD-003',
            'name' => 'ALUMINIO',
            'VIP' => 0,
            'Mayorista' => 0,
            'Minorista' => 0
        ]);
        Productos::create([
            'id_producto' => 4,
            'codigo' => 'PROD-004',
            'name' => 'BATERIAS',
            'VIP' => 5.5,
            'Mayorista' => 5.0,
            'Minorista' => 5.0
        ]);
        Productos::create([
            'id_producto' => 5,
            'codigo' => 'PROD-005',
            'name' => 'CALAMINA',
            'VIP' => 0.9,
            'Mayorista' => 0.8,
            'Minorista' => 0.7
        ]);
        Productos::create([
            'id_producto' => 6,
            'codigo' => 'PROD-006',
            'name' => 'CHATARRA',
            'VIP' => 4.5,
            'Mayorista' => 4.3,
            'Minorista' => 4.0
        ]);
        Productos::create([
            'id_producto' => 7,
            'codigo' => 'PROD-007',
            'name' => 'CORTO PESADO',
            'VIP' => 0.12,
            'Mayorista' => 0.12,
            'Minorista' => 0.1
        ]);
        Productos::create([
            'id_producto' => 8,
            'codigo' => 'PROD-008',
            'name' => 'DURO',
            'VIP' => 0.85,
            'Mayorista' => 0.8,
            'Minorista' => 0.7
        ]);
        Productos::create([
            'id_producto' => 9,
            'codigo' => 'PROD-009',
            'name' => 'LARGO PESADO',
            'VIP' => 0.09,
            'Mayorista' => 0.08,
            'Minorista' => 0.07
        ]);
        Productos::create([
            'id_producto' => 10,
            'codigo' => 'PROD-010',
            'name' => 'LATA',
            'VIP' => 0.7,
            'Mayorista' => 0.7,
            'Minorista' => 0.6
        ]);
        Productos::create([
            'id_producto' => 11,
            'codigo' => 'PROD-011',
            'name' => 'LATON',
            'VIP' => 4,
            'Mayorista' => 3.7,
            'Minorista' => 3.5
        ]);
        Productos::create([
            'id_producto' => 12,
            'codigo' => 'PROD-012',
            'name' => 'MARGINAL',
            'VIP' => 0.05,
            'Mayorista' => 0.04,
            'Minorista' => 0.03
        ]);
        Productos::create([
            'id_producto' => 13,
            'codigo' => 'PROD-013',
            'name' => 'MIXTO',
            'VIP' => 0.85,
            'Mayorista' => 0.8,
            'Minorista' => 0.7
        ]);
        Productos::create([
            'id_producto' => 14,
            'codigo' => 'PROD-014',
            'name' => 'MOTOR DE NEVERA',
            'VIP' => 2.8,
            'Mayorista' => 2.5,
            'Minorista' => 2.2
        ]);
        Productos::create([
            'id_producto' => 15,
            'codigo' => 'PROD-015',
            'name' => 'PERFIL',
            'VIP' => 1.0,
            'Mayorista' => 0.95,
            'Minorista' => 0.85
        ]);
        Productos::create([
            'id_producto' => 16,
            'codigo' => 'PROD-016',
            'name' => 'PLASTICO',
            'VIP' => 0.3,
            'Mayorista' => 0.3,
            'Minorista' => 0.3
        ]);
        Productos::create([
            'id_producto' => 17,
            'codigo' => 'PROD-017',
            'name' => 'PLOMO CHATARRA',
            'VIP' => 0.7,
            'Mayorista' => 0.7,
            'Minorista' => 0.6
        ]);
        Productos::create([
            'id_producto' => 18,
            'codigo' => 'PROD-018',
            'name' => 'PLOMO LINGOTE',
            'VIP' => 1.15,
            'Mayorista' => 1.1,
            'Minorista' => 0.9
        ]);
        Productos::create([
            'id_producto' => 19,
            'codigo' => 'PROD-019',
            'name' => 'POTE',
            'VIP' => 0.75,
            'Mayorista' => 0.7,
            'Minorista' => 0.6
        ]);
        Productos::create([
            'id_producto' => 20,
            'codigo' => 'PROD-020',
            'name' => 'RA',
            'VIP' => 0.7,
            'Mayorista' => 0.7,
            'Minorista' => 0.6
        ]);
        Productos::create([
            'id_producto' => 21,
            'codigo' => 'PROD-021',
            'name' => 'RCA',
            'VIP' => 2.6,
            'Mayorista' => 2.3,
            'Minorista' => 2.0
        ]);
        Productos::create([
            'id_producto' => 22,
            'codigo' => 'PROD-022',
            'name' => 'RL',
            'VIP' => 3.4,
            'Mayorista' => 3.1,
            'Minorista' => 2.7
        ]);
        Productos::create([
            'id_producto' => 23,
            'codigo' => 'PROD-023',
            'name' => 'TARJETAS DE COMPUTADORA',
            'VIP' => 0.9,
            'Mayorista' => 0.8,
            'Minorista' => 0.7
        ]);
    }
}
