<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('REVISR_GIT_PATH', 'C:\Program_Files\Git\cmd\git.exe'); // Added by Revisr
define('DB_NAME', 'wordpress');

/** Имя пользователя MySQL */
define('DB_USER', 'user');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '123456');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'MLYe^>b!c[BLg{Ct_9s6b><Zj2Igc/+jCR_9N0wkTdG7IqJn1iQPU>;!x9cexB$^');
define('SECURE_AUTH_KEY',  '2g*?*Y8-%R2SoJ]})lSn`RM{v*&y)ah_liGvfoPAzz22/n=r;iXw4uk48c L`xLO');
define('LOGGED_IN_KEY',    '5s^fTTh|;Sjl{bQQaf&iIOgB+;fhi3]cW8Cus0N.>Fb@z^F?FYnx1np{cLpoP1^G');
define('NONCE_KEY',        'vwp#=T}LddzM=V2-B>G~`$~5}HG8Rl#%XeU^H`7Y=rX26&e=~i<0_M5n~+i]8p/:');
define('AUTH_SALT',        '$%`d2f:T{:FwE6<GmMl1A]Jy?[iSMsu mF+U8|b>X~||~YJuk;I5ubt@j&#5$/`4');
define('SECURE_AUTH_SALT', '7M`f?.=/I[vkvTm~CwQinQr;A:#Dx<c!%CG0?gO~ 3?dQ]uMX%g#c0NYN1|c^-UC');
define('LOGGED_IN_SALT',   'aHKH2AI/BJ1UOad!]@=P03[tk.v[$m>9iw,g{f m!.1Ej!C02/:kVjFjFJ?2e|~j');
define('NONCE_SALT',       '~Uf2 %[Y@5=.9F%%!y~Oqi&JLnJ1ro/3si~]_GYBuO##3H#f?)vZ74[i@1w7BCBm');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', FALSE);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
