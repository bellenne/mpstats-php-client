<?
namespace Bellenne\MpStats\Config;

class Links{
   public static $ChoosingNicheLinksWb = [
    'select'=>[
        'endpoint'=>'wb/get/subjects/select',
        'method'=>'GET',
        'description'=>'Getting a list of items'
    ],
    'subject'=>[
        'endpoint'=>'wb/get/subject',
        'method'=>'POST',
        'description'=>'Subjects'
    ],
    'categories'=>[
        'endpoint'=>'wb/get/subject/categories',
        'method'=>'GET',
        'description'=>'Categories'
    ],
    'brands'=>[
        'endpoint'=>'wb/get/subject/brands',
        'method'=>'GET',
        'description'=>'Brands'
    ],
    'sellers'=>[
        'endpoint'=>'wb/get/subject/sellers',
        'method'=>'GET',
        'description'=>'Sellers'
    ],
   ]; 
}