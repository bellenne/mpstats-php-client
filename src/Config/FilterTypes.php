<?
namespace Bellenne\MpStats\Config;

class FilterTypes{

    const filterType = ['text'=>'text', 'number'=>'number', 'date'=>'date'];

    const equals = 'equals';
    const notEqual = 'notEqual';
    const contains = 'contains';
    const notContains = 'notContains';
    const startsWith = 'startsWith';
    const endsWith = 'endsWith';
    const lessThan = 'lessThan';
    const lessThanOrEqual = 'lessThanOrEqual';
    const greaterThan = 'greaterThan';
    const greaterThanOrEqual = 'greaterThanOrEqual';
    const inRange = 'inRange';
}