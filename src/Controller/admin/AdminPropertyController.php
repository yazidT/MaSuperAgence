<?php
namespace App\Controller\admin;

use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;
    private $em;

    public function __construct(PropertyRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     * @return Response
     */
    public function index (): Response
    {
        $properties = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig',
                                [
                                    'current_menu' => '',
                                    'properties' => $properties
                                ]);
    }

    
    /**
     * @Route("/admin/{id}", name="admin.property.edit")
     * @param Request $request
     * @return Response
     */
    public function edit ($id, Request $request): Response
    {
        $property = $this->repository->find($id);

        // Form builder
        $form = $this->createForm( PropertyType ::class, $property);
        // After post requestt handler
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->em->flush();
            return $this->redirectToRoute('admin.property.index');
        }

        return $this->render('admin/property/edit.html.twig',
                                [
                                    'current_menu' => '',
                                    'property' => $property,
                                    'form' => $form->createView()
                                ]);
    }
     
}   