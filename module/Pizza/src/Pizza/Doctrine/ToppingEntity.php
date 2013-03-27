<?php
/**
 * ZF2 Buch Kapitel 10
 * 
 * Das Buch "Zend Framework 2 - Von den Grundlagen bis zur fertigen Anwendung"
 * von Ralf Eggert ist im Addison-Wesley Verlag erschienen. 
 * ISBN 978-3-8273-2994-3
 * 
 * @package    Pizza
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.awl.de/2994
 */

/**
 * namespace definition and usage
 */
namespace Pizza\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topping entity
 *
 * @package Pizza
 *         
 * @ORM\Entity
 * @ORM\Table(name="toppings")
 * @property string $name
 * @property string $costs
 * @property int $id
 */
class ToppingEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $costs;
    
    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property            
     * @return mixed
     */
    public function __get ($property)
    {
        return $this->$property;
    }

    /**
     * Magic setter to save protected properties.
     *
     * @param string $property            
     * @param mixed $value            
     */
    public function __set ($property, $value)
    {
        $this->$property = $value;
    }

    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy ()
    {
        return array(
            'id'    => $this->id,
            'name'  => $this->name,
            'costs' => $this->costs,
        );
    }

    /**
     * Populate from an array.
     *
     * @param array $data            
     */
    public function populate ($data = array())
    {
        $this->id    = $data['id'   ];
        $this->name  = $data['name' ];
        $this->costs = $data['costs'];
    }
}
