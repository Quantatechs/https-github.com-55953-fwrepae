<?php
/**
 * DeviceConfirmationTypeEnumTest
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
 * Please update the test case below to test the model.
 */

namespace OpenAPI\Client\Test\Model;

use PHPUnit\Framework\TestCase;

/**
 * DeviceConfirmationTypeEnumTest Class Doc Comment
 *
 * @category    Class
 * @description Contains all possible device confirmation types. Possible values are: - &#x60;acceptOrder&#x60;: A confirmation for accepting a pending order as buyer - &#x60;approveTicket&#x60;: A confirmation for approving a pending ticket as payer - &#x60;buyVouchers&#x60;: A confirmation for buying vouchers - &#x60;changeAccountLimits&#x60;: A confirmation for change the account limits of a user account - &#x60;chargeback&#x60;: A confirmation for transfer chargeback - &#x60;clientAction&#x60;: A confirmation for an action over an access client - &#x60;editProfile&#x60;: A confirmation for editing the profile of his own - &#x60;generatePassword&#x60;: A confirmation for generating a new password - &#x60;generateVouchers&#x60;: A confirmation for generating vouchers - &#x60;importPayments&#x60;: A confirmation for importin payments as admin - &#x60;importUserPayments&#x60;: A confirmation for batch payments as user - &#x60;importUserSendVouchers&#x60;: A confirmation for batch vouchers sending as user - &#x60;manageAddress&#x60;: A confirmation for managing an user address of his own - &#x60;manageAuthorization&#x60;: A confirmation for managing a pending payment authorization - &#x60;manageContactInfo&#x60;: A confirmation for managing a public contact information of his own - &#x60;manageDevice&#x60;: A confirmation for managing a trusted device - &#x60;manageExternalPayment&#x60;: A confirmation for managing an external payment - &#x60;manageFailedOccurrence&#x60;: A confirmation for managing a recurring payment failed occurrence - &#x60;manageInstallment&#x60;: A confirmation for managing a scheduled payment installment - &#x60;managePaymentRequest&#x60;: A confirmation for managing a payment request - &#x60;managePhone&#x60;: A confirmation for managing a phone of his own - &#x60;manageRecord&#x60;: A confirmation for managing a record if the record type requires confirmation - &#x60;manageRecurringPayment&#x60;: A confirmation for managing a recurring payment - &#x60;manageScheduledPayment&#x60;: A confirmation for managing a scheduled payment - &#x60;manageVoucher&#x60;: A confirmation for managing a voucher - &#x60;performExternalPayment&#x60;: A confirmation for performing an external payment - &#x60;performPayment&#x60;: A confirmation for performing a payment - &#x60;personalizeNfc&#x60;: A confirmation for personalizing a NFC tag - &#x60;removeTotpSecret&#x60;: A confirmation for removing an authenticator app secret - &#x60;runOperation&#x60;: A confirmation for running a custom operation - &#x60;runWizard&#x60;: A confirmation for running a custom wizard - &#x60;secondaryLogin&#x60;: A confirmation for the secondary login - &#x60;sendVoucher&#x60;: A confirmation for sending a voucher - &#x60;shoppingCartCheckout&#x60;: A confirmation for the cart checkout - &#x60;topUpVoucher&#x60;: A confirmation for a voucher top-up
 * @package     OpenAPI\Client
 * @author      OpenAPI Generator team
 * @link        https://openapi-generator.tech
 */
class DeviceConfirmationTypeEnumTest extends TestCase
{

    /**
     * Setup before running any test case
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp(): void
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown(): void
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * Test "DeviceConfirmationTypeEnum"
     */
    public function testDeviceConfirmationTypeEnum()
    {
        // TODO: implement
        $this->markTestIncomplete('Not implemented');
    }
}
