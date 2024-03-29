<?php
/**
 * DataForMobileGuest
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Inter TT API
 *
 * The Inter TT REST API is described using OpenAPI 3.0. The descriptor for the api can be downloaded in both [YAML](http://localhost:8080/cyclos/api/openapi.yaml) or [JSON](http://localhost:8080/cyclos/api/openapi.json) formats. These files can be used in tools that support the OpenAPI specification, such as the [OpenAPI Generator](https://openapi-generator.tech).  In the API, whenever some data is referenced, for example, a group, or payment type, either id or internal name can be used. When an user is to be referenced, the special word 'self' (sans quotes) always refers to the currently authenticated user, and any identification method (login name, e-mail, mobile phone, account number or custom field) that can be used on keywords search (as configured in the products) can also be used to identify users. Some specific data types have other identification fields, like accounts can have a number and payments can have a transaction number. This all depends on the current configuration.  -----------  Most of the operations that return data allow selecting which fields to include in the response. This is useful to avoid calculating data that finally won't be needed and also for reducing the transfer over the network. If nothing is set, all object fields are returned. Fields are handled in 3 modes. Given an example object `{\"a\": {\"x\": 1, \"y\": 2, \"z\": 3}, \"b\": 0}`, the modes are: - **Include**: the field is unprefixed or prefixed with `+`. All fields which   are not explicitly included are excluded from the result. Examples:   - `[\"a\"]` results in `{\"a\": {\"x\": 1, \"y\": 2, \"z\": 3}}`   - `[\"+b\"]` results in `{\"b\": 0}`   - `[\"a.x\"]` results in `{\"a\": {\"x\": 1}}`. This is a nested include. At root     level, includes only `a` then, on `a`'s level, includes only `x`.  - **Exclude**: the field is prefixed by `-` (or, for compatibility purposes,   `!`). Only explicitly excluded fields   are excluded from the result. Examples:   - `[\"-a\"]` results in `{\"b\": 0}`   - `[\"-b\"]` results in `{\"a\": {\"x\": 1, \"y\": 2, \"z\": 3}}`   - `[\"a.-x\"]` results in `{\"a\": {\"y\": 2, \"z\": 3}}`. In this example, `a` is     actually an include at the root level, hence, excludes `b`.  - **Nested only**: when a field is prefixed by `*` and has a nested path,   it only affects includes / excludes for the nested fields, without affecting   the current level. Only nested fields are configured.   Examples:   - `[\"*a.x\"]` results in `{\"a\": {\"x\": 1}, \"b\": 0}`. In this example, `a` is     configured to include only `x`. `b` is also included because, there is no     explicit includes at root level.   - `[\"*a.-x\"]` results in `{\"a\": {\"y\": 2, \"z\": 3}, \"b\": 0}`. In this example,     `a` is configured to exclude only `x`. `b` is also included because there     is no explicit includes at the root level.     For backwards compatibility, this can also be expressed in a special     syntax `-a.x`. Also, keep in mind that `-x.y.z` is equivalent to `*x.*y.-z`.  You cannot have the same field included and excluded at the same time - a HTTP `422` status will be returned. Also, when mixing nested excludes with explicit includes or excludes, the nested exclude will be ignored. For example, using `[\"*a.x\", \"a.y\"]` will ignore the `*a.x` definition, resulting in `{\"a\": {\"y\": 2}}`.  -----------  For details of the deprecated elements (operations and model) please visit the [deprecation notes page](https://documentation.cyclos.org/4.16.3/api-deprecation.html) for this version.
 *
 * The version of the OpenAPI document: 4.16.3
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 7.2.0
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace OpenAPI\Client\Model;

use \ArrayAccess;
use \OpenAPI\Client\ObjectSerializer;

/**
 * DataForMobileGuest Class Doc Comment
 *
 * @category Class
 * @description Contains definitions for the data for UI for guests
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class DataForMobileGuest implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'DataForMobileGuest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'cyclos_version' => 'string',
        'current_client_time' => '\DateTime',
        'locale' => 'string',
        'allowed_locales' => '\OpenAPI\Client\Model\UserLocale[]',
        'root_url' => 'string',
        'theme' => '\OpenAPI\Client\Model\ThemeUIElement',
        'translations' => '\OpenAPI\Client\Model\MobileTranslations',
        'max_image_width' => 'int',
        'max_image_height' => 'int',
        'max_upload_size' => 'int',
        'jpeg_quality' => 'int',
        'map_browser_api_key' => 'string',
        'application_username' => 'string',
        'number_format' => '\OpenAPI\Client\Model\NumberFormatEnum',
        'date_format' => '\OpenAPI\Client\Model\DateFormatEnum',
        'time_format' => '\OpenAPI\Client\Model\TimeFormatEnum',
        'allow_quick_payment' => 'bool',
        'data_for_login' => '\OpenAPI\Client\Model\DataForLogin',
        'data_for_device_confirmation_approval' => '\OpenAPI\Client\Model\DataForMobileGuestAllOfDataForDeviceConfirmationApproval',
        'groups_for_registration' => '\OpenAPI\Client\Model\GroupForRegistration[]',
        'header' => '\OpenAPI\Client\Model\TranslatableUIElementWithContent',
        'footer' => '\OpenAPI\Client\Model\TranslatableUIElementWithContent',
        'welcome_page' => '\OpenAPI\Client\Model\TranslatableUIElementWithContent',
        'medium_screen_registration_wizard' => '\OpenAPI\Client\Model\DataForMobileGuestAllOfMediumScreenRegistrationWizard',
        'small_screen_registration_wizard' => '\OpenAPI\Client\Model\DataForMobileGuestAllOfSmallScreenRegistrationWizard',
        'welcome_page_enabled' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'cyclos_version' => null,
        'current_client_time' => 'date-time',
        'locale' => null,
        'allowed_locales' => null,
        'root_url' => null,
        'theme' => null,
        'translations' => null,
        'max_image_width' => null,
        'max_image_height' => null,
        'max_upload_size' => null,
        'jpeg_quality' => null,
        'map_browser_api_key' => null,
        'application_username' => null,
        'number_format' => null,
        'date_format' => null,
        'time_format' => null,
        'allow_quick_payment' => null,
        'data_for_login' => null,
        'data_for_device_confirmation_approval' => null,
        'groups_for_registration' => null,
        'header' => null,
        'footer' => null,
        'welcome_page' => null,
        'medium_screen_registration_wizard' => null,
        'small_screen_registration_wizard' => null,
        'welcome_page_enabled' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'cyclos_version' => false,
        'current_client_time' => false,
        'locale' => false,
        'allowed_locales' => false,
        'root_url' => false,
        'theme' => false,
        'translations' => false,
        'max_image_width' => false,
        'max_image_height' => false,
        'max_upload_size' => false,
        'jpeg_quality' => false,
        'map_browser_api_key' => false,
        'application_username' => false,
        'number_format' => false,
        'date_format' => false,
        'time_format' => false,
        'allow_quick_payment' => false,
        'data_for_login' => false,
        'data_for_device_confirmation_approval' => false,
        'groups_for_registration' => false,
        'header' => false,
        'footer' => false,
        'welcome_page' => false,
        'medium_screen_registration_wizard' => false,
        'small_screen_registration_wizard' => false,
        'welcome_page_enabled' => false
    ];

    /**
      * If a nullable field gets set to null, insert it here
      *
      * @var boolean[]
      */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties
     *
     * @return array
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null
     *
     * @return boolean[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null
     *
     * @param boolean[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable
     *
     * @param string $property
     * @return bool
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     *
     * @param string $property
     * @return bool
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'cyclos_version' => 'cyclosVersion',
        'current_client_time' => 'currentClientTime',
        'locale' => 'locale',
        'allowed_locales' => 'allowedLocales',
        'root_url' => 'rootUrl',
        'theme' => 'theme',
        'translations' => 'translations',
        'max_image_width' => 'maxImageWidth',
        'max_image_height' => 'maxImageHeight',
        'max_upload_size' => 'maxUploadSize',
        'jpeg_quality' => 'jpegQuality',
        'map_browser_api_key' => 'mapBrowserApiKey',
        'application_username' => 'applicationUsername',
        'number_format' => 'numberFormat',
        'date_format' => 'dateFormat',
        'time_format' => 'timeFormat',
        'allow_quick_payment' => 'allowQuickPayment',
        'data_for_login' => 'dataForLogin',
        'data_for_device_confirmation_approval' => 'dataForDeviceConfirmationApproval',
        'groups_for_registration' => 'groupsForRegistration',
        'header' => 'header',
        'footer' => 'footer',
        'welcome_page' => 'welcomePage',
        'medium_screen_registration_wizard' => 'mediumScreenRegistrationWizard',
        'small_screen_registration_wizard' => 'smallScreenRegistrationWizard',
        'welcome_page_enabled' => 'welcomePageEnabled'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'cyclos_version' => 'setCyclosVersion',
        'current_client_time' => 'setCurrentClientTime',
        'locale' => 'setLocale',
        'allowed_locales' => 'setAllowedLocales',
        'root_url' => 'setRootUrl',
        'theme' => 'setTheme',
        'translations' => 'setTranslations',
        'max_image_width' => 'setMaxImageWidth',
        'max_image_height' => 'setMaxImageHeight',
        'max_upload_size' => 'setMaxUploadSize',
        'jpeg_quality' => 'setJpegQuality',
        'map_browser_api_key' => 'setMapBrowserApiKey',
        'application_username' => 'setApplicationUsername',
        'number_format' => 'setNumberFormat',
        'date_format' => 'setDateFormat',
        'time_format' => 'setTimeFormat',
        'allow_quick_payment' => 'setAllowQuickPayment',
        'data_for_login' => 'setDataForLogin',
        'data_for_device_confirmation_approval' => 'setDataForDeviceConfirmationApproval',
        'groups_for_registration' => 'setGroupsForRegistration',
        'header' => 'setHeader',
        'footer' => 'setFooter',
        'welcome_page' => 'setWelcomePage',
        'medium_screen_registration_wizard' => 'setMediumScreenRegistrationWizard',
        'small_screen_registration_wizard' => 'setSmallScreenRegistrationWizard',
        'welcome_page_enabled' => 'setWelcomePageEnabled'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'cyclos_version' => 'getCyclosVersion',
        'current_client_time' => 'getCurrentClientTime',
        'locale' => 'getLocale',
        'allowed_locales' => 'getAllowedLocales',
        'root_url' => 'getRootUrl',
        'theme' => 'getTheme',
        'translations' => 'getTranslations',
        'max_image_width' => 'getMaxImageWidth',
        'max_image_height' => 'getMaxImageHeight',
        'max_upload_size' => 'getMaxUploadSize',
        'jpeg_quality' => 'getJpegQuality',
        'map_browser_api_key' => 'getMapBrowserApiKey',
        'application_username' => 'getApplicationUsername',
        'number_format' => 'getNumberFormat',
        'date_format' => 'getDateFormat',
        'time_format' => 'getTimeFormat',
        'allow_quick_payment' => 'getAllowQuickPayment',
        'data_for_login' => 'getDataForLogin',
        'data_for_device_confirmation_approval' => 'getDataForDeviceConfirmationApproval',
        'groups_for_registration' => 'getGroupsForRegistration',
        'header' => 'getHeader',
        'footer' => 'getFooter',
        'welcome_page' => 'getWelcomePage',
        'medium_screen_registration_wizard' => 'getMediumScreenRegistrationWizard',
        'small_screen_registration_wizard' => 'getSmallScreenRegistrationWizard',
        'welcome_page_enabled' => 'getWelcomePageEnabled'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->setIfExists('cyclos_version', $data ?? [], null);
        $this->setIfExists('current_client_time', $data ?? [], null);
        $this->setIfExists('locale', $data ?? [], null);
        $this->setIfExists('allowed_locales', $data ?? [], null);
        $this->setIfExists('root_url', $data ?? [], null);
        $this->setIfExists('theme', $data ?? [], null);
        $this->setIfExists('translations', $data ?? [], null);
        $this->setIfExists('max_image_width', $data ?? [], null);
        $this->setIfExists('max_image_height', $data ?? [], null);
        $this->setIfExists('max_upload_size', $data ?? [], null);
        $this->setIfExists('jpeg_quality', $data ?? [], null);
        $this->setIfExists('map_browser_api_key', $data ?? [], null);
        $this->setIfExists('application_username', $data ?? [], null);
        $this->setIfExists('number_format', $data ?? [], null);
        $this->setIfExists('date_format', $data ?? [], null);
        $this->setIfExists('time_format', $data ?? [], null);
        $this->setIfExists('allow_quick_payment', $data ?? [], null);
        $this->setIfExists('data_for_login', $data ?? [], null);
        $this->setIfExists('data_for_device_confirmation_approval', $data ?? [], null);
        $this->setIfExists('groups_for_registration', $data ?? [], null);
        $this->setIfExists('header', $data ?? [], null);
        $this->setIfExists('footer', $data ?? [], null);
        $this->setIfExists('welcome_page', $data ?? [], null);
        $this->setIfExists('medium_screen_registration_wizard', $data ?? [], null);
        $this->setIfExists('small_screen_registration_wizard', $data ?? [], null);
        $this->setIfExists('welcome_page_enabled', $data ?? [], null);
    }

    /**
    * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
    * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
    * $this->openAPINullablesSetToNull array
    *
    * @param string $variableName
    * @param array  $fields
    * @param mixed  $defaultValue
    */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets cyclos_version
     *
     * @return string|null
     */
    public function getCyclosVersion()
    {
        return $this->container['cyclos_version'];
    }

    /**
     * Sets cyclos_version
     *
     * @param string|null $cyclos_version The version of the Cyclos server
     *
     * @return self
     */
    public function setCyclosVersion($cyclos_version)
    {
        if (is_null($cyclos_version)) {
            throw new \InvalidArgumentException('non-nullable cyclos_version cannot be null');
        }
        $this->container['cyclos_version'] = $cyclos_version;

        return $this;
    }

    /**
     * Gets current_client_time
     *
     * @return \DateTime|null
     */
    public function getCurrentClientTime()
    {
        return $this->container['current_client_time'];
    }

    /**
     * Sets current_client_time
     *
     * @param \DateTime|null $current_client_time The current client time according to the server
     *
     * @return self
     */
    public function setCurrentClientTime($current_client_time)
    {
        if (is_null($current_client_time)) {
            throw new \InvalidArgumentException('non-nullable current_client_time cannot be null');
        }
        $this->container['current_client_time'] = $current_client_time;

        return $this;
    }

    /**
     * Gets locale
     *
     * @return string|null
     */
    public function getLocale()
    {
        return $this->container['locale'];
    }

    /**
     * Sets locale
     *
     * @param string|null $locale The current locale
     *
     * @return self
     */
    public function setLocale($locale)
    {
        if (is_null($locale)) {
            throw new \InvalidArgumentException('non-nullable locale cannot be null');
        }
        $this->container['locale'] = $locale;

        return $this;
    }

    /**
     * Gets allowed_locales
     *
     * @return \OpenAPI\Client\Model\UserLocale[]|null
     */
    public function getAllowedLocales()
    {
        return $this->container['allowed_locales'];
    }

    /**
     * Sets allowed_locales
     *
     * @param \OpenAPI\Client\Model\UserLocale[]|null $allowed_locales The locales the user can select for example to change the language.
     *
     * @return self
     */
    public function setAllowedLocales($allowed_locales)
    {
        if (is_null($allowed_locales)) {
            throw new \InvalidArgumentException('non-nullable allowed_locales cannot be null');
        }
        $this->container['allowed_locales'] = $allowed_locales;

        return $this;
    }

    /**
     * Gets root_url
     *
     * @return string|null
     */
    public function getRootUrl()
    {
        return $this->container['root_url'];
    }

    /**
     * Sets root_url
     *
     * @param string|null $root_url The main URL set in the configuration
     *
     * @return self
     */
    public function setRootUrl($root_url)
    {
        if (is_null($root_url)) {
            throw new \InvalidArgumentException('non-nullable root_url cannot be null');
        }
        $this->container['root_url'] = $root_url;

        return $this;
    }

    /**
     * Gets theme
     *
     * @return \OpenAPI\Client\Model\ThemeUIElement|null
     */
    public function getTheme()
    {
        return $this->container['theme'];
    }

    /**
     * Sets theme
     *
     * @param \OpenAPI\Client\Model\ThemeUIElement|null $theme theme
     *
     * @return self
     */
    public function setTheme($theme)
    {
        if (is_null($theme)) {
            throw new \InvalidArgumentException('non-nullable theme cannot be null');
        }
        $this->container['theme'] = $theme;

        return $this;
    }

    /**
     * Gets translations
     *
     * @return \OpenAPI\Client\Model\MobileTranslations|null
     */
    public function getTranslations()
    {
        return $this->container['translations'];
    }

    /**
     * Sets translations
     *
     * @param \OpenAPI\Client\Model\MobileTranslations|null $translations translations
     *
     * @return self
     */
    public function setTranslations($translations)
    {
        if (is_null($translations)) {
            throw new \InvalidArgumentException('non-nullable translations cannot be null');
        }
        $this->container['translations'] = $translations;

        return $this;
    }

    /**
     * Gets max_image_width
     *
     * @return int|null
     */
    public function getMaxImageWidth()
    {
        return $this->container['max_image_width'];
    }

    /**
     * Sets max_image_width
     *
     * @param int|null $max_image_width Maximum width (in pixels) for uploaded images
     *
     * @return self
     */
    public function setMaxImageWidth($max_image_width)
    {
        if (is_null($max_image_width)) {
            throw new \InvalidArgumentException('non-nullable max_image_width cannot be null');
        }
        $this->container['max_image_width'] = $max_image_width;

        return $this;
    }

    /**
     * Gets max_image_height
     *
     * @return int|null
     */
    public function getMaxImageHeight()
    {
        return $this->container['max_image_height'];
    }

    /**
     * Sets max_image_height
     *
     * @param int|null $max_image_height Maximum height (in pixels) for uploaded images
     *
     * @return self
     */
    public function setMaxImageHeight($max_image_height)
    {
        if (is_null($max_image_height)) {
            throw new \InvalidArgumentException('non-nullable max_image_height cannot be null');
        }
        $this->container['max_image_height'] = $max_image_height;

        return $this;
    }

    /**
     * Gets max_upload_size
     *
     * @return int|null
     */
    public function getMaxUploadSize()
    {
        return $this->container['max_upload_size'];
    }

    /**
     * Sets max_upload_size
     *
     * @param int|null $max_upload_size Maximum size (in bytes) for uploaded files
     *
     * @return self
     */
    public function setMaxUploadSize($max_upload_size)
    {
        if (is_null($max_upload_size)) {
            throw new \InvalidArgumentException('non-nullable max_upload_size cannot be null');
        }
        $this->container['max_upload_size'] = $max_upload_size;

        return $this;
    }

    /**
     * Gets jpeg_quality
     *
     * @return int|null
     */
    public function getJpegQuality()
    {
        return $this->container['jpeg_quality'];
    }

    /**
     * Sets jpeg_quality
     *
     * @param int|null $jpeg_quality Quality for JPEG image types (higher means better quality)
     *
     * @return self
     */
    public function setJpegQuality($jpeg_quality)
    {
        if (is_null($jpeg_quality)) {
            throw new \InvalidArgumentException('non-nullable jpeg_quality cannot be null');
        }
        $this->container['jpeg_quality'] = $jpeg_quality;

        return $this;
    }

    /**
     * Gets map_browser_api_key
     *
     * @return string|null
     */
    public function getMapBrowserApiKey()
    {
        return $this->container['map_browser_api_key'];
    }

    /**
     * Sets map_browser_api_key
     *
     * @param string|null $map_browser_api_key The Google Maps browser API key
     *
     * @return self
     */
    public function setMapBrowserApiKey($map_browser_api_key)
    {
        if (is_null($map_browser_api_key)) {
            throw new \InvalidArgumentException('non-nullable map_browser_api_key cannot be null');
        }
        $this->container['map_browser_api_key'] = $map_browser_api_key;

        return $this;
    }

    /**
     * Gets application_username
     *
     * @return string|null
     */
    public function getApplicationUsername()
    {
        return $this->container['application_username'];
    }

    /**
     * Sets application_username
     *
     * @param string|null $application_username An username used by the application to be displayed for example in system messages
     *
     * @return self
     */
    public function setApplicationUsername($application_username)
    {
        if (is_null($application_username)) {
            throw new \InvalidArgumentException('non-nullable application_username cannot be null');
        }
        $this->container['application_username'] = $application_username;

        return $this;
    }

    /**
     * Gets number_format
     *
     * @return \OpenAPI\Client\Model\NumberFormatEnum|null
     */
    public function getNumberFormat()
    {
        return $this->container['number_format'];
    }

    /**
     * Sets number_format
     *
     * @param \OpenAPI\Client\Model\NumberFormatEnum|null $number_format number_format
     *
     * @return self
     */
    public function setNumberFormat($number_format)
    {
        if (is_null($number_format)) {
            throw new \InvalidArgumentException('non-nullable number_format cannot be null');
        }
        $this->container['number_format'] = $number_format;

        return $this;
    }

    /**
     * Gets date_format
     *
     * @return \OpenAPI\Client\Model\DateFormatEnum|null
     */
    public function getDateFormat()
    {
        return $this->container['date_format'];
    }

    /**
     * Sets date_format
     *
     * @param \OpenAPI\Client\Model\DateFormatEnum|null $date_format date_format
     *
     * @return self
     */
    public function setDateFormat($date_format)
    {
        if (is_null($date_format)) {
            throw new \InvalidArgumentException('non-nullable date_format cannot be null');
        }
        $this->container['date_format'] = $date_format;

        return $this;
    }

    /**
     * Gets time_format
     *
     * @return \OpenAPI\Client\Model\TimeFormatEnum|null
     */
    public function getTimeFormat()
    {
        return $this->container['time_format'];
    }

    /**
     * Sets time_format
     *
     * @param \OpenAPI\Client\Model\TimeFormatEnum|null $time_format time_format
     *
     * @return self
     */
    public function setTimeFormat($time_format)
    {
        if (is_null($time_format)) {
            throw new \InvalidArgumentException('non-nullable time_format cannot be null');
        }
        $this->container['time_format'] = $time_format;

        return $this;
    }

    /**
     * Gets allow_quick_payment
     *
     * @return bool|null
     */
    public function getAllowQuickPayment()
    {
        return $this->container['allow_quick_payment'];
    }

    /**
     * Sets allow_quick_payment
     *
     * @param bool|null $allow_quick_payment Enables a quick payment action by showing the option to scan a QR code at login page.
     *
     * @return self
     */
    public function setAllowQuickPayment($allow_quick_payment)
    {
        if (is_null($allow_quick_payment)) {
            throw new \InvalidArgumentException('non-nullable allow_quick_payment cannot be null');
        }
        $this->container['allow_quick_payment'] = $allow_quick_payment;

        return $this;
    }

    /**
     * Gets data_for_login
     *
     * @return \OpenAPI\Client\Model\DataForLogin|null
     */
    public function getDataForLogin()
    {
        return $this->container['data_for_login'];
    }

    /**
     * Sets data_for_login
     *
     * @param \OpenAPI\Client\Model\DataForLogin|null $data_for_login data_for_login
     *
     * @return self
     */
    public function setDataForLogin($data_for_login)
    {
        if (is_null($data_for_login)) {
            throw new \InvalidArgumentException('non-nullable data_for_login cannot be null');
        }
        $this->container['data_for_login'] = $data_for_login;

        return $this;
    }

    /**
     * Gets data_for_device_confirmation_approval
     *
     * @return \OpenAPI\Client\Model\DataForMobileGuestAllOfDataForDeviceConfirmationApproval|null
     */
    public function getDataForDeviceConfirmationApproval()
    {
        return $this->container['data_for_device_confirmation_approval'];
    }

    /**
     * Sets data_for_device_confirmation_approval
     *
     * @param \OpenAPI\Client\Model\DataForMobileGuestAllOfDataForDeviceConfirmationApproval|null $data_for_device_confirmation_approval data_for_device_confirmation_approval
     *
     * @return self
     */
    public function setDataForDeviceConfirmationApproval($data_for_device_confirmation_approval)
    {
        if (is_null($data_for_device_confirmation_approval)) {
            throw new \InvalidArgumentException('non-nullable data_for_device_confirmation_approval cannot be null');
        }
        $this->container['data_for_device_confirmation_approval'] = $data_for_device_confirmation_approval;

        return $this;
    }

    /**
     * Gets groups_for_registration
     *
     * @return \OpenAPI\Client\Model\GroupForRegistration[]|null
     */
    public function getGroupsForRegistration()
    {
        return $this->container['groups_for_registration'];
    }

    /**
     * Sets groups_for_registration
     *
     * @param \OpenAPI\Client\Model\GroupForRegistration[]|null $groups_for_registration The list of groups the authenticated user can use to perform a new user registration
     *
     * @return self
     */
    public function setGroupsForRegistration($groups_for_registration)
    {
        if (is_null($groups_for_registration)) {
            throw new \InvalidArgumentException('non-nullable groups_for_registration cannot be null');
        }
        $this->container['groups_for_registration'] = $groups_for_registration;

        return $this;
    }

    /**
     * Gets header
     *
     * @return \OpenAPI\Client\Model\TranslatableUIElementWithContent|null
     */
    public function getHeader()
    {
        return $this->container['header'];
    }

    /**
     * Sets header
     *
     * @param \OpenAPI\Client\Model\TranslatableUIElementWithContent|null $header header
     *
     * @return self
     */
    public function setHeader($header)
    {
        if (is_null($header)) {
            throw new \InvalidArgumentException('non-nullable header cannot be null');
        }
        $this->container['header'] = $header;

        return $this;
    }

    /**
     * Gets footer
     *
     * @return \OpenAPI\Client\Model\TranslatableUIElementWithContent|null
     */
    public function getFooter()
    {
        return $this->container['footer'];
    }

    /**
     * Sets footer
     *
     * @param \OpenAPI\Client\Model\TranslatableUIElementWithContent|null $footer footer
     *
     * @return self
     */
    public function setFooter($footer)
    {
        if (is_null($footer)) {
            throw new \InvalidArgumentException('non-nullable footer cannot be null');
        }
        $this->container['footer'] = $footer;

        return $this;
    }

    /**
     * Gets welcome_page
     *
     * @return \OpenAPI\Client\Model\TranslatableUIElementWithContent|null
     */
    public function getWelcomePage()
    {
        return $this->container['welcome_page'];
    }

    /**
     * Sets welcome_page
     *
     * @param \OpenAPI\Client\Model\TranslatableUIElementWithContent|null $welcome_page welcome_page
     *
     * @return self
     */
    public function setWelcomePage($welcome_page)
    {
        if (is_null($welcome_page)) {
            throw new \InvalidArgumentException('non-nullable welcome_page cannot be null');
        }
        $this->container['welcome_page'] = $welcome_page;

        return $this;
    }

    /**
     * Gets medium_screen_registration_wizard
     *
     * @return \OpenAPI\Client\Model\DataForMobileGuestAllOfMediumScreenRegistrationWizard|null
     */
    public function getMediumScreenRegistrationWizard()
    {
        return $this->container['medium_screen_registration_wizard'];
    }

    /**
     * Sets medium_screen_registration_wizard
     *
     * @param \OpenAPI\Client\Model\DataForMobileGuestAllOfMediumScreenRegistrationWizard|null $medium_screen_registration_wizard medium_screen_registration_wizard
     *
     * @return self
     */
    public function setMediumScreenRegistrationWizard($medium_screen_registration_wizard)
    {
        if (is_null($medium_screen_registration_wizard)) {
            throw new \InvalidArgumentException('non-nullable medium_screen_registration_wizard cannot be null');
        }
        $this->container['medium_screen_registration_wizard'] = $medium_screen_registration_wizard;

        return $this;
    }

    /**
     * Gets small_screen_registration_wizard
     *
     * @return \OpenAPI\Client\Model\DataForMobileGuestAllOfSmallScreenRegistrationWizard|null
     */
    public function getSmallScreenRegistrationWizard()
    {
        return $this->container['small_screen_registration_wizard'];
    }

    /**
     * Sets small_screen_registration_wizard
     *
     * @param \OpenAPI\Client\Model\DataForMobileGuestAllOfSmallScreenRegistrationWizard|null $small_screen_registration_wizard small_screen_registration_wizard
     *
     * @return self
     */
    public function setSmallScreenRegistrationWizard($small_screen_registration_wizard)
    {
        if (is_null($small_screen_registration_wizard)) {
            throw new \InvalidArgumentException('non-nullable small_screen_registration_wizard cannot be null');
        }
        $this->container['small_screen_registration_wizard'] = $small_screen_registration_wizard;

        return $this;
    }

    /**
     * Gets welcome_page_enabled
     *
     * @return bool|null
     */
    public function getWelcomePageEnabled()
    {
        return $this->container['welcome_page_enabled'];
    }

    /**
     * Sets welcome_page_enabled
     *
     * @param bool|null $welcome_page_enabled Indicates whether there is a welcome page available.
     *
     * @return self
     */
    public function setWelcomePageEnabled($welcome_page_enabled)
    {
        if (is_null($welcome_page_enabled)) {
            throw new \InvalidArgumentException('non-nullable welcome_page_enabled cannot be null');
        }
        $this->container['welcome_page_enabled'] = $welcome_page_enabled;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


