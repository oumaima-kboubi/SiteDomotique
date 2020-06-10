<?php

namespace App\DataFixtures;

use App\Entity\Etat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class EtatFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<2500;$i++) {
            $etat = new Etat();
            $etat->setValue($faker->randomElement(array('ON','OFF','AUTOMATIQUE')))
                ->setActionneur($this->getReference('actionneur'.$faker->numberBetween(0,639)));
            $this->addReference('etat'.$i,$etat);
            $manager->persist($etat);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ActionneurFixtures::class
        );
    }
}
