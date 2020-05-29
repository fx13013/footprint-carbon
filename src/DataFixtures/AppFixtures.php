<?php

namespace App\DataFixtures;

use App\Entity\Footprint;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $footPrint = [
            "Low-cost flight ticket" => 10000,
            "Regular flight ticket" => 3600,
            "Electricity" => 6000,
            "Legal advice" => 160,
            "Car gas" => 3200
        ];



        foreach($footPrint as $k => $v){
            $ratio = new Footprint;
            $ratio->setExpenseType($k)
                ->setRatio($v);

            $manager->persist($ratio);
        }

        $manager->flush();
    }
}
