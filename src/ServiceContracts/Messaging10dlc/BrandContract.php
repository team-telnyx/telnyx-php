<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Brand\AltBusinessIDType;
use Telnyx\Messaging10dlc\Brand\BrandGetFeedbackResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetSMSOtpByReferenceResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetSMSOtpStatusResponse;
use Telnyx\Messaging10dlc\Brand\BrandIdentityStatus;
use Telnyx\Messaging10dlc\Brand\BrandListParams\Sort;
use Telnyx\Messaging10dlc\Brand\BrandListResponse;
use Telnyx\Messaging10dlc\Brand\BrandTriggerSMSOtpResponse;
use Telnyx\Messaging10dlc\Brand\EntityType;
use Telnyx\Messaging10dlc\Brand\StockExchange;
use Telnyx\Messaging10dlc\Brand\TelnyxBrand;
use Telnyx\Messaging10dlc\Brand\Vertical;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface BrandContract
{
    /**
     * @api
     *
     * @param string $country ISO2 2 characters country code. Example: US - United States
     * @param string $displayName display name, marketing name, or DBA name of the brand
     * @param string $email valid email address of brand support contact
     * @param EntityType|value-of<EntityType> $entityType Entity type behind the brand. This is the form of business establishment.
     * @param Vertical|value-of<Vertical> $vertical vertical or industry segment of the brand or campaign
     * @param string $businessContactEmail Business contact email.
     *
     * Required if `entityType` is `PUBLIC_PROFIT`. Otherwise, it is recommended to either omit this field or set it to `null`.
     * @param string $city City name
     * @param string $companyName (Required for Non-profit/private/public) Legal company name
     * @param string $ein (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     * @param string $firstName first name of business contact
     * @param string $ipAddress IP address of the browser requesting to create brand identity
     * @param string $lastName last name of business contact
     * @param string $mobilePhone Valid mobile phone number in e.164 international format.
     * @param bool $mock Mock brand for testing purposes. Defaults to false.
     * @param string $phone Valid phone number in e.164 international format.
     * @param string $postalCode Postal codes. Use 5 digit zipcode for United States
     * @param string $state State. Must be 2 letters code for United States.
     * @param StockExchange|value-of<StockExchange> $stockExchange (Required for public company) stock exchange
     * @param string $stockSymbol (Required for public company) stock symbol
     * @param string $street street number and name
     * @param string $webhookFailoverURL webhook failover URL for brand status updates
     * @param string $webhookURL webhook URL for brand status updates
     * @param string $website brand website URL
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $country,
        string $displayName,
        string $email,
        EntityType|string $entityType,
        Vertical|string $vertical,
        ?string $businessContactEmail = null,
        ?string $city = null,
        ?string $companyName = null,
        ?string $ein = null,
        ?string $firstName = null,
        ?string $ipAddress = null,
        bool $isReseller = false,
        ?string $lastName = null,
        ?string $mobilePhone = null,
        bool $mock = false,
        ?string $phone = null,
        ?string $postalCode = null,
        ?string $state = null,
        StockExchange|string|null $stockExchange = null,
        ?string $stockSymbol = null,
        ?string $street = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $website = null,
        RequestOptions|array|null $requestOptions = null,
    ): TelnyxBrand;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BrandGetResponse;

    /**
     * @api
     *
     * @param string $country ISO2 2 characters country code. Example: US - United States
     * @param string $displayName display or marketing name of the brand
     * @param string $email valid email address of brand support contact
     * @param EntityType|value-of<EntityType> $entityType Entity type behind the brand. This is the form of business establishment.
     * @param Vertical|value-of<Vertical> $vertical vertical or industry segment of the brand or campaign
     * @param string $altBusinessID Alternate business identifier such as DUNS, LEI, or GIIN
     * @param AltBusinessIDType|value-of<AltBusinessIDType> $altBusinessIDType an enumeration
     * @param string $businessContactEmail Business contact email.
     *
     * Required if `entityType` will be changed to `PUBLIC_PROFIT`. Otherwise, it is recommended to either omit this field or set it to `null`.
     * @param string $city City name
     * @param string $companyName (Required for Non-profit/private/public) Legal company name
     * @param string $ein (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     * @param string $firstName first name of business contact
     * @param BrandIdentityStatus|value-of<BrandIdentityStatus> $identityStatus The verification status of an active brand
     * @param string $ipAddress IP address of the browser requesting to create brand identity
     * @param string $lastName last name of business contact
     * @param string $phone Valid phone number in e.164 international format.
     * @param string $postalCode Postal codes. Use 5 digit zipcode for United States
     * @param string $state State. Must be 2 letters code for United States.
     * @param StockExchange|value-of<StockExchange> $stockExchange (Required for public company) stock exchange
     * @param string $stockSymbol (Required for public company) stock symbol
     * @param string $street street number and name
     * @param string $webhookFailoverURL webhook failover URL for brand status updates
     * @param string $webhookURL webhook URL for brand status updates
     * @param string $website brand website URL
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $brandID,
        string $country,
        string $displayName,
        string $email,
        EntityType|string $entityType,
        Vertical|string $vertical,
        ?string $altBusinessID = null,
        AltBusinessIDType|string|null $altBusinessIDType = null,
        ?string $businessContactEmail = null,
        ?string $city = null,
        ?string $companyName = null,
        ?string $ein = null,
        ?string $firstName = null,
        BrandIdentityStatus|string|null $identityStatus = null,
        ?string $ipAddress = null,
        ?bool $isReseller = null,
        ?string $lastName = null,
        ?string $phone = null,
        ?string $postalCode = null,
        ?string $state = null,
        StockExchange|string|null $stockExchange = null,
        ?string $stockSymbol = null,
        ?string $street = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $website = null,
        RequestOptions|array|null $requestOptions = null,
    ): TelnyxBrand;

    /**
     * @api
     *
     * @param string $brandID Filter results by the Telnyx Brand id
     * @param int $recordsPerPage number of records per page. maximum of 500
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     * @param string $tcrBrandID Filter results by the TCR Brand id
     * @param RequestOpts|null $requestOptions
     *
     * @return PerPagePaginationV2<BrandListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $brandID = null,
        ?string $country = null,
        ?string $displayName = null,
        ?string $entityType = null,
        int $page = 1,
        int $recordsPerPage = 10,
        Sort|string $sort = '-createdAt',
        ?string $state = null,
        ?string $tcrBrandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PerPagePaginationV2;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getFeedback(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BrandGetFeedbackResponse;

    /**
     * @api
     *
     * @param string $referenceID The reference ID returned when the OTP was initially triggered
     * @param string $brandID Filter by Brand ID for easier lookup in portal applications
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getSMSOtpByReference(
        string $referenceID,
        ?string $brandID = null,
        RequestOptions|array|null $requestOptions = null,
    ): BrandGetSMSOtpByReferenceResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function resend2faEmail(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to query OTP status
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveSMSOtpStatus(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): BrandGetSMSOtpStatusResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function revet(
        string $brandID,
        RequestOptions|array|null $requestOptions = null
    ): TelnyxBrand;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to trigger the OTP
     * @param string $pinSMS SMS message template to send the OTP. Must include `@OTP_PIN@` placeholder which will be replaced with the actual PIN
     * @param string $successSMS SMS message to send upon successful OTP verification
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function triggerSMSOtp(
        string $brandID,
        string $pinSMS,
        string $successSMS,
        RequestOptions|array|null $requestOptions = null,
    ): BrandTriggerSMSOtpResponse;

    /**
     * @api
     *
     * @param string $brandID The Brand ID for which to verify the OTP
     * @param string $otpPin The OTP PIN received via SMS
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function verifySMSOtp(
        string $brandID,
        string $otpPin,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
