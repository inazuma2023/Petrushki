<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регламент мониторинга доступности</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        h1 {
            text-align: center;
            font-size: 22px;
            margin-bottom: 30px;
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        h2 {
            font-size: 18px;
            margin-top: 25px;
            border-left: 4px solid #3498db;
            padding-left: 10px;
        }
        h3 {
            font-size: 16px;
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        ul, ol {
            margin: 10px 0;
            padding-left: 25px;
        }
        .signature {
            margin-top: 50px;
        }
        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>РЕГЛАМЕНТ МОНИТОРИНГА ДОСТУПНОСТИ</h1>

        <h2>1. Общие положения</h2>
        <p><strong>1.1.</strong> Настоящий регламент определяет порядок организации и проведения мониторинга доступности интернет-магазина Petrushki.</p>
        
        <p><strong>1.2.</strong> Цели мониторинга:</p>
        <ul>
            <li>Обеспечение круглосуточной доступности интернет-магазина для пользователей</li>
            <li>Своевременное выявление и устранение инцидентов</li>
            <li>Сбор статистики о времени бесперебойной работы</li>
        </ul>

        <p><strong>1.3.</strong> Регламент обязателен для исполнения:</p>
        <ul>
            <li>Отделом технической поддержки</li>
            <li>DevOps-инженерами</li>
            <li>Системными администраторами</li>
        </ul>

        <h2>2. Объекты мониторинга</h2>
        <p><strong>2.1.</strong> Основные компоненты, подлежащие мониторингу:</p>
        <ul>
            <li>Веб-интерфейс магазина (frontend)</li>
            <li>API и backend-сервисы</li>
            <li>База данных</li>
            <li>Серверы приложений</li>
            <li>Платежные шлюзы</li>
            <li>Внешние интеграции (CRM, 1С и др.)</li>
        </ul>

        <p><strong>2.2.</strong> Критерии доступности:</p>
        <ul>
            <li>HTTP-статус 200 для основных страниц</li>
            <li>Время отклика не более 2 сек для 95% запросов</li>
            <li>Корректность отображения контента</li>
        </ul>

        <h2>3. Система мониторинга</h2>
        <p><strong>3.1.</strong> Используемые инструменты:</p>
        <ul>
            <li>Prometheus + Grafana (основной мониторинг)</li>
            <li>UptimeRobot (контроль доступности)</li>
            <li>Zabbix (мониторинг серверов)</li>
            <li>Sentry (отслеживание ошибок)</li>
        </ul>

        <p><strong>3.2.</strong> Метрики мониторинга:</p>
        <ul>
            <li>HTTP-статусы (200, 404, 500 и др.)</li>
            <li>Время отклика (response time)</li>
            <li>Нагрузка на серверы (CPU, RAM, диски)</li>
            <li>Состояние служб и процессов</li>
        </ul>

        <h2>4. Пороги срабатывания и алертинг</h2>
        <p><strong>4.1.</strong> Уровни критичности:</p>
        <table>
            <tr>
                <th>Уровень</th>
                <th>Критерии</th>
                <th>Время реакции</th>
            </tr>
            <tr>
                <td>Критический</td>
                <td>HTTP-статус ≠ 200 более 1 мин, uptime < 99%</td>
                <td>≤ 15 мин</td>
            </tr>
            <tr>
                <td>Высокий</td>
                <td>Время отклика > 3 сек более 5 мин</td>
                <td>≤ 30 мин</td>
            </tr>
            <tr>
                <td>Средний</td>
                <td>Отдельные ошибки 5xx</td>
                <td>≤ 2 часа</td>
            </tr>
        </table>

        <p><strong>4.2.</strong> Каналы оповещения:</p>
        <ul>
            <li>Telegram/SMS - для критических инцидентов</li>
            <li>Email - для всех инцидентов</li>
            <li>Slack - для технических специалистов</li>
        </ul>

        <h2>5. Процедура реагирования</h2>
        <p><strong>5.1.</strong> При получении алерта:</p>
        <ol>
            <li>Подтверждение инцидента ответственным</li>
            <li>Определение причины (лог-анализ)</li>
            <li>Эскалация при необходимости</li>
            <li>Устранение проблемы</li>
            <li>Фиксация в системе инцидент-менеджмента</li>
        </ol>

        <p><strong>5.2.</strong> Время реакции:</p>
        <ul>
            <li>Критические инциденты - немедленно</li>
            <li>Высокий приоритет - в течение 30 минут</li>
            <li>Средний приоритет - в течение 2 часов</li>
        </ul>

        <h2>6. Отчетность</h2>
        <p><strong>6.1.</strong> Ежедневные отчеты:</p>
        <ul>
            <li>Общее время доступности</li>
            <li>Количество инцидентов</li>
            <li>Среднее время реакции</li>
        </ul>

        <p><strong>6.2.</strong> Ежемесячные отчеты:</p>
        <ul>
            <li>Общий uptime за период</li>
            <li>Анализ причин простоев</li>
            <li>Рекомендации по улучшению</li>
        </ul>

        <h2>7. Ответственные лица</h2>
        <p><strong>7.1.</strong> Первая линия поддержки:</p>
        <ul>
            <li>Круглосуточный мониторинг</li>
            <li>Первичный анализ инцидентов</li>
        </ul>

        <p><strong>7.2.</strong> Вторая линия поддержки:</p>
        <ul>
            <li>Устранение сложных инцидентов</li>
            <li>Оптимизация системы мониторинга</li>
        </ul>
    </div>
</body>
</html>