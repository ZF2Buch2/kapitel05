<?php
/**
 * ZF2 Buch Kapitel 5
 * 
 * Das Buch "Zend Framework 2 - Das Praxisbuch"
 * von Ralf Eggert ist im Galileo-Computing Verlag erschienen. 
 * ISBN 978-3-8362-2610-3
 * 
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.galileocomputing.de/3460
 */

/**
 * namespace definition and usage
 */
namespace Pizza\Listener;

use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

/**
 * Pizza order listener
 * 
 * @package    Pizza
 */
class OrderListener implements ListenerAggregateInterface
{
    protected $listeners = array();
    
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(
            'postOrder', array($this, 'sendConfirmation'), 300
        );
        $this->listeners[] = $events->attach(
            'postOrder', array($this, 'updateStock'), 100
        );
        $this->listeners[] = $events->attach(
            'postOrder', array($this, 'bakePizza'), 200
        );
        $this->listeners[] = $events->attach(
            'preOrder', array($this, 'checkStock'), 100
        );
    }
    
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }
    
    public function sendConfirmation(EventInterface $e)
    {
        echo "Send order confirmation<br />";
    }
    
    public function updateStock(EventInterface $e)
    {
        echo "Update stock<br />";
    }
    
    public function bakePizza(EventInterface $e)
    {
        echo "Bake the pizza<br />";
    }
    
    public function checkStock(EventInterface $e)
    {
        echo "Check stock<br />";
    }
}
