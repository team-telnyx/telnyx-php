<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc;

use Telnyx\Brand\AltBusinessIDType;
use Telnyx\Brand\BrandIdentityStatus;
use Telnyx\Brand\EntityType;
use Telnyx\Brand\StockExchange;
use Telnyx\Brand\TelnyxBrand;
use Telnyx\Brand\Vertical;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Number10dlc\Brand\BrandGetFeedbackResponse;
use Telnyx\Number10dlc\Brand\BrandGetResponse;
use Telnyx\Number10dlc\Brand\BrandListParams\Sort;
use Telnyx\Number10dlc\Brand\BrandListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\BrandContract;
use Telnyx\Services\Number10dlc\Brand\ExternalVettingService;
use Telnyx\Services\Number10dlc\Brand\SMSOtpService;

final class BrandService implements BrandContract
{
    /**
     * @api
     */
    public BrandRawService $raw;

    /**
     * @api
     */
    public SMSOtpService $smsOtp;

    /**
     * @api
     */
    public ExternalVettingService $externalVetting;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new BrandRawService($client);
        $this->smsOtp = new SMSOtpService($client);
        $this->externalVetting = new ExternalVettingService($client);
    }

    /**
     * @api
     *
     * This endpoint is used to create a new brand. A brand is an entity created by The Campaign Registry (TCR) that represents an organization or a company. It is this entity that TCR created campaigns will be associated with. Each brand creation will entail an upfront, non-refundable $4 expense.
     *
     * @param string $country ISO2 2 characters country code. Example: US - United States
     * @param string $displayName display name, marketing name, or DBA name of the brand
     * @param string $email valid email address of brand support contact
     * @param 'PRIVATE_PROFIT'|'PUBLIC_PROFIT'|'NON_PROFIT'|'GOVERNMENT'|'SOLE_PROPRIETOR'|EntityType $entityType Entity type behind the brand. This is the form of business establishment.
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
    ): TelnyxBrand {
        $params = Util::removeNulls(
            [
                'country' => $country,
                'displayName' => $displayName,
                'email' => $email,
                'entityType' => $entityType,
                'vertical' => $vertical,
                'businessContactEmail' => $businessContactEmail,
                'city' => $city,
                'companyName' => $companyName,
                'ein' => $ein,
                'firstName' => $firstName,
                'ipAddress' => $ipAddress,
                'isReseller' => $isReseller,
                'lastName' => $lastName,
                'mobilePhone' => $mobilePhone,
                'mock' => $mock,
                'phone' => $phone,
                'postalCode' => $postalCode,
                'state' => $state,
                'stockExchange' => $stockExchange,
                'stockSymbol' => $stockSymbol,
                'street' => $street,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
                'website' => $website,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a brand by `brandId`.
     *
     * @throws APIException
     */
    public function retrieve(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($brandID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a brand's attributes by `brandId`.
     *
     * @param string $country ISO2 2 characters country code. Example: US - United States
     * @param string $displayName display or marketing name of the brand
     * @param string $email valid email address of brand support contact
     * @param 'PRIVATE_PROFIT'|'PUBLIC_PROFIT'|'NON_PROFIT'|'GOVERNMENT'|'SOLE_PROPRIETOR'|EntityType $entityType Entity type behind the brand. This is the form of business establishment.
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
    ): TelnyxBrand {
        $params = Util::removeNulls(
            [
                'country' => $country,
                'displayName' => $displayName,
                'email' => $email,
                'entityType' => $entityType,
                'vertical' => $vertical,
                'altBusinessID' => $altBusinessID,
                'altBusinessIDType' => $altBusinessIDType,
                'businessContactEmail' => $businessContactEmail,
                'city' => $city,
                'companyName' => $companyName,
                'ein' => $ein,
                'firstName' => $firstName,
                'identityStatus' => $identityStatus,
                'ipAddress' => $ipAddress,
                'isReseller' => $isReseller,
                'lastName' => $lastName,
                'phone' => $phone,
                'postalCode' => $postalCode,
                'state' => $state,
                'stockExchange' => $stockExchange,
                'stockSymbol' => $stockSymbol,
                'street' => $street,
                'webhookFailoverURL' => $webhookFailoverURL,
                'webhookURL' => $webhookURL,
                'website' => $website,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($brandID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint is used to list all brands associated with your organization.
     *
     * @param string $brandID Filter results by the Telnyx Brand id
     * @param int $recordsPerPage number of records per page. maximum of 500
     * @param 'assignedCampaignsCount'|'-assignedCampaignsCount'|'brandId'|'-brandId'|'createdAt'|'-createdAt'|'displayName'|'-displayName'|'identityStatus'|'-identityStatus'|'status'|'-status'|'tcrBrandId'|'-tcrBrandId'|Sort $sort Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     * @param string $tcrBrandID Filter results by the TCR Brand id
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
    ): BrandListResponse {
        $params = Util::removeNulls(
            [
                'brandID' => $brandID,
                'country' => $country,
                'displayName' => $displayName,
                'entityType' => $entityType,
                'page' => $page,
                'recordsPerPage' => $recordsPerPage,
                'sort' => $sort,
                'state' => $state,
                'tcrBrandID' => $tcrBrandID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete Brand. This endpoint is used to delete a brand. Note the brand cannot be deleted if it contains one or more active campaigns, the campaigns need to be inactive and at least 3 months old due to billing purposes.
     *
     * @throws APIException
     */
    public function delete(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($brandID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get feedback about a brand by ID. This endpoint can be used after creating or revetting
     * a brand.
     *
     * Possible values for `.category[].id`:
     *
     * * `TAX_ID` - Data mismatch related to tax id and its associated properties.
     * * `STOCK_SYMBOL` - Non public entity registered as a public for profit entity or
     *   the stock information mismatch.
     * * `GOVERNMENT_ENTITY` - Non government entity registered as a government entity.
     *   Must be a U.S. government entity.
     * * `NONPROFIT` - Not a recognized non-profit entity. No IRS tax-exempt status
     *   found.
     * * `OTHERS` - Details of the data misrepresentation if any.
     *
     * @throws APIException
     */
    public function getFeedback(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetFeedbackResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getFeedback($brandID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Resend brand 2FA email
     *
     * @throws APIException
     */
    public function resend2faEmail(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->resend2faEmail($brandID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This operation allows you to revet the brand. However, revetting is allowed once after the successful brand registration and thereafter limited to once every 3 months.
     *
     * @throws APIException
     */
    public function revet(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): TelnyxBrand {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->revet($brandID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
