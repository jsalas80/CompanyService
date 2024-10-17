<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function create(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), Company::$rules);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }

            $data = $request->all();
            $data['State'] = true; 
            $company = $this->companyRepository->create($data);
            return response()->json($company, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Ocurrio un error creando la empresa.'], 500);
        }
    }


    public function updateByNIT(Request $request, $nit)
    {
        try {
            $validator = Validator::make($request->all(), [
                'Name' => 'string|max:50|regex:/^[a-zA-Z0-9\s]+$/',
                'Address' => 'string|max:50|regex:/^[a-zA-Z0-9\s\-#]+$/',
                'Phone' => 'numeric|digits_between:1,10',
                'State' => 'boolean',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 400);
            }
            $data = $request->except('NIT');

            $company = $this->companyRepository->updateByNIT($nit, $data);
            if ($company) {
                return response()->json($company);
            }
            return response()->json(['error' => 'Empresa NO encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al actualizar la empresa.'], 500);
        }
    }

    public function getByNIT($nit)
    {
        try {
            $company = $this->companyRepository->findByNIT($nit);
            if ($company) {
                return response()->json($company);
            }
            return response()->json(['error' => 'Empresa NO encontrada.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error consultando la empresa.'], 500);
        }
    }

    public function getAll()
    {
        try {
            $companies = $this->companyRepository->getAll();
            return response()->json($companies);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error consultando las empresas.'], 500);
        }
    }

    public function deleteInactiveByNIT($nit)
    {
        try {
            $deleted = $this->companyRepository->deleteInactiveByNIT($nit);
            if ($deleted) {
                return response()->json(['message' => 'Empresa inactiva Borrada.']);
            }
            return response()->json(['error' => 'La empresa no se encuentra inactiva.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error eliminando la empresa.'], 500);
        }
    }
}