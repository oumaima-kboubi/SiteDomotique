<?php

namespace App\DataFixtures;

use App\Entity\Capteur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CapteurFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<300;$i++) {
            $capteur = new Capteur();
            $capteur->setApportEnergetique($faker->randomElement(array('passive','active')))
                ->setDescription($faker->text(100))
                ->setLabel($faker->word)
                ->setPiece($this->getReference('piece'.$faker->numberBetween(0,149)))
                ->setSeuilDeclenchement($faker->randomFloat(3,0,10000000))
                ->setTypeDetection($faker->randomElement(array('with contact','without contact')))
                ->setTypeSortie($faker->randomElement(array('analog','digital','logic')));
            $this->addReference('capteur'.$i,$capteur);
            $manager->persist($capteur);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            PieceFixtures::class,
        );
    }
}
