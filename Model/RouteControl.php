<?php
/**
 * Created by PhpStorm.
 * User: Tarek Rjili
 * Date: 2/24/15
 * Time: 3:14 PM
 */
namespace TRJ\RoutingControlBundle\Model;

class RouteControl extends \ArrayObject
{

    /** @var string */
    private $name;

    /** @var  string */
    private $target;

    /** @var  DateTime */
    private $enabledFrom;

    /** @var  DateTime */
    private $enabledTo;

    /** @var  bool */
    private $enabled;

    public function __construct() {}

    /**
     * @return boolean
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return DateTime
     */
    public function getEnabledFrom()
    {
        return $this->enabledFrom;
    }

    /**
     * @param DateTime $enabledFrom
     */
    public function setEnabledFrom($enabledFrom)
    {
        $this->enabledFrom = $enabledFrom;
    }

    /**
     * @return DateTime
     */
    public function getEnabledTo()
    {
        return $this->enabledTo;
    }

    /**
     * @param DateTime $enabledTo
     */
    public function setEnabledTo($enabledTo)
    {
        $this->enabledTo = $enabledTo;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }
} 