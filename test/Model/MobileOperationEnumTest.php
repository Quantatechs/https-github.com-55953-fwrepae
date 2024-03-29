<?php
/**
 * MobileOperationEnumTest
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
 * MobileOperationEnumTest Class Doc Comment
 *
 * @category    Class
 * @description The possible operations the mobile application can perform. Possible values are: - &#x60;acceptTicket&#x60;: Accepts a generated QR code for performing a payment - &#x60;activateNfcDevice&#x60;: Activate the phone as NFC device - &#x60;assignPos&#x60;: Assign an access client for POS mode - &#x60;boughtVouchers&#x60;: View bought vouchers - &#x60;buyVoucher&#x60;: Buy a voucher - &#x60;createTicket&#x60;: Generate a QR Code for receive payment - &#x60;deactivateNfcDevice&#x60;: Deactivate the phone as NFC device - &#x60;formatNfc&#x60;: Format NFC tags - &#x60;initializeNfc&#x60;: Initialize NFC tags - &#x60;makeSystemPayment&#x60;: Perform payments to system - &#x60;makeUserPayment&#x60;: Perform payments to other users - &#x60;manageContacts&#x60;: Manage own contacts - &#x60;manageOperators&#x60;: Manage own/user operators - &#x60;managePasswords&#x60;: Manage passwords - &#x60;mapDirectory&#x60;: View the user directory (map) - &#x60;paymentRequests&#x60;: Search and view payment requests - &#x60;personalizeNfc&#x60;: Personalize NFC tags - &#x60;personalizeNfcSelf&#x60;: Personalize NFC tags for the logged user or its operators - &#x60;purchases&#x60;: Search and view purchased webshops - &#x60;readNfc&#x60;: Read NFC tags - &#x60;receivePayment&#x60;: Receive payments from other users - &#x60;redeemVoucher&#x60;: Redeem vouchers - &#x60;registerUsersAsManager&#x60;: Register other users as user manager - &#x60;registerUsersAsMember&#x60;: Register other users as member or operator - &#x60;sendPaymentRequestToSystem&#x60;: Send payment requests to system - &#x60;sendPaymentRequestToUser&#x60;: Send payment requests to users - &#x60;unassignPos&#x60;: Unassign the current access client from POS mode - &#x60;usersSearch&#x60;: Search other users - &#x60;viewAccountInformation&#x60;: View own accounts - &#x60;viewAdvertisements&#x60;: Search and view advertisements and webshop - &#x60;viewRedeemed&#x60;: View redeemed vouchers - &#x60;viewUserProfile&#x60;: View the profile of other users
 * @package     OpenAPI\Client
 * @author      OpenAPI Generator team
 * @link        https://openapi-generator.tech
 */
class MobileOperationEnumTest extends TestCase
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
     * Test "MobileOperationEnum"
     */
    public function testMobileOperationEnum()
    {
        // TODO: implement
        $this->markTestIncomplete('Not implemented');
    }
}
