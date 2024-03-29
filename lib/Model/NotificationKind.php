<?php
/**
 * NotificationKind
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
use \OpenAPI\Client\ObjectSerializer;

/**
 * NotificationKind Class Doc Comment
 *
 * @category Class
 * @description Use NotificationTypeEnum instead.   Indicates a kind of notification. Possible values are: - &#x60;accountAllNonSmsPerformedPayments&#x60;: A payment was performed - &#x60;accountAuthorizedPaymentCanceled&#x60;: The authorization process of a payment was canceled - &#x60;accountAuthorizedPaymentDenied&#x60;: A payment pending authorization was denied - &#x60;accountAuthorizedPaymentExpired&#x60;: The authorization process of a payment has expired - &#x60;accountAuthorizedPaymentSucceeded&#x60;: A payment pending authorization was processed - &#x60;accountBoughtVouchersAboutToExpire&#x60;: Deprecated: Voucher notifications are no longer only for bought. . One or more bought vouchers are about to expire - &#x60;accountBoughtVouchersExpirationDateChanged&#x60;: Deprecated: Voucher notifications are no longer only for bought.. The expiration date of a bought voucher was changed - &#x60;accountBoughtVouchersExpired&#x60;: Deprecated: Voucher notifications are no longer only for bought.. One or more bought vouchers have expired - &#x60;accountExternalPaymentExpired&#x60;: A performed external payment has expired - &#x60;accountExternalPaymentPerformedFailed&#x60;: A performed external payment has failed - &#x60;accountExternalPaymentReceivedFailed&#x60;: A received external payment has failed - &#x60;accountIncomingRecurringPaymentCanceled&#x60;: An incoming recurring payment was canceled - &#x60;accountIncomingRecurringPaymentFailed&#x60;: An incoming recurring payment processing has failed - &#x60;accountIncomingRecurringPaymentReceived&#x60;: A recurring payment was received - &#x60;accountIncomingScheduledPaymentCanceled&#x60;: An incoming scheduled payment processing has canceled - &#x60;accountIncomingScheduledPaymentFailed&#x60;: An incoming scheduled payment processing has failed - &#x60;accountIncomingScheduledPaymentReceived&#x60;: A scheduled payment was received - &#x60;accountLimitChange&#x60;: The account balance limit was changed by the administration - &#x60;accountOperatorAuthorizedPaymentApprovedStillPending&#x60;: A payment performed by an operator was approved, but still needs administration authorization - &#x60;accountOperatorAuthorizedPaymentCanceled&#x60;: A payment performed by an operator had the authorization process canceled - &#x60;accountOperatorAuthorizedPaymentDenied&#x60;: A payment performed by an operator was denied - &#x60;accountOperatorAuthorizedPaymentExpired&#x60;: A payment performed by an operator had the authorization process expired - &#x60;accountOperatorAuthorizedPaymentSucceeded&#x60;: A payment performed by an operator was processed - &#x60;accountOperatorPaymentAwaitingAuthorization&#x60;: A payment performed by an operator needs my authorization - &#x60;accountPaymentAwaitingAuthorization&#x60;: A payment is awaiting my authorization - &#x60;accountPaymentReceived&#x60;: A payment was received - &#x60;accountPaymentRequestCanceled&#x60;: A sent payment request was canceled - &#x60;accountPaymentRequestDenied&#x60;: A sent payment request was denied - &#x60;accountPaymentRequestExpirationDateChanged&#x60;: An incoming payment request had its expiration date changed - &#x60;accountPaymentRequestExpired&#x60;: A sent payment request has expired - &#x60;accountPaymentRequestProcessed&#x60;: A sent payment request was processed - &#x60;accountPaymentRequestReceived&#x60;: A payment was requested - &#x60;accountRecurringPaymentFailed&#x60;: The processing of a recurring payment has failed - &#x60;accountRecurringPaymentOccurrenceProcessed&#x60;: A recurring payment processing was processed - &#x60;accountScheduledPaymentFailed&#x60;: The processing of a scheduled payment has failed - &#x60;accountScheduledPaymentInstallmentProcessed&#x60;: A scheduled payment was processed - &#x60;accountScheduledPaymentRequestFailed&#x60;: A scheduled payment request has failed and was reopened - &#x60;accountSentPaymentRequestExpirationDateChanged&#x60;: A sent payment request had its expiration date changed - &#x60;accountSmsPerformedPayment&#x60;: A payment was performed by SMS - &#x60;accountTicketWebhookFailed&#x60;: The webhook processing for a ticket has failed - &#x60;accountVoucherAboutToExpire&#x60;: A voucher is about to expire - &#x60;accountVoucherAssigned&#x60;: A voucher was assigned - &#x60;accountVoucherExpirationDateChanged&#x60;: The expiration date of a voucher was changed - &#x60;accountVoucherExpired&#x60;: A voucher has expired - &#x60;accountVoucherPinBlocked&#x60;: The voucher PIN was blocked by exceeding invalid attempts - &#x60;accountVoucherRedeem&#x60;: A voucher was redeemed - &#x60;accountVoucherTopUp&#x60;: A voucher was topped-up - &#x60;adminAdPendingAuthorization&#x60;: A new advertisement was created, and it is pending administrator authorization - &#x60;adminApplicationError&#x60;: A new application error was generated - &#x60;adminExternalPaymentExpired&#x60;: An external payment has expired without the destination user being registered - &#x60;adminExternalPaymentPerformedFailed&#x60;: An external payment has failed processing - &#x60;adminGeneratedVouchersAboutToExpire&#x60;: One or more generated vouchers are about to expire - &#x60;adminGeneratedVouchersExpired&#x60;: One or more generated vouchers have expired - &#x60;adminNetworkCreated&#x60;: A new network has been created - &#x60;adminPaymentAwaitingAuthorization&#x60;: A payment is awaiting the administrator authorization - &#x60;adminPaymentPerformed&#x60;: A payment was performed - &#x60;adminSystemAlert&#x60;: A new system alert was generated - &#x60;adminUserAlert&#x60;: A new user alert was generated - &#x60;adminUserImportRegistration&#x60;: An import of users has finished processing - &#x60;adminUserRegistration&#x60;: A new user has been registered - &#x60;adminVoucherBuyingAboutToExpire&#x60;: Buying in a voucher type is about to expire - &#x60;brokeringAdPendingAuthorization&#x60;: A new advertisement from an assigned member needs authorization - &#x60;brokeringMemberAssigned&#x60;: A new member was unassigned from me as broker - &#x60;brokeringMemberUnassigned&#x60;: A new member was assigned to me as broker - &#x60;buyerAdInterestNotification&#x60;: A new advertisement was published, matching one of my advertisement interests - &#x60;buyerAdQuestionAnswered&#x60;: An advertisement question I&#39;ve asked was answered - &#x60;buyerOrderCanceled&#x60;: A web-shop order was canceled - &#x60;buyerOrderPaymentCanceled&#x60;: The payment for a web-shop purchase had the authorization process canceled - &#x60;buyerOrderPaymentDenied&#x60;: The payment for a web-shop purchase was denied authorization - &#x60;buyerOrderPaymentExpired&#x60;: The payment for a web-shop purchase was expired without being authorized - &#x60;buyerOrderPending&#x60;: A web-shop order is pending my approval - &#x60;buyerOrderPendingAuthorization&#x60;: A web-shop order is pending authorization - &#x60;buyerOrderPendingDeliveryData&#x60;: A web-shop order needs me to fill its delivery information - &#x60;buyerOrderProcessedBySeller&#x60;: A web-shop order was processed by the seller - &#x60;buyerOrderRejectedBySeller&#x60;: A web-shop order was rejected by the seller - &#x60;buyerSalePending&#x60;: A web-shop order is pending seller&#39;s approval - &#x60;buyerSaleRejectedBySeller&#x60;: A web-shop sale order was rejected by the seller - &#x60;feedbackChanged&#x60;: A feedback for a sale was changed - &#x60;feedbackCreated&#x60;: A feedback for a sale was created - &#x60;feedbackExpirationReminder&#x60;: Reminder to supply feedback for a purchase - &#x60;feedbackOptional&#x60;: I can optionally supply feedback for a purchase - &#x60;feedbackReplyCreated&#x60;: A feedback for a purchase was replied - &#x60;feedbackRequired&#x60;: I have to supply feedback for a purchase - &#x60;personalBrokerAssigned&#x60;: A broker was assigned to the user - &#x60;personalBrokerUnassigned&#x60;: A broker was unassigned from the user - &#x60;personalMaxSmsPerMonthReached&#x60;: The user has reached the maximum number of monthly SMS messages - &#x60;personalNewToken&#x60;: A new token (card) was assigned - &#x60;personalNewTokenPendingActivation&#x60;: a new token (card) is pending activation - &#x60;personalPasswordStatusChanged&#x60;: The status of a password has changed - &#x60;personalTokenStatusChanged&#x60;: The status of a token has changed - &#x60;personalUserStatusChanged&#x60;: The user status has changed - &#x60;referenceChanged&#x60;: A personal reference was changed - &#x60;referenceCreated&#x60;: A new personal reference was created - &#x60;sellerAdAuthorized&#x60;: An advertisement was authorized by the administration - &#x60;sellerAdExpired&#x60;: An advertisement publication period has expired - &#x60;sellerAdLowStock&#x60;: A web-shop advertisement&#39;s stock quantity is low - &#x60;sellerAdOutOfStock&#x60;: A given web-shop advertisement is out of stock - &#x60;sellerAdQuestionCreated&#x60;: A question to an advertisement was created - &#x60;sellerAdRejected&#x60;: An advertisement was rejected by the administration - &#x60;sellerOrderCanceled&#x60;: A web-shop order was canceled - &#x60;sellerOrderCreated&#x60;: A web-shop order was created - &#x60;sellerOrderPaymentCanceled&#x60;: The payment for a web-shop order had the authorization process canceled - &#x60;sellerOrderPaymentDenied&#x60;: The payment for a web-shop order was denied authorization - &#x60;sellerOrderPaymentExpired&#x60;: The payment for a web-shop order was expired without being authorized - &#x60;sellerOrderPendingAuthorization&#x60;: A web-shop order is pending authorization - &#x60;sellerOrderPendingDeliveryData&#x60;: A web-shop order is pending delivery information - &#x60;sellerOrderProcessedByBuyer&#x60;: A web-shop order was fulfilled by the buyer - &#x60;sellerOrderRejectedByBuyer&#x60;: A web-shop order was rejected by the buyer - &#x60;sellerSaleProcessedByBuyer&#x60;: A web-shop sale order was fulfilled by the buyer
 * @package  OpenAPI\Client
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class NotificationKind
{
    /**
     * Possible values of this enum
     */
    public const ACCOUNT_ALL_NON_SMS_PERFORMED_PAYMENTS = 'accountAllNonSmsPerformedPayments';

    public const ACCOUNT_AUTHORIZED_PAYMENT_CANCELED = 'accountAuthorizedPaymentCanceled';

    public const ACCOUNT_AUTHORIZED_PAYMENT_DENIED = 'accountAuthorizedPaymentDenied';

    public const ACCOUNT_AUTHORIZED_PAYMENT_EXPIRED = 'accountAuthorizedPaymentExpired';

    public const ACCOUNT_AUTHORIZED_PAYMENT_SUCCEEDED = 'accountAuthorizedPaymentSucceeded';

    public const ACCOUNT_BOUGHT_VOUCHERS_ABOUT_TO_EXPIRE = 'accountBoughtVouchersAboutToExpire';

    public const ACCOUNT_BOUGHT_VOUCHERS_EXPIRATION_DATE_CHANGED = 'accountBoughtVouchersExpirationDateChanged';

    public const ACCOUNT_BOUGHT_VOUCHERS_EXPIRED = 'accountBoughtVouchersExpired';

    public const ACCOUNT_EXTERNAL_PAYMENT_EXPIRED = 'accountExternalPaymentExpired';

    public const ACCOUNT_EXTERNAL_PAYMENT_PERFORMED_FAILED = 'accountExternalPaymentPerformedFailed';

    public const ACCOUNT_EXTERNAL_PAYMENT_RECEIVED_FAILED = 'accountExternalPaymentReceivedFailed';

    public const ACCOUNT_INCOMING_RECURRING_PAYMENT_CANCELED = 'accountIncomingRecurringPaymentCanceled';

    public const ACCOUNT_INCOMING_RECURRING_PAYMENT_FAILED = 'accountIncomingRecurringPaymentFailed';

    public const ACCOUNT_INCOMING_RECURRING_PAYMENT_RECEIVED = 'accountIncomingRecurringPaymentReceived';

    public const ACCOUNT_INCOMING_SCHEDULED_PAYMENT_CANCELED = 'accountIncomingScheduledPaymentCanceled';

    public const ACCOUNT_INCOMING_SCHEDULED_PAYMENT_FAILED = 'accountIncomingScheduledPaymentFailed';

    public const ACCOUNT_INCOMING_SCHEDULED_PAYMENT_RECEIVED = 'accountIncomingScheduledPaymentReceived';

    public const ACCOUNT_LIMIT_CHANGE = 'accountLimitChange';

    public const ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_APPROVED_STILL_PENDING = 'accountOperatorAuthorizedPaymentApprovedStillPending';

    public const ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_CANCELED = 'accountOperatorAuthorizedPaymentCanceled';

    public const ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_DENIED = 'accountOperatorAuthorizedPaymentDenied';

    public const ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_EXPIRED = 'accountOperatorAuthorizedPaymentExpired';

    public const ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_SUCCEEDED = 'accountOperatorAuthorizedPaymentSucceeded';

    public const ACCOUNT_OPERATOR_PAYMENT_AWAITING_AUTHORIZATION = 'accountOperatorPaymentAwaitingAuthorization';

    public const ACCOUNT_PAYMENT_AWAITING_AUTHORIZATION = 'accountPaymentAwaitingAuthorization';

    public const ACCOUNT_PAYMENT_RECEIVED = 'accountPaymentReceived';

    public const ACCOUNT_PAYMENT_REQUEST_CANCELED = 'accountPaymentRequestCanceled';

    public const ACCOUNT_PAYMENT_REQUEST_DENIED = 'accountPaymentRequestDenied';

    public const ACCOUNT_PAYMENT_REQUEST_EXPIRATION_DATE_CHANGED = 'accountPaymentRequestExpirationDateChanged';

    public const ACCOUNT_PAYMENT_REQUEST_EXPIRED = 'accountPaymentRequestExpired';

    public const ACCOUNT_PAYMENT_REQUEST_PROCESSED = 'accountPaymentRequestProcessed';

    public const ACCOUNT_PAYMENT_REQUEST_RECEIVED = 'accountPaymentRequestReceived';

    public const ACCOUNT_RECURRING_PAYMENT_FAILED = 'accountRecurringPaymentFailed';

    public const ACCOUNT_RECURRING_PAYMENT_OCCURRENCE_PROCESSED = 'accountRecurringPaymentOccurrenceProcessed';

    public const ACCOUNT_SCHEDULED_PAYMENT_FAILED = 'accountScheduledPaymentFailed';

    public const ACCOUNT_SCHEDULED_PAYMENT_INSTALLMENT_PROCESSED = 'accountScheduledPaymentInstallmentProcessed';

    public const ACCOUNT_SCHEDULED_PAYMENT_REQUEST_FAILED = 'accountScheduledPaymentRequestFailed';

    public const ACCOUNT_SENT_PAYMENT_REQUEST_EXPIRATION_DATE_CHANGED = 'accountSentPaymentRequestExpirationDateChanged';

    public const ACCOUNT_SMS_PERFORMED_PAYMENT = 'accountSmsPerformedPayment';

    public const ACCOUNT_TICKET_WEBHOOK_FAILED = 'accountTicketWebhookFailed';

    public const ACCOUNT_VOUCHER_ABOUT_TO_EXPIRE = 'accountVoucherAboutToExpire';

    public const ACCOUNT_VOUCHER_ASSIGNED = 'accountVoucherAssigned';

    public const ACCOUNT_VOUCHER_EXPIRATION_DATE_CHANGED = 'accountVoucherExpirationDateChanged';

    public const ACCOUNT_VOUCHER_EXPIRED = 'accountVoucherExpired';

    public const ACCOUNT_VOUCHER_PIN_BLOCKED = 'accountVoucherPinBlocked';

    public const ACCOUNT_VOUCHER_REDEEM = 'accountVoucherRedeem';

    public const ACCOUNT_VOUCHER_TOP_UP = 'accountVoucherTopUp';

    public const ADMIN_AD_PENDING_AUTHORIZATION = 'adminAdPendingAuthorization';

    public const ADMIN_APPLICATION_ERROR = 'adminApplicationError';

    public const ADMIN_EXTERNAL_PAYMENT_EXPIRED = 'adminExternalPaymentExpired';

    public const ADMIN_EXTERNAL_PAYMENT_PERFORMED_FAILED = 'adminExternalPaymentPerformedFailed';

    public const ADMIN_GENERATED_VOUCHERS_ABOUT_TO_EXPIRE = 'adminGeneratedVouchersAboutToExpire';

    public const ADMIN_GENERATED_VOUCHERS_EXPIRED = 'adminGeneratedVouchersExpired';

    public const ADMIN_NETWORK_CREATED = 'adminNetworkCreated';

    public const ADMIN_PAYMENT_AWAITING_AUTHORIZATION = 'adminPaymentAwaitingAuthorization';

    public const ADMIN_PAYMENT_PERFORMED = 'adminPaymentPerformed';

    public const ADMIN_SYSTEM_ALERT = 'adminSystemAlert';

    public const ADMIN_USER_ALERT = 'adminUserAlert';

    public const ADMIN_USER_IMPORT_REGISTRATION = 'adminUserImportRegistration';

    public const ADMIN_USER_REGISTRATION = 'adminUserRegistration';

    public const ADMIN_VOUCHER_BUYING_ABOUT_TO_EXPIRE = 'adminVoucherBuyingAboutToExpire';

    public const BROKERING_AD_PENDING_AUTHORIZATION = 'brokeringAdPendingAuthorization';

    public const BROKERING_MEMBER_ASSIGNED = 'brokeringMemberAssigned';

    public const BROKERING_MEMBER_UNASSIGNED = 'brokeringMemberUnassigned';

    public const BUYER_AD_INTEREST_NOTIFICATION = 'buyerAdInterestNotification';

    public const BUYER_AD_QUESTION_ANSWERED = 'buyerAdQuestionAnswered';

    public const BUYER_ORDER_CANCELED = 'buyerOrderCanceled';

    public const BUYER_ORDER_PAYMENT_CANCELED = 'buyerOrderPaymentCanceled';

    public const BUYER_ORDER_PAYMENT_DENIED = 'buyerOrderPaymentDenied';

    public const BUYER_ORDER_PAYMENT_EXPIRED = 'buyerOrderPaymentExpired';

    public const BUYER_ORDER_PENDING = 'buyerOrderPending';

    public const BUYER_ORDER_PENDING_AUTHORIZATION = 'buyerOrderPendingAuthorization';

    public const BUYER_ORDER_PENDING_DELIVERY_DATA = 'buyerOrderPendingDeliveryData';

    public const BUYER_ORDER_PROCESSED_BY_SELLER = 'buyerOrderProcessedBySeller';

    public const BUYER_ORDER_REJECTED_BY_SELLER = 'buyerOrderRejectedBySeller';

    public const BUYER_SALE_PENDING = 'buyerSalePending';

    public const BUYER_SALE_REJECTED_BY_SELLER = 'buyerSaleRejectedBySeller';

    public const FEEDBACK_CHANGED = 'feedbackChanged';

    public const FEEDBACK_CREATED = 'feedbackCreated';

    public const FEEDBACK_EXPIRATION_REMINDER = 'feedbackExpirationReminder';

    public const FEEDBACK_OPTIONAL = 'feedbackOptional';

    public const FEEDBACK_REPLY_CREATED = 'feedbackReplyCreated';

    public const FEEDBACK_REQUIRED = 'feedbackRequired';

    public const PERSONAL_BROKER_ASSIGNED = 'personalBrokerAssigned';

    public const PERSONAL_BROKER_UNASSIGNED = 'personalBrokerUnassigned';

    public const PERSONAL_MAX_SMS_PER_MONTH_REACHED = 'personalMaxSmsPerMonthReached';

    public const PERSONAL_NEW_TOKEN = 'personalNewToken';

    public const PERSONAL_NEW_TOKEN_PENDING_ACTIVATION = 'personalNewTokenPendingActivation';

    public const PERSONAL_PASSWORD_STATUS_CHANGED = 'personalPasswordStatusChanged';

    public const PERSONAL_TOKEN_STATUS_CHANGED = 'personalTokenStatusChanged';

    public const PERSONAL_USER_STATUS_CHANGED = 'personalUserStatusChanged';

    public const REFERENCE_CHANGED = 'referenceChanged';

    public const REFERENCE_CREATED = 'referenceCreated';

    public const SELLER_AD_AUTHORIZED = 'sellerAdAuthorized';

    public const SELLER_AD_EXPIRED = 'sellerAdExpired';

    public const SELLER_AD_LOW_STOCK = 'sellerAdLowStock';

    public const SELLER_AD_OUT_OF_STOCK = 'sellerAdOutOfStock';

    public const SELLER_AD_QUESTION_CREATED = 'sellerAdQuestionCreated';

    public const SELLER_AD_REJECTED = 'sellerAdRejected';

    public const SELLER_ORDER_CANCELED = 'sellerOrderCanceled';

    public const SELLER_ORDER_CREATED = 'sellerOrderCreated';

    public const SELLER_ORDER_PAYMENT_CANCELED = 'sellerOrderPaymentCanceled';

    public const SELLER_ORDER_PAYMENT_DENIED = 'sellerOrderPaymentDenied';

    public const SELLER_ORDER_PAYMENT_EXPIRED = 'sellerOrderPaymentExpired';

    public const SELLER_ORDER_PENDING_AUTHORIZATION = 'sellerOrderPendingAuthorization';

    public const SELLER_ORDER_PENDING_DELIVERY_DATA = 'sellerOrderPendingDeliveryData';

    public const SELLER_ORDER_PROCESSED_BY_BUYER = 'sellerOrderProcessedByBuyer';

    public const SELLER_ORDER_REJECTED_BY_BUYER = 'sellerOrderRejectedByBuyer';

    public const SELLER_SALE_PROCESSED_BY_BUYER = 'sellerSaleProcessedByBuyer';

    /**
     * Gets allowable values of the enum
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ACCOUNT_ALL_NON_SMS_PERFORMED_PAYMENTS,
            self::ACCOUNT_AUTHORIZED_PAYMENT_CANCELED,
            self::ACCOUNT_AUTHORIZED_PAYMENT_DENIED,
            self::ACCOUNT_AUTHORIZED_PAYMENT_EXPIRED,
            self::ACCOUNT_AUTHORIZED_PAYMENT_SUCCEEDED,
            self::ACCOUNT_BOUGHT_VOUCHERS_ABOUT_TO_EXPIRE,
            self::ACCOUNT_BOUGHT_VOUCHERS_EXPIRATION_DATE_CHANGED,
            self::ACCOUNT_BOUGHT_VOUCHERS_EXPIRED,
            self::ACCOUNT_EXTERNAL_PAYMENT_EXPIRED,
            self::ACCOUNT_EXTERNAL_PAYMENT_PERFORMED_FAILED,
            self::ACCOUNT_EXTERNAL_PAYMENT_RECEIVED_FAILED,
            self::ACCOUNT_INCOMING_RECURRING_PAYMENT_CANCELED,
            self::ACCOUNT_INCOMING_RECURRING_PAYMENT_FAILED,
            self::ACCOUNT_INCOMING_RECURRING_PAYMENT_RECEIVED,
            self::ACCOUNT_INCOMING_SCHEDULED_PAYMENT_CANCELED,
            self::ACCOUNT_INCOMING_SCHEDULED_PAYMENT_FAILED,
            self::ACCOUNT_INCOMING_SCHEDULED_PAYMENT_RECEIVED,
            self::ACCOUNT_LIMIT_CHANGE,
            self::ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_APPROVED_STILL_PENDING,
            self::ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_CANCELED,
            self::ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_DENIED,
            self::ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_EXPIRED,
            self::ACCOUNT_OPERATOR_AUTHORIZED_PAYMENT_SUCCEEDED,
            self::ACCOUNT_OPERATOR_PAYMENT_AWAITING_AUTHORIZATION,
            self::ACCOUNT_PAYMENT_AWAITING_AUTHORIZATION,
            self::ACCOUNT_PAYMENT_RECEIVED,
            self::ACCOUNT_PAYMENT_REQUEST_CANCELED,
            self::ACCOUNT_PAYMENT_REQUEST_DENIED,
            self::ACCOUNT_PAYMENT_REQUEST_EXPIRATION_DATE_CHANGED,
            self::ACCOUNT_PAYMENT_REQUEST_EXPIRED,
            self::ACCOUNT_PAYMENT_REQUEST_PROCESSED,
            self::ACCOUNT_PAYMENT_REQUEST_RECEIVED,
            self::ACCOUNT_RECURRING_PAYMENT_FAILED,
            self::ACCOUNT_RECURRING_PAYMENT_OCCURRENCE_PROCESSED,
            self::ACCOUNT_SCHEDULED_PAYMENT_FAILED,
            self::ACCOUNT_SCHEDULED_PAYMENT_INSTALLMENT_PROCESSED,
            self::ACCOUNT_SCHEDULED_PAYMENT_REQUEST_FAILED,
            self::ACCOUNT_SENT_PAYMENT_REQUEST_EXPIRATION_DATE_CHANGED,
            self::ACCOUNT_SMS_PERFORMED_PAYMENT,
            self::ACCOUNT_TICKET_WEBHOOK_FAILED,
            self::ACCOUNT_VOUCHER_ABOUT_TO_EXPIRE,
            self::ACCOUNT_VOUCHER_ASSIGNED,
            self::ACCOUNT_VOUCHER_EXPIRATION_DATE_CHANGED,
            self::ACCOUNT_VOUCHER_EXPIRED,
            self::ACCOUNT_VOUCHER_PIN_BLOCKED,
            self::ACCOUNT_VOUCHER_REDEEM,
            self::ACCOUNT_VOUCHER_TOP_UP,
            self::ADMIN_AD_PENDING_AUTHORIZATION,
            self::ADMIN_APPLICATION_ERROR,
            self::ADMIN_EXTERNAL_PAYMENT_EXPIRED,
            self::ADMIN_EXTERNAL_PAYMENT_PERFORMED_FAILED,
            self::ADMIN_GENERATED_VOUCHERS_ABOUT_TO_EXPIRE,
            self::ADMIN_GENERATED_VOUCHERS_EXPIRED,
            self::ADMIN_NETWORK_CREATED,
            self::ADMIN_PAYMENT_AWAITING_AUTHORIZATION,
            self::ADMIN_PAYMENT_PERFORMED,
            self::ADMIN_SYSTEM_ALERT,
            self::ADMIN_USER_ALERT,
            self::ADMIN_USER_IMPORT_REGISTRATION,
            self::ADMIN_USER_REGISTRATION,
            self::ADMIN_VOUCHER_BUYING_ABOUT_TO_EXPIRE,
            self::BROKERING_AD_PENDING_AUTHORIZATION,
            self::BROKERING_MEMBER_ASSIGNED,
            self::BROKERING_MEMBER_UNASSIGNED,
            self::BUYER_AD_INTEREST_NOTIFICATION,
            self::BUYER_AD_QUESTION_ANSWERED,
            self::BUYER_ORDER_CANCELED,
            self::BUYER_ORDER_PAYMENT_CANCELED,
            self::BUYER_ORDER_PAYMENT_DENIED,
            self::BUYER_ORDER_PAYMENT_EXPIRED,
            self::BUYER_ORDER_PENDING,
            self::BUYER_ORDER_PENDING_AUTHORIZATION,
            self::BUYER_ORDER_PENDING_DELIVERY_DATA,
            self::BUYER_ORDER_PROCESSED_BY_SELLER,
            self::BUYER_ORDER_REJECTED_BY_SELLER,
            self::BUYER_SALE_PENDING,
            self::BUYER_SALE_REJECTED_BY_SELLER,
            self::FEEDBACK_CHANGED,
            self::FEEDBACK_CREATED,
            self::FEEDBACK_EXPIRATION_REMINDER,
            self::FEEDBACK_OPTIONAL,
            self::FEEDBACK_REPLY_CREATED,
            self::FEEDBACK_REQUIRED,
            self::PERSONAL_BROKER_ASSIGNED,
            self::PERSONAL_BROKER_UNASSIGNED,
            self::PERSONAL_MAX_SMS_PER_MONTH_REACHED,
            self::PERSONAL_NEW_TOKEN,
            self::PERSONAL_NEW_TOKEN_PENDING_ACTIVATION,
            self::PERSONAL_PASSWORD_STATUS_CHANGED,
            self::PERSONAL_TOKEN_STATUS_CHANGED,
            self::PERSONAL_USER_STATUS_CHANGED,
            self::REFERENCE_CHANGED,
            self::REFERENCE_CREATED,
            self::SELLER_AD_AUTHORIZED,
            self::SELLER_AD_EXPIRED,
            self::SELLER_AD_LOW_STOCK,
            self::SELLER_AD_OUT_OF_STOCK,
            self::SELLER_AD_QUESTION_CREATED,
            self::SELLER_AD_REJECTED,
            self::SELLER_ORDER_CANCELED,
            self::SELLER_ORDER_CREATED,
            self::SELLER_ORDER_PAYMENT_CANCELED,
            self::SELLER_ORDER_PAYMENT_DENIED,
            self::SELLER_ORDER_PAYMENT_EXPIRED,
            self::SELLER_ORDER_PENDING_AUTHORIZATION,
            self::SELLER_ORDER_PENDING_DELIVERY_DATA,
            self::SELLER_ORDER_PROCESSED_BY_BUYER,
            self::SELLER_ORDER_REJECTED_BY_BUYER,
            self::SELLER_SALE_PROCESSED_BY_BUYER
        ];
    }
}


