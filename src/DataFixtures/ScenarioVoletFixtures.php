<?php

namespace App\DataFixtures;

use App\Entity\ScenarioVolet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ScenarioVoletFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<300;$i++) {
            $scenarioVolet= new ScenarioVolet();
            $scenarioVolet->setActionneur($this->getReference('actionneur'.$faker->numberBetween(0,200)))
                ->setDateDebutActivation($faker->dateTimeInInterval('-3months'))
                ->setDateFinActivation($faker->dateTimeInInterval('+3months','+2days'))
                ->setIsActive($faker->randomElement(array(true,false)))
                ->setIsUsingSensor($faker->randomElement(array(true,false)))
                ->setRepetition($faker->randomElement(array(true,false)))
                ->setNiveauElevation($faker->randomFloat(3,0,10))
                ->setVolet($this->getReference('volet'.$faker->numberBetween(0,199)));
            $this->addReference('scenarioVolet'.$i,$scenarioVolet);
            $manager->persist($scenarioVolet);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ActionneurFixtures::class,
            VoletFixtures::class
        );
    }
}
