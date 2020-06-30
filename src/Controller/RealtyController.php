<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
/**
 * @isGranted("IS_AUTHENTICATED_FULLY")
 */
class RealtyController extends AbstractController
{
    /**
     * @Route("/realty", name="realty")
     */
    public function index()
    {
        return $this->render('realty/index.html.twig', [
            'controller_name' => 'RealtyController',
        ]);
    }
}
