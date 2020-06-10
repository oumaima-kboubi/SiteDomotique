<?php

namespace App\DataFixtures;

use App\Entity\CompteurConsommationThermique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CompteurConsommationThermiqueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<50;$i++) {
            $compteurConsommationThermique = new CompteurConsommationThermique();
            $compteurConsommationThermique->setDegreProtection('IP '.$faker->randomNumber(2))
                ->setEnvironnementDeFctmnt($faker->sentence())
                ->setLongueurCableCalculateur($faker->randomFloat(3,0,10.5))
                ->setReference($i*1000)
                ->setSeuilMax($faker->randomFloat(3,0,10000000))
                ->setTempMax($faker->randomFloat(3,0,110))
                ->setTempMin($faker->randomFloat(3,-40,40))
                ->setValue($faker->randomFloat(3,0,10000000));
            $this->addReference('compteurConsommationThermique'.$i,$compteurConsommationThermique);
            $manager->persist($compteurConsommationThermique);
        }

        $manager->flush();
    }
}
