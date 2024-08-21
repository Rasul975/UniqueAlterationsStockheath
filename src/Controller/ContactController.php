<?php

namespace App\Controller;

use App\Form\ContactFormType;
use Mailtrap\Config;
use Mailtrap\EmailHeader\CategoryHeader;
use Mailtrap\MailtrapClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $apiKey =  $_ENV['API_KEY_MAIL'];;
            $mailtrap = new MailtrapClient(new Config($apiKey));

            $email = (new Email())
                ->from(new Address('mailtrap@ukdreamcars.co.uk', 'Unique Alterations'))
                ->to(new Address("info@uniquealterations.co.uk"))
                ->subject('Contact Us Form Submission')
                ->text('Sender: ' . $data['name'] . "\nEmail: " . $data['email'] . "\nContact Number: " . $data['contact_number'].  "\nMessage: " . $data['message'])
            ;

            $email->getHeaders()
                ->add(new CategoryHeader('Unique Alterations'))
            ;

            $response = $mailtrap->sending()->emails()->send($email);

            // Optionally, you can add a flash message to indicate success
            $this->addFlash('success', 'Your message has been sent!');

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
