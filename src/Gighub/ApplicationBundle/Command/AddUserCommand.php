<?php

namespace Gighub\ApplicationBundle\Command;

use Gighub\ApplicationBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class AddUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('gighub:adduser')
            ->setDescription('Add a user to gighub via email address')
            ->addArgument('email', InputArgument::OPTIONAL, 'Who do you want to add (email)?')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $user = new User();
        $user->setEmail($input->getArgument("email"));

        $validator = $this->getContainer()->get("validator");
        $violations = $validator->validate($user);
        if(count($violations) > 0)
        {
            $output->writeln((string)$violations);
            return;
        }

        $entityManager = $this->getContainer()->get("doctrine.orm.entity_manager");
        $entityManager->persist($user);
        $entityManager->flush();

        $text = $input->getArgument("email")." added";

        $output->writeln($text);
    }
}
