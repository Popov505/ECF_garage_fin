<?php

namespace App\Form;

use App\Entity\Opinions;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OpinionType extends AbstractType
{
    public function __construct(private Security $security,) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname')
            ->add('commentary')
            ->add('grade', ChoiceType::class, [
                'label' => 'Votre note : ',
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                ],
                'attr' => [
                    'class' => 'rate'
                ],
                'expanded' => true,
                'multiple' => false,
            ]);

        $user = $this->security->getUser();

        if ($user) {
            $builder
                ->add('is_validated', ChoiceType::class, [
                    'label' => 'Commentaire validé?',
                    'choices' => [
                        'non' => false,
                        'oui' => true,
                    ],
                    'empty_data' => 'non']);
        }
        else {
            $builder
                ->add('is_validated', HiddenType::class, [
                    'label' => 'Commentaire validé?',
                    'empty_data' => false]);
        };
    }
        


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opinions::class,
        ]);
    }
}
