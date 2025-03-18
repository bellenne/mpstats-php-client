<?
namespace Bellenne\MpStats\Settings;
use Bellenne\MpStats\Settings\FilterModel;
use Bellenne\MpStats\Settings\SortModel;

use JsonSerializable;
class Settings implements JsonSerializable{
    private int $startRow;
    private int $endRow;

    private FilterModel $filterModel;
    private SortModel $sortModel;

    public function __construct(Pagination $pagination, ?FilterModel $filterModel = null, ?SortModel $sortModel = null) {
        $this->startRow = $pagination->getStartRow();
        $this->endRow = $pagination->getEndRow();
        $this->filterModel = $filterModel;
        $this->sortModel = $sortModel;
    }

    public function jsonSerialize(): array {
        return [
            'startRow' => $this->startRow,
            'endRow' => $this->endRow,
            'filterModel' => $this->filterModel, 
            'sortModel' => $this->sortModel
        ];
    }
}