<?php
/**
 * AdNew
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
 * AdNew Class Doc Comment
 *
 * @category Class
 * @description Parameters for creating a new advertisement
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class AdNew implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'AdNew';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'name' => 'string',
        'description' => 'string',
        'publication_period' => '\OpenAPI\Client\Model\DatePeriod',
        'categories' => 'string[]',
        'currency' => 'string',
        'price' => 'float',
        'promotional_price' => 'float',
        'promotional_period' => '\OpenAPI\Client\Model\DatePeriod',
        'custom_values' => 'array<string,string>',
        'addresses' => 'string[]',
        'unlimited_stock' => 'bool',
        'stock_quantity' => 'float',
        'min_stock_quantity_to_notify' => 'float',
        'min_allowed_in_cart' => 'float',
        'max_allowed_in_cart' => 'float',
        'allow_decimal_quantity' => 'bool',
        'product_number' => 'string',
        'delivery_methods' => 'string[]',
        'submit_for_authorization' => 'bool',
        'hidden' => 'bool',
        'images' => 'string[]',
        'kind' => '\OpenAPI\Client\Model\AdNewAllOfKind'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'name' => null,
        'description' => null,
        'publication_period' => null,
        'categories' => null,
        'currency' => null,
        'price' => 'number',
        'promotional_price' => 'number',
        'promotional_period' => null,
        'custom_values' => null,
        'addresses' => null,
        'unlimited_stock' => null,
        'stock_quantity' => 'number',
        'min_stock_quantity_to_notify' => 'number',
        'min_allowed_in_cart' => 'number',
        'max_allowed_in_cart' => 'number',
        'allow_decimal_quantity' => null,
        'product_number' => null,
        'delivery_methods' => null,
        'submit_for_authorization' => null,
        'hidden' => null,
        'images' => null,
        'kind' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'name' => false,
        'description' => false,
        'publication_period' => false,
        'categories' => false,
        'currency' => false,
        'price' => false,
        'promotional_price' => false,
        'promotional_period' => false,
        'custom_values' => false,
        'addresses' => false,
        'unlimited_stock' => false,
        'stock_quantity' => false,
        'min_stock_quantity_to_notify' => false,
        'min_allowed_in_cart' => false,
        'max_allowed_in_cart' => false,
        'allow_decimal_quantity' => false,
        'product_number' => false,
        'delivery_methods' => false,
        'submit_for_authorization' => false,
        'hidden' => false,
        'images' => false,
        'kind' => false
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
        'name' => 'name',
        'description' => 'description',
        'publication_period' => 'publicationPeriod',
        'categories' => 'categories',
        'currency' => 'currency',
        'price' => 'price',
        'promotional_price' => 'promotionalPrice',
        'promotional_period' => 'promotionalPeriod',
        'custom_values' => 'customValues',
        'addresses' => 'addresses',
        'unlimited_stock' => 'unlimitedStock',
        'stock_quantity' => 'stockQuantity',
        'min_stock_quantity_to_notify' => 'minStockQuantityToNotify',
        'min_allowed_in_cart' => 'minAllowedInCart',
        'max_allowed_in_cart' => 'maxAllowedInCart',
        'allow_decimal_quantity' => 'allowDecimalQuantity',
        'product_number' => 'productNumber',
        'delivery_methods' => 'deliveryMethods',
        'submit_for_authorization' => 'submitForAuthorization',
        'hidden' => 'hidden',
        'images' => 'images',
        'kind' => 'kind'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'name' => 'setName',
        'description' => 'setDescription',
        'publication_period' => 'setPublicationPeriod',
        'categories' => 'setCategories',
        'currency' => 'setCurrency',
        'price' => 'setPrice',
        'promotional_price' => 'setPromotionalPrice',
        'promotional_period' => 'setPromotionalPeriod',
        'custom_values' => 'setCustomValues',
        'addresses' => 'setAddresses',
        'unlimited_stock' => 'setUnlimitedStock',
        'stock_quantity' => 'setStockQuantity',
        'min_stock_quantity_to_notify' => 'setMinStockQuantityToNotify',
        'min_allowed_in_cart' => 'setMinAllowedInCart',
        'max_allowed_in_cart' => 'setMaxAllowedInCart',
        'allow_decimal_quantity' => 'setAllowDecimalQuantity',
        'product_number' => 'setProductNumber',
        'delivery_methods' => 'setDeliveryMethods',
        'submit_for_authorization' => 'setSubmitForAuthorization',
        'hidden' => 'setHidden',
        'images' => 'setImages',
        'kind' => 'setKind'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'name' => 'getName',
        'description' => 'getDescription',
        'publication_period' => 'getPublicationPeriod',
        'categories' => 'getCategories',
        'currency' => 'getCurrency',
        'price' => 'getPrice',
        'promotional_price' => 'getPromotionalPrice',
        'promotional_period' => 'getPromotionalPeriod',
        'custom_values' => 'getCustomValues',
        'addresses' => 'getAddresses',
        'unlimited_stock' => 'getUnlimitedStock',
        'stock_quantity' => 'getStockQuantity',
        'min_stock_quantity_to_notify' => 'getMinStockQuantityToNotify',
        'min_allowed_in_cart' => 'getMinAllowedInCart',
        'max_allowed_in_cart' => 'getMaxAllowedInCart',
        'allow_decimal_quantity' => 'getAllowDecimalQuantity',
        'product_number' => 'getProductNumber',
        'delivery_methods' => 'getDeliveryMethods',
        'submit_for_authorization' => 'getSubmitForAuthorization',
        'hidden' => 'getHidden',
        'images' => 'getImages',
        'kind' => 'getKind'
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
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('description', $data ?? [], null);
        $this->setIfExists('publication_period', $data ?? [], null);
        $this->setIfExists('categories', $data ?? [], null);
        $this->setIfExists('currency', $data ?? [], null);
        $this->setIfExists('price', $data ?? [], null);
        $this->setIfExists('promotional_price', $data ?? [], null);
        $this->setIfExists('promotional_period', $data ?? [], null);
        $this->setIfExists('custom_values', $data ?? [], null);
        $this->setIfExists('addresses', $data ?? [], null);
        $this->setIfExists('unlimited_stock', $data ?? [], null);
        $this->setIfExists('stock_quantity', $data ?? [], null);
        $this->setIfExists('min_stock_quantity_to_notify', $data ?? [], null);
        $this->setIfExists('min_allowed_in_cart', $data ?? [], null);
        $this->setIfExists('max_allowed_in_cart', $data ?? [], null);
        $this->setIfExists('allow_decimal_quantity', $data ?? [], null);
        $this->setIfExists('product_number', $data ?? [], null);
        $this->setIfExists('delivery_methods', $data ?? [], null);
        $this->setIfExists('submit_for_authorization', $data ?? [], null);
        $this->setIfExists('hidden', $data ?? [], null);
        $this->setIfExists('images', $data ?? [], null);
        $this->setIfExists('kind', $data ?? [], null);
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
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The advertisement title
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description The advertisement description content, formatted as HTML
     *
     * @return self
     */
    public function setDescription($description)
    {
        if (is_null($description)) {
            throw new \InvalidArgumentException('non-nullable description cannot be null');
        }
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets publication_period
     *
     * @return \OpenAPI\Client\Model\DatePeriod|null
     */
    public function getPublicationPeriod()
    {
        return $this->container['publication_period'];
    }

    /**
     * Sets publication_period
     *
     * @param \OpenAPI\Client\Model\DatePeriod|null $publication_period publication_period
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
     * Gets categories
     *
     * @return string[]|null
     */
    public function getCategories()
    {
        return $this->container['categories'];
    }

    /**
     * Sets categories
     *
     * @param string[]|null $categories Either internal name or id of categories this advertisement belongs to. In most cases an advertisement will have a single category, but this depends on the Cyclos configuration.
     *
     * @return self
     */
    public function setCategories($categories)
    {
        if (is_null($categories)) {
            throw new \InvalidArgumentException('non-nullable categories cannot be null');
        }
        $this->container['categories'] = $categories;

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
     * @param string|null $currency Either internal name or id of the advertisement's price currency
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
     * Gets price
     *
     * @return float|null
     */
    public function getPrice()
    {
        return $this->container['price'];
    }

    /**
     * Sets price
     *
     * @param float|null $price The regular price
     *
     * @return self
     */
    public function setPrice($price)
    {
        if (is_null($price)) {
            throw new \InvalidArgumentException('non-nullable price cannot be null');
        }
        $this->container['price'] = $price;

        return $this;
    }

    /**
     * Gets promotional_price
     *
     * @return float|null
     */
    public function getPromotionalPrice()
    {
        return $this->container['promotional_price'];
    }

    /**
     * Sets promotional_price
     *
     * @param float|null $promotional_price The promotional price, if any
     *
     * @return self
     */
    public function setPromotionalPrice($promotional_price)
    {
        if (is_null($promotional_price)) {
            throw new \InvalidArgumentException('non-nullable promotional_price cannot be null');
        }
        $this->container['promotional_price'] = $promotional_price;

        return $this;
    }

    /**
     * Gets promotional_period
     *
     * @return \OpenAPI\Client\Model\DatePeriod|null
     */
    public function getPromotionalPeriod()
    {
        return $this->container['promotional_period'];
    }

    /**
     * Sets promotional_period
     *
     * @param \OpenAPI\Client\Model\DatePeriod|null $promotional_period promotional_period
     *
     * @return self
     */
    public function setPromotionalPeriod($promotional_period)
    {
        if (is_null($promotional_period)) {
            throw new \InvalidArgumentException('non-nullable promotional_period cannot be null');
        }
        $this->container['promotional_period'] = $promotional_period;

        return $this;
    }

    /**
     * Gets custom_values
     *
     * @return array<string,string>|null
     */
    public function getCustomValues()
    {
        return $this->container['custom_values'];
    }

    /**
     * Sets custom_values
     *
     * @param array<string,string>|null $custom_values Holds the custom field values, keyed by field internal name or id. The format of the value depends on the custom field type. Example: `{..., \"customValues\": {\"gender\": \"male\", \"birthDate\": \"1980-10-27\"}}`
     *
     * @return self
     */
    public function setCustomValues($custom_values)
    {
        if (is_null($custom_values)) {
            throw new \InvalidArgumentException('non-nullable custom_values cannot be null');
        }
        $this->container['custom_values'] = $custom_values;

        return $this;
    }

    /**
     * Gets addresses
     *
     * @return string[]|null
     */
    public function getAddresses()
    {
        return $this->container['addresses'];
    }

    /**
     * Sets addresses
     *
     * @param string[]|null $addresses Ids of the public addresses (belonging to the advertisement owner) this advertisement is available at.
     *
     * @return self
     */
    public function setAddresses($addresses)
    {
        if (is_null($addresses)) {
            throw new \InvalidArgumentException('non-nullable addresses cannot be null');
        }
        $this->container['addresses'] = $addresses;

        return $this;
    }

    /**
     * Gets unlimited_stock
     *
     * @return bool|null
     */
    public function getUnlimitedStock()
    {
        return $this->container['unlimited_stock'];
    }

    /**
     * Sets unlimited_stock
     *
     * @param bool|null $unlimited_stock Whether the stock is unlimited or not. If true then it means there is always disponibility of the webshop and the `stockQuantity` and `minStockQuantityToNotify` are meaningless.
     *
     * @return self
     */
    public function setUnlimitedStock($unlimited_stock)
    {
        if (is_null($unlimited_stock)) {
            throw new \InvalidArgumentException('non-nullable unlimited_stock cannot be null');
        }
        $this->container['unlimited_stock'] = $unlimited_stock;

        return $this;
    }

    /**
     * Gets stock_quantity
     *
     * @return float|null
     */
    public function getStockQuantity()
    {
        return $this->container['stock_quantity'];
    }

    /**
     * Sets stock_quantity
     *
     * @param float|null $stock_quantity The quantity in stock (if `unlimitedStock` is false). Only for webshop.
     *
     * @return self
     */
    public function setStockQuantity($stock_quantity)
    {
        if (is_null($stock_quantity)) {
            throw new \InvalidArgumentException('non-nullable stock_quantity cannot be null');
        }
        $this->container['stock_quantity'] = $stock_quantity;

        return $this;
    }

    /**
     * Gets min_stock_quantity_to_notify
     *
     * @return float|null
     */
    public function getMinStockQuantityToNotify()
    {
        return $this->container['min_stock_quantity_to_notify'];
    }

    /**
     * Sets min_stock_quantity_to_notify
     *
     * @param float|null $min_stock_quantity_to_notify Reached this minimum limit a notification will be sent to the user indicating there is low stock for this webshop. Only for webshop.
     *
     * @return self
     */
    public function setMinStockQuantityToNotify($min_stock_quantity_to_notify)
    {
        if (is_null($min_stock_quantity_to_notify)) {
            throw new \InvalidArgumentException('non-nullable min_stock_quantity_to_notify cannot be null');
        }
        $this->container['min_stock_quantity_to_notify'] = $min_stock_quantity_to_notify;

        return $this;
    }

    /**
     * Gets min_allowed_in_cart
     *
     * @return float|null
     */
    public function getMinAllowedInCart()
    {
        return $this->container['min_allowed_in_cart'];
    }

    /**
     * Sets min_allowed_in_cart
     *
     * @param float|null $min_allowed_in_cart Minimum quantity allowed in a shopping cart. Only for webshop.
     *
     * @return self
     */
    public function setMinAllowedInCart($min_allowed_in_cart)
    {
        if (is_null($min_allowed_in_cart)) {
            throw new \InvalidArgumentException('non-nullable min_allowed_in_cart cannot be null');
        }
        $this->container['min_allowed_in_cart'] = $min_allowed_in_cart;

        return $this;
    }

    /**
     * Gets max_allowed_in_cart
     *
     * @return float|null
     */
    public function getMaxAllowedInCart()
    {
        return $this->container['max_allowed_in_cart'];
    }

    /**
     * Sets max_allowed_in_cart
     *
     * @param float|null $max_allowed_in_cart Maximum quantity allowed in a shopping cart. Only for webshop.
     *
     * @return self
     */
    public function setMaxAllowedInCart($max_allowed_in_cart)
    {
        if (is_null($max_allowed_in_cart)) {
            throw new \InvalidArgumentException('non-nullable max_allowed_in_cart cannot be null');
        }
        $this->container['max_allowed_in_cart'] = $max_allowed_in_cart;

        return $this;
    }

    /**
     * Gets allow_decimal_quantity
     *
     * @return bool|null
     */
    public function getAllowDecimalQuantity()
    {
        return $this->container['allow_decimal_quantity'];
    }

    /**
     * Sets allow_decimal_quantity
     *
     * @param bool|null $allow_decimal_quantity Whether a decimal quantity of this webshop can be added to the shopping cart or not.
     *
     * @return self
     */
    public function setAllowDecimalQuantity($allow_decimal_quantity)
    {
        if (is_null($allow_decimal_quantity)) {
            throw new \InvalidArgumentException('non-nullable allow_decimal_quantity cannot be null');
        }
        $this->container['allow_decimal_quantity'] = $allow_decimal_quantity;

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
     * @param string|null $product_number The unique number assigned to this webshop. Required if it's not marked as generated in the user webshop settings. Only for webshop.
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
     * Gets delivery_methods
     *
     * @return string[]|null
     */
    public function getDeliveryMethods()
    {
        return $this->container['delivery_methods'];
    }

    /**
     * Sets delivery_methods
     *
     * @param string[]|null $delivery_methods Ids of delivery method (belonging to the advertisement owner) this advertisement has allowed.
     *
     * @return self
     */
    public function setDeliveryMethods($delivery_methods)
    {
        if (is_null($delivery_methods)) {
            throw new \InvalidArgumentException('non-nullable delivery_methods cannot be null');
        }
        $this->container['delivery_methods'] = $delivery_methods;

        return $this;
    }

    /**
     * Gets submit_for_authorization
     *
     * @return bool|null
     */
    public function getSubmitForAuthorization()
    {
        return $this->container['submit_for_authorization'];
    }

    /**
     * Sets submit_for_authorization
     *
     * @param bool|null $submit_for_authorization Only useful when authorization is required (`AdDataForNew`/`AdDataForEdit`.`requiresAuthorization` flag is `true`). Indicates whether the advertisement will be initially submitted for authorization (status = `pending`) or kept in the `draft` status.
     *
     * @return self
     */
    public function setSubmitForAuthorization($submit_for_authorization)
    {
        if (is_null($submit_for_authorization)) {
            throw new \InvalidArgumentException('non-nullable submit_for_authorization cannot be null');
        }
        $this->container['submit_for_authorization'] = $submit_for_authorization;

        return $this;
    }

    /**
     * Gets hidden
     *
     * @return bool|null
     */
    public function getHidden()
    {
        return $this->container['hidden'];
    }

    /**
     * Sets hidden
     *
     * @param bool|null $hidden Only useful when authorization is not required (`AdDataForNew`/`AdDataForEdit`.`requiresAuthorization` flag is `false`). Indicates whether the initial status for the advertisement should be `hidden` (when `true`) or `active` (when `false`).
     *
     * @return self
     */
    public function setHidden($hidden)
    {
        if (is_null($hidden)) {
            throw new \InvalidArgumentException('non-nullable hidden cannot be null');
        }
        $this->container['hidden'] = $hidden;

        return $this;
    }

    /**
     * Gets images
     *
     * @return string[]|null
     */
    public function getImages()
    {
        return $this->container['images'];
    }

    /**
     * Sets images
     *
     * @param string[]|null $images The ids of previously uploaded user temporary images to be initially used as advertisement images
     *
     * @return self
     */
    public function setImages($images)
    {
        if (is_null($images)) {
            throw new \InvalidArgumentException('non-nullable images cannot be null');
        }
        $this->container['images'] = $images;

        return $this;
    }

    /**
     * Gets kind
     *
     * @return \OpenAPI\Client\Model\AdNewAllOfKind|null
     */
    public function getKind()
    {
        return $this->container['kind'];
    }

    /**
     * Sets kind
     *
     * @param \OpenAPI\Client\Model\AdNewAllOfKind|null $kind kind
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


