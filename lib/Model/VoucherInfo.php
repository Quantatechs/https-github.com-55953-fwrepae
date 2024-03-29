<?php
/**
 * VoucherInfo
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
 * VoucherInfo Class Doc Comment
 *
 * @category Class
 * @description Contains information visible as guest in the application to get information about a voucher.
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class VoucherInfo implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'VoucherInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'token' => 'string',
        'pin_input' => '\OpenAPI\Client\Model\PasswordInput',
        'blocked_gift_by' => 'string',
        'forgot_pin_captcha_input' => '\OpenAPI\Client\Model\CaptchaInput',
        'forgot_pin_send_mediums' => '\OpenAPI\Client\Model\SendMediumEnum[]',
        'type' => '\OpenAPI\Client\Model\VoucherType',
        'status' => '\OpenAPI\Client\Model\VoucherStatusEnum',
        'personal' => 'string',
        'amount' => 'float',
        'balance' => 'float',
        'email' => 'string',
        'mobile_phone' => 'string',
        'notifications_enabled' => 'bool',
        'creation_date' => '\DateTime',
        'creation_type' => '\OpenAPI\Client\Model\VoucherCreationTypeEnum',
        'redeem_after_date' => '\DateTime',
        'redeem_after_date_reached' => 'bool',
        'expiration_date' => '\DateTime',
        'can_change_pin' => 'bool',
        'can_change_notification_settings' => 'bool',
        'phone_configuration' => '\OpenAPI\Client\Model\PhoneConfiguration',
        'redeem_on_week_days' => '\OpenAPI\Client\Model\WeekDayEnum[]',
        'single_redeem' => '\OpenAPI\Client\Model\VoucherTransaction',
        'has_transactions' => 'bool',
        'custom_values' => '\OpenAPI\Client\Model\CustomFieldValue[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'token' => null,
        'pin_input' => null,
        'blocked_gift_by' => null,
        'forgot_pin_captcha_input' => null,
        'forgot_pin_send_mediums' => null,
        'type' => null,
        'status' => null,
        'personal' => null,
        'amount' => 'number',
        'balance' => 'number',
        'email' => null,
        'mobile_phone' => null,
        'notifications_enabled' => null,
        'creation_date' => 'date-time',
        'creation_type' => null,
        'redeem_after_date' => 'date-time',
        'redeem_after_date_reached' => null,
        'expiration_date' => 'date-time',
        'can_change_pin' => null,
        'can_change_notification_settings' => null,
        'phone_configuration' => null,
        'redeem_on_week_days' => null,
        'single_redeem' => null,
        'has_transactions' => null,
        'custom_values' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'token' => false,
        'pin_input' => false,
        'blocked_gift_by' => false,
        'forgot_pin_captcha_input' => false,
        'forgot_pin_send_mediums' => false,
        'type' => false,
        'status' => false,
        'personal' => false,
        'amount' => false,
        'balance' => false,
        'email' => false,
        'mobile_phone' => false,
        'notifications_enabled' => false,
        'creation_date' => false,
        'creation_type' => false,
        'redeem_after_date' => false,
        'redeem_after_date_reached' => false,
        'expiration_date' => false,
        'can_change_pin' => false,
        'can_change_notification_settings' => false,
        'phone_configuration' => false,
        'redeem_on_week_days' => false,
        'single_redeem' => false,
        'has_transactions' => false,
        'custom_values' => false
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
        'token' => 'token',
        'pin_input' => 'pinInput',
        'blocked_gift_by' => 'blockedGiftBy',
        'forgot_pin_captcha_input' => 'forgotPinCaptchaInput',
        'forgot_pin_send_mediums' => 'forgotPinSendMediums',
        'type' => 'type',
        'status' => 'status',
        'personal' => 'personal',
        'amount' => 'amount',
        'balance' => 'balance',
        'email' => 'email',
        'mobile_phone' => 'mobilePhone',
        'notifications_enabled' => 'notificationsEnabled',
        'creation_date' => 'creationDate',
        'creation_type' => 'creationType',
        'redeem_after_date' => 'redeemAfterDate',
        'redeem_after_date_reached' => 'redeemAfterDateReached',
        'expiration_date' => 'expirationDate',
        'can_change_pin' => 'canChangePin',
        'can_change_notification_settings' => 'canChangeNotificationSettings',
        'phone_configuration' => 'phoneConfiguration',
        'redeem_on_week_days' => 'redeemOnWeekDays',
        'single_redeem' => 'singleRedeem',
        'has_transactions' => 'hasTransactions',
        'custom_values' => 'customValues'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'token' => 'setToken',
        'pin_input' => 'setPinInput',
        'blocked_gift_by' => 'setBlockedGiftBy',
        'forgot_pin_captcha_input' => 'setForgotPinCaptchaInput',
        'forgot_pin_send_mediums' => 'setForgotPinSendMediums',
        'type' => 'setType',
        'status' => 'setStatus',
        'personal' => 'setPersonal',
        'amount' => 'setAmount',
        'balance' => 'setBalance',
        'email' => 'setEmail',
        'mobile_phone' => 'setMobilePhone',
        'notifications_enabled' => 'setNotificationsEnabled',
        'creation_date' => 'setCreationDate',
        'creation_type' => 'setCreationType',
        'redeem_after_date' => 'setRedeemAfterDate',
        'redeem_after_date_reached' => 'setRedeemAfterDateReached',
        'expiration_date' => 'setExpirationDate',
        'can_change_pin' => 'setCanChangePin',
        'can_change_notification_settings' => 'setCanChangeNotificationSettings',
        'phone_configuration' => 'setPhoneConfiguration',
        'redeem_on_week_days' => 'setRedeemOnWeekDays',
        'single_redeem' => 'setSingleRedeem',
        'has_transactions' => 'setHasTransactions',
        'custom_values' => 'setCustomValues'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'token' => 'getToken',
        'pin_input' => 'getPinInput',
        'blocked_gift_by' => 'getBlockedGiftBy',
        'forgot_pin_captcha_input' => 'getForgotPinCaptchaInput',
        'forgot_pin_send_mediums' => 'getForgotPinSendMediums',
        'type' => 'getType',
        'status' => 'getStatus',
        'personal' => 'getPersonal',
        'amount' => 'getAmount',
        'balance' => 'getBalance',
        'email' => 'getEmail',
        'mobile_phone' => 'getMobilePhone',
        'notifications_enabled' => 'getNotificationsEnabled',
        'creation_date' => 'getCreationDate',
        'creation_type' => 'getCreationType',
        'redeem_after_date' => 'getRedeemAfterDate',
        'redeem_after_date_reached' => 'getRedeemAfterDateReached',
        'expiration_date' => 'getExpirationDate',
        'can_change_pin' => 'getCanChangePin',
        'can_change_notification_settings' => 'getCanChangeNotificationSettings',
        'phone_configuration' => 'getPhoneConfiguration',
        'redeem_on_week_days' => 'getRedeemOnWeekDays',
        'single_redeem' => 'getSingleRedeem',
        'has_transactions' => 'getHasTransactions',
        'custom_values' => 'getCustomValues'
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
        $this->setIfExists('token', $data ?? [], null);
        $this->setIfExists('pin_input', $data ?? [], null);
        $this->setIfExists('blocked_gift_by', $data ?? [], null);
        $this->setIfExists('forgot_pin_captcha_input', $data ?? [], null);
        $this->setIfExists('forgot_pin_send_mediums', $data ?? [], null);
        $this->setIfExists('type', $data ?? [], null);
        $this->setIfExists('status', $data ?? [], null);
        $this->setIfExists('personal', $data ?? [], null);
        $this->setIfExists('amount', $data ?? [], null);
        $this->setIfExists('balance', $data ?? [], null);
        $this->setIfExists('email', $data ?? [], null);
        $this->setIfExists('mobile_phone', $data ?? [], null);
        $this->setIfExists('notifications_enabled', $data ?? [], null);
        $this->setIfExists('creation_date', $data ?? [], null);
        $this->setIfExists('creation_type', $data ?? [], null);
        $this->setIfExists('redeem_after_date', $data ?? [], null);
        $this->setIfExists('redeem_after_date_reached', $data ?? [], null);
        $this->setIfExists('expiration_date', $data ?? [], null);
        $this->setIfExists('can_change_pin', $data ?? [], null);
        $this->setIfExists('can_change_notification_settings', $data ?? [], null);
        $this->setIfExists('phone_configuration', $data ?? [], null);
        $this->setIfExists('redeem_on_week_days', $data ?? [], null);
        $this->setIfExists('single_redeem', $data ?? [], null);
        $this->setIfExists('has_transactions', $data ?? [], null);
        $this->setIfExists('custom_values', $data ?? [], null);
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
     * Gets token
     *
     * @return string|null
     */
    public function getToken()
    {
        return $this->container['token'];
    }

    /**
     * Sets token
     *
     * @param string|null $token The voucher token
     *
     * @return self
     */
    public function setToken($token)
    {
        if (is_null($token)) {
            throw new \InvalidArgumentException('non-nullable token cannot be null');
        }
        $this->container['token'] = $token;

        return $this;
    }

    /**
     * Gets pin_input
     *
     * @return \OpenAPI\Client\Model\PasswordInput|null
     */
    public function getPinInput()
    {
        return $this->container['pin_input'];
    }

    /**
     * Sets pin_input
     *
     * @param \OpenAPI\Client\Model\PasswordInput|null $pin_input pin_input
     *
     * @return self
     */
    public function setPinInput($pin_input)
    {
        if (is_null($pin_input)) {
            throw new \InvalidArgumentException('non-nullable pin_input cannot be null');
        }
        $this->container['pin_input'] = $pin_input;

        return $this;
    }

    /**
     * Gets blocked_gift_by
     *
     * @return string|null
     */
    public function getBlockedGiftBy()
    {
        return $this->container['blocked_gift_by'];
    }

    /**
     * Sets blocked_gift_by
     *
     * @param string|null $blocked_gift_by Only returned for gift vouchers with PIN that weren't activated yet. Is the display of the user that issued the voucher
     *
     * @return self
     */
    public function setBlockedGiftBy($blocked_gift_by)
    {
        if (is_null($blocked_gift_by)) {
            throw new \InvalidArgumentException('non-nullable blocked_gift_by cannot be null');
        }
        $this->container['blocked_gift_by'] = $blocked_gift_by;

        return $this;
    }

    /**
     * Gets forgot_pin_captcha_input
     *
     * @return \OpenAPI\Client\Model\CaptchaInput|null
     */
    public function getForgotPinCaptchaInput()
    {
        return $this->container['forgot_pin_captcha_input'];
    }

    /**
     * Sets forgot_pin_captcha_input
     *
     * @param \OpenAPI\Client\Model\CaptchaInput|null $forgot_pin_captcha_input forgot_pin_captcha_input
     *
     * @return self
     */
    public function setForgotPinCaptchaInput($forgot_pin_captcha_input)
    {
        if (is_null($forgot_pin_captcha_input)) {
            throw new \InvalidArgumentException('non-nullable forgot_pin_captcha_input cannot be null');
        }
        $this->container['forgot_pin_captcha_input'] = $forgot_pin_captcha_input;

        return $this;
    }

    /**
     * Gets forgot_pin_send_mediums
     *
     * @return \OpenAPI\Client\Model\SendMediumEnum[]|null
     */
    public function getForgotPinSendMediums()
    {
        return $this->container['forgot_pin_send_mediums'];
    }

    /**
     * Sets forgot_pin_send_mediums
     *
     * @param \OpenAPI\Client\Model\SendMediumEnum[]|null $forgot_pin_send_mediums The allowed mediums used to send the pin when a forgot pin request is performed.
     *
     * @return self
     */
    public function setForgotPinSendMediums($forgot_pin_send_mediums)
    {
        if (is_null($forgot_pin_send_mediums)) {
            throw new \InvalidArgumentException('non-nullable forgot_pin_send_mediums cannot be null');
        }
        $this->container['forgot_pin_send_mediums'] = $forgot_pin_send_mediums;

        return $this;
    }

    /**
     * Gets type
     *
     * @return \OpenAPI\Client\Model\VoucherType|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param \OpenAPI\Client\Model\VoucherType|null $type type
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
     * Gets status
     *
     * @return \OpenAPI\Client\Model\VoucherStatusEnum|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param \OpenAPI\Client\Model\VoucherStatusEnum|null $status status
     *
     * @return self
     */
    public function setStatus($status)
    {
        if (is_null($status)) {
            throw new \InvalidArgumentException('non-nullable status cannot be null');
        }
        $this->container['status'] = $status;

        return $this;
    }

    /**
     * Gets personal
     *
     * @return string|null
     */
    public function getPersonal()
    {
        return $this->container['personal'];
    }

    /**
     * Sets personal
     *
     * @param string|null $personal When returned, indicates that this voucher is meant for personal use of this user
     *
     * @return self
     */
    public function setPersonal($personal)
    {
        if (is_null($personal)) {
            throw new \InvalidArgumentException('non-nullable personal cannot be null');
        }
        $this->container['personal'] = $personal;

        return $this;
    }

    /**
     * Gets amount
     *
     * @return float|null
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float|null $amount The voucher amount. Only returned if the voucher has a fixed amount defined on generation.
     *
     * @return self
     */
    public function setAmount($amount)
    {
        if (is_null($amount)) {
            throw new \InvalidArgumentException('non-nullable amount cannot be null');
        }
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets balance
     *
     * @return float|null
     */
    public function getBalance()
    {
        return $this->container['balance'];
    }

    /**
     * Sets balance
     *
     * @param float|null $balance The voucher balance.
     *
     * @return self
     */
    public function setBalance($balance)
    {
        if (is_null($balance)) {
            throw new \InvalidArgumentException('non-nullable balance cannot be null');
        }
        $this->container['balance'] = $balance;

        return $this;
    }

    /**
     * Gets email
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->container['email'];
    }

    /**
     * Sets email
     *
     * @param string|null $email The optional contact e-mail for this voucher. In case the voucher was sent this property is never null.
     *
     * @return self
     */
    public function setEmail($email)
    {
        if (is_null($email)) {
            throw new \InvalidArgumentException('non-nullable email cannot be null');
        }
        $this->container['email'] = $email;

        return $this;
    }

    /**
     * Gets mobile_phone
     *
     * @return string|null
     */
    public function getMobilePhone()
    {
        return $this->container['mobile_phone'];
    }

    /**
     * Sets mobile_phone
     *
     * @param string|null $mobile_phone The optional contact mobile phone for this voucher. Only applies if the voucher was not sent.
     *
     * @return self
     */
    public function setMobilePhone($mobile_phone)
    {
        if (is_null($mobile_phone)) {
            throw new \InvalidArgumentException('non-nullable mobile_phone cannot be null');
        }
        $this->container['mobile_phone'] = $mobile_phone;

        return $this;
    }

    /**
     * Gets notifications_enabled
     *
     * @return bool|null
     */
    public function getNotificationsEnabled()
    {
        return $this->container['notifications_enabled'];
    }

    /**
     * Sets notifications_enabled
     *
     * @param bool|null $notifications_enabled Whether the notifications are enabled or not.
     *
     * @return self
     */
    public function setNotificationsEnabled($notifications_enabled)
    {
        if (is_null($notifications_enabled)) {
            throw new \InvalidArgumentException('non-nullable notifications_enabled cannot be null');
        }
        $this->container['notifications_enabled'] = $notifications_enabled;

        return $this;
    }

    /**
     * Gets creation_date
     *
     * @return \DateTime|null
     */
    public function getCreationDate()
    {
        return $this->container['creation_date'];
    }

    /**
     * Sets creation_date
     *
     * @param \DateTime|null $creation_date The date the voucher was created.
     *
     * @return self
     */
    public function setCreationDate($creation_date)
    {
        if (is_null($creation_date)) {
            throw new \InvalidArgumentException('non-nullable creation_date cannot be null');
        }
        $this->container['creation_date'] = $creation_date;

        return $this;
    }

    /**
     * Gets creation_type
     *
     * @return \OpenAPI\Client\Model\VoucherCreationTypeEnum|null
     */
    public function getCreationType()
    {
        return $this->container['creation_type'];
    }

    /**
     * Sets creation_type
     *
     * @param \OpenAPI\Client\Model\VoucherCreationTypeEnum|null $creation_type creation_type
     *
     * @return self
     */
    public function setCreationType($creation_type)
    {
        if (is_null($creation_type)) {
            throw new \InvalidArgumentException('non-nullable creation_type cannot be null');
        }
        $this->container['creation_type'] = $creation_type;

        return $this;
    }

    /**
     * Gets redeem_after_date
     *
     * @return \DateTime|null
     */
    public function getRedeemAfterDate()
    {
        return $this->container['redeem_after_date'];
    }

    /**
     * Sets redeem_after_date
     *
     * @param \DateTime|null $redeem_after_date The date after which voucher can be redeemed.
     *
     * @return self
     */
    public function setRedeemAfterDate($redeem_after_date)
    {
        if (is_null($redeem_after_date)) {
            throw new \InvalidArgumentException('non-nullable redeem_after_date cannot be null');
        }
        $this->container['redeem_after_date'] = $redeem_after_date;

        return $this;
    }

    /**
     * Gets redeem_after_date_reached
     *
     * @return bool|null
     */
    public function getRedeemAfterDateReached()
    {
        return $this->container['redeem_after_date_reached'];
    }

    /**
     * Sets redeem_after_date_reached
     *
     * @param bool|null $redeem_after_date_reached Indicates whether the voucher can already be redeemed.
     *
     * @return self
     */
    public function setRedeemAfterDateReached($redeem_after_date_reached)
    {
        if (is_null($redeem_after_date_reached)) {
            throw new \InvalidArgumentException('non-nullable redeem_after_date_reached cannot be null');
        }
        $this->container['redeem_after_date_reached'] = $redeem_after_date_reached;

        return $this;
    }

    /**
     * Gets expiration_date
     *
     * @return \DateTime|null
     */
    public function getExpirationDate()
    {
        return $this->container['expiration_date'];
    }

    /**
     * Sets expiration_date
     *
     * @param \DateTime|null $expiration_date The date the voucher expires.
     *
     * @return self
     */
    public function setExpirationDate($expiration_date)
    {
        if (is_null($expiration_date)) {
            throw new \InvalidArgumentException('non-nullable expiration_date cannot be null');
        }
        $this->container['expiration_date'] = $expiration_date;

        return $this;
    }

    /**
     * Gets can_change_pin
     *
     * @return bool|null
     */
    public function getCanChangePin()
    {
        return $this->container['can_change_pin'];
    }

    /**
     * Sets can_change_pin
     *
     * @param bool|null $can_change_pin Indicates whether the voucher pin can be changed or not. The flag is true only if pin is used for this voucher.
     *
     * @return self
     */
    public function setCanChangePin($can_change_pin)
    {
        if (is_null($can_change_pin)) {
            throw new \InvalidArgumentException('non-nullable can_change_pin cannot be null');
        }
        $this->container['can_change_pin'] = $can_change_pin;

        return $this;
    }

    /**
     * Gets can_change_notification_settings
     *
     * @return bool|null
     */
    public function getCanChangeNotificationSettings()
    {
        return $this->container['can_change_notification_settings'];
    }

    /**
     * Sets can_change_notification_settings
     *
     * @param bool|null $can_change_notification_settings Indicates whether the notification settings for this voucher can be changed or not. The flag is true only if pin is used for this voucher and it was generated `inactive` or the voucher was sent.
     *
     * @return self
     */
    public function setCanChangeNotificationSettings($can_change_notification_settings)
    {
        if (is_null($can_change_notification_settings)) {
            throw new \InvalidArgumentException('non-nullable can_change_notification_settings cannot be null');
        }
        $this->container['can_change_notification_settings'] = $can_change_notification_settings;

        return $this;
    }

    /**
     * Gets phone_configuration
     *
     * @return \OpenAPI\Client\Model\PhoneConfiguration|null
     */
    public function getPhoneConfiguration()
    {
        return $this->container['phone_configuration'];
    }

    /**
     * Sets phone_configuration
     *
     * @param \OpenAPI\Client\Model\PhoneConfiguration|null $phone_configuration phone_configuration
     *
     * @return self
     */
    public function setPhoneConfiguration($phone_configuration)
    {
        if (is_null($phone_configuration)) {
            throw new \InvalidArgumentException('non-nullable phone_configuration cannot be null');
        }
        $this->container['phone_configuration'] = $phone_configuration;

        return $this;
    }

    /**
     * Gets redeem_on_week_days
     *
     * @return \OpenAPI\Client\Model\WeekDayEnum[]|null
     */
    public function getRedeemOnWeekDays()
    {
        return $this->container['redeem_on_week_days'];
    }

    /**
     * Sets redeem_on_week_days
     *
     * @param \OpenAPI\Client\Model\WeekDayEnum[]|null $redeem_on_week_days The days of the week a voucher can be redeemed.
     *
     * @return self
     */
    public function setRedeemOnWeekDays($redeem_on_week_days)
    {
        if (is_null($redeem_on_week_days)) {
            throw new \InvalidArgumentException('non-nullable redeem_on_week_days cannot be null');
        }
        $this->container['redeem_on_week_days'] = $redeem_on_week_days;

        return $this;
    }

    /**
     * Gets single_redeem
     *
     * @return \OpenAPI\Client\Model\VoucherTransaction|null
     */
    public function getSingleRedeem()
    {
        return $this->container['single_redeem'];
    }

    /**
     * Sets single_redeem
     *
     * @param \OpenAPI\Client\Model\VoucherTransaction|null $single_redeem single_redeem
     *
     * @return self
     */
    public function setSingleRedeem($single_redeem)
    {
        if (is_null($single_redeem)) {
            throw new \InvalidArgumentException('non-nullable single_redeem cannot be null');
        }
        $this->container['single_redeem'] = $single_redeem;

        return $this;
    }

    /**
     * Gets has_transactions
     *
     * @return bool|null
     */
    public function getHasTransactions()
    {
        return $this->container['has_transactions'];
    }

    /**
     * Sets has_transactions
     *
     * @param bool|null $has_transactions Indicates whether the voucher has transactions, that means, if there are any redeems of top-ups for this voucher. If so, a separated request to `GET /vouchers/{key}/transactions` should be performed in order to fetch them. Note that if `redeemDate` is returned, it means the voucher cannot be partially redeemed and was already fully redeemed. In this case, there are no more transactions to show, and this flag will be false.
     *
     * @return self
     */
    public function setHasTransactions($has_transactions)
    {
        if (is_null($has_transactions)) {
            throw new \InvalidArgumentException('non-nullable has_transactions cannot be null');
        }
        $this->container['has_transactions'] = $has_transactions;

        return $this;
    }

    /**
     * Gets custom_values
     *
     * @return \OpenAPI\Client\Model\CustomFieldValue[]|null
     */
    public function getCustomValues()
    {
        return $this->container['custom_values'];
    }

    /**
     * Sets custom_values
     *
     * @param \OpenAPI\Client\Model\CustomFieldValue[]|null $custom_values The list of custom field values this voucher has
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


