<?php

namespace App\Controller;

use App\Entity\Invoice;
use App\Form\InvoiceType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[Route('/invoice', name: 'app_invoice')]
    public function index(): Response
    {
        return $this->render('invoice/index.html.twig', [
            'controller_name' => 'InvoiceController',
        ]);
    }

    #[Route("/invoice/store", name: "invoice_store")]
    public function create(Request $request): Response
    {
        $invoice = new Invoice();
        $invoice->setInvoiceDate(new \DateTime());
        $form = $this->createForm(InvoiceType::class, $invoice);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($invoice);
            $entityManager->flush();
            $this->addFlash('success', 'Invoice created successfully');
            return $this->redirectToRoute(
                'invoice_store'
            );
        }
        return $this->render('invoice/create.html.twig', [

            'form' => $form->createView(),
            'success' => null,
        ]);
    }
    //show liste
    #[Route("/invoice/list", name: "invoice_list")]
    public function list(): Response
    {
        $invoices = $this->getDoctrine()->getRepository(Invoice::class)->findAll();
        return $this->render('invoice/list.html.twig', [
            'invoices' => $invoices,
        ]);
    }
}
