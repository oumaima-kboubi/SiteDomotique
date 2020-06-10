<?php

namespace App\DataFixtures;

use App\Entity\SmartHome;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SmartHomeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<50;$i++) {
            $smartHome= new SmartHome();
            $smartHome->setAdresse($faker->address)
                ->setCodeIdentification($i*9)
                ->setCompteurConsommationElectrique($this->getReference('compteurConsommationElectrique'.$i)) 
                ->setName($faker->streetName)
                ->setProprietaire($this->getReference('proprietaire'.$i));
            $this->addReference('smartHome'.$i,$smartHome);
            $manager->persist($smartHome);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ProprietaireFixtures::class,
            CompteurConsommationElectriqueFixtures::class,
            CompteurConsommationThermiqueFixtures::class
        );
    }
}
