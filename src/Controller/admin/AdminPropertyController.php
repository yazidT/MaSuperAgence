<?php
namespace App\Controller\admin;

use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPropertyController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     * @return Response
     */
    public function index (): Response
    {
        $properties = $this->repository->findAll();
        dump($properties);
        return $this->render('admin/property/index.html.twig',
                                [
                                    'current_menu' => '',
                                    'properties' => $properties
                                ]);
    }

    
    /**
     * @Route("/admin/{id}", name="admin.property.edit")
     * @return Response
     */
    public function edit ($id): Response
    {
        $property = $this->repository->find($id);

        $form = $this->createForm( PropertyType ::class, $property);
        return $this->render('admin/property/edit.html.twig',
                                [
                                    'current_menu' => '',
                                    'property' => $property,
                                    'form' => $form->createView()
                                ]);
    }
     
}   