<?php

namespace App\Core;

class Session
{


    public function start(): void{

        if( session_status() === PHP_SESSION_NONE) {
            
            session_start();

        } 
        

    }

    public function set(string $key, mixed $value): void {

        $this -> start();

        $_SESSION[$key] = $value;

    }

    public function get(string $key) {

        if(isset($_SESSION[$key])){

            return $_SESSION[$key];

        }

        return null;

    
    }

    public function has(string $key): bool {

        return isset($_SESSION[$key]);

    }


    public function remove(string $key): void{

        if(isset($_SESSION[$key])) {

            unset($_SESSION[$key]);

        }

    }


    public function destroy(): void{
        
        session_destroy();

    }
};