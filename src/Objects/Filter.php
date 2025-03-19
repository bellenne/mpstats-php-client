<?
namespace Bellenne\MpStats\Objects;

use JsonSerializable;

class Filter implements JsonSerializable{
    private string $filterType;
    private string $type;
    private string $filter;
    private ?string $filterTo;

    public function __construct(string $filterType, string $type, string $filter, ?string $filterTo = null) {
        $this->filterType = $filterType;
        $this->type = $type;
        $this->filter = $filter;
        $this->filterTo = $filterTo;
    }

    public function jsonSerialize(): array {
        return [
            'filterType' => $this->filterType,
            'type' => $this->type,
            'filter' => $this->filter, 
            'filterTo' => $this->filterTo
        ];
    }
}