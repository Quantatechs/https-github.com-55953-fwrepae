<?php
/**
 * RunOperationResult
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
 * RunOperationResult Class Doc Comment
 *
 * @category Class
 * @description Defines what is returned when a custom operation is executed. The actual property that are filled depend on the &#x60;resultType&#x60; property. Not returned when the &#x60;resultType&#x60; is file. In that case, the response content will be the file content
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class RunOperationResult implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'RunOperationResult';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'title' => 'string',
        'content' => 'string',
        'notification' => 'string',
        'url' => 'string',
        'back_to' => '\OpenAPI\Client\Model\EntityReference',
        'back_to_root' => 'bool',
        're_run' => 'bool',
        'auto_run_action_id' => 'string',
        'columns' => '\OpenAPI\Client\Model\RunOperationResultColumn[]',
        'rows' => 'array<string,mixed>[]',
        'actions' => '\OpenAPI\Client\Model\RunOperationAction[]',
        'result_type' => '\OpenAPI\Client\Model\OperationResultTypeEnum',
        'notification_level' => '\OpenAPI\Client\Model\NotificationLevelEnum',
        'receipt' => '\OpenAPI\Client\Model\Receipt'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'title' => null,
        'content' => null,
        'notification' => null,
        'url' => null,
        'back_to' => null,
        'back_to_root' => null,
        're_run' => null,
        'auto_run_action_id' => null,
        'columns' => null,
        'rows' => null,
        'actions' => null,
        'result_type' => null,
        'notification_level' => null,
        'receipt' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'title' => false,
        'content' => false,
        'notification' => false,
        'url' => false,
        'back_to' => false,
        'back_to_root' => false,
        're_run' => false,
        'auto_run_action_id' => false,
        'columns' => false,
        'rows' => false,
        'actions' => false,
        'result_type' => false,
        'notification_level' => false,
        'receipt' => false
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
        'title' => 'title',
        'content' => 'content',
        'notification' => 'notification',
        'url' => 'url',
        'back_to' => 'backTo',
        'back_to_root' => 'backToRoot',
        're_run' => 'reRun',
        'auto_run_action_id' => 'autoRunActionId',
        'columns' => 'columns',
        'rows' => 'rows',
        'actions' => 'actions',
        'result_type' => 'resultType',
        'notification_level' => 'notificationLevel',
        'receipt' => 'receipt'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'title' => 'setTitle',
        'content' => 'setContent',
        'notification' => 'setNotification',
        'url' => 'setUrl',
        'back_to' => 'setBackTo',
        'back_to_root' => 'setBackToRoot',
        're_run' => 'setReRun',
        'auto_run_action_id' => 'setAutoRunActionId',
        'columns' => 'setColumns',
        'rows' => 'setRows',
        'actions' => 'setActions',
        'result_type' => 'setResultType',
        'notification_level' => 'setNotificationLevel',
        'receipt' => 'setReceipt'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'title' => 'getTitle',
        'content' => 'getContent',
        'notification' => 'getNotification',
        'url' => 'getUrl',
        'back_to' => 'getBackTo',
        'back_to_root' => 'getBackToRoot',
        're_run' => 'getReRun',
        'auto_run_action_id' => 'getAutoRunActionId',
        'columns' => 'getColumns',
        'rows' => 'getRows',
        'actions' => 'getActions',
        'result_type' => 'getResultType',
        'notification_level' => 'getNotificationLevel',
        'receipt' => 'getReceipt'
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
        $this->setIfExists('title', $data ?? [], null);
        $this->setIfExists('content', $data ?? [], null);
        $this->setIfExists('notification', $data ?? [], null);
        $this->setIfExists('url', $data ?? [], null);
        $this->setIfExists('back_to', $data ?? [], null);
        $this->setIfExists('back_to_root', $data ?? [], null);
        $this->setIfExists('re_run', $data ?? [], null);
        $this->setIfExists('auto_run_action_id', $data ?? [], null);
        $this->setIfExists('columns', $data ?? [], null);
        $this->setIfExists('rows', $data ?? [], null);
        $this->setIfExists('actions', $data ?? [], null);
        $this->setIfExists('result_type', $data ?? [], null);
        $this->setIfExists('notification_level', $data ?? [], null);
        $this->setIfExists('receipt', $data ?? [], null);
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
     * Gets title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string|null $title The text title. May be returned only if `resultType` is either `plainText`, `richText` or `resultPage`.
     *
     * @return self
     */
    public function setTitle($title)
    {
        if (is_null($title)) {
            throw new \InvalidArgumentException('non-nullable title cannot be null');
        }
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets content
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->container['content'];
    }

    /**
     * Sets content
     *
     * @param string|null $content The execution result content. Only returned if `resultType` is either `plainText` or `richText`.
     *
     * @return self
     */
    public function setContent($content)
    {
        if (is_null($content)) {
            throw new \InvalidArgumentException('non-nullable content cannot be null');
        }
        $this->container['content'] = $content;

        return $this;
    }

    /**
     * Gets notification
     *
     * @return string|null
     */
    public function getNotification()
    {
        return $this->container['notification'];
    }

    /**
     * Sets notification
     *
     * @param string|null $notification The execution result as string that should be shown as a notification. Only returned if `resultType` is `notification`.
     *
     * @return self
     */
    public function setNotification($notification)
    {
        if (is_null($notification)) {
            throw new \InvalidArgumentException('non-nullable notification cannot be null');
        }
        $this->container['notification'] = $notification;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string|null $url The execution result as an URL, to which the client should be redirected. Only returned if `resultType` is either `externalRedirect` or `url`.
     *
     * @return self
     */
    public function setUrl($url)
    {
        if (is_null($url)) {
            throw new \InvalidArgumentException('non-nullable url cannot be null');
        }
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets back_to
     *
     * @return \OpenAPI\Client\Model\EntityReference|null
     */
    public function getBackTo()
    {
        return $this->container['back_to'];
    }

    /**
     * Sets back_to
     *
     * @param \OpenAPI\Client\Model\EntityReference|null $back_to back_to
     *
     * @return self
     */
    public function setBackTo($back_to)
    {
        if (is_null($back_to)) {
            throw new \InvalidArgumentException('non-nullable back_to cannot be null');
        }
        $this->container['back_to'] = $back_to;

        return $this;
    }

    /**
     * Gets back_to_root
     *
     * @return bool|null
     */
    public function getBackToRoot()
    {
        return $this->container['back_to_root'];
    }

    /**
     * Sets back_to_root
     *
     * @param bool|null $back_to_root A boolean value indicating if the client application must go back to the page that originated the custom  operation executions.
     *
     * @return self
     */
    public function setBackToRoot($back_to_root)
    {
        if (is_null($back_to_root)) {
            throw new \InvalidArgumentException('non-nullable back_to_root cannot be null');
        }
        $this->container['back_to_root'] = $back_to_root;

        return $this;
    }

    /**
     * Gets re_run
     *
     * @return bool|null
     */
    public function getReRun()
    {
        return $this->container['re_run'];
    }

    /**
     * Sets re_run
     *
     * @param bool|null $re_run A boolean value indicating if the custom operation we went back to or the current action container operation must be re-run before displaying it.
     *
     * @return self
     */
    public function setReRun($re_run)
    {
        if (is_null($re_run)) {
            throw new \InvalidArgumentException('non-nullable re_run cannot be null');
        }
        $this->container['re_run'] = $re_run;

        return $this;
    }

    /**
     * Gets auto_run_action_id
     *
     * @return string|null
     */
    public function getAutoRunActionId()
    {
        return $this->container['auto_run_action_id'];
    }

    /**
     * Sets auto_run_action_id
     *
     * @param string|null $auto_run_action_id If it is present, it indicates the id of the action that should be executed automatically.
     *
     * @return self
     */
    public function setAutoRunActionId($auto_run_action_id)
    {
        if (is_null($auto_run_action_id)) {
            throw new \InvalidArgumentException('non-nullable auto_run_action_id cannot be null');
        }
        $this->container['auto_run_action_id'] = $auto_run_action_id;

        return $this;
    }

    /**
     * Gets columns
     *
     * @return \OpenAPI\Client\Model\RunOperationResultColumn[]|null
     */
    public function getColumns()
    {
        return $this->container['columns'];
    }

    /**
     * Sets columns
     *
     * @param \OpenAPI\Client\Model\RunOperationResultColumn[]|null $columns Contains the definitions for each column in the result. Only returned if `resultType` is `resultPage`.
     *
     * @return self
     */
    public function setColumns($columns)
    {
        if (is_null($columns)) {
            throw new \InvalidArgumentException('non-nullable columns cannot be null');
        }
        $this->container['columns'] = $columns;

        return $this;
    }

    /**
     * Gets rows
     *
     * @return array<string,mixed>[]|null
     */
    public function getRows()
    {
        return $this->container['rows'];
    }

    /**
     * Sets rows
     *
     * @param array<string,mixed>[]|null $rows Each row is an object containing the cells for that row, keyed by each column's `property`. Only returned if `resultType` is `resultPage`.
     *
     * @return self
     */
    public function setRows($rows)
    {
        if (is_null($rows)) {
            throw new \InvalidArgumentException('non-nullable rows cannot be null');
        }
        $this->container['rows'] = $rows;

        return $this;
    }

    /**
     * Gets actions
     *
     * @return \OpenAPI\Client\Model\RunOperationAction[]|null
     */
    public function getActions()
    {
        return $this->container['actions'];
    }

    /**
     * Sets actions
     *
     * @param \OpenAPI\Client\Model\RunOperationAction[]|null $actions Actions are other internal custom operations that can be executed from this custom operation. The returned parameters should be passed to the server when running this action.
     *
     * @return self
     */
    public function setActions($actions)
    {
        if (is_null($actions)) {
            throw new \InvalidArgumentException('non-nullable actions cannot be null');
        }
        $this->container['actions'] = $actions;

        return $this;
    }

    /**
     * Gets result_type
     *
     * @return \OpenAPI\Client\Model\OperationResultTypeEnum|null
     */
    public function getResultType()
    {
        return $this->container['result_type'];
    }

    /**
     * Sets result_type
     *
     * @param \OpenAPI\Client\Model\OperationResultTypeEnum|null $result_type result_type
     *
     * @return self
     */
    public function setResultType($result_type)
    {
        if (is_null($result_type)) {
            throw new \InvalidArgumentException('non-nullable result_type cannot be null');
        }
        $this->container['result_type'] = $result_type;

        return $this;
    }

    /**
     * Gets notification_level
     *
     * @return \OpenAPI\Client\Model\NotificationLevelEnum|null
     */
    public function getNotificationLevel()
    {
        return $this->container['notification_level'];
    }

    /**
     * Sets notification_level
     *
     * @param \OpenAPI\Client\Model\NotificationLevelEnum|null $notification_level notification_level
     *
     * @return self
     */
    public function setNotificationLevel($notification_level)
    {
        if (is_null($notification_level)) {
            throw new \InvalidArgumentException('non-nullable notification_level cannot be null');
        }
        $this->container['notification_level'] = $notification_level;

        return $this;
    }

    /**
     * Gets receipt
     *
     * @return \OpenAPI\Client\Model\Receipt|null
     */
    public function getReceipt()
    {
        return $this->container['receipt'];
    }

    /**
     * Sets receipt
     *
     * @param \OpenAPI\Client\Model\Receipt|null $receipt receipt
     *
     * @return self
     */
    public function setReceipt($receipt)
    {
        if (is_null($receipt)) {
            throw new \InvalidArgumentException('non-nullable receipt cannot be null');
        }
        $this->container['receipt'] = $receipt;

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


