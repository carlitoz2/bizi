<?php

class FlashBag
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }

        // Do we have already a flash bag ?
        if(array_key_exists('flash-bag', $_SESSION) == false)
        {
            // No, create it.
            $_SESSION['flash-bag'] = array();
        }
    }


     /**
     * Ajoute un message dans le flash-bag
     * 
     * @param string $message contenu du message.

     */
    public function add($message)
    {
        // Add the specified message at the end of the flash bag.
        array_push($_SESSION['flash-bag'], $message);
    }
     /**
     *Récupère le dernier message dans le flash-bag et le supprime
     * 
     * @param void

     */
    public function fetchMessage()
    {
        // Consume the oldest flash bag message.
        return array_shift($_SESSION['flash-bag']);
    }
     /**
     *Récupère les message dans le flash-bag et les supprime
     * 
     * @param void

     */
    public function fetchMessages()
    {
        // Consume all the flash bag messages.
        $messages = $_SESSION['flash-bag'];

        // The flash bag is now empty.
        $_SESSION['flash-bag'] = array();

        return $messages;
    }
     /**
     *Vérifie la présence de messages dans le flash-bag.
     * 
     * @param void

     */
    public function hasMessages()
    {
        return empty($_SESSION['flash-bag']) == false;
    }
}