<?php

namespace App\Controller;

use App\Repository\OpeningHoursRepository;
use App\Repository\OpinionsRepository;
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
        OpinionsRepository $opinionsRepository,
    ): Response

    {
        $openingHourList = $openingHoursRepository->findBy([],['id' => 'ASC']);
        $prestationList = $prestationsRepository->findBy([],['id' => 'ASC']);
       
        $user = $security->getUser();

        // For the display of the opinions
        $opinionsValidated = $opinionsRepository->getValidatedOpinions();
        if (count($opinionsValidated) > 0) {
            $opinionsToDisplay = $opinionsValidated;
            $averageGrade = $opinionsRepository->getAverageGrade();
        }
        else {
            $opinionsToDisplay = null;
            $averageGrade = '5';
        }
        
        return $this->render('home/index.html.twig', [
            'opinionsToDisplay' => $opinionsToDisplay,
            'averageGrade' => $averageGrade,
            'controller_name' => 'HomeController',
            'openingHourList' => $openingHourList,
            'prestationList' => $prestationList,
            'user' => $user,            
        ]);
    }
}
