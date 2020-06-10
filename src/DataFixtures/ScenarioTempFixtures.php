<?php

namespace App\DataFixtures;

use App\Entity\ScenarioTemp;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ScenarioTempFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<200;$i++) {
            $scenarioTemp= new ScenarioTemp();
            $scenarioTemp->setActionneur($this->getReference('actionneur'.$faker->numberBetween(200,250)))
                ->setDateDebutActivation($faker->dateTimeInInterval('-3months'))
                ->setDateFinActivation($faker->dateTimeInInterval('+3months','+2days'))
                ->setIsActive($faker->randomElement(array(true,false)))
                ->setIsUsingSensor($faker->randomElement(array(true,false)))
                ->setRepetition($faker->randomElement(array(true,false)))
                ->setSeuilMax($faker->randomFloat(3,50,100))
                ->setSeuilMin($faker->randomFloat(3,0,50))
                ->setThermostat($this->getReference('thermostat'.$faker->numberBetween(0,49)))
                ->setValeurTemp($faker->numberBetween(10,30));
            $this->addReference('scenarioTemp'.$i,$scenarioTemp);
            $manager->persist($scenarioTemp);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ActionneurFixtures::class,
            ThermostatFixtures::class
        );
    }
}
