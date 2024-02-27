<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/api/produits', name: 'produits', methods: ['GET'])]
    public function getProductsListe(ProductRepository $produitRepository, SerializerInterface $serializer): JsonResponse
    {
        $produitList = $produitRepository->findAll();
        $jsonProduitList = $serializer->serialize($produitList, 'json');
        return new JsonResponse($jsonProduitList, Response::HTTP_OK, [], true);
    }

    
    #[Route('/api/produit/{id}', name: 'produit', methods: ['GET'])]
    public function getProduit(int $id, SerializerInterface $serializer, ProductRepository $productRepository): JsonResponse
    {
        $productRepository = $productRepository->find($id);
        if ($productRepository) {
            $jsonProduit = $serializer->serialize($productRepository, 'json');
            return new JsonResponse($jsonProduit, Response::HTTP_OK, [], true);
        }
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }
}
