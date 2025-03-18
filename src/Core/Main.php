<?
namespace Bellenne\MpStats\Core;

class Main{
    protected $token;
    protected $marketplace;

    const BASE_URL = 'https://mpstats.io/api/';

    /*
    *  @param string $token - this is token from MpStats
    *  @param string $marketplace  - this is the code marketplace  that you receive in the getMarketplaceList function.
    */

    public function __construct($token, $marketplace) {
        $this->token = $token;
        $this->marketplace = $marketplace;
    }

    /*
    *  @param string $token - this is token from MpStats
    */
    public function setToken($token){
        $this->token = $token;
    }

    /*
    *  @return Array  - this is returned marketplace list with name and code from MpStats 
    */
    public static function getMarketplaceList(){
        return [["name"=>'Wildberries', "code"=>'wb'],["name"=>'Ozon', "code"=>'oz'],["name"=>'YandexMarket', "code"=>'ym']];
    }


}