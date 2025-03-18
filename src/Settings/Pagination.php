<?
namespace Bellenne\MpStats\Settings;

class Pagination{
    private int $startRow = 0;
    private int $endRow = 0;

    private int $maxRowFromCall = 5000;


    /**
    *  @param int $startRow - this is name of column from MpStats       
    *  @param int $endRow - this is type filter like equal, notEqual or any from MpStats Api Docs       

    *  @summary If endRow - startRow > 5000 then automatically sets value equals 5000 rows from startRow
    */

    public function __construct(int $startRow, int $endRow) {
        if($endRow - $startRow > $this->maxRowFromCall) {
            $endRow -= ($endRow - $startRow) - $this->maxRowFromCall;
        }

        $this->startRow = $startRow;
        $this->endRow = $endRow;
    }

    public function getStartRow() {return $this->startRow;}
    public function getEndRow() {return $this->endRow;}
    public function setStartRow(int $startRow) {$this->startRow = $startRow;}
    public function setEndRow(int $endRow) {$this->endRow = $endRow;}
}