<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EntrepriseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $data = [
            'Google',
            'Facebook',
            'IBM',
            'Twitter',
            'Netflix',
            'Yahoo'
        ];

        foreach ($data as $valeur){
            $ent = new Entreprise();
            $ent->setDesignation($valeur);

            $manager->persist($ent);
        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
