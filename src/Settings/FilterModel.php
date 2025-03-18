<?
namespace Bellenne\MpStats\Settings;

use DateTime;
use JsonSerializable;

class FilterModel implements JsonSerializable{
    private array $filterModel = [];
    private string $dateFormat = "y-m-d";


    /*
    *  @param string $colId - this is name of column from MpStats       
    *  @param string $type - this is type filter like equal, notEqual or any from MpStats Api Docs       
    *  @param string $filter - this is start filter value       
    *  @param string $filterTo - this is end filter value     
    *  @return int - id in result FilterModel for removing.
    */
    public function addNumericFilter(string $colId, string $type, int $filter, ?int $filterTo = null){
        $this->filterModel[$colId] = ['filterType'=>'number', 'type'=>$type, 'filter'=>$filter, 'filterTo'=>$filterTo];
    }
    public function addStringFilter(string $colId, string $type, string $filter){
        $this->filterModel[$colId] = ['filterType'=>'text', 'type'=>$type, 'filter'=>$filter];
    }
    public function addDateFilter(string $colId, string $type, string $filter, ?string $filterTo = null){
        $this->filterModel[$colId] = ['filterType'=>'date', 'type'=>$type, 'filter'=>$this->convertDate($filter)->format($this->dateFormat), 'filterTo'=>$this->convertDate($filterTo)->format($this->dateFormat)];
    }

    public function addManuallyFilter(array $filter){
        $this->filterModel = $filter;
    }


    public function removeFilter(string $filterKey){
        unset($this->filterModel[$filterKey]);
        // $this->filterModel = array_values($this->filterModel);
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