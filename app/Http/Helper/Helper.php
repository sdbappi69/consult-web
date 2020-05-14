<?php

use Spatie\Permission\Models\Role;

function allRoles(){
    return Role::pluck('name','name')->toArray();
}

function allServices(){
    return \App\Service::where('status',1)->pluck('name','id')->toArray();
}

function allCategories(){
    return \App\Category::where('status',1)->pluck('name','id')->toArray();
}

function availableSlot($data){
    $attributes = json_decode($data->attributes);
    $slot = $attributes->available_slots;
    $booked_slot = $attributes->booked_slots;
    $newarray = array_filter($slot, function($var) use($booked_slot){
        foreach ($booked_slot as $booked){
            return ($var->start != $booked->start);
        }
    });
    return $newarray;
}
