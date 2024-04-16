<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Entity\Prestations;
use App\Repository\CarsRepository;
use App\Repository\OpeningHoursRepository;
use App\Repository\PrestationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class PrestationsController extends AbstractController
{
    #[Route('/prestations/{id}', name: 'app_show_prestations')]
    public function showPrestations(
        Security $security, 
        OpeningHoursRepository $openingHoursRepository, 
        PrestationsRepository $prestationsRepository, 
        Prestations $prestation, 
        CarsRepository $carsRepository
    ): Response

    {
        $cars = $carsRepository->findBy([],['id' => 'ASC']);
        $prestationList = $prestationsRepository->findBy([],);
        $openingHourList = $openingHoursRepository->findBy([],['id' => 'ASC']);

        $user = $security->getUser();

        $car = $carsRepository->findOneBy(['id' => '1']);

        return $this->render('prestations/show_prestations.html.twig', [
            'cars' => $cars,
            'prestation' => $prestation,
            'prestationList' => $prestationList,
            'openingHourList' => $openingHourList,
            'user' => $user,
            'car' => $car,
        ]);
    }

    #[Route('/prestations/cars/{id}', name: 'app_show_car')]
    public function showCar(
        Security $security, 
        OpeningHoursRepository $openingHoursRepository, 
        PrestationsRepository $prestationsRepository, 
        //Prestations $prestation, 
        Cars $car,
        UrlGeneratorInterface $urlGeneratorInterface,
    ): Response

    {
        $prestationList = $prestationsRepository->findBy([],['id' => 'ASC']);
        $openingHourList = $openingHoursRepository->findBy([],['id' => 'ASC']);

        $user = $security->getUser();

        $prestation = $prestationsRepository->findOneBy(['id' => '4']);

        /* Car information fetch */
        $contactFormUrl = $urlGeneratorInterface->generate('app_contact', [
            'car_name' => $car->getTitle(),
        ]);

        return $this->render('prestations/show_car.html.twig', [
            'car' => $car,
            'prestation' => $prestation,
            'prestationList' => $prestationList,
            'openingHourList' => $openingHourList,
            'user' => $user,
            'contactFormUrl' => $contactFormUrl,
        ]);
    }
}
