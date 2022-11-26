<?php

namespace App\Controller;

use App\DataTable\DataTableBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    public function __construct(
        private readonly DataTableBuilder $dataTableBuilder
    ) {}

    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $data = [
            ['id' => 3, 'firstName' => 'Mathew', 'lastName' => 'French'],
            ['id' => 4, 'firstName' => 'Bob', 'lastName' => 'Dog'],
            ['id' => 3, 'firstName' => 'Mathew', 'lastName' => 'French'],
            ['id' => 4, 'firstName' => 'Bob', 'lastName' => 'Dog']
        ];

        $table = $this->dataTableBuilder
            ->setColumns(['id', 'firstName', 'lastName'])
            ->setData($data)
            ->setPageSize(1)
            ->withPagination(true)
            ->getDataTable()
        ;

        return $this->render('index.html.twig', [
            'table' => $table
        ]);
    }
}