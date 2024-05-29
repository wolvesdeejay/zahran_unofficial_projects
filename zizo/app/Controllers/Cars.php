<?php

namespace App\Controllers;

use App\Models\CarsModel;
use App\Models\AccessoriesModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Cars extends BaseController
{
    public function index()
    {
        $model = new CarsModel(); // Correct initialization

        $data = [
            'title' => 'Cars Archive',
            'cars' => $model->getCars(),
        ];

        return view('templates/header1', $data)
            . view('cars/index1')
            . view('templates/footer');
    }

    public function show($modell = null)
    {
        $model = new CarsModel();

        $car = $model->getCars($modell);

        if (empty($car)) {
            throw new PageNotFoundException('Cannot find the Car item: ' . $modell);
        }

        $data = [
            'title' => $car['Make'],
            'car' => $car,
        ];

        return view('templates/header1', $data)
            . view('cars/view1')
            . view('templates/footer');
    }

    public function new()
    {
        helper('form');

        return view('templates/header1', ['title' => 'Create a Car'])
            . view('cars/create1')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['Make', 'Year']);

        if (! $this->validate([
            'Make' => 'required|max_length[255]|min_length[3]',
            'Year'  => 'required|integer|less_than_equal_to[2024]',
        ])) {
            return $this->new();
        }

        $validatedData = $this->validator->getValidated();

        $model = new CarsModel();

        $model->save([
            'Make' => $validatedData['Make'],
            'Model' => url_title($validatedData['Make'], '-', true),
            'Year'  => $validatedData['Year'],
        ]);

        return view('templates/header1', ['title' => 'Car Created'])
            . view('cars/success')
            . view('templates/footer');
    }

    public function isValidUTF8($string)
    {
        return mb_check_encoding($string, 'UTF-8'); // Validate UTF-8 encoding
    }

    public function getMakes()
    {
        $modell = new CarsModel();
        $makes = $modell->select('Make')->distinct()->findAll();

        return $this->response->setJSON($makes);
    }

    public function getModels($make)
    {
        $modelll = new CarsModel();
        $models = $modelll->where('Make', $make)->select('Model')->distinct()->findAll();

        return $this->response->setJSON($models);
    }

    public function getYears($make, $model)
    {
        try {
            $carsModel = new CarsModel();
            $years = $carsModel
                ->select('Year')
                ->where('Make', $make)
                ->where('Model', $model)
                ->findAll();

            return $this->response->setJSON($years);
        } catch (\Exception $e) {
            log_message('error', 'Error in getYears: ' . $e->getMessage());
            return $this->response->setStatusCode(500)->setJSON(['error' => 'An error occurred while fetching years']);
        }
    }

    public function getAccessories($model) // Use same variable name as in the frontend
    {
        log_message('info', "Fetching accessories for car model: {$model}"); // Log for debugging

        try {
            $accessoriesModel = new AccessoriesModel();
            $accessories = $accessoriesModel
                ->where('LOWER(Model)', strtolower($model)) // Ensure case-insensitive comparison
                ->findAll(); // Retrieve accessories based on the model

            if (empty($accessories)) {
                log_message('error', "No accessories found for car model '{$model}'"); // Log the error
                throw new \Exception("No accessories found for car model '{$model}'");
            }

            return $this->response->setJSON($accessories);
        } catch (\Exception $e) {
            log_message('error', 'Error in getAccessories: ' . $e->getMessage()); // Log the error
            return $this->response->setStatusCode(500)->setJSON(['error' => 'An error occurred while fetching accessories']);
        }
    }


}
