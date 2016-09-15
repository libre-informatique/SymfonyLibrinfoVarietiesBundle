<?php

namespace Librinfo\VarietiesBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class VarietyCodeController extends Controller
{
    /**
     * Generate variety/strain code
     * 
     * @return Response
     */
    public function generateCodeAction($type, Request $request)
    {
        $manager = $this->get('doctrine')->getManager();
        $repo = $manager->getRepository($type == 'strain' ? 'LibrinfoVarietiesBundle:Variety' : 'LibrinfoVarietiesBundle:Species');
        dump($repo);
        $object = $repo->find($request->get('id'));
        dump($object);
        return new JsonResponse(['code' => $object->getCode()], 200);
    }
    
}
