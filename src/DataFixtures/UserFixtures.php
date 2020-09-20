<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory as Faker;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordCrypt;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordCrypt=$passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker::create();
        for($i=0;$i<10;$i++){
            $user = new User();
            $user->setPassword($this->passwordCrypt->encodePassword($user,"123456"));
            $user->setEmail($faker->email);
            $user->setRoles(['ROLE_ADMIN','ROLE_USER']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
