<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Brand\AltBusinessIDType;
use Telnyx\Brand\BrandGetFeedbackResponse;
use Telnyx\Brand\BrandGetResponse;
use Telnyx\Brand\BrandIdentityStatus;
use Telnyx\Brand\BrandListParams\Sort;
use Telnyx\Brand\BrandListResponse;
use Telnyx\Brand\EntityType;
use Telnyx\Brand\StockExchange;
use Telnyx\Brand\TelnyxBrand;
use Telnyx\Brand\Vertical;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

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
     * @param bool $isReseller
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
     *
     * @return TelnyxBrand<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $country,
        $displayName,
        $email,
        $entityType,
        $vertical,
        $businessContactEmail = omit,
        $city = omit,
        $companyName = omit,
        $ein = omit,
        $firstName = omit,
        $ipAddress = omit,
        $isReseller = omit,
        $lastName = omit,
        $mobilePhone = omit,
        $mock = omit,
        $phone = omit,
        $postalCode = omit,
        $state = omit,
        $stockExchange = omit,
        $stockSymbol = omit,
        $street = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        $website = omit,
        ?RequestOptions $requestOptions = null,
    ): TelnyxBrand;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TelnyxBrand<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TelnyxBrand;

    /**
     * @api
     *
     * @return BrandGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetResponse;

    /**
     * @api
     *
     * @return BrandGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $brandID,
        mixed $params,
        ?RequestOptions $requestOptions = null
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
     * @param bool $isReseller
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
     *
     * @return TelnyxBrand<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $brandID,
        $country,
        $displayName,
        $email,
        $entityType,
        $vertical,
        $altBusinessID = omit,
        $altBusinessIDType = omit,
        $businessContactEmail = omit,
        $city = omit,
        $companyName = omit,
        $ein = omit,
        $firstName = omit,
        $identityStatus = omit,
        $ipAddress = omit,
        $isReseller = omit,
        $lastName = omit,
        $phone = omit,
        $postalCode = omit,
        $state = omit,
        $stockExchange = omit,
        $stockSymbol = omit,
        $street = omit,
        $webhookFailoverURL = omit,
        $webhookURL = omit,
        $website = omit,
        ?RequestOptions $requestOptions = null,
    ): TelnyxBrand;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TelnyxBrand<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $brandID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TelnyxBrand;

    /**
     * @api
     *
     * @param string $brandID Filter results by the Telnyx Brand id
     * @param string $country
     * @param string $displayName
     * @param string $entityType
     * @param int $page
     * @param int $recordsPerPage number of records per page. maximum of 500
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     * @param string $state
     * @param string $tcrBrandID Filter results by the TCR Brand id
     *
     * @return BrandListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $brandID = omit,
        $country = omit,
        $displayName = omit,
        $entityType = omit,
        $page = omit,
        $recordsPerPage = omit,
        $sort = omit,
        $state = omit,
        $tcrBrandID = omit,
        ?RequestOptions $requestOptions = null,
    ): BrandListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return BrandListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): BrandListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $brandID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @return BrandGetFeedbackResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getFeedback(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetFeedbackResponse;

    /**
     * @api
     *
     * @return BrandGetFeedbackResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function getFeedbackRaw(
        string $brandID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): BrandGetFeedbackResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resend2faEmail(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function resend2faEmailRaw(
        string $brandID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function revet(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function revetRaw(
        string $brandID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
