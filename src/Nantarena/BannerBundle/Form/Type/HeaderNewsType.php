<?php

namespace Nantarena\BannerBundle\Form\Type;

use Nantarena\BannerBundle\Entity\HeaderNews;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HeaderNewsType extends AbstractType
{
    protected $active;

    function __construct($active=true) {
        $this->active = $active;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('content', 'textarea', array(
                'label' => 'banner.admin.headernews.form.label_content',
                'attr' => array(
                    'class' => 'input-block-level follow_content',
                    'rows' => 10,
                )
            ));

        if($this->active)
        {
            $builder
                ->add('active', 'checkbox', array(
                    'label'     => 'banner.admin.headernews.form.label_active',
                    'required'  => false,
                ));
        }

        $builder->add('save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Nantarena\BannerBundle\Entity\HeaderNews'
        ));
    }

    // public function setActive($val)
    // {
    //     $this->active = $val;
    // }

    public function getName()
    {
        return 'nantarena_bannerbundle_headernewstype';
    }
}