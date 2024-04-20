<?php

namespace App\Controller;

use App\Entity\InvoiceLine;
use Doctrine\ORM\EntityManagerInterface;

use App\Form\InvoiceLineType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InvoiceLineController extends AbstractController
{

    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[Route('/invoice/line', name: 'app_invoice_line')]
    public function index(): Response
    {
        return $this->render('invoice_line/index.html.twig', [
            'controller_name' => 'InvoiceLineController',
        ]);
    }

    #[Route('/invoice/line/store', name: 'app_invoice_line_store')]
    public function store(Request $request): Response
    {
        $invoiceLine = new InvoiceLine();
        $form = $this->createForm(InvoiceLineType::class, $invoiceLine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($invoiceLine);
            $this->entityManager->flush();
            $this->addFlash('success', 'Invoice Line created successfully');
            return $this->redirectToRoute('app_invoice_line_store');
        }

        return $this->render('invoice_line/create.html.twig', [
            'controller_name' => 'InvoiceLineController',
            'form' => $form->createView(),
        ]);
    }

    #[Route('/invoice/line/list', name: 'app_invoice_line_list')]
    public function list(): Response
    {
        $invoiceLines = $this->getDoctrine()->getRepository(InvoiceLine::class)->findAll();
        return $this->render('invoice_line/list.html.twig', [
            'invoiceLines' => $invoiceLines,
        ]);
    }
}
