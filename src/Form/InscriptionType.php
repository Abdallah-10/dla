<?php

namespace App\Form;

use App\Entity\Domaines;
use App\Entity\Inscription;
use App\Entity\Ministere;
use Karser\Recaptcha3Bundle\Form\Recaptcha3Type;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder,array $options): void
    {
        
        $builder
            ->add('name',TextType::class,[
                'label' => 'Nom',
            ])
			->add('lastname',TextType::class,[
                'label' => 'Prénom',
            ])
            ->add('email',EmailType::class,[
			    'label' => 'Email *',
                'disabled'   => true,
            ])
            ->add('organisme',EntityType::class, [
                'label' =>'Organisme ',
                'class' => Domaines::class,
                'choice_label' => 'categorie',
                'required'=>true,
                ])
            ->add('genre',ChoiceType::class,[
                'label' =>'Genre',
                'required'=>true,
                'placeholder' => 'Genre',
                'choices'=>[
                            'Homme' => 'Homme',
                            'Femme' => 'Femme',
                        ],
            ])
            ->add('age',DateType::class,[
                'label' =>'Date de naissance',
                'widget' => 'single_text',
                'required'=>false,
            ])
            ->add('phone',NumberType::class,[
                'label' => 'Téléphone portable',
                'required'=>true,
            ])
			->add('identifiant',NumberType::class,[
                'label' => 'Identifiant unique (CNSS/CNRPS)',
                'required'=>true,
            ])
            ->add('gouvernorat',ChoiceType::class,[
                'label' =>'Gouvernorat de travail',
                'placeholder' => 'Gouvernorat de travail',
                'choices'=>[
                            'Ariana' => 'Ariana',
                            'Béja' => 'Béja',
                            'Ben Arous' => 'Ben Arous',
                            'Bizerte' => 'Bizerte',
                            'Gabès' => 'Gabès',
                            'Gafsa' => 'Gafsa',
                            'Jendouba' => 'Jendouba',
                            'Kairouan' => 'Kairouan',
                            'Kasserine' => 'Kasserine',
                            'Kébili' => 'Kébili',
                            'ElKef' => 'ElKef',
                            'Mahdia' => 'Mahdia',
                            'Manouba' => 'Manouba',
                            'Médenine' => 'Médenine',
                            'Monastir' => 'Monastir',
                            'Nabeul' => 'Nabeul',
                            'Sfax' => 'Sfax',
                            'Sidi Bouzid' => 'Sidi Bouzid',
                            'Siliana' => 'Siliana',
                            'Sousse' => 'Sousse',
                            'Tataouine' => 'Tataouine',
                            'Tozeur' => 'Tozeur',
                            'Tunis' => 'Tunis',
                            'Zaghouan' => 'Zaghouan',
                        ],
                        'required'=>true,
            ])
            ->add('ministere',EntityType::class, [
                    'class' => Ministere::class,
                    'label' => 'Ministère',
                    'choice_label' => 'name',
                    'required'=>true,
            ])
            
             ->add('poste',ChoiceType::class,[
                'label' =>'Niveau de responsabilité',
                'placeholder' => 'Niveau de responsabilité',
                'required'=>true,
                'choices'=>[
                            'Directeur Général, Directeur Central...' => ' Directeur Général, Directeur Central...',
                            'Directeur ou équivalent' => 'Directeur ou équivalent',
                            'Sous-Directeur ou équivalent' => 'Sous-Directeur ou équivalent',
                            'Chef service ou équivalent' => 'Chef service ou équivalent',
							'Sans fonction' => 'Sans fonction',							
                        ],
            ])
            ->add('niveau',ChoiceType::class,[
                'label' =>'Niveau académique',
                'required'=>true,
                'placeholder' => 'Niveau académique',
                'choices'=>[
                            'Bac' => 'Bac',
                            'Licence ou équivalent' => 'Licence ou équivalent',
                            'Master ou équivalent' => 'Master ou équivalent',
							'Ingénieur ou équivalent' => 'Ingénieur ou équivalent',
							'Doctorat ou équivalent' => 'Doctorat ou équivalent',
							'Autres'=>'Autres'
                        ],
            ])
            ->add('grade',ChoiceType::class,[
                'label' =>'Catégories de grade',
                'required'=>true,
                'placeholder' => 'Grade',
                'choices'=>[
                            'Cadre' => 'Cadre',
                            'Exécution' => 'Exécution',
                            'Maîtrise' => 'Maîtrise',
                            
                        ],
            ])
           
			
            ->add('recaptcha', Recaptcha3Type::class)
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Inscription::class,
        ]);
    }
}
