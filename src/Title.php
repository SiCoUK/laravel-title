<?php
namespace SiCoUK\LaravelTitle;

class Title
{
    protected $title = [];
    protected $pageTitle;
    
    protected $seperator = ' - ';
    
    /**
     * Add a title to the title collection
     *
     * @param $item
     * @return mixed
     */
    public function add($item, $setAsPageTitle = false)
    {
        if (is_array($item)) {
            return array_map([$this, 'add'], $item);
        }
        if (!$item | strlen(trim($item)) === 0) {
            return false;
        }
        $this->title[] = trim(strip_tags($item));
        
        if ($setAsPageTitle) {
            $this->setPageTitle($item);
        }
    }
    
    /**
     * Return the last entry in the collection as the current page title
     * 
     * @return string
     */
    public function getPageTitle()
    {
        if (!empty($this->pageTitle)) {
            return $this->pageTitle;
        }
        
        if (empty($this->title)) {
            // Return the default app name
            return \config::get('app.name');
        }
        
        return array_pop($this->title);
    }
    
    /**
     * Set the specific page title
     * 
     * @param string $title
     */
    public function setPageTitle($title)
    {
        $this->pageTitle = $title;
    }
    
    /**
     * Set the title seperator
     * 
     * @param string $seperator
     */
    public function setSeperator($seperator)
    {
        $this->seperator = $seperator;
    }
    
    /**
     * Retrieve the full title
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->toString();
    }
    
    /**
     * Return the full title as a string
     * 
     * @return string
     */
    public function toString()
    {
        if (empty($this->title)) {
            // Return the default app name
            return \config::get('app.name');
        }
        
        // Add the app title to the begining
        $title = array_merge([\config::get('app.name')], $this->title);
        
        // Reverse the array for the page title
        $title = array_reverse($title);
        
        return implode($this->seperator, $title);
    }
    
    /**
     * Return the full title as a string
     * 
     * @return string
     */
    public function __toString() {
        return $this->toString();
    }
}