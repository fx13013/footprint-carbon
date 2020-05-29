<?php

namespace App\Controller;

use App\Entity\Footprint;
use App\Form\FootprintType;
use App\Repository\FootprintRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminFootprintController extends AbstractController
{
     /**
     * @Route("/admin", name="footprint_index")
     */
    public function index(FootprintRepository $footprint)
    {
        $ratio = $footprint->findAll();

        return $this->render('admin_footprint/index.html.twig', [
            'ratio' => $ratio
        ]);
    }

    /**
     * @Route("/admin/edit/{id}", name="footprint_edit")
     */
    public function edit(Footprint $footprint, Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(FootprintType::class, $footprint);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->flush();

            $this->addFlash('success', 'The item has been modified with success');
            return $this->redirectToRoute('footprint_index');
        }

        return $this->render('admin_footprint/edit.html.twig', [
            'footprintForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/new", name="footprint_new")
     */
    public function create(Request $request, EntityManagerInterface $manager)
    {
        $form = $this->createForm(FootprintType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $footprint = $form->getData();

            $manager->persist($footprint);
            $manager->flush();

            $this->addFlash('success', 'The item was created successfully');
            return $this->redirectToRoute('footprint_index');
        }

        return $this->render('admin_footprint/new.html.twig', [
            'footprintForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/delete/{id}", name="footprint_delete")
     */
    public function delete(Footprint $footprint, EntityManagerInterface $manager)
    {
        $manager->remove($footprint);
        $manager->flush();

        $this->addFlash('success', 'The item was removed with success');
        return $this->redirectToRoute('footprint_index');
    }
}
