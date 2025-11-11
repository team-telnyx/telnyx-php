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
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\BrandContract;
use Telnyx\Services\Brand\ExternalVettingService;

final class BrandService implements BrandContract
{
    /**
     * @api
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
     * @param array{
     *   country: string,
     *   displayName: string,
     *   email: string,
     *   entityType: "PRIVATE_PROFIT"|"PUBLIC_PROFIT"|"NON_PROFIT"|"GOVERNMENT"|EntityType,
     *   vertical: value-of<Vertical>,
     *   businessContactEmail?: string,
     *   city?: string,
     *   companyName?: string,
     *   ein?: string,
     *   firstName?: string,
     *   ipAddress?: string,
     *   isReseller?: bool,
     *   lastName?: string,
     *   mobilePhone?: string,
     *   mock?: bool,
     *   phone?: string,
     *   postalCode?: string,
     *   state?: string,
     *   stockExchange?: value-of<StockExchange>,
     *   stockSymbol?: string,
     *   street?: string,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     *   website?: string,
     * }|BrandCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|BrandCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): TelnyxBrand {
        [$parsed, $options] = BrandCreateParams::parseRequest(
            $params,
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
     * @throws APIException
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
     * @param array{
     *   country: string,
     *   displayName: string,
     *   email: string,
     *   entityType: "PRIVATE_PROFIT"|"PUBLIC_PROFIT"|"NON_PROFIT"|"GOVERNMENT"|EntityType,
     *   vertical: value-of<Vertical>,
     *   altBusiness_id?: string,
     *   altBusinessIdType?: "NONE"|"DUNS"|"GIIN"|"LEI"|AltBusinessIDType,
     *   businessContactEmail?: string,
     *   city?: string,
     *   companyName?: string,
     *   ein?: string,
     *   firstName?: string,
     *   identityStatus?: "VERIFIED"|"UNVERIFIED"|"SELF_DECLARED"|"VETTED_VERIFIED"|BrandIdentityStatus,
     *   ipAddress?: string,
     *   isReseller?: bool,
     *   lastName?: string,
     *   phone?: string,
     *   postalCode?: string,
     *   state?: string,
     *   stockExchange?: value-of<StockExchange>,
     *   stockSymbol?: string,
     *   street?: string,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     *   website?: string,
     * }|BrandUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $brandID,
        array|BrandUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelnyxBrand {
        [$parsed, $options] = BrandUpdateParams::parseRequest(
            $params,
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
     * @param array{
     *   brandId?: string,
     *   country?: string,
     *   displayName?: string,
     *   entityType?: string,
     *   page?: int,
     *   recordsPerPage?: int,
     *   sort?: value-of<Sort>,
     *   state?: string,
     *   tcrBrandId?: string,
     * }|BrandListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|BrandListParams $params,
        ?RequestOptions $requestOptions = null
    ): BrandListResponse {
        [$parsed, $options] = BrandListParams::parseRequest(
            $params,
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
     *
     * @throws APIException
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
     * @throws APIException
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
     *
     * @throws APIException
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
     *
     * @throws APIException
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
