<?php

namespace Atimmer\Tools\Commands;

use DateTime;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;

class SplitInterval extends Command
{
    public function configure()
    {
        $this->setName("split-interval")
            ->setDescription('Splits interval into evenly devided chunks');

        $this->addArgument('chunks', InputArgument::REQUIRED)
            ->addArgument('start', InputArgument::REQUIRED)
            ->addArgument('end', InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $consoleLogger = new ConsoleLogger($output);

        date_default_timezone_set( 'Europe/Amsterdam' );

        $chunks = $input->getArgument('chunks');
        $start = strtotime( $input->getArgument('start') );
        $end = strtotime( $input->getArgument('end') );

        $consoleLogger->info('Timestamp start: ' . $start);
        $consoleLogger->info('Timestamp end: ' . $end);

        $diff = $end - $start;
        $chunk_size = $diff / $chunks;

        for ( $i = $start + $chunk_size; $i <= $end; $i += $chunk_size ) {

            $date = new DateTime();
            $date->setTimestamp( $i );

            echo $date->format( 'd F Y' ) . " - " . $date->format( 'd/m/y' ) . "\n";
        }
    }
}