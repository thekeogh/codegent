<?php

namespace App\Services\Admin;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Route;

class Admin
{
    
    /**
     * Get the index path for a listing resource
     * 
     * @param  array  $params The params to send it (generally the id)
     * @return string
     */
    public function getIndexPath()
    {
        return route($this->getActionPrefix() . '.index');
    }
    
    /**
     * Get the create path for a listing resource
     * 
     * @param  array  $params The params to send it (generally the id)
     * @return string
     */
    public function getCreatePath()
    {
        return route($this->getActionPrefix() . '.create');
    }
    
    /**
     * Get the store path for a listing resource
     * 
     * @param  array  $params The params to send it (generally the id)
     * @return string
     */
    public function getStorePath()
    {
        return route($this->getActionPrefix() . '.store');
    }
    
    /**
     * Get the edit path for a listing resource
     * 
     * @param  array  $params The params to send it (generally the id)
     * @return string
     */
    public function getEditPath($params = [])
    {
        return route($this->getActionPrefix() . '.edit', $params);
    }
    
    /**
     * Get the update path for a listing resource
     * 
     * @param  array  $params The params to send it (generally the id)
     * @return string
     */
    public function getUpdatePath($params = [])
    {
        return route($this->getActionPrefix() . '.update', $params);
    }
    
    /**
     * Get the destory path for a listing resource
     * 
     * @param  array  $params The params to send it (generally the id)
     * @return string
     */
    public function getDestroyPath($params = [])
    {
        return route($this->getActionPrefix() . '.destroy', $params);
    }
    
    /**
     * Gets the 'as' from the route and returns the prefix to bind the other actions to
     * 
     * @return string
     */
    private function getActionPrefix()
    {
        return head(explode('.', Route::getCurrentRoute()->getAction()['as']));
    }
    
}