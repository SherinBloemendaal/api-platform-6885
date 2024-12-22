<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TestController extends AbstractController
{
    #[Route('/')]
    public function getFormats(Request $request): Response
    {
        return $this->render('base.html.twig', [
            'formats_json' => Request::getMimeTypes('json'),
            'formats_jsonld' => Request::getMimeTypes('jsonld'),
        ]);
    }

    #[Route('/content-type-to-format', methods: ['POST'])]
    public function getFormatForContentType(Request $request): Response
    {
        return new JsonResponse(['format' => $request->getContentTypeFormat()]);
    }
}
