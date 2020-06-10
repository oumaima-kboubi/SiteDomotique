<?php

namespace App\DataFixtures;

use App\Entity\Actionneur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ActionneurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<640;$i++) {
            $actionneur = new Actionneur();
            $actionneur->setDescription($faker->text(100))
                ->setLabel($faker->word)
                ->setPhenomenePhysiqueUtilise($faker->randomElement(array('Displacement or braking','Heat or cold','Light','Sound')))
                ->setPrincipeMisEnOeuvre($faker->randomElement(array('Compression and expansion','Incompressibility of the fluid','Joule effect','Magnetic effect')))
                ->setTypeEnergieUtilisee($faker->randomElement(array('Hydraulic','Electrical','Mechanical','thermic')));
            $this->addReference('actionneur'.$i,$actionneur);
            $manager->persist($actionneur);
        }
        $manager->flush();
    }
}
