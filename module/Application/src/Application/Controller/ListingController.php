<?php
/**
 * ZF2 Buch Kapitel 10
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Application
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
     * Show listing 10.01
     */
    public function listing1001Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.02
     */
    public function listing1002Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.03
     */
    public function listing1003Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.04
     */
    public function listing1004Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.05
     */
    public function listing1005Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.06
     */
    public function listing1006Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.07
     */
    public function listing1007Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.08
     */
    public function listing1008Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.09
     */
    public function listing1009Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.10
     */
    public function listing1010Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.11
     */
    public function listing1011Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.12
     */
    public function listing1012Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.13
     */
    public function listing1013Action()
    {
        return new ViewModel();
    }
    
    /**
     * Show listing 10.14
     */
    public function listing1014Action()
    {
        return new ViewModel();
    }

    /**
     * Show listing 10.15
     */
    public function listing1015Action()
    {
        return new ViewModel();
    }

    /**
     * Show listing 10.16
     */
    public function listing1016Action()
    {
        return new ViewModel();
    }

    /**
     * Show listing 10.17
     */
    public function listing1017Action()
    {
        return new ViewModel();
    }

    /**
     * Show listing 10.18
     */
    public function listing1018Action()
    {
        return new ViewModel();
    }

    /**
     * Show listing 10.19
     */
    public function listing1019Action()
    {
        return new ViewModel();
    }

    /**
     * Show listing 10.20
     */
    public function listing1020Action()
    {
        return new ViewModel();
    }

    /**
     * Show listing 10.21
     */
    public function listing1021Action()
    {
        return new ViewModel();
    }

    /**
     * Show listing 10.22
     */
    public function listing1022Action()
    {
        return new ViewModel();
    }
}
