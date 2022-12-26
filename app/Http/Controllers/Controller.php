<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index(){
        $clients = json_decode(file_get_contents('data/clients.json'));
        $filters = array(
            'applicable' => 'no',
            'City' => ['data' => [] , 'args' => json_decode(file_get_contents('data/cities.json')) , 'name' => 'city'],
            'State' => ['data' => [] , 'args' => json_decode(file_get_contents('data/states.json')) , 'name' => 'state'],
            'Country' => ['data' => [] , 'args' => json_decode(file_get_contents('data/countries.json')) , 'name' => 'country'],
        );
        return view('/list' , [
            'clients' => $clients ,
            'filters' => $filters ,
        ]);
    }

    public function filter(){
        $clients = json_decode(file_get_contents('data/clients.json'));
        $total = count($clients);
        for ($i=0; $i < $total; $i++) {
            foreach ($clients[$i] as $key => $value) {
                if ($key == 'id'){
                    if (request('id') != null && request('id') != ''){
                        if ($value == request('id')){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'year'){
                    if (request('year') != null && request('year') != ' '){
                        if ($value == request('year')){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'client_id'){
                    if (request('client_id') != null && request('client_id') != ' '){
                        if ($value == request('client_id')){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'name'){
                    if (request('name') != null && request('name') != ''){
                        if ($value == request('name')){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'address_1'){
                    if (request('address_1') != null && request('address_1') != ' '){
                        if ($value == request('address_1')){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'address_2'){
                    if (request('address_2') != null && request('address_2') != ' '){
                        if ($value == request('address_2')){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'city'){
                    if (request('city') != null && request('city') != ' '){
                        if (in_array($value , request('city')) ){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'state'){
                    if (request('state') != null && request('state') != ' '){
                        if (in_array($value , request('state')) ){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'zip'){
                    if (request('zip') != null && request('zip') != ' '){
                        if ($value == request('zip')){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'country'){
                    if (request('country') != null && request('country') != ' '){
                        if (in_array($value , request('country')) ){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
                if ($key == 'created_date'){
                    if (request('created_date') != null && request('created_date') != ' '){
                        if ($value == request('created_date')){
                        }
                        else{
                            unset($clients[$i]);
                        }
                    }
                }
            }
        }
        $cities = json_decode(file_get_contents('data/cities.json'));
        for ($i=0; $i < count($cities); $i++) { 
            if (request('city')){
                if (in_array($cities[$i]->city,request('city') ?? [])){
                    unset($cities[$i]);
                }
            }
        }
        $states = json_decode(file_get_contents('data/states.json'));
        for ($i=0; $i < count($states); $i++) { 
            if (request('state')){
                if (in_array($states[$i]->state,request('state') ?? [])){
                    unset($states[$i]);
                }
            }
        }
        $countries = json_decode(file_get_contents('data/countries.json'));
        for ($i=0; $i < count($countries); $i++) {
            if (request('country')){
                if (in_array($countries[$i]->country,request('country'))){
                    unset($countries[$i]);
                }
            }
        }
        $filters = array(
            'applicable' => 'yes',
            'City' => ['data' => request('city') ?? [] , 'field' => 'dropdown' , 'args' => $cities , 'name' => 'city'],
            'State' => ['data' => request('state') ?? [] , 'field' => 'dropdown' , 'args' => $states , 'name' => 'state'],
            'Country' => ['data' => request('country') ?? [] , 'field' => 'dropdown' , 'args' => $countries , 'name' => 'country'],
            'Created_Date' => ['data' => request('created_date') , 'field' => 'daterange' , 'name' => 'created_date' , 'custom' => ''],
            'Zip' => ['data' => request('zip') , 'field' => 'text' , 'name' => 'zip' , 'custom' => ''],
            'ID' => ['data' => request('id') , 'field' => 'number' , 'name' => 'id' , 'custom' => ''],
            'Year' => ['data' => request('year') , 'field' => 'number' , 'name' => 'year' , 'custom' => 'min="2000" max="2030" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="4"'],
            'Client_ID' => ['data' => request("client_id") , 'field' => 'number' , 'name' => 'client_id' , 'custom' => ''],
            'Name' => ['data' => request("name") , 'field' => 'text' , 'name' => 'name' , 'custom' => ''],
            'Address' => ['data' => request("address") , 'field' => 'text' , 'name' => 'address' , 'custom' => ''],
        );
        return view('list' , [
            'clients' => $clients ,
            'filters' => $filters ,
        ]);
    }
}
