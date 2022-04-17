<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Export;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $export = new Export();
            $export->setTitle('Export '.$i);

            $timestamp = mt_rand(1, time());
            $export->setDate(new \DateTime(date("Y-m-d", $timestamp)));
            $export->setTime(new \DateTime(date("H:i:s", $timestamp)));

            $export->setUsername('User '.mt_rand(1,4));
            $export->setLokal(mt_rand(1, 4));
            $manager->persist($export);
        }

        $manager->flush();
    }
}
