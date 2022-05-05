<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\Pfe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PfeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');

        for($i=0; $i<10; $i++){
            $person = new Pfe();

            $person->setTitle("Pfe".$i);
            $person->setStudent($faker->firstName." ".$faker->name);


            $manager->persist($person);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
