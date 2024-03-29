<?php
/**
 * UserVoucherTransactionsDataForSearch
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
 * UserVoucherTransactionsDataForSearch Class Doc Comment
 *
 * @category Class
 * @description Contains configuration data for searching voucher transactions of a user
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UserVoucherTransactionsDataForSearch implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UserVoucherTransactionsDataForSearch';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'mask' => 'string',
        'types' => '\OpenAPI\Client\Model\VoucherType[]',
        'user' => '\OpenAPI\Client\Model\User',
        'can_redeem' => 'bool',
        'can_top_up' => 'bool',
        'operators' => '\OpenAPI\Client\Model\User[]',
        'top_up_enabled' => 'bool',
        'query' => '\OpenAPI\Client\Model\UserVoucherTransactionsQueryFilters'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'mask' => null,
        'types' => null,
        'user' => null,
        'can_redeem' => null,
        'can_top_up' => null,
        'operators' => null,
        'top_up_enabled' => null,
        'query' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'mask' => false,
        'types' => false,
        'user' => false,
        'can_redeem' => false,
        'can_top_up' => false,
        'operators' => false,
        'top_up_enabled' => false,
        'query' => false
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
        'mask' => 'mask',
        'types' => 'types',
        'user' => 'user',
        'can_redeem' => 'canRedeem',
        'can_top_up' => 'canTopUp',
        'operators' => 'operators',
        'top_up_enabled' => 'topUpEnabled',
        'query' => 'query'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'mask' => 'setMask',
        'types' => 'setTypes',
        'user' => 'setUser',
        'can_redeem' => 'setCanRedeem',
        'can_top_up' => 'setCanTopUp',
        'operators' => 'setOperators',
        'top_up_enabled' => 'setTopUpEnabled',
        'query' => 'setQuery'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'mask' => 'getMask',
        'types' => 'getTypes',
        'user' => 'getUser',
        'can_redeem' => 'getCanRedeem',
        'can_top_up' => 'getCanTopUp',
        'operators' => 'getOperators',
        'top_up_enabled' => 'getTopUpEnabled',
        'query' => 'getQuery'
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
        $this->setIfExists('mask', $data ?? [], null);
        $this->setIfExists('types', $data ?? [], null);
        $this->setIfExists('user', $data ?? [], null);
        $this->setIfExists('can_redeem', $data ?? [], null);
        $this->setIfExists('can_top_up', $data ?? [], null);
        $this->setIfExists('operators', $data ?? [], null);
        $this->setIfExists('top_up_enabled', $data ?? [], null);
        $this->setIfExists('query', $data ?? [], null);
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
     * Gets mask
     *
     * @return string|null
     */
    public function getMask()
    {
        return $this->container['mask'];
    }

    /**
     * Sets mask
     *
     * @param string|null $mask The input mask for voucher tokens. Optional.
     *
     * @return self
     */
    public function setMask($mask)
    {
        if (is_null($mask)) {
            throw new \InvalidArgumentException('non-nullable mask cannot be null');
        }
        $this->container['mask'] = $mask;

        return $this;
    }

    /**
     * Gets types
     *
     * @return \OpenAPI\Client\Model\VoucherType[]|null
     */
    public function getTypes()
    {
        return $this->container['types'];
    }

    /**
     * Sets types
     *
     * @param \OpenAPI\Client\Model\VoucherType[]|null $types The voucher types that can be used for searching
     *
     * @return self
     */
    public function setTypes($types)
    {
        if (is_null($types)) {
            throw new \InvalidArgumentException('non-nullable types cannot be null');
        }
        $this->container['types'] = $types;

        return $this;
    }

    /**
     * Gets user
     *
     * @return \OpenAPI\Client\Model\User|null
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param \OpenAPI\Client\Model\User|null $user user
     *
     * @return self
     */
    public function setUser($user)
    {
        if (is_null($user)) {
            throw new \InvalidArgumentException('non-nullable user cannot be null');
        }
        $this->container['user'] = $user;

        return $this;
    }

    /**
     * Gets can_redeem
     *
     * @return bool|null
     */
    public function getCanRedeem()
    {
        return $this->container['can_redeem'];
    }

    /**
     * Sets can_redeem
     *
     * @param bool|null $can_redeem Indicates whether the authenticated user can redeem vouchers in behalf of this user
     *
     * @return self
     */
    public function setCanRedeem($can_redeem)
    {
        if (is_null($can_redeem)) {
            throw new \InvalidArgumentException('non-nullable can_redeem cannot be null');
        }
        $this->container['can_redeem'] = $can_redeem;

        return $this;
    }

    /**
     * Gets can_top_up
     *
     * @return bool|null
     */
    public function getCanTopUp()
    {
        return $this->container['can_top_up'];
    }

    /**
     * Sets can_top_up
     *
     * @param bool|null $can_top_up Indicates whether the authenticated user can top-up vouchers in behalf of this user
     *
     * @return self
     */
    public function setCanTopUp($can_top_up)
    {
        if (is_null($can_top_up)) {
            throw new \InvalidArgumentException('non-nullable can_top_up cannot be null');
        }
        $this->container['can_top_up'] = $can_top_up;

        return $this;
    }

    /**
     * Gets operators
     *
     * @return \OpenAPI\Client\Model\User[]|null
     */
    public function getOperators()
    {
        return $this->container['operators'];
    }

    /**
     * Sets operators
     *
     * @param \OpenAPI\Client\Model\User[]|null $operators When searching for redeemed vouchers, the operators of the redeemer.
     *
     * @return self
     */
    public function setOperators($operators)
    {
        if (is_null($operators)) {
            throw new \InvalidArgumentException('non-nullable operators cannot be null');
        }
        $this->container['operators'] = $operators;

        return $this;
    }

    /**
     * Gets top_up_enabled
     *
     * @return bool|null
     */
    public function getTopUpEnabled()
    {
        return $this->container['top_up_enabled'];
    }

    /**
     * Sets top_up_enabled
     *
     * @param bool|null $top_up_enabled Indicates whether there is a voucher configuration supporting top-up which is enabled for this user and visible for the authenticated user. This flag is not related to the top-up permission.
     *
     * @return self
     */
    public function setTopUpEnabled($top_up_enabled)
    {
        if (is_null($top_up_enabled)) {
            throw new \InvalidArgumentException('non-nullable top_up_enabled cannot be null');
        }
        $this->container['top_up_enabled'] = $top_up_enabled;

        return $this;
    }

    /**
     * Gets query
     *
     * @return \OpenAPI\Client\Model\UserVoucherTransactionsQueryFilters|null
     */
    public function getQuery()
    {
        return $this->container['query'];
    }

    /**
     * Sets query
     *
     * @param \OpenAPI\Client\Model\UserVoucherTransactionsQueryFilters|null $query query
     *
     * @return self
     */
    public function setQuery($query)
    {
        if (is_null($query)) {
            throw new \InvalidArgumentException('non-nullable query cannot be null');
        }
        $this->container['query'] = $query;

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


