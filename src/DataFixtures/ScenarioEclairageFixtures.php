<?php

namespace App\DataFixtures;

use App\Entity\ScenarioEclairage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ScenarioEclairageFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<500;$i++) {
            $scenarioEclairage= new ScenarioEclairage();
            $scenarioEclairage->setActionneur($this->getReference('actionneur'.$faker->numberBetween(290,590)))
                ->setDateDebutActivation($faker->dateTimeInInterval('-3months'))
                ->setDateFinActivation($faker->dateTimeInInterval('+3months','+10days'))
                ->setDegreLuminosite($faker->randomFloat(3,0,5.0))
                ->setIsActive($faker->randomElement(array(true,false)))
                ->setIsUsingSensor($faker->randomElement(array(true,false)))
                ->setLampe($this->getReference('lampe'.$faker->numberBetween(0,299)))
                ->setRepetition($faker->randomElement(array(true,false)));
            $this->addReference('scenarioEclairage'.$i,$scenarioEclairage);
            $manager->persist($scenarioEclairage);
        }


        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ActionneurFixtures::class,
            LampeFixtures::class
        );
    }
}
