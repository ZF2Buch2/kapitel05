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
namespace Pizza\Service;

use Pizza\Model\Order;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\Math\Rand;

/**
 * Pizza order service
 * 
 * @package    Pizza
 */
class OrderService implements EventManagerAwareInterface
{
    protected $events;

    public function setEventManager(EventManagerInterface $events)
    {
        $events->setIdentifiers(array(
            __CLASS__,
            get_called_class(),
        ));
        $this->events = $events;
        return $this;
    }

    public function getEventManager()
    {
        if (null === $this->events) {
            $this->setEventManager(new EventManager());
        }
        return $this->events;
    }
    
    public function saveOrder(Order $order)
    {
        $order->id = Rand::getInteger(100000, 999999);
        
        $this->getEventManager()->trigger('preOrder', __CLASS__);
        
        $filePath = realpath(LUIGI_ROOT . '/data/order') . '/';
        $fileName = $filePath . $order->id . '.txt';
        file_put_contents($fileName, serialize($order));
        
        echo "Save order " . $order->id . "<br />";
        
        $this->getEventManager()->trigger('postOrder', __CLASS__);
    }
}
