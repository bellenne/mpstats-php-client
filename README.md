# PHP Client for MpStats API

[![Latest Version](https://img.shields.io/packagist/v/bellenne/mpstats.svg)](https://packagist.org/packages/bellenne/mpstats)
[![License](https://img.shields.io/github/license/bellenne/mpstats-php-client.svg)](LICENSE)

PHP-клиент для интеграции с API сервиса [MpStats](https://mpstats.io) - платформы для аналитики и управления продажами на маркетплейсах.

<img src="https://static.tildacdn.com/tild3165-6361-4561-b566-643632323366/Group_612.png" 
     width="200"
     style="margin: 20px 0">

## Возможности сервиса MpStats
- 📊 Анализ ниш и конкурентов
- 🤖 Автоматизация управления ценами и рекламой
- 🚀 Продвижение товаров и SEO-оптимизация
- 📦 Управление поставками и логистикой
- 💰 Финансовый учет и аналитика
- 🔍 Мониторинг товарных карточек

## Установка

```bash
composer require bellenne/mpstats
```

## Авторизация

1. Получите API-токен в личном кабинете MpStats:
   **Настройки → Интеграции → Создать токен**
   
2. Используйте токен в заголовке запросов:

```php
use Bellenne\MpStats\Api\Wildberries\ChoosingNiche;

$client = new ChoosingNiche('ВАШ_ТОКЕН', 'wb'); // wb - Wildberries

```

## Пример использования

```php
use Bellenne\MpStats\Api\Wildberries\ChoosingNiche;
use Bellenne\MpStats\Settings\Settings;
use Bellenne\MpStats\Settings\SortModel;
use Bellenne\MpStats\Settings\FilterModel;
use Bellenne\MpStats\Settings\Pagination;

// Создание клиента
$client = new ChoosingNiche('5a2a5f0e538dd5.66919148', 'wb');

// Настройки запроса
$sort = new SortModel();
$sort->addProperty('revenue', 'asc');

$filter = new FilterModel();
$filter->addNumericFilter('revenue', 'greaterThan', 10000);

$settings = new Settings(
    new Pagination(0, 100),
    $filter,
    $sort
);

// Выполнение запроса
$result = $client->getSubjects('2261', $settings);

print_r($result);

```

В данном случае в функцию **getSubjects** передаётся **id** категории Фотообои, **id** можно узнать на официальном сайте **MpStat** зайдя в нужную Вам категорию.


```php 
$result = $client->getSubjects('2261', $settings);
```

Позже появится поддержка категорий в текстовом виде

## Поддерживаемые методы API

| Маркетплейс  | Категория         | Методы          |
|--------------|-------------------|-----------------|
| Wildberries  | Выбор ниши        | getSubjects     |
Больше методов будет реализовано позже.

## Лицензия

Этот проект распространяется под лицензией MIT - подробности см. в файле [LICENSE](LICENSE).

---

**Официальные ресурсы MpStats:**
- [Лендинг сервиса](https://mpstats.io)
- [Техническая документация](https://mpstats.io/api/docs)
- [Поддержка](mailto:help@mpstats.io)

*Данная библиотека не является официальным продуктом MpStats. Разработано сообществом для удобства интеграции.*