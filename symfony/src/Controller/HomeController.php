<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Repository\CarsRepository;
use App\Repository\OpeningHoursRepository;
use App\Repository\PrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        Security $security, 
        PrestationsRepository $prestationsRepository,
        OpeningHoursRepository $openingHoursRepository,
        CarsRepository $carsRepository,
    ): Response

    {
        $car = $carsRepository->findOneBy(['id' => '1']);
        $openingHourList = $openingHoursRepository->findBy([],['id' => 'ASC']);
        $prestationList = $prestationsRepository->findBy([],['id' => 'ASC']);
       
        $user = $security->getUser();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'openingHourList' => $openingHourList,
            'prestationList' => $prestationList,
            'user' => $user,
            'car' => $car,
        ]);
    }
}
