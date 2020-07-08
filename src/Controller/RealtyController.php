<?php

namespace App\Controller;

use App\Entity\Realty;
use App\Entity\User;
use App\Form\RealtyType;
use App\Repository\RealtyRepository;
use App\Repository\TenantRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/realty")
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 */
class RealtyController extends AbstractController
{
    
    /**
     * @Route("/", name="realty_index", methods={"GET"})
     */
    public function index(RealtyRepository $realtyRepository, UserInterface $user): Response
    {
        return $this->render('realty/index.html.twig', [
            'realties' => $realtyRepository
            ->findRealtyByUserConnected($user->getId())
           
        ]);
    }

    /**
     * @Route("/new", name="realty_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserInterface $user): Response
    {
        $realty = new Realty();
        $form = $this->createForm(RealtyType::class, $realty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            // recover the image
            $images = $form->get('photo')->getData();
            
            // change image's name
            $file = ($images != null)? md5(uniqid()). '.'. $images->guessExtension(): false;
                    
            if($file){
                // copy image in upload folder
                $images->move(
                    $this->getParameter('images_directory'),
                    $file
                );
                // modify the image name for new name
                $realty->setPhoto($file);
            }else {
                $realty->setPhoto('default.png');
            }
            
            $realty->setUser($user);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($realty);
            $entityManager->flush();

            return $this->redirectToRoute('realty_index');
        }

        return $this->render('realty/new.html.twig', [
            'realty' => $realty,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="realty_show", methods={"GET"})
     */
    public function show(Realty $realty): Response
    {
        return $this->render('realty/show.html.twig', [
            'realty' => $realty,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="realty_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Realty $realty, UserInterface $user): Response
    {
        $form = $this->createForm(RealtyType::class, $realty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // recover the image
            $images = $form->get('photo')->getData();
            
            // change image's name
            $file = ($images != null)? md5(uniqid()). '.'. $images->guessExtension(): false;
            
            if($file){
                // copy image in upload folder
                $images->move(
                    $this->getParameter('images_directory'),
                    $file
                );
                // modify the image name for new name
                $realty->setPhoto($file);
            }else {
                $realty->setPhoto('default.png');
            }
           
            $realty->setUser($user);

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('realty_index');
        }

        return $this->render('realty/edit.html.twig', [
            'realty' => $realty,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="realty_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Realty $realty): Response
    {
        if ($this->isCsrfTokenValid('delete'.$realty->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($realty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('realty_index');
    }
}
