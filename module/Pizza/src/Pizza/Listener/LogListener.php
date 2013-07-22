<?php
/**
 * ZF2 Buch Kapitel 10
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

use Zend\Db\TableGateway\Feature\EventFeature\TableGatewayEvent;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

/**
 * Log listener
 * 
 * Listens on tablegateway feature event level
 * 
 * @package    Pizza
 */
class LogListener implements ListenerAggregateInterface
{
    /**
     * @var Logger
     */
    protected $logger = null;

    /**
     * @var \Zend\Stdlib\CallbackHandler[]
     */
    protected $listeners = array();

    /**
     * Initialize Logger
     */
    public function __construct($file)
    {
        $this->logger = new Logger();
        $this->logger->addWriter(new Stream($file));
    }
    
    /**
     * Attach to an event manager
     *
     * @param  EventManagerInterface $events
     * @param  integer $priority
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach('postInitialize', array($this, 'logPostInitialize'));
        $this->listeners[] = $events->attach('postInsert', array($this, 'logPostInsert'));
        $this->listeners[] = $events->attach('postDelete', array($this, 'logPostDelete'));
    }

    /**
     * Detach all our listeners from the event manager
     *
     * @param  EventManagerInterface $events
     * @return void
     */
    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    /**
     * Listen to the "postInitialize" event and log it
     *
     * @param  TableGatewayEvent $e
     * @return null
     */
    public function logPostInitialize(TableGatewayEvent $e)
    {
        $this->logger->log(
            Logger::INFO, 
            'TableGateway für Tabelle "' . $e->getTarget()->getTable() 
                . '" initialisiert'
        );
    }

    /**
     * Listen to the "postInsert" event and log it
     *
     * @param  TableGatewayEvent $e
     * @return null
     */
    public function logPostInsert(TableGatewayEvent $e)
    {
        $driver = $e->getTarget()->getAdapter()->getDriver();
        $params = $e->getParam('statement')->getParameterContainer();
        $id     = $driver->getLastGeneratedValue();
        
        $this->logger->log(
            Logger::INFO, 
            '"' . $params->offsetGet('name') . '" mit ID "' . $id 
                . '" in Tabelle "' . $e->getTarget()->getTable() 
                . '" eingefügt'
        );
    }

    /**
     * Listen to the "postDelete" event and log it
     *
     * @param  TableGatewayEvent $e
     * @return null
     */
    public function logPostDelete(TableGatewayEvent $e)
    {
        $params = $e->getParam('statement')->getParameterContainer();
        
        $this->logger->log(
            Logger::INFO, 
            'Datensatz mit ID "' . $params->offsetGet('where1') 
                . '" aus Tabelle "' . $e->getTarget()->getTable() 
                . '" gelöscht'
        );
    }
}
