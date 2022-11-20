<?php

namespace App\Controller;

use App\DataTable\DataTableBuilder;
use App\Provider\UserTableProvider;
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
        $table = $this->dataTableBuilder
            ->setColumns(['id', 'firstName', 'lastName'])
            ->setData(new UserTableProvider())
            ->getDataTable()
        ;

        return $this->render('index.html.twig', [
            'table' => $table
        ]);
    }
}