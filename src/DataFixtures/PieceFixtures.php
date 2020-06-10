<?php

namespace App\DataFixtures;

use App\Entity\Piece;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PieceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<150;$i++) {
            $piece= new Piece();
            $piece->setNom($faker->randomElement(array('kitchen','bedroom','dinning room','bathroom','garage','living room')))
                ->setSmartHome($this->getReference('smartHome'.$faker->numberBetween(0,49)));
            $this->addReference('piece'.$i,$piece);
            $manager->persist($piece);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            SmartHomeFixtures::class
        );
    }
}
