<?php

namespace App\Controller;

use App\Entity\Tenant;
use App\Form\TenantType;
use App\Repository\TenantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @Route("/tenant")
 * @IsGranted("IS_AUTHENTICATED_FULLY")
 * 
 */
class TenantController extends AbstractController
{
    /**
     * @Route("/", name="tenant_index", methods={"GET"})
     */
    public function index(TenantRepository $tenantRepository, UserInterface $user): Response
    {
        return $this->render('tenant/index.html.twig', [
            'tenants' => $tenantRepository->findByRealty($user->getId())
        ]);
    }

    /**
     * @Route("/new", name="tenant_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $tenant = new Tenant();
        $form = $this->createForm(TenantType::class, $tenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tenant);
            $entityManager->flush();

            return $this->redirectToRoute('tenant_index');
        }

        return $this->render('tenant/new.html.twig', [
            'tenant' => $tenant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tenant_show", methods={"GET"})
     */
    public function show(Tenant $tenant): Response
    {
        return $this->render('tenant/show.html.twig', [
            'tenant' => $tenant,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="tenant_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Tenant $tenant): Response
    {
        $form = $this->createForm(TenantType::class, $tenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('tenant_index');
        }

        return $this->render('tenant/edit.html.twig', [
            'tenant' => $tenant,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="tenant_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Tenant $tenant): Response
    {
        if ($this->isCsrfTokenValid('delete'.$tenant->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($tenant);
            $entityManager->flush();
        }

        return $this->redirectToRoute('tenant_index');
    }
}
