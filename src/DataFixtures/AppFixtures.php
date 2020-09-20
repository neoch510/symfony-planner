<?php

namespace App\DataFixtures;

use App\Entity\SocialMedia;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Cocur\Slugify\Slugify;

class AppFixtures extends Fixture
{
    private $slugify;
    private $userRepository;
    private $manager;
    function __construct(UserRepository $userRepository){
        $this->userRepository=$userRepository;
        $this->slugify = new Slugify();
    }
    public function load(ObjectManager $manager)
    {
        $user = $this->userRepository->find(1);
        dd($user);
        //Facebook
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Facebook");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($user);
        $manager->persist($socialMedia);
        //Instagram
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Instagram");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($user);
        $manager->persist($socialMedia);
        //Twitter
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Twitter");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($user);
        $manager->persist($socialMedia);
        //Linkedin
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Linkedin");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($user);
        $manager->persist($socialMedia);
        //Pinterest
        $socialMedia = new SocialMedia();
        $socialMedia->setName("Pinterest");
        $socialMedia->setSlug($this->slugify->slugify($socialMedia->getName()));
        $socialMedia->setUser($user);
        $manager->persist($socialMedia);

        $manager->flush();
    }
}
