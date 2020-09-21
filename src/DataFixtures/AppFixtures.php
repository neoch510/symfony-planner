<?php

namespace App\DataFixtures;

use App\Entity\SocialMedia;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Cocur\Slugify\Slugify;
use Faker\Factory as Faker;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $slugify;
    private $userRepository;
    private $manager;
    private $passwordCrypt;
    function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $passwordEncoder){
        $this->userRepository=$userRepository;
        $this->slugify = new Slugify();
        $this->passwordCrypt=$passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        //First create users
        $faker = Faker::create();
        $userSaved = null;
        for($i=0;$i<10;$i++){
            $user = new User();
            $user->setPassword($this->passwordCrypt->encodePassword($user,"123456"));
            $user->setEmail($faker->email);
            $user->setRoles(['ROLE_ADMIN','ROLE_USER']);
            $manager->persist($user);
            if($i==0){
                $userSaved=$user;
            }
        }
        $manager->flush();
        //


        //Facebook
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Facebook");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($userSaved);
        $manager->persist($socialMedia);
        //Instagram
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Instagram");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($userSaved);
        $manager->persist($socialMedia);
        //Twitter
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Twitter");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($userSaved);
        $manager->persist($socialMedia);
        //Linkedin
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Linkedin");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($userSaved);
        $manager->persist($socialMedia);
        //Pinterest
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Pinterest");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($userSaved);
        $manager->persist($socialMedia);
        $manager->flush();
    }
}
