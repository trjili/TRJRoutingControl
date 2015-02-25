<?php
/**
 * Created by PhpStorm.
 * User: Tarek Rjili
 * Date: 2/24/15
 * Time: 3:14 PM
 */

class RouteControl
{

    /** @var string */
    private $routeName;

    /** @var  string */
    private $routeTargetName;

    /** @var  DateTime */
    private $enabledFrom;

    /** @var  DateTime */
    private $enabledTo;

    /** @var  bool */
    private $enabled;

    /** @var  bool */
    private $useRedirect;

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
    public function getRouteName()
    {
        return $this->routeName;
    }

    /**
     * @param string $routeName
     */
    public function setRouteName($routeName)
    {
        $this->routeName = $routeName;
    }

    /**
     * @return string
     */
    public function getRouteTargetName()
    {
        return $this->routeTargetName;
    }

    /**
     * @param string $routeTargetName
     */
    public function setRouteTargetName($routeTargetName)
    {
        $this->routeTargetName = $routeTargetName;
    }

} 