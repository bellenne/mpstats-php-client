<?
use Bellenne\MpStats\Api\Wildberries\ChoosingNiche;
use Bellenne\MpStats\Config\FilterTypes;
use Bellenne\MpStats\Config\Marketplaces;
use Bellenne\MpStats\Objects\Filter;
use Bellenne\MpStats\Settings\FilterModel;
use Bellenne\MpStats\Settings\Pagination;
use Bellenne\MpStats\Settings\Settings;
use Bellenne\MpStats\Settings\SortModel;

class ChoosingNicheSubjectExample{
    public function getSubject(){

        $pagination = new Pagination(1,10);

        $sortModel = new SortModel();
        $sortModel->addProperty('revenue','desc');

        $filterModel = new FilterModel();
        
        $filterModel->addNumericFilter('revenue', FilterTypes::greaterThan, 1000);

        $filterModel->addCombienedFilter('sales', 'and', 
        new Filter(FilterTypes::filterType['number'], FilterTypes::greaterThan, 100),
        new Filter(FilterTypes::filterType['number'], FilterTypes::lessThan, 500),
        );

        // If need remove filter:
        $filterModel->removeFilter('sales');

        $settings = new Settings($pagination, $filterModel, $sortModel);

        $choosingNiche = new ChoosingNiche('your_api_token', Marketplaces::WILDBERRIES);

        // Subject = Ноутбуки и компьютеры / Программное обеспечение => id = 3122

        $result = $choosingNiche->getSubjects('3122',0, '2025-03-10', '2025-03-19', $settings);

        print_r($result);
    }
}