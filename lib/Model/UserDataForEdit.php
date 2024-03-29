<?php
/**
 * UserDataForEdit
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
 * UserDataForEdit Class Doc Comment
 *
 * @category Class
 * @description Contains data used to edit a user profile
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class UserDataForEdit implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'UserDataForEdit';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'email_required' => 'bool',
        'enable_privacy' => 'bool',
        'profile_field_actions' => 'array<string,\OpenAPI\Client\Model\ProfileFieldActions>',
        'custom_fields' => '\OpenAPI\Client\Model\UserCustomFieldDetailed[]',
        'binary_values' => '\OpenAPI\Client\Model\CustomFieldBinaryValues',
        'name_label' => 'string',
        'details' => '\OpenAPI\Client\Model\UserDataForEditAllOfDetails',
        'user' => '\OpenAPI\Client\Model\UserDataForEditAllOfUser',
        'role' => '\OpenAPI\Client\Model\RoleEnum',
        'email_pending_validation' => 'string',
        'confirmation_password_input' => '\OpenAPI\Client\Model\UserDataForEditAllOfConfirmationPasswordInput'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'email_required' => null,
        'enable_privacy' => null,
        'profile_field_actions' => null,
        'custom_fields' => null,
        'binary_values' => null,
        'name_label' => null,
        'details' => null,
        'user' => null,
        'role' => null,
        'email_pending_validation' => null,
        'confirmation_password_input' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'email_required' => false,
        'enable_privacy' => false,
        'profile_field_actions' => false,
        'custom_fields' => false,
        'binary_values' => false,
        'name_label' => false,
        'details' => false,
        'user' => false,
        'role' => false,
        'email_pending_validation' => false,
        'confirmation_password_input' => false
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
        'email_required' => 'emailRequired',
        'enable_privacy' => 'enablePrivacy',
        'profile_field_actions' => 'profileFieldActions',
        'custom_fields' => 'customFields',
        'binary_values' => 'binaryValues',
        'name_label' => 'nameLabel',
        'details' => 'details',
        'user' => 'user',
        'role' => 'role',
        'email_pending_validation' => 'emailPendingValidation',
        'confirmation_password_input' => 'confirmationPasswordInput'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'email_required' => 'setEmailRequired',
        'enable_privacy' => 'setEnablePrivacy',
        'profile_field_actions' => 'setProfileFieldActions',
        'custom_fields' => 'setCustomFields',
        'binary_values' => 'setBinaryValues',
        'name_label' => 'setNameLabel',
        'details' => 'setDetails',
        'user' => 'setUser',
        'role' => 'setRole',
        'email_pending_validation' => 'setEmailPendingValidation',
        'confirmation_password_input' => 'setConfirmationPasswordInput'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'email_required' => 'getEmailRequired',
        'enable_privacy' => 'getEnablePrivacy',
        'profile_field_actions' => 'getProfileFieldActions',
        'custom_fields' => 'getCustomFields',
        'binary_values' => 'getBinaryValues',
        'name_label' => 'getNameLabel',
        'details' => 'getDetails',
        'user' => 'getUser',
        'role' => 'getRole',
        'email_pending_validation' => 'getEmailPendingValidation',
        'confirmation_password_input' => 'getConfirmationPasswordInput'
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
        $this->setIfExists('email_required', $data ?? [], null);
        $this->setIfExists('enable_privacy', $data ?? [], null);
        $this->setIfExists('profile_field_actions', $data ?? [], null);
        $this->setIfExists('custom_fields', $data ?? [], null);
        $this->setIfExists('binary_values', $data ?? [], null);
        $this->setIfExists('name_label', $data ?? [], null);
        $this->setIfExists('details', $data ?? [], null);
        $this->setIfExists('user', $data ?? [], null);
        $this->setIfExists('role', $data ?? [], null);
        $this->setIfExists('email_pending_validation', $data ?? [], null);
        $this->setIfExists('confirmation_password_input', $data ?? [], null);
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
     * Gets email_required
     *
     * @return bool|null
     */
    public function getEmailRequired()
    {
        return $this->container['email_required'];
    }

    /**
     * Sets email_required
     *
     * @param bool|null $email_required Indicates whether the e-mail is required
     *
     * @return self
     */
    public function setEmailRequired($email_required)
    {
        if (is_null($email_required)) {
            throw new \InvalidArgumentException('non-nullable email_required cannot be null');
        }
        $this->container['email_required'] = $email_required;

        return $this;
    }

    /**
     * Gets enable_privacy
     *
     * @return bool|null
     */
    public function getEnablePrivacy()
    {
        return $this->container['enable_privacy'];
    }

    /**
     * Sets enable_privacy
     *
     * @param bool|null $enable_privacy Indicates whether privacy over profile fields can be controlled for this user.
     *
     * @return self
     */
    public function setEnablePrivacy($enable_privacy)
    {
        if (is_null($enable_privacy)) {
            throw new \InvalidArgumentException('non-nullable enable_privacy cannot be null');
        }
        $this->container['enable_privacy'] = $enable_privacy;

        return $this;
    }

    /**
     * Gets profile_field_actions
     *
     * @return array<string,\OpenAPI\Client\Model\ProfileFieldActions>|null
     */
    public function getProfileFieldActions()
    {
        return $this->container['profile_field_actions'];
    }

    /**
     * Sets profile_field_actions
     *
     * @param array<string,\OpenAPI\Client\Model\ProfileFieldActions>|null $profile_field_actions An object, keyed by profile field internal name (either one of the basic profile fields or custom fields), containing other objects that defines the allowed actions over these profile fields
     *
     * @return self
     */
    public function setProfileFieldActions($profile_field_actions)
    {
        if (is_null($profile_field_actions)) {
            throw new \InvalidArgumentException('non-nullable profile_field_actions cannot be null');
        }
        $this->container['profile_field_actions'] = $profile_field_actions;

        return $this;
    }

    /**
     * Gets custom_fields
     *
     * @return \OpenAPI\Client\Model\UserCustomFieldDetailed[]|null
     */
    public function getCustomFields()
    {
        return $this->container['custom_fields'];
    }

    /**
     * Sets custom_fields
     *
     * @param \OpenAPI\Client\Model\UserCustomFieldDetailed[]|null $custom_fields The available custom field definitions
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
     * Gets binary_values
     *
     * @return \OpenAPI\Client\Model\CustomFieldBinaryValues|null
     */
    public function getBinaryValues()
    {
        return $this->container['binary_values'];
    }

    /**
     * Sets binary_values
     *
     * @param \OpenAPI\Client\Model\CustomFieldBinaryValues|null $binary_values binary_values
     *
     * @return self
     */
    public function setBinaryValues($binary_values)
    {
        if (is_null($binary_values)) {
            throw new \InvalidArgumentException('non-nullable binary_values cannot be null');
        }
        $this->container['binary_values'] = $binary_values;

        return $this;
    }

    /**
     * Gets name_label
     *
     * @return string|null
     */
    public function getNameLabel()
    {
        return $this->container['name_label'];
    }

    /**
     * Sets name_label
     *
     * @param string|null $name_label The label used for the name of users
     *
     * @return self
     */
    public function setNameLabel($name_label)
    {
        if (is_null($name_label)) {
            throw new \InvalidArgumentException('non-nullable name_label cannot be null');
        }
        $this->container['name_label'] = $name_label;

        return $this;
    }

    /**
     * Gets details
     *
     * @return \OpenAPI\Client\Model\UserDataForEditAllOfDetails|null
     */
    public function getDetails()
    {
        return $this->container['details'];
    }

    /**
     * Sets details
     *
     * @param \OpenAPI\Client\Model\UserDataForEditAllOfDetails|null $details details
     *
     * @return self
     */
    public function setDetails($details)
    {
        if (is_null($details)) {
            throw new \InvalidArgumentException('non-nullable details cannot be null');
        }
        $this->container['details'] = $details;

        return $this;
    }

    /**
     * Gets user
     *
     * @return \OpenAPI\Client\Model\UserDataForEditAllOfUser|null
     */
    public function getUser()
    {
        return $this->container['user'];
    }

    /**
     * Sets user
     *
     * @param \OpenAPI\Client\Model\UserDataForEditAllOfUser|null $user user
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
     * Gets role
     *
     * @return \OpenAPI\Client\Model\RoleEnum|null
     */
    public function getRole()
    {
        return $this->container['role'];
    }

    /**
     * Sets role
     *
     * @param \OpenAPI\Client\Model\RoleEnum|null $role role
     *
     * @return self
     */
    public function setRole($role)
    {
        if (is_null($role)) {
            throw new \InvalidArgumentException('non-nullable role cannot be null');
        }
        $this->container['role'] = $role;

        return $this;
    }

    /**
     * Gets email_pending_validation
     *
     * @return string|null
     */
    public function getEmailPendingValidation()
    {
        return $this->container['email_pending_validation'];
    }

    /**
     * Sets email_pending_validation
     *
     * @param string|null $email_pending_validation The new e-mail address, which is still pending validation. Is only returned when e-mail validation is enabled for edit profile, and the user has changed the e-mail address.
     *
     * @return self
     */
    public function setEmailPendingValidation($email_pending_validation)
    {
        if (is_null($email_pending_validation)) {
            throw new \InvalidArgumentException('non-nullable email_pending_validation cannot be null');
        }
        $this->container['email_pending_validation'] = $email_pending_validation;

        return $this;
    }

    /**
     * Gets confirmation_password_input
     *
     * @return \OpenAPI\Client\Model\UserDataForEditAllOfConfirmationPasswordInput|null
     */
    public function getConfirmationPasswordInput()
    {
        return $this->container['confirmation_password_input'];
    }

    /**
     * Sets confirmation_password_input
     *
     * @param \OpenAPI\Client\Model\UserDataForEditAllOfConfirmationPasswordInput|null $confirmation_password_input confirmation_password_input
     *
     * @return self
     */
    public function setConfirmationPasswordInput($confirmation_password_input)
    {
        if (is_null($confirmation_password_input)) {
            throw new \InvalidArgumentException('non-nullable confirmation_password_input cannot be null');
        }
        $this->container['confirmation_password_input'] = $confirmation_password_input;

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


