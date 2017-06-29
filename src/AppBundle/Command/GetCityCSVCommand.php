<?php

namespace AppBundle\Command;

use AppBundle\Entity\CommunesFr;
use AppBundle\GetCSV;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;

class GetCityCSVCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('perso:getCSV')
            ->setDescription('Get CSV with all french\'s cities name, PostalCode, INSEE number and GPS coordinates')
            ->setHelp('Run this command to get a CSV, parse it and add informations to your dataBase.')
            ->addArgument('file', InputArgument::REQUIRED, ' What is the name of your file?')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Import of your CSV start');

        $csvParse = new getCSV();
        //print($input->getArgument('file'));
        $csvParseGo = $csvParse->getCSV($input->getArgument('file'));

        $progressBar = new ProgressBar($output, count($csvParseGo));
        $progressBar->start();
        $progressBar->setRedrawFrequency(100);
        $progressBar->setFormat('debug');
        $em = $this->getContainer()->get('doctrine')->getManager();

        $i = 0;
       foreach ($csvParseGo as $cityInfo)
       {
           if(is_numeric($cityInfo[0])) {
               $city = new CommunesFr();
               $city->setInseeNumber($cityInfo[0]);
               $city->setName($cityInfo[1]);
               $city->setPostalCode($cityInfo[2]);
               $city->setGpsData($cityInfo[5]);


               $em->persist($city);
               $i++;
               $progressBar->advance();
               $progressBar->setMessage('Import in progress..please waiting...');

               if($i == 20){
                   $em->flush();
                   $i = 0;
               }
           }

       }
        $em->flush();
        $progressBar->finish();

        $argument = $input->getArgument('argument');

        if ($input->getOption('option')) {
            // ...
        }
        $output->writeln(' Import complete.');
    }

}
