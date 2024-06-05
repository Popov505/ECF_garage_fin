<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CarsRepository;

class CarController extends AbstractController{

    #[Route('/carFilter', name: 'carFilter')]
    public function filterCars(
      Request $request, 
      CarsRepository $carsRepository): Response
    {
        // Get the criterias in the URL asked in background
        $kmMin = $request->query->get('kmMin');
        $kmMax = $request->query->get('kmMax');
        $yearMin = $request->query->get('yearMin');
        $yearMax = $request->query->get('yearMax');
        $priceMin = $request->query->get('priceMin');
        $priceMax = $request->query->get('priceMax');

        //filter the cars
        $filteredCars = $carsRepository->findByCriteria($kmMin, $kmMax, $yearMin, $yearMax, $priceMin, $priceMax);

        //Transform the cars from DataBase into JSON object
        $carArray = [];
        foreach ($filteredCars as $car) {
            $carArray[] = [
                'id' => $car->getId(),
                'title' => $car->getTitle(),
                'build_year' => $car->getBuildYear(),
                'fuel' => $car->getFuel(),
                'kilometer' => $car->getKilometer(),
                'price' => $car->getPrice(),
                'imageName' => $car->getImageName(),
            ];
        }

        return $this->json($carArray);
    }
}
