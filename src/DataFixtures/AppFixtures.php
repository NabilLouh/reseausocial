<?php

namespace App\DataFixtures;

use App\Entity\Commentaire;
use App\Entity\Publication;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $nabil = new Utilisateur();
        $nabil->setMail('nabil@gmail.com');
        $nabil->setName('Nabil');
        $nabil->setPseudo('Arkhin');
        $nabil->setBirthday(new \DateTime('1996-11-18'));
        $manager->persist($nabil);

        $steven = new Utilisateur();
        $steven->setMail('Steven@gmail.com');
        $steven->setName('Steven');
        $steven->setpseudo('RagnardGerta');
        $steven->setBirthday(new \DateTime('1995-6-6'));
        $manager->persist($steven);

        $dylan = new Utilisateur();
        $dylan->setMail('Dylan@gmail.com');
        $dylan->setName('Dylan');
        $dylan->setPseudo('Sharki');
        $dylan->setBirthday(new \DateTime('1998-4-21'));
        $manager->persist($dylan);

        $matthieu = new Utilisateur();
        $matthieu->setMail('Matthieu@gmail.com');
        $matthieu->setName('Matthieu');
        $matthieu->setBirthday(new \DateTime('1992-11-11'));
        $manager->persist($matthieu);


        $publication1 = new Publication();
        $publication1->setContenu('Exorcizamus te omnis immundus spiritus omnis satanica potestas omnis incursio infernalis');
        $publication1->setDatecreation(new \DateTime('2022-5-12'));
        $publication1->setUtilisateur($nabil);
        $manager->persist($publication1);

        $publication2 = new Publication();
        $publication2->setContenu('adversii omnis congregatio secta diabolica ergo draco maledicte');
        $publication2->setDatecreation(new \DateTime('2022-5-12'));
        $publication2->setUtilisateur($steven);
        $manager->persist($publication2);

        $publication3 = new Publication();
        $publication3->setContenu('ecclesiam tuam securi tibi facias libertate servire te rogamus audi nos.');
        $publication3->setDatecreation(new \DateTime('2022-5-12'));
        $publication3->setUtilisateur($dylan);
        $manager->persist($publication3);


        $commentaire = new Commentaire();
        $commentaire->setContenu('AAAAAAAAAH !!!!!');
        $commentaire->setDatecreation(new \DateTime('2022-5-12'));
        $commentaire->setUtilisateur($matthieu);
        $commentaire->setPublication($publication3);
        $manager->persist($commentaire);

        $manager->flush();
    }
}
