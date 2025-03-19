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
   public static $RubricatorLinksWb = [
    'category'=>[
        'endpoint'=>'wb/get/category',
        'method'=>'POST ',
        'description'=>'Getting data by product categories'
    ],
    'subcategories'=>[
        'endpoint'=>'wb/get/category/subcategories',
        'method'=>'GET ',
        'description'=>'Subcategories'
    ],
    'brands'=>[
        'endpoint'=>'wb/get/category/brands',
        'method'=>'GET',
        'description'=>'Brands'
    ],
    'sellers'=>[
        'endpoint'=>'wb/get/subject/sellers',
        'method'=>'GET',
        'description'=>'Sellers'
    ],
    'trends'=>[
        'endpoint'=>'wb/get/category/trends',
        'method'=>'GET',
        'description'=>'Trends'
    ],
   ]; 
}