<?php

namespace App\DataFixtures;

use App\Entity\Lampe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class LampeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<300;$i++) {
            $lampe= new Lampe();
            $lampe->setCompteurConsommationElectrique($this->getReference('compteurConsommationElectrique'.$faker->numberBetween(0,49)))
                ->setDescription($faker->text(100))
                ->setFluxLumineux($faker->numberBetween(0,20))
                ->setPiece($this->getReference('piece'.$faker->numberBetween(0,149)))
                ->setPuissanceAbsorbee($faker->randomFloat(3,0,500))
                ->setReference($i*10000)
                ->setType($faker->word)
                ->setActionneur($this->getReference('actionneur'.($i+290)));
            $this->addReference('lampe'.$i,$lampe);
            $manager->persist($lampe);
        }

        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            ActionneurFixtures::class,
            PieceFixtures::class,
            CompteurConsommationElectriqueFixtures::class
        );
    }
}
