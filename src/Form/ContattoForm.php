<?php 
    namespace App\Form;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\NumberType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\TelType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
    use Symfony\Component\Form\FormBuilderInterface;

    
    class ContattoForm extends AbstractType {     

        public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('nome', TextType::class)
            ->add('cognome', TextType::class)
            ->add('email',EmailType::class,['required' => false,],)
            ->add('telefono',TelType::class,['required' => false,] )
            ->add('oggetto', ChoiceType::class,
            ['choices'=>[
                'Amministrazione'=>'Amministrazione',
                'commerciale'=>'Commerciale',
            ],
            ])
            ->add('messaggio', TextareaType::class,[])
            ->add('privacy', CheckboxType::class, ['required' => true,])
            ->add('newsletter', CheckboxType::class, ['required' => false,'data' => false,])
            ->add('messaggio', TextareaType::class,[])
            ->add('save', SubmitType::class);
        }
    
    }