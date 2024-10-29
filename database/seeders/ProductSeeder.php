<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Casco Shoei GT-Air II',
                'description' => 'Casco integral premium con sistema de ventilación avanzado y visera solar',
                'price' => 599.99,
                'stock' => 50,
                'sku' => 'HLM-GT2-001'
            ],
            [
                'name' => 'Chaqueta Alpinestars GP Plus R v3',
                'description' => 'Chaqueta de cuero para motocicleta con protecciones',
                'price' => 499.99,
                'stock' => 30,
                'sku' => 'JKT-ALP-001'
            ],
            [
                'name' => 'Neumáticos Michelin Road 6',
                'description' => 'Par de neumáticos deportivos para uso en calle',
                'price' => 299.99,
                'stock' => 100,
                'sku' => 'TYR-MCH-006'
            ],
            [
                'name' => 'Aceite Motul 7100 4T 10W-40',
                'description' => 'Aceite sintético de alto rendimiento para motocicletas',
                'price' => 59.99,
                'stock' => 200,
                'sku' => 'OIL-MTL-001'
            ],
            [
                'name' => 'Cadena DID VX3',
                'description' => 'Cadena de transmisión de alta resistencia',
                'price' => 129.99,
                'stock' => 75,
                'sku' => 'CHN-DID-001'
            ],
            [
                'name' => 'Guantes Dainese Carbon 3',
                'description' => 'Guantes deportivos con protección de carbono',
                'price' => 149.99,
                'stock' => 60,
                'sku' => 'GLV-DAN-003'
            ],
            [
                'name' => 'Escape Akrapovic Slip-On',
                'description' => 'Sistema de escape deportivo con reducción de peso',
                'price' => 899.99,
                'stock' => 25,
                'sku' => 'EXH-AKR-001'
            ],
            [
                'name' => 'Pastillas de Freno Brembo',
                'description' => 'Pastillas de alto rendimiento para uso deportivo',
                'price' => 79.99,
                'stock' => 150,
                'sku' => 'BRK-BRM-001'
            ],
            [
                'name' => 'Suspensión Öhlins TTX GP',
                'description' => 'Amortiguador trasero de competición',
                'price' => 1299.99,
                'stock' => 15,
                'sku' => 'SUS-OHL-001'
            ],
            [
                'name' => 'Intercomunicador Cardo Packtalk Edge',
                'description' => 'Sistema de comunicación premium para motociclistas',
                'price' => 349.99,
                'stock' => 40,
                'sku' => 'COM-CRD-001'
            ],
            [
                'name' => 'Botas Sidi Vortice',
                'description' => 'Botas deportivas de alto rendimiento',
                'price' => 299.99,
                'stock' => 35,
                'sku' => 'BOT-SDI-001'
            ],
            [
                'name' => 'Protector de Espalda Dainese',
                'description' => 'Protector dorsal con certificación CE nivel 2',
                'price' => 199.99,
                'stock' => 45,
                'sku' => 'PRT-DAN-001'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
