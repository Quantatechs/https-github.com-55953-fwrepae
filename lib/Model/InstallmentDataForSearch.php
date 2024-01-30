<?php
/**
 * InstallmentDataForSearch
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
 * InstallmentDataForSearch Class Doc Comment
 *
 * @category Class
 * @description Contains data used to search installments for a given owner
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class InstallmentDataForSearch implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'InstallmentDataForSearch';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'archiving_date' => '\DateTime',
        'export_formats' => '\OpenAPI\Client\Model\ExportFormat[]',
        'groups' => '\OpenAPI\Client\Model\Group[]',
        'account_types' => '\OpenAPI\Client\Model\AccountType[]',
        'can_view_authorized' => 'bool',
        'visible_kinds' => '\OpenAPI\Client\Model\TransactionKind[]',
        'custom_fields_in_search' => '\OpenAPI\Client\Model\CustomFieldDetailed[]',
        'custom_fields_in_list' => '\OpenAPI\Client\Model\CustomFieldDetailed[]',
        'custom_fields' => '\OpenAPI\Client\Model\CustomFieldDetailed[]',
        'fields_in_basic_search' => 'string[]',
        'fields_in_list' => 'string[]',
        'user' => '\OpenAPI\Client\Model\InstallmentDataForSearchAllOfUser',
        'query' => '\OpenAPI\Client\Model\InstallmentDataForSearchAllOfQuery'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'archiving_date' => 'date-time',
        'export_formats' => null,
        'groups' => null,
        'account_types' => null,
        'can_view_authorized' => null,
        'visible_kinds' => null,
        'custom_fields_in_search' => null,
        'custom_fields_in_list' => null,
        'custom_fields' => null,
        'fields_in_basic_search' => null,
        'fields_in_list' => null,
        'user' => null,
        'query' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'archiving_date' => false,
        'export_formats' => false,
        'groups' => false,
        'account_types' => false,
        'can_view_authorized' => false,
        'visible_kinds' => false,
        'custom_fields_in_search' => false,
        'custom_fields_in_list' => false,
        'custom_fields' => false,
        'fields_in_basic_search' => false,
        'fields_in_list' => false,
        'user' => false,
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
        'archiving_date' => 'archivingDate',
        'export_formats' => 'exportFormats',
        'groups' => 'groups',
        'account_types' => 'accountTypes',
        'can_view_authorized' => 'canViewAuthorized',
        'visible_kinds' => 'visibleKinds',
        'custom_fields_in_search' => 'customFieldsInSearch',
        'custom_fields_in_list' => 'customFieldsInList',
        'custom_fields' => 'customFields',
        'fields_in_basic_search' => 'fieldsInBasicSearch',
        'fields_in_list' => 'fieldsInList',
        'user' => 'user',
        'query' => 'query'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'archiving_date' => 'setArchivingDate',
        'export_formats' => 'setExportFormats',
        'groups' => 'setGroups',
        'account_types' => 'setAccountTypes',
        'can_view_authorized' => 'setCanViewAuthorized',
        'visible_kinds' => 'setVisibleKinds',
        'custom_fields_in_search' => 'setCustomFieldsInSearch',
        'custom_fields_in_list' => 'setCustomFieldsInList',
        'custom_fields' => 'setCustomFields',
        'fields_in_basic_search' => 'setFieldsInBasicSearch',
        'fields_in_list' => 'setFieldsInList',
        'user' => 'setUser',
        'query' => 'setQuery'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'archiving_date' => 'getArchivingDate',
        'export_formats' => 'getExportFormats',
        'groups' => 'getGroups',
        'account_types' => 'getAccountTypes',
        'can_view_authorized' => 'getCanViewAuthorized',
        'visible_kinds' => 'getVisibleKinds',
        'custom_fields_in_search' => 'getCustomFieldsInSearch',
        'custom_fields_in_list' => 'getCustomFieldsInList',
        'custom_fields' => 'getCustomFields',
        'fields_in_basic_search' => 'getFieldsInBasicSearch',
        'fields_in_list' => 'getFieldsInList',
        'user' => 'getUser',
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
        $this->setIfExists('archiving_date', $data ?? [], null);
        $this->setIfExists('export_formats', $data ?? [], null);
        $this->setIfExists('groups', $data ?? [], null);
        $this->setIfExists('account_types', $data ?? [], null);
        $this->setIfExists('can_view_authorized', $data ?? [], null);
        $this->setIfExists('visible_kinds', $data ?? [], null);
        $this->setIfExists('custom_fields_in_search', $data ?? [], null);
        $this->setIfExists('custom_fields_in_list', $data ?? [], null);
        $this->setIfExists('custom_fields', $data ?? [], null);
        $this->setIfExists('fields_in_basic_search', $data ?? [], null);
        $this->setIfExists('fields_in_list', $data ?? [], null);
        $this->setIfExists('user', $data ?? [], null);
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
     * Gets archiving_date
     *
     * @return \DateTime|null
     */
    public function getArchivingDate()
    {
        return $this->container['archiving_date'];
    }

    /**
     * Sets archiving_date
     *
     * @param \DateTime|null $archiving_date If not null, it means that data archiving is enabled, and is the lower bound date of the retention period
     *
     * @return self
     */
    public function setArchivingDate($archiving_date)
    {
        if (is_null($archiving_date)) {
            throw new \InvalidArgumentException('non-nullable archiving_date cannot be null');
        }
        $this->container['archiving_date'] = $archiving_date;

        return $this;
    }

    /**
     * Gets export_formats
     *
     * @return \OpenAPI\Client\Model\ExportFormat[]|null
     */
    public function getExportFormats()
    {
        return $this->container['export_formats'];
    }

    /**
     * Sets export_formats
     *
     * @param \OpenAPI\Client\Model\ExportFormat[]|null $export_formats The formats which the search results can be exported.
     *
     * @return self
     */
    public function setExportFormats($export_formats)
    {
        if (is_null($export_formats)) {
            throw new \InvalidArgumentException('non-nullable export_formats cannot be null');
        }
        $this->container['export_formats'] = $export_formats;

        return $this;
    }

    /**
     * Gets groups
     *
     * @return \OpenAPI\Client\Model\Group[]|null
     */
    public function getGroups()
    {
        return $this->container['groups'];
    }

    /**
     * Sets groups
     *
     * @param \OpenAPI\Client\Model\Group[]|null $groups Groups that can be used to filter entries, so that only transfers from or to users of those groups are returned on search. Is only returned if the authenticated user is an administrator.
     *
     * @return self
     */
    public function setGroups($groups)
    {
        if (is_null($groups)) {
            throw new \InvalidArgumentException('non-nullable groups cannot be null');
        }
        $this->container['groups'] = $groups;

        return $this;
    }

    /**
     * Gets account_types
     *
     * @return \OpenAPI\Client\Model\AccountType[]|null
     */
    public function getAccountTypes()
    {
        return $this->container['account_types'];
    }

    /**
     * Sets account_types
     *
     * @param \OpenAPI\Client\Model\AccountType[]|null $account_types Visible account types from the given owner
     *
     * @return self
     */
    public function setAccountTypes($account_types)
    {
        if (is_null($account_types)) {
            throw new \InvalidArgumentException('non-nullable account_types cannot be null');
        }
        $this->container['account_types'] = $account_types;

        return $this;
    }

    /**
     * Gets can_view_authorized
     *
     * @return bool|null
     */
    public function getCanViewAuthorized()
    {
        return $this->container['can_view_authorized'];
    }

    /**
     * Sets can_view_authorized
     *
     * @param bool|null $can_view_authorized Can the authenticated user view authorized transactions of this owner?
     *
     * @return self
     */
    public function setCanViewAuthorized($can_view_authorized)
    {
        if (is_null($can_view_authorized)) {
            throw new \InvalidArgumentException('non-nullable can_view_authorized cannot be null');
        }
        $this->container['can_view_authorized'] = $can_view_authorized;

        return $this;
    }

    /**
     * Gets visible_kinds
     *
     * @return \OpenAPI\Client\Model\TransactionKind[]|null
     */
    public function getVisibleKinds()
    {
        return $this->container['visible_kinds'];
    }

    /**
     * Sets visible_kinds
     *
     * @param \OpenAPI\Client\Model\TransactionKind[]|null $visible_kinds Contains the transaction kinds the authenticated user can view over this owner. Only kinds that allow installments are returned.
     *
     * @return self
     */
    public function setVisibleKinds($visible_kinds)
    {
        if (is_null($visible_kinds)) {
            throw new \InvalidArgumentException('non-nullable visible_kinds cannot be null');
        }
        $this->container['visible_kinds'] = $visible_kinds;

        return $this;
    }

    /**
     * Gets custom_fields_in_search
     *
     * @return \OpenAPI\Client\Model\CustomFieldDetailed[]|null
     * @deprecated
     */
    public function getCustomFieldsInSearch()
    {
        return $this->container['custom_fields_in_search'];
    }

    /**
     * Sets custom_fields_in_search
     *
     * @param \OpenAPI\Client\Model\CustomFieldDetailed[]|null $custom_fields_in_search Use `fieldsInBasicSearch` instead.   Detailed references for custom fields that are set to be used as search filters
     *
     * @return self
     * @deprecated
     */
    public function setCustomFieldsInSearch($custom_fields_in_search)
    {
        if (is_null($custom_fields_in_search)) {
            throw new \InvalidArgumentException('non-nullable custom_fields_in_search cannot be null');
        }
        $this->container['custom_fields_in_search'] = $custom_fields_in_search;

        return $this;
    }

    /**
     * Gets custom_fields_in_list
     *
     * @return \OpenAPI\Client\Model\CustomFieldDetailed[]|null
     * @deprecated
     */
    public function getCustomFieldsInList()
    {
        return $this->container['custom_fields_in_list'];
    }

    /**
     * Sets custom_fields_in_list
     *
     * @param \OpenAPI\Client\Model\CustomFieldDetailed[]|null $custom_fields_in_list Use `fieldsInList` instead.   Simple references for custom fields that are set to be used on the search result list
     *
     * @return self
     * @deprecated
     */
    public function setCustomFieldsInList($custom_fields_in_list)
    {
        if (is_null($custom_fields_in_list)) {
            throw new \InvalidArgumentException('non-nullable custom_fields_in_list cannot be null');
        }
        $this->container['custom_fields_in_list'] = $custom_fields_in_list;

        return $this;
    }

    /**
     * Gets custom_fields
     *
     * @return \OpenAPI\Client\Model\CustomFieldDetailed[]|null
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     *
     * @param \OpenAPI\Client\Model\CustomFieldDetailed[]|null $custom_fields The list of custom fields that can be used as search filters if the internal names are present in the `fieldsInBasicSearch` property.
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
     * Gets fields_in_basic_search
     *
     * @return string[]|null
     */
    public function getFieldsInBasicSearch()
    {
        return $this->container['fields_in_basic_search'];
    }

    /**
     * Sets fields_in_basic_search
     *
     * @param string[]|null $fields_in_basic_search The internal names of the custom fields that should be used as search filters in the basic section (separated fields, not keywords)
     *
     * @return self
     */
    public function setFieldsInBasicSearch($fields_in_basic_search)
    {
        if (is_null($fields_in_basic_search)) {
            throw new \InvalidArgumentException('non-nullable fields_in_basic_search cannot be null');
        }
        $this->container['fields_in_basic_search'] = $fields_in_basic_search;

        return $this;
    }

    /**
     * Gets fields_in_list
     *
     * @return string[]|null
     */
    public function getFieldsInList()
    {
        return $this->container['fields_in_list'];
    }

    /**
     * Sets fields_in_list
     *
     * @param string[]|null $fields_in_list The internal names of the contact custom fields that will be returned together with each record, and should be shown in the result list
     *
     * @return self
     */
    public function setFieldsInList($fields_in_list)
    {
        if (is_null($fields_in_list)) {
            throw new \InvalidArgumentException('non-nullable fields_in_list cannot be null');
        }
        $this->container['fields_in_list'] = $fields_in_list;

        return $this;
    }

    /**
     * Gets user
     *
     * @return \OpenAPI\Client\Model\InstallmentDataForSearchAllOfUser|null
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param \OpenAPI\Client\Model\InstallmentDataForSearchAllOfUser|null $user user
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
     * Gets query
     *
     * @return \OpenAPI\Client\Model\InstallmentDataForSearchAllOfQuery|null
     */
    public function getQuery()
    {
        return $this->container['query'];
    }

    /**
     * Sets query
     *
     * @param \OpenAPI\Client\Model\InstallmentDataForSearchAllOfQuery|null $query query
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

