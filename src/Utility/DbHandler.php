<?php 
namespace App\Utility;

use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use Monolog\Handler\AbstractProcessingHandler;

class DbHandler extends AbstractProcessingHandler 
{

    private $manager;
    public function __construct(EntityManagerInterface $manager)
    {
        parent::__construct();
        $this->manager = $manager;
    }

    protected function write(array $record): void
    {
        // on envoi le log en database
        $log = new Log();
        $log->setContext($record['context'])
            ->setLevel($record['level'])
            ->setLevelName($record['level_name'])
            ->setMessage($record['message'])
            ;

        $this->manager->persist($log);
        $this->manager->flush();    
        
    }

}


