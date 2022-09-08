<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new Utilisateur();
        $user->setMail('nabil@gmail.com');
        $user->setName('Nabil');
        $user->setPseudo('Arkhin');
        $user->setBirthday(new \DateTime('1996-11-18'));
        $manager->persist($user);

        $user = new Utilisateur();
        $user->setMail('Steven@gmail.com');
        $user->setName('RagnardGerta');
        $user->setBirthday(new \DateTime('1995-6-6'));
        $manager->persist($user);

        $user = new Utilisateur();
        $user->setMail('Dylan@gmail.com');
        $user->setName('Sharki');
        $user->setBirthday(new \DateTime('1998-4-21'));
        $manager->persist($user);


        $manager->flush();
    }
}
