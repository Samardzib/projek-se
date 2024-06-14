<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        User::create([
            'name' => $faker->name,
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'no_cif' => $faker->numerify('CIF###'),
            'no_alt' => $faker->phoneNumber,
            'member_name' => $faker->name,
            'phone_number' => $faker->phoneNumber,
            'occupation' => $faker->jobTitle,
            'cif_status' => $faker->randomElement(['active', 'inactive']),
            'ktp_number' => $faker->numerify('#######'),
            'npwp_number' => $faker->numerify('###########'),
            'birth_place' => $faker->city,
            'birth_date' => $faker->date,
            'religion' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'marital_status' => $faker->randomElement(['single', 'married']),
            'education' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2']),
            'ethnicity' => $faker->randomElement(['Jawa', 'Sunda', 'Batak', 'Minang', 'Bugis']),
            'nickname' => $faker->firstName,
            'age' => $faker->numberBetween(20, 60),
            'rt_ktp' => $faker->numerify('##'),
            'rw_ktp' => $faker->numerify('##'),
            'kelurahan_ktp' => $faker->citySuffix,
            'kecamatan_ktp' => $faker->citySuffix,
            'city_ktp' => $faker->city,
            'province_ktp' => $faker->state,
            'domicile_address' => $faker->address,
            'kelurahan_domicile' => $faker->citySuffix,
            'kecamatan_domicile' => $faker->citySuffix,
            'city_domicile' => $faker->city,
            'province_domicile' => $faker->state,
            'domicile_postal_code' => $faker->postcode,
            'mother_name' => $faker->name('female'),
            'heir_name_1' => $faker->name,
            'heir_name_2' => $faker->name,
            'heir_name_3' => $faker->name,
            'gender' => $faker->randomElement(['male', 'female']),
            'address' => $faker->address,
            'customer_type' => $faker->randomElement(['regular', 'premium']),
            'member_type' => $faker->randomElement(['silver', 'gold', 'platinum']),
            'document_upload' => $faker->word,
            'branch' => $faker->company,
            'opening_date' => $faker->date,
            'opening_purpose' => $faker->sentence,
            'loan_category' => $faker->randomElement(['personal', 'business']),
            'monthly_income' => $faker->numberBetween(1000000, 5000000), // Adjusted range
            'officer' => $faker->name,
        ]);

        User::create([
            'name' => $faker->name,
            'email' => 'user@mail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
            'no_cif' => $faker->numerify('CIF###'),
            'no_alt' => $faker->phoneNumber,
            'member_name' => $faker->name,
            'phone_number' => $faker->phoneNumber,
            'occupation' => $faker->jobTitle,
            'cif_status' => $faker->randomElement(['active', 'inactive']),
            'ktp_number' => $faker->numerify('#######'),
            'npwp_number' => $faker->numerify('###########'),
            'birth_place' => $faker->city,
            'birth_date' => $faker->date,
            'religion' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']),
            'marital_status' => $faker->randomElement(['single', 'married']),
            'education' => $faker->randomElement(['SMA', 'D3', 'S1', 'S2']),
            'ethnicity' => $faker->randomElement(['Jawa', 'Sunda', 'Batak', 'Minang', 'Bugis']),
            'nickname' => $faker->firstName,
            'age' => $faker->numberBetween(20, 60),
            'rt_ktp' => $faker->numerify('##'),
            'rw_ktp' => $faker->numerify('##'),
            'kelurahan_ktp' => $faker->citySuffix,
            'kecamatan_ktp' => $faker->citySuffix,
            'city_ktp' => $faker->city,
            'province_ktp' => $faker->state,
            'domicile_address' => $faker->address,
            'kelurahan_domicile' => $faker->citySuffix,
            'kecamatan_domicile' => $faker->citySuffix,
            'city_domicile' => $faker->city,
            'province_domicile' => $faker->state,
            'domicile_postal_code' => $faker->postcode,
            'mother_name' => $faker->name('female'),
            'heir_name_1' => $faker->name,
            'heir_name_2' => $faker->name,
            'heir_name_3' => $faker->name,
            'gender' => $faker->randomElement(['male', 'female']),
            'address' => $faker->address,
            'customer_type' => $faker->randomElement(['regular', 'premium']),
            'member_type' => $faker->randomElement(['silver', 'gold', 'platinum']),
            'document_upload' => $faker->word,
            'branch' => $faker->company,
            'opening_date' => $faker->date,
            'opening_purpose' => $faker->sentence,
            'loan_category' => $faker->randomElement(['personal', 'business']),
            'monthly_income' => $faker->numberBetween(1000000, 5000000), // Adjusted range
            'officer' => $faker->name,
        ]);
    }
}
