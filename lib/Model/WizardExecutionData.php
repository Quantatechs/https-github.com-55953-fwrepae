<?php
/**
 * WizardExecutionData
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
 * WizardExecutionData Class Doc Comment
 *
 * @category Class
 * @description Information for executing a custom wizard in a given step
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 * @implements \ArrayAccess<string, mixed>
 */
class WizardExecutionData implements ModelInterface, ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'WizardExecutionData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'key' => 'string',
        'wizard' => '\OpenAPI\Client\Model\Wizard',
        'user' => '\OpenAPI\Client\Model\User',
        'menu_item' => '\OpenAPI\Client\Model\EntityReference',
        'path' => '\OpenAPI\Client\Model\WizardStep[]',
        'step' => '\OpenAPI\Client\Model\WizardStepDetailed',
        'step_number' => 'int',
        'step_count' => 'int',
        'action' => '\OpenAPI\Client\Model\WizardActionEnum',
        'transitions' => '\OpenAPI\Client\Model\WizardStepTransition[]',
        'notification_level' => '\OpenAPI\Client\Model\NotificationLevelEnum',
        'notification' => 'string',
        'result_type' => '\OpenAPI\Client\Model\WizardResultTypeEnum',
        'result' => 'string',
        'result_title' => 'string',
        'registration_result' => '\OpenAPI\Client\Model\UserRegistrationResult',
        'params' => '\OpenAPI\Client\Model\WizardTransitionParams',
        'binary_values' => '\OpenAPI\Client\Model\CustomFieldBinaryValues',
        'code_sent_to_email' => 'string',
        'code_sent_to_phone' => 'string',
        'confirmation_password_input' => '\OpenAPI\Client\Model\PasswordInput'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'key' => null,
        'wizard' => null,
        'user' => null,
        'menu_item' => null,
        'path' => null,
        'step' => null,
        'step_number' => null,
        'step_count' => null,
        'action' => null,
        'transitions' => null,
        'notification_level' => null,
        'notification' => null,
        'result_type' => null,
        'result' => null,
        'result_title' => null,
        'registration_result' => null,
        'params' => null,
        'binary_values' => null,
        'code_sent_to_email' => null,
        'code_sent_to_phone' => null,
        'confirmation_password_input' => null
    ];

    /**
      * Array of nullable properties. Used for (de)serialization
      *
      * @var boolean[]
      */
    protected static array $openAPINullables = [
        'key' => false,
        'wizard' => false,
        'user' => false,
        'menu_item' => false,
        'path' => false,
        'step' => false,
        'step_number' => false,
        'step_count' => false,
        'action' => false,
        'transitions' => false,
        'notification_level' => false,
        'notification' => false,
        'result_type' => false,
        'result' => false,
        'result_title' => false,
        'registration_result' => false,
        'params' => false,
        'binary_values' => false,
        'code_sent_to_email' => false,
        'code_sent_to_phone' => false,
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
        'key' => 'key',
        'wizard' => 'wizard',
        'user' => 'user',
        'menu_item' => 'menuItem',
        'path' => 'path',
        'step' => 'step',
        'step_number' => 'stepNumber',
        'step_count' => 'stepCount',
        'action' => 'action',
        'transitions' => 'transitions',
        'notification_level' => 'notificationLevel',
        'notification' => 'notification',
        'result_type' => 'resultType',
        'result' => 'result',
        'result_title' => 'resultTitle',
        'registration_result' => 'registrationResult',
        'params' => 'params',
        'binary_values' => 'binaryValues',
        'code_sent_to_email' => 'codeSentToEmail',
        'code_sent_to_phone' => 'codeSentToPhone',
        'confirmation_password_input' => 'confirmationPasswordInput'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'key' => 'setKey',
        'wizard' => 'setWizard',
        'user' => 'setUser',
        'menu_item' => 'setMenuItem',
        'path' => 'setPath',
        'step' => 'setStep',
        'step_number' => 'setStepNumber',
        'step_count' => 'setStepCount',
        'action' => 'setAction',
        'transitions' => 'setTransitions',
        'notification_level' => 'setNotificationLevel',
        'notification' => 'setNotification',
        'result_type' => 'setResultType',
        'result' => 'setResult',
        'result_title' => 'setResultTitle',
        'registration_result' => 'setRegistrationResult',
        'params' => 'setParams',
        'binary_values' => 'setBinaryValues',
        'code_sent_to_email' => 'setCodeSentToEmail',
        'code_sent_to_phone' => 'setCodeSentToPhone',
        'confirmation_password_input' => 'setConfirmationPasswordInput'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'key' => 'getKey',
        'wizard' => 'getWizard',
        'user' => 'getUser',
        'menu_item' => 'getMenuItem',
        'path' => 'getPath',
        'step' => 'getStep',
        'step_number' => 'getStepNumber',
        'step_count' => 'getStepCount',
        'action' => 'getAction',
        'transitions' => 'getTransitions',
        'notification_level' => 'getNotificationLevel',
        'notification' => 'getNotification',
        'result_type' => 'getResultType',
        'result' => 'getResult',
        'result_title' => 'getResultTitle',
        'registration_result' => 'getRegistrationResult',
        'params' => 'getParams',
        'binary_values' => 'getBinaryValues',
        'code_sent_to_email' => 'getCodeSentToEmail',
        'code_sent_to_phone' => 'getCodeSentToPhone',
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
        $this->setIfExists('key', $data ?? [], null);
        $this->setIfExists('wizard', $data ?? [], null);
        $this->setIfExists('user', $data ?? [], null);
        $this->setIfExists('menu_item', $data ?? [], null);
        $this->setIfExists('path', $data ?? [], null);
        $this->setIfExists('step', $data ?? [], null);
        $this->setIfExists('step_number', $data ?? [], null);
        $this->setIfExists('step_count', $data ?? [], null);
        $this->setIfExists('action', $data ?? [], null);
        $this->setIfExists('transitions', $data ?? [], null);
        $this->setIfExists('notification_level', $data ?? [], null);
        $this->setIfExists('notification', $data ?? [], null);
        $this->setIfExists('result_type', $data ?? [], null);
        $this->setIfExists('result', $data ?? [], null);
        $this->setIfExists('result_title', $data ?? [], null);
        $this->setIfExists('registration_result', $data ?? [], null);
        $this->setIfExists('params', $data ?? [], null);
        $this->setIfExists('binary_values', $data ?? [], null);
        $this->setIfExists('code_sent_to_email', $data ?? [], null);
        $this->setIfExists('code_sent_to_phone', $data ?? [], null);
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
     * Gets key
     *
     * @return string|null
     */
    public function getKey()
    {
        return $this->container['key'];
    }

    /**
     * Sets key
     *
     * @param string|null $key The execution identifier
     *
     * @return self
     */
    public function setKey($key)
    {
        if (is_null($key)) {
            throw new \InvalidArgumentException('non-nullable key cannot be null');
        }
        $this->container['key'] = $key;

        return $this;
    }

    /**
     * Gets wizard
     *
     * @return \OpenAPI\Client\Model\Wizard|null
     */
    public function getWizard()
    {
        return $this->container['wizard'];
    }

    /**
     * Sets wizard
     *
     * @param \OpenAPI\Client\Model\Wizard|null $wizard wizard
     *
     * @return self
     */
    public function setWizard($wizard)
    {
        if (is_null($wizard)) {
            throw new \InvalidArgumentException('non-nullable wizard cannot be null');
        }
        $this->container['wizard'] = $wizard;

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
     * Gets menu_item
     *
     * @return \OpenAPI\Client\Model\EntityReference|null
     */
    public function getMenuItem()
    {
        return $this->container['menu_item'];
    }

    /**
     * Sets menu_item
     *
     * @param \OpenAPI\Client\Model\EntityReference|null $menu_item menu_item
     *
     * @return self
     */
    public function setMenuItem($menu_item)
    {
        if (is_null($menu_item)) {
            throw new \InvalidArgumentException('non-nullable menu_item cannot be null');
        }
        $this->container['menu_item'] = $menu_item;

        return $this;
    }

    /**
     * Gets path
     *
     * @return \OpenAPI\Client\Model\WizardStep[]|null
     */
    public function getPath()
    {
        return $this->container['path'];
    }

    /**
     * Sets path
     *
     * @param \OpenAPI\Client\Model\WizardStep[]|null $path Contains each previously executed step. The current step is not included.
     *
     * @return self
     */
    public function setPath($path)
    {
        if (is_null($path)) {
            throw new \InvalidArgumentException('non-nullable path cannot be null');
        }
        $this->container['path'] = $path;

        return $this;
    }

    /**
     * Gets step
     *
     * @return \OpenAPI\Client\Model\WizardStepDetailed|null
     */
    public function getStep()
    {
        return $this->container['step'];
    }

    /**
     * Sets step
     *
     * @param \OpenAPI\Client\Model\WizardStepDetailed|null $step step
     *
     * @return self
     */
    public function setStep($step)
    {
        if (is_null($step)) {
            throw new \InvalidArgumentException('non-nullable step cannot be null');
        }
        $this->container['step'] = $step;

        return $this;
    }

    /**
     * Gets step_number
     *
     * @return int|null
     */
    public function getStepNumber()
    {
        return $this->container['step_number'];
    }

    /**
     * Sets step_number
     *
     * @param int|null $step_number When the wizard contains a static set of steps, returns the number (1-based) of the current step.
     *
     * @return self
     */
    public function setStepNumber($step_number)
    {
        if (is_null($step_number)) {
            throw new \InvalidArgumentException('non-nullable step_number cannot be null');
        }
        $this->container['step_number'] = $step_number;

        return $this;
    }

    /**
     * Gets step_count
     *
     * @return int|null
     */
    public function getStepCount()
    {
        return $this->container['step_count'];
    }

    /**
     * Sets step_count
     *
     * @param int|null $step_count When the wizard contains a static set of steps, returns the total number of steps in this wizard. When displaying to users, the displaying of the wizard results should also be counted as a step. For the user it will probably be displayed as the final step, but in Cyclos, there's no such step - only the result is returned.
     *
     * @return self
     */
    public function setStepCount($step_count)
    {
        if (is_null($step_count)) {
            throw new \InvalidArgumentException('non-nullable step_count cannot be null');
        }
        $this->container['step_count'] = $step_count;

        return $this;
    }

    /**
     * Gets action
     *
     * @return \OpenAPI\Client\Model\WizardActionEnum|null
     */
    public function getAction()
    {
        return $this->container['action'];
    }

    /**
     * Sets action
     *
     * @param \OpenAPI\Client\Model\WizardActionEnum|null $action action
     *
     * @return self
     */
    public function setAction($action)
    {
        if (is_null($action)) {
            throw new \InvalidArgumentException('non-nullable action cannot be null');
        }
        $this->container['action'] = $action;

        return $this;
    }

    /**
     * Gets transitions
     *
     * @return \OpenAPI\Client\Model\WizardStepTransition[]|null
     */
    public function getTransitions()
    {
        return $this->container['transitions'];
    }

    /**
     * Sets transitions
     *
     * @param \OpenAPI\Client\Model\WizardStepTransition[]|null $transitions The possible transitions between the current step and other steps
     *
     * @return self
     */
    public function setTransitions($transitions)
    {
        if (is_null($transitions)) {
            throw new \InvalidArgumentException('non-nullable transitions cannot be null');
        }
        $this->container['transitions'] = $transitions;

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
     * @param string|null $notification A notification that was sent to this step. Only sent if `notificationLevel` is present.
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
     * Gets result_type
     *
     * @return \OpenAPI\Client\Model\WizardResultTypeEnum|null
     */
    public function getResultType()
    {
        return $this->container['result_type'];
    }

    /**
     * Sets result_type
     *
     * @param \OpenAPI\Client\Model\WizardResultTypeEnum|null $result_type result_type
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
     * Gets result
     *
     * @return string|null
     */
    public function getResult()
    {
        return $this->container['result'];
    }

    /**
     * Sets result
     *
     * @param string|null $result Only returned when the wizard is finished. Contains the execution result when `resultType` is either `plainText` or `richText`.
     *
     * @return self
     */
    public function setResult($result)
    {
        if (is_null($result)) {
            throw new \InvalidArgumentException('non-nullable result cannot be null');
        }
        $this->container['result'] = $result;

        return $this;
    }

    /**
     * Gets result_title
     *
     * @return string|null
     */
    public function getResultTitle()
    {
        return $this->container['result_title'];
    }

    /**
     * Sets result_title
     *
     * @param string|null $result_title Only returned when the wizard is finished. Contains the title that should be displayed together with the `result`. Only returned for menu wizards (not on registration wizards).
     *
     * @return self
     */
    public function setResultTitle($result_title)
    {
        if (is_null($result_title)) {
            throw new \InvalidArgumentException('non-nullable result_title cannot be null');
        }
        $this->container['result_title'] = $result_title;

        return $this;
    }

    /**
     * Gets registration_result
     *
     * @return \OpenAPI\Client\Model\UserRegistrationResult|null
     */
    public function getRegistrationResult()
    {
        return $this->container['registration_result'];
    }

    /**
     * Sets registration_result
     *
     * @param \OpenAPI\Client\Model\UserRegistrationResult|null $registration_result registration_result
     *
     * @return self
     */
    public function setRegistrationResult($registration_result)
    {
        if (is_null($registration_result)) {
            throw new \InvalidArgumentException('non-nullable registration_result cannot be null');
        }
        $this->container['registration_result'] = $registration_result;

        return $this;
    }

    /**
     * Gets params
     *
     * @return \OpenAPI\Client\Model\WizardTransitionParams|null
     */
    public function getParams()
    {
        return $this->container['params'];
    }

    /**
     * Sets params
     *
     * @param \OpenAPI\Client\Model\WizardTransitionParams|null $params params
     *
     * @return self
     */
    public function setParams($params)
    {
        if (is_null($params)) {
            throw new \InvalidArgumentException('non-nullable params cannot be null');
        }
        $this->container['params'] = $params;

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
     * Gets code_sent_to_email
     *
     * @return string|null
     */
    public function getCodeSentToEmail()
    {
        return $this->container['code_sent_to_email'];
    }

    /**
     * Sets code_sent_to_email
     *
     * @param string|null $code_sent_to_email The email address to which the verification code was sent. Only returned for email verification steps.
     *
     * @return self
     */
    public function setCodeSentToEmail($code_sent_to_email)
    {
        if (is_null($code_sent_to_email)) {
            throw new \InvalidArgumentException('non-nullable code_sent_to_email cannot be null');
        }
        $this->container['code_sent_to_email'] = $code_sent_to_email;

        return $this;
    }

    /**
     * Gets code_sent_to_phone
     *
     * @return string|null
     */
    public function getCodeSentToPhone()
    {
        return $this->container['code_sent_to_phone'];
    }

    /**
     * Sets code_sent_to_phone
     *
     * @param string|null $code_sent_to_phone The (formatted) mobile phone number to which the verification code was sent. Only returned for phone verification steps.
     *
     * @return self
     */
    public function setCodeSentToPhone($code_sent_to_phone)
    {
        if (is_null($code_sent_to_phone)) {
            throw new \InvalidArgumentException('non-nullable code_sent_to_phone cannot be null');
        }
        $this->container['code_sent_to_phone'] = $code_sent_to_phone;

        return $this;
    }

    /**
     * Gets confirmation_password_input
     *
     * @return \OpenAPI\Client\Model\PasswordInput|null
     */
    public function getConfirmationPasswordInput()
    {
        return $this->container['confirmation_password_input'];
    }

    /**
     * Sets confirmation_password_input
     *
     * @param \OpenAPI\Client\Model\PasswordInput|null $confirmation_password_input confirmation_password_input
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


