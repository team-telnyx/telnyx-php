<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Number10dlc;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\Brand\AltBusinessIDType;
use Telnyx\Number10dlc\Brand\BrandGetFeedbackResponse;
use Telnyx\Number10dlc\Brand\BrandGetResponse;
use Telnyx\Number10dlc\Brand\BrandIdentityStatus;
use Telnyx\Number10dlc\Brand\BrandListParams\Sort;
use Telnyx\Number10dlc\Brand\BrandListResponse;
use Telnyx\Number10dlc\Brand\EntityType;
use Telnyx\Number10dlc\Brand\StockExchange;
use Telnyx\Number10dlc\Brand\TelnyxBrand;
use Telnyx\Number10dlc\Brand\Vertical;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;

interface BrandContract
{
    /**
     * @api
     *
     * @param string $country ISO2 2 characters country code. Example: US - United States
     * @param string $displayName display name, marketing name, or DBA name of the brand
     * @param string $email valid email address of brand support contact
     * @param 'PRIVATE_PROFIT'|'PUBLIC_PROFIT'|'NON_PROFIT'|'GOVERNMENT'|EntityType $entityType Entity type behind the brand. This is the form of business establishment.
     * @param 'REAL_ESTATE'|'HEALTHCARE'|'ENERGY'|'ENTERTAINMENT'|'RETAIL'|'AGRICULTURE'|'INSURANCE'|'EDUCATION'|'HOSPITALITY'|'FINANCIAL'|'GAMBLING'|'CONSTRUCTION'|'NGO'|'MANUFACTURING'|'GOVERNMENT'|'TECHNOLOGY'|'COMMUNICATION'|Vertical $vertical vertical or industry segment of the brand or campaign
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
     * @param 'NONE'|'NASDAQ'|'NYSE'|'AMEX'|'AMX'|'ASX'|'B3'|'BME'|'BSE'|'FRA'|'ICEX'|'JPX'|'JSE'|'KRX'|'LON'|'NSE'|'OMX'|'SEHK'|'SSE'|'STO'|'SWX'|'SZSE'|'TSX'|'TWSE'|'VSE'|StockExchange $stockExchange (Required for public company) stock exchange
     * @param string $stockSymbol (Required for public company) stock symbol
     * @param string $street street number and name
     * @param string $webhookFailoverURL webhook failover URL for brand status updates
     * @param string $webhookURL webhook URL for brand status updates
     * @param string $website brand website URL
     *
     * @throws APIException
     */
    public function create(
        string $country,
        string $displayName,
        string $email,
        string|EntityType $entityType,
        string|Vertical $vertical,
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
        string|StockExchange|null $stockExchange = null,
        ?string $stockSymbol = null,
        ?string $street = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $website = null,
        ?RequestOptions $requestOptions = null,
    ): TelnyxBrand;

    /**
     * @api
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
     * @param string $country ISO2 2 characters country code. Example: US - United States
     * @param string $displayName display or marketing name of the brand
     * @param string $email valid email address of brand support contact
     * @param 'PRIVATE_PROFIT'|'PUBLIC_PROFIT'|'NON_PROFIT'|'GOVERNMENT'|EntityType $entityType Entity type behind the brand. This is the form of business establishment.
     * @param 'REAL_ESTATE'|'HEALTHCARE'|'ENERGY'|'ENTERTAINMENT'|'RETAIL'|'AGRICULTURE'|'INSURANCE'|'EDUCATION'|'HOSPITALITY'|'FINANCIAL'|'GAMBLING'|'CONSTRUCTION'|'NGO'|'MANUFACTURING'|'GOVERNMENT'|'TECHNOLOGY'|'COMMUNICATION'|Vertical $vertical vertical or industry segment of the brand or campaign
     * @param string $altBusinessID Alternate business identifier such as DUNS, LEI, or GIIN
     * @param 'NONE'|'DUNS'|'GIIN'|'LEI'|AltBusinessIDType $altBusinessIDType an enumeration
     * @param string $businessContactEmail Business contact email.
     *
     * Required if `entityType` will be changed to `PUBLIC_PROFIT`. Otherwise, it is recommended to either omit this field or set it to `null`.
     * @param string $city City name
     * @param string $companyName (Required for Non-profit/private/public) Legal company name
     * @param string $ein (Required for Non-profit) Government assigned corporate tax ID. EIN is 9-digits in U.S.
     * @param string $firstName first name of business contact
     * @param 'VERIFIED'|'UNVERIFIED'|'SELF_DECLARED'|'VETTED_VERIFIED'|BrandIdentityStatus $identityStatus The verification status of an active brand
     * @param string $ipAddress IP address of the browser requesting to create brand identity
     * @param string $lastName last name of business contact
     * @param string $phone Valid phone number in e.164 international format.
     * @param string $postalCode Postal codes. Use 5 digit zipcode for United States
     * @param string $state State. Must be 2 letters code for United States.
     * @param 'NONE'|'NASDAQ'|'NYSE'|'AMEX'|'AMX'|'ASX'|'B3'|'BME'|'BSE'|'FRA'|'ICEX'|'JPX'|'JSE'|'KRX'|'LON'|'NSE'|'OMX'|'SEHK'|'SSE'|'STO'|'SWX'|'SZSE'|'TSX'|'TWSE'|'VSE'|StockExchange $stockExchange (Required for public company) stock exchange
     * @param string $stockSymbol (Required for public company) stock symbol
     * @param string $street street number and name
     * @param string $webhookFailoverURL webhook failover URL for brand status updates
     * @param string $webhookURL webhook URL for brand status updates
     * @param string $website brand website URL
     *
     * @throws APIException
     */
    public function update(
        string $brandID,
        string $country,
        string $displayName,
        string $email,
        string|EntityType $entityType,
        string|Vertical $vertical,
        ?string $altBusinessID = null,
        string|AltBusinessIDType|null $altBusinessIDType = null,
        ?string $businessContactEmail = null,
        ?string $city = null,
        ?string $companyName = null,
        ?string $ein = null,
        ?string $firstName = null,
        string|BrandIdentityStatus|null $identityStatus = null,
        ?string $ipAddress = null,
        ?bool $isReseller = null,
        ?string $lastName = null,
        ?string $phone = null,
        ?string $postalCode = null,
        ?string $state = null,
        string|StockExchange|null $stockExchange = null,
        ?string $stockSymbol = null,
        ?string $street = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
        ?string $website = null,
        ?RequestOptions $requestOptions = null,
    ): TelnyxBrand;

    /**
     * @api
     *
     * @param string $brandID Filter results by the Telnyx Brand id
     * @param int $recordsPerPage number of records per page. maximum of 500
     * @param 'assignedCampaignsCount'|'-assignedCampaignsCount'|'brandId'|'-brandId'|'createdAt'|'-createdAt'|'displayName'|'-displayName'|'identityStatus'|'-identityStatus'|'status'|'-status'|'tcrBrandId'|'-tcrBrandId'|Sort $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     * @param string $tcrBrandID Filter results by the TCR Brand id
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
        string|Sort $sort = '-createdAt',
        ?string $state = null,
        ?string $tcrBrandID = null,
        ?RequestOptions $requestOptions = null,
    ): PerPagePaginationV2;

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
    public function getFeedback(
        string $brandID,
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
    public function revet(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): TelnyxBrand;
}
