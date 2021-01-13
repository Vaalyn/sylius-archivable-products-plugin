<?php

declare(strict_types=1);

namespace VaaChar\SyliusArchivableProductsPlugin\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use VaaChar\SyliusArchivableProductsPlugin\Entity\IsArchivableProductInterface;

final class ArchivableType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('archivedAt', DateTimeType::class)
            ->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
                /** @var IsArchivableProductInterface $archivable */
                $archivable = $event->getData();

                $archivedAt = null;
                if (null === $archivable->getArchivedAt()) {
                    $archivedAt = new \DateTime();
                    $archivable->setEnabled(false);
                }

                $archivable->setArchivedAt($archivedAt);

                $event->setData($archivable);
            })
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix(): string
    {
        return 'sylius_archivable';
    }
}
