<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Role',
            'No CIF',
            'No ALT',
            'Member Name',
            'Phone Number',
            'Occupation',
            'CIF Status',
            'KTP Number',
            'NPWP Number',
            'Birth Place',
            'Birth Date',
            'Religion',
            'Marital Status',
            'Education',
            'Ethnicity',
            'Nickname',
            'Age',
            'RT KTP',
            'RW KTP',
            'Kelurahan KTP',
            'Kecamatan KTP',
            'City KTP',
            'Province KTP',
            'Domicile Address',
            'Kelurahan Domicile',
            'Kecamatan Domicile',
            'City Domicile',
            'Province Domicile',
            'Domicile Postal Code',
            'Mother Name',
            'Heir Name 1',
            'Heir Name 2',
            'Heir Name 3',
            'Gender',
            'Address',
            'Customer Type',
            'Member Type',
            'Document Upload',
            'Branch',
            'Opening Date',
            'Opening Purpose',
            'Loan Category',
            'Monthly Income',
            'Officer',
            'Created At',
            'Updated At',
        ];
    }

    /**
     * @var User $user
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $this->getRoleName($user->role_id),
            $user->no_cif,
            $user->no_alt,
            $user->member_name,
            $user->phone_number,
            $user->occupation,
            $user->cif_status,
            $user->ktp_number,
            $user->npwp_number,
            $user->birth_place,
            $user->birth_date,
            $user->religion,
            $user->marital_status,
            $user->education,
            $user->ethnicity,
            $user->nickname,
            $user->age,
            $user->rt_ktp,
            $user->rw_ktp,
            $user->kelurahan_ktp,
            $user->kecamatan_ktp,
            $user->city_ktp,
            $user->province_ktp,
            $user->domicile_address,
            $user->kelurahan_domicile,
            $user->kecamatan_domicile,
            $user->city_domicile,
            $user->province_domicile,
            $user->domicile_postal_code,
            $user->mother_name,
            $user->heir_name_1,
            $user->heir_name_2,
            $user->heir_name_3,
            $user->gender,
            $user->address,
            $user->customer_type,
            $user->member_type,
            $user->document_upload,
            $user->branch,
            $user->opening_date,
            $user->opening_purpose,
            $user->loan_category,
            $user->monthly_income,
            $user->officer,
            $user->created_at,
            $user->updated_at,
        ];
    }

    /**
     * Get role name by role ID.
     *
     * @param int $roleId
     * @return string
     */
    protected function getRoleName($roleId)
    {
        switch ($roleId) {
            case 1:
                return 'Admin';
            case 2:
                return 'Anggota';
            default:
                return 'Unknown';
        }
    }
}
