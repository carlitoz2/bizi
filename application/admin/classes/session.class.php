<?php

class Session
{
    /**
     * Writes a value to the current session data.
     * 
     * @param string $key String identifier.
     * @param mixed $value Single value or array of values to be written.
     * @return mixed Value or array of values written.
     *
     */
    public function write($key, $value)
    {
        if ( !is_string($key) ){
            echo 'La clé doit être une chaîne';
            exit();
        }
        $_SESSION[$key] = $value;
        return $value;
    }
    
    /**
     * Alias for {@link Session::write()}.
     * 
     * @see Session::write()
     * @param string $key String identifier.
     * @param mixed $value Single value or array of values to be written.
     * @return mixed Value or array of values written.
     */
    public function w($key, $value)
    {
        return self::write($key, $value);
    }
    
    /**
     * Reads a specific value from the current session data.
     * 
     * @param string $key String identifier.
     * @param boolean $child Optional child identifier for accessing array elements.
     * @return mixed Returns a string value upon success.  Returns false upon failure.
     */
    public static function read($key, $child = false)
    {
        if ( !is_string($key) ){
            echo 'La clé doit être une chaîne';
            exit();
        }
        if (isset($_SESSION[$key]))
        {            
            if (false == $child)
            {
                return $_SESSION[$key];
            }
            else
            {
                if (isset($_SESSION[$key][$child]))
                {
                    return $_SESSION[$key][$child];
                }
            }
        }
        return false;
    }
    
    /**
     * Alias for {@link Session::read()}.
     * 
     * @see Session::read()
     * @param string $key String identifier.
     * @param boolean $child Optional child identifier for accessing array elements.
     * @return mixed Returns a string value upon success.  Returns false upon failure.
     */
    public static function r($key, $child = false)
    {
        return self::read($key, $child);
    }
    
    /**
     * Deletes a value from the current session data.
     * 
     * @param string $key String identifying the array key to delete.
     * @return void
     */
    public static function delete($key)
    {
        if ( !is_string($key) ){
            echo 'La clé doit être une chaîne';
            exit();
        }
       
        unset($_SESSION[$key]);
    }
    
    /**
     * Alias for {@link Session::delete()}.
     * 
     * @see Session::delete()
     * @param string $key String identifying the key to delete from session data.
     * @return void
     */
    public static function d($key)
    {
        self::delete($key);
    }
    
    /**
     * Echos current session data.
     * 
     * @return void
     */
    public static function dump()
    {
        echo nl2br(print_r($_SESSION));
    }
    /**
     * Starts  a session .
     * 
     *
     * @return boolean Returns true upon success and false upon failure.
     */

    public static function start()
    {
        session_start();
    }
}