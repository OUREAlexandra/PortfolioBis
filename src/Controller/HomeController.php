<?php

namespace App\Controller;

use App\Entity\Design;
use App\Entity\Techno;
use App\Entity\Project;
use App\Form\PortofolioContactType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $repoProject = $this->getDoctrine()->getRepository(Project::class);
        $projects = $repoProject->findAll();
        $designs = $this->getDoctrine()->getRepository(Design::class)->findAll();
        $technos = $this->getDoctrine()->getRepository(Techno::class)->findAll();


        $form = $this->createForm(PortofolioContactType::class);
        $contact = $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new TemplatedEmail())
                ->from($contact->get('email')->getData())
                ->to('alexandra.oure@hotmail.com')
                ->subject('portofolio')
                ->htmlTemplate('emails/contact.html.twig')
                ->context([
                    'mail' => $contact->get('email')->getData(),
                    'message' => $contact->get('message')->getData(),
                    'firstname' => $contact->get('firstname')->getData(),
                    'lastname' => $contact->get('lastname')->getData()

                ]);
            $mailer->send($email);
            $this->addFlash('message', 'Mail de contact envoyé !');
            return $this->redirectToRoute('home');
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'ProjectController',
            'projects' => $projects,
            'designs' => $designs,
            'technos' => $technos,
            'form' => $form->createView()
        ]);
    }
}
