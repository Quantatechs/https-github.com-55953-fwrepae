<?php
/**
 * BankingPermissions
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
 * BankingPermissions Class Doc Comment
 *
 * @category Class
 * @description Permissions for banking
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class BankingPermissions implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'BankingPermissions';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'accounts' => '\OpenAPI\Client\Model\AccountPermissions[]',
        'account_visibility_settings' => 'bool',
        'payments' => '\OpenAPI\Client\Model\PaymentsPermissions',
        'authorizations' => '\OpenAPI\Client\Model\TransactionAuthorizationsPermissions',
        'scheduled_payments' => '\OpenAPI\Client\Model\ScheduledPaymentsPermissions',
        'external_payments' => '\OpenAPI\Client\Model\ExternalPaymentsPermissions',
        'payment_requests' => '\OpenAPI\Client\Model\PaymentRequestsPermissions',
        'tickets' => '\OpenAPI\Client\Model\TicketsPermissions',
        'search_users_with_balances' => 'bool',
        'search_general_transfers' => 'bool',
        'search_general_authorized_payments' => 'bool',
        'search_general_scheduled_payments' => 'bool',
        'search_general_external_payments' => 'bool',
        'search_general_payment_requests' => 'bool',
        'search_general_balance_limits' => 'bool',
        'search_general_payment_limits' => 'bool'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'accounts' => null,
        'account_visibility_settings' => null,
        'payments' => null,
        'authorizations' => null,
        'scheduled_payments' => null,
        'external_payments' => null,
        'payment_requests' => null,
        'tickets' => null,
        'search_users_with_balances' => null,
        'search_general_transfers' => null,
        'search_general_authorized_payments' => null,
        'search_general_scheduled_payments' => null,
        'search_general_external_payments' => null,
        'search_general_payment_requests' => null,
        'search_general_balance_limits' => null,
        'search_general_payment_limits' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'accounts' => false,
        'account_visibility_settings' => false,
        'payments' => false,
        'authorizations' => false,
        'scheduled_payments' => false,
        'external_payments' => false,
        'payment_requests' => false,
        'tickets' => false,
        'search_users_with_balances' => false,
        'search_general_transfers' => false,
        'search_general_authorized_payments' => false,
        'search_general_scheduled_payments' => false,
        'search_general_external_payments' => false,
        'search_general_payment_requests' => false,
        'search_general_balance_limits' => false,
        'search_general_payment_limits' => false
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
        'accounts' => 'accounts',
        'account_visibility_settings' => 'accountVisibilitySettings',
        'payments' => 'payments',
        'authorizations' => 'authorizations',
        'scheduled_payments' => 'scheduledPayments',
        'external_payments' => 'externalPayments',
        'payment_requests' => 'paymentRequests',
        'tickets' => 'tickets',
        'search_users_with_balances' => 'searchUsersWithBalances',
        'search_general_transfers' => 'searchGeneralTransfers',
        'search_general_authorized_payments' => 'searchGeneralAuthorizedPayments',
        'search_general_scheduled_payments' => 'searchGeneralScheduledPayments',
        'search_general_external_payments' => 'searchGeneralExternalPayments',
        'search_general_payment_requests' => 'searchGeneralPaymentRequests',
        'search_general_balance_limits' => 'searchGeneralBalanceLimits',
        'search_general_payment_limits' => 'searchGeneralPaymentLimits'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'accounts' => 'setAccounts',
        'account_visibility_settings' => 'setAccountVisibilitySettings',
        'payments' => 'setPayments',
        'authorizations' => 'setAuthorizations',
        'scheduled_payments' => 'setScheduledPayments',
        'external_payments' => 'setExternalPayments',
        'payment_requests' => 'setPaymentRequests',
        'tickets' => 'setTickets',
        'search_users_with_balances' => 'setSearchUsersWithBalances',
        'search_general_transfers' => 'setSearchGeneralTransfers',
        'search_general_authorized_payments' => 'setSearchGeneralAuthorizedPayments',
        'search_general_scheduled_payments' => 'setSearchGeneralScheduledPayments',
        'search_general_external_payments' => 'setSearchGeneralExternalPayments',
        'search_general_payment_requests' => 'setSearchGeneralPaymentRequests',
        'search_general_balance_limits' => 'setSearchGeneralBalanceLimits',
        'search_general_payment_limits' => 'setSearchGeneralPaymentLimits'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'accounts' => 'getAccounts',
        'account_visibility_settings' => 'getAccountVisibilitySettings',
        'payments' => 'getPayments',
        'authorizations' => 'getAuthorizations',
        'scheduled_payments' => 'getScheduledPayments',
        'external_payments' => 'getExternalPayments',
        'payment_requests' => 'getPaymentRequests',
        'tickets' => 'getTickets',
        'search_users_with_balances' => 'getSearchUsersWithBalances',
        'search_general_transfers' => 'getSearchGeneralTransfers',
        'search_general_authorized_payments' => 'getSearchGeneralAuthorizedPayments',
        'search_general_scheduled_payments' => 'getSearchGeneralScheduledPayments',
        'search_general_external_payments' => 'getSearchGeneralExternalPayments',
        'search_general_payment_requests' => 'getSearchGeneralPaymentRequests',
        'search_general_balance_limits' => 'getSearchGeneralBalanceLimits',
        'search_general_payment_limits' => 'getSearchGeneralPaymentLimits'
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
        $this->setIfExists('accounts', $data ?? [], null);
        $this->setIfExists('account_visibility_settings', $data ?? [], null);
        $this->setIfExists('payments', $data ?? [], null);
        $this->setIfExists('authorizations', $data ?? [], null);
        $this->setIfExists('scheduled_payments', $data ?? [], null);
        $this->setIfExists('external_payments', $data ?? [], null);
        $this->setIfExists('payment_requests', $data ?? [], null);
        $this->setIfExists('tickets', $data ?? [], null);
        $this->setIfExists('search_users_with_balances', $data ?? [], null);
        $this->setIfExists('search_general_transfers', $data ?? [], null);
        $this->setIfExists('search_general_authorized_payments', $data ?? [], null);
        $this->setIfExists('search_general_scheduled_payments', $data ?? [], null);
        $this->setIfExists('search_general_external_payments', $data ?? [], null);
        $this->setIfExists('search_general_payment_requests', $data ?? [], null);
        $this->setIfExists('search_general_balance_limits', $data ?? [], null);
        $this->setIfExists('search_general_payment_limits', $data ?? [], null);
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
     * Gets accounts
     *
     * @return \OpenAPI\Client\Model\AccountPermissions[]|null
     */
    public function getAccounts()
    {
        return $this->container['accounts'];
    }

    /**
     * Sets accounts
     *
     * @param \OpenAPI\Client\Model\AccountPermissions[]|null $accounts Permissions over each owned account
     *
     * @return self
     */
    public function setAccounts($accounts)
    {
        if (is_null($accounts)) {
            throw new \InvalidArgumentException('non-nullable accounts cannot be null');
        }
        $this->container['accounts'] = $accounts;

        return $this;
    }

    /**
     * Gets account_visibility_settings
     *
     * @return bool|null
     */
    public function getAccountVisibilitySettings()
    {
        return $this->container['account_visibility_settings'];
    }

    /**
     * Sets account_visibility_settings
     *
     * @param bool|null $account_visibility_settings Can the authenticated member set his own account visibility?
     *
     * @return self
     */
    public function setAccountVisibilitySettings($account_visibility_settings)
    {
        if (is_null($account_visibility_settings)) {
            throw new \InvalidArgumentException('non-nullable account_visibility_settings cannot be null');
        }
        $this->container['account_visibility_settings'] = $account_visibility_settings;

        return $this;
    }

    /**
     * Gets payments
     *
     * @return \OpenAPI\Client\Model\PaymentsPermissions|null
     */
    public function getPayments()
    {
        return $this->container['payments'];
    }

    /**
     * Sets payments
     *
     * @param \OpenAPI\Client\Model\PaymentsPermissions|null $payments payments
     *
     * @return self
     */
    public function setPayments($payments)
    {
        if (is_null($payments)) {
            throw new \InvalidArgumentException('non-nullable payments cannot be null');
        }
        $this->container['payments'] = $payments;

        return $this;
    }

    /**
     * Gets authorizations
     *
     * @return \OpenAPI\Client\Model\TransactionAuthorizationsPermissions|null
     */
    public function getAuthorizations()
    {
        return $this->container['authorizations'];
    }

    /**
     * Sets authorizations
     *
     * @param \OpenAPI\Client\Model\TransactionAuthorizationsPermissions|null $authorizations authorizations
     *
     * @return self
     */
    public function setAuthorizations($authorizations)
    {
        if (is_null($authorizations)) {
            throw new \InvalidArgumentException('non-nullable authorizations cannot be null');
        }
        $this->container['authorizations'] = $authorizations;

        return $this;
    }

    /**
     * Gets scheduled_payments
     *
     * @return \OpenAPI\Client\Model\ScheduledPaymentsPermissions|null
     */
    public function getScheduledPayments()
    {
        return $this->container['scheduled_payments'];
    }

    /**
     * Sets scheduled_payments
     *
     * @param \OpenAPI\Client\Model\ScheduledPaymentsPermissions|null $scheduled_payments scheduled_payments
     *
     * @return self
     */
    public function setScheduledPayments($scheduled_payments)
    {
        if (is_null($scheduled_payments)) {
            throw new \InvalidArgumentException('non-nullable scheduled_payments cannot be null');
        }
        $this->container['scheduled_payments'] = $scheduled_payments;

        return $this;
    }

    /**
     * Gets external_payments
     *
     * @return \OpenAPI\Client\Model\ExternalPaymentsPermissions|null
     */
    public function getExternalPayments()
    {
        return $this->container['external_payments'];
    }

    /**
     * Sets external_payments
     *
     * @param \OpenAPI\Client\Model\ExternalPaymentsPermissions|null $external_payments external_payments
     *
     * @return self
     */
    public function setExternalPayments($external_payments)
    {
        if (is_null($external_payments)) {
            throw new \InvalidArgumentException('non-nullable external_payments cannot be null');
        }
        $this->container['external_payments'] = $external_payments;

        return $this;
    }

    /**
     * Gets payment_requests
     *
     * @return \OpenAPI\Client\Model\PaymentRequestsPermissions|null
     */
    public function getPaymentRequests()
    {
        return $this->container['payment_requests'];
    }

    /**
     * Sets payment_requests
     *
     * @param \OpenAPI\Client\Model\PaymentRequestsPermissions|null $payment_requests payment_requests
     *
     * @return self
     */
    public function setPaymentRequests($payment_requests)
    {
        if (is_null($payment_requests)) {
            throw new \InvalidArgumentException('non-nullable payment_requests cannot be null');
        }
        $this->container['payment_requests'] = $payment_requests;

        return $this;
    }

    /**
     * Gets tickets
     *
     * @return \OpenAPI\Client\Model\TicketsPermissions|null
     */
    public function getTickets()
    {
        return $this->container['tickets'];
    }

    /**
     * Sets tickets
     *
     * @param \OpenAPI\Client\Model\TicketsPermissions|null $tickets tickets
     *
     * @return self
     */
    public function setTickets($tickets)
    {
        if (is_null($tickets)) {
            throw new \InvalidArgumentException('non-nullable tickets cannot be null');
        }
        $this->container['tickets'] = $tickets;

        return $this;
    }

    /**
     * Gets search_users_with_balances
     *
     * @return bool|null
     */
    public function getSearchUsersWithBalances()
    {
        return $this->container['search_users_with_balances'];
    }

    /**
     * Sets search_users_with_balances
     *
     * @param bool|null $search_users_with_balances Can the authenticated admin / broker search managed users together with their account balances?
     *
     * @return self
     */
    public function setSearchUsersWithBalances($search_users_with_balances)
    {
        if (is_null($search_users_with_balances)) {
            throw new \InvalidArgumentException('non-nullable search_users_with_balances cannot be null');
        }
        $this->container['search_users_with_balances'] = $search_users_with_balances;

        return $this;
    }

    /**
     * Gets search_general_transfers
     *
     * @return bool|null
     */
    public function getSearchGeneralTransfers()
    {
        return $this->container['search_general_transfers'];
    }

    /**
     * Sets search_general_transfers
     *
     * @param bool|null $search_general_transfers Can the authenticated admin / broker perform a general transfers search (all visible transfers, regardless of the user / account)?
     *
     * @return self
     */
    public function setSearchGeneralTransfers($search_general_transfers)
    {
        if (is_null($search_general_transfers)) {
            throw new \InvalidArgumentException('non-nullable search_general_transfers cannot be null');
        }
        $this->container['search_general_transfers'] = $search_general_transfers;

        return $this;
    }

    /**
     * Gets search_general_authorized_payments
     *
     * @return bool|null
     */
    public function getSearchGeneralAuthorizedPayments()
    {
        return $this->container['search_general_authorized_payments'];
    }

    /**
     * Sets search_general_authorized_payments
     *
     * @param bool|null $search_general_authorized_payments Can the authenticated admin / broker perform a general transaction search for authorizations?
     *
     * @return self
     */
    public function setSearchGeneralAuthorizedPayments($search_general_authorized_payments)
    {
        if (is_null($search_general_authorized_payments)) {
            throw new \InvalidArgumentException('non-nullable search_general_authorized_payments cannot be null');
        }
        $this->container['search_general_authorized_payments'] = $search_general_authorized_payments;

        return $this;
    }

    /**
     * Gets search_general_scheduled_payments
     *
     * @return bool|null
     */
    public function getSearchGeneralScheduledPayments()
    {
        return $this->container['search_general_scheduled_payments'];
    }

    /**
     * Sets search_general_scheduled_payments
     *
     * @param bool|null $search_general_scheduled_payments Can the authenticated admin / broker perform a general scheduled payments / installments search?
     *
     * @return self
     */
    public function setSearchGeneralScheduledPayments($search_general_scheduled_payments)
    {
        if (is_null($search_general_scheduled_payments)) {
            throw new \InvalidArgumentException('non-nullable search_general_scheduled_payments cannot be null');
        }
        $this->container['search_general_scheduled_payments'] = $search_general_scheduled_payments;

        return $this;
    }

    /**
     * Gets search_general_external_payments
     *
     * @return bool|null
     */
    public function getSearchGeneralExternalPayments()
    {
        return $this->container['search_general_external_payments'];
    }

    /**
     * Sets search_general_external_payments
     *
     * @param bool|null $search_general_external_payments Can the authenticated admin / broker perform a general external payments search?
     *
     * @return self
     */
    public function setSearchGeneralExternalPayments($search_general_external_payments)
    {
        if (is_null($search_general_external_payments)) {
            throw new \InvalidArgumentException('non-nullable search_general_external_payments cannot be null');
        }
        $this->container['search_general_external_payments'] = $search_general_external_payments;

        return $this;
    }

    /**
     * Gets search_general_payment_requests
     *
     * @return bool|null
     */
    public function getSearchGeneralPaymentRequests()
    {
        return $this->container['search_general_payment_requests'];
    }

    /**
     * Sets search_general_payment_requests
     *
     * @param bool|null $search_general_payment_requests Can the authenticated admin / broker perform a general payment requests search?
     *
     * @return self
     */
    public function setSearchGeneralPaymentRequests($search_general_payment_requests)
    {
        if (is_null($search_general_payment_requests)) {
            throw new \InvalidArgumentException('non-nullable search_general_payment_requests cannot be null');
        }
        $this->container['search_general_payment_requests'] = $search_general_payment_requests;

        return $this;
    }

    /**
     * Gets search_general_balance_limits
     *
     * @return bool|null
     */
    public function getSearchGeneralBalanceLimits()
    {
        return $this->container['search_general_balance_limits'];
    }

    /**
     * Sets search_general_balance_limits
     *
     * @param bool|null $search_general_balance_limits Can the authenticated admin / broker perform a general account balance limit search, for all visible accounts?
     *
     * @return self
     */
    public function setSearchGeneralBalanceLimits($search_general_balance_limits)
    {
        if (is_null($search_general_balance_limits)) {
            throw new \InvalidArgumentException('non-nullable search_general_balance_limits cannot be null');
        }
        $this->container['search_general_balance_limits'] = $search_general_balance_limits;

        return $this;
    }

    /**
     * Gets search_general_payment_limits
     *
     * @return bool|null
     */
    public function getSearchGeneralPaymentLimits()
    {
        return $this->container['search_general_payment_limits'];
    }

    /**
     * Sets search_general_payment_limits
     *
     * @param bool|null $search_general_payment_limits Can the authenticated admin / broker perform a general account payment limit search, for all visible accounts?
     *
     * @return self
     */
    public function setSearchGeneralPaymentLimits($search_general_payment_limits)
    {
        if (is_null($search_general_payment_limits)) {
            throw new \InvalidArgumentException('non-nullable search_general_payment_limits cannot be null');
        }
        $this->container['search_general_payment_limits'] = $search_general_payment_limits;

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


