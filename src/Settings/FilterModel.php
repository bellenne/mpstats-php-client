<?
namespace Bellenne\MpStats\Settings;

use DateTime;
use JsonSerializable;
use Bellenne\MpStats\Objects\Filter;

class FilterModel implements JsonSerializable{
    private array $filterModel = [];
    private string $dateFormat = "y-m-d";


    /**
    *  @param string $colId - this is name of column from MpStats       
    *  @param string $type - this is type filter like equal, notEqual or any from MpStats Api Docs       
    *  @param string $filter - this is start filter value       
    *  @param string $filterTo - this is end filter value     
    */
    public function addNumericFilter(string $colId, string $type, int $filter, ?int $filterTo = null){
        $this->filterModel[$colId] = new Filter( 'text', $type, $filter, $filterTo);
    }
    public function addStringFilter(string $colId, string $type, string $filter){
        $this->filterModel[$colId] = new Filter( 'text', $type, $filter);

    }
    public function addDateFilter(string $colId, string $type, string $filter, ?string $filterTo = null){
        $this->filterModel[$colId] = new Filter( 'date', $type, $this->convertDate($filter)->format($this->dateFormat), $this->convertDate($filterTo)->format($this->dateFormat));
    }

    public function addCombienedFilter(string $colId, string $operator, Filter $filter1, Filter $filter2){
        $this->filterModel[$colId] = ['filterType'=>'text', 'operator'=>$operator, 'condition1'=>$filter1, 'condition2'=>$filter2];
    }

    public function addManuallyFilter(array $filter){
        $this->filterModel = $filter;
    }


    public function removeFilter(string $colId){
        unset($this->filterModel[$colId]);
    }

    public function clearFilters(){
        $this->filterModel = [];
    }

    private function convertDate($date)
    {
        $d = DateTime::createFromFormat($this->dateFormat, $date);
        return $d;
    }

    public function jsonSerialize(): array {
        return $this->filterModel;
    }
}