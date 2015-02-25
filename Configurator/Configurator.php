<?php
/**
 * User: tarek rjili
 * Date: 2/24/15
 * Time: 9:52 AM
 */

namespace TRJ\RoutingControlBundle\Configurator;
use Symfony\Component\Yaml\Yaml;

class Configurator
{
    /** @var string  */
    protected $filename;

    /** @var array  */
    protected $routes;

    public function __construct($filename)
    {
        $this->filename = $filename;
        $this->routes = $this->read();
    }

    /**
     * @return bool
     */
    public function isFileWritable()
    {
        return is_writable($this->filename);
    }

    public function clean()
    {
        if (file_exists($this->getCacheFilename())) {
            @unlink($this->getCacheFilename());
        }
    }

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param array $routes
     */
    public function mergeRoutes($routes)
    {
        $this->routes = array_merge($this->routes, $routes);
    }

    /**
     * Renders parameters as a string.
     *
     * @param int $expanded
     *
     * @return string
     */
    public function render($expanded = 0)
    {
        return Yaml::dump(array('routes' => $this->routes), $expanded);
    }
    /**
     * Writes parameters to parameters.yml or temporary in the cache directory.
     *
     * @param int $expanded
     *
     * @return int
     */
    public function write($expanded = 0)
    {
        $filename = $this->isFileWritable() ? $this->filename : $this->getCacheFilename();
        return file_put_contents($filename, $this->render($expanded));
    }
    /**
     * Reads parameters from file.
     *
     * @return array
     */
    protected function read()
    {
        $filename = $this->filename;
        if (!$this->isFileWritable() && file_exists($this->getCacheFilename())) {
            $filename = $this->getCacheFilename();
        }
        $ret = Yaml::parse($filename);
        if (false === $ret || array() === $ret) {
            throw new \InvalidArgumentException(sprintf('The %s file is not valid.', $filename));
        }

        if (isset($ret['routes']) && is_array($ret['routes'])) {
            return $ret['routes'];
        } else {
            return array();
        }
    }
    /**
     * getCacheFilename
     *
     * @return string
     */
    protected function getCacheFilename()
    {
        return dirname($this->filename).'/cache/routing_control.yml';
    }
}
