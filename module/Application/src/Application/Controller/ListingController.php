<?php
/**
 * ZF2 Buch Kapitel 5
 * 
 * Das Buch "Zend Framework 2 - Das Praxisbuch"
 * von Ralf Eggert ist im Galileo-Computing Verlag erschienen. 
 * ISBN 978-3-8362-2610-3
 * 
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.galileocomputing.de/3460
 */

/**
 * namespace definition and usage
 */
namespace Application\Controller;

use Zend\Debug\Debug;
use Zend\EventManager\EventManager;
use Zend\EventManager\SharedEventManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pizza\Listener\OrderListener;
use Pizza\Model\Order;
use Pizza\Service\OrderService;

/**
 * Listing controller
 * 
 * Shows and executes the listings
 * 
 * @package    Application
 */
class ListingController extends AbstractActionController
{
    /**
     * Redirects to homepage
     */
    public function indexAction()
    {
        return $this->redirect()->toRoute('home');
    }
    
    /**
     * Show listing 05.01
     */
    public function listing0501Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 05.02
     */
    public function listing0502Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 05.03
     */
    public function listing0503Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 05.04
     */
    public function listing0504Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 05.05
     */
    public function listing0505Action()
    {
        return new ViewModel();
    }
}
