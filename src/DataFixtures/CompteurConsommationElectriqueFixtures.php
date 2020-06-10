<?php

namespace App\DataFixtures;

use App\Entity\CompteurConsommationElectrique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CompteurConsommationElectriqueFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<50;$i++) {
            $compteurConsommationElectrique = new CompteurConsommationElectrique();
            $compteurConsommationElectrique->setValue($faker->randomFloat(3,0,10000000))
                ->setSeuilMax($faker->randomFloat(3,0,10000000))
                ->setReference($i*10000)
                ->setCourantMin($faker->randomFloat(3,0,10000000))
                ->setCourantMax($faker->randomFloat(3,15000,10000000));
            $this->addReference('compteurConsommationElectrique'.$i,$compteurConsommationElectrique);
            $manager->persist($compteurConsommationElectrique);
        }
        $manager->flush();
    }
}
