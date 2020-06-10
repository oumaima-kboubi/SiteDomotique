<?php

namespace App\DataFixtures;

use App\Entity\WiFi;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class WiFiFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<50;$i++) {
            $wiFi= new WiFi();
            $wiFi->setSmartHome($this->getReference('smartHome'.$i))
                ->setPassword($faker->sentence());
            $this->addReference('wiFi'.$i,$wiFi);
            $manager->persist($wiFi);
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
