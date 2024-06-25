<?php

namespace App\Controller;

use App\Entity\Contacts;
use App\Form\ContactType;
use App\Repository\ContactsRepository;
use App\Repository\OpeningHoursRepository;
use App\Repository\PrestationsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{

    // Function to display the contact form

    #[Route('/contact', name: 'app_contact')]
    public function showContactForm(
        PrestationsRepository $prestationsRepository, 
        OpeningHoursRepository $openingHoursRepository,
        Request $request, 
        EntityManagerInterface $entityManagerInterface,
        ContactsRepository $contactsRepository, 
        Security $security,
    ): Response

    {
        // Informations for the header and the footer
        $openingHourList = $openingHoursRepository->findBy([],['id' => 'ASC']);
        $prestationList = $prestationsRepository->findBy([],['id' => 'ASC']);

        $user = $security->getUser();

        // List of the existing contact form
        $formList = $contactsRepository->findBy([],['id' => 'DESC']);

        
        // Informations for the contact form
        $contact = new Contacts();
        $contactForm = $this->createForm(ContactType::class, $contact);
        $contactForm->handleRequest($request);

        // Submission of the contact form
        if ($contactForm->isSubmitted() && $contactForm->isValid()) {
            $entityManagerInterface->persist($contact);
            $entityManagerInterface->flush();

            $this->addFlash('success', 'Le formulaire de contact a bien été envoyé');
        }
        
        return $this->render('contact/show_contact_form.html.twig', [
            'controller_name' => 'ContactController',
            'contactForm' => $contactForm,
            'openingHourList' => $openingHourList,
            'prestationList' => $prestationList,
            'user' => $user,
            'formList' => $formList,
        ]);
    }

    // Delete function : remove contact form

    #[Route('/contact/delete/{id}', name: 'app_contact_delete', methods: ['DELETE'])]
    public function delete(Contacts $contacts, EntityManagerInterface $em) {
        $em->remove($contacts);
        $em->flush();

        $this->addFlash('success', 'Le formulaire de contact a bien été supprimé');
        return $this->redirectToRoute('app_contact');
    }
}