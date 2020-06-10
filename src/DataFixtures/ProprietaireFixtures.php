<?php

namespace App\DataFixtures;

use App\Entity\Proprietaire;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProprietaireFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('en_US');
        for($i = 0;$i<50;$i++) {
            $proprietaire= new Proprietaire();
            $proprietaire->setCIN($i*100000)
                ->setSalt($faker->unique()->word)
                ->setLangue($faker->locale)
                ->setEmail($faker->unique()->email)
                ->setEmailCanonical($faker->unique()->email)
                ->setEnabled($faker->randomElement([true,false]))
                ->setFuseauHoraire($faker->iso8601)
                ->setLastLogin($faker->dateTime)
                ->setNom($faker->unique()->name)
                ->setPassword($faker->text(15))
                ->setPasswordRequestedAt($faker->dateTime)
                ->setPhoto($faker->imageUrl())
                ->setPlainPassword($faker->text(15))
                ->setPrenom($faker->unique()->name)
                ->setRoles(['ROLE_PROPRIETAIRE'])
                ->setSuperAdmin(false)
                ->setTelephone($faker->unique()->randomNumber(8))
                ->setUsername($faker->unique()->name)
                ->setUsernameCanonical($faker->unique()->name);
            $this->addReference('proprietaire'.$i,$proprietaire);
            $manager->persist($proprietaire);
        }

        $manager->flush();
    }
}
