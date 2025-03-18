<?
namespace Bellenne\MpStats\Settings;

use JsonSerializable;

class SortModel implements JsonSerializable{
    private array $sortModel = [];


    /*
    *  @param string $colId  this is name of column from MpStats       
    *  @param string $sort  this is type of sorting asc or desc     
    *  @return int  id in result FilterModel for removing.
    */
    public function addPropery(string $colId, string $sort): int{
        array_push($this->sortModel, ["colId"=>$colId, "sort"=>$sort]);
        return count($this->sortModel)-1;
    }


    public function addProperties(array $properties){
        $this->sortModel = $properties;
    }


    public function removeProperty(int $arrayId): void{
        unset($this->sortModel[$arrayId]);
        $this->sortModel = array_values($this->sortModel);
    }

    public function clearSortModel(){
        $this->sortModel = [];
    }

    public function jsonSerialize(): array {
        return $this->sortModel;
    }
}