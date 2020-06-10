<?php

namespace App\DataFixtures;

use App\Entity\Metrique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class MetriqueFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<150;$i++) {
            $metrique= new Metrique();
            $metrique->setValue($faker->randomFloat(3,0,10000000))
                ->setCapteur($this->getReference('capteur'.$i));
            $this->addReference('metrique'.$i,$metrique);
            $manager->persist($metrique);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            CapteurFixtures::class
        );
    }
}
