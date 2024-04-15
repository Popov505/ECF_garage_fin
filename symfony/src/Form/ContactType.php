<?php

namespace App\Form;

use App\Entity\Contacts;
use App\Entity\Cars;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType implements DataMapperInterface
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    { 
        $builder
            ->add('firstname', TextType::class, [
                'required' => true,
            ])                
            ->add('lastname', TextType::class, [
                'required' => true,
            ]) 
            ->add('email', TextType::class, [
                'required' => true,
            ])
            ->add('phone', TextType::class, [
                'required' => true,
            ]) 
            ->add('title', TextType::class, [
                'required' => true,
                'empty_data' => 'Francis',
            ])
            ->add('message', TextareaType::class, [
                'required' => true,
            ])
            ->setDataMapper($this)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'empty_data' => null,
        ]);
    }

    /**
     * @param Cars|null $viewData
     */
    public function mapDataToForms($viewData, \Traversable $forms): void
    {
        //dd($viewData);

        // there is no data yet, so nothing to prepopulate
        if (null === $viewData) {
            return;
        }

        // invalid data type
        if (!$viewData instanceof Cars) {
            throw new UnexpectedTypeException($viewData, Cars::class);
        }

        /** @var FormInterface[] $forms */
        $forms = iterator_to_array($forms);

        // initialize form field values
        $forms['title']->setData($viewData->getTitle());
    }

    public function mapFormsToData(\Traversable $forms, &$viewData): void
    {
        /** @var FormInterface[] $forms */
        $forms = iterator_to_array($forms);

        // as data is passed by reference, overriding it will change it in
        // the form object as well
        // beware of type inconsistency, see caution below
        $viewData = new Cars(
            $forms['title']->getData(),
        );
    }
}
