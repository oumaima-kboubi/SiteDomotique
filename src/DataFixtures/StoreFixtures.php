<?php

namespace App\DataFixtures;

use App\Entity\Store;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class StoreFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<40;$i++) {
            $store= new Store();
            $store->setPiece($this->getReference('piece'.$faker->numberBetween(0,149)))
                ->setDescription($faker->text(100))
                ->setPuissanceAbsorbee($faker->randomFloat(3,0,500))
                ->setReference($i*10000)
                ->setType($faker->word)
                ->setActionneur($this->getReference('actionneur'.($i+250)))
                ->setPosition($faker->randomElement(array('interior','exterior')));
            $this->addReference('store'.$i,$store);
            $manager->persist($store);
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
