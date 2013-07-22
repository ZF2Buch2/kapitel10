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
namespace Pizza\Doctrine;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pizza entity
 *
 * @package Pizza
 *         
 * @ORM\Entity
 * @ORM\Table(name="pizzas")
 * @property string $name
 * @property string $price
 * @property int $id
 */
class PizzaEntity
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
    protected $price;
    
    /**
     * @ORM\OneToOne(targetEntity="CrustEntity")
     * @ORM\JoinColumn(name="crust_id", referencedColumnName="id")
     **/
    private $crust;

    /**
     * @ORM\ManyToMany(targetEntity="ToppingEntity")
     * @ORM\JoinTable(name="pizzas_toppings",
     *      joinColumns={
     *          @ORM\JoinColumn(name="pizza_id", referencedColumnName="id")
     *      },
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(
     *              name="topping_id", referencedColumnName="id", unique=true
     *          )
     *      }
     * )
     **/
    private $toppings;
    
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
        $data = array(
            'id'       => $this->id,
            'name'     => $this->name,
            'price'    => $this->price,
            'crust'    => $this->crust->getArrayCopy(),
            'toppings' => array(),
        );
        
        foreach ($this->toppings as $topping) {
            $data['toppings'][] = $topping->getArrayCopy();
        }
        
        return $data;
    }

    /**
     * Populate from an array.
     *
     * @param array $data            
     */
    public function populate ($data = array())
    {
        $this->id       = $data['id'      ];
        $this->name     = $data['name'    ];
        $this->price    = $data['price'   ];
        $this->crust    = $data['crust'   ];
        $this->toppings = $data['toppings'];
    }
}
