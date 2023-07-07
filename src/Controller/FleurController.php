<?php

namespace App\Controller;

use App\Entity\Fleur;
use App\Repository\FleurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[Route('/api/fleur')]
class FleurController extends AbstractController
{

    public function __construct(private FleurRepository $repo) {}


    #[Route(methods: 'GET')]
    public function all(): JsonResponse
    {
        return $this->json($this->repo->findAll());
    }


    #[Route('/{id}',methods: 'GET')]
    public function one(int $id): JsonResponse
    {
        $fleur = $this->repo->findById($id);
        if($fleur == null) {
            return $this->json('Resource Not found', 404);
        }

        return $this->json($fleur);
    }

    #[Route('/{id}',methods: 'DELETE')]
    public function delete(int $id): JsonResponse
    {
        $fleur = $this->repo->findById($id);
        if($fleur == null) {
            return $this->json('Resource Not found', 404);
        }
        $this->repo->delete($id);

        return $this->json(null, 204);
    }

    #[Route(methods: 'POST')]
    public function add(Request $request, SerializerInterface $serializer, ValidatorInterface $validator) {
       
        try {

            $fleur = $serializer->deserialize($request->getContent(), Fleur::class, 'json');
        }catch(\Exception $error) {
            return $this->json('Invalid body', 400);
        }
        $errors = $validator->validate($fleur);
        if($errors->count() > 0) {
            return $this->json(['errors' => $errors], 400);
        }
        $this->repo->persist($fleur);

        return $this->json($fleur, 201);
    }

    #[Route('/{id}', methods: 'PATCH')]
    public function update(int $id, Request $request, SerializerInterface $serializer,ValidatorInterface $validator) {

        $fleur = $this->repo->findById($id);
        if($fleur == null) {
            return $this->json('Resource Not found', 404);
        }

        $serializer->deserialize($request->getContent(), Fleur::class, 'json',[
            'object_to_populate' => $fleur
        ]);
        try {

            $fleur = $serializer->deserialize($request->getContent(), Fleur::class, 'json');
        }catch(\Exception $error) {
            return $this->json('Invalid body', 400);
        }
        $errors = $validator->validate($fleur);
        if($errors->count() > 0) {
            return $this->json(['errors' => $errors], 400);
        }
        $this->repo->update($fleur);

        return $this->json($fleur);
    }


       
    }



