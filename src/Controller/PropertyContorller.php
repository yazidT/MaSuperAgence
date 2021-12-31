<?php
namespace App\Controller;

use App\Entity\Property;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyContorller extends AbstractController
{
    /**
     * @Route("/biens", name="property.index")
     * @return Response
     */
    public function index (): Response
    {
        /**
         * Set a property in the database
         
         * 
         */
        $property = new Property();
        $property->setTitle('Mon Premier Bien')
                 ->setPrice(200000)
                 ->setRooms(4)
                 ->setBedrooms(3)
                 ->setFloor(2)
                 ->setSurface(60)
                 ->setHeat(1)
                 ->setCity('Montpellier')
                 ->setAddress("12 cours Gambetta")
                 ->setZipCode('34000');

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($property);
        $manager->flush();

        return $this->render('property/index.html.twig',
                                [
                                    'current_menu' => 'properties'
                                ]);
    }
     
} 