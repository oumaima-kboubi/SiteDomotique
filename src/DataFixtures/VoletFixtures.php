<?php

namespace App\DataFixtures;

use App\Entity\Volet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class VoletFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<200;$i++) {
            $volet= new Volet();
            $volet->setDescription($faker->text(100))
                ->setPiece($this->getReference('piece'.$faker->numberBetween(0,149)))
                ->setPuissanceAbsorbee($faker->randomFloat(3,0,500))
                ->setReference($i*10000)
                ->setType($faker->word)
                ->setActionneur($this->getReference('actionneur'.$i))
                ->setMatiere($faker->randomElement('wood','aluminium'));
            $this->addReference('volet'.$i,$volet);
            $manager->persist($volet);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            PieceFixtures::class,
            ActionneurFixtures::class
        );
    }
}
