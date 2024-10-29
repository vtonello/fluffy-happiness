<?php
namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Address;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'name' => 'James T. Kirk',
                'email' => 'kirk@enterprise.starfleet',
                'phone' => '1701-A',
                'addresses' => [
                    [
                        'street' => 'USS Enterprise, Deck 1',
                        'city' => 'San Francisco',
                        'state' => 'CA',
                        'zip_code' => '94016',
                        'country' => 'United Federation',
                        'is_shipping' => true,
                        'is_billing' => true,
                    ]
                ]
            ],
            [
                'name' => 'Jean-Luc Picard',
                'email' => 'picard@enterprise.starfleet',
                'phone' => '1701-D',
                'addresses' => [
                    [
                        'street' => 'USS Enterprise-D, Captain\'s Quarter',
                        'city' => 'Paris',
                        'state' => 'EU',
                        'zip_code' => '75001',
                        'country' => 'United Federation',
                        'is_shipping' => true,
                        'is_billing' => true,
                    ]
                ]
            ],
            [
                'name' => 'Spock',
                'email' => 'spock@vulcan.federation',
                'phone' => '0123-V',
                'addresses' => [
                    [
                        'street' => 'Science Academy',
                        'city' => 'ShiKahr',
                        'state' => 'Vulcan',
                        'zip_code' => 'T0-PL3',
                        'country' => 'United Federation',
                        'is_shipping' => true,
                        'is_billing' => true,
                    ]
                ]
            ],
            [
                'name' => 'Leonard McCoy',
                'email' => 'bones@medical.starfleet',
                'phone' => 'MED-01',
                'addresses' => [
                    [
                        'street' => 'Starfleet Medical',
                        'city' => 'Atlanta',
                        'state' => 'GA',
                        'zip_code' => '30301',
                        'country' => 'United Federation',
                        'is_shipping' => true,
                        'is_billing' => true,
                    ]
                ]
            ],
            [
                'name' => 'Montgomery Scott',
                'email' => 'scotty@engineering.starfleet',
                'phone' => 'ENG-01',
                'addresses' => [
                    [
                        'street' => 'Engineering Section, Deck 15',
                        'city' => 'Aberdeen',
                        'state' => 'Scotland',
                        'zip_code' => 'AB12 3CD',
                        'country' => 'United Federation',
                        'is_shipping' => true,
                        'is_billing' => true,
                    ]
                ]
            ]
        ];

        foreach ($customers as $customerData) {
            $addresses = $customerData['addresses'];
            unset($customerData['addresses']);

            $customer = Customer::create($customerData);

            foreach ($addresses as $addressData) {
                $customer->addresses()->create($addressData);
            }
        }
    }
}
