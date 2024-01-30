# OpenAPIClient-php

The Inter TT REST API is described using OpenAPI 3.0. The descriptor for the api can be downloaded in both [YAML](http://localhost:8080/cyclos/api/openapi.yaml) or [JSON](http://localhost:8080/cyclos/api/openapi.json) formats. These files can be used in tools that support the OpenAPI specification, such as the [OpenAPI Generator](https://openapi-generator.tech).

In the API, whenever some data is referenced, for example, a group, or payment type, either id or internal name can be used. When an user is to be referenced, the special word 'self' (sans quotes) always refers to the currently authenticated user, and any identification method (login name, e-mail, mobile phone, account number or custom field) that can be used on keywords search (as configured in the products) can also be used to identify users. Some specific data types have other identification fields, like accounts can have a number and payments can have a transaction number. This all depends on the current configuration.

-----------

Most of the operations that return data allow selecting which fields to include in the response. This is useful to avoid calculating data that finally won't be needed and also for reducing the transfer over the network. If nothing is set, all object fields are returned. Fields are handled in 3 modes. Given an example object `{\"a\": {\"x\": 1, \"y\": 2, \"z\": 3}, \"b\": 0}`, the modes are:
- **Include**: the field is unprefixed or prefixed with `+`. All fields which
  are not explicitly included are excluded from the result. Examples:
  - `[\"a\"]` results in `{\"a\": {\"x\": 1, \"y\": 2, \"z\": 3}}`
  - `[\"+b\"]` results in `{\"b\": 0}`
  - `[\"a.x\"]` results in `{\"a\": {\"x\": 1}}`. This is a nested include. At root
    level, includes only `a` then, on `a`'s level, includes only `x`.

- **Exclude**: the field is prefixed by `-` (or, for compatibility purposes,
  `!`). Only explicitly excluded fields
  are excluded from the result. Examples:
  - `[\"-a\"]` results in `{\"b\": 0}`
  - `[\"-b\"]` results in `{\"a\": {\"x\": 1, \"y\": 2, \"z\": 3}}`
  - `[\"a.-x\"]` results in `{\"a\": {\"y\": 2, \"z\": 3}}`. In this example, `a` is
    actually an include at the root level, hence, excludes `b`.

- **Nested only**: when a field is prefixed by `*` and has a nested path,
  it only affects includes / excludes for the nested fields, without affecting
  the current level. Only nested fields are configured.
  Examples:
  - `[\"*a.x\"]` results in `{\"a\": {\"x\": 1}, \"b\": 0}`. In this example, `a` is
    configured to include only `x`. `b` is also included because, there is no
    explicit includes at root level.
  - `[\"*a.-x\"]` results in `{\"a\": {\"y\": 2, \"z\": 3}, \"b\": 0}`. In this example,
    `a` is configured to exclude only `x`. `b` is also included because there
    is no explicit includes at the root level.
    For backwards compatibility, this can also be expressed in a special
    syntax `-a.x`. Also, keep in mind that `-x.y.z` is equivalent to `*x.*y.-z`.

You cannot have the same field included and excluded at the same time - a HTTP `422` status will be returned. Also, when mixing nested excludes with explicit includes or excludes, the nested exclude will be ignored. For example, using `[\"*a.x\", \"a.y\"]` will ignore the `*a.x` definition, resulting in `{\"a\": {\"y\": 2}}`.

-----------

For details of the deprecated elements (operations and model) please visit the [deprecation notes page](https://documentation.cyclos.org/4.16.3/api-deprecation.html) for this version.


## Installation & Usage

### Requirements

PHP 7.4 and later.
Should also work with PHP 8.0.

### Composer

To install the bindings via [Composer](https://getcomposer.org/), add the following to `composer.json`:

```json
{
  "repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/GIT_USER_ID/GIT_REPO_ID.git"
    }
  ],
  "require": {
    "GIT_USER_ID/GIT_REPO_ID": "*@dev"
  }
}
```

Then run `composer install`

### Manual Installation

Download the files and include `autoload.php`:

```php
<?php
require_once('/path/to/OpenAPIClient-php/vendor/autoload.php');
```

## Getting Started

Please follow the [installation procedure](#installation--usage) and then run the following:

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');



// Configure API key authorization: session
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Session-Token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Session-Token', 'Bearer');

// Configure HTTP basic authorization: basic
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()
              ->setUsername('YOUR_USERNAME')
              ->setPassword('YOUR_PASSWORD');

// Configure API key authorization: accessClient
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKey('Access-Client-Token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Access-Client-Token', 'Bearer');


$apiInstance = new OpenAPI\Client\Api\AccountVisibilityApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$user = 'user_example'; // string | Can be one of:  - a user identification value, such as id, username, e-mail, phone, etc.   Id is always allowed, others depend on Cyclos configuration. Note that   a valid numeric value is always considered as id. For example, when   using another identification method that can be numeric only, prefix\\   the value with a single quote (like in Excel spreadsheets);  -  `self` for the currently authenticated user.
$fields = array('fields_example'); // string[] | Select which fields to include on returned data. On the beginning of this page is an explanation on how this parameter works.

try {
    $result = $apiInstance->getUserAccountVisibilityData($user, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AccountVisibilityApi->getUserAccountVisibilityData: ', $e->getMessage(), PHP_EOL;
}

```

## API Endpoints

All URIs are relative to *http://localhost:8080/cyclos/api*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*AccountVisibilityApi* | [**getUserAccountVisibilityData**](docs/Api/AccountVisibilityApi.md#getuseraccountvisibilitydata) | **GET** /{user}/account-visibility | Returns data for setting the account visibility.
*AccountVisibilityApi* | [**saveUserAccountVisibility**](docs/Api/AccountVisibilityApi.md#saveuseraccountvisibility) | **PUT** /{user}/account-visibility | Saves at once the visibility for all accounts.
*AccountVisibilityApi* | [**setUserAccountVisibilityAsHidden**](docs/Api/AccountVisibilityApi.md#setuseraccountvisibilityashidden) | **POST** /{user}/account-visibility/{accountType}/hide | Sets the visibility for a single user account.
*AccountVisibilityApi* | [**setUserAccountVisibilityAsVisible**](docs/Api/AccountVisibilityApi.md#setuseraccountvisibilityasvisible) | **POST** /{user}/account-visibility/{accountType}/show | Sets the visibility for a single user account.
*AccountsApi* | [**exportAccountHistory**](docs/Api/AccountsApi.md#exportaccounthistory) | **GET** /{owner}/accounts/{accountType}/export/{format} | Exports the accounts history entries as file
*AccountsApi* | [**exportUsersWithBalances**](docs/Api/AccountsApi.md#exportuserswithbalances) | **GET** /accounts/{accountType}/user-balances/export/{format} | Exports the user listing together with their balances as file
*AccountsApi* | [**getAccountBalanceHistory**](docs/Api/AccountsApi.md#getaccountbalancehistory) | **GET** /{owner}/accounts/{accountType}/balances-history | Returns the account balances over time
*AccountsApi* | [**getAccountHistoryDataByOwnerAndType**](docs/Api/AccountsApi.md#getaccounthistorydatabyownerandtype) | **GET** /{owner}/accounts/{accountType}/data-for-history | Returns data for searching an account history by owner and type
*AccountsApi* | [**getAccountStatusByOwnerAndType**](docs/Api/AccountsApi.md#getaccountstatusbyownerandtype) | **GET** /{owner}/accounts/{accountType} | Returns the status of an account by owner and type
*AccountsApi* | [**getOwnerAccountsListData**](docs/Api/AccountsApi.md#getowneraccountslistdata) | **GET** /{owner}/accounts/list-data | Returns data for listing accounts of the given owner with their statuses.
*AccountsApi* | [**getUserBalancesData**](docs/Api/AccountsApi.md#getuserbalancesdata) | **GET** /accounts/data-for-user-balances | Returns data for searching users together with their balances
*AccountsApi* | [**getUserBalancesSummary**](docs/Api/AccountsApi.md#getuserbalancessummary) | **GET** /accounts/{accountType}/user-balances/summary | Returns summarized information for the user balances search
*AccountsApi* | [**listAccountsByOwner**](docs/Api/AccountsApi.md#listaccountsbyowner) | **GET** /{owner}/accounts | Lists accounts of the given owner with their statuses
*AccountsApi* | [**searchAccountHistory**](docs/Api/AccountsApi.md#searchaccounthistory) | **GET** /{owner}/accounts/{accountType}/history | Search an account history
*AccountsApi* | [**searchUsersWithBalances**](docs/Api/AccountsApi.md#searchuserswithbalances) | **GET** /accounts/{accountType}/user-balances | Searches for users together with balance information
*AdInterestsApi* | [**createAdInterest**](docs/Api/AdInterestsApi.md#createadinterest) | **POST** /{user}/marketplace-interests | Creates a new advertisement interest for a given user.
*AdInterestsApi* | [**deleteAdInterest**](docs/Api/AdInterestsApi.md#deleteadinterest) | **DELETE** /marketplace-interests/{id} | Removes an advertisement interest.
*AdInterestsApi* | [**getAdInterestDataForEdit**](docs/Api/AdInterestsApi.md#getadinterestdataforedit) | **GET** /marketplace-interests/{id}/data-for-edit | Returns data for modifying an advertisement interest.
*AdInterestsApi* | [**getAdInterestDataForNew**](docs/Api/AdInterestsApi.md#getadinterestdatafornew) | **GET** /{user}/marketplace-interests/data-for-new | Returns data for creating a new advertisement interest for a given user.
*AdInterestsApi* | [**getUserAdInterestsListData**](docs/Api/AdInterestsApi.md#getuseradinterestslistdata) | **GET** /{user}/marketplace-interests/list-data | Returns data for advertisement interests listing of the given user.
*AdInterestsApi* | [**updateAdInterest**](docs/Api/AdInterestsApi.md#updateadinterest) | **PUT** /marketplace-interests/{id} | Updates an existing advertisement interest.
*AdInterestsApi* | [**viewAdInterest**](docs/Api/AdInterestsApi.md#viewadinterest) | **GET** /marketplace-interests/{id} | Returns details of an advertisement interest.
*AdQuestionsApi* | [**answerAdQuestion**](docs/Api/AdQuestionsApi.md#answeradquestion) | **POST** /questions/{id}/answer | Answers an advertisement question as the authenticated user.
*AdQuestionsApi* | [**createAdQuestion**](docs/Api/AdQuestionsApi.md#createadquestion) | **POST** /marketplace/{ad}/questions | Creates a new advertisement question.
*AdQuestionsApi* | [**deleteAdQuestion**](docs/Api/AdQuestionsApi.md#deleteadquestion) | **DELETE** /questions/{id} | Removes an advertisement question.
*AdQuestionsApi* | [**getAdQuestion**](docs/Api/AdQuestionsApi.md#getadquestion) | **GET** /questions/{id} | Returns details of an advertisement question.
*AdQuestionsApi* | [**searchUnansweredAdQuestions**](docs/Api/AdQuestionsApi.md#searchunansweredadquestions) | **GET** /{user}/unanswered-questions | Searches for unanswered questions for a specific user
*AddressesApi* | [**createAddress**](docs/Api/AddressesApi.md#createaddress) | **POST** /{user}/addresses | Creates a new address for the given user
*AddressesApi* | [**deleteAddress**](docs/Api/AddressesApi.md#deleteaddress) | **DELETE** /addresses/{id} | Removes an address
*AddressesApi* | [**getAddressDataForEdit**](docs/Api/AddressesApi.md#getaddressdataforedit) | **GET** /addresses/{id}/data-for-edit | Returns data to edit an existing address
*AddressesApi* | [**getAddressDataForNew**](docs/Api/AddressesApi.md#getaddressdatafornew) | **GET** /{user}/addresses/data-for-new | Returns data to create a new address
*AddressesApi* | [**getPasswordInputForRemoveAddress**](docs/Api/AddressesApi.md#getpasswordinputforremoveaddress) | **GET** /addresses/{id}/password-for-remove | Returns a confirmation &#x60;PasswordInput&#x60; for removing an address, if any
*AddressesApi* | [**getUserAddressesListData**](docs/Api/AddressesApi.md#getuseraddresseslistdata) | **GET** /{user}/addresses/list-data | Returns data for addresses listing of the given user
*AddressesApi* | [**getUserPrimaryAddress**](docs/Api/AddressesApi.md#getuserprimaryaddress) | **GET** /{user}/addresses/primary | Returns the primary address of a given user
*AddressesApi* | [**listAddressesByUser**](docs/Api/AddressesApi.md#listaddressesbyuser) | **GET** /{user}/addresses | Lists all (visible) user addresses
*AddressesApi* | [**listCountries**](docs/Api/AddressesApi.md#listcountries) | **GET** /addresses/countries | Lists all known countries with the ISO code and display name
*AddressesApi* | [**updateAddress**](docs/Api/AddressesApi.md#updateaddress) | **PUT** /addresses/{id} | Updates an existing address
*AddressesApi* | [**viewAddress**](docs/Api/AddressesApi.md#viewaddress) | **GET** /addresses/{id} | Returns details of a specific address
*AgreementsApi* | [**acceptOptionalAgreements**](docs/Api/AgreementsApi.md#acceptoptionalagreements) | **POST** /agreements/optional | Saves the optional agreements for the authenticated user.
*AgreementsApi* | [**acceptPendingAgreement**](docs/Api/AgreementsApi.md#acceptpendingagreement) | **POST** /agreements/accept | Accept one or more agreements
*AgreementsApi* | [**getAgreementContent**](docs/Api/AgreementsApi.md#getagreementcontent) | **GET** /agreements/{key}/content | Returns the content of an agreement
*AgreementsApi* | [**getUserAgreements**](docs/Api/AgreementsApi.md#getuseragreements) | **GET** /{user}/agreements | Returns agreements information for the given user
*AgreementsApi* | [**listPendingAgreements**](docs/Api/AgreementsApi.md#listpendingagreements) | **GET** /agreements/pending | Returns the agreements the authenticated user needs to accept in order to use the system
*AlertsApi* | [**getUserAlertDataForSearch**](docs/Api/AlertsApi.md#getuseralertdataforsearch) | **GET** /alerts/user/data-for-search | Returns configuration data for searching user alerts.
*AlertsApi* | [**searchUserAlerts**](docs/Api/AlertsApi.md#searchuseralerts) | **GET** /alerts/user | Searches for user alerts.
*AuthApi* | [**changeForgottenPassword**](docs/Api/AuthApi.md#changeforgottenpassword) | **POST** /auth/forgotten-password | Changes the a forgotten password after have completed the request
*AuthApi* | [**confirmLogin**](docs/Api/AuthApi.md#confirmlogin) | **POST** /auth/session/login-confirmation | Confirms the login in the current session.
*AuthApi* | [**disconnectCurrentClient**](docs/Api/AuthApi.md#disconnectcurrentclient) | **DELETE** /auth/access-client | Disconnect the current access client
*AuthApi* | [**forgottenPasswordRequest**](docs/Api/AuthApi.md#forgottenpasswordrequest) | **POST** /auth/forgotten-password/request | Requests a forgotten password, notifying the user with instructions to reset it
*AuthApi* | [**getCurrentAuth**](docs/Api/AuthApi.md#getcurrentauth) | **GET** /auth | Returns data about the currently authenticated user
*AuthApi* | [**getDataForChangeForgottenPassword**](docs/Api/AuthApi.md#getdataforchangeforgottenpassword) | **GET** /auth/forgotten-password/data-for-change | Returns configuration data used to change a forgotten password after the initial request
*AuthApi* | [**getDataForLogin**](docs/Api/AuthApi.md#getdataforlogin) | **GET** /auth/data-for-login | Returns data containing the configuration for logging-in
*AuthApi* | [**getLoginConfirmation**](docs/Api/AuthApi.md#getloginconfirmation) | **GET** /auth/session/login-confirmation | Returns the data for entering the login confirmation.
*AuthApi* | [**getSecondaryPasswordInput**](docs/Api/AuthApi.md#getsecondarypasswordinput) | **GET** /auth/session/secondary-password | Use &#x60;GET /auth/session/login-confirmation&#x60; instead.
*AuthApi* | [**getSessionProperties**](docs/Api/AuthApi.md#getsessionproperties) | **GET** /auth/session | Returns properties of the current session
*AuthApi* | [**login**](docs/Api/AuthApi.md#login) | **POST** /auth/session | Logs-in the currently authenticated user or perform a login through a trusted device.
*AuthApi* | [**logout**](docs/Api/AuthApi.md#logout) | **DELETE** /auth/session | Log-out the current session
*AuthApi* | [**newOtp**](docs/Api/AuthApi.md#newotp) | **POST** /auth/otp | Generates a new One-Time-Password (OTP) for the authenticated user
*AuthApi* | [**newOtpForLoginConfirmation**](docs/Api/AuthApi.md#newotpforloginconfirmation) | **POST** /auth/session/login-confirmation/otp | Generates a new One-Time-Password (OTP) for the login confirmation.
*AuthApi* | [**newOtpForSecondaryPassword**](docs/Api/AuthApi.md#newotpforsecondarypassword) | **POST** /auth/session/secondary-password/otp | Use &#x60;POST /auth/session/login-confirmation/otp&#x60; instead.
*AuthApi* | [**replaceSession**](docs/Api/AuthApi.md#replacesession) | **POST** /auth/session/replace/{sessionToken} | Replaces a session token previously obtained
*AuthApi* | [**setSessionProperties**](docs/Api/AuthApi.md#setsessionproperties) | **PUT** /auth/session | Sets properties of the current session
*AuthApi* | [**validateSecondaryPassword**](docs/Api/AuthApi.md#validatesecondarypassword) | **POST** /auth/session/secondary-password | Use &#x60;POST /auth/session/login-confirmation&#x60; instead.
*BalanceLimitsApi* | [**exportAccountBalanceLimits**](docs/Api/BalanceLimitsApi.md#exportaccountbalancelimits) | **GET** /accounts/balance-limits/export/{format} | Exports the account balance limits results as file.
*BalanceLimitsApi* | [**getAccountBalanceLimits**](docs/Api/BalanceLimitsApi.md#getaccountbalancelimits) | **GET** /{user}/accounts/{accountType}/balance-limits | Returns data for the limits of a given account
*BalanceLimitsApi* | [**getAccountBalanceLimitsData**](docs/Api/BalanceLimitsApi.md#getaccountbalancelimitsdata) | **GET** /accounts/data-for-balance-limits | Returns data for a general search of account balance limits.
*BalanceLimitsApi* | [**getDataForUserBalanceLimits**](docs/Api/BalanceLimitsApi.md#getdataforuserbalancelimits) | **GET** /{user}/accounts/data-for-balance-limits | Returns data regarding the limits of all accounts of a given user.
*BalanceLimitsApi* | [**searchAccountBalanceLimits**](docs/Api/BalanceLimitsApi.md#searchaccountbalancelimits) | **GET** /accounts/balance-limits | Searches for account balance limits.
*BalanceLimitsApi* | [**setAccountBalanceLimits**](docs/Api/BalanceLimitsApi.md#setaccountbalancelimits) | **PUT** /{user}/accounts/{accountType}/balance-limits | Sets the limits for a given user account.
*BrokeringApi* | [**addBroker**](docs/Api/BrokeringApi.md#addbroker) | **POST** /{user}/brokers/{broker} | Adds a brokering relation between the given user and broker.
*BrokeringApi* | [**getBrokerDataForAdd**](docs/Api/BrokeringApi.md#getbrokerdataforadd) | **GET** /{user}/brokers/data-for-add | Returns configuration data to add another broker to a user.
*BrokeringApi* | [**getUserBrokersData**](docs/Api/BrokeringApi.md#getuserbrokersdata) | **GET** /{user}/brokers | Returns the current broker(s), together with additional information
*BrokeringApi* | [**removeBroker**](docs/Api/BrokeringApi.md#removebroker) | **DELETE** /{user}/brokers/{broker} | Removes a brokering relation between the given user and broker.
*BrokeringApi* | [**setMainBroker**](docs/Api/BrokeringApi.md#setmainbroker) | **POST** /{user}/brokers/{broker}/set-main | Sets a broker as the main broker of the user.
*BrokeringApi* | [**viewBrokering**](docs/Api/BrokeringApi.md#viewbrokering) | **GET** /{user}/brokers/{broker} | Returns details of the brokering relation for the given user and broker.
*CaptchaApi* | [**deleteCaptcha**](docs/Api/CaptchaApi.md#deletecaptcha) | **DELETE** /captcha/{id} | Deletes a previously generated captcha.
*CaptchaApi* | [**getCaptchaContent**](docs/Api/CaptchaApi.md#getcaptchacontent) | **GET** /captcha/{id} | Returns a captcha image content
*CaptchaApi* | [**newCaptcha**](docs/Api/CaptchaApi.md#newcaptcha) | **POST** /captcha | Returns a new captcha challenge
*ClientsApi* | [**activateClient**](docs/Api/ClientsApi.md#activateclient) | **POST** /clients/activate | Activates an unassigned access client
*ClientsApi* | [**createAndActivateClient**](docs/Api/ClientsApi.md#createandactivateclient) | **POST** /clients/{type} | Creates and activates a new access client.
*ClientsApi* | [**getDataForClientActivation**](docs/Api/ClientsApi.md#getdataforclientactivation) | **GET** /clients/data-for-activation | Returns data for a client creation and activation.
*ClientsApi* | [**listClientTypesForUser**](docs/Api/ClientsApi.md#listclienttypesforuser) | **GET** /{user}/client-types | Returns the list of access clients types for a user
*ClientsApi* | [**sendClientActivationCode**](docs/Api/ClientsApi.md#sendclientactivationcode) | **POST** /clients/send-activaction-code | Sends an activation code, so the user identity is validated before activating a new client.
*ClientsApi* | [**unassignClient**](docs/Api/ClientsApi.md#unassignclient) | **POST** /clients/{key}/unassign | Unassign (disconnects) an access client
*ClientsApi* | [**viewClient**](docs/Api/ClientsApi.md#viewclient) | **GET** /clients/{key} | Returns details of an access client
*ContactInfosApi* | [**createContactInfo**](docs/Api/ContactInfosApi.md#createcontactinfo) | **POST** /{user}/contact-infos | Creates a new public contact information for the given user
*ContactInfosApi* | [**deleteContactInfo**](docs/Api/ContactInfosApi.md#deletecontactinfo) | **DELETE** /contact-infos/{id} | Removes an existing public contact information
*ContactInfosApi* | [**getContactInfoDataForEdit**](docs/Api/ContactInfosApi.md#getcontactinfodataforedit) | **GET** /contact-infos/{id}/data-for-edit | Returns data to edit an existing public contact information
*ContactInfosApi* | [**getContactInfoDataForNew**](docs/Api/ContactInfosApi.md#getcontactinfodatafornew) | **GET** /{user}/contact-infos/data-for-new | Returns data to create a new public contact information
*ContactInfosApi* | [**getPasswordInputForRemoveContactInfo**](docs/Api/ContactInfosApi.md#getpasswordinputforremovecontactinfo) | **GET** /contact-infos/{id}/password-for-remove | Returns a confirmation &#x60;PasswordInput&#x60; for removing a public contact information, if any.
*ContactInfosApi* | [**getUserContactInfosListData**](docs/Api/ContactInfosApi.md#getusercontactinfoslistdata) | **GET** /{user}/contact-infos/list-data | Returns data for listing public contact informations of the given user.
*ContactInfosApi* | [**listContactInfosByUser**](docs/Api/ContactInfosApi.md#listcontactinfosbyuser) | **GET** /{user}/contact-infos | Lists all (visible) public contact informations for the user
*ContactInfosApi* | [**updateContactInfo**](docs/Api/ContactInfosApi.md#updatecontactinfo) | **PUT** /contact-infos/{id} | Updates an existing public contact information
*ContactInfosApi* | [**viewContactInfo**](docs/Api/ContactInfosApi.md#viewcontactinfo) | **GET** /contact-infos/{id} | Returns details of a specific public contact information
*ContactsApi* | [**createContact**](docs/Api/ContactsApi.md#createcontact) | **POST** /{user}/contact-list | Creates a new contact
*ContactsApi* | [**deleteContact**](docs/Api/ContactsApi.md#deletecontact) | **DELETE** /contact-list/{id} | Removes a contact
*ContactsApi* | [**getContactDataForEdit**](docs/Api/ContactsApi.md#getcontactdataforedit) | **GET** /contact-list/{id}/data-for-edit | Returns data to edit an existing contact
*ContactsApi* | [**getContactListDataForNew**](docs/Api/ContactsApi.md#getcontactlistdatafornew) | **GET** /{user}/contact-list/data-for-new | Returns configuration data for creating a new contact
*ContactsApi* | [**getContactListDataForSearch**](docs/Api/ContactsApi.md#getcontactlistdataforsearch) | **GET** /{user}/contact-list/data-for-search | Returns configuration data used when searching for contacts
*ContactsApi* | [**searchContactList**](docs/Api/ContactsApi.md#searchcontactlist) | **GET** /{user}/contact-list | Searches the contact list of a given user
*ContactsApi* | [**searchContacts**](docs/Api/ContactsApi.md#searchcontacts) | **GET** /{user}/contacts | Search users which are contacts of a specific user
*ContactsApi* | [**updateContact**](docs/Api/ContactsApi.md#updatecontact) | **PUT** /contact-list/{id} | Updates an existing contact
*ContactsApi* | [**viewContact**](docs/Api/ContactsApi.md#viewcontact) | **GET** /contact-list/{id} | Returns details of a specific contact
*DeliveryMethodsApi* | [**createDeliveryMethod**](docs/Api/DeliveryMethodsApi.md#createdeliverymethod) | **POST** /{user}/delivery-methods | Creates a new webshop delivery method for a given user.
*DeliveryMethodsApi* | [**deleteDeliveryMethod**](docs/Api/DeliveryMethodsApi.md#deletedeliverymethod) | **DELETE** /delivery-methods/{id} | Removes a webshop delivery method.
*DeliveryMethodsApi* | [**getDeliveryMethodDataForEdit**](docs/Api/DeliveryMethodsApi.md#getdeliverymethoddataforedit) | **GET** /delivery-methods/{id}/data-for-edit | Returns data for modifying a webshop delivery method.
*DeliveryMethodsApi* | [**getDeliveryMethodDataForNew**](docs/Api/DeliveryMethodsApi.md#getdeliverymethoddatafornew) | **GET** /{user}/delivery-methods/data-for-new | Returns data for creating a new webshop delivery method for a given user.
*DeliveryMethodsApi* | [**getUserDeliveryMethodsListData**](docs/Api/DeliveryMethodsApi.md#getuserdeliverymethodslistdata) | **GET** /{user}/delivery-methods/list-data | Returns data for webshop delivery methods listing of the given user.
*DeliveryMethodsApi* | [**updateDeliveryMethod**](docs/Api/DeliveryMethodsApi.md#updatedeliverymethod) | **PUT** /delivery-methods/{id} | Updates an existing webshop delivery method.
*DeliveryMethodsApi* | [**viewDeliveryMethod**](docs/Api/DeliveryMethodsApi.md#viewdeliverymethod) | **GET** /delivery-methods/{id} | Returns details of a webshop delivery method.
*DeviceConfirmationsApi* | [**approveDeviceConfirmation**](docs/Api/DeviceConfirmationsApi.md#approvedeviceconfirmation) | **POST** /device-confirmations/{id}/approve | Approves a pending device confirmation.
*DeviceConfirmationsApi* | [**createDeviceConfirmation**](docs/Api/DeviceConfirmationsApi.md#createdeviceconfirmation) | **POST** /device-confirmations | Creates a pending device confirmation for the authenticated user.
*DeviceConfirmationsApi* | [**dataForDeviceConfirmationApproval**](docs/Api/DeviceConfirmationsApi.md#datafordeviceconfirmationapproval) | **GET** /device-confirmations/data-for-approval | Return data for approve / reject device confirmations.
*DeviceConfirmationsApi* | [**deleteDeviceConfirmation**](docs/Api/DeviceConfirmationsApi.md#deletedeviceconfirmation) | **DELETE** /device-confirmations/{id} | Deletes a device confirmation for the authenticated user.
*DeviceConfirmationsApi* | [**getDeviceConfirmationQrCode**](docs/Api/DeviceConfirmationsApi.md#getdeviceconfirmationqrcode) | **GET** /device-confirmations/{id}/qr-code | Returns the QR-code image for the given confirmation only if not already approved / rejected.
*DeviceConfirmationsApi* | [**rejectDeviceConfirmation**](docs/Api/DeviceConfirmationsApi.md#rejectdeviceconfirmation) | **POST** /device-confirmations/{id}/reject | Rejects a pending device confirmation.
*DeviceConfirmationsApi* | [**viewDeviceConfirmation**](docs/Api/DeviceConfirmationsApi.md#viewdeviceconfirmation) | **GET** /device-confirmations/{id} | Shows the details of a device confirmation for the authenticated user.
*DevicePinsApi* | [**deleteDevicePin**](docs/Api/DevicePinsApi.md#deletedevicepin) | **DELETE** /device-pins/{key} | Removes a device PIN.
*DevicePinsApi* | [**getDevicePinDataForEdit**](docs/Api/DevicePinsApi.md#getdevicepindataforedit) | **GET** /device-pins/{key}/data-for-edit | Returns data for editing the PIN name.
*DevicePinsApi* | [**getPasswordInputForCreatePin**](docs/Api/DevicePinsApi.md#getpasswordinputforcreatepin) | **GET** /device-pins/password-for-create | Returns a &#x60;PasswordInput&#x60; for create a device pin.
*DevicePinsApi* | [**listDevicePins**](docs/Api/DevicePinsApi.md#listdevicepins) | **GET** /{user}/device-pins | Returns the list of device PIN for a user.
*DevicePinsApi* | [**setDevicePin**](docs/Api/DevicePinsApi.md#setdevicepin) | **POST** /device-pins | Creates a new PIN or modify the current existing one.
*DevicePinsApi* | [**updateDevicePin**](docs/Api/DevicePinsApi.md#updatedevicepin) | **PUT** /device-pins/{key} | Updates the device PIN name.
*DevicePinsApi* | [**validateDevicePinValue**](docs/Api/DevicePinsApi.md#validatedevicepinvalue) | **GET** /device-pins/validate | Validates a value to be used as a pin.
*DevicePinsApi* | [**viewDevicePin**](docs/Api/DevicePinsApi.md#viewdevicepin) | **GET** /device-pins/{key} | Returns details of a specific device PIN
*DevicesApi* | [**deleteDevice**](docs/Api/DevicesApi.md#deletedevice) | **DELETE** /devices/{id} | Removes a device.
*DevicesApi* | [**deviceActivation**](docs/Api/DevicesApi.md#deviceactivation) | **POST** /devices/activate | Activates a device by code.
*DevicesApi* | [**deviceActivationIfPossible**](docs/Api/DevicesApi.md#deviceactivationifpossible) | **POST** /devices/activate-if-possible | Activates a device without requiring a code if the email was already verified.
*DevicesApi* | [**getDeviceDataForEdit**](docs/Api/DevicesApi.md#getdevicedataforedit) | **GET** /devices/{id}/data-for-edit | Returns data to edit an existing device.
*DevicesApi* | [**getDeviceDataForSend**](docs/Api/DevicesApi.md#getdevicedataforsend) | **GET** /devices/data-for-send | Returns data for send / resend an activation code.
*DevicesApi* | [**getPasswordInputForRemoveDevice**](docs/Api/DevicesApi.md#getpasswordinputforremovedevice) | **GET** /devices/{id}/password-for-remove | Returns a confirmation &#x60;PasswordInput&#x60; for removing a device, if any
*DevicesApi* | [**listDevices**](docs/Api/DevicesApi.md#listdevices) | **GET** /{user}/devices | Returns the list of trusted devices for a user.
*DevicesApi* | [**resendDeviceActivationCode**](docs/Api/DevicesApi.md#resenddeviceactivationcode) | **POST** /devices/{id}/resend-activation-code | Resends the activation code for the given pending device.
*DevicesApi* | [**sendDeviceActivationCode**](docs/Api/DevicesApi.md#senddeviceactivationcode) | **POST** /devices/send-activation-code | Sends a new device activation code.
*DevicesApi* | [**updateDevice**](docs/Api/DevicesApi.md#updatedevice) | **PUT** /devices/{id} | Updates a device.
*DocumentsApi* | [**createSharedDocument**](docs/Api/DocumentsApi.md#createshareddocument) | **POST** /documents | Creates a new static shared document.
*DocumentsApi* | [**createSharedDocumentWithUpload**](docs/Api/DocumentsApi.md#createshareddocumentwithupload) | **POST** /documents/upload | Creates a new static shared document with a file
*DocumentsApi* | [**createUserDocument**](docs/Api/DocumentsApi.md#createuserdocument) | **POST** /{user}/documents | Creates a new individual document for the given user.
*DocumentsApi* | [**createUserDocumentWithUpload**](docs/Api/DocumentsApi.md#createuserdocumentwithupload) | **POST** /{user}/documents/upload | Creates a new individual document for the given user with a file.
*DocumentsApi* | [**deleteDocument**](docs/Api/DocumentsApi.md#deletedocument) | **DELETE** /documents/{id} | Removes a document.
*DocumentsApi* | [**downloadDocumentFile**](docs/Api/DocumentsApi.md#downloaddocumentfile) | **GET** /documents/{id}/file | Returns the content of the document file.
*DocumentsApi* | [**getDataForDynamicDocument**](docs/Api/DocumentsApi.md#getdatafordynamicdocument) | **GET** /documents/{id}/dynamic/{user} | Returns data to process a dynamic document
*DocumentsApi* | [**getDocumentDataForEdit**](docs/Api/DocumentsApi.md#getdocumentdataforedit) | **GET** /documents/{id}/data-for-edit | Returns data to edit an existing document
*DocumentsApi* | [**getDocumentsDataForSearch**](docs/Api/DocumentsApi.md#getdocumentsdataforsearch) | **GET** /documents/data-for-search | Returns configuration data for searching documents.
*DocumentsApi* | [**getSharedDocumentDataForNew**](docs/Api/DocumentsApi.md#getshareddocumentdatafornew) | **GET** /documents/data-for-new | Returns data to create a new shared static document
*DocumentsApi* | [**getUserDocumentDataForNew**](docs/Api/DocumentsApi.md#getuserdocumentdatafornew) | **GET** /{user}/documents/data-for-new | Returns data to create a new shared individual document
*DocumentsApi* | [**listUserDocuments**](docs/Api/DocumentsApi.md#listuserdocuments) | **GET** /{user}/documents | Lists the enabled documents for the given user
*DocumentsApi* | [**processDynamicDocument**](docs/Api/DocumentsApi.md#processdynamicdocument) | **POST** /documents/{id}/dynamic/{user} | Processes a dynamic document
*DocumentsApi* | [**searchDocuments**](docs/Api/DocumentsApi.md#searchdocuments) | **GET** /documents | General documents search
*DocumentsApi* | [**updateDocument**](docs/Api/DocumentsApi.md#updatedocument) | **PUT** /documents/{id} | Updates the details of a document.
*DocumentsApi* | [**updateDocumentWithUpload**](docs/Api/DocumentsApi.md#updatedocumentwithupload) | **POST** /documents/{id}/upload | Updates the details of a document and the file content.
*DocumentsApi* | [**uploadDocumentFile**](docs/Api/DocumentsApi.md#uploaddocumentfile) | **POST** /documents/{id}/file | Saves the content of the document file.
*DocumentsApi* | [**viewDocument**](docs/Api/DocumentsApi.md#viewdocument) | **GET** /documents/{id} | Returns details of a specific document.
*EasyInvoicesApi* | [**dataForPerformEasyInvoice**](docs/Api/EasyInvoicesApi.md#dataforperformeasyinvoice) | **GET** /easy-invoices/data-for-perform/{to} | Returns data for an easy invoice to the given user.
*EasyInvoicesApi* | [**getEasyInvoiceQrCode**](docs/Api/EasyInvoicesApi.md#geteasyinvoiceqrcode) | **GET** /easy-invoices/qr-code/{to} | Returns the QR-code image for the given easy invoice&#39;s parameters
*EasyInvoicesApi* | [**performEasyInvoice**](docs/Api/EasyInvoicesApi.md#performeasyinvoice) | **POST** /easy-invoices | Performs a direct payment from an easy invoice.
*EasyInvoicesApi* | [**previewEasyInvoice**](docs/Api/EasyInvoicesApi.md#previeweasyinvoice) | **POST** /easy-invoices/preview | Previews a direct payment from an easy invoice before performing it.
*ExternalPaymentsApi* | [**cancelExternalPayment**](docs/Api/ExternalPaymentsApi.md#cancelexternalpayment) | **POST** /external-payments/{key}/cancel | Cancels an external payment.
*ExternalPaymentsApi* | [**dataForPerformExternalPayment**](docs/Api/ExternalPaymentsApi.md#dataforperformexternalpayment) | **GET** /{owner}/external-payments/data-for-perform | Returns configuration data for performing an external payment
*ExternalPaymentsApi* | [**performExternalPayment**](docs/Api/ExternalPaymentsApi.md#performexternalpayment) | **POST** /{owner}/external-payments | Performs an external payment from the given owner
*ExternalPaymentsApi* | [**previewExternalPayment**](docs/Api/ExternalPaymentsApi.md#previewexternalpayment) | **POST** /{owner}/external-payments/preview | Previews an external payment before performing it
*FilesApi* | [**deleteRawFile**](docs/Api/FilesApi.md#deleterawfile) | **DELETE** /files/{id} | Removes a file by id
*FilesApi* | [**getRawFileContent**](docs/Api/FilesApi.md#getrawfilecontent) | **GET** /files/{id}/content | Returns the content of a raw file (temp or custom field value)
*FilesApi* | [**listTempFiles**](docs/Api/FilesApi.md#listtempfiles) | **GET** /files/temp | Lists temporary files related to the currently authenticated user or guest
*FilesApi* | [**uploadTempFile**](docs/Api/FilesApi.md#uploadtempfile) | **POST** /files/temp | Adds a new temporary file for the currently authenticated user or guest.
*FilesApi* | [**viewRawFile**](docs/Api/FilesApi.md#viewrawfile) | **GET** /files/{id} | Returns a file details by id
*FirebaseApi* | [**assignFcmToken**](docs/Api/FirebaseApi.md#assignfcmtoken) | **POST** /firebase/fcm-tokens | Assign a new FCM registration token to the authenticated user
*FirebaseApi* | [**deleteFcmToken**](docs/Api/FirebaseApi.md#deletefcmtoken) | **DELETE** /firebase/fcm-tokens | Removes a FCM token from a set of users
*FirebaseApi* | [**updateFcmTokens**](docs/Api/FirebaseApi.md#updatefcmtokens) | **PUT** /firebase/fcm-tokens | Updates an existing FCM token
*FrontendApi* | [**dataForFrontend**](docs/Api/FrontendApi.md#dataforfrontend) | **GET** /frontend/data | Returns data required for displaying the new frontend.
*FrontendApi* | [**dataForFrontendHome**](docs/Api/FrontendApi.md#dataforfrontendhome) | **GET** /frontend/home | Returns the data for the home page / dashboard.
*FrontendApi* | [**getDataForUserQuickAccess**](docs/Api/FrontendApi.md#getdataforuserquickaccess) | **GET** /frontend/{user}/quick-access | Returns data for quick access settings in the new frontend.
*FrontendApi* | [**getFrontendHelp**](docs/Api/FrontendApi.md#getfrontendhelp) | **GET** /frontend/help | Returns the new frontend help page.
*FrontendApi* | [**getFrontendIcons**](docs/Api/FrontendApi.md#getfrontendicons) | **GET** /frontend/icons | Returns a JSON object keyed by icon name and whose values are the SVG contents
*FrontendApi* | [**restoreUserQuickAccessDefaults**](docs/Api/FrontendApi.md#restoreuserquickaccessdefaults) | **POST** /frontend/{user}/quick-access/defaults | Restores the default quick access items.
*FrontendApi* | [**saveFrontendSettings**](docs/Api/FrontendApi.md#savefrontendsettings) | **POST** /frontend/settings | Saves user preferences regarding the Cyclos frontend
*FrontendApi* | [**saveUserQuickAccess**](docs/Api/FrontendApi.md#saveuserquickaccess) | **PUT** /frontend/{user}/quick-access | Saves the quick access items.
*FrontendApi* | [**viewFrontendPage**](docs/Api/FrontendApi.md#viewfrontendpage) | **GET** /frontend/page/{key} | Returns a frontend page with its content.
*GroupMembershipApi* | [**changeGroupMembership**](docs/Api/GroupMembershipApi.md#changegroupmembership) | **POST** /{user}/group | Changes the user / operator group
*GroupMembershipApi* | [**getGroupMembershipData**](docs/Api/GroupMembershipApi.md#getgroupmembershipdata) | **GET** /{user}/group | Returns the current user / operator group and the change history
*IdentityProvidersApi* | [**deleteUserIdentityProvider**](docs/Api/IdentityProvidersApi.md#deleteuseridentityprovider) | **DELETE** /{user}/identity-providers/{identityProvider} | Removes the link between a user and an identity provider, optionally disabling it
*IdentityProvidersApi* | [**getUserIdentityProvidersListData**](docs/Api/IdentityProvidersApi.md#getuseridentityproviderslistdata) | **GET** /{user}/identity-providers/list-data | Returns data for identity providers links of the given user.
*IdentityProvidersApi* | [**identityProviderCallback**](docs/Api/IdentityProvidersApi.md#identityprovidercallback) | **GET** /identity-providers/callback | The callback URL which handles redirect callbacks for identity providers.
*IdentityProvidersApi* | [**identityProviderRedirect**](docs/Api/IdentityProvidersApi.md#identityproviderredirect) | **GET** /identity-providers/redirect/{requestId} | An internal URL used to store a cookie with the request id before redirecting to the external identity provider.
*IdentityProvidersApi* | [**prepareIdentityProviderLink**](docs/Api/IdentityProvidersApi.md#prepareidentityproviderlink) | **POST** /identity-providers/{identityProvider}/link | Prepares an operation to link the authenticated user to an identity provider.
*IdentityProvidersApi* | [**prepareIdentityProviderLogin**](docs/Api/IdentityProvidersApi.md#prepareidentityproviderlogin) | **POST** /identity-providers/{identityProvider}/login | Prepares an operation to login a user from an identity provider.
*IdentityProvidersApi* | [**prepareIdentityProviderRegistration**](docs/Api/IdentityProvidersApi.md#prepareidentityproviderregistration) | **POST** /identity-providers/{identityProvider}/register | Prepares an operation to register a user from an identity provider.
*IdentityProvidersApi* | [**prepareIdentityProviderWizard**](docs/Api/IdentityProvidersApi.md#prepareidentityproviderwizard) | **POST** /identity-providers/{identityProvider}/wizard | Prepares an operation to fill in a registration wizard from an identity provider.
*ImagesApi* | [**deleteImage**](docs/Api/ImagesApi.md#deleteimage) | **DELETE** /images/{idOrKey} | Removes an image by id or key
*ImagesApi* | [**getAdImagesListData**](docs/Api/ImagesApi.md#getadimageslistdata) | **GET** /marketplace/{ad}/images/list-data | Returns the images of an advertisement, plus additional permissions and data.
*ImagesApi* | [**getConfigurationLogoContent**](docs/Api/ImagesApi.md#getconfigurationlogocontent) | **GET** /logos/{configuration}/{kind} | Returns a logo content for a given configuration and type
*ImagesApi* | [**getCurrentLogoContent**](docs/Api/ImagesApi.md#getcurrentlogocontent) | **GET** /logos/{kind} | Returns a logo content for the current configuration and the given kind
*ImagesApi* | [**getCurrentThemeImageContent**](docs/Api/ImagesApi.md#getcurrentthemeimagecontent) | **GET** /themes/images/{kind}/{name} | Returns a theme image content for the current theme.
*ImagesApi* | [**getImageContent**](docs/Api/ImagesApi.md#getimagecontent) | **GET** /images/content/{idOrKey} | Returns an image content by id or key
*ImagesApi* | [**getSvgIcons**](docs/Api/ImagesApi.md#getsvgicons) | **GET** /svg-icons | Returns a JSON object keyed by icon name and whose values are the SVG contents
*ImagesApi* | [**getSystemCustomImagesListData**](docs/Api/ImagesApi.md#getsystemcustomimageslistdata) | **GET** /system-images/list-data | Returns data containing the system custom images, as well as categories.
*ImagesApi* | [**getThemeImageContent**](docs/Api/ImagesApi.md#getthemeimagecontent) | **GET** /themes/{theme}/images/{kind}/{name} | Returns a theme image content for a given theme.
*ImagesApi* | [**getUserImagesListData**](docs/Api/ImagesApi.md#getuserimageslistdata) | **GET** /{user}/images/list-data | Returns either &#x60;profile&#x60; or &#x60;custom&#x60; images for a given user, plus additional permissions and data
*ImagesApi* | [**listAdImages**](docs/Api/ImagesApi.md#listadimages) | **GET** /marketplace/{ad}/images | Lists the images of an advertisement
*ImagesApi* | [**listTempImages**](docs/Api/ImagesApi.md#listtempimages) | **GET** /images/temp | Lists temporary images related to the currently authenticated user or guest
*ImagesApi* | [**listUserImages**](docs/Api/ImagesApi.md#listuserimages) | **GET** /{user}/images | Lists either &#x60;profile&#x60; or &#x60;custom&#x60; images for a given user.
*ImagesApi* | [**reorderAdImages**](docs/Api/ImagesApi.md#reorderadimages) | **PUT** /marketplace/{ad}/images/order | Changes the order of an advertisement&#39;s images removing the ones not given
*ImagesApi* | [**reorderProfileImages**](docs/Api/ImagesApi.md#reorderprofileimages) | **PUT** /{user}/images/order | Changes the order of a user&#39;s profile images removing the ones not given
*ImagesApi* | [**uploadAdImage**](docs/Api/ImagesApi.md#uploadadimage) | **POST** /marketplace/{ad}/images | Adds a new image for the given advertisement.
*ImagesApi* | [**uploadContactInfoImage**](docs/Api/ImagesApi.md#uploadcontactinfoimage) | **POST** /contact-infos/{id}/image | Uploads a new image for the given public contact information.
*ImagesApi* | [**uploadSystemCustomImage**](docs/Api/ImagesApi.md#uploadsystemcustomimage) | **POST** /system-images/{category} | Adds a new system custom image under a given category
*ImagesApi* | [**uploadTempImage**](docs/Api/ImagesApi.md#uploadtempimage) | **POST** /images/temp | Adds a new temporary image for the currently authenticated user or guest.
*ImagesApi* | [**uploadUserImage**](docs/Api/ImagesApi.md#uploaduserimage) | **POST** /{user}/images | Adds a new image for the given user. The image kind is either  &#x60;profile&#x60; or &#x60;custom&#x60;.
*ImagesApi* | [**viewImage**](docs/Api/ImagesApi.md#viewimage) | **GET** /images/{idOrKey} | Returns an image details by id or key
*ImagesApi* | [**viewSvgIcon**](docs/Api/ImagesApi.md#viewsvgicon) | **GET** /svg-icons/{name}.svg | Returns an SVG icon by name
*ImportsApi* | [**abortImportedFile**](docs/Api/ImportsApi.md#abortimportedfile) | **POST** /imported-file/{id}/abort | Aborts the importing of a given file
*ImportsApi* | [**deleteImportedFile**](docs/Api/ImportsApi.md#deleteimportedfile) | **DELETE** /imported-file/{id} | Deletes an imported file.
*ImportsApi* | [**getGeneralImportedFileDataForNew**](docs/Api/ImportsApi.md#getgeneralimportedfiledatafornew) | **GET** /imported-files/{kind}/data-for-new | Returns data for a new general import of a given kind.
*ImportsApi* | [**getGeneralImportedFilesDataForSearch**](docs/Api/ImportsApi.md#getgeneralimportedfilesdataforsearch) | **GET** /imported-files/{context}/data-for-search | Returns data for searching imported files.
*ImportsApi* | [**getImportedFileDataForEdit**](docs/Api/ImportsApi.md#getimportedfiledataforedit) | **GET** /imported-file/{id}/data-for-edit | Returns data for editing an imported file.
*ImportsApi* | [**getImportedLineDataForEdit**](docs/Api/ImportsApi.md#getimportedlinedataforedit) | **GET** /imported-line/{id}/data-for-edit | Returns data for editing an imported line.
*ImportsApi* | [**getImportedLinesDataForSearch**](docs/Api/ImportsApi.md#getimportedlinesdataforsearch) | **GET** /imported-file/{id}/lines/data-for-search | Searches for imported lines of a given file.
*ImportsApi* | [**getUserImportedFileDataForNew**](docs/Api/ImportsApi.md#getuserimportedfiledatafornew) | **GET** /{user}/imported-files/{kind}/data-for-new | Returns data for importing a new file of a given kind and user.
*ImportsApi* | [**getUserImportedFilesDataForSearch**](docs/Api/ImportsApi.md#getuserimportedfilesdataforsearch) | **GET** /{user}/imported-files/{context}/data-for-search | Returns data for searching imported files of a user.
*ImportsApi* | [**importGeneralFile**](docs/Api/ImportsApi.md#importgeneralfile) | **POST** /imported-files/{kind} | Starts a general file import for a given kind.
*ImportsApi* | [**importUserFile**](docs/Api/ImportsApi.md#importuserfile) | **POST** /{user}/imported-files/{kind} | Starts a file import for a given user and kind.
*ImportsApi* | [**includeImportedLines**](docs/Api/ImportsApi.md#includeimportedlines) | **POST** /imported-file/{id}/include | Marks a set of lines to be included.
*ImportsApi* | [**processImportedFile**](docs/Api/ImportsApi.md#processimportedfile) | **POST** /imported-file/{id}/process | Starts processing rows of the given imported file.
*ImportsApi* | [**searchGeneralImportedFiles**](docs/Api/ImportsApi.md#searchgeneralimportedfiles) | **GET** /imported-files/{context} | Searches for general imported files.
*ImportsApi* | [**searchImportedLines**](docs/Api/ImportsApi.md#searchimportedlines) | **GET** /imported-file/{id}/lines | Searches for imported lines in a given file.
*ImportsApi* | [**searchUserImportedFiles**](docs/Api/ImportsApi.md#searchuserimportedfiles) | **GET** /{user}/imported-files/{context} | Searches for imports of a given user and context.
*ImportsApi* | [**skipImportedLines**](docs/Api/ImportsApi.md#skipimportedlines) | **POST** /imported-file/{id}/skip | Marks a set of lines to be skipped.
*ImportsApi* | [**updateImportedFile**](docs/Api/ImportsApi.md#updateimportedfile) | **PUT** /imported-file/{id} | Updates details of an imported file.
*ImportsApi* | [**updateImportedLine**](docs/Api/ImportsApi.md#updateimportedline) | **PUT** /imported-line/{id} | Updates the values of an imported line.
*ImportsApi* | [**viewImportedFile**](docs/Api/ImportsApi.md#viewimportedfile) | **GET** /imported-file/{id} | Returns details of an imported file.
*ImportsApi* | [**viewImportedLine**](docs/Api/ImportsApi.md#viewimportedline) | **GET** /imported-line/{id} | Returns details of an imported line.
*InstallmentsApi* | [**exportInstallments**](docs/Api/InstallmentsApi.md#exportinstallments) | **GET** /{owner}/installments/export/{format} | Exports the owner installments search results as file
*InstallmentsApi* | [**exportInstallmentsOverview**](docs/Api/InstallmentsApi.md#exportinstallmentsoverview) | **GET** /installments/export/{format} | Exports the installments overview search results as file
*InstallmentsApi* | [**getInstallmentsDataForSearch**](docs/Api/InstallmentsApi.md#getinstallmentsdataforsearch) | **GET** /{owner}/installments/data-for-search | Returns data for searching installments of an account owner
*InstallmentsApi* | [**getInstallmentsOverviewDataForSearch**](docs/Api/InstallmentsApi.md#getinstallmentsoverviewdataforsearch) | **GET** /installments/data-for-search | Returns data for searching installments regardless of a owner
*InstallmentsApi* | [**processInstallment**](docs/Api/InstallmentsApi.md#processinstallment) | **POST** /installments/{key}/process | Processes a installment, generating its corresponding transfer.
*InstallmentsApi* | [**searchInstallments**](docs/Api/InstallmentsApi.md#searchinstallments) | **GET** /{owner}/installments | Searches installments of an account owner
*InstallmentsApi* | [**searchInstallmentsOverview**](docs/Api/InstallmentsApi.md#searchinstallmentsoverview) | **GET** /installments | Searches installments regardless of a owner
*InstallmentsApi* | [**settleInstallment**](docs/Api/InstallmentsApi.md#settleinstallment) | **POST** /installments/{key}/settle | Settles a scheduled payment installment.
*InviteApi* | [**getDataForInvite**](docs/Api/InviteApi.md#getdataforinvite) | **GET** /invite/data-for-send | Returns data for inviting external users to join the system
*InviteApi* | [**sendInvitation**](docs/Api/InviteApi.md#sendinvitation) | **POST** /invite | Sends invitation e-mails for external users.
*LocalizationApi* | [**getLocales**](docs/Api/LocalizationApi.md#getlocales) | **GET** /localization/locales | Returns the list of available locales, this collection is already sent in DataForUI or MobileBaseData.
*LocalizationApi* | [**saveLocalizationSettings**](docs/Api/LocalizationApi.md#savelocalizationsettings) | **POST** /localization/settings | Saves the localization settings for the authenticated user.
*MarketplaceApi* | [**approveAd**](docs/Api/MarketplaceApi.md#approvead) | **POST** /marketplace/{ad}/approve | Approves a pending advertisement.
*MarketplaceApi* | [**createAd**](docs/Api/MarketplaceApi.md#createad) | **POST** /{user}/marketplace | Creates a new advertisement for the given user.
*MarketplaceApi* | [**deleteAd**](docs/Api/MarketplaceApi.md#deletead) | **DELETE** /marketplace/{ad} | Removes an advertisement.
*MarketplaceApi* | [**exportAd**](docs/Api/MarketplaceApi.md#exportad) | **GET** /marketplace/{ad}/export/{format} | Exports the advertisement details to a file.
*MarketplaceApi* | [**getAdDataForEdit**](docs/Api/MarketplaceApi.md#getaddataforedit) | **GET** /marketplace/{ad}/data-for-edit | Returns configuration data for editing an advertisement.
*MarketplaceApi* | [**getAdDataForNew**](docs/Api/MarketplaceApi.md#getaddatafornew) | **GET** /{user}/marketplace/data-for-new | Returns configuration data for creating a new advertisement for a user and kind.
*MarketplaceApi* | [**getAdDataForSearch**](docs/Api/MarketplaceApi.md#getaddataforsearch) | **GET** /marketplace/data-for-search | Returns configuration data for searching advertisements.
*MarketplaceApi* | [**getUserAdsDataForSearch**](docs/Api/MarketplaceApi.md#getuseradsdataforsearch) | **GET** /{user}/marketplace/data-for-search | Returns configuration data for searching advertisements of a user.
*MarketplaceApi* | [**getUserFavoriteAdsListData**](docs/Api/MarketplaceApi.md#getuserfavoriteadslistdata) | **GET** /{user}/marketplace/list-favorites-data | Returns data for advertisement favorites listing of the given user.
*MarketplaceApi* | [**hideAd**](docs/Api/MarketplaceApi.md#hidead) | **POST** /marketplace/{ad}/hide | Hides an advertisement by id.
*MarketplaceApi* | [**markAsFavorite**](docs/Api/MarketplaceApi.md#markasfavorite) | **POST** /marketplace/{ad}/mark-as-favorite | Marks an advertisement as favorite.
*MarketplaceApi* | [**rejectAd**](docs/Api/MarketplaceApi.md#rejectad) | **POST** /marketplace/{ad}/reject | Rejects a pending advertisement.
*MarketplaceApi* | [**searchAds**](docs/Api/MarketplaceApi.md#searchads) | **GET** /marketplace | Searches for advertisements.
*MarketplaceApi* | [**searchUserAds**](docs/Api/MarketplaceApi.md#searchuserads) | **GET** /{user}/marketplace | Searches for advertisements of a specific user.
*MarketplaceApi* | [**setAdAsDraft**](docs/Api/MarketplaceApi.md#setadasdraft) | **POST** /marketplace/{ad}/set-as-draft | Change the advertisement status to &#x60;draft&#x60;.
*MarketplaceApi* | [**submitAdForAuthorization**](docs/Api/MarketplaceApi.md#submitadforauthorization) | **POST** /marketplace/{ad}/request-authorization | Request for authorization for an advertisement.
*MarketplaceApi* | [**unhideAd**](docs/Api/MarketplaceApi.md#unhidead) | **POST** /marketplace/{ad}/unhide | Unhides an advertisement by id.
*MarketplaceApi* | [**unmarkAsFavorite**](docs/Api/MarketplaceApi.md#unmarkasfavorite) | **POST** /marketplace/{ad}/unmark-as-favorite | Makes the advertisement no more a favorite.
*MarketplaceApi* | [**updateAd**](docs/Api/MarketplaceApi.md#updatead) | **PUT** /marketplace/{ad} | Updates an existing advertisement.
*MarketplaceApi* | [**viewAd**](docs/Api/MarketplaceApi.md#viewad) | **GET** /marketplace/{ad} | Returns details of an advertisement.
*MessagesApi* | [**deleteMessage**](docs/Api/MessagesApi.md#deletemessage) | **DELETE** /messages/{id} | Removes a message.
*MessagesApi* | [**getMessageDataForReply**](docs/Api/MessagesApi.md#getmessagedataforreply) | **GET** /messages/{id}/data-for-reply | Returns configuration data for replying a message.
*MessagesApi* | [**getMessageDataForSearch**](docs/Api/MessagesApi.md#getmessagedataforsearch) | **GET** /messages/data-for-search | Returns configuration data for searching messages.
*MessagesApi* | [**getMessageDataForSend**](docs/Api/MessagesApi.md#getmessagedataforsend) | **GET** /messages/data-for-send | Returns configuration data for sending messages.
*MessagesApi* | [**markMessagesAsRead**](docs/Api/MessagesApi.md#markmessagesasread) | **POST** /messages/mark-as-read | Marks a list of messages as read.
*MessagesApi* | [**markMessagesAsUnread**](docs/Api/MessagesApi.md#markmessagesasunread) | **POST** /messages/mark-as-unread | Marks a list of messages as unread.
*MessagesApi* | [**messagesStatus**](docs/Api/MessagesApi.md#messagesstatus) | **GET** /messages/status | Returns information about the received messages.
*MessagesApi* | [**moveMessagesToTrash**](docs/Api/MessagesApi.md#movemessagestotrash) | **POST** /messages/move-to-trash | Moves a list of messages to the trash message box.
*MessagesApi* | [**replyMessage**](docs/Api/MessagesApi.md#replymessage) | **POST** /messages/{id}/reply | Replies a message.
*MessagesApi* | [**restoreMessagesFromTrash**](docs/Api/MessagesApi.md#restoremessagesfromtrash) | **POST** /messages/restore-from-trash | Restores a list of messages from the trash message box.
*MessagesApi* | [**searchMessages**](docs/Api/MessagesApi.md#searchmessages) | **GET** /messages | Searches for the messages of a user.
*MessagesApi* | [**sendMessage**](docs/Api/MessagesApi.md#sendmessage) | **POST** /messages | Sends a new message.
*MessagesApi* | [**updateLastViewDateForMessages**](docs/Api/MessagesApi.md#updatelastviewdateformessages) | **POST** /messages/viewed | Updates the last view date for the messages.
*MessagesApi* | [**viewMessage**](docs/Api/MessagesApi.md#viewmessage) | **GET** /messages/{id} | Returns the message details.
*MobileApi* | [**dataForMobileGuest**](docs/Api/MobileApi.md#dataformobileguest) | **GET** /mobile/data-for-guest | Returns data the mobile application uses while in guest mode
*MobileApi* | [**dataForMobileUser**](docs/Api/MobileApi.md#dataformobileuser) | **GET** /mobile/data-for-user | Returns data the mobile application uses in either user or POS mode
*MobileApi* | [**mobilePageContent**](docs/Api/MobileApi.md#mobilepagecontent) | **GET** /mobile/page/{key} | Returns the content of a mobile page
*NFCApi* | [**cancelNfc**](docs/Api/NFCApi.md#cancelnfc) | **POST** /nfc/cancel | Cancels a NFC tag
*NFCApi* | [**createDeviceConfirmationForPersonalizeNfc**](docs/Api/NFCApi.md#createdeviceconfirmationforpersonalizenfc) | **POST** /nfc/personalize/device-confirmations | Creates a pending device confirmation for personalizing a NFC tag.
*NFCApi* | [**deleteDeviceConfirmationForPersonalizeNfc**](docs/Api/NFCApi.md#deletedeviceconfirmationforpersonalizenfc) | **DELETE** /nfc/personalize/device-confirmations/{id} | Deletes a device confirmation that was created to confirm the personalize nfc-tag operation.
*NFCApi* | [**getDeviceConfirmationQrCodeForPersonalizeNfc**](docs/Api/NFCApi.md#getdeviceconfirmationqrcodeforpersonalizenfc) | **GET** /nfc/personalize/device-confirmations/{id}/qr-code | Returns the QR-code image for the given device confirmation only if it was not yet approved / rejected
*NFCApi* | [**getNfcDataForInitialize**](docs/Api/NFCApi.md#getnfcdataforinitialize) | **GET** /nfc/data-for-initialize | Returns data for NFC tag initialization. Optionally the user can personalize the tag too.
*NFCApi* | [**getNfcDataForPersonalize**](docs/Api/NFCApi.md#getnfcdataforpersonalize) | **GET** /nfc/data-for-personalize | Returns data for perfornalizing an initialized NFC tag for a user
*NFCApi* | [**getNfcToken**](docs/Api/NFCApi.md#getnfctoken) | **GET** /nfc/{tokenType}/{value} | Retrieve the NFC token detailed data
*NFCApi* | [**getOtpForPersonalizeNfc**](docs/Api/NFCApi.md#getotpforpersonalizenfc) | **POST** /nfc/personalize/otp | Generates a new One-Time-Password (OTP) for personalizing a NFC tag
*NFCApi* | [**initializeNfc**](docs/Api/NFCApi.md#initializenfc) | **POST** /nfc/initialize | Initializes a NFC tag
*NFCApi* | [**nfcExternalAuth**](docs/Api/NFCApi.md#nfcexternalauth) | **POST** /nfc/external-auth | NFC external authentication
*NFCApi* | [**personalizeNfc**](docs/Api/NFCApi.md#personalizenfc) | **POST** /nfc/personalize | Personalizes a NFC tag
*NFCApi* | [**viewDeviceConfirmationForPersonalizeNfc**](docs/Api/NFCApi.md#viewdeviceconfirmationforpersonalizenfc) | **GET** /nfc/personalize/device-confirmations/{id} | Shows the details of a device confirmation that was created to confirm the personalize nfc-tag operation.
*NotificationSettingsApi* | [**emailUnsubscribe**](docs/Api/NotificationSettingsApi.md#emailunsubscribe) | **POST** /email-unsubscribe/{key} | Unsubscribes from a specific type of received e-mail.
*NotificationSettingsApi* | [**getDataForEmailUnsubscribe**](docs/Api/NotificationSettingsApi.md#getdataforemailunsubscribe) | **GET** /email-unsubscribe/{key} | Returns data for unsubscribing a specific type of received e-mail.
*NotificationSettingsApi* | [**getNotificationSettingsDataForEdit**](docs/Api/NotificationSettingsApi.md#getnotificationsettingsdataforedit) | **GET** /{user}/notification-settings/data-for-edit | Returns configuration data to edit the notification settings of a user.
*NotificationSettingsApi* | [**saveNotificationSettings**](docs/Api/NotificationSettingsApi.md#savenotificationsettings) | **POST** /{user}/notification-settings | Saves the notification settings for a given user.
*NotificationSettingsApi* | [**viewNotificationSettings**](docs/Api/NotificationSettingsApi.md#viewnotificationsettings) | **GET** /{user}/notification-settings | Returns the notification settings for a given user.
*NotificationsApi* | [**deleteNotification**](docs/Api/NotificationsApi.md#deletenotification) | **DELETE** /notifications/{id} | Removes a notification by id.
*NotificationsApi* | [**markNotificationsAsRead**](docs/Api/NotificationsApi.md#marknotificationsasread) | **POST** /notifications/mark-as-read | Marks a list of notifications as read.
*NotificationsApi* | [**notificationsStatus**](docs/Api/NotificationsApi.md#notificationsstatus) | **GET** /notifications/status | Return information about the received notifications.
*NotificationsApi* | [**searchNotifications**](docs/Api/NotificationsApi.md#searchnotifications) | **GET** /notifications | Searches for the notifications the authenticated user has received.
*NotificationsApi* | [**updateLastViewDateForNotifications**](docs/Api/NotificationsApi.md#updatelastviewdatefornotifications) | **POST** /notifications/viewed | Update the last view date for the notifications.
*NotificationsApi* | [**viewNotification**](docs/Api/NotificationsApi.md#viewnotification) | **GET** /notifications/{id} | Returns the notification details.
*OIDCApi* | [**oidcAuthorize**](docs/Api/OIDCApi.md#oidcauthorize) | **GET** /oidc/authorize | The standard OAuth2 / OpenID Connect authorization endpoint.
*OIDCApi* | [**oidcJwks**](docs/Api/OIDCApi.md#oidcjwks) | **GET** /oidc/jwks | The standard OpenID Connect JWKS endpoint.
*OIDCApi* | [**oidcRegister**](docs/Api/OIDCApi.md#oidcregister) | **POST** /oidc/register | The standard OAuth2 / OpenID dynamic client registration endpoint.
*OIDCApi* | [**oidcRevoke**](docs/Api/OIDCApi.md#oidcrevoke) | **POST** /oidc/revoke | The standard OAuth2 token revocation endpoint.
*OIDCApi* | [**oidcToken**](docs/Api/OIDCApi.md#oidctoken) | **POST** /oidc/token | The standard OAuth2 / OpenID Connect token endpoint.
*OIDCApi* | [**oidcUserInfoGet**](docs/Api/OIDCApi.md#oidcuserinfoget) | **GET** /oidc/userinfo | The standard OpenID Connect UserInfo endpoint, using the &#x60;GET&#x60; method.
*OIDCApi* | [**oidcUserInfoPost**](docs/Api/OIDCApi.md#oidcuserinfopost) | **POST** /oidc/userinfo | The standard OpenID Connect UserInfo endpoint, using the &#x60;POST&#x60; method.
*OperationsApi* | [**getAdOperationDataForRun**](docs/Api/OperationsApi.md#getadoperationdataforrun) | **GET** /marketplace/{ad}/operations/{operation}/data-for-run | Returns configuration data for running a custom operation over an advertisement
*OperationsApi* | [**getContactInfoOperationDataForRun**](docs/Api/OperationsApi.md#getcontactinfooperationdataforrun) | **GET** /contact-infos/{id}/operations/{operation}/data-for-run | Returns configuration data for running a custom operation over a public contact information
*OperationsApi* | [**getContactOperationDataForRun**](docs/Api/OperationsApi.md#getcontactoperationdataforrun) | **GET** /contact-list/{id}/operations/{operation}/data-for-run | Returns configuration data for running a custom operation over a contact
*OperationsApi* | [**getMenuOperationDataForRun**](docs/Api/OperationsApi.md#getmenuoperationdataforrun) | **GET** /menu/{menu}/operations/data-for-run | Returns configuration data for running a custom operation which is in a custom menu
*OperationsApi* | [**getOperationDataForRun**](docs/Api/OperationsApi.md#getoperationdataforrun) | **GET** /operations/{operation}/data-for-run | Returns configuration data for running a custom operation without additional scope
*OperationsApi* | [**getOwnerOperationDataForRun**](docs/Api/OperationsApi.md#getowneroperationdataforrun) | **GET** /{owner}/operations/{operation}/data-for-run | Returns configuration data for running a custom operation over an owner
*OperationsApi* | [**getRecordOperationDataForRun**](docs/Api/OperationsApi.md#getrecordoperationdataforrun) | **GET** /records/{id}/operations/{operation}/data-for-run | Returns configuration data for running a custom operation over a record
*OperationsApi* | [**getTransferOperationDataForRun**](docs/Api/OperationsApi.md#gettransferoperationdataforrun) | **GET** /transfer/{key}/operations/{operation}/data-for-run | Returns configuration data for running a custom operation over a transfer
*OperationsApi* | [**listOperationsByAd**](docs/Api/OperationsApi.md#listoperationsbyad) | **GET** /marketplace/{ad}/operations | Lists the custom operations over the given advertisement
*OperationsApi* | [**listOperationsByContact**](docs/Api/OperationsApi.md#listoperationsbycontact) | **GET** /contact-list/{id}/operations | Lists the custom operations over the given contact
*OperationsApi* | [**listOperationsByContactInfo**](docs/Api/OperationsApi.md#listoperationsbycontactinfo) | **GET** /contact-infos/{id}/operations | Lists the custom operations over the given public contact information
*OperationsApi* | [**listOperationsByOwner**](docs/Api/OperationsApi.md#listoperationsbyowner) | **GET** /{owner}/operations | Lists the custom operations over the system or user
*OperationsApi* | [**listOperationsByRecord**](docs/Api/OperationsApi.md#listoperationsbyrecord) | **GET** /records/{id}/operations | Lists the custom operations over the given record
*OperationsApi* | [**listOperationsByTransfer**](docs/Api/OperationsApi.md#listoperationsbytransfer) | **GET** /transfers/{key}/operations | Lists the custom operations over the given transfer
*OperationsApi* | [**runAdOperation**](docs/Api/OperationsApi.md#runadoperation) | **POST** /marketplace/{ad}/operations/{operation}/run | Runs a custom operation over an advertisement
*OperationsApi* | [**runAdOperationWithUpload**](docs/Api/OperationsApi.md#runadoperationwithupload) | **POST** /marketplace/{ad}/operations/{operation}/run-upload | Runs a custom operation over an advertisement while uploading a file
*OperationsApi* | [**runContactInfoOperation**](docs/Api/OperationsApi.md#runcontactinfooperation) | **POST** /contact-infos/{id}/operations/{operation}/run | Runs a custom operation over a public contact information
*OperationsApi* | [**runContactInfoOperationWithUpload**](docs/Api/OperationsApi.md#runcontactinfooperationwithupload) | **POST** /contact-infos/{id}/operations/{operation}/run-upload | Runs a custom operation over a public contact information while uploading a file
*OperationsApi* | [**runContactOperation**](docs/Api/OperationsApi.md#runcontactoperation) | **POST** /contact-list/{id}/operations/{operation}/run | Runs a custom operation over a contact
*OperationsApi* | [**runContactOperationWithUpload**](docs/Api/OperationsApi.md#runcontactoperationwithupload) | **POST** /contact-list/{id}/operations/{operation}/run-upload | Runs a custom operation over an contact while uploading a file
*OperationsApi* | [**runCustomOperationCallback**](docs/Api/OperationsApi.md#runcustomoperationcallback) | **POST** /operations/callback/{id} | Runs the callback of an external redirect custom operation
*OperationsApi* | [**runMenuOperation**](docs/Api/OperationsApi.md#runmenuoperation) | **POST** /menu/{menu}/operations/run | Runs a custom operation from a custom menu item
*OperationsApi* | [**runMenuOperationWithUpload**](docs/Api/OperationsApi.md#runmenuoperationwithupload) | **POST** /menu/{menu}/operations/run-upload | Runs a custom operation from a custom menu while uploading a file
*OperationsApi* | [**runOperation**](docs/Api/OperationsApi.md#runoperation) | **POST** /operations/{operation}/run | Runs a custom operation without additional scope
*OperationsApi* | [**runOperationWithUpload**](docs/Api/OperationsApi.md#runoperationwithupload) | **POST** /operations/{operation}/run-upload | Runs a custom operation without additional scope while uploading a file
*OperationsApi* | [**runOwnerOperation**](docs/Api/OperationsApi.md#runowneroperation) | **POST** /{owner}/operations/{operation}/run | Runs a custom operation either for system or user
*OperationsApi* | [**runOwnerOperationWithUpload**](docs/Api/OperationsApi.md#runowneroperationwithupload) | **POST** /{owner}/operations/{operation}/run-upload | Runs a custom operation either for system or user while uploading a file
*OperationsApi* | [**runRecordOperation**](docs/Api/OperationsApi.md#runrecordoperation) | **POST** /records/{id}/operations/{operation}/run | Runs a custom operation over a record
*OperationsApi* | [**runRecordOperationWithUpload**](docs/Api/OperationsApi.md#runrecordoperationwithupload) | **POST** /records/{id}/operations/{operation}/run-upload | Runs a custom operation over a record while uploading a file
*OperationsApi* | [**runTransferOperation**](docs/Api/OperationsApi.md#runtransferoperation) | **POST** /transfers/{key}/operations/{operation}/run | Runs a custom operation over a transfer
*OperationsApi* | [**runTransferOperationWithUpload**](docs/Api/OperationsApi.md#runtransferoperationwithupload) | **POST** /transfers/{key}/operations/{operation}/run-upload | Runs a custom operation over a transfer while uploading a file
*OperatorGroupsApi* | [**createOperatorGroup**](docs/Api/OperatorGroupsApi.md#createoperatorgroup) | **POST** /{user}/operator-groups | Creates a new operator group for the given user
*OperatorGroupsApi* | [**deleteOperatorGroup**](docs/Api/OperatorGroupsApi.md#deleteoperatorgroup) | **DELETE** /operator-groups/{id} | Removes an operator group.
*OperatorGroupsApi* | [**getOperatorGroupDataForEdit**](docs/Api/OperatorGroupsApi.md#getoperatorgroupdataforedit) | **GET** /operator-groups/{id}/data-for-edit | Returns data for editing an operator group
*OperatorGroupsApi* | [**getOperatorGroupDataForNew**](docs/Api/OperatorGroupsApi.md#getoperatorgroupdatafornew) | **GET** /{user}/operator-groups/data-for-new | Returns data for creating an operator group
*OperatorGroupsApi* | [**getUserOperatorGroupsListData**](docs/Api/OperatorGroupsApi.md#getuseroperatorgroupslistdata) | **GET** /{user}/operator-groups/list-data | Returns data for operator groups listing of the given user
*OperatorGroupsApi* | [**listOperatorGroupsByUser**](docs/Api/OperatorGroupsApi.md#listoperatorgroupsbyuser) | **GET** /{user}/operator-groups | Lists all operator groups for a given user
*OperatorGroupsApi* | [**updateOperatorGroup**](docs/Api/OperatorGroupsApi.md#updateoperatorgroup) | **PUT** /operator-groups/{id} | Updates an existing operator group.
*OperatorGroupsApi* | [**viewOperatorGroup**](docs/Api/OperatorGroupsApi.md#viewoperatorgroup) | **GET** /operator-groups/{id} | Returns details of a specific operator group
*OperatorsApi* | [**getGeneralOperatorsDataForSearch**](docs/Api/OperatorsApi.md#getgeneraloperatorsdataforsearch) | **GET** /operators/data-for-search | Get configuration data for searching operators of any managed user
*OperatorsApi* | [**getOperatorDataForNew**](docs/Api/OperatorsApi.md#getoperatordatafornew) | **GET** /{user}/operators/data-for-new | Get configuration data for registering a new operator
*OperatorsApi* | [**getUserOperatorsDataForSearch**](docs/Api/OperatorsApi.md#getuseroperatorsdataforsearch) | **GET** /{user}/operators/data-for-search | Get configuration data for searching operators of the given user
*OperatorsApi* | [**registerOperator**](docs/Api/OperatorsApi.md#registeroperator) | **POST** /{user}/operators | Registers a new operator
*OperatorsApi* | [**searchGeneralOperators**](docs/Api/OperatorsApi.md#searchgeneraloperators) | **GET** /operators | Search the visible operators (of any managed user)
*OperatorsApi* | [**searchUserOperators**](docs/Api/OperatorsApi.md#searchuseroperators) | **GET** /{user}/operators | Search the operators of a given user
*OrdersApi* | [**acceptOrderByBuyer**](docs/Api/OrdersApi.md#acceptorderbybuyer) | **POST** /orders/{order}/buyer/accept | Accepts a pending order by buyer.
*OrdersApi* | [**acceptOrderBySeller**](docs/Api/OrdersApi.md#acceptorderbyseller) | **POST** /orders/{order}/seller/accept | Accepts a pending order by seller.
*OrdersApi* | [**createOrder**](docs/Api/OrdersApi.md#createorder) | **POST** /{user}/orders | Creates a new order as the seller for a specific buyer
*OrdersApi* | [**deleteOrder**](docs/Api/OrdersApi.md#deleteorder) | **DELETE** /orders/{order} | Removes an order.
*OrdersApi* | [**exportOrder**](docs/Api/OrdersApi.md#exportorder) | **GET** /orders/{order}/export/{format} | Exports the order details to a file.
*OrdersApi* | [**getDataForSetDeliveryMethod**](docs/Api/OrdersApi.md#getdataforsetdeliverymethod) | **GET** /orders/{order}/seller/data-for-set-delivery | Returns configuration data to set delivery method data by seller.
*OrdersApi* | [**getOrderDataForAcceptByBuyer**](docs/Api/OrdersApi.md#getorderdataforacceptbybuyer) | **GET** /orders/{order}/buyer/data-for-accept | Returns configuration data for accept an order by buyer.
*OrdersApi* | [**getOrderDataForEdit**](docs/Api/OrdersApi.md#getorderdataforedit) | **GET** /orders/{order}/data-for-edit | Returns data for modifying an order as the seller.
*OrdersApi* | [**getOrderDataForNew**](docs/Api/OrdersApi.md#getorderdatafornew) | **GET** /{user}/orders/data-for-new | Returns data for creating orders as the seller for a specific buyer.
*OrdersApi* | [**getOrderDataForSearch**](docs/Api/OrdersApi.md#getorderdataforsearch) | **GET** /{user}/orders/data-for-search | Returns data for searching orders (purchases / sales) of a specific user.
*OrdersApi* | [**rejectOrder**](docs/Api/OrdersApi.md#rejectorder) | **POST** /orders/{order}/reject | Rejects a pending order.
*OrdersApi* | [**searchUserOrders**](docs/Api/OrdersApi.md#searchuserorders) | **GET** /{user}/orders | Searches for orders of a specific user.
*OrdersApi* | [**setDeliveryMethod**](docs/Api/OrdersApi.md#setdeliverymethod) | **POST** /orders/{order}/seller/set-delivery | Sets delivery method data by seller.
*OrdersApi* | [**updateOrder**](docs/Api/OrdersApi.md#updateorder) | **PUT** /orders/{order} | Updates an existing order.
*OrdersApi* | [**viewOrder**](docs/Api/OrdersApi.md#vieworder) | **GET** /orders/{order} | Returns details of an order.
*POSApi* | [**calculateReceivePaymentInstallments**](docs/Api/POSApi.md#calculatereceivepaymentinstallments) | **GET** /pos/installments | Calculates the default installments for a scheduled payment
*POSApi* | [**dataForReceivePayment**](docs/Api/POSApi.md#dataforreceivepayment) | **GET** /pos/data-for-pos | Returns configuration data for receiving a payment (POS)
*POSApi* | [**previewReceivePayment**](docs/Api/POSApi.md#previewreceivepayment) | **POST** /pos/preview | Previews a POS payment before receiving it
*POSApi* | [**receivePayment**](docs/Api/POSApi.md#receivepayment) | **POST** /pos | Receives a payment (POS)
*POSApi* | [**receivePaymentCreateDeviceConfirmation**](docs/Api/POSApi.md#receivepaymentcreatedeviceconfirmation) | **POST** /pos/device-confirmations | Creates a pending device confirmation for a pos payment.
*POSApi* | [**receivePaymentDeleteDeviceConfirmation**](docs/Api/POSApi.md#receivepaymentdeletedeviceconfirmation) | **DELETE** /pos/device-confirmations/{id} | Deletes a device confirmation for a POS payer.
*POSApi* | [**receivePaymentDeviceConfirmationQrCode**](docs/Api/POSApi.md#receivepaymentdeviceconfirmationqrcode) | **GET** /pos/device-confirmations/{id}/qr-code | Returns the QR-code image for the given device confirmation only if it was not yet approved / rejected
*POSApi* | [**receivePaymentOtp**](docs/Api/POSApi.md#receivepaymentotp) | **POST** /pos/otp | Generates a new One-Time-Password (OTP) for a pos payment
*POSApi* | [**receivePaymentViewDeviceConfirmation**](docs/Api/POSApi.md#receivepaymentviewdeviceconfirmation) | **GET** /pos/device-confirmations/{id} | Shows the details of a device confirmation for a POS payer.
*PasswordsApi* | [**allowGeneration**](docs/Api/PasswordsApi.md#allowgeneration) | **POST** /{user}/passwords/{type}/allow-generation | Allows the given user to generate the password for the first time for the given type.
*PasswordsApi* | [**changeGenerated**](docs/Api/PasswordsApi.md#changegenerated) | **POST** /passwords/{type}/change-generated | Generates a new value for an active generated password.
*PasswordsApi* | [**changePassword**](docs/Api/PasswordsApi.md#changepassword) | **POST** /{user}/passwords/{type}/change | Changes a manual password
*PasswordsApi* | [**disablePassword**](docs/Api/PasswordsApi.md#disablepassword) | **POST** /{user}/passwords/{type}/disable | Disables a password, making it unusable until manually re-enabled
*PasswordsApi* | [**enablePassword**](docs/Api/PasswordsApi.md#enablepassword) | **POST** /{user}/passwords/{type}/enable | Re-enables a disabled a password
*PasswordsApi* | [**generatePassword**](docs/Api/PasswordsApi.md#generatepassword) | **POST** /passwords/{type}/generate | Generates the value of a generated password for the first time or if expired.
*PasswordsApi* | [**getUserPasswordsData**](docs/Api/PasswordsApi.md#getuserpasswordsdata) | **GET** /{user}/passwords/{type} | Returns complete data of the given password the given user have.
*PasswordsApi* | [**getUserPasswordsListData**](docs/Api/PasswordsApi.md#getuserpasswordslistdata) | **GET** /{user}/passwords/list-data | Returns complete data for each passwords the given user have.
*PasswordsApi* | [**listUserPasswords**](docs/Api/PasswordsApi.md#listuserpasswords) | **GET** /{user}/passwords | Returns the status for each passwords the given user have.
*PasswordsApi* | [**resetAndSendPassword**](docs/Api/PasswordsApi.md#resetandsendpassword) | **POST** /{user}/passwords/{type}/reset-and-send | Generates a new value for a manual password and send it to the user via e-mail
*PasswordsApi* | [**resetGeneratedPassword**](docs/Api/PasswordsApi.md#resetgeneratedpassword) | **POST** /{user}/passwords/{type}/reset-generated | Resets a generated password, allowing it to be generated again
*PasswordsApi* | [**resetUserSecurityAnswer**](docs/Api/PasswordsApi.md#resetusersecurityanswer) | **DELETE** /{user}/security-answer | Resets a user security answer, allowing they to change it
*PasswordsApi* | [**setSecurityAnswer**](docs/Api/PasswordsApi.md#setsecurityanswer) | **POST** /security-answer | Sets the security answer if the current authenticated user
*PasswordsApi* | [**unblockPassword**](docs/Api/PasswordsApi.md#unblockpassword) | **POST** /{user}/passwords/{type}/unblock | Unblocks a password that has been blocked by exceeding the wrong tries
*PaymentFeedbacksApi* | [**addPaymentFeedbackIgnoredUser**](docs/Api/PaymentFeedbacksApi.md#addpaymentfeedbackignoreduser) | **POST** /{user}/payment-feedback-ignored-users | Adds a user as ignored for payment feedback.
*PaymentFeedbacksApi* | [**getPaymentFeedbackDataForEdit**](docs/Api/PaymentFeedbacksApi.md#getpaymentfeedbackdataforedit) | **GET** /payment-feedbacks/{key}/data-for-edit | Returns configuration data for editing a payment feedback as manager.
*PaymentFeedbacksApi* | [**getPaymentFeedbackStatistics**](docs/Api/PaymentFeedbacksApi.md#getpaymentfeedbackstatistics) | **GET** /{user}/payment-feedbacks/statistics | Returns payment feedback statistics of a specific user.
*PaymentFeedbacksApi* | [**getPaymentFeedbacksDataForGive**](docs/Api/PaymentFeedbacksApi.md#getpaymentfeedbacksdataforgive) | **GET** /payment-feedbacks/{key}/data-for-give | Returns data for create or update a payment feedback.
*PaymentFeedbacksApi* | [**getPaymentFeedbacksDataForReply**](docs/Api/PaymentFeedbacksApi.md#getpaymentfeedbacksdataforreply) | **GET** /payment-feedbacks/{key}/data-for-reply | Returns data for reply a given payment feedback.
*PaymentFeedbacksApi* | [**getPaymentFeedbacksDataForSearch**](docs/Api/PaymentFeedbacksApi.md#getpaymentfeedbacksdataforsearch) | **GET** /{user}/payment-feedbacks/data-for-search | Returns data for searching payment feedbacks of a specific user.
*PaymentFeedbacksApi* | [**givePaymentFeedback**](docs/Api/PaymentFeedbacksApi.md#givepaymentfeedback) | **POST** /payment-feedbacks/{key}/give | Creates or updates a payment feedback.
*PaymentFeedbacksApi* | [**listPaymentFeedbackIgnoredUsers**](docs/Api/PaymentFeedbacksApi.md#listpaymentfeedbackignoredusers) | **GET** /{user}/payment-feedback-ignored-users | Lists the users marked as ignored for payment feedbacks.
*PaymentFeedbacksApi* | [**removePaymentFeedback**](docs/Api/PaymentFeedbacksApi.md#removepaymentfeedback) | **DELETE** /payment-feedbacks/{key} | Deletes an existing payment feedback as manager.
*PaymentFeedbacksApi* | [**removePaymentFeedbackIgnoredUser**](docs/Api/PaymentFeedbacksApi.md#removepaymentfeedbackignoreduser) | **DELETE** /{user}/payment-feedback-ignored-users/{ignored} | Removes a user from the ignored users list.
*PaymentFeedbacksApi* | [**replyPaymentFeedback**](docs/Api/PaymentFeedbacksApi.md#replypaymentfeedback) | **POST** /payment-feedbacks/{key}/reply | Replies an already given payment feedback.
*PaymentFeedbacksApi* | [**searchPaymentAwaitingFeedback**](docs/Api/PaymentFeedbacksApi.md#searchpaymentawaitingfeedback) | **GET** /{user}/payments-awaiting-feedback | Searches for payments performed by the user without feedback.
*PaymentFeedbacksApi* | [**searchPaymentFeedbacks**](docs/Api/PaymentFeedbacksApi.md#searchpaymentfeedbacks) | **GET** /{user}/payment-feedbacks | Searches for payment feedbacks of a specific user.
*PaymentFeedbacksApi* | [**updatePaymentFeedback**](docs/Api/PaymentFeedbacksApi.md#updatepaymentfeedback) | **PUT** /payment-feedbacks/{key} | Updates an existing payment feedback as manager.
*PaymentFeedbacksApi* | [**viewPaymentFeedback**](docs/Api/PaymentFeedbacksApi.md#viewpaymentfeedback) | **GET** /payment-feedbacks/{key} | Returns details of a specific payment feedback.
*PaymentLimitsApi* | [**exportAccountPaymentLimits**](docs/Api/PaymentLimitsApi.md#exportaccountpaymentlimits) | **GET** /accounts/payment-limits/export/{format} | Exports the account payment limits results as file.
*PaymentLimitsApi* | [**getAccountPaymentLimits**](docs/Api/PaymentLimitsApi.md#getaccountpaymentlimits) | **GET** /{user}/accounts/{accountType}/payment-limits | Returns data for the limits of a given account
*PaymentLimitsApi* | [**getAccountPaymentLimitsData**](docs/Api/PaymentLimitsApi.md#getaccountpaymentlimitsdata) | **GET** /accounts/data-for-payment-limits | Returns data for a general search of account payment limits.
*PaymentLimitsApi* | [**getDataForUserPaymentLimits**](docs/Api/PaymentLimitsApi.md#getdataforuserpaymentlimits) | **GET** /{user}/accounts/data-for-payment-limits | Returns data regarding the limits of all accounts of a given user.
*PaymentLimitsApi* | [**searchAccountPaymentLimits**](docs/Api/PaymentLimitsApi.md#searchaccountpaymentlimits) | **GET** /accounts/payment-limits | Searches for account payment limits.
*PaymentLimitsApi* | [**setAccountPaymentLimits**](docs/Api/PaymentLimitsApi.md#setaccountpaymentlimits) | **PUT** /{user}/accounts/{accountType}/payment-limits | Sets the limits for a given user account.
*PaymentRequestsApi* | [**acceptPaymentRequest**](docs/Api/PaymentRequestsApi.md#acceptpaymentrequest) | **POST** /payment-requests/{key}/accept | Accepts a payment request.
*PaymentRequestsApi* | [**cancelPaymentRequest**](docs/Api/PaymentRequestsApi.md#cancelpaymentrequest) | **POST** /payment-requests/{key}/cancel | Cancels a payment request.
*PaymentRequestsApi* | [**changePaymentRequestExpirationDate**](docs/Api/PaymentRequestsApi.md#changepaymentrequestexpirationdate) | **POST** /payment-requests/{key}/change-expiration | Changes the payment request expiration.
*PaymentRequestsApi* | [**dataForSendPaymentRequest**](docs/Api/PaymentRequestsApi.md#dataforsendpaymentrequest) | **GET** /{owner}/payment-requests/data-for-send | Returns configuration data for sending a payment request
*PaymentRequestsApi* | [**previewPaymentRequest**](docs/Api/PaymentRequestsApi.md#previewpaymentrequest) | **GET** /payment-requests/{key}/preview | Previews the payment performed when accepting the given payment request.
*PaymentRequestsApi* | [**rejectPaymentRequest**](docs/Api/PaymentRequestsApi.md#rejectpaymentrequest) | **POST** /payment-requests/{key}/reject | Rejects a payment request.
*PaymentRequestsApi* | [**reschedulePaymentRequest**](docs/Api/PaymentRequestsApi.md#reschedulepaymentrequest) | **POST** /payment-requests/{key}/reschedule | Reschedules a payment request.
*PaymentRequestsApi* | [**sendPaymentRequest**](docs/Api/PaymentRequestsApi.md#sendpaymentrequest) | **POST** /{owner}/payment-requests | Sends a payment request from the given owner
*PaymentsApi* | [**calculatePerformPaymentInstallments**](docs/Api/PaymentsApi.md#calculateperformpaymentinstallments) | **GET** /{owner}/payments/installments | Calculates the default installments for a scheduled payment
*PaymentsApi* | [**dataForPerformPayment**](docs/Api/PaymentsApi.md#dataforperformpayment) | **GET** /{owner}/payments/data-for-perform | Returns configuration data for performing a payment
*PaymentsApi* | [**performPayment**](docs/Api/PaymentsApi.md#performpayment) | **POST** /{owner}/payments | Performs a payment from the given owner
*PaymentsApi* | [**previewPayment**](docs/Api/PaymentsApi.md#previewpayment) | **POST** /{owner}/payments/preview | Previews a payment before performing it
*PendingPaymentsApi* | [**authorizePendingPayment**](docs/Api/PendingPaymentsApi.md#authorizependingpayment) | **POST** /pending-payments/{key}/authorize | Authorizes a pending payment.
*PendingPaymentsApi* | [**cancelPendingPayment**](docs/Api/PendingPaymentsApi.md#cancelpendingpayment) | **POST** /pending-payments/{key}/cancel | Cancels the authorization process of a pending payment.
*PendingPaymentsApi* | [**denyPendingPayment**](docs/Api/PendingPaymentsApi.md#denypendingpayment) | **POST** /pending-payments/{key}/deny | Denies a pending payment.
*PhonesApi* | [**createPhone**](docs/Api/PhonesApi.md#createphone) | **POST** /{user}/phones | Creates a new phone for the given user
*PhonesApi* | [**deletePhone**](docs/Api/PhonesApi.md#deletephone) | **DELETE** /phones/{idOrNumber} | Removes a phone
*PhonesApi* | [**disablePhoneForSms**](docs/Api/PhonesApi.md#disablephoneforsms) | **POST** /phones/{idOrNumber}/disable-for-sms | Marks a phone as disabled to receive SMS notifications and operate in the SMS channel
*PhonesApi* | [**enablePhoneForSms**](docs/Api/PhonesApi.md#enablephoneforsms) | **POST** /phones/{idOrNumber}/enable-for-sms | Marks a phone as enabled to receive SMS notifications and operate in the SMS channel
*PhonesApi* | [**getPasswordInputForDisablePhoneForSms**](docs/Api/PhonesApi.md#getpasswordinputfordisablephoneforsms) | **GET** /phones/{idOrNumber}/password-for-disable-sms | Returns a confirmation &#x60;PasswordInput&#x60; for disabling SMS of a phone, if any
*PhonesApi* | [**getPasswordInputForRemovePhone**](docs/Api/PhonesApi.md#getpasswordinputforremovephone) | **GET** /phones/{idOrNumber}/password-for-remove | Returns a confirmation &#x60;PasswordInput&#x60; for removing a phone, if any
*PhonesApi* | [**getPhoneDataForEdit**](docs/Api/PhonesApi.md#getphonedataforedit) | **GET** /phones/{idOrNumber}/data-for-edit | Returns data to edit an existing phone
*PhonesApi* | [**getPhoneDataForNew**](docs/Api/PhonesApi.md#getphonedatafornew) | **GET** /{user}/phones/data-for-new | Returns data to create a new phone
*PhonesApi* | [**getUserPhonesListData**](docs/Api/PhonesApi.md#getuserphoneslistdata) | **GET** /{user}/phones/list-data | Returns data for listing a user&#39;s phones
*PhonesApi* | [**listPhonesByUser**](docs/Api/PhonesApi.md#listphonesbyuser) | **GET** /{user}/phones | Lists all (visible) user phones
*PhonesApi* | [**sendPhoneVerificationCode**](docs/Api/PhonesApi.md#sendphoneverificationcode) | **POST** /phones/{idOrNumber}/send-verification-code | Sends the verification code for a user to verify the mobile phone
*PhonesApi* | [**updatePhone**](docs/Api/PhonesApi.md#updatephone) | **PUT** /phones/{idOrNumber} | Updates an existing phone
*PhonesApi* | [**verifyPhone**](docs/Api/PhonesApi.md#verifyphone) | **POST** /phones/{idOrNumber}/verify | Marks a mobile phone as verified if the code matches
*PhonesApi* | [**viewPhone**](docs/Api/PhonesApi.md#viewphone) | **GET** /phones/{idOrNumber} | Returns details of a specific phone
*PrivacySettingsApi* | [**getPrivacySettingsData**](docs/Api/PrivacySettingsApi.md#getprivacysettingsdata) | **GET** /{user}/privacy-settings | Get the privacy settings data
*PrivacySettingsApi* | [**savePrivacySettings**](docs/Api/PrivacySettingsApi.md#saveprivacysettings) | **POST** /{user}/privacy-settings | Saves the privacy settings for a given user.
*ProductAssignmentApi* | [**assignIndividualProduct**](docs/Api/ProductAssignmentApi.md#assignindividualproduct) | **POST** /{user}/products/{product} | Assigns a product to an individual user.
*ProductAssignmentApi* | [**getUserProductsData**](docs/Api/ProductAssignmentApi.md#getuserproductsdata) | **GET** /{user}/products | Returns the user individual products and the change history
*ProductAssignmentApi* | [**unassignIndividualProduct**](docs/Api/ProductAssignmentApi.md#unassignindividualproduct) | **DELETE** /{user}/products/{product} | Unassigns a product to an individual user.
*PushApi* | [**subscribeForPushNotifications**](docs/Api/PushApi.md#subscribeforpushnotifications) | **GET** /push/subscribe | Subscribes for receiving push notifications of specific types
*RecordsApi* | [**createRecord**](docs/Api/RecordsApi.md#createrecord) | **POST** /{owner}/records/{type} | Creates a new record for the given owner and type
*RecordsApi* | [**deleteRecord**](docs/Api/RecordsApi.md#deleterecord) | **DELETE** /records/{id} | Removes a record
*RecordsApi* | [**exportGeneralRecords**](docs/Api/RecordsApi.md#exportgeneralrecords) | **GET** /general-records/{type}/export/{format} | Exports the general records search results as file
*RecordsApi* | [**exportOwnerRecords**](docs/Api/RecordsApi.md#exportownerrecords) | **GET** /{owner}/records/{type}/export/{format} | Exports the records search results as file
*RecordsApi* | [**exportSharedRecords**](docs/Api/RecordsApi.md#exportsharedrecords) | **GET** /shared-records/export/{format} | Exports the shared fields records search results as file
*RecordsApi* | [**getPasswordInputForRemoveRecord**](docs/Api/RecordsApi.md#getpasswordinputforremoverecord) | **GET** /records/{id}/password-for-remove | Returns a confirmation &#x60;PasswordInput&#x60; for removing a record, if any
*RecordsApi* | [**getRecordDataForEdit**](docs/Api/RecordsApi.md#getrecorddataforedit) | **GET** /records/{id}/data-for-edit | Returns data to edit an existing record
*RecordsApi* | [**getRecordDataForGeneralSearch**](docs/Api/RecordsApi.md#getrecorddataforgeneralsearch) | **GET** /general-records/{type}/data-for-search | Returns data for searching records of a type over any owner
*RecordsApi* | [**getRecordDataForNew**](docs/Api/RecordsApi.md#getrecorddatafornew) | **GET** /{owner}/records/{type}/data-for-new | Returns data to create a new record
*RecordsApi* | [**getRecordDataForOwnerSearch**](docs/Api/RecordsApi.md#getrecorddataforownersearch) | **GET** /{owner}/records/{type}/data-for-search | Returns data for searching records of a specific type and owner
*RecordsApi* | [**getRecordDataForSharedSearch**](docs/Api/RecordsApi.md#getrecorddataforsharedsearch) | **GET** /shared-records/data-for-search | Returns data for searching records with shared fields
*RecordsApi* | [**getRecordTypeByOwner**](docs/Api/RecordsApi.md#getrecordtypebyowner) | **GET** /{owner}/record-types/{type} | Returns a single record type over a user or system
*RecordsApi* | [**listRecordTypesByOwner**](docs/Api/RecordsApi.md#listrecordtypesbyowner) | **GET** /{owner}/record-types | Lists the record types over a user or system
*RecordsApi* | [**listRecordTypesForGeneralSearch**](docs/Api/RecordsApi.md#listrecordtypesforgeneralsearch) | **GET** /general-records/record-types | Lists the record types for general search
*RecordsApi* | [**searchGeneralRecords**](docs/Api/RecordsApi.md#searchgeneralrecords) | **GET** /general-records/{type} | Searches for records of a specific type over any owner
*RecordsApi* | [**searchOwnerRecords**](docs/Api/RecordsApi.md#searchownerrecords) | **GET** /{owner}/records/{type} | Searches for records of a specific type and owner
*RecordsApi* | [**searchSharedRecords**](docs/Api/RecordsApi.md#searchsharedrecords) | **GET** /shared-records | Searches for records with shared fields
*RecordsApi* | [**updateRecord**](docs/Api/RecordsApi.md#updaterecord) | **PUT** /records/{id} | Updates an existing record
*RecordsApi* | [**viewRecord**](docs/Api/RecordsApi.md#viewrecord) | **GET** /records/{id} | Returns details of a specific record
*RecurringPaymentsApi* | [**blockRecurringPayment**](docs/Api/RecurringPaymentsApi.md#blockrecurringpayment) | **POST** /recurring-payments/{key}/block | Blocks a recurring payment.
*RecurringPaymentsApi* | [**cancelRecurringPayment**](docs/Api/RecurringPaymentsApi.md#cancelrecurringpayment) | **POST** /recurring-payments/{key}/cancel | Cancels a recurring payment.
*RecurringPaymentsApi* | [**getRecurringPaymentDataForEdit**](docs/Api/RecurringPaymentsApi.md#getrecurringpaymentdataforedit) | **GET** /recurring-payments/{key}/data-for-edit | Returns data to edit an existing recurring payment
*RecurringPaymentsApi* | [**modifyRecurringPayment**](docs/Api/RecurringPaymentsApi.md#modifyrecurringpayment) | **PUT** /recurring-payments/{key}/modify | Modifies a recurring payment.
*RecurringPaymentsApi* | [**unblockRecurringPayment**](docs/Api/RecurringPaymentsApi.md#unblockrecurringpayment) | **POST** /recurring-payments/{key}/unblock | Unblocks a recurring payment.
*ReferencesApi* | [**deleteReference**](docs/Api/ReferencesApi.md#deletereference) | **DELETE** /references/{id} | Removes a reference
*ReferencesApi* | [**getReferenceDataForEdit**](docs/Api/ReferencesApi.md#getreferencedataforedit) | **GET** /references/{id}/data-for-edit | Returns data to edit an existing reference.
*ReferencesApi* | [**getReferenceDataForSet**](docs/Api/ReferencesApi.md#getreferencedataforset) | **GET** /{from}/reference/{to}/data-for-set | Returns details for setting a reference.
*ReferencesApi* | [**getUserReferenceStatistics**](docs/Api/ReferencesApi.md#getuserreferencestatistics) | **GET** /{user}/references/statistics | Returns statistics for a given user references.
*ReferencesApi* | [**getUserReferencesDataForSearch**](docs/Api/ReferencesApi.md#getuserreferencesdataforsearch) | **GET** /{user}/references/data-for-search | Returns data for searching references of a specific user.
*ReferencesApi* | [**searchUserReferences**](docs/Api/ReferencesApi.md#searchuserreferences) | **GET** /{user}/references | Searches for references of a specific user
*ReferencesApi* | [**setReference**](docs/Api/ReferencesApi.md#setreference) | **POST** /{from}/reference/{to} | Creates or changes the reference between the given users.
*ReferencesApi* | [**updateReference**](docs/Api/ReferencesApi.md#updatereference) | **PUT** /references/{id} | Updates an existing reference.
*ReferencesApi* | [**viewReference**](docs/Api/ReferencesApi.md#viewreference) | **GET** /references/{id} | Returns details of a specific reference.
*ScheduledPaymentsApi* | [**blockScheduledPayment**](docs/Api/ScheduledPaymentsApi.md#blockscheduledpayment) | **POST** /scheduled-payments/{key}/block | Blocks a scheduled payment.
*ScheduledPaymentsApi* | [**cancelScheduledPayment**](docs/Api/ScheduledPaymentsApi.md#cancelscheduledpayment) | **POST** /scheduled-payments/{key}/cancel | Cancels a scheduled payment.
*ScheduledPaymentsApi* | [**settleScheduledPayment**](docs/Api/ScheduledPaymentsApi.md#settlescheduledpayment) | **POST** /scheduled-payments/{key}/settle-remaining | Settles all remaining installments in a scheduled payment.
*ScheduledPaymentsApi* | [**unblockScheduledPayment**](docs/Api/ScheduledPaymentsApi.md#unblockscheduledpayment) | **POST** /scheduled-payments/{key}/unblock | Unblocks a scheduled payment.
*SessionsApi* | [**disconnectSession**](docs/Api/SessionsApi.md#disconnectsession) | **DELETE** /sessions/{sessionToken} | Disconnects a session.
*SessionsApi* | [**disconnectUserSessions**](docs/Api/SessionsApi.md#disconnectusersessions) | **DELETE** /{user}/sessions | Disconnects all sessions of a user.
*SessionsApi* | [**getSessionDataForSearch**](docs/Api/SessionsApi.md#getsessiondataforsearch) | **GET** /sessions/data-for-search | Returns data for searching user sessions
*SessionsApi* | [**loginUser**](docs/Api/SessionsApi.md#loginuser) | **POST** /sessions | Logins a user, returning data from the new session
*SessionsApi* | [**searchSessions**](docs/Api/SessionsApi.md#searchsessions) | **GET** /sessions | Search for sessions
*ShoppingCartsApi* | [**addItemToShoppingCart**](docs/Api/ShoppingCartsApi.md#additemtoshoppingcart) | **POST** /shopping-carts/items/{ad} | Adds the given webshop ad to the corresponding shopping cart.
*ShoppingCartsApi* | [**adjustAndGetShoppingCartDetails**](docs/Api/ShoppingCartsApi.md#adjustandgetshoppingcartdetails) | **POST** /shopping-carts/{id}/adjust | Adjusts a shopping cart items, returning its details.
*ShoppingCartsApi* | [**checkoutShoppingCart**](docs/Api/ShoppingCartsApi.md#checkoutshoppingcart) | **POST** /shopping-carts/{id}/checkout | Checks out a shopping cart.
*ShoppingCartsApi* | [**getShoppingCartDataForCheckout**](docs/Api/ShoppingCartsApi.md#getshoppingcartdataforcheckout) | **GET** /shopping-carts/{id}/data-for-checkout | Returns configuration data for check-out a shopping cart.
*ShoppingCartsApi* | [**getShoppingCartDetails**](docs/Api/ShoppingCartsApi.md#getshoppingcartdetails) | **GET** /shopping-carts/{id} | Returns details of a shopping cart.
*ShoppingCartsApi* | [**getShoppingCarts**](docs/Api/ShoppingCartsApi.md#getshoppingcarts) | **GET** /shopping-carts | Returns the shopping carts list.
*ShoppingCartsApi* | [**modifyItemQuantityOnShoppingCart**](docs/Api/ShoppingCartsApi.md#modifyitemquantityonshoppingcart) | **PUT** /shopping-carts/items/{ad} | Modifies the corresponding cart with the new quantity for the given webshop ad.
*ShoppingCartsApi* | [**removeItemFromShoppingCart**](docs/Api/ShoppingCartsApi.md#removeitemfromshoppingcart) | **DELETE** /shopping-carts/items/{ad} | Removes the given webshop ad from the corresponding shopping cart.
*ShoppingCartsApi* | [**removeShoppingCart**](docs/Api/ShoppingCartsApi.md#removeshoppingcart) | **DELETE** /shopping-carts/{id} | Removes a shopping cart.
*TOTPApi* | [**activateTotpSecret**](docs/Api/TOTPApi.md#activatetotpsecret) | **POST** /totp-secret/activate | Finishes the activation process of the TOTP for the logged user.
*TOTPApi* | [**deleteUserTotpSecret**](docs/Api/TOTPApi.md#deleteusertotpsecret) | **DELETE** /{user}/totp-secret | Removes the TOTP secret of a user.
*TOTPApi* | [**sendTotpSecretActivationCode**](docs/Api/TOTPApi.md#sendtotpsecretactivationcode) | **POST** /totp-secret/send-activaction-code | Sends a activation code, so the user identity is validated before activating a TOTP.
*TOTPApi* | [**verifyTotpSecretActivationCode**](docs/Api/TOTPApi.md#verifytotpsecretactivationcode) | **POST** /totp-secret/verify-activation-code | Verifies the sent activation code, returning the secret URL for the app.
*TOTPApi* | [**viewUserTotpSecret**](docs/Api/TOTPApi.md#viewusertotpsecret) | **GET** /{user}/totp-secret | Returns information about the TOTP secret for the given user.
*TicketsApi* | [**approveTicket**](docs/Api/TicketsApi.md#approveticket) | **POST** /tickets/{ticket}/approve | Approves a ticket by the payer.
*TicketsApi* | [**cancelTicket**](docs/Api/TicketsApi.md#cancelticket) | **POST** /tickets/{ticket}/cancel | Cancels a ticket by the receiver.
*TicketsApi* | [**dataForNewTicket**](docs/Api/TicketsApi.md#datafornewticket) | **GET** /{user}/tickets/data-for-new | Returns data for create a new ticket for the given user.
*TicketsApi* | [**dataForNewTicketDeprecated**](docs/Api/TicketsApi.md#datafornewticketdeprecated) | **GET** /tickets/data-for-new | Returns data for create a new ticket for the logged user.
*TicketsApi* | [**getTicketQrCode**](docs/Api/TicketsApi.md#getticketqrcode) | **GET** /tickets/{ticket}/qr-code | Returns the QR-code image for the given ticket only if its status is &#x60;open&#x60;
*TicketsApi* | [**newTicket**](docs/Api/TicketsApi.md#newticket) | **POST** /{user}/tickets | Creates a new ticket with status &#x60;open&#x60; for the given user.
*TicketsApi* | [**newTicketDeprecated**](docs/Api/TicketsApi.md#newticketdeprecated) | **POST** /tickets | Creates a new ticket with status &#x60;open&#x60; for the logged user.
*TicketsApi* | [**previewTicket**](docs/Api/TicketsApi.md#previewticket) | **POST** /tickets/{ticket}/preview | Previews the payment generated by the ticket.
*TicketsApi* | [**processTicket**](docs/Api/TicketsApi.md#processticket) | **POST** /tickets/{ticket}/process | Processes a ticket by the receiver.
*TicketsApi* | [**viewTicket**](docs/Api/TicketsApi.md#viewticket) | **GET** /tickets/{ticket} | Returns details about a ticket by ticket number
*TokensApi* | [**activatePendingToken**](docs/Api/TokensApi.md#activatependingtoken) | **POST** /tokens/{id}/activate | Activates a token.
*TokensApi* | [**activateToken**](docs/Api/TokensApi.md#activatetoken) | **POST** /{user}/tokens/{type} | Activates a pending / unassigned token.
*TokensApi* | [**assignToken**](docs/Api/TokensApi.md#assigntoken) | **POST** /tokens/{id}/assign/{user} | Assigns a token to a given user.
*TokensApi* | [**blockToken**](docs/Api/TokensApi.md#blocktoken) | **POST** /tokens/{id}/block | Blocks a token.
*TokensApi* | [**cancelToken**](docs/Api/TokensApi.md#canceltoken) | **POST** /tokens/{id}/cancel | Permanently cancels a token.
*TokensApi* | [**createToken**](docs/Api/TokensApi.md#createtoken) | **POST** /tokens/{type}/new | Creates a new token of the given type.
*TokensApi* | [**getGeneralTokensDataForSearch**](docs/Api/TokensApi.md#getgeneraltokensdataforsearch) | **GET** /general-tokens/{type}/data-for-search | Returns data for searching tokens of a specific type.
*TokensApi* | [**getTokenDataForNew**](docs/Api/TokensApi.md#gettokendatafornew) | **GET** /tokens/{type}/data-for-new | Returns data to create a new token for the given type.
*TokensApi* | [**getTokenQrCode**](docs/Api/TokensApi.md#gettokenqrcode) | **GET** /tokens/{id}/qr-code | Returns the QR-code image for the given token only if its physical type is &#x60;qrCode&#x60;
*TokensApi* | [**getUserTokens**](docs/Api/TokensApi.md#getusertokens) | **GET** /{user}/tokens/{type} | Returns the tokens of a type and user
*TokensApi* | [**listUserTokenTypes**](docs/Api/TokensApi.md#listusertokentypes) | **GET** /{user}/token-types | Returns the permissions over token types of the given user.
*TokensApi* | [**searchGeneralTokens**](docs/Api/TokensApi.md#searchgeneraltokens) | **GET** /general-tokens/{type} | Searches for tokens of a specific type, regardless of the user.
*TokensApi* | [**setTokenActivationDeadline**](docs/Api/TokensApi.md#settokenactivationdeadline) | **POST** /tokens/{id}/set-activation-deadline | Sets the activation deadline date of a specific token.
*TokensApi* | [**setTokenExpiryDate**](docs/Api/TokensApi.md#settokenexpirydate) | **POST** /tokens/{id}/set-expiry-date | Sets the expiry date of a specific token.
*TokensApi* | [**unblockToken**](docs/Api/TokensApi.md#unblocktoken) | **POST** /tokens/{id}/unblock | Unlocks a token.
*TokensApi* | [**viewToken**](docs/Api/TokensApi.md#viewtoken) | **GET** /tokens/{id} | Returns details of a specific token
*TransactionsApi* | [**exportTransaction**](docs/Api/TransactionsApi.md#exporttransaction) | **GET** /transactions/{key}/export/{format} | Exports the transaction details to a file.
*TransactionsApi* | [**exportTransactions**](docs/Api/TransactionsApi.md#exporttransactions) | **GET** /{owner}/transactions/export/{format} | Exports the owner transactions search results as file
*TransactionsApi* | [**exportTransactionsOverview**](docs/Api/TransactionsApi.md#exporttransactionsoverview) | **GET** /transactions/export/{format} | Exports the transactions overview search results as file
*TransactionsApi* | [**getTransactionsDataForSearch**](docs/Api/TransactionsApi.md#gettransactionsdataforsearch) | **GET** /{owner}/transactions/data-for-search | Returns data for searching transactions of an account owner
*TransactionsApi* | [**getTransactionsOverviewDataForSearch**](docs/Api/TransactionsApi.md#gettransactionsoverviewdataforsearch) | **GET** /transactions/data-for-search | Returns data for searching transactions regardless of a owner
*TransactionsApi* | [**searchTransactions**](docs/Api/TransactionsApi.md#searchtransactions) | **GET** /{owner}/transactions | Searches transactions of an account owner
*TransactionsApi* | [**searchTransactionsOverview**](docs/Api/TransactionsApi.md#searchtransactionsoverview) | **GET** /transactions | Searches transactions regardless of a owner
*TransactionsApi* | [**viewTransaction**](docs/Api/TransactionsApi.md#viewtransaction) | **GET** /transactions/{key} | Returns details about a transaction
*TransfersApi* | [**chargebackTransfer**](docs/Api/TransfersApi.md#chargebacktransfer) | **POST** /transfers/{key}/chargeback | Perform the chargeback of a transfer
*TransfersApi* | [**exportTransfer**](docs/Api/TransfersApi.md#exporttransfer) | **GET** /transfers/{key}/export/{format} | Exports the transfer details to a file.
*TransfersApi* | [**exportTransfers**](docs/Api/TransfersApi.md#exporttransfers) | **GET** /transfers/export/{format} | Exports the transfers search results as file
*TransfersApi* | [**getTransferDataForSearch**](docs/Api/TransfersApi.md#gettransferdataforsearch) | **GET** /transfers/data-for-search | Returns configuration data for searching transfers over multiple accounts.
*TransfersApi* | [**searchTransfers**](docs/Api/TransfersApi.md#searchtransfers) | **GET** /transfers | Searches for transfers over multiple accounts.
*TransfersApi* | [**searchTransfersSummary**](docs/Api/TransfersApi.md#searchtransferssummary) | **GET** /transfers/summary | Returns totals per currency for the transfers search.
*TransfersApi* | [**viewTransfer**](docs/Api/TransfersApi.md#viewtransfer) | **GET** /transfers/{key} | Returns details about a transfer
*UIApi* | [**dataForUi**](docs/Api/UIApi.md#dataforui) | **GET** /ui/data-for-ui | Returns useful data required to properly display a user interface
*UserStatusApi* | [**changeUserStatus**](docs/Api/UserStatusApi.md#changeuserstatus) | **POST** /{user}/status | Sets the new user status
*UserStatusApi* | [**getUserStatus**](docs/Api/UserStatusApi.md#getuserstatus) | **GET** /{user}/status | Returns the current user status and the status history
*UsersApi* | [**createUser**](docs/Api/UsersApi.md#createuser) | **POST** /users | Registers a new user
*UsersApi* | [**deletePendingUser**](docs/Api/UsersApi.md#deletependinguser) | **DELETE** /users/{user} | Permanently removes a pending user
*UsersApi* | [**exportUsers**](docs/Api/UsersApi.md#exportusers) | **GET** /users/export/{format} | Exports the user search results to a file
*UsersApi* | [**getDataForEditFullProfile**](docs/Api/UsersApi.md#getdataforeditfullprofile) | **GET** /users/{user}/data-for-edit-profile | Returns data for editing the full profile of a user / operator
*UsersApi* | [**getDataForMapDirectory**](docs/Api/UsersApi.md#getdataformapdirectory) | **GET** /users/map/data-for-search | Get configuration data for searching the user directory (map).
*UsersApi* | [**getGroupsForUserRegistration**](docs/Api/UsersApi.md#getgroupsforuserregistration) | **GET** /users/groups-for-registration | Returns the groups the authenticated user or guest can register on
*UsersApi* | [**getUserDataForEdit**](docs/Api/UsersApi.md#getuserdataforedit) | **GET** /users/{user}/data-for-edit | Get configuration data to edit a user / operator profile
*UsersApi* | [**getUserDataForNew**](docs/Api/UsersApi.md#getuserdatafornew) | **GET** /users/data-for-new | Get configuration data for registering new users
*UsersApi* | [**getUserDataForSearch**](docs/Api/UsersApi.md#getuserdataforsearch) | **GET** /users/data-for-search | Get configuration data for searching users
*UsersApi* | [**locateUser**](docs/Api/UsersApi.md#locateuser) | **GET** /users/{user}/locate | View user basic details
*UsersApi* | [**saveUserFullProfile**](docs/Api/UsersApi.md#saveuserfullprofile) | **POST** /users/{user}/profile | Saves the full profile at once
*UsersApi* | [**searchMapDirectory**](docs/Api/UsersApi.md#searchmapdirectory) | **GET** /users/map | Search the user directory (map)
*UsersApi* | [**searchUsers**](docs/Api/UsersApi.md#searchusers) | **GET** /users | Search for users
*UsersApi* | [**updateUser**](docs/Api/UsersApi.md#updateuser) | **PUT** /users/{user} | Save a user / operator profile fields
*UsersApi* | [**validateUserRegistrationField**](docs/Api/UsersApi.md#validateuserregistrationfield) | **GET** /users/validate/{group}/{field} | Validates the value of a single field for user registration
*UsersApi* | [**viewUser**](docs/Api/UsersApi.md#viewuser) | **GET** /users/{user} | View a user / operator details
*ValidationApi* | [**manuallyValidateEmailChange**](docs/Api/ValidationApi.md#manuallyvalidateemailchange) | **POST** /{user}/email-change/validate | Manually validates a pending e-mail change.
*ValidationApi* | [**manuallyValidateUserRegistration**](docs/Api/ValidationApi.md#manuallyvalidateuserregistration) | **POST** /{user}/registration/validate | Manually validates a pending user / operator registration.
*ValidationApi* | [**resendEmailChangeEmail**](docs/Api/ValidationApi.md#resendemailchangeemail) | **POST** /{user}/email-change/resend | Re-sends the e-mail to validate a pending e-mail change.
*ValidationApi* | [**resendUserRegistrationEmail**](docs/Api/ValidationApi.md#resenduserregistrationemail) | **POST** /{user}/registration/resend | Re-sends the e-mail to validate a pending user / operator registration.
*ValidationApi* | [**validateEmailChange**](docs/Api/ValidationApi.md#validateemailchange) | **POST** /validate/email-change/{key} | Validate a pending e-mail change.
*ValidationApi* | [**validateUserRegistration**](docs/Api/ValidationApi.md#validateuserregistration) | **POST** /validate/registration/{key} | Validate a pending user registration.
*VoucherInfoApi* | [**activateGiftVoucher**](docs/Api/VoucherInfoApi.md#activategiftvoucher) | **POST** /voucher-info/{token}/activate-gift | Activates a gift voucher with a PIN.
*VoucherInfoApi* | [**changeVoucherInfoNotificationSettings**](docs/Api/VoucherInfoApi.md#changevoucherinfonotificationsettings) | **POST** /voucher-info/{token}/notification-settings | Changes the voucher notifications configuration.
*VoucherInfoApi* | [**changeVoucherInfoPin**](docs/Api/VoucherInfoApi.md#changevoucherinfopin) | **POST** /voucher-info/{token}/change-pin | Changes the pin of a particular voucher.
*VoucherInfoApi* | [**getVoucherInfo**](docs/Api/VoucherInfoApi.md#getvoucherinfo) | **GET** /voucher-info/{token} | Returns data for the voucher information page
*VoucherInfoApi* | [**getVoucherInfoData**](docs/Api/VoucherInfoApi.md#getvoucherinfodata) | **GET** /voucher-info | Returns data for the voucher information page
*VoucherInfoApi* | [**resendVoucherInfoPin**](docs/Api/VoucherInfoApi.md#resendvoucherinfopin) | **POST** /voucher-info/{token}/resend-pin | Re-sends the voucher pin to its e-mail/mobile phone.
*VoucherInfoApi* | [**searchVoucherInfoTransactions**](docs/Api/VoucherInfoApi.md#searchvoucherinfotransactions) | **GET** /voucher-info/{token}/transactions | Searches for transactions of a particular voucher in the information page
*VoucherInfoApi* | [**unblockVoucherInfo**](docs/Api/VoucherInfoApi.md#unblockvoucherinfo) | **POST** /voucher-info/{token}/unblock | Unblock a voucher.
*VouchersApi* | [**assignVoucher**](docs/Api/VouchersApi.md#assignvoucher) | **POST** /vouchers/{key}/assign | Assigns a generated and open voucher to a user.
*VouchersApi* | [**buyVouchers**](docs/Api/VouchersApi.md#buyvouchers) | **POST** /{user}/vouchers/buy | Buys one or more vouchers for the given user
*VouchersApi* | [**buyVouchersWithStatus**](docs/Api/VouchersApi.md#buyvoucherswithstatus) | **POST** /{user}/vouchers/buy-with-status | Buys one or more vouchers for the given user returning the status.
*VouchersApi* | [**cancelVoucher**](docs/Api/VouchersApi.md#cancelvoucher) | **POST** /vouchers/{key}/cancel | Cancels the voucher
*VouchersApi* | [**changeVoucherExpirationDate**](docs/Api/VouchersApi.md#changevoucherexpirationdate) | **POST** /vouchers/{key}/change-expiration | Changes the voucher expiration.
*VouchersApi* | [**changeVoucherNotificationSettings**](docs/Api/VouchersApi.md#changevouchernotificationsettings) | **POST** /vouchers/{key}/change-notification-settings | Changes a voucher&#39;s notification settings.
*VouchersApi* | [**changeVoucherPin**](docs/Api/VouchersApi.md#changevoucherpin) | **POST** /vouchers/{key}/change-pin | Changes the pin of a particular voucher.
*VouchersApi* | [**exportUserVouchers**](docs/Api/VouchersApi.md#exportuservouchers) | **GET** /{user}/vouchers/export/{format} | Exports the vouchers search results as file.
*VouchersApi* | [**exportVoucher**](docs/Api/VouchersApi.md#exportvoucher) | **GET** /vouchers/{key}/export/{format} | Exports a voucher details as file.
*VouchersApi* | [**exportVoucherTransaction**](docs/Api/VouchersApi.md#exportvouchertransaction) | **GET** /voucher-transactions/{id}/export/{format} | Exports the given voucher transaction as file.
*VouchersApi* | [**exportVouchers**](docs/Api/VouchersApi.md#exportvouchers) | **GET** /vouchers/export/{format} | Exports the vouchers search results as file.
*VouchersApi* | [**generateVouchers**](docs/Api/VouchersApi.md#generatevouchers) | **POST** /vouchers/generate | Generate one or more vouchers.
*VouchersApi* | [**getGeneralVouchersDataForSearch**](docs/Api/VouchersApi.md#getgeneralvouchersdataforsearch) | **GET** /vouchers/data-for-search | Returns data for searching vouchers as admin
*VouchersApi* | [**getUserVoucherTransactionsDataForSearch**](docs/Api/VouchersApi.md#getuservouchertransactionsdataforsearch) | **GET** /{user}/voucher-transactions/data-for-search | Returns configuration data for searching for voucher transactions
*VouchersApi* | [**getUserVouchersDataForSearch**](docs/Api/VouchersApi.md#getuservouchersdataforsearch) | **GET** /{user}/vouchers/data-for-search | Returns data for searching vouchers owned by a user
*VouchersApi* | [**getVoucherDataForBuy**](docs/Api/VouchersApi.md#getvoucherdataforbuy) | **GET** /{user}/vouchers/data-for-buy | Returns data for buying a voucher of a specified type or the list of types to buy.
*VouchersApi* | [**getVoucherDataForGenerate**](docs/Api/VouchersApi.md#getvoucherdataforgenerate) | **GET** /vouchers/data-for-generate | Returns data for generate vouchers of a specified type or the list of types to generate.
*VouchersApi* | [**getVoucherDataForRedeem**](docs/Api/VouchersApi.md#getvoucherdataforredeem) | **GET** /{user}/vouchers/{token}/data-for-redeem | Returns data for redeeming a voucher by token
*VouchersApi* | [**getVoucherDataForSend**](docs/Api/VouchersApi.md#getvoucherdataforsend) | **GET** /{user}/vouchers/data-for-send | Returns data for sending a voucher by e-mail of a specified type or the list of types to send.
*VouchersApi* | [**getVoucherDataForTopUp**](docs/Api/VouchersApi.md#getvoucherdatafortopup) | **GET** /{user}/vouchers/{token}/data-for-top-up | Returns data for topping-up a voucher by token
*VouchersApi* | [**getVoucherInitialDataForRedeem**](docs/Api/VouchersApi.md#getvoucherinitialdataforredeem) | **GET** /{user}/vouchers/data-for-redeem | Returns initial data for redeeming vouchers
*VouchersApi* | [**getVoucherInitialDataForTopUp**](docs/Api/VouchersApi.md#getvoucherinitialdatafortopup) | **GET** /{user}/vouchers/data-for-top-up | Returns initial data for topping-up vouchers
*VouchersApi* | [**getVoucherQrCode**](docs/Api/VouchersApi.md#getvoucherqrcode) | **GET** /vouchers/{key}/qr-code | Returns the QR-code image for the given voucher
*VouchersApi* | [**previewBuyVouchers**](docs/Api/VouchersApi.md#previewbuyvouchers) | **POST** /{user}/vouchers/preview-buy | Previews the buying of one or more vouchers for the given user.
*VouchersApi* | [**previewSendVoucher**](docs/Api/VouchersApi.md#previewsendvoucher) | **POST** /{user}/vouchers/preview-send | Previews buingy a voucher and sending it to an e-mail address.
*VouchersApi* | [**previewVoucherRedeem**](docs/Api/VouchersApi.md#previewvoucherredeem) | **POST** /{user}/vouchers/{token}/preview-redeem | Previews a voucher top-up for the given user.
*VouchersApi* | [**previewVoucherTopUp**](docs/Api/VouchersApi.md#previewvouchertopup) | **POST** /{user}/vouchers/{token}/preview-top-up | Previews a voucher top-up for the given user.
*VouchersApi* | [**redeemVoucher**](docs/Api/VouchersApi.md#redeemvoucher) | **POST** /{user}/vouchers/{token}/redeem | Redeems a voucher for the given user
*VouchersApi* | [**resendPin**](docs/Api/VouchersApi.md#resendpin) | **POST** /vouchers/{key}/resend-pin | Re-sends a the voucher PIN to the client
*VouchersApi* | [**resendVoucherEmail**](docs/Api/VouchersApi.md#resendvoucheremail) | **POST** /vouchers/{key}/resend-email | Re-sends a sent voucher to its destination e-mail address.
*VouchersApi* | [**searchUserVoucherTransactions**](docs/Api/VouchersApi.md#searchuservouchertransactions) | **GET** /{user}/voucher-transactions | Searches for vouchers transactions a user has performed.
*VouchersApi* | [**searchUserVouchers**](docs/Api/VouchersApi.md#searchuservouchers) | **GET** /{user}/vouchers | Searches for vouchers a user owns or has bought.
*VouchersApi* | [**searchVoucherTransactions**](docs/Api/VouchersApi.md#searchvouchertransactions) | **GET** /vouchers/{key}/transactions | Searches for transactions of a particular voucher.
*VouchersApi* | [**searchVouchers**](docs/Api/VouchersApi.md#searchvouchers) | **GET** /vouchers | Searches for vouchers as admin
*VouchersApi* | [**sendVoucher**](docs/Api/VouchersApi.md#sendvoucher) | **POST** /{user}/vouchers/send | Buy a voucher and send it to an e-mail address
*VouchersApi* | [**topUpVoucher**](docs/Api/VouchersApi.md#topupvoucher) | **POST** /{user}/vouchers/{token}/top-up | Tops-up a voucher for the given user.
*VouchersApi* | [**unblockVoucherPin**](docs/Api/VouchersApi.md#unblockvoucherpin) | **POST** /vouchers/{key}/unblock-pin | Unblocks the voucher PIN
*VouchersApi* | [**viewVoucher**](docs/Api/VouchersApi.md#viewvoucher) | **GET** /vouchers/{key} | Returns data for a particular voucher
*VouchersApi* | [**viewVoucherTransaction**](docs/Api/VouchersApi.md#viewvouchertransaction) | **GET** /voucher-transactions/{id} | Returns details about a voucher transaction
*WebshopSettingsApi* | [**updateWebshopSettings**](docs/Api/WebshopSettingsApi.md#updatewebshopsettings) | **PUT** /{user}/webshop-settings | Updates a user&#39;s webshop settings.
*WebshopSettingsApi* | [**viewWebshopSettings**](docs/Api/WebshopSettingsApi.md#viewwebshopsettings) | **GET** /{user}/webshop-settings | Returns the webshop settings for a given user.
*WizardsApi* | [**backWizardExecution**](docs/Api/WizardsApi.md#backwizardexecution) | **POST** /wizard-executions/{key}/back | Goes back one or more steps in a wizard execution.
*WizardsApi* | [**cancelWizardExecution**](docs/Api/WizardsApi.md#cancelwizardexecution) | **DELETE** /wizard-executions/{key} | Cancels a wizard execution, removing all associated context.
*WizardsApi* | [**getCurrentWizardExecution**](docs/Api/WizardsApi.md#getcurrentwizardexecution) | **GET** /wizard-executions/{key} | Returns the wizard execution data for the current step.
*WizardsApi* | [**redirectWizardExecution**](docs/Api/WizardsApi.md#redirectwizardexecution) | **POST** /wizard-executions/{key}/redirect | Prepares an external redirect in a wizard execution.
*WizardsApi* | [**runWizardCallback**](docs/Api/WizardsApi.md#runwizardcallback) | **POST** /wizard-executions/{key}/callback | Runs the callback of an external redirect wizard step.
*WizardsApi* | [**sendWizardVerificationCode**](docs/Api/WizardsApi.md#sendwizardverificationcode) | **POST** /wizard-executions/{key}/verification-code | Sends a code to verify either e-mail or mobile phone.
*WizardsApi* | [**startMenuWizard**](docs/Api/WizardsApi.md#startmenuwizard) | **POST** /menu/{menu}/wizards/start | Starts the execution of a custom wizard from a custom menu entry.
*WizardsApi* | [**startUserWizard**](docs/Api/WizardsApi.md#startuserwizard) | **POST** /users/{user}/wizards/{key}/start | Starts the execution of a custom wizard over a given user.
*WizardsApi* | [**startWizard**](docs/Api/WizardsApi.md#startwizard) | **POST** /wizards/{key}/start | Starts the execution of a custom wizard without a scope.
*WizardsApi* | [**transitionWizardExecution**](docs/Api/WizardsApi.md#transitionwizardexecution) | **POST** /wizard-executions/{key} | Transitions a wizard from a step to another, or finishes the wizard

## Models

- [AcceptOrReschedulePaymentRequest](docs/Model/AcceptOrReschedulePaymentRequest.md)
- [AcceptOrderByBuyer](docs/Model/AcceptOrderByBuyer.md)
- [AcceptOrderBySeller](docs/Model/AcceptOrderBySeller.md)
- [AcceptedAgreement](docs/Model/AcceptedAgreement.md)
- [Account](docs/Model/Account.md)
- [AccountActivityStatus](docs/Model/AccountActivityStatus.md)
- [AccountAllOfType](docs/Model/AccountAllOfType.md)
- [AccountBalanceEntry](docs/Model/AccountBalanceEntry.md)
- [AccountBalanceHistoryResult](docs/Model/AccountBalanceHistoryResult.md)
- [AccountBalanceHistoryResultAllOfInterval](docs/Model/AccountBalanceHistoryResultAllOfInterval.md)
- [AccountBalanceLimitsData](docs/Model/AccountBalanceLimitsData.md)
- [AccountBalanceLimitsDataAllOfConfirmationPasswordInput](docs/Model/AccountBalanceLimitsDataAllOfConfirmationPasswordInput.md)
- [AccountBalanceLimitsLog](docs/Model/AccountBalanceLimitsLog.md)
- [AccountBalanceLimitsQueryFilters](docs/Model/AccountBalanceLimitsQueryFilters.md)
- [AccountBalanceLimitsResult](docs/Model/AccountBalanceLimitsResult.md)
- [AccountHistoryQueryFilters](docs/Model/AccountHistoryQueryFilters.md)
- [AccountHistoryResult](docs/Model/AccountHistoryResult.md)
- [AccountHistoryResultAllOfRelatedAccount](docs/Model/AccountHistoryResultAllOfRelatedAccount.md)
- [AccountHistoryResultAllOfTransaction](docs/Model/AccountHistoryResultAllOfTransaction.md)
- [AccountHistoryStatus](docs/Model/AccountHistoryStatus.md)
- [AccountHistoryStatusAllOfIncoming](docs/Model/AccountHistoryStatusAllOfIncoming.md)
- [AccountHistoryStatusAllOfOutgoing](docs/Model/AccountHistoryStatusAllOfOutgoing.md)
- [AccountKind](docs/Model/AccountKind.md)
- [AccountNotificationSettings](docs/Model/AccountNotificationSettings.md)
- [AccountNotificationSettingsView](docs/Model/AccountNotificationSettingsView.md)
- [AccountPaymentLimitsData](docs/Model/AccountPaymentLimitsData.md)
- [AccountPaymentLimitsDataAllOfConfirmationPasswordInput](docs/Model/AccountPaymentLimitsDataAllOfConfirmationPasswordInput.md)
- [AccountPaymentLimitsLog](docs/Model/AccountPaymentLimitsLog.md)
- [AccountPaymentLimitsQueryFilters](docs/Model/AccountPaymentLimitsQueryFilters.md)
- [AccountPaymentLimitsResult](docs/Model/AccountPaymentLimitsResult.md)
- [AccountPermissions](docs/Model/AccountPermissions.md)
- [AccountStatus](docs/Model/AccountStatus.md)
- [AccountType](docs/Model/AccountType.md)
- [AccountTypeWithDefaultMediumBalanceRange](docs/Model/AccountTypeWithDefaultMediumBalanceRange.md)
- [AccountTypeWithDefaultMediumBalanceRangeAllOfDefaultMediumBalanceRange](docs/Model/AccountTypeWithDefaultMediumBalanceRangeAllOfDefaultMediumBalanceRange.md)
- [AccountWithCurrency](docs/Model/AccountWithCurrency.md)
- [AccountWithHistoryStatus](docs/Model/AccountWithHistoryStatus.md)
- [AccountWithOwner](docs/Model/AccountWithOwner.md)
- [AccountWithOwnerAllOfUser](docs/Model/AccountWithOwnerAllOfUser.md)
- [AccountWithOwnerAndCurrency](docs/Model/AccountWithOwnerAndCurrency.md)
- [AccountWithStatus](docs/Model/AccountWithStatus.md)
- [ActivateClientResult](docs/Model/ActivateClientResult.md)
- [ActivateGiftVoucher](docs/Model/ActivateGiftVoucher.md)
- [ActivationRequest](docs/Model/ActivationRequest.md)
- [Ad](docs/Model/Ad.md)
- [AdAddressResultEnum](docs/Model/AdAddressResultEnum.md)
- [AdAllOfImage](docs/Model/AdAllOfImage.md)
- [AdBasicData](docs/Model/AdBasicData.md)
- [AdCategoriesDisplayEnum](docs/Model/AdCategoriesDisplayEnum.md)
- [AdCategoryWithChildren](docs/Model/AdCategoryWithChildren.md)
- [AdCategoryWithParent](docs/Model/AdCategoryWithParent.md)
- [AdDataForEdit](docs/Model/AdDataForEdit.md)
- [AdDataForEditAllOfAdvertisement](docs/Model/AdDataForEditAllOfAdvertisement.md)
- [AdDataForEditAllOfBinaryValues](docs/Model/AdDataForEditAllOfBinaryValues.md)
- [AdDataForNew](docs/Model/AdDataForNew.md)
- [AdDataForNewAllOfAdvertisement](docs/Model/AdDataForNewAllOfAdvertisement.md)
- [AdDataForSearch](docs/Model/AdDataForSearch.md)
- [AdDataForSearchAllOfAdInitialSearchType](docs/Model/AdDataForSearchAllOfAdInitialSearchType.md)
- [AdDataForSearchAllOfQuery](docs/Model/AdDataForSearchAllOfQuery.md)
- [AdDataForSearchAllOfResultType](docs/Model/AdDataForSearchAllOfResultType.md)
- [AdDetailed](docs/Model/AdDetailed.md)
- [AdDetailedAllOfUser](docs/Model/AdDetailedAllOfUser.md)
- [AdEdit](docs/Model/AdEdit.md)
- [AdInitialSearchTypeEnum](docs/Model/AdInitialSearchTypeEnum.md)
- [AdInterest](docs/Model/AdInterest.md)
- [AdInterestAllOfAdUser](docs/Model/AdInterestAllOfAdUser.md)
- [AdInterestAllOfCategory](docs/Model/AdInterestAllOfCategory.md)
- [AdInterestBasicData](docs/Model/AdInterestBasicData.md)
- [AdInterestDataForEdit](docs/Model/AdInterestDataForEdit.md)
- [AdInterestDataForEditAllOfAdInterest](docs/Model/AdInterestDataForEditAllOfAdInterest.md)
- [AdInterestDataForNew](docs/Model/AdInterestDataForNew.md)
- [AdInterestDataForNewAllOfAdInterest](docs/Model/AdInterestDataForNewAllOfAdInterest.md)
- [AdInterestEdit](docs/Model/AdInterestEdit.md)
- [AdInterestManage](docs/Model/AdInterestManage.md)
- [AdInterestNew](docs/Model/AdInterestNew.md)
- [AdInterestView](docs/Model/AdInterestView.md)
- [AdInterestViewAllOfCurrency](docs/Model/AdInterestViewAllOfCurrency.md)
- [AdInterestViewAllOfKind](docs/Model/AdInterestViewAllOfKind.md)
- [AdInterestViewAllOfUser](docs/Model/AdInterestViewAllOfUser.md)
- [AdKind](docs/Model/AdKind.md)
- [AdManage](docs/Model/AdManage.md)
- [AdNew](docs/Model/AdNew.md)
- [AdNewAllOfKind](docs/Model/AdNewAllOfKind.md)
- [AdOrderByEnum](docs/Model/AdOrderByEnum.md)
- [AdQueryFilters](docs/Model/AdQueryFilters.md)
- [AdQuestion](docs/Model/AdQuestion.md)
- [AdQuestionAllOfUser](docs/Model/AdQuestionAllOfUser.md)
- [AdQuestionQueryFilters](docs/Model/AdQuestionQueryFilters.md)
- [AdQuestionQueryFiltersAllOfKind](docs/Model/AdQuestionQueryFiltersAllOfKind.md)
- [AdQuestionResult](docs/Model/AdQuestionResult.md)
- [AdQuestionResultAllOfAdvertisement](docs/Model/AdQuestionResultAllOfAdvertisement.md)
- [AdQuestionView](docs/Model/AdQuestionView.md)
- [AdResult](docs/Model/AdResult.md)
- [AdResultAllOfAddress](docs/Model/AdResultAllOfAddress.md)
- [AdStatusEnum](docs/Model/AdStatusEnum.md)
- [AdView](docs/Model/AdView.md)
- [AdViewAllOfPromotionalPeriod](docs/Model/AdViewAllOfPromotionalPeriod.md)
- [AdWithUser](docs/Model/AdWithUser.md)
- [AdWithUserAllOfUser](docs/Model/AdWithUserAllOfUser.md)
- [Address](docs/Model/Address.md)
- [AddressAllOfLocation](docs/Model/AddressAllOfLocation.md)
- [AddressBasicData](docs/Model/AddressBasicData.md)
- [AddressBasicDataAllOfConfirmationPasswordInput](docs/Model/AddressBasicDataAllOfConfirmationPasswordInput.md)
- [AddressBasicDataAllOfPhoneConfiguration](docs/Model/AddressBasicDataAllOfPhoneConfiguration.md)
- [AddressBasicDataAllOfUser](docs/Model/AddressBasicDataAllOfUser.md)
- [AddressConfiguration](docs/Model/AddressConfiguration.md)
- [AddressConfigurationForUserProfile](docs/Model/AddressConfigurationForUserProfile.md)
- [AddressConfigurationForUserProfileAllOfAddress](docs/Model/AddressConfigurationForUserProfileAllOfAddress.md)
- [AddressConfigurationForUserProfileAllOfPhoneConfiguration](docs/Model/AddressConfigurationForUserProfileAllOfPhoneConfiguration.md)
- [AddressContactInfo](docs/Model/AddressContactInfo.md)
- [AddressContactInfoManage](docs/Model/AddressContactInfoManage.md)
- [AddressDataForEdit](docs/Model/AddressDataForEdit.md)
- [AddressDataForEditAllOfAddress](docs/Model/AddressDataForEditAllOfAddress.md)
- [AddressDataForNew](docs/Model/AddressDataForNew.md)
- [AddressDataForNewAllOfAddress](docs/Model/AddressDataForNewAllOfAddress.md)
- [AddressEdit](docs/Model/AddressEdit.md)
- [AddressEditWithId](docs/Model/AddressEditWithId.md)
- [AddressFieldEnum](docs/Model/AddressFieldEnum.md)
- [AddressManage](docs/Model/AddressManage.md)
- [AddressNew](docs/Model/AddressNew.md)
- [AddressQueryFieldEnum](docs/Model/AddressQueryFieldEnum.md)
- [AddressResult](docs/Model/AddressResult.md)
- [AddressResultAllOfContactInfo](docs/Model/AddressResultAllOfContactInfo.md)
- [AddressView](docs/Model/AddressView.md)
- [AddressViewAllOfUser](docs/Model/AddressViewAllOfUser.md)
- [AdminMenuEnum](docs/Model/AdminMenuEnum.md)
- [Agreement](docs/Model/Agreement.md)
- [AgreementContent](docs/Model/AgreementContent.md)
- [AgreementLog](docs/Model/AgreementLog.md)
- [AgreementsPermissions](docs/Model/AgreementsPermissions.md)
- [Alert](docs/Model/Alert.md)
- [AlertsPermissions](docs/Model/AlertsPermissions.md)
- [AmountSummary](docs/Model/AmountSummary.md)
- [AssignVoucher](docs/Model/AssignVoucher.md)
- [Auth](docs/Model/Auth.md)
- [AuthAllOfConfiguration](docs/Model/AuthAllOfConfiguration.md)
- [AuthAllOfPinInput](docs/Model/AuthAllOfPinInput.md)
- [AuthorizationActionEnum](docs/Model/AuthorizationActionEnum.md)
- [AvailabilityEnum](docs/Model/AvailabilityEnum.md)
- [BadRequestError](docs/Model/BadRequestError.md)
- [BadRequestErrorCode](docs/Model/BadRequestErrorCode.md)
- [BalanceLevelEnum](docs/Model/BalanceLevelEnum.md)
- [BankingPermissions](docs/Model/BankingPermissions.md)
- [BaseAccountBalanceLimits](docs/Model/BaseAccountBalanceLimits.md)
- [BaseAccountPaymentLimits](docs/Model/BaseAccountPaymentLimits.md)
- [BaseAdDataForSearch](docs/Model/BaseAdDataForSearch.md)
- [BaseAdDetailed](docs/Model/BaseAdDetailed.md)
- [BaseAuth](docs/Model/BaseAuth.md)
- [BaseCustomFieldValue](docs/Model/BaseCustomFieldValue.md)
- [BaseCustomFieldValueAllOfAdValue](docs/Model/BaseCustomFieldValueAllOfAdValue.md)
- [BaseCustomFieldValueAllOfDynamicValue](docs/Model/BaseCustomFieldValueAllOfDynamicValue.md)
- [BaseCustomFieldValueAllOfRecordValue](docs/Model/BaseCustomFieldValueAllOfRecordValue.md)
- [BaseCustomFieldValueAllOfTransactionValue](docs/Model/BaseCustomFieldValueAllOfTransactionValue.md)
- [BaseCustomFieldValueAllOfTransferValue](docs/Model/BaseCustomFieldValueAllOfTransferValue.md)
- [BaseCustomFieldValueAllOfUserValue](docs/Model/BaseCustomFieldValueAllOfUserValue.md)
- [BaseInstallmentDataForSearch](docs/Model/BaseInstallmentDataForSearch.md)
- [BaseInstallmentQueryFilters](docs/Model/BaseInstallmentQueryFilters.md)
- [BaseInstallmentResult](docs/Model/BaseInstallmentResult.md)
- [BaseInstallmentResultAllOfStatus](docs/Model/BaseInstallmentResultAllOfStatus.md)
- [BaseNfcError](docs/Model/BaseNfcError.md)
- [BaseNotificationSettings](docs/Model/BaseNotificationSettings.md)
- [BaseOrder](docs/Model/BaseOrder.md)
- [BaseOrderAction](docs/Model/BaseOrderAction.md)
- [BaseOrderItem](docs/Model/BaseOrderItem.md)
- [BaseRecordDataForSearch](docs/Model/BaseRecordDataForSearch.md)
- [BaseReferenceDataForSearch](docs/Model/BaseReferenceDataForSearch.md)
- [BaseReferenceQueryFilters](docs/Model/BaseReferenceQueryFilters.md)
- [BaseSendMessage](docs/Model/BaseSendMessage.md)
- [BaseShoppingCart](docs/Model/BaseShoppingCart.md)
- [BaseTransDataForSearch](docs/Model/BaseTransDataForSearch.md)
- [BaseTransQueryFilters](docs/Model/BaseTransQueryFilters.md)
- [BaseTransactionDataForSearch](docs/Model/BaseTransactionDataForSearch.md)
- [BaseTransactionOrInstallmentQueryFilters](docs/Model/BaseTransactionOrInstallmentQueryFilters.md)
- [BaseTransactionQueryFilters](docs/Model/BaseTransactionQueryFilters.md)
- [BaseTransactionResult](docs/Model/BaseTransactionResult.md)
- [BaseTransactionResultAllOfAuthorizationStatus](docs/Model/BaseTransactionResultAllOfAuthorizationStatus.md)
- [BaseTransactionResultAllOfCreationType](docs/Model/BaseTransactionResultAllOfCreationType.md)
- [BaseTransactionResultAllOfExternalPaymentStatus](docs/Model/BaseTransactionResultAllOfExternalPaymentStatus.md)
- [BaseTransactionResultAllOfFirstInstallment](docs/Model/BaseTransactionResultAllOfFirstInstallment.md)
- [BaseTransactionResultAllOfFirstOpenInstallment](docs/Model/BaseTransactionResultAllOfFirstOpenInstallment.md)
- [BaseTransactionResultAllOfKind](docs/Model/BaseTransactionResultAllOfKind.md)
- [BaseTransactionResultAllOfPaymentRequestStatus](docs/Model/BaseTransactionResultAllOfPaymentRequestStatus.md)
- [BaseTransactionResultAllOfRecurringPaymentStatus](docs/Model/BaseTransactionResultAllOfRecurringPaymentStatus.md)
- [BaseTransactionResultAllOfScheduledPaymentStatus](docs/Model/BaseTransactionResultAllOfScheduledPaymentStatus.md)
- [BaseTransactionResultAllOfTicketStatus](docs/Model/BaseTransactionResultAllOfTicketStatus.md)
- [BaseTransactionResultAllOfToPrincipalType](docs/Model/BaseTransactionResultAllOfToPrincipalType.md)
- [BaseTransferDataForSearch](docs/Model/BaseTransferDataForSearch.md)
- [BaseTransferQueryFilters](docs/Model/BaseTransferQueryFilters.md)
- [BaseUserDataForSearch](docs/Model/BaseUserDataForSearch.md)
- [BaseVoucherBuyingPreview](docs/Model/BaseVoucherBuyingPreview.md)
- [BaseVouchersDataForSearch](docs/Model/BaseVouchersDataForSearch.md)
- [BaseVouchersQueryFilters](docs/Model/BaseVouchersQueryFilters.md)
- [BasicAdQueryFilters](docs/Model/BasicAdQueryFilters.md)
- [BasicFullProfileEditResult](docs/Model/BasicFullProfileEditResult.md)
- [BasicOperatorQueryFilters](docs/Model/BasicOperatorQueryFilters.md)
- [BasicProfileFieldEnum](docs/Model/BasicProfileFieldEnum.md)
- [BasicProfileFieldInput](docs/Model/BasicProfileFieldInput.md)
- [BasicUserDataForNew](docs/Model/BasicUserDataForNew.md)
- [BasicUserManage](docs/Model/BasicUserManage.md)
- [BasicUserQueryFilters](docs/Model/BasicUserQueryFilters.md)
- [BrokerDataForAdd](docs/Model/BrokerDataForAdd.md)
- [BrokerView](docs/Model/BrokerView.md)
- [Brokering](docs/Model/Brokering.md)
- [BrokeringActionEnum](docs/Model/BrokeringActionEnum.md)
- [BrokeringLog](docs/Model/BrokeringLog.md)
- [BrokeringView](docs/Model/BrokeringView.md)
- [BrokeringViewAllOfUser](docs/Model/BrokeringViewAllOfUser.md)
- [BuyVoucher](docs/Model/BuyVoucher.md)
- [BuyVoucherError](docs/Model/BuyVoucherError.md)
- [BuyVoucherErrorAllOfCurrency](docs/Model/BuyVoucherErrorAllOfCurrency.md)
- [BuyVoucherErrorAllOfPaymentError](docs/Model/BuyVoucherErrorAllOfPaymentError.md)
- [BuyVoucherErrorCode](docs/Model/BuyVoucherErrorCode.md)
- [CaptchaInput](docs/Model/CaptchaInput.md)
- [CaptchaProviderEnum](docs/Model/CaptchaProviderEnum.md)
- [CaptchaResponse](docs/Model/CaptchaResponse.md)
- [ChangeForgottenPassword](docs/Model/ChangeForgottenPassword.md)
- [ChangeGroupMembershipParams](docs/Model/ChangeGroupMembershipParams.md)
- [ChangePassword](docs/Model/ChangePassword.md)
- [ChangePaymentRequestExpirationDate](docs/Model/ChangePaymentRequestExpirationDate.md)
- [ChangeUserStatusParams](docs/Model/ChangeUserStatusParams.md)
- [ChangeVoucherExpirationDate](docs/Model/ChangeVoucherExpirationDate.md)
- [ChangeVoucherNotificationSettings](docs/Model/ChangeVoucherNotificationSettings.md)
- [ChangeVoucherPin](docs/Model/ChangeVoucherPin.md)
- [ClientActionEnum](docs/Model/ClientActionEnum.md)
- [ClientStatusEnum](docs/Model/ClientStatusEnum.md)
- [ClientView](docs/Model/ClientView.md)
- [ClientViewAllOfConfirmationPasswordInput](docs/Model/ClientViewAllOfConfirmationPasswordInput.md)
- [ClientViewAllOfUser](docs/Model/ClientViewAllOfUser.md)
- [CodeVerificationStatusEnum](docs/Model/CodeVerificationStatusEnum.md)
- [ConflictError](docs/Model/ConflictError.md)
- [ConflictErrorCode](docs/Model/ConflictErrorCode.md)
- [Contact](docs/Model/Contact.md)
- [ContactAllOfContact](docs/Model/ContactAllOfContact.md)
- [ContactBasicData](docs/Model/ContactBasicData.md)
- [ContactDataForEdit](docs/Model/ContactDataForEdit.md)
- [ContactDataForEditAllOfBinaryValues](docs/Model/ContactDataForEditAllOfBinaryValues.md)
- [ContactDataForEditAllOfContact](docs/Model/ContactDataForEditAllOfContact.md)
- [ContactDataForNew](docs/Model/ContactDataForNew.md)
- [ContactDataForNewAllOfContact](docs/Model/ContactDataForNewAllOfContact.md)
- [ContactEdit](docs/Model/ContactEdit.md)
- [ContactInfo](docs/Model/ContactInfo.md)
- [ContactInfoBasicData](docs/Model/ContactInfoBasicData.md)
- [ContactInfoBinaryValuesForUserProfile](docs/Model/ContactInfoBinaryValuesForUserProfile.md)
- [ContactInfoConfigurationForUserProfile](docs/Model/ContactInfoConfigurationForUserProfile.md)
- [ContactInfoDataForEdit](docs/Model/ContactInfoDataForEdit.md)
- [ContactInfoDataForEditAllOfBinaryValues](docs/Model/ContactInfoDataForEditAllOfBinaryValues.md)
- [ContactInfoDataForEditAllOfContactInfo](docs/Model/ContactInfoDataForEditAllOfContactInfo.md)
- [ContactInfoDataForNew](docs/Model/ContactInfoDataForNew.md)
- [ContactInfoDataForNewAllOfContactInfo](docs/Model/ContactInfoDataForNewAllOfContactInfo.md)
- [ContactInfoDetailed](docs/Model/ContactInfoDetailed.md)
- [ContactInfoEdit](docs/Model/ContactInfoEdit.md)
- [ContactInfoEditWithId](docs/Model/ContactInfoEditWithId.md)
- [ContactInfoManage](docs/Model/ContactInfoManage.md)
- [ContactInfoNew](docs/Model/ContactInfoNew.md)
- [ContactInfoResult](docs/Model/ContactInfoResult.md)
- [ContactInfoView](docs/Model/ContactInfoView.md)
- [ContactInfoViewAllOfUser](docs/Model/ContactInfoViewAllOfUser.md)
- [ContactInfoWithFields](docs/Model/ContactInfoWithFields.md)
- [ContactListDataForSearch](docs/Model/ContactListDataForSearch.md)
- [ContactListQueryFilters](docs/Model/ContactListQueryFilters.md)
- [ContactManage](docs/Model/ContactManage.md)
- [ContactNew](docs/Model/ContactNew.md)
- [ContactOrderByEnum](docs/Model/ContactOrderByEnum.md)
- [ContactResult](docs/Model/ContactResult.md)
- [ContactView](docs/Model/ContactView.md)
- [ContactViewAllOfUser](docs/Model/ContactViewAllOfUser.md)
- [ContactsPermissions](docs/Model/ContactsPermissions.md)
- [ContactsQueryFilters](docs/Model/ContactsQueryFilters.md)
- [Country](docs/Model/Country.md)
- [CreateClientParams](docs/Model/CreateClientParams.md)
- [CreateDeviceConfirmation](docs/Model/CreateDeviceConfirmation.md)
- [CreateDevicePin](docs/Model/CreateDevicePin.md)
- [CreateDevicePinResult](docs/Model/CreateDevicePinResult.md)
- [CreateVoucher](docs/Model/CreateVoucher.md)
- [CredentialTypeEnum](docs/Model/CredentialTypeEnum.md)
- [Currency](docs/Model/Currency.md)
- [CurrencyAmountSummary](docs/Model/CurrencyAmountSummary.md)
- [CustomField](docs/Model/CustomField.md)
- [CustomFieldBinaryValues](docs/Model/CustomFieldBinaryValues.md)
- [CustomFieldControlEnum](docs/Model/CustomFieldControlEnum.md)
- [CustomFieldDetailed](docs/Model/CustomFieldDetailed.md)
- [CustomFieldDetailedAllOfSize](docs/Model/CustomFieldDetailedAllOfSize.md)
- [CustomFieldDynamicValue](docs/Model/CustomFieldDynamicValue.md)
- [CustomFieldKind](docs/Model/CustomFieldKind.md)
- [CustomFieldPossibleValue](docs/Model/CustomFieldPossibleValue.md)
- [CustomFieldPossibleValueAllOfCategory](docs/Model/CustomFieldPossibleValueAllOfCategory.md)
- [CustomFieldSizeEnum](docs/Model/CustomFieldSizeEnum.md)
- [CustomFieldTypeEnum](docs/Model/CustomFieldTypeEnum.md)
- [CustomFieldValue](docs/Model/CustomFieldValue.md)
- [CustomFieldValueAllOfField](docs/Model/CustomFieldValueAllOfField.md)
- [DataForAccountHistory](docs/Model/DataForAccountHistory.md)
- [DataForAccountHistoryAllOfQuery](docs/Model/DataForAccountHistoryAllOfQuery.md)
- [DataForBalanceLimitsSearch](docs/Model/DataForBalanceLimitsSearch.md)
- [DataForChangeForgottenPassword](docs/Model/DataForChangeForgottenPassword.md)
- [DataForClientActivation](docs/Model/DataForClientActivation.md)
- [DataForDeviceConfirmationApproval](docs/Model/DataForDeviceConfirmationApproval.md)
- [DataForDynamicDocument](docs/Model/DataForDynamicDocument.md)
- [DataForEasyInvoice](docs/Model/DataForEasyInvoice.md)
- [DataForEditFullProfile](docs/Model/DataForEditFullProfile.md)
- [DataForEmailUnsubscribe](docs/Model/DataForEmailUnsubscribe.md)
- [DataForFrontend](docs/Model/DataForFrontend.md)
- [DataForFrontendHome](docs/Model/DataForFrontendHome.md)
- [DataForLogin](docs/Model/DataForLogin.md)
- [DataForMobileGuest](docs/Model/DataForMobileGuest.md)
- [DataForMobileGuestAllOfDataForDeviceConfirmationApproval](docs/Model/DataForMobileGuestAllOfDataForDeviceConfirmationApproval.md)
- [DataForMobileGuestAllOfMediumScreenRegistrationWizard](docs/Model/DataForMobileGuestAllOfMediumScreenRegistrationWizard.md)
- [DataForMobileGuestAllOfSmallScreenRegistrationWizard](docs/Model/DataForMobileGuestAllOfSmallScreenRegistrationWizard.md)
- [DataForMobileUser](docs/Model/DataForMobileUser.md)
- [DataForMobileUserAllOfDeviceActivationMode](docs/Model/DataForMobileUserAllOfDeviceActivationMode.md)
- [DataForMobileUserAllOfHomePage](docs/Model/DataForMobileUserAllOfHomePage.md)
- [DataForMobileUserAllOfMessagesStatus](docs/Model/DataForMobileUserAllOfMessagesStatus.md)
- [DataForMobileUserAllOfMobileHelp](docs/Model/DataForMobileUserAllOfMobileHelp.md)
- [DataForMobileUserAllOfNotificationsStatus](docs/Model/DataForMobileUserAllOfNotificationsStatus.md)
- [DataForMobileUserAllOfPosHelp](docs/Model/DataForMobileUserAllOfPosHelp.md)
- [DataForPaymentLimitsSearch](docs/Model/DataForPaymentLimitsSearch.md)
- [DataForSendInvitation](docs/Model/DataForSendInvitation.md)
- [DataForSendingOtp](docs/Model/DataForSendingOtp.md)
- [DataForSetSecurityAnswer](docs/Model/DataForSetSecurityAnswer.md)
- [DataForTransaction](docs/Model/DataForTransaction.md)
- [DataForUi](docs/Model/DataForUi.md)
- [DataForUserAccountVisibility](docs/Model/DataForUserAccountVisibility.md)
- [DataForUserBalancesSearch](docs/Model/DataForUserBalancesSearch.md)
- [DataForUserBalancesSearchAllOfQuery](docs/Model/DataForUserBalancesSearchAllOfQuery.md)
- [DataForUserPasswords](docs/Model/DataForUserPasswords.md)
- [DataForUserQuickAccess](docs/Model/DataForUserQuickAccess.md)
- [DataForVoucherInfo](docs/Model/DataForVoucherInfo.md)
- [DateFormatEnum](docs/Model/DateFormatEnum.md)
- [DatePeriod](docs/Model/DatePeriod.md)
- [DecimalRange](docs/Model/DecimalRange.md)
- [DeliveryMethod](docs/Model/DeliveryMethod.md)
- [DeliveryMethodAllOfAddress](docs/Model/DeliveryMethodAllOfAddress.md)
- [DeliveryMethodAllOfChargeCurrency](docs/Model/DeliveryMethodAllOfChargeCurrency.md)
- [DeliveryMethodAllOfMaxDeliveryTime](docs/Model/DeliveryMethodAllOfMaxDeliveryTime.md)
- [DeliveryMethodAllOfMinDeliveryTime](docs/Model/DeliveryMethodAllOfMinDeliveryTime.md)
- [DeliveryMethodBasicData](docs/Model/DeliveryMethodBasicData.md)
- [DeliveryMethodChargeTypeEnum](docs/Model/DeliveryMethodChargeTypeEnum.md)
- [DeliveryMethodDataForEdit](docs/Model/DeliveryMethodDataForEdit.md)
- [DeliveryMethodDataForEditAllOfDeliveryMethod](docs/Model/DeliveryMethodDataForEditAllOfDeliveryMethod.md)
- [DeliveryMethodDataForNew](docs/Model/DeliveryMethodDataForNew.md)
- [DeliveryMethodDataForNewAllOfDeliveryMethod](docs/Model/DeliveryMethodDataForNewAllOfDeliveryMethod.md)
- [DeliveryMethodEdit](docs/Model/DeliveryMethodEdit.md)
- [DeliveryMethodManage](docs/Model/DeliveryMethodManage.md)
- [DeliveryMethodNew](docs/Model/DeliveryMethodNew.md)
- [DeliveryMethodTypeEnum](docs/Model/DeliveryMethodTypeEnum.md)
- [DeliveryMethodView](docs/Model/DeliveryMethodView.md)
- [DeliveryMethodViewAllOfUser](docs/Model/DeliveryMethodViewAllOfUser.md)
- [Device](docs/Model/Device.md)
- [DeviceActionEnum](docs/Model/DeviceActionEnum.md)
- [DeviceActivation](docs/Model/DeviceActivation.md)
- [DeviceActivationInfo](docs/Model/DeviceActivationInfo.md)
- [DeviceActivationModeEnum](docs/Model/DeviceActivationModeEnum.md)
- [DeviceActivationResult](docs/Model/DeviceActivationResult.md)
- [DeviceConfirmationActionParams](docs/Model/DeviceConfirmationActionParams.md)
- [DeviceConfirmationFeedbackPush](docs/Model/DeviceConfirmationFeedbackPush.md)
- [DeviceConfirmationStatusEnum](docs/Model/DeviceConfirmationStatusEnum.md)
- [DeviceConfirmationTypeEnum](docs/Model/DeviceConfirmationTypeEnum.md)
- [DeviceConfirmationView](docs/Model/DeviceConfirmationView.md)
- [DeviceConfirmationViewAllOfStatus](docs/Model/DeviceConfirmationViewAllOfStatus.md)
- [DeviceConfirmationViewAllOfType](docs/Model/DeviceConfirmationViewAllOfType.md)
- [DeviceDataForEdit](docs/Model/DeviceDataForEdit.md)
- [DeviceEdit](docs/Model/DeviceEdit.md)
- [DevicePin](docs/Model/DevicePin.md)
- [DevicePinDataForEdit](docs/Model/DevicePinDataForEdit.md)
- [DevicePinEdit](docs/Model/DevicePinEdit.md)
- [DevicePinRemoveParams](docs/Model/DevicePinRemoveParams.md)
- [DevicePinView](docs/Model/DevicePinView.md)
- [DevicePinViewAllOfPasswordInput](docs/Model/DevicePinViewAllOfPasswordInput.md)
- [DevicePinViewAllOfUser](docs/Model/DevicePinViewAllOfUser.md)
- [DistanceUnitEnum](docs/Model/DistanceUnitEnum.md)
- [Document](docs/Model/Document.md)
- [DocumentAllOfCategory](docs/Model/DocumentAllOfCategory.md)
- [DocumentAllOfFile](docs/Model/DocumentAllOfFile.md)
- [DocumentAllOfKind](docs/Model/DocumentAllOfKind.md)
- [DocumentBasicData](docs/Model/DocumentBasicData.md)
- [DocumentDataForEdit](docs/Model/DocumentDataForEdit.md)
- [DocumentDataForEditAllOfDocument](docs/Model/DocumentDataForEditAllOfDocument.md)
- [DocumentDataForEditAllOfFile](docs/Model/DocumentDataForEditAllOfFile.md)
- [DocumentDataForNew](docs/Model/DocumentDataForNew.md)
- [DocumentDataForNewAllOfDocument](docs/Model/DocumentDataForNewAllOfDocument.md)
- [DocumentDataForSearch](docs/Model/DocumentDataForSearch.md)
- [DocumentEdit](docs/Model/DocumentEdit.md)
- [DocumentKind](docs/Model/DocumentKind.md)
- [DocumentManage](docs/Model/DocumentManage.md)
- [DocumentNew](docs/Model/DocumentNew.md)
- [DocumentQueryFilters](docs/Model/DocumentQueryFilters.md)
- [DocumentQueryFiltersAllOfRange](docs/Model/DocumentQueryFiltersAllOfRange.md)
- [DocumentRangeEnum](docs/Model/DocumentRangeEnum.md)
- [DocumentResult](docs/Model/DocumentResult.md)
- [DocumentResultAllOfUser](docs/Model/DocumentResultAllOfUser.md)
- [DocumentView](docs/Model/DocumentView.md)
- [DocumentViewAllOfCategory](docs/Model/DocumentViewAllOfCategory.md)
- [DocumentViewAllOfUser](docs/Model/DocumentViewAllOfUser.md)
- [DocumentsPermissions](docs/Model/DocumentsPermissions.md)
- [EmailUnsubscribeKind](docs/Model/EmailUnsubscribeKind.md)
- [Entity](docs/Model/Entity.md)
- [EntityReference](docs/Model/EntityReference.md)
- [Error](docs/Model/Error.md)
- [ErrorKind](docs/Model/ErrorKind.md)
- [ExportFormat](docs/Model/ExportFormat.md)
- [ExternalPaymentActionEnum](docs/Model/ExternalPaymentActionEnum.md)
- [ExternalPaymentPermissions](docs/Model/ExternalPaymentPermissions.md)
- [ExternalPaymentPreview](docs/Model/ExternalPaymentPreview.md)
- [ExternalPaymentPreviewAllOfPayment](docs/Model/ExternalPaymentPreviewAllOfPayment.md)
- [ExternalPaymentPreviewAllOfToPrincipalType](docs/Model/ExternalPaymentPreviewAllOfToPrincipalType.md)
- [ExternalPaymentStatusEnum](docs/Model/ExternalPaymentStatusEnum.md)
- [ExternalPaymentsPermissions](docs/Model/ExternalPaymentsPermissions.md)
- [FailedOccurrenceActionEnum](docs/Model/FailedOccurrenceActionEnum.md)
- [FieldSection](docs/Model/FieldSection.md)
- [ForbiddenError](docs/Model/ForbiddenError.md)
- [ForbiddenErrorCode](docs/Model/ForbiddenErrorCode.md)
- [ForgottenPasswordError](docs/Model/ForgottenPasswordError.md)
- [ForgottenPasswordErrorCode](docs/Model/ForgottenPasswordErrorCode.md)
- [ForgottenPasswordRequest](docs/Model/ForgottenPasswordRequest.md)
- [ForgottenPasswordResponse](docs/Model/ForgottenPasswordResponse.md)
- [FrontendBanner](docs/Model/FrontendBanner.md)
- [FrontendContentLayoutEnum](docs/Model/FrontendContentLayoutEnum.md)
- [FrontendDashboardAccount](docs/Model/FrontendDashboardAccount.md)
- [FrontendEnum](docs/Model/FrontendEnum.md)
- [FrontendHomeContent](docs/Model/FrontendHomeContent.md)
- [FrontendIcon](docs/Model/FrontendIcon.md)
- [FrontendLandingPageEnum](docs/Model/FrontendLandingPageEnum.md)
- [FrontendMenuEnum](docs/Model/FrontendMenuEnum.md)
- [FrontendPage](docs/Model/FrontendPage.md)
- [FrontendPageAllOfOperation](docs/Model/FrontendPageAllOfOperation.md)
- [FrontendPageAllOfWizard](docs/Model/FrontendPageAllOfWizard.md)
- [FrontendPageTypeEnum](docs/Model/FrontendPageTypeEnum.md)
- [FrontendPageWithContent](docs/Model/FrontendPageWithContent.md)
- [FrontendScreenSizeEnum](docs/Model/FrontendScreenSizeEnum.md)
- [FrontendSettings](docs/Model/FrontendSettings.md)
- [FrontendTheme](docs/Model/FrontendTheme.md)
- [FullProfileEdit](docs/Model/FullProfileEdit.md)
- [FullProfileEditResult](docs/Model/FullProfileEditResult.md)
- [FullTextQueryFilters](docs/Model/FullTextQueryFilters.md)
- [FullTextWithDistanceQueryFilters](docs/Model/FullTextWithDistanceQueryFilters.md)
- [GeneralAccountBalanceLimitsResult](docs/Model/GeneralAccountBalanceLimitsResult.md)
- [GeneralAccountPaymentLimitsResult](docs/Model/GeneralAccountPaymentLimitsResult.md)
- [GeneralImportedFileContextEnum](docs/Model/GeneralImportedFileContextEnum.md)
- [GeneralImportedFileKind](docs/Model/GeneralImportedFileKind.md)
- [GeneralOperatorsDataForSearch](docs/Model/GeneralOperatorsDataForSearch.md)
- [GeneralOperatorsQueryFilters](docs/Model/GeneralOperatorsQueryFilters.md)
- [GeneralRecordsDataForSearch](docs/Model/GeneralRecordsDataForSearch.md)
- [GeneralRecordsDataForSearchAllOfQuery](docs/Model/GeneralRecordsDataForSearchAllOfQuery.md)
- [GeneralRecordsQueryFilters](docs/Model/GeneralRecordsQueryFilters.md)
- [GeneralVouchersDataForSearch](docs/Model/GeneralVouchersDataForSearch.md)
- [GenerateVoucher](docs/Model/GenerateVoucher.md)
- [GeographicalCoordinate](docs/Model/GeographicalCoordinate.md)
- [Group](docs/Model/Group.md)
- [GroupForRegistration](docs/Model/GroupForRegistration.md)
- [GroupKind](docs/Model/GroupKind.md)
- [GroupMembershipData](docs/Model/GroupMembershipData.md)
- [GroupMembershipLog](docs/Model/GroupMembershipLog.md)
- [HttpRequestData](docs/Model/HttpRequestData.md)
- [IAddress](docs/Model/IAddress.md)
- [IBasicUserNew](docs/Model/IBasicUserNew.md)
- [IContactInfo](docs/Model/IContactInfo.md)
- [INormalizedPhones](docs/Model/INormalizedPhones.md)
- [IPhone](docs/Model/IPhone.md)
- [IPhoneDetailed](docs/Model/IPhoneDetailed.md)
- [IUser](docs/Model/IUser.md)
- [IdentificationMethodEnum](docs/Model/IdentificationMethodEnum.md)
- [IdentityProvider](docs/Model/IdentityProvider.md)
- [IdentityProviderAllOfImage](docs/Model/IdentityProviderAllOfImage.md)
- [IdentityProviderCallbackResult](docs/Model/IdentityProviderCallbackResult.md)
- [IdentityProviderCallbackStatusEnum](docs/Model/IdentityProviderCallbackStatusEnum.md)
- [IdentityProviderNotLinkReasonEnum](docs/Model/IdentityProviderNotLinkReasonEnum.md)
- [IdentityProviderRequestResult](docs/Model/IdentityProviderRequestResult.md)
- [IdentityProvidersPermissions](docs/Model/IdentityProvidersPermissions.md)
- [Image](docs/Model/Image.md)
- [ImageConfigurationForUserProfile](docs/Model/ImageConfigurationForUserProfile.md)
- [ImageKind](docs/Model/ImageKind.md)
- [ImageSizeEnum](docs/Model/ImageSizeEnum.md)
- [ImageView](docs/Model/ImageView.md)
- [ImagesListData](docs/Model/ImagesListData.md)
- [ImagesPermissions](docs/Model/ImagesPermissions.md)
- [ImportedField](docs/Model/ImportedField.md)
- [ImportedFile](docs/Model/ImportedFile.md)
- [ImportedFileDataForEdit](docs/Model/ImportedFileDataForEdit.md)
- [ImportedFileDataForNew](docs/Model/ImportedFileDataForNew.md)
- [ImportedFileDataForSearch](docs/Model/ImportedFileDataForSearch.md)
- [ImportedFileEdit](docs/Model/ImportedFileEdit.md)
- [ImportedFileKind](docs/Model/ImportedFileKind.md)
- [ImportedFileNew](docs/Model/ImportedFileNew.md)
- [ImportedFileProgress](docs/Model/ImportedFileProgress.md)
- [ImportedFileQueryFilters](docs/Model/ImportedFileQueryFilters.md)
- [ImportedFileResult](docs/Model/ImportedFileResult.md)
- [ImportedFileResultAllOfBy](docs/Model/ImportedFileResultAllOfBy.md)
- [ImportedFileStatusEnum](docs/Model/ImportedFileStatusEnum.md)
- [ImportedFileView](docs/Model/ImportedFileView.md)
- [ImportedFileViewAllOfCurrency](docs/Model/ImportedFileViewAllOfCurrency.md)
- [ImportedFileViewAllOfGroup](docs/Model/ImportedFileViewAllOfGroup.md)
- [ImportedFileViewAllOfPaymentType](docs/Model/ImportedFileViewAllOfPaymentType.md)
- [ImportedFileViewAllOfRecordType](docs/Model/ImportedFileViewAllOfRecordType.md)
- [ImportedFileViewAllOfVoucherType](docs/Model/ImportedFileViewAllOfVoucherType.md)
- [ImportedFileWithUser](docs/Model/ImportedFileWithUser.md)
- [ImportedLineDataForEdit](docs/Model/ImportedLineDataForEdit.md)
- [ImportedLineDataForSearch](docs/Model/ImportedLineDataForSearch.md)
- [ImportedLineEdit](docs/Model/ImportedLineEdit.md)
- [ImportedLineQueryFilters](docs/Model/ImportedLineQueryFilters.md)
- [ImportedLineResult](docs/Model/ImportedLineResult.md)
- [ImportedLineStatusEnum](docs/Model/ImportedLineStatusEnum.md)
- [ImportedLineView](docs/Model/ImportedLineView.md)
- [ImportsPermissions](docs/Model/ImportsPermissions.md)
- [IncomingMessage](docs/Model/IncomingMessage.md)
- [IncomingMessageAllOfCategory](docs/Model/IncomingMessageAllOfCategory.md)
- [InitializeNfcError](docs/Model/InitializeNfcError.md)
- [InitializeNfcErrorCode](docs/Model/InitializeNfcErrorCode.md)
- [InputError](docs/Model/InputError.md)
- [InputErrorCode](docs/Model/InputErrorCode.md)
- [Installment](docs/Model/Installment.md)
- [InstallmentActionEnum](docs/Model/InstallmentActionEnum.md)
- [InstallmentDataForSearch](docs/Model/InstallmentDataForSearch.md)
- [InstallmentDataForSearchAllOfQuery](docs/Model/InstallmentDataForSearchAllOfQuery.md)
- [InstallmentDataForSearchAllOfUser](docs/Model/InstallmentDataForSearchAllOfUser.md)
- [InstallmentOverviewDataForSearch](docs/Model/InstallmentOverviewDataForSearch.md)
- [InstallmentOverviewDataForSearchAllOfQuery](docs/Model/InstallmentOverviewDataForSearchAllOfQuery.md)
- [InstallmentOverviewQueryFilters](docs/Model/InstallmentOverviewQueryFilters.md)
- [InstallmentOverviewResult](docs/Model/InstallmentOverviewResult.md)
- [InstallmentOverviewResultAllOfTransaction](docs/Model/InstallmentOverviewResultAllOfTransaction.md)
- [InstallmentPreview](docs/Model/InstallmentPreview.md)
- [InstallmentQueryFilters](docs/Model/InstallmentQueryFilters.md)
- [InstallmentResult](docs/Model/InstallmentResult.md)
- [InstallmentResultAllOfTransaction](docs/Model/InstallmentResultAllOfTransaction.md)
- [InstallmentStatusEnum](docs/Model/InstallmentStatusEnum.md)
- [InstallmentView](docs/Model/InstallmentView.md)
- [InstallmentViewAllOfBy](docs/Model/InstallmentViewAllOfBy.md)
- [IntegerRange](docs/Model/IntegerRange.md)
- [InternalNamedEntity](docs/Model/InternalNamedEntity.md)
- [InternalTransactionPreview](docs/Model/InternalTransactionPreview.md)
- [InternalTransactionPreviewAllOfToOperator](docs/Model/InternalTransactionPreviewAllOfToOperator.md)
- [InvalidDeviceConfirmationEnum](docs/Model/InvalidDeviceConfirmationEnum.md)
- [InvitePermissions](docs/Model/InvitePermissions.md)
- [JWKSResponse](docs/Model/JWKSResponse.md)
- [Language](docs/Model/Language.md)
- [LinkedEntityTypeEnum](docs/Model/LinkedEntityTypeEnum.md)
- [LocalizationSettings](docs/Model/LocalizationSettings.md)
- [LoginAuth](docs/Model/LoginAuth.md)
- [LoginUser](docs/Model/LoginUser.md)
- [LogoKind](docs/Model/LogoKind.md)
- [MapData](docs/Model/MapData.md)
- [MapPreferenceEnum](docs/Model/MapPreferenceEnum.md)
- [MarketplacePermissions](docs/Model/MarketplacePermissions.md)
- [MaturityPolicyEnum](docs/Model/MaturityPolicyEnum.md)
- [Message](docs/Model/Message.md)
- [MessageAllOfKind](docs/Model/MessageAllOfKind.md)
- [MessageBoxEnum](docs/Model/MessageBoxEnum.md)
- [MessageCategory](docs/Model/MessageCategory.md)
- [MessageDataForReply](docs/Model/MessageDataForReply.md)
- [MessageDataForSearch](docs/Model/MessageDataForSearch.md)
- [MessageDataForSend](docs/Model/MessageDataForSend.md)
- [MessageDestinationEnum](docs/Model/MessageDestinationEnum.md)
- [MessageKind](docs/Model/MessageKind.md)
- [MessageOwnerEnum](docs/Model/MessageOwnerEnum.md)
- [MessageQueryFilters](docs/Model/MessageQueryFilters.md)
- [MessageQueryFiltersAllOfMessageBox](docs/Model/MessageQueryFiltersAllOfMessageBox.md)
- [MessageResult](docs/Model/MessageResult.md)
- [MessageResultAllOfDestination](docs/Model/MessageResultAllOfDestination.md)
- [MessageResultAllOfFromOwner](docs/Model/MessageResultAllOfFromOwner.md)
- [MessageResultAllOfFromOwnerKind](docs/Model/MessageResultAllOfFromOwnerKind.md)
- [MessageResultAllOfSentBy](docs/Model/MessageResultAllOfSentBy.md)
- [MessageSourceEnum](docs/Model/MessageSourceEnum.md)
- [MessageView](docs/Model/MessageView.md)
- [MessageViewAllOfOwner](docs/Model/MessageViewAllOfOwner.md)
- [MessageViewAllOfOwnerKind](docs/Model/MessageViewAllOfOwnerKind.md)
- [MessagesPermissions](docs/Model/MessagesPermissions.md)
- [MessagesStatus](docs/Model/MessagesStatus.md)
- [MobileBaseData](docs/Model/MobileBaseData.md)
- [MobileOperationEnum](docs/Model/MobileOperationEnum.md)
- [MobilePage](docs/Model/MobilePage.md)
- [MobileTranslations](docs/Model/MobileTranslations.md)
- [MyMarketplacePermissions](docs/Model/MyMarketplacePermissions.md)
- [MyMessagesPermissions](docs/Model/MyMessagesPermissions.md)
- [NamedEntity](docs/Model/NamedEntity.md)
- [NestedError](docs/Model/NestedError.md)
- [NestedErrorAllOfConflictError](docs/Model/NestedErrorAllOfConflictError.md)
- [NestedErrorAllOfError](docs/Model/NestedErrorAllOfError.md)
- [NestedErrorAllOfForbiddenError](docs/Model/NestedErrorAllOfForbiddenError.md)
- [NestedErrorAllOfInputError](docs/Model/NestedErrorAllOfInputError.md)
- [NestedErrorAllOfNotFoundError](docs/Model/NestedErrorAllOfNotFoundError.md)
- [NestedErrorAllOfUnauthorizedError](docs/Model/NestedErrorAllOfUnauthorizedError.md)
- [NewMessagePush](docs/Model/NewMessagePush.md)
- [NewNotificationPush](docs/Model/NewNotificationPush.md)
- [NfcAuthError](docs/Model/NfcAuthError.md)
- [NfcAuthErrorAllOfPosError](docs/Model/NfcAuthErrorAllOfPosError.md)
- [NfcAuthErrorCode](docs/Model/NfcAuthErrorCode.md)
- [NfcDataForInitialize](docs/Model/NfcDataForInitialize.md)
- [NfcDataForPersonalize](docs/Model/NfcDataForPersonalize.md)
- [NfcExternalAuthenticateParameter](docs/Model/NfcExternalAuthenticateParameter.md)
- [NfcExternalAuthenticateParameterAllOfKey](docs/Model/NfcExternalAuthenticateParameterAllOfKey.md)
- [NfcExternalAuthenticateResult](docs/Model/NfcExternalAuthenticateResult.md)
- [NfcInitializeParameter](docs/Model/NfcInitializeParameter.md)
- [NfcInitializeResult](docs/Model/NfcInitializeResult.md)
- [NfcPersonalizeDataParameter](docs/Model/NfcPersonalizeDataParameter.md)
- [NfcPersonalizeParameter](docs/Model/NfcPersonalizeParameter.md)
- [NfcTagKeyEnum](docs/Model/NfcTagKeyEnum.md)
- [NfcTokenParameter](docs/Model/NfcTokenParameter.md)
- [NfcTokenPermissions](docs/Model/NfcTokenPermissions.md)
- [NfcTokenWithChallengeParameter](docs/Model/NfcTokenWithChallengeParameter.md)
- [NfcTokenWithUserParameter](docs/Model/NfcTokenWithUserParameter.md)
- [NotFoundError](docs/Model/NotFoundError.md)
- [Notification](docs/Model/Notification.md)
- [NotificationAllOfRelatedUser](docs/Model/NotificationAllOfRelatedUser.md)
- [NotificationEntityTypeEnum](docs/Model/NotificationEntityTypeEnum.md)
- [NotificationKind](docs/Model/NotificationKind.md)
- [NotificationLevelEnum](docs/Model/NotificationLevelEnum.md)
- [NotificationQueryFilters](docs/Model/NotificationQueryFilters.md)
- [NotificationSettingsDataForEdit](docs/Model/NotificationSettingsDataForEdit.md)
- [NotificationSettingsDataForEditAllOfSettings](docs/Model/NotificationSettingsDataForEditAllOfSettings.md)
- [NotificationSettingsEdit](docs/Model/NotificationSettingsEdit.md)
- [NotificationSettingsPermissions](docs/Model/NotificationSettingsPermissions.md)
- [NotificationSettingsView](docs/Model/NotificationSettingsView.md)
- [NotificationTypeEnum](docs/Model/NotificationTypeEnum.md)
- [NotificationTypeMediums](docs/Model/NotificationTypeMediums.md)
- [NotificationsPermissions](docs/Model/NotificationsPermissions.md)
- [NotificationsStatus](docs/Model/NotificationsStatus.md)
- [NumberFormatEnum](docs/Model/NumberFormatEnum.md)
- [OidcAuthorizeResult](docs/Model/OidcAuthorizeResult.md)
- [OidcClient](docs/Model/OidcClient.md)
- [OidcError](docs/Model/OidcError.md)
- [OidcRegisterParams](docs/Model/OidcRegisterParams.md)
- [OidcRegisterResult](docs/Model/OidcRegisterResult.md)
- [OidcTokenResult](docs/Model/OidcTokenResult.md)
- [Operation](docs/Model/Operation.md)
- [OperationAllOfAdminMenu](docs/Model/OperationAllOfAdminMenu.md)
- [OperationAllOfResultType](docs/Model/OperationAllOfResultType.md)
- [OperationAllOfShowForm](docs/Model/OperationAllOfShowForm.md)
- [OperationAllOfUserMenu](docs/Model/OperationAllOfUserMenu.md)
- [OperationAllOfUserProfileSection](docs/Model/OperationAllOfUserProfileSection.md)
- [OperationCustomFieldDetailed](docs/Model/OperationCustomFieldDetailed.md)
- [OperationCustomFieldDetailedAllOfSection](docs/Model/OperationCustomFieldDetailedAllOfSection.md)
- [OperationDataForRun](docs/Model/OperationDataForRun.md)
- [OperationDataForRunAllOfAd](docs/Model/OperationDataForRunAllOfAd.md)
- [OperationDataForRunAllOfConfirmationPasswordInput](docs/Model/OperationDataForRunAllOfConfirmationPasswordInput.md)
- [OperationDataForRunAllOfContact](docs/Model/OperationDataForRunAllOfContact.md)
- [OperationDataForRunAllOfContactInfo](docs/Model/OperationDataForRunAllOfContactInfo.md)
- [OperationDataForRunAllOfMenuItem](docs/Model/OperationDataForRunAllOfMenuItem.md)
- [OperationDataForRunAllOfRecord](docs/Model/OperationDataForRunAllOfRecord.md)
- [OperationDataForRunAllOfRecordType](docs/Model/OperationDataForRunAllOfRecordType.md)
- [OperationDataForRunAllOfRowOperation](docs/Model/OperationDataForRunAllOfRowOperation.md)
- [OperationDataForRunAllOfTransfer](docs/Model/OperationDataForRunAllOfTransfer.md)
- [OperationDataForRunAllOfUser](docs/Model/OperationDataForRunAllOfUser.md)
- [OperationPermissions](docs/Model/OperationPermissions.md)
- [OperationResultTypeEnum](docs/Model/OperationResultTypeEnum.md)
- [OperationRowActionEnum](docs/Model/OperationRowActionEnum.md)
- [OperationScopeEnum](docs/Model/OperationScopeEnum.md)
- [OperationShowFormEnum](docs/Model/OperationShowFormEnum.md)
- [OperationsPermissions](docs/Model/OperationsPermissions.md)
- [OperatorDataForNew](docs/Model/OperatorDataForNew.md)
- [OperatorDataForNewAllOfOperator](docs/Model/OperatorDataForNewAllOfOperator.md)
- [OperatorDataForNewAllOfUser](docs/Model/OperatorDataForNewAllOfUser.md)
- [OperatorGroupAccount](docs/Model/OperatorGroupAccount.md)
- [OperatorGroupAccountAccessEnum](docs/Model/OperatorGroupAccountAccessEnum.md)
- [OperatorGroupAccountView](docs/Model/OperatorGroupAccountView.md)
- [OperatorGroupBasicData](docs/Model/OperatorGroupBasicData.md)
- [OperatorGroupDataForEdit](docs/Model/OperatorGroupDataForEdit.md)
- [OperatorGroupDataForEditAllOfOperatorGroup](docs/Model/OperatorGroupDataForEditAllOfOperatorGroup.md)
- [OperatorGroupDataForNew](docs/Model/OperatorGroupDataForNew.md)
- [OperatorGroupDataForNewAllOfOperatorGroup](docs/Model/OperatorGroupDataForNewAllOfOperatorGroup.md)
- [OperatorGroupEdit](docs/Model/OperatorGroupEdit.md)
- [OperatorGroupManage](docs/Model/OperatorGroupManage.md)
- [OperatorGroupNew](docs/Model/OperatorGroupNew.md)
- [OperatorGroupPayment](docs/Model/OperatorGroupPayment.md)
- [OperatorGroupPaymentView](docs/Model/OperatorGroupPaymentView.md)
- [OperatorGroupView](docs/Model/OperatorGroupView.md)
- [OperatorGroupViewAllOfUser](docs/Model/OperatorGroupViewAllOfUser.md)
- [OperatorNew](docs/Model/OperatorNew.md)
- [OperatorResult](docs/Model/OperatorResult.md)
- [OperatorsPermissions](docs/Model/OperatorsPermissions.md)
- [OrderBasicData](docs/Model/OrderBasicData.md)
- [OrderDataForAcceptByBuyer](docs/Model/OrderDataForAcceptByBuyer.md)
- [OrderDataForEdit](docs/Model/OrderDataForEdit.md)
- [OrderDataForNew](docs/Model/OrderDataForNew.md)
- [OrderDataForSearch](docs/Model/OrderDataForSearch.md)
- [OrderDataForSetDeliveryMethod](docs/Model/OrderDataForSetDeliveryMethod.md)
- [OrderDeliveryMethod](docs/Model/OrderDeliveryMethod.md)
- [OrderEdit](docs/Model/OrderEdit.md)
- [OrderItem](docs/Model/OrderItem.md)
- [OrderItemManage](docs/Model/OrderItemManage.md)
- [OrderLog](docs/Model/OrderLog.md)
- [OrderManage](docs/Model/OrderManage.md)
- [OrderNew](docs/Model/OrderNew.md)
- [OrderQueryFilters](docs/Model/OrderQueryFilters.md)
- [OrderResult](docs/Model/OrderResult.md)
- [OrderResultAllOfCurrency](docs/Model/OrderResultAllOfCurrency.md)
- [OrderResultAllOfImage](docs/Model/OrderResultAllOfImage.md)
- [OrderStatusEnum](docs/Model/OrderStatusEnum.md)
- [OrderView](docs/Model/OrderView.md)
- [OrderViewAllOfBuyer](docs/Model/OrderViewAllOfBuyer.md)
- [OrderViewAllOfSeller](docs/Model/OrderViewAllOfSeller.md)
- [OtpResult](docs/Model/OtpResult.md)
- [OutboundSmsStatusEnum](docs/Model/OutboundSmsStatusEnum.md)
- [OwnerAccountsListData](docs/Model/OwnerAccountsListData.md)
- [OwnerRecordData](docs/Model/OwnerRecordData.md)
- [OwnerRecordPermissions](docs/Model/OwnerRecordPermissions.md)
- [PasswordActionEnum](docs/Model/PasswordActionEnum.md)
- [PasswordActions](docs/Model/PasswordActions.md)
- [PasswordInput](docs/Model/PasswordInput.md)
- [PasswordInputMethodEnum](docs/Model/PasswordInputMethodEnum.md)
- [PasswordLog](docs/Model/PasswordLog.md)
- [PasswordModeEnum](docs/Model/PasswordModeEnum.md)
- [PasswordPermissions](docs/Model/PasswordPermissions.md)
- [PasswordRegistration](docs/Model/PasswordRegistration.md)
- [PasswordStatus](docs/Model/PasswordStatus.md)
- [PasswordStatusAndActions](docs/Model/PasswordStatusAndActions.md)
- [PasswordStatusAndActionsAllOfPermissions](docs/Model/PasswordStatusAndActionsAllOfPermissions.md)
- [PasswordStatusAndType](docs/Model/PasswordStatusAndType.md)
- [PasswordStatusAndTypeAllOfType](docs/Model/PasswordStatusAndTypeAllOfType.md)
- [PasswordStatusEnum](docs/Model/PasswordStatusEnum.md)
- [PasswordType](docs/Model/PasswordType.md)
- [PasswordTypeDetailed](docs/Model/PasswordTypeDetailed.md)
- [PasswordTypeDetailedAllOfLowerCaseLetters](docs/Model/PasswordTypeDetailedAllOfLowerCaseLetters.md)
- [PasswordTypeDetailedAllOfNumbers](docs/Model/PasswordTypeDetailedAllOfNumbers.md)
- [PasswordTypeDetailedAllOfSpecialCharacters](docs/Model/PasswordTypeDetailedAllOfSpecialCharacters.md)
- [PasswordTypeDetailedAllOfUpperCaseLetters](docs/Model/PasswordTypeDetailedAllOfUpperCaseLetters.md)
- [PasswordTypeRegistration](docs/Model/PasswordTypeRegistration.md)
- [PasswordsPermissions](docs/Model/PasswordsPermissions.md)
- [PaymentAwaitingFeedbackQueryFilters](docs/Model/PaymentAwaitingFeedbackQueryFilters.md)
- [PaymentCreationTypeEnum](docs/Model/PaymentCreationTypeEnum.md)
- [PaymentError](docs/Model/PaymentError.md)
- [PaymentErrorAllOfCurrency](docs/Model/PaymentErrorAllOfCurrency.md)
- [PaymentErrorAllOfPosError](docs/Model/PaymentErrorAllOfPosError.md)
- [PaymentErrorCode](docs/Model/PaymentErrorCode.md)
- [PaymentFeedback](docs/Model/PaymentFeedback.md)
- [PaymentFeedbackDataForEdit](docs/Model/PaymentFeedbackDataForEdit.md)
- [PaymentFeedbackDataForGive](docs/Model/PaymentFeedbackDataForGive.md)
- [PaymentFeedbackDataForReply](docs/Model/PaymentFeedbackDataForReply.md)
- [PaymentFeedbackDataForSearch](docs/Model/PaymentFeedbackDataForSearch.md)
- [PaymentFeedbackDataForSearchAllOfQuery](docs/Model/PaymentFeedbackDataForSearchAllOfQuery.md)
- [PaymentFeedbackEdit](docs/Model/PaymentFeedbackEdit.md)
- [PaymentFeedbackGive](docs/Model/PaymentFeedbackGive.md)
- [PaymentFeedbackQueryFilters](docs/Model/PaymentFeedbackQueryFilters.md)
- [PaymentFeedbackResult](docs/Model/PaymentFeedbackResult.md)
- [PaymentFeedbackResultAllOfDirection](docs/Model/PaymentFeedbackResultAllOfDirection.md)
- [PaymentFeedbackResultAllOfRelatedUser](docs/Model/PaymentFeedbackResultAllOfRelatedUser.md)
- [PaymentFeedbackView](docs/Model/PaymentFeedbackView.md)
- [PaymentFeedbackViewAllOfFrom](docs/Model/PaymentFeedbackViewAllOfFrom.md)
- [PaymentFeedbackViewAllOfTo](docs/Model/PaymentFeedbackViewAllOfTo.md)
- [PaymentFeedbackViewAllOfTransaction](docs/Model/PaymentFeedbackViewAllOfTransaction.md)
- [PaymentFeedbacksPermissions](docs/Model/PaymentFeedbacksPermissions.md)
- [PaymentPreview](docs/Model/PaymentPreview.md)
- [PaymentPreviewAllOfPayment](docs/Model/PaymentPreviewAllOfPayment.md)
- [PaymentRequestActionEnum](docs/Model/PaymentRequestActionEnum.md)
- [PaymentRequestPermissions](docs/Model/PaymentRequestPermissions.md)
- [PaymentRequestPreview](docs/Model/PaymentRequestPreview.md)
- [PaymentRequestPreviewAllOfPaymentRequest](docs/Model/PaymentRequestPreviewAllOfPaymentRequest.md)
- [PaymentRequestSchedulingEnum](docs/Model/PaymentRequestSchedulingEnum.md)
- [PaymentRequestStatusEnum](docs/Model/PaymentRequestStatusEnum.md)
- [PaymentRequestsPermissions](docs/Model/PaymentRequestsPermissions.md)
- [PaymentSchedulingEnum](docs/Model/PaymentSchedulingEnum.md)
- [PaymentsPermissions](docs/Model/PaymentsPermissions.md)
- [PendingPaymentActionParams](docs/Model/PendingPaymentActionParams.md)
- [PerformBaseTransaction](docs/Model/PerformBaseTransaction.md)
- [PerformExternalPayment](docs/Model/PerformExternalPayment.md)
- [PerformInstallment](docs/Model/PerformInstallment.md)
- [PerformInternalTransaction](docs/Model/PerformInternalTransaction.md)
- [PerformPayment](docs/Model/PerformPayment.md)
- [PerformPaymentAllOfOccurrenceInterval](docs/Model/PerformPaymentAllOfOccurrenceInterval.md)
- [PerformTransaction](docs/Model/PerformTransaction.md)
- [PerformVoucherTransaction](docs/Model/PerformVoucherTransaction.md)
- [Permissions](docs/Model/Permissions.md)
- [PersonalizeNfcError](docs/Model/PersonalizeNfcError.md)
- [PersonalizeNfcErrorCode](docs/Model/PersonalizeNfcErrorCode.md)
- [Phone](docs/Model/Phone.md)
- [PhoneBasicData](docs/Model/PhoneBasicData.md)
- [PhoneConfiguration](docs/Model/PhoneConfiguration.md)
- [PhoneConfigurationForUserProfile](docs/Model/PhoneConfigurationForUserProfile.md)
- [PhoneConfigurationForUserProfileAllOfLandLinePhone](docs/Model/PhoneConfigurationForUserProfileAllOfLandLinePhone.md)
- [PhoneConfigurationForUserProfileAllOfMobilePhone](docs/Model/PhoneConfigurationForUserProfileAllOfMobilePhone.md)
- [PhoneDataForEdit](docs/Model/PhoneDataForEdit.md)
- [PhoneDataForEditAllOfPhone](docs/Model/PhoneDataForEditAllOfPhone.md)
- [PhoneDataForNew](docs/Model/PhoneDataForNew.md)
- [PhoneDataForNewAllOfPhone](docs/Model/PhoneDataForNewAllOfPhone.md)
- [PhoneEdit](docs/Model/PhoneEdit.md)
- [PhoneEditWithId](docs/Model/PhoneEditWithId.md)
- [PhoneKind](docs/Model/PhoneKind.md)
- [PhoneManage](docs/Model/PhoneManage.md)
- [PhoneNew](docs/Model/PhoneNew.md)
- [PhoneResult](docs/Model/PhoneResult.md)
- [PhoneView](docs/Model/PhoneView.md)
- [PhoneViewAllOfUser](docs/Model/PhoneViewAllOfUser.md)
- [PhysicalTokenTypeEnum](docs/Model/PhysicalTokenTypeEnum.md)
- [PinInput](docs/Model/PinInput.md)
- [PosError](docs/Model/PosError.md)
- [PosErrorCode](docs/Model/PosErrorCode.md)
- [PreselectedPeriod](docs/Model/PreselectedPeriod.md)
- [Principal](docs/Model/Principal.md)
- [PrincipalType](docs/Model/PrincipalType.md)
- [PrincipalTypeInput](docs/Model/PrincipalTypeInput.md)
- [PrincipalTypeInputAllOfCustomField](docs/Model/PrincipalTypeInputAllOfCustomField.md)
- [PrincipalTypeInputAllOfTokenType](docs/Model/PrincipalTypeInputAllOfTokenType.md)
- [PrincipalTypeKind](docs/Model/PrincipalTypeKind.md)
- [PrivacyControl](docs/Model/PrivacyControl.md)
- [PrivacySettingsData](docs/Model/PrivacySettingsData.md)
- [PrivacySettingsParams](docs/Model/PrivacySettingsParams.md)
- [PrivacySettingsPermissions](docs/Model/PrivacySettingsPermissions.md)
- [ProcessDynamicDocument](docs/Model/ProcessDynamicDocument.md)
- [Product](docs/Model/Product.md)
- [ProductAssignmentActionEnum](docs/Model/ProductAssignmentActionEnum.md)
- [ProductAssignmentLog](docs/Model/ProductAssignmentLog.md)
- [ProductKind](docs/Model/ProductKind.md)
- [ProductWithUserAccount](docs/Model/ProductWithUserAccount.md)
- [ProfileFieldActions](docs/Model/ProfileFieldActions.md)
- [PushNotificationEventKind](docs/Model/PushNotificationEventKind.md)
- [QueryFilters](docs/Model/QueryFilters.md)
- [QuickAccess](docs/Model/QuickAccess.md)
- [QuickAccessTypeEnum](docs/Model/QuickAccessTypeEnum.md)
- [Receipt](docs/Model/Receipt.md)
- [ReceiptItem](docs/Model/ReceiptItem.md)
- [ReceiptItemAllOfLabelStyle](docs/Model/ReceiptItemAllOfLabelStyle.md)
- [ReceiptPart](docs/Model/ReceiptPart.md)
- [ReceiptPartAlignEnum](docs/Model/ReceiptPartAlignEnum.md)
- [ReceiptPartSizeEnum](docs/Model/ReceiptPartSizeEnum.md)
- [ReceiptPartStyleEnum](docs/Model/ReceiptPartStyleEnum.md)
- [Record](docs/Model/Record.md)
- [RecordBasePermissions](docs/Model/RecordBasePermissions.md)
- [RecordBasicData](docs/Model/RecordBasicData.md)
- [RecordCustomField](docs/Model/RecordCustomField.md)
- [RecordCustomFieldAllOfSection](docs/Model/RecordCustomFieldAllOfSection.md)
- [RecordCustomFieldDetailed](docs/Model/RecordCustomFieldDetailed.md)
- [RecordCustomFieldDetailedAllOfSection](docs/Model/RecordCustomFieldDetailedAllOfSection.md)
- [RecordCustomFieldValue](docs/Model/RecordCustomFieldValue.md)
- [RecordCustomFieldValueAllOfField](docs/Model/RecordCustomFieldValueAllOfField.md)
- [RecordDataForEdit](docs/Model/RecordDataForEdit.md)
- [RecordDataForEditAllOfBinaryValues](docs/Model/RecordDataForEditAllOfBinaryValues.md)
- [RecordDataForEditAllOfRecord](docs/Model/RecordDataForEditAllOfRecord.md)
- [RecordDataForNew](docs/Model/RecordDataForNew.md)
- [RecordDataForNewAllOfRecord](docs/Model/RecordDataForNewAllOfRecord.md)
- [RecordDataForSearch](docs/Model/RecordDataForSearch.md)
- [RecordDataForSearchAllOfQuery](docs/Model/RecordDataForSearchAllOfQuery.md)
- [RecordDataForSearchAllOfUser](docs/Model/RecordDataForSearchAllOfUser.md)
- [RecordEdit](docs/Model/RecordEdit.md)
- [RecordKind](docs/Model/RecordKind.md)
- [RecordLayoutEnum](docs/Model/RecordLayoutEnum.md)
- [RecordManage](docs/Model/RecordManage.md)
- [RecordNew](docs/Model/RecordNew.md)
- [RecordPermissions](docs/Model/RecordPermissions.md)
- [RecordQueryFilters](docs/Model/RecordQueryFilters.md)
- [RecordResult](docs/Model/RecordResult.md)
- [RecordSection](docs/Model/RecordSection.md)
- [RecordType](docs/Model/RecordType.md)
- [RecordTypeAllOfAdminMenu](docs/Model/RecordTypeAllOfAdminMenu.md)
- [RecordTypeAllOfUserMenu](docs/Model/RecordTypeAllOfUserMenu.md)
- [RecordTypeAllOfUserProfileSection](docs/Model/RecordTypeAllOfUserProfileSection.md)
- [RecordTypeDetailed](docs/Model/RecordTypeDetailed.md)
- [RecordView](docs/Model/RecordView.md)
- [RecordViewAllOfUser](docs/Model/RecordViewAllOfUser.md)
- [RecordWithOwnerResult](docs/Model/RecordWithOwnerResult.md)
- [RecordWithOwnerResultAllOfUser](docs/Model/RecordWithOwnerResultAllOfUser.md)
- [RecordsPermissions](docs/Model/RecordsPermissions.md)
- [RecurringPaymentActionEnum](docs/Model/RecurringPaymentActionEnum.md)
- [RecurringPaymentDataForEdit](docs/Model/RecurringPaymentDataForEdit.md)
- [RecurringPaymentEdit](docs/Model/RecurringPaymentEdit.md)
- [RecurringPaymentPermissions](docs/Model/RecurringPaymentPermissions.md)
- [RecurringPaymentStatusEnum](docs/Model/RecurringPaymentStatusEnum.md)
- [RecurringPaymentsPermissions](docs/Model/RecurringPaymentsPermissions.md)
- [RedeemVoucher](docs/Model/RedeemVoucher.md)
- [RedeemVoucherError](docs/Model/RedeemVoucherError.md)
- [RedeemVoucherErrorAllOfCurrency](docs/Model/RedeemVoucherErrorAllOfCurrency.md)
- [RedeemVoucherErrorAllOfPaymentError](docs/Model/RedeemVoucherErrorAllOfPaymentError.md)
- [RedeemVoucherErrorAllOfVoucherStatus](docs/Model/RedeemVoucherErrorAllOfVoucherStatus.md)
- [RedeemVoucherErrorCode](docs/Model/RedeemVoucherErrorCode.md)
- [Reference](docs/Model/Reference.md)
- [ReferenceDataForSet](docs/Model/ReferenceDataForSet.md)
- [ReferenceDirectionEnum](docs/Model/ReferenceDirectionEnum.md)
- [ReferenceLevelEnum](docs/Model/ReferenceLevelEnum.md)
- [ReferencePeriodStatistics](docs/Model/ReferencePeriodStatistics.md)
- [ReferenceSet](docs/Model/ReferenceSet.md)
- [ReferenceStatistics](docs/Model/ReferenceStatistics.md)
- [ReferenceView](docs/Model/ReferenceView.md)
- [ReferenceViewAllOfFrom](docs/Model/ReferenceViewAllOfFrom.md)
- [ReferenceViewAllOfTo](docs/Model/ReferenceViewAllOfTo.md)
- [ReferencesPermissions](docs/Model/ReferencesPermissions.md)
- [RejectOrder](docs/Model/RejectOrder.md)
- [RelatedTransferType](docs/Model/RelatedTransferType.md)
- [RelatedTransferTypeAllOfRelated](docs/Model/RelatedTransferTypeAllOfRelated.md)
- [RemoveFcmTokenParams](docs/Model/RemoveFcmTokenParams.md)
- [RepliedMessage](docs/Model/RepliedMessage.md)
- [ReplyMessage](docs/Model/ReplyMessage.md)
- [ResultTypeEnum](docs/Model/ResultTypeEnum.md)
- [RoleEnum](docs/Model/RoleEnum.md)
- [RunOperation](docs/Model/RunOperation.md)
- [RunOperationAction](docs/Model/RunOperationAction.md)
- [RunOperationResult](docs/Model/RunOperationResult.md)
- [RunOperationResultColumn](docs/Model/RunOperationResultColumn.md)
- [RunOperationResultColumnTypeEnum](docs/Model/RunOperationResultColumnTypeEnum.md)
- [SaveUserAccountVisibilityAsVisibleParams](docs/Model/SaveUserAccountVisibilityAsVisibleParams.md)
- [ScheduledPaymentActionEnum](docs/Model/ScheduledPaymentActionEnum.md)
- [ScheduledPaymentPermissions](docs/Model/ScheduledPaymentPermissions.md)
- [ScheduledPaymentStatusEnum](docs/Model/ScheduledPaymentStatusEnum.md)
- [ScheduledPaymentsPermissions](docs/Model/ScheduledPaymentsPermissions.md)
- [SearchByDistanceData](docs/Model/SearchByDistanceData.md)
- [SendActivationCodeRequest](docs/Model/SendActivationCodeRequest.md)
- [SendActivationCodeResult](docs/Model/SendActivationCodeResult.md)
- [SendActivationCodeResultAllOfDevice](docs/Model/SendActivationCodeResultAllOfDevice.md)
- [SendInvitation](docs/Model/SendInvitation.md)
- [SendMediumEnum](docs/Model/SendMediumEnum.md)
- [SendMessage](docs/Model/SendMessage.md)
- [SendOtp](docs/Model/SendOtp.md)
- [SendOtpWithId](docs/Model/SendOtpWithId.md)
- [SendPaymentRequest](docs/Model/SendPaymentRequest.md)
- [SendPaymentRequestAllOfOccurrenceInterval](docs/Model/SendPaymentRequestAllOfOccurrenceInterval.md)
- [SendVoucher](docs/Model/SendVoucher.md)
- [SessionDataForSearch](docs/Model/SessionDataForSearch.md)
- [SessionPropertiesEdit](docs/Model/SessionPropertiesEdit.md)
- [SessionPropertiesView](docs/Model/SessionPropertiesView.md)
- [SessionQueryFilters](docs/Model/SessionQueryFilters.md)
- [SessionResult](docs/Model/SessionResult.md)
- [SessionSourceEnum](docs/Model/SessionSourceEnum.md)
- [SessionsPermissions](docs/Model/SessionsPermissions.md)
- [SetAccountBalanceLimits](docs/Model/SetAccountBalanceLimits.md)
- [SetAccountPaymentLimits](docs/Model/SetAccountPaymentLimits.md)
- [SetDeliveryMethod](docs/Model/SetDeliveryMethod.md)
- [SetDeliveryMethodAllOfMaxTime](docs/Model/SetDeliveryMethodAllOfMaxTime.md)
- [SetDeliveryMethodAllOfMinTime](docs/Model/SetDeliveryMethodAllOfMinTime.md)
- [SetSecurityAnswer](docs/Model/SetSecurityAnswer.md)
- [SharedRecordsDataForSearch](docs/Model/SharedRecordsDataForSearch.md)
- [SharedRecordsDataForSearchAllOfQuery](docs/Model/SharedRecordsDataForSearchAllOfQuery.md)
- [SharedRecordsQueryFilters](docs/Model/SharedRecordsQueryFilters.md)
- [ShoppingCartCheckout](docs/Model/ShoppingCartCheckout.md)
- [ShoppingCartCheckoutAllOfDeliveryAddress](docs/Model/ShoppingCartCheckoutAllOfDeliveryAddress.md)
- [ShoppingCartCheckoutError](docs/Model/ShoppingCartCheckoutError.md)
- [ShoppingCartCheckoutErrorAllOfShoppingCartError](docs/Model/ShoppingCartCheckoutErrorAllOfShoppingCartError.md)
- [ShoppingCartCheckoutErrorCode](docs/Model/ShoppingCartCheckoutErrorCode.md)
- [ShoppingCartDataForCheckout](docs/Model/ShoppingCartDataForCheckout.md)
- [ShoppingCartError](docs/Model/ShoppingCartError.md)
- [ShoppingCartErrorAllOfAd](docs/Model/ShoppingCartErrorAllOfAd.md)
- [ShoppingCartErrorAllOfSeller](docs/Model/ShoppingCartErrorAllOfSeller.md)
- [ShoppingCartErrorCode](docs/Model/ShoppingCartErrorCode.md)
- [ShoppingCartItem](docs/Model/ShoppingCartItem.md)
- [ShoppingCartItemAvailabilityEnum](docs/Model/ShoppingCartItemAvailabilityEnum.md)
- [ShoppingCartItemDetailed](docs/Model/ShoppingCartItemDetailed.md)
- [ShoppingCartItemQuantityAdjustmentEnum](docs/Model/ShoppingCartItemQuantityAdjustmentEnum.md)
- [ShoppingCartResult](docs/Model/ShoppingCartResult.md)
- [ShoppingCartView](docs/Model/ShoppingCartView.md)
- [SimpleAddress](docs/Model/SimpleAddress.md)
- [SimpleChangeVoucherPin](docs/Model/SimpleChangeVoucherPin.md)
- [StoredFile](docs/Model/StoredFile.md)
- [SubscribeForPushNotifications203Response](docs/Model/SubscribeForPushNotifications203Response.md)
- [SystemAlertTypeEnum](docs/Model/SystemAlertTypeEnum.md)
- [SystemImageCategoryListData](docs/Model/SystemImageCategoryListData.md)
- [SystemImageCategoryPermissions](docs/Model/SystemImageCategoryPermissions.md)
- [SystemImagesListData](docs/Model/SystemImagesListData.md)
- [SystemMessagesPermissions](docs/Model/SystemMessagesPermissions.md)
- [TempImageTargetEnum](docs/Model/TempImageTargetEnum.md)
- [ThemeImageKind](docs/Model/ThemeImageKind.md)
- [ThemeUIElement](docs/Model/ThemeUIElement.md)
- [TicketApprovalResult](docs/Model/TicketApprovalResult.md)
- [TicketApprovalResultAllOfTransaction](docs/Model/TicketApprovalResultAllOfTransaction.md)
- [TicketNew](docs/Model/TicketNew.md)
- [TicketNewAllOfExpiresAfter](docs/Model/TicketNewAllOfExpiresAfter.md)
- [TicketPreview](docs/Model/TicketPreview.md)
- [TicketProcessResult](docs/Model/TicketProcessResult.md)
- [TicketProcessResultAllOfTransaction](docs/Model/TicketProcessResultAllOfTransaction.md)
- [TicketStatusEnum](docs/Model/TicketStatusEnum.md)
- [TicketsPermissions](docs/Model/TicketsPermissions.md)
- [TimeFieldEnum](docs/Model/TimeFieldEnum.md)
- [TimeFormatEnum](docs/Model/TimeFormatEnum.md)
- [TimeInterval](docs/Model/TimeInterval.md)
- [Token](docs/Model/Token.md)
- [TokenDataForNew](docs/Model/TokenDataForNew.md)
- [TokenDataForSearch](docs/Model/TokenDataForSearch.md)
- [TokenDataForSearchAllOfQuery](docs/Model/TokenDataForSearchAllOfQuery.md)
- [TokenDetailed](docs/Model/TokenDetailed.md)
- [TokenNew](docs/Model/TokenNew.md)
- [TokenPermissions](docs/Model/TokenPermissions.md)
- [TokenQueryFilters](docs/Model/TokenQueryFilters.md)
- [TokenResult](docs/Model/TokenResult.md)
- [TokenResultAllOfUser](docs/Model/TokenResultAllOfUser.md)
- [TokenStatusEnum](docs/Model/TokenStatusEnum.md)
- [TokenType](docs/Model/TokenType.md)
- [TokenTypeEnum](docs/Model/TokenTypeEnum.md)
- [TokenView](docs/Model/TokenView.md)
- [TokensPermissions](docs/Model/TokensPermissions.md)
- [TopUpVoucher](docs/Model/TopUpVoucher.md)
- [TopUpVoucherError](docs/Model/TopUpVoucherError.md)
- [TopUpVoucherErrorAllOfPaymentError](docs/Model/TopUpVoucherErrorAllOfPaymentError.md)
- [TopUpVoucherErrorAllOfVoucherStatus](docs/Model/TopUpVoucherErrorAllOfVoucherStatus.md)
- [TopUpVoucherErrorCode](docs/Model/TopUpVoucherErrorCode.md)
- [TotpSecretData](docs/Model/TotpSecretData.md)
- [TotpStatusEnum](docs/Model/TotpStatusEnum.md)
- [Trans](docs/Model/Trans.md)
- [TransAllOfCurrency](docs/Model/TransAllOfCurrency.md)
- [TransAllOfFrom](docs/Model/TransAllOfFrom.md)
- [TransAllOfTo](docs/Model/TransAllOfTo.md)
- [TransAllOfType](docs/Model/TransAllOfType.md)
- [TransOrderByEnum](docs/Model/TransOrderByEnum.md)
- [TransResult](docs/Model/TransResult.md)
- [TransResultAllOfImage](docs/Model/TransResultAllOfImage.md)
- [TransResultAllOfType](docs/Model/TransResultAllOfType.md)
- [Transaction](docs/Model/Transaction.md)
- [TransactionAllOfAuthorizationStatus](docs/Model/TransactionAllOfAuthorizationStatus.md)
- [TransactionAllOfCreationType](docs/Model/TransactionAllOfCreationType.md)
- [TransactionAllOfKind](docs/Model/TransactionAllOfKind.md)
- [TransactionAuthorization](docs/Model/TransactionAuthorization.md)
- [TransactionAuthorizationActionEnum](docs/Model/TransactionAuthorizationActionEnum.md)
- [TransactionAuthorizationLevelData](docs/Model/TransactionAuthorizationLevelData.md)
- [TransactionAuthorizationPermissions](docs/Model/TransactionAuthorizationPermissions.md)
- [TransactionAuthorizationStatusEnum](docs/Model/TransactionAuthorizationStatusEnum.md)
- [TransactionAuthorizationTypeEnum](docs/Model/TransactionAuthorizationTypeEnum.md)
- [TransactionAuthorizationsPermissions](docs/Model/TransactionAuthorizationsPermissions.md)
- [TransactionDataForSearch](docs/Model/TransactionDataForSearch.md)
- [TransactionDataForSearchAllOfQuery](docs/Model/TransactionDataForSearchAllOfQuery.md)
- [TransactionDataForSearchAllOfUser](docs/Model/TransactionDataForSearchAllOfUser.md)
- [TransactionDataForSearchAllOfUserPermissions](docs/Model/TransactionDataForSearchAllOfUserPermissions.md)
- [TransactionKind](docs/Model/TransactionKind.md)
- [TransactionOverviewDataForSearch](docs/Model/TransactionOverviewDataForSearch.md)
- [TransactionOverviewDataForSearchAllOfQuery](docs/Model/TransactionOverviewDataForSearchAllOfQuery.md)
- [TransactionOverviewQueryFilters](docs/Model/TransactionOverviewQueryFilters.md)
- [TransactionOverviewResult](docs/Model/TransactionOverviewResult.md)
- [TransactionOverviewResultAllOfFrom](docs/Model/TransactionOverviewResultAllOfFrom.md)
- [TransactionOverviewResultAllOfTo](docs/Model/TransactionOverviewResultAllOfTo.md)
- [TransactionPreview](docs/Model/TransactionPreview.md)
- [TransactionQueryFilters](docs/Model/TransactionQueryFilters.md)
- [TransactionResult](docs/Model/TransactionResult.md)
- [TransactionResultAllOfRelated](docs/Model/TransactionResultAllOfRelated.md)
- [TransactionSubjectsEnum](docs/Model/TransactionSubjectsEnum.md)
- [TransactionTypeData](docs/Model/TransactionTypeData.md)
- [TransactionTypeDataAllOfMaturityPolicy](docs/Model/TransactionTypeDataAllOfMaturityPolicy.md)
- [TransactionView](docs/Model/TransactionView.md)
- [TransactionViewAllOfAccessClient](docs/Model/TransactionViewAllOfAccessClient.md)
- [TransactionViewAllOfAuthorizationLevelData](docs/Model/TransactionViewAllOfAuthorizationLevelData.md)
- [TransactionViewAllOfAuthorizationPermissions](docs/Model/TransactionViewAllOfAuthorizationPermissions.md)
- [TransactionViewAllOfBy](docs/Model/TransactionViewAllOfBy.md)
- [TransactionViewAllOfChannel](docs/Model/TransactionViewAllOfChannel.md)
- [TransactionViewAllOfChargebackTransfer](docs/Model/TransactionViewAllOfChargebackTransfer.md)
- [TransactionViewAllOfConfirmationPasswordInput](docs/Model/TransactionViewAllOfConfirmationPasswordInput.md)
- [TransactionViewAllOfExternalPaymentPermissions](docs/Model/TransactionViewAllOfExternalPaymentPermissions.md)
- [TransactionViewAllOfFeedback](docs/Model/TransactionViewAllOfFeedback.md)
- [TransactionViewAllOfFeedbackPermissions](docs/Model/TransactionViewAllOfFeedbackPermissions.md)
- [TransactionViewAllOfFeesOnAuthorization](docs/Model/TransactionViewAllOfFeesOnAuthorization.md)
- [TransactionViewAllOfOccurrenceInterval](docs/Model/TransactionViewAllOfOccurrenceInterval.md)
- [TransactionViewAllOfOidcClient](docs/Model/TransactionViewAllOfOidcClient.md)
- [TransactionViewAllOfOriginalTransfer](docs/Model/TransactionViewAllOfOriginalTransfer.md)
- [TransactionViewAllOfPayee](docs/Model/TransactionViewAllOfPayee.md)
- [TransactionViewAllOfPayer](docs/Model/TransactionViewAllOfPayer.md)
- [TransactionViewAllOfPaymentRequestPermissions](docs/Model/TransactionViewAllOfPaymentRequestPermissions.md)
- [TransactionViewAllOfPreview](docs/Model/TransactionViewAllOfPreview.md)
- [TransactionViewAllOfReceivedBy](docs/Model/TransactionViewAllOfReceivedBy.md)
- [TransactionViewAllOfRecurringPaymentPermissions](docs/Model/TransactionViewAllOfRecurringPaymentPermissions.md)
- [TransactionViewAllOfScheduledPaymentPermissions](docs/Model/TransactionViewAllOfScheduledPaymentPermissions.md)
- [TransactionViewAllOfScheduling](docs/Model/TransactionViewAllOfScheduling.md)
- [TransactionViewAllOfToPrincipalType](docs/Model/TransactionViewAllOfToPrincipalType.md)
- [TransactionViewAllOfTransaction](docs/Model/TransactionViewAllOfTransaction.md)
- [TransactionViewAllOfTransfer](docs/Model/TransactionViewAllOfTransfer.md)
- [TransactionViewAllOfVoucherTransaction](docs/Model/TransactionViewAllOfVoucherTransaction.md)
- [Transfer](docs/Model/Transfer.md)
- [TransferDataForSearch](docs/Model/TransferDataForSearch.md)
- [TransferDataForSearchAllOfQuery](docs/Model/TransferDataForSearchAllOfQuery.md)
- [TransferDetailed](docs/Model/TransferDetailed.md)
- [TransferDetailedAllOfAccountFee](docs/Model/TransferDetailedAllOfAccountFee.md)
- [TransferDetailedAllOfChargebackOf](docs/Model/TransferDetailedAllOfChargebackOf.md)
- [TransferDetailedAllOfChargedBackBy](docs/Model/TransferDetailedAllOfChargedBackBy.md)
- [TransferDetailedAllOfInstallment](docs/Model/TransferDetailedAllOfInstallment.md)
- [TransferDetailedAllOfParent](docs/Model/TransferDetailedAllOfParent.md)
- [TransferDetailedAllOfTransferFee](docs/Model/TransferDetailedAllOfTransferFee.md)
- [TransferDirectionEnum](docs/Model/TransferDirectionEnum.md)
- [TransferFeePreview](docs/Model/TransferFeePreview.md)
- [TransferFeesPreview](docs/Model/TransferFeesPreview.md)
- [TransferFilter](docs/Model/TransferFilter.md)
- [TransferFilterAllOfAccountType](docs/Model/TransferFilterAllOfAccountType.md)
- [TransferKind](docs/Model/TransferKind.md)
- [TransferQueryFilters](docs/Model/TransferQueryFilters.md)
- [TransferResult](docs/Model/TransferResult.md)
- [TransferStatus](docs/Model/TransferStatus.md)
- [TransferStatusAllOfFlow](docs/Model/TransferStatusAllOfFlow.md)
- [TransferStatusFlow](docs/Model/TransferStatusFlow.md)
- [TransferStatusFlowForTransferView](docs/Model/TransferStatusFlowForTransferView.md)
- [TransferStatusLog](docs/Model/TransferStatusLog.md)
- [TransferStatusLogAllOfBy](docs/Model/TransferStatusLogAllOfBy.md)
- [TransferStatusLogAllOfStatus](docs/Model/TransferStatusLogAllOfStatus.md)
- [TransferType](docs/Model/TransferType.md)
- [TransferTypeAllOfFrom](docs/Model/TransferTypeAllOfFrom.md)
- [TransferTypeAllOfTo](docs/Model/TransferTypeAllOfTo.md)
- [TransferTypeWithCurrency](docs/Model/TransferTypeWithCurrency.md)
- [TransferView](docs/Model/TransferView.md)
- [TransferViewAllOfConfirmationPasswordInput](docs/Model/TransferViewAllOfConfirmationPasswordInput.md)
- [TransferViewAllOfTransaction](docs/Model/TransferViewAllOfTransaction.md)
- [TranslatableUIElementWithContent](docs/Model/TranslatableUIElementWithContent.md)
- [UIElementWithContent](docs/Model/UIElementWithContent.md)
- [UiKind](docs/Model/UiKind.md)
- [UnauthorizedError](docs/Model/UnauthorizedError.md)
- [UnauthorizedErrorCode](docs/Model/UnauthorizedErrorCode.md)
- [UnavailableError](docs/Model/UnavailableError.md)
- [UnavailableErrorCode](docs/Model/UnavailableErrorCode.md)
- [UpdateFcmTokenParams](docs/Model/UpdateFcmTokenParams.md)
- [User](docs/Model/User.md)
- [UserAccountBalanceLimitsListData](docs/Model/UserAccountBalanceLimitsListData.md)
- [UserAccountPaymentLimitsListData](docs/Model/UserAccountPaymentLimitsListData.md)
- [UserAccountVisibility](docs/Model/UserAccountVisibility.md)
- [UserAccountVisibilitySettingsPermissions](docs/Model/UserAccountVisibilitySettingsPermissions.md)
- [UserAdInterestsListData](docs/Model/UserAdInterestsListData.md)
- [UserAddressResultEnum](docs/Model/UserAddressResultEnum.md)
- [UserAddressesListData](docs/Model/UserAddressesListData.md)
- [UserAdsDataForSearch](docs/Model/UserAdsDataForSearch.md)
- [UserAdsDataForSearchAllOfQuery](docs/Model/UserAdsDataForSearchAllOfQuery.md)
- [UserAdsQueryFilters](docs/Model/UserAdsQueryFilters.md)
- [UserAgreementsData](docs/Model/UserAgreementsData.md)
- [UserAlert](docs/Model/UserAlert.md)
- [UserAlertDataForSearch](docs/Model/UserAlertDataForSearch.md)
- [UserAlertQueryFilters](docs/Model/UserAlertQueryFilters.md)
- [UserAlertTypeEnum](docs/Model/UserAlertTypeEnum.md)
- [UserAllOfImage](docs/Model/UserAllOfImage.md)
- [UserAllOfLocatorPrincipal](docs/Model/UserAllOfLocatorPrincipal.md)
- [UserAllOfUser](docs/Model/UserAllOfUser.md)
- [UserAuth](docs/Model/UserAuth.md)
- [UserAuthAllOfConfiguration](docs/Model/UserAuthAllOfConfiguration.md)
- [UserAuthorizedPaymentsPermissions](docs/Model/UserAuthorizedPaymentsPermissions.md)
- [UserBalanceLimitsPermissions](docs/Model/UserBalanceLimitsPermissions.md)
- [UserBaseAdPermissions](docs/Model/UserBaseAdPermissions.md)
- [UserBasicData](docs/Model/UserBasicData.md)
- [UserBrokeringPermissions](docs/Model/UserBrokeringPermissions.md)
- [UserBrokersData](docs/Model/UserBrokersData.md)
- [UserClientTypePermissions](docs/Model/UserClientTypePermissions.md)
- [UserContactInfosListData](docs/Model/UserContactInfosListData.md)
- [UserContactPermissions](docs/Model/UserContactPermissions.md)
- [UserCustomField](docs/Model/UserCustomField.md)
- [UserCustomFieldAllOfSection](docs/Model/UserCustomFieldAllOfSection.md)
- [UserCustomFieldDetailed](docs/Model/UserCustomFieldDetailed.md)
- [UserCustomFieldDetailedAllOfSection](docs/Model/UserCustomFieldDetailedAllOfSection.md)
- [UserCustomFieldValue](docs/Model/UserCustomFieldValue.md)
- [UserCustomFieldValueAllOfField](docs/Model/UserCustomFieldValueAllOfField.md)
- [UserDataForEdit](docs/Model/UserDataForEdit.md)
- [UserDataForEditAllOfConfirmationPasswordInput](docs/Model/UserDataForEditAllOfConfirmationPasswordInput.md)
- [UserDataForEditAllOfDetails](docs/Model/UserDataForEditAllOfDetails.md)
- [UserDataForEditAllOfUser](docs/Model/UserDataForEditAllOfUser.md)
- [UserDataForMap](docs/Model/UserDataForMap.md)
- [UserDataForMapAllOfDefaultMapLocation](docs/Model/UserDataForMapAllOfDefaultMapLocation.md)
- [UserDataForNew](docs/Model/UserDataForNew.md)
- [UserDataForNewAllOfBroker](docs/Model/UserDataForNewAllOfBroker.md)
- [UserDataForNewAllOfCaptchaInput](docs/Model/UserDataForNewAllOfCaptchaInput.md)
- [UserDataForNewAllOfCaptchaType](docs/Model/UserDataForNewAllOfCaptchaType.md)
- [UserDataForNewAllOfContactInfoBinaryValues](docs/Model/UserDataForNewAllOfContactInfoBinaryValues.md)
- [UserDataForNewAllOfContactInfoImage](docs/Model/UserDataForNewAllOfContactInfoImage.md)
- [UserDataForNewAllOfGroup](docs/Model/UserDataForNewAllOfGroup.md)
- [UserDataForNewAllOfUser](docs/Model/UserDataForNewAllOfUser.md)
- [UserDataForSearch](docs/Model/UserDataForSearch.md)
- [UserDataForSearchAllOfBroker](docs/Model/UserDataForSearchAllOfBroker.md)
- [UserDataForSearchAllOfQuery](docs/Model/UserDataForSearchAllOfQuery.md)
- [UserDataForSearchAllOfResultType](docs/Model/UserDataForSearchAllOfResultType.md)
- [UserDeliveryMethodsListData](docs/Model/UserDeliveryMethodsListData.md)
- [UserDocuments](docs/Model/UserDocuments.md)
- [UserDocumentsPermissions](docs/Model/UserDocumentsPermissions.md)
- [UserEdit](docs/Model/UserEdit.md)
- [UserExternalPaymentsPermissions](docs/Model/UserExternalPaymentsPermissions.md)
- [UserFavoriteAdsListData](docs/Model/UserFavoriteAdsListData.md)
- [UserGroupPermissions](docs/Model/UserGroupPermissions.md)
- [UserIdentityProvider](docs/Model/UserIdentityProvider.md)
- [UserIdentityProviderStatusEnum](docs/Model/UserIdentityProviderStatusEnum.md)
- [UserIdentityProvidersListData](docs/Model/UserIdentityProvidersListData.md)
- [UserIdentityProvidersPermissions](docs/Model/UserIdentityProvidersPermissions.md)
- [UserImageKind](docs/Model/UserImageKind.md)
- [UserImportedFileContextEnum](docs/Model/UserImportedFileContextEnum.md)
- [UserImportedFileKind](docs/Model/UserImportedFileKind.md)
- [UserImportsPermissions](docs/Model/UserImportsPermissions.md)
- [UserLocale](docs/Model/UserLocale.md)
- [UserManage](docs/Model/UserManage.md)
- [UserMarketplacePermissions](docs/Model/UserMarketplacePermissions.md)
- [UserMenuEnum](docs/Model/UserMenuEnum.md)
- [UserMessagesPermissions](docs/Model/UserMessagesPermissions.md)
- [UserNew](docs/Model/UserNew.md)
- [UserNewAllOfCaptcha](docs/Model/UserNewAllOfCaptcha.md)
- [UserNewAllOfNfcToken](docs/Model/UserNewAllOfNfcToken.md)
- [UserNotificationSettingsPermissions](docs/Model/UserNotificationSettingsPermissions.md)
- [UserOperatorGroupsListData](docs/Model/UserOperatorGroupsListData.md)
- [UserOperatorsDataForSearch](docs/Model/UserOperatorsDataForSearch.md)
- [UserOperatorsPermissions](docs/Model/UserOperatorsPermissions.md)
- [UserOperatorsQueryFilters](docs/Model/UserOperatorsQueryFilters.md)
- [UserOrderByEnum](docs/Model/UserOrderByEnum.md)
- [UserOrderResult](docs/Model/UserOrderResult.md)
- [UserOrderResultAllOfRelatedUser](docs/Model/UserOrderResultAllOfRelatedUser.md)
- [UserPasswordsPermissions](docs/Model/UserPasswordsPermissions.md)
- [UserPaymentFeedbacksPermissions](docs/Model/UserPaymentFeedbacksPermissions.md)
- [UserPaymentLimitsPermissions](docs/Model/UserPaymentLimitsPermissions.md)
- [UserPaymentPermissions](docs/Model/UserPaymentPermissions.md)
- [UserPaymentRequestsPermissions](docs/Model/UserPaymentRequestsPermissions.md)
- [UserPermissions](docs/Model/UserPermissions.md)
- [UserPhonesListData](docs/Model/UserPhonesListData.md)
- [UserPrivacySettingsPermissions](docs/Model/UserPrivacySettingsPermissions.md)
- [UserProductAssignmentData](docs/Model/UserProductAssignmentData.md)
- [UserProductsPermissions](docs/Model/UserProductsPermissions.md)
- [UserProfilePermissions](docs/Model/UserProfilePermissions.md)
- [UserProfileSectionEnum](docs/Model/UserProfileSectionEnum.md)
- [UserQueryFilters](docs/Model/UserQueryFilters.md)
- [UserQuickAccessEdit](docs/Model/UserQuickAccessEdit.md)
- [UserQuickAccessPermissions](docs/Model/UserQuickAccessPermissions.md)
- [UserQuickAccessSettingsEdit](docs/Model/UserQuickAccessSettingsEdit.md)
- [UserQuickAccessView](docs/Model/UserQuickAccessView.md)
- [UserRecords](docs/Model/UserRecords.md)
- [UserReferenceDataForSearch](docs/Model/UserReferenceDataForSearch.md)
- [UserReferenceDataForSearchAllOfCurrent](docs/Model/UserReferenceDataForSearchAllOfCurrent.md)
- [UserReferenceDataForSearchAllOfQuery](docs/Model/UserReferenceDataForSearchAllOfQuery.md)
- [UserReferenceQueryFilters](docs/Model/UserReferenceQueryFilters.md)
- [UserReferenceResult](docs/Model/UserReferenceResult.md)
- [UserReferenceResultAllOfDirection](docs/Model/UserReferenceResultAllOfDirection.md)
- [UserReferenceResultAllOfRelatedUser](docs/Model/UserReferenceResultAllOfRelatedUser.md)
- [UserReferences](docs/Model/UserReferences.md)
- [UserReferencesPermissions](docs/Model/UserReferencesPermissions.md)
- [UserRegistrationPrincipal](docs/Model/UserRegistrationPrincipal.md)
- [UserRegistrationResult](docs/Model/UserRegistrationResult.md)
- [UserRegistrationStatusEnum](docs/Model/UserRegistrationStatusEnum.md)
- [UserRelationshipEnum](docs/Model/UserRelationshipEnum.md)
- [UserResult](docs/Model/UserResult.md)
- [UserResultAllOfAddress](docs/Model/UserResultAllOfAddress.md)
- [UserResultAllOfGroup](docs/Model/UserResultAllOfGroup.md)
- [UserResultAllOfGroupSet](docs/Model/UserResultAllOfGroupSet.md)
- [UserScheduledPaymentsPermissions](docs/Model/UserScheduledPaymentsPermissions.md)
- [UserSessionPermissions](docs/Model/UserSessionPermissions.md)
- [UserStatusData](docs/Model/UserStatusData.md)
- [UserStatusEnum](docs/Model/UserStatusEnum.md)
- [UserStatusLog](docs/Model/UserStatusLog.md)
- [UserStatusPermissions](docs/Model/UserStatusPermissions.md)
- [UserTicketsPermissions](docs/Model/UserTicketsPermissions.md)
- [UserTokensListData](docs/Model/UserTokensListData.md)
- [UserTransactionPermissions](docs/Model/UserTransactionPermissions.md)
- [UserValidationPermissions](docs/Model/UserValidationPermissions.md)
- [UserView](docs/Model/UserView.md)
- [UserViewAllOfContact](docs/Model/UserViewAllOfContact.md)
- [UserViewAllOfGroup](docs/Model/UserViewAllOfGroup.md)
- [UserViewAllOfGroupSet](docs/Model/UserViewAllOfGroupSet.md)
- [UserViewAllOfInvitedBy](docs/Model/UserViewAllOfInvitedBy.md)
- [UserViewAllOfPaymentFeedbacks](docs/Model/UserViewAllOfPaymentFeedbacks.md)
- [UserViewAllOfPermissions](docs/Model/UserViewAllOfPermissions.md)
- [UserViewAllOfReferences](docs/Model/UserViewAllOfReferences.md)
- [UserViewAllOfStatus](docs/Model/UserViewAllOfStatus.md)
- [UserVoucherTransactionsDataForSearch](docs/Model/UserVoucherTransactionsDataForSearch.md)
- [UserVoucherTransactionsQueryFilters](docs/Model/UserVoucherTransactionsQueryFilters.md)
- [UserVouchersDataForSearch](docs/Model/UserVouchersDataForSearch.md)
- [UserVouchersPermissions](docs/Model/UserVouchersPermissions.md)
- [UserVouchersQueryFilters](docs/Model/UserVouchersQueryFilters.md)
- [UserVouchersQueryFiltersAllOfRelation](docs/Model/UserVouchersQueryFiltersAllOfRelation.md)
- [UserWebshopPermissions](docs/Model/UserWebshopPermissions.md)
- [UserWithBalanceResult](docs/Model/UserWithBalanceResult.md)
- [UsersPermissions](docs/Model/UsersPermissions.md)
- [UsersWithBalanceOrderByEnum](docs/Model/UsersWithBalanceOrderByEnum.md)
- [UsersWithBalanceQueryFilters](docs/Model/UsersWithBalanceQueryFilters.md)
- [UsersWithBalanceSummary](docs/Model/UsersWithBalanceSummary.md)
- [VersionedEntity](docs/Model/VersionedEntity.md)
- [VersionedEntityReference](docs/Model/VersionedEntityReference.md)
- [Voucher](docs/Model/Voucher.md)
- [VoucherActionEnum](docs/Model/VoucherActionEnum.md)
- [VoucherBasicData](docs/Model/VoucherBasicData.md)
- [VoucherBasicDataForTransaction](docs/Model/VoucherBasicDataForTransaction.md)
- [VoucherBoughtResult](docs/Model/VoucherBoughtResult.md)
- [VoucherBuyingPreview](docs/Model/VoucherBuyingPreview.md)
- [VoucherBuyingPreviewAllOfBuyVoucher](docs/Model/VoucherBuyingPreviewAllOfBuyVoucher.md)
- [VoucherCancelActionEnum](docs/Model/VoucherCancelActionEnum.md)
- [VoucherCategory](docs/Model/VoucherCategory.md)
- [VoucherConfiguration](docs/Model/VoucherConfiguration.md)
- [VoucherCreateData](docs/Model/VoucherCreateData.md)
- [VoucherCreateDataAllOfAccount](docs/Model/VoucherCreateDataAllOfAccount.md)
- [VoucherCreateDataAllOfMinimumTimeToRedeem](docs/Model/VoucherCreateDataAllOfMinimumTimeToRedeem.md)
- [VoucherCreationTypeEnum](docs/Model/VoucherCreationTypeEnum.md)
- [VoucherDataForBuy](docs/Model/VoucherDataForBuy.md)
- [VoucherDataForBuyAllOfAmountRange](docs/Model/VoucherDataForBuyAllOfAmountRange.md)
- [VoucherDataForBuyAllOfConfirmationPasswordInput](docs/Model/VoucherDataForBuyAllOfConfirmationPasswordInput.md)
- [VoucherDataForGenerate](docs/Model/VoucherDataForGenerate.md)
- [VoucherDataForGenerateAllOfConfirmationPasswordInput](docs/Model/VoucherDataForGenerateAllOfConfirmationPasswordInput.md)
- [VoucherDataForGenerateAllOfGenerateVoucher](docs/Model/VoucherDataForGenerateAllOfGenerateVoucher.md)
- [VoucherDataForRedeem](docs/Model/VoucherDataForRedeem.md)
- [VoucherDataForRedeemAllOfBuyer](docs/Model/VoucherDataForRedeemAllOfBuyer.md)
- [VoucherDataForRedeemAllOfPinInput](docs/Model/VoucherDataForRedeemAllOfPinInput.md)
- [VoucherDataForTopUp](docs/Model/VoucherDataForTopUp.md)
- [VoucherDataForTopUpAllOfConfirmationPasswordInput](docs/Model/VoucherDataForTopUpAllOfConfirmationPasswordInput.md)
- [VoucherDataForTopUpAllOfEmailInput](docs/Model/VoucherDataForTopUpAllOfEmailInput.md)
- [VoucherDataForTopUpAllOfPhoneConfiguration](docs/Model/VoucherDataForTopUpAllOfPhoneConfiguration.md)
- [VoucherDataForTopUpAllOfPinInput](docs/Model/VoucherDataForTopUpAllOfPinInput.md)
- [VoucherGenerationAmountEnum](docs/Model/VoucherGenerationAmountEnum.md)
- [VoucherGenerationStatusEnum](docs/Model/VoucherGenerationStatusEnum.md)
- [VoucherGiftEnum](docs/Model/VoucherGiftEnum.md)
- [VoucherInfo](docs/Model/VoucherInfo.md)
- [VoucherInitialDataForTransaction](docs/Model/VoucherInitialDataForTransaction.md)
- [VoucherOrderByEnum](docs/Model/VoucherOrderByEnum.md)
- [VoucherPermissions](docs/Model/VoucherPermissions.md)
- [VoucherPinOnActivationEnum](docs/Model/VoucherPinOnActivationEnum.md)
- [VoucherPinStatusForRedeemEnum](docs/Model/VoucherPinStatusForRedeemEnum.md)
- [VoucherRedeemPreview](docs/Model/VoucherRedeemPreview.md)
- [VoucherRedeemPreviewAllOfPinInput](docs/Model/VoucherRedeemPreviewAllOfPinInput.md)
- [VoucherRedeemResult](docs/Model/VoucherRedeemResult.md)
- [VoucherRelationEnum](docs/Model/VoucherRelationEnum.md)
- [VoucherResult](docs/Model/VoucherResult.md)
- [VoucherResultAllOfBuyer](docs/Model/VoucherResultAllOfBuyer.md)
- [VoucherResultAllOfOwner](docs/Model/VoucherResultAllOfOwner.md)
- [VoucherResultAllOfRedeemBy](docs/Model/VoucherResultAllOfRedeemBy.md)
- [VoucherResultAllOfRedeemer](docs/Model/VoucherResultAllOfRedeemer.md)
- [VoucherSendingPreview](docs/Model/VoucherSendingPreview.md)
- [VoucherSendingPreviewAllOfOwner](docs/Model/VoucherSendingPreviewAllOfOwner.md)
- [VoucherSendingPreviewAllOfSendVoucher](docs/Model/VoucherSendingPreviewAllOfSendVoucher.md)
- [VoucherStatusEnum](docs/Model/VoucherStatusEnum.md)
- [VoucherTopUpPreview](docs/Model/VoucherTopUpPreview.md)
- [VoucherTopUpPreviewAllOfConfirmationPasswordInput](docs/Model/VoucherTopUpPreviewAllOfConfirmationPasswordInput.md)
- [VoucherTopUpPreviewAllOfOwner](docs/Model/VoucherTopUpPreviewAllOfOwner.md)
- [VoucherTransaction](docs/Model/VoucherTransaction.md)
- [VoucherTransactionAllOfBy](docs/Model/VoucherTransactionAllOfBy.md)
- [VoucherTransactionAllOfPayment](docs/Model/VoucherTransactionAllOfPayment.md)
- [VoucherTransactionAllOfUser](docs/Model/VoucherTransactionAllOfUser.md)
- [VoucherTransactionKind](docs/Model/VoucherTransactionKind.md)
- [VoucherTransactionPreview](docs/Model/VoucherTransactionPreview.md)
- [VoucherTransactionResult](docs/Model/VoucherTransactionResult.md)
- [VoucherTransactionResultAllOfType](docs/Model/VoucherTransactionResultAllOfType.md)
- [VoucherTransactionView](docs/Model/VoucherTransactionView.md)
- [VoucherTransactionViewAllOfChargebackOf](docs/Model/VoucherTransactionViewAllOfChargebackOf.md)
- [VoucherTransactionViewAllOfChargedBackBy](docs/Model/VoucherTransactionViewAllOfChargedBackBy.md)
- [VoucherType](docs/Model/VoucherType.md)
- [VoucherTypeDetailed](docs/Model/VoucherTypeDetailed.md)
- [VoucherView](docs/Model/VoucherView.md)
- [VoucherViewAllOfBuy](docs/Model/VoucherViewAllOfBuy.md)
- [VoucherViewAllOfConfirmationPasswordInput](docs/Model/VoucherViewAllOfConfirmationPasswordInput.md)
- [VoucherViewAllOfPhoneConfiguration](docs/Model/VoucherViewAllOfPhoneConfiguration.md)
- [VoucherViewAllOfPinInput](docs/Model/VoucherViewAllOfPinInput.md)
- [VoucherViewAllOfRedeem](docs/Model/VoucherViewAllOfRedeem.md)
- [VoucherViewAllOfRefund](docs/Model/VoucherViewAllOfRefund.md)
- [VoucherViewAllOfSingleRedeem](docs/Model/VoucherViewAllOfSingleRedeem.md)
- [VouchersPermissions](docs/Model/VouchersPermissions.md)
- [VouchersQueryFilters](docs/Model/VouchersQueryFilters.md)
- [WebshopAd](docs/Model/WebshopAd.md)
- [WebshopSettings](docs/Model/WebshopSettings.md)
- [WebshopSettingsDetailed](docs/Model/WebshopSettingsDetailed.md)
- [WebshopSettingsView](docs/Model/WebshopSettingsView.md)
- [WeekDayEnum](docs/Model/WeekDayEnum.md)
- [Wizard](docs/Model/Wizard.md)
- [WizardActionEnum](docs/Model/WizardActionEnum.md)
- [WizardAllOfAdminMenu](docs/Model/WizardAllOfAdminMenu.md)
- [WizardAllOfUserMenu](docs/Model/WizardAllOfUserMenu.md)
- [WizardAllOfUserProfileSection](docs/Model/WizardAllOfUserProfileSection.md)
- [WizardExecutionData](docs/Model/WizardExecutionData.md)
- [WizardKind](docs/Model/WizardKind.md)
- [WizardPermissions](docs/Model/WizardPermissions.md)
- [WizardResultTypeEnum](docs/Model/WizardResultTypeEnum.md)
- [WizardStep](docs/Model/WizardStep.md)
- [WizardStepDetailed](docs/Model/WizardStepDetailed.md)
- [WizardStepDetailedAllOfDataForNew](docs/Model/WizardStepDetailedAllOfDataForNew.md)
- [WizardStepField](docs/Model/WizardStepField.md)
- [WizardStepFieldKind](docs/Model/WizardStepFieldKind.md)
- [WizardStepKind](docs/Model/WizardStepKind.md)
- [WizardStepTransition](docs/Model/WizardStepTransition.md)
- [WizardTransitionParams](docs/Model/WizardTransitionParams.md)
- [WizardVerificationCodeParams](docs/Model/WizardVerificationCodeParams.md)
- [WizardsPermissions](docs/Model/WizardsPermissions.md)

## Authorization

Authentication schemes defined for the API:
### basic

- **Type**: HTTP basic authentication

### session

- **Type**: API key
- **API key parameter name**: Session-Token
- **Location**: HTTP header


### accessClient

- **Type**: API key
- **API key parameter name**: Access-Client-Token
- **Location**: HTTP header


### oidc

## Tests

To run the tests, use:

```bash
composer install
vendor/bin/phpunit
```

## Author



## About this package

This PHP package is automatically generated by the [OpenAPI Generator](https://openapi-generator.tech) project:

- API version: `4.16.3`
- Build package: `org.openapitools.codegen.languages.PhpClientCodegen`
