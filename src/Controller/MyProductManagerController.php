<?php

namespace App\Controller;

use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MyProductManagerController extends AbstractController
{
    #[Route('/my/product/manager', name: 'app_my_product_manager')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/MyProductManagerController.php',
        ]);
    }

    #[Route('/newProduct', name: 'crete_product')]
    public function createProduct(EntityManagerInterface $entityManagerInterface): Response
    {
        $product = new Produit();
        $product->setName("Banana");
        $product->setCategorieId(1);
        $product->setQteproduct(20);
        $product->setPrice(20);
        $product->setDiscount(0);


        $product->setDescription("A banana is a curved, yellow fruitp with a thick skin and soft sweet flesh. If you eat a banana every day for breakfast, your roommate might nickname you 'the monkey.' A banana is a tropical fruit that's quite popular all over the world. It grows in bunches on a banana tree.");

        $entityManagerInterface->persist($product);

        $entityManagerInterface->flush();


        return new Response("New product added {$product->getId()}");
    }

    #[Route('/Produit/{id}', name: 'Show_produit')]
    public function showProduit(EntityManagerInterface $entityManagerInterface, int $id): Response
    {

        $produit = $entityManagerInterface->getRepository(Produit::class)->find($id);

        if (!$produit) {
            throw $this->createNotFoundException(
                "no produit was found for id: {$id}"
            );
        }

        return new Response(
            "<h1>{$produit->getName()}</h1>
            <br>
            <img src='https://upload.wikimedia.org/wikipedia/commons/a/a5/Glass_of_Milk_%2833657535532%29.jpg' style='width:30%'>
            <p>{$produit->getDescription()}/<p>
            <br>
            <p>price:{$produit->getPrice()} and qte of: {$produit->getQteproduct()}<p>
            "
        );
    }
}
