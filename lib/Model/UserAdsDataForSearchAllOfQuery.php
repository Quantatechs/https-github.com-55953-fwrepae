<?php
/**
 * UserAdsDataForSearchAllOfQuery
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
 * UserAdsDataForSearchAllOfQuery Class Doc Comment
 *
 * @category Class
 * @description Default query filters to search advertisements of a specific user
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UserAdsDataForSearchAllOfQuery implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UserAdsDataForSearch_allOf_query';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'page' => 'int',
        'page_size' => 'int',
        'skip_total_count' => 'bool',
        'keywords' => 'string',
        'profile_fields' => 'string[]',
        'latitude' => 'float',
        'longitude' => 'float',
        'max_distance' => 'float',
        'custom_fields' => 'string[]',
        'category' => 'string',
        'currency' => 'string',
        'price_range' => 'float[]',
        'product_number' => 'string',
        'has_images' => 'bool',
        'publication_period' => '\DateTime[]',
        'expiration_period' => '\DateTime[]',
        'favorite_for' => 'string',
        'kind' => '\OpenAPI\Client\Model\AdKind',
        'statuses' => '\OpenAPI\Client\Model\AdStatusEnum[]',
        'order_by' => '\OpenAPI\Client\Model\AdOrderByEnum',
        'address_result' => '\OpenAPI\Client\Model\AdAddressResultEnum'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'page' => null,
        'page_size' => null,
        'skip_total_count' => null,
        'keywords' => null,
        'profile_fields' => null,
        'latitude' => 'double',
        'longitude' => 'double',
        'max_distance' => 'double',
        'custom_fields' => null,
        'category' => null,
        'currency' => null,
        'price_range' => 'number',
        'product_number' => null,
        'has_images' => null,
        'publication_period' => 'date-time',
        'expiration_period' => 'date-time',
        'favorite_for' => null,
        'kind' => null,
        'statuses' => null,
        'order_by' => null,
        'address_result' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'page' => false,
        'page_size' => false,
        'skip_total_count' => false,
        'keywords' => false,
        'profile_fields' => false,
        'latitude' => false,
        'longitude' => false,
        'max_distance' => false,
        'custom_fields' => false,
        'category' => false,
        'currency' => false,
        'price_range' => false,
        'product_number' => false,
        'has_images' => false,
        'publication_period' => false,
        'expiration_period' => false,
        'favorite_for' => false,
        'kind' => false,
        'statuses' => false,
        'order_by' => false,
        'address_result' => false
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
        'page' => 'page',
        'page_size' => 'pageSize',
        'skip_total_count' => 'skipTotalCount',
        'keywords' => 'keywords',
        'profile_fields' => 'profileFields',
        'latitude' => 'latitude',
        'longitude' => 'longitude',
        'max_distance' => 'maxDistance',
        'custom_fields' => 'customFields',
        'category' => 'category',
        'currency' => 'currency',
        'price_range' => 'priceRange',
        'product_number' => 'productNumber',
        'has_images' => 'hasImages',
        'publication_period' => 'publicationPeriod',
        'expiration_period' => 'expirationPeriod',
        'favorite_for' => 'favoriteFor',
        'kind' => 'kind',
        'statuses' => 'statuses',
        'order_by' => 'orderBy',
        'address_result' => 'addressResult'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'page' => 'setPage',
        'page_size' => 'setPageSize',
        'skip_total_count' => 'setSkipTotalCount',
        'keywords' => 'setKeywords',
        'profile_fields' => 'setProfileFields',
        'latitude' => 'setLatitude',
        'longitude' => 'setLongitude',
        'max_distance' => 'setMaxDistance',
        'custom_fields' => 'setCustomFields',
        'category' => 'setCategory',
        'currency' => 'setCurrency',
        'price_range' => 'setPriceRange',
        'product_number' => 'setProductNumber',
        'has_images' => 'setHasImages',
        'publication_period' => 'setPublicationPeriod',
        'expiration_period' => 'setExpirationPeriod',
        'favorite_for' => 'setFavoriteFor',
        'kind' => 'setKind',
        'statuses' => 'setStatuses',
        'order_by' => 'setOrderBy',
        'address_result' => 'setAddressResult'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'page' => 'getPage',
        'page_size' => 'getPageSize',
        'skip_total_count' => 'getSkipTotalCount',
        'keywords' => 'getKeywords',
        'profile_fields' => 'getProfileFields',
        'latitude' => 'getLatitude',
        'longitude' => 'getLongitude',
        'max_distance' => 'getMaxDistance',
        'custom_fields' => 'getCustomFields',
        'category' => 'getCategory',
        'currency' => 'getCurrency',
        'price_range' => 'getPriceRange',
        'product_number' => 'getProductNumber',
        'has_images' => 'getHasImages',
        'publication_period' => 'getPublicationPeriod',
        'expiration_period' => 'getExpirationPeriod',
        'favorite_for' => 'getFavoriteFor',
        'kind' => 'getKind',
        'statuses' => 'getStatuses',
        'order_by' => 'getOrderBy',
        'address_result' => 'getAddressResult'
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
        $this->setIfExists('page', $data ?? [], null);
        $this->setIfExists('page_size', $data ?? [], null);
        $this->setIfExists('skip_total_count', $data ?? [], null);
        $this->setIfExists('keywords', $data ?? [], null);
        $this->setIfExists('profile_fields', $data ?? [], null);
        $this->setIfExists('latitude', $data ?? [], null);
        $this->setIfExists('longitude', $data ?? [], null);
        $this->setIfExists('max_distance', $data ?? [], null);
        $this->setIfExists('custom_fields', $data ?? [], null);
        $this->setIfExists('category', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('price_range', $data ?? [], null);
        $this->setIfExists('product_number', $data ?? [], null);
        $this->setIfExists('has_images', $data ?? [], null);
        $this->setIfExists('publication_period', $data ?? [], null);
        $this->setIfExists('expiration_period', $data ?? [], null);
        $this->setIfExists('favorite_for', $data ?? [], null);
        $this->setIfExists('kind', $data ?? [], null);
        $this->setIfExists('statuses', $data ?? [], null);
        $this->setIfExists('order_by', $data ?? [], null);
        $this->setIfExists('address_result', $data ?? [], null);
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
     * Gets page
     *
     * @return int|null
     */
    public function getPage()
    {
        return $this->container['page'];
    }

    /**
     * Sets page
     *
     * @param int|null $page The page number (zero-based) of the search. The default value is zero.
     *
     * @return self
     */
    public function setPage($page)
    {
        if (is_null($page)) {
            throw new \InvalidArgumentException('non-nullable page cannot be null');
        }
        $this->container['page'] = $page;

        return $this;
    }

    /**
     * Gets page_size
     *
     * @return int|null
     */
    public function getPageSize()
    {
        return $this->container['page_size'];
    }

    /**
     * Sets page_size
     *
     * @param int|null $page_size The maximum number of records that will be returned on the search. The default value is 40. The maximum number of returned results is configured in Cyclos, and even if more than that is requested, it will be limited by that setting.
     *
     * @return self
     */
    public function setPageSize($page_size)
    {
        if (is_null($page_size)) {
            throw new \InvalidArgumentException('non-nullable page_size cannot be null');
        }
        $this->container['page_size'] = $page_size;

        return $this;
    }

    /**
     * Gets skip_total_count
     *
     * @return bool|null
     */
    public function getSkipTotalCount()
    {
        return $this->container['skip_total_count'];
    }

    /**
     * Sets skip_total_count
     *
     * @param bool|null $skip_total_count When set to true the result will not include the total record count, only the information on whether there are more records. Depending on the server-side configuration, this can be always true. Otherwise, if the server allows total count, and the client doesn't need it, setting this to true can increase performance a bit.
     *
     * @return self
     */
    public function setSkipTotalCount($skip_total_count)
    {
        if (is_null($skip_total_count)) {
            throw new \InvalidArgumentException('non-nullable skip_total_count cannot be null');
        }
        $this->container['skip_total_count'] = $skip_total_count;

        return $this;
    }

    /**
     * Gets keywords
     *
     * @return string|null
     */
    public function getKeywords()
    {
        return $this->container['keywords'];
    }

    /**
     * Sets keywords
     *
     * @param string|null $keywords Textual search keywords. Sometimes, like in user search, the fields matched depends on what is configured on the products.
     *
     * @return self
     */
    public function setKeywords($keywords)
    {
        if (is_null($keywords)) {
            throw new \InvalidArgumentException('non-nullable keywords cannot be null');
        }
        $this->container['keywords'] = $keywords;

        return $this;
    }

    /**
     * Gets profile_fields
     *
     * @return string[]|null
     */
    public function getProfileFields()
    {
        return $this->container['profile_fields'];
    }

    /**
     * Sets profile_fields
     *
     * @param string[]|null $profile_fields User profile fields, both basic (full name, login name, phone, e-mail, etc) and custom fields, that are used for search. Is a comma-separated array, where each part consists in two parts: the internal name (or custom field id) of the field, and a value, both separated by `:` (colon). For example, `profileFields=field1:value1,field2:value2`. Sometimes multiple values are accepted. In this case, the multiple values are separated by pipes. For example, `profileFields=field1:valueA|valueB`. The accepted fields depend on the products the authenticated user has. Enumerated fields accept multiple values, while numeric and date fields also accept ranges, which are two values, pipe-separated. For example, `profileFields=rank:bronze|silver,birthDate:2000-01-01|2001-12-31` would match results whose custom field with internal name 'rank' is either bronze or silver, and whose 'birthDate' is between January 1, 2000 and December 31, 2001. To specify a single bound in ranges (like birth dates before December 31, 2001), use a pipe in one of the values, like `profileFields=birthDate:|2001-12-31`.  The basic profile fields have one of the following identifiers:  - `name` or `fullName`: Full name; - `username`, `loginName` or `login`: Login name; - `email`: E-mail; - `phone`: Phone; - `accountNumber`, `account`: Account number; - `image`: Image (accepts a boolean value, indicating that either   it is required that users either have images or not).   If address is an allowed profile field for search, specific address fields may be searched. The allowed ones are normally returned as the `addressFieldsInSearch` field in the corresponding result from a data-for-search request. The specific address fields are:  - `address`: Searches on any address field (not a specific field); - `address.address`: Searches on the fields that represent the   street address, which are `addressLine1`,   `addressLine2`,   `street`,   `buildingNumber` and   `complement`.   Note that normally only a subset of them should be enabled in the   configuration (either line 1 / 2 or street + number + complement);  - `address.zip`: Searches for matching zip (postal) code; - `address.poBox`: Searches for matching postal box; - `address.neighborhood`: Searches by neighborhood; - `address.city`: Searches by city; - `address.region`: Searches by region (or state); - `address.country`: Searches by ISO 3166-1 alpha-2 country code. A note for dynamic custom fields: If a script is used to generate possible values for search, the list will be returned in the corresponding data, and it is sent as a pipe-separated list of values (not labels). For example: `profileFields=dynamic:a|b|c`. However, it is also possible to perform a keywords-like (full-text) search using the dynamic value label. In this case a single value, prefixed by single quotes should be used. For example: `profileFields=dynamic:'business`.
     *
     * @return self
     */
    public function setProfileFields($profile_fields)
    {
        if (is_null($profile_fields)) {
            throw new \InvalidArgumentException('non-nullable profile_fields cannot be null');
        }
        $this->container['profile_fields'] = $profile_fields;

        return $this;
    }

    /**
     * Gets latitude
     *
     * @return float|null
     */
    public function getLatitude()
    {
        return $this->container['latitude'];
    }

    /**
     * Sets latitude
     *
     * @param float|null $latitude The reference latitude for distance searches
     *
     * @return self
     */
    public function setLatitude($latitude)
    {
        if (is_null($latitude)) {
            throw new \InvalidArgumentException('non-nullable latitude cannot be null');
        }
        $this->container['latitude'] = $latitude;

        return $this;
    }

    /**
     * Gets longitude
     *
     * @return float|null
     */
    public function getLongitude()
    {
        return $this->container['longitude'];
    }

    /**
     * Sets longitude
     *
     * @param float|null $longitude The reference longitude for distance searches
     *
     * @return self
     */
    public function setLongitude($longitude)
    {
        if (is_null($longitude)) {
            throw new \InvalidArgumentException('non-nullable longitude cannot be null');
        }
        $this->container['longitude'] = $longitude;

        return $this;
    }

    /**
     * Gets max_distance
     *
     * @return float|null
     */
    public function getMaxDistance()
    {
        return $this->container['max_distance'];
    }

    /**
     * Sets max_distance
     *
     * @param float|null $max_distance Maximum straight-line distance between the informed location and the resulting address. Is measured either in kilometers or miles, depending on the configuration. Only accepted if both `longitude` and `latitude` parameters are passed with the actual reference position.
     *
     * @return self
     */
    public function setMaxDistance($max_distance)
    {
        if (is_null($max_distance)) {
            throw new \InvalidArgumentException('non-nullable max_distance cannot be null');
        }
        $this->container['max_distance'] = $max_distance;

        return $this;
    }

    /**
     * Gets custom_fields
     *
     * @return string[]|null
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     *
     * @param string[]|null $custom_fields Advertisement custom field values used as filters. Is a comma-separated array, where each part consists in two parts: the internal name (or custom field id) of the field, and a value, both separated by : (colon).  For example, `customFields=field1:value1,field2:value2`. Sometimes multiple values are accepted. In this case, the multiple values are separated by pipes. For example, customFields=field1:valueA|valueB. Enumerated fields accept multiple values, while numeric and date fields also accept ranges, which are two values, pipe-separated. For example, `customFields=tradeType:offer|search,extraDate:2000-01-01|2001-12-31` would match results whose custom field with internal name `tradeType` is either `offer` or `search`, and whose `extraDate` is between January 1, 2000 and December 31, 2001. To specify a single bound in ranges (like birth dates before December 31, 2001), use a pipe in one of the values, like `customFields=extraDate:|2001-12-31`. A note for dynamic custom fields: If a script is used to generate possible values for search, the list will be returned in the  corresponding data, and it is sent as a pipe-separated list of values (not labels). For example: `customFields=dynamic:a|b|c`. However, it is also possible to perform a keywords-like (full-text) search using the dynamic value label. In this case a single value, prefixed by single quotes should be used. For example: `customFields=dynamic:'business`.
     *
     * @return self
     */
    public function setCustomFields($custom_fields)
    {
        if (is_null($custom_fields)) {
            throw new \InvalidArgumentException('non-nullable custom_fields cannot be null');
        }
        $this->container['custom_fields'] = $custom_fields;

        return $this;
    }

    /**
     * Gets category
     *
     * @return string|null
     */
    public function getCategory()
    {
        return $this->container['category'];
    }

    /**
     * Sets category
     *
     * @param string|null $category Either id or internal name of a category
     *
     * @return self
     */
    public function setCategory($category)
    {
        if (is_null($category)) {
            throw new \InvalidArgumentException('non-nullable category cannot be null');
        }
        $this->container['category'] = $category;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string|null
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string|null $currency Either id or internal name of a currency for the price
     *
     * @return self
     */
    public function setCurrency($currency)
    {
        if (is_null($currency)) {
            throw new \InvalidArgumentException('non-nullable currency cannot be null');
        }
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets price_range
     *
     * @return float[]|null
     */
    public function getPriceRange()
    {
        return $this->container['price_range'];
    }

    /**
     * Sets price_range
     *
     * @param float[]|null $price_range The minumum / maximum price. Used only if a currency is specified. Is expressed an array, with the lower bound as first element, and the upper bound as second element. When only one element, will have just the lower bound. To specify only the upper bound, prefix the value with a comma.
     *
     * @return self
     */
    public function setPriceRange($price_range)
    {
        if (is_null($price_range)) {
            throw new \InvalidArgumentException('non-nullable price_range cannot be null');
        }
        $this->container['price_range'] = $price_range;

        return $this;
    }

    /**
     * Gets product_number
     *
     * @return string|null
     */
    public function getProductNumber()
    {
        return $this->container['product_number'];
    }

    /**
     * Sets product_number
     *
     * @param string|null $product_number Textual search for a product number for webshop only.
     *
     * @return self
     */
    public function setProductNumber($product_number)
    {
        if (is_null($product_number)) {
            throw new \InvalidArgumentException('non-nullable product_number cannot be null');
        }
        $this->container['product_number'] = $product_number;

        return $this;
    }

    /**
     * Gets has_images
     *
     * @return bool|null
     */
    public function getHasImages()
    {
        return $this->container['has_images'];
    }

    /**
     * Sets has_images
     *
     * @param bool|null $has_images When set to `true` only advertisements with images are returned
     *
     * @return self
     */
    public function setHasImages($has_images)
    {
        if (is_null($has_images)) {
            throw new \InvalidArgumentException('non-nullable has_images cannot be null');
        }
        $this->container['has_images'] = $has_images;

        return $this;
    }

    /**
     * Gets publication_period
     *
     * @return \DateTime[]|null
     */
    public function getPublicationPeriod()
    {
        return $this->container['publication_period'];
    }

    /**
     * Sets publication_period
     *
     * @param \DateTime[]|null $publication_period The minimum / maximum publication date. Is expressed an array, with the lower bound as first element, and the upper bound as second element. When only one element, will have just the lower bound. To specify only the upper bound, prefix the value with a comma.
     *
     * @return self
     */
    public function setPublicationPeriod($publication_period)
    {
        if (is_null($publication_period)) {
            throw new \InvalidArgumentException('non-nullable publication_period cannot be null');
        }
        $this->container['publication_period'] = $publication_period;

        return $this;
    }

    /**
     * Gets expiration_period
     *
     * @return \DateTime[]|null
     */
    public function getExpirationPeriod()
    {
        return $this->container['expiration_period'];
    }

    /**
     * Sets expiration_period
     *
     * @param \DateTime[]|null $expiration_period The minimum / maximum expiration date. Is expressed an array, with the lower bound as first element, and the upper bound as second element. When only one element, will have just the lower bound. To specify only the upper bound, prefix the value with a comma.
     *
     * @return self
     */
    public function setExpirationPeriod($expiration_period)
    {
        if (is_null($expiration_period)) {
            throw new \InvalidArgumentException('non-nullable expiration_period cannot be null');
        }
        $this->container['expiration_period'] = $expiration_period;

        return $this;
    }

    /**
     * Gets favorite_for
     *
     * @return string|null
     */
    public function getFavoriteFor()
    {
        return $this->container['favorite_for'];
    }

    /**
     * Sets favorite_for
     *
     * @param string|null $favorite_for Either id or an identification, such as login name, e-mail, etc, for the advertisement owner. The allowed identification methods are those the authenticated user can use on keywords search.
     *
     * @return self
     */
    public function setFavoriteFor($favorite_for)
    {
        if (is_null($favorite_for)) {
            throw new \InvalidArgumentException('non-nullable favorite_for cannot be null');
        }
        $this->container['favorite_for'] = $favorite_for;

        return $this;
    }

    /**
     * Gets kind
     *
     * @return \OpenAPI\Client\Model\AdKind|null
     */
    public function getKind()
    {
        return $this->container['kind'];
    }

    /**
     * Sets kind
     *
     * @param \OpenAPI\Client\Model\AdKind|null $kind kind
     *
     * @return self
     */
    public function setKind($kind)
    {
        if (is_null($kind)) {
            throw new \InvalidArgumentException('non-nullable kind cannot be null');
        }
        $this->container['kind'] = $kind;

        return $this;
    }

    /**
     * Gets statuses
     *
     * @return \OpenAPI\Client\Model\AdStatusEnum[]|null
     */
    public function getStatuses()
    {
        return $this->container['statuses'];
    }

    /**
     * Sets statuses
     *
     * @param \OpenAPI\Client\Model\AdStatusEnum[]|null $statuses statuses
     *
     * @return self
     */
    public function setStatuses($statuses)
    {
        if (is_null($statuses)) {
            throw new \InvalidArgumentException('non-nullable statuses cannot be null');
        }
        $this->container['statuses'] = $statuses;

        return $this;
    }

    /**
     * Gets order_by
     *
     * @return \OpenAPI\Client\Model\AdOrderByEnum|null
     */
    public function getOrderBy()
    {
        return $this->container['order_by'];
    }

    /**
     * Sets order_by
     *
     * @param \OpenAPI\Client\Model\AdOrderByEnum|null $order_by order_by
     *
     * @return self
     */
    public function setOrderBy($order_by)
    {
        if (is_null($order_by)) {
            throw new \InvalidArgumentException('non-nullable order_by cannot be null');
        }
        $this->container['order_by'] = $order_by;

        return $this;
    }

    /**
     * Gets address_result
     *
     * @return \OpenAPI\Client\Model\AdAddressResultEnum|null
     */
    public function getAddressResult()
    {
        return $this->container['address_result'];
    }

    /**
     * Sets address_result
     *
     * @param \OpenAPI\Client\Model\AdAddressResultEnum|null $address_result address_result
     *
     * @return self
     */
    public function setAddressResult($address_result)
    {
        if (is_null($address_result)) {
            throw new \InvalidArgumentException('non-nullable address_result cannot be null');
        }
        $this->container['address_result'] = $address_result;

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


