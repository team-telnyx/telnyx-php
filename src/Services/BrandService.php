<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Brand\AltBusinessIDType;
use Telnyx\Brand\BrandCreateParams;
use Telnyx\Brand\BrandGetFeedbackResponse;
use Telnyx\Brand\BrandGetResponse;
use Telnyx\Brand\BrandIdentityStatus;
use Telnyx\Brand\BrandListParams;
use Telnyx\Brand\BrandListParams\Sort;
use Telnyx\Brand\BrandListResponse;
use Telnyx\Brand\BrandUpdateParams;
use Telnyx\Brand\EntityType;
use Telnyx\Brand\StockExchange;
use Telnyx\Brand\TelnyxBrand;
use Telnyx\Brand\Vertical;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BrandContract;
use Telnyx\Services\Brand\ExternalVettingService;

use const Telnyx\Core\OMIT as omit;

final class BrandService implements BrandContract
{
    /**
     * @@api
     */
    public ExternalVettingService $externalVetting;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
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
     * @param EntityType|value-of<EntityType> $entityType Entity type behind the brand. This is the form of business establishment.
     * @param Vertical|value-of<Vertical> $vertical vertical or industry segment of the brand or campaign
     * @param string $businessContactEmail Business contact email.
     *
     * Required if `entityType` is `PUBLIC_PROFIT`.
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
    ): TelnyxBrand {
        [$parsed, $options] = BrandCreateParams::parseRequest(
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
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'brand',
            body: (object) $parsed,
            options: $options,
            convert: TelnyxBrand::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a brand by `brandId`.
     *
     * @return BrandGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['brand/%1$s', $brandID],
            options: $requestOptions,
            convert: BrandGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a brand's attributes by `brandId`.
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
     * Required if `entityType` will be changed to `PUBLIC_PROFIT`.
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
    ): TelnyxBrand {
        [$parsed, $options] = BrandUpdateParams::parseRequest(
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
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['brand/%1$s', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: TelnyxBrand::class,
        );
    }

    /**
     * @api
     *
     * This endpoint is used to list all brands associated with your organization.
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
    ): BrandListResponse {
        [$parsed, $options] = BrandListParams::parseRequest(
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
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'brand',
            query: $parsed,
            options: $options,
            convert: BrandListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete Brand. This endpoint is used to delete a brand. Note the brand cannot be deleted if it contains one or more active campaigns, the campaigns need to be inactive and at least 3 months old due to billing purposes.
     */
    public function delete(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['brand/%1$s', $brandID],
            options: $requestOptions,
            convert: 'mixed',
        );
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
     * @return BrandGetFeedbackResponse<HasRawResponse>
     */
    public function getFeedback(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BrandGetFeedbackResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['brand/feedback/%1$s', $brandID],
            options: $requestOptions,
            convert: BrandGetFeedbackResponse::class,
        );
    }

    /**
     * @api
     *
     * Resend brand 2FA email
     */
    public function resend2faEmail(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['brand/%1$s/2faEmail', $brandID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * This operation allows you to revet the brand. However, revetting is allowed once after the successful brand registration and thereafter limited to once every 3 months.
     */
    public function revet(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'put',
            path: ['brand/%1$s/revet', $brandID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
