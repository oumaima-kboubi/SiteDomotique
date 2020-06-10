<?php

namespace App\DataFixtures;

use App\Entity\ScenarioStore;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ScenarioStoreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<100;$i++) {
            $scenarioStore= new ScenarioStore();
            $scenarioStore->setActionneur($this->getReference('actionneur'.$faker->numberBetween(250,290)))
                ->setDateDebutActivation($faker->dateTimeInInterval('-3months'))
                ->setDateFinActivation($faker->dateTimeInInterval('+3months','+2days'))
                ->setIsActive($faker->randomElement(array(true,false)))
                ->setIsUsingSensor($faker->randomElement(array(true,false)))
                ->setRepetition($faker->randomElement(array(true,false)))
                ->setInclinaison($faker->randomFloat(3,0,1.0))
                ->setNiveauOuverture($faker->randomFloat(3,0,100))
                ->setStore($this->getReference('store'.$faker->numberBetween(0,39)));
            $this->addReference('scenarioStore'.$i,$scenarioStore);
            $manager->persist($scenarioStore);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ActionneurFixtures::class,
            StoreFixtures::class
        );
    }
}
