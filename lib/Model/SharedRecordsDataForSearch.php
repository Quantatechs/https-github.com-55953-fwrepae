<?php
/**
 * SharedRecordsDataForSearch
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
 * SharedRecordsDataForSearch Class Doc Comment
 *
 * @category Class
 * @description Data for searching records with shared fields (multiple types)
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class SharedRecordsDataForSearch implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'SharedRecordsDataForSearch';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'type' => '\OpenAPI\Client\Model\RecordType',
        'create' => 'bool',
        'edit' => 'bool',
        'remove' => 'bool',
        'custom_fields' => '\OpenAPI\Client\Model\CustomFieldDetailed[]',
        'fields_in_search' => 'string[]',
        'fields_in_list' => 'string[]',
        'hide_date_on_list' => 'bool',
        'export_formats' => '\OpenAPI\Client\Model\ExportFormat[]',
        'record_types' => '\OpenAPI\Client\Model\RecordType[]',
        'query' => '\OpenAPI\Client\Model\SharedRecordsDataForSearchAllOfQuery'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'type' => null,
        'create' => null,
        'edit' => null,
        'remove' => null,
        'custom_fields' => null,
        'fields_in_search' => null,
        'fields_in_list' => null,
        'hide_date_on_list' => null,
        'export_formats' => null,
        'record_types' => null,
        'query' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'type' => false,
        'create' => false,
        'edit' => false,
        'remove' => false,
        'custom_fields' => false,
        'fields_in_search' => false,
        'fields_in_list' => false,
        'hide_date_on_list' => false,
        'export_formats' => false,
        'record_types' => false,
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
        'type' => 'type',
        'create' => 'create',
        'edit' => 'edit',
        'remove' => 'remove',
        'custom_fields' => 'customFields',
        'fields_in_search' => 'fieldsInSearch',
        'fields_in_list' => 'fieldsInList',
        'hide_date_on_list' => 'hideDateOnList',
        'export_formats' => 'exportFormats',
        'record_types' => 'recordTypes',
        'query' => 'query'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'type' => 'setType',
        'create' => 'setCreate',
        'edit' => 'setEdit',
        'remove' => 'setRemove',
        'custom_fields' => 'setCustomFields',
        'fields_in_search' => 'setFieldsInSearch',
        'fields_in_list' => 'setFieldsInList',
        'hide_date_on_list' => 'setHideDateOnList',
        'export_formats' => 'setExportFormats',
        'record_types' => 'setRecordTypes',
        'query' => 'setQuery'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'type' => 'getType',
        'create' => 'getCreate',
        'edit' => 'getEdit',
        'remove' => 'getRemove',
        'custom_fields' => 'getCustomFields',
        'fields_in_search' => 'getFieldsInSearch',
        'fields_in_list' => 'getFieldsInList',
        'hide_date_on_list' => 'getHideDateOnList',
        'export_formats' => 'getExportFormats',
        'record_types' => 'getRecordTypes',
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
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('create', $data ?? [], null);
        $this->setIfExists('edit', $data ?? [], null);
        $this->setIfExists('remove', $data ?? [], null);
        $this->setIfExists('custom_fields', $data ?? [], null);
        $this->setIfExists('fields_in_search', $data ?? [], null);
        $this->setIfExists('fields_in_list', $data ?? [], null);
        $this->setIfExists('hide_date_on_list', $data ?? [], null);
        $this->setIfExists('export_formats', $data ?? [], null);
        $this->setIfExists('record_types', $data ?? [], null);
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
     * Gets type
     *
     * @return \OpenAPI\Client\Model\RecordType|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \OpenAPI\Client\Model\RecordType|null $type type
     *
     * @return self
     */
    public function setType($type)
    {
        if (is_null($type)) {
            throw new \InvalidArgumentException('non-nullable type cannot be null');
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets create
     *
     * @return bool|null
     */
    public function getCreate()
    {
        return $this->container['create'];
    }

    /**
     * Sets create
     *
     * @param bool|null $create Can the authenticated user create new records of this type?
     *
     * @return self
     */
    public function setCreate($create)
    {
        if (is_null($create)) {
            throw new \InvalidArgumentException('non-nullable create cannot be null');
        }
        $this->container['create'] = $create;

        return $this;
    }

    /**
     * Gets edit
     *
     * @return bool|null
     */
    public function getEdit()
    {
        return $this->container['edit'];
    }

    /**
     * Sets edit
     *
     * @param bool|null $edit Can the authenticated user edit records of this type?
     *
     * @return self
     */
    public function setEdit($edit)
    {
        if (is_null($edit)) {
            throw new \InvalidArgumentException('non-nullable edit cannot be null');
        }
        $this->container['edit'] = $edit;

        return $this;
    }

    /**
     * Gets remove
     *
     * @return bool|null
     */
    public function getRemove()
    {
        return $this->container['remove'];
    }

    /**
     * Sets remove
     *
     * @param bool|null $remove Can the authenticated user remove records of this type?
     *
     * @return self
     */
    public function setRemove($remove)
    {
        if (is_null($remove)) {
            throw new \InvalidArgumentException('non-nullable remove cannot be null');
        }
        $this->container['remove'] = $remove;

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
     * @param \OpenAPI\Client\Model\CustomFieldDetailed[]|null $custom_fields The list of record fields that are either to be used as search filter (if its internal name is present on `fieldsInSearch`) and / or in the result list (if its internal name is present on `fieldsInList`)
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
     * Gets fields_in_search
     *
     * @return string[]|null
     */
    public function getFieldsInSearch()
    {
        return $this->container['fields_in_search'];
    }

    /**
     * Sets fields_in_search
     *
     * @param string[]|null $fields_in_search The internal names of the record fields that should be used as search filters (separated fields, not keywords)
     *
     * @return self
     */
    public function setFieldsInSearch($fields_in_search)
    {
        if (is_null($fields_in_search)) {
            throw new \InvalidArgumentException('non-nullable fields_in_search cannot be null');
        }
        $this->container['fields_in_search'] = $fields_in_search;

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
     * @param string[]|null $fields_in_list The internal names of the record fields that will be returned together with each record, and should be shown in the result list
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
     * Gets hide_date_on_list
     *
     * @return bool|null
     */
    public function getHideDateOnList()
    {
        return $this->container['hide_date_on_list'];
    }

    /**
     * Sets hide_date_on_list
     *
     * @param bool|null $hide_date_on_list Whether the date column should be hidden on result list.
     *
     * @return self
     */
    public function setHideDateOnList($hide_date_on_list)
    {
        if (is_null($hide_date_on_list)) {
            throw new \InvalidArgumentException('non-nullable hide_date_on_list cannot be null');
        }
        $this->container['hide_date_on_list'] = $hide_date_on_list;

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
     * @param \OpenAPI\Client\Model\ExportFormat[]|null $export_formats The formats which the data can be exported
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
     * Gets record_types
     *
     * @return \OpenAPI\Client\Model\RecordType[]|null
     */
    public function getRecordTypes()
    {
        return $this->container['record_types'];
    }

    /**
     * Sets record_types
     *
     * @param \OpenAPI\Client\Model\RecordType[]|null $record_types The possible record types.
     *
     * @return self
     */
    public function setRecordTypes($record_types)
    {
        if (is_null($record_types)) {
            throw new \InvalidArgumentException('non-nullable record_types cannot be null');
        }
        $this->container['record_types'] = $record_types;

        return $this;
    }

    /**
     * Gets query
     *
     * @return \OpenAPI\Client\Model\SharedRecordsDataForSearchAllOfQuery|null
     */
    public function getQuery()
    {
        return $this->container['query'];
    }

    /**
     * Sets query
     *
     * @param \OpenAPI\Client\Model\SharedRecordsDataForSearchAllOfQuery|null $query query
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


