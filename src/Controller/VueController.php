<?php

namespace App\Controller;

use App\Entity\Entreprise;
use App\Entity\Pfe;
use App\Form\PfeType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VueController extends AbstractController
{
    #[Route('/vue', name: 'app_vue')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $manager= $doctrine->getManager();
        $pfe = new Pfe();
        $form = $this->createForm(PfeType::class,$pfe);
        $form->handleRequest($request);

        if($form->isSubmitted()){
            $manager->persist($pfe);
            $this->addFlash('success', 'La Pfe a été ajoutée');

            $manager->flush();
            return $this->redirectToRoute('pfe_show');
        }



        return $this->render('vue/index.html.twig', [
            'formView' => $form->createView(),
        ]);
    }
        #[Route('/vue/{id?0}', name: 'pfe_show')]
    public function showPfe($id, ManagerRegistry $doctrine): Response{
        if($id == 0){
            $this->addFlash('error', "Cette Pfe n'existe pas");
            return $this->redirectToRoute('app_vue');
        }
        $manager = $doctrine->getRepository(Pfe::class);

        $result = $manager->find($id);

        return $this->render('vue/profile.html.twig',[
            'profile' => $result
        ]);


    }
    #[Route('/', name: 'pfe_main')]
    public function Main(ManagerRegistry $doctrine){

        $personne = $doctrine->getRepository(Pfe::class);
        $entreprise = $doctrine->getRepository(Entreprise::class);

        $ent = $entreprise->findAll();

        foreach (){

        }


        return $this->render('main.html.twig');
    }
}
