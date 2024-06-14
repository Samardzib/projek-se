<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_cif')->nullable();
            $table->string('no_alt')->nullable();
            $table->string('member_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('occupation')->nullable();
            $table->string('cif_status')->nullable();
            $table->string('ktp_number')->nullable();
            $table->string('npwp_number')->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('education')->nullable();
            $table->string('ethnicity')->nullable();
            $table->string('nickname')->nullable();
            $table->integer('age')->nullable();
            $table->string('rt_ktp')->nullable();
            $table->string('rw_ktp')->nullable();
            $table->string('kelurahan_ktp')->nullable();
            $table->string('kecamatan_ktp')->nullable();
            $table->string('city_ktp')->nullable();
            $table->string('province_ktp')->nullable();
            $table->string('domicile_address')->nullable();
            $table->string('kelurahan_domicile')->nullable();
            $table->string('kecamatan_domicile')->nullable();
            $table->string('city_domicile')->nullable();
            $table->string('province_domicile')->nullable();
            $table->string('domicile_postal_code')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('heir_name_1')->nullable();
            $table->string('heir_name_2')->nullable();
            $table->string('heir_name_3')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('customer_type')->nullable();
            $table->string('member_type')->nullable();
            $table->string('document_upload')->nullable();
            $table->string('branch')->nullable();
            $table->date('opening_date')->nullable();
            $table->string('opening_purpose')->nullable();
            $table->string('loan_category')->nullable();
            $table->biginteger('monthly_income')->nullable();
            $table->string('officer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn([
            'no_cif', 'no_alt', 'member_name', 'phone_number', 'occupation', 'cif_status', 
            'ktp_number', 'npwp_number', 'birth_place', 'birth_date', 'religion', 'marital_status', 
            'education', 'ethnicity', 'nickname', 'age', 'rt_ktp', 'rw_ktp', 'kelurahan_ktp', 
            'kecamatan_ktp', 'city_ktp', 'province_ktp', 'domicile_address', 'kelurahan_domicile', 
            'kecamatan_domicile', 'city_domicile', 'province_domicile', 'domicile_postal_code', 
            'mother_name', 'heir_name_1', 'heir_name_2', 'heir_name_3', 'gender', 'address', 
            'customer_type', 'member_type', 'document_upload', 'branch', 'opening_date', 
            'opening_purpose', 'loan_category', 'monthly_income', 'officer'
        ]);
    });
    }
};
