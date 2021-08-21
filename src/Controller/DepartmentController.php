<?php

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartmentController extends AbstractController
{
    /**
     * @Route("/department/{department}", name="department")
     */
    public function index(string $department, CallApiService $callApiService): Response
    {
        return $this->render('department/index.html.twig', [
            'data' => $callApiService->getDepartmentData($department),
        ]);
    }
}
