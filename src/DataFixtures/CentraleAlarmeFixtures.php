<?php

namespace App\DataFixtures;

use App\Entity\CentraleAlarme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CentraleAlarmeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<50;$i++) {
            $centraleAlarme = new CentraleAlarme();
            $centraleAlarme->setActionneur($this->getReference('actionneur'.($i+590)))
                ->setAlimentationPrincipale($faker->numberBetween(150,250).'V/ '.(($faker->randomDigit)*10).' Hz')
                ->setAlimentationSecondaire($faker->randomDigit.' batteries '.$faker->randomElement(array(1.5,3,4.5)).' V')
                ->setDescription($faker->text(100))
                ->setDimensions( 'H '.$faker->numberBetween(200,400).' x L '.$faker->numberBetween(100,250).' x P '.$faker->numberBetween(25,125).' mm')
                ->setNbreBoucles($faker->randomDigit)
                ->setSmartHome($this->getReference('smartHome'.$i))
                ->setPoids($faker->numberBetween(700,5000))
                ->setPuissanceAbsorbee($faker->randomFloat(3,0,1000000))
                ->setReference($i*1000)
                ->setType($faker->word);
            $this->addReference('centraleAlarme'.$i,$centraleAlarme);
            $manager->persist($centraleAlarme);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            SmartHomeFixtures::class,
            ActionneurFixtures::class
        );
    }
}
