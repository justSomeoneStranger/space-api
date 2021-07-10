<?php
declare(strict_types=1);

namespace App\Controller ;
use App\Entity\Event;

class EventTablee 
{
    public function __invoke(Event $data): Event
    {
        dd($data) ;
        return $data ;
    
    }





}