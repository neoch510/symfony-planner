<?php
namespace App\Form;


use App\Entity\SocialMedia;
use App\Entity\User;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class PlannerFormType extends AbstractType {
    public function buildForm(FormBuilderInterface $formBuilder, array $options){
        $formBuilder->add('socialMedia',SocialMedia::class,[
            "label"=>"Réseau social sur lequel vous allez poster"
        ])
            ->add('user',User::class,[
                'required'=>true
            ])
            ->add('content',CKEditorType::class,[
                'label'=>'Votre contenu'
            ])
            ->add('imageFile', VichImageType::class,[
                'label'=>'L\'image de votre publication'
            ])
            ->add('video',TextType::class,[
                'label'=>'Votre lien vidéo'
            ])
            ->add('datePost',DateTimeType::class,[
                'date_label'=>'Sera publié le'
            ]);

    }
    public function configureOptions(OptionsResolver $resolver)
    {
        /*$resolver->setDefaults([
            'data_class' => User::class,
        ]);*/
    }
}
