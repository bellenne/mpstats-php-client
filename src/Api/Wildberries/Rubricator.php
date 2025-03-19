<?
namespace Bellenne\MpStats\Api\Wildberries;

use Bellenne\MpStats\Core\ApiRequestHandler;
use Bellenne\MpStats\Config\Links;
use Bellenne\MpStats\Core\Main;
use Bellenne\MpStats\Settings\Settings;


class Rubricator extends Main{

    private ApiRequestHandler $requestHandler;

    public function __construct($token, $marketplace) {
        parent::__construct($token, $marketplace);
        

        $this->requestHandler = new ApiRequestHandler(
            $this->token,
            self::BASE_URL
        );
    }

    public function getSubjects(string $path,int $fbs=0,string $dateStart,string $dateEnd, ?Settings $settings = null){
        $queryParams = [
            'path' => $path,
            'fbs' => $fbs,
            'd1' => $dateStart,
            'd2' => $dateEnd
        ];
        
        return $this->requestHandler->send(
            Links::$RubricatorLinksWb['category'],
            $queryParams,
            $settings ? $settings->jsonSerialize() : null
        );
    }
}