<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function create(array $data)
    {
        return Company::create($data);
    }

    public function updateByNIT($nit, array $data)
    {
        $company = $this->findByNIT($nit);
        if ($company) {
            $company->update($data);
            return $company;
        }
        return null;
    }

    public function findByNIT($nit)
    {
        return Company::where('NIT', $nit)->first();
    }

    public function getAll()
    {
        return Company::all();
    }

    public function deleteInactiveByNIT($nit)
    {
        return Company::where('NIT', $nit)->where('State', false)->delete();
    }
}