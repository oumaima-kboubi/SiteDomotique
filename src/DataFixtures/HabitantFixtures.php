<?php

namespace App\DataFixtures;

use App\Entity\Habitant;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class HabitantFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        /*for($i = 50;$i<90;$i++) {
            $habitant = new Habitant();
            $this->addReference('habitant'.$i,$habitant);
            $manager->persist($habitant);
        }*/

        $manager->flush();
    }
}
