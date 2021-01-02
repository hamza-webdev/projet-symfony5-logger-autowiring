<?php

namespace App\Controller;

// use Psr\Log\LoggerInterface; 
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class HomeController extends AbstractController
{

    private $logger;

    /**
     * Undocumented function
     *
     * @param \Psr\Log\LoggerInterface $dbLogger
     */
    public function __construct(LoggerInterface $dbLogger)
    {
        $this->logger = $dbLogger;
    }

    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
       $this->logger->warning("Notre premier log service dbHandler a tester !! ");
        $this->logger->info('I just got the logger');
        $this->logger->error('An error occurred');

        $this->logger->critical('I left the oven on!', [
            // include extra "context" info in your logs
            'cause' => 'in_hurry',
        ]);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HomeController.php',
        ]);
    }
}
