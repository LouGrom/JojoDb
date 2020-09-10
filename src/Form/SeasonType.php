<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Season;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class SeasonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['label'=>'Nom de la saison'])
            ->add('date', DateType::class, ['label'=>'Date de diffusion', 'widget'=>'single_text'])
            ->add('picture', FileType::class, [
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '4096k',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/gif',
                            'image/png',
                            'image/bmp'
                        ],
                        'mimeTypesMessage' => "Le format n'est pas accepté, veuillez choisir un fichier au format .jpg, .png ou .gif"
                    ])
                ]
            ])
            ->add('description', TextareaType::class, ['label'=>'Description'])
            ->add('characters',
            EntityType::class, [
                "label" => "personnages",
                "class" => Character::class,
                "choice_label" => "name",
                "multiple" => true,
                "expanded" => true,
                "by_reference" => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Season::class,
        ]);
    }
}
