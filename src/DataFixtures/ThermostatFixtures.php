<?php

namespace App\DataFixtures;

use App\Entity\Thermostat;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ThermostatFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<50;$i++) {
            $thermostat= new Thermostat();
            $thermostat->setCompteurConsommationThermique($this->getReference('compteurConsommationThermique'.$faker->numberBetween(0,49)))
                ->setActionneur($this->getReference('actionneur'.($i+200)))
                ->setCentraleAlarme($this->getReference('centraleAlarme'.$faker->numberBetween(0,49)))
                ->setDescription($faker->text(100))
                ->setPiece($this->getReference('piece'.$faker->numberBetween(0,149)))
                ->setPlageReglage($faker->numberBetween(8,11).'...'.$faker->numberBetween(25,32))
                ->setPuissanceAbsorbee($faker->randomFloat(3,0,500))
                ->setReference($i*10000)
                ->setSonde('NTC')
                ->setTempAmbiante($faker->numberBetween(16,27))
                ->setType($faker->text(100))
                ->setUniteMesure($faker->randomElement(array('C','F','K')));
            $this->addReference('thermostat'.$i,$thermostat);
            $manager->persist($thermostat);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ActionneurFixtures::class,
            CentraleAlarmeFixtures::class,
            PieceFixtures::class,
            CompteurConsommationThermiqueFixtures::class,
        );
    }
}
