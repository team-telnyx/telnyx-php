<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Number10dlc\Brand\AltBusinessIDType;
use Telnyx\Number10dlc\Brand\BrandCreateParams;
use Telnyx\Number10dlc\Brand\BrandGetFeedbackResponse;
use Telnyx\Number10dlc\Brand\BrandGetResponse;
use Telnyx\Number10dlc\Brand\BrandGetSMSOtpStatusResponse;
use Telnyx\Number10dlc\Brand\BrandIdentityStatus;
use Telnyx\Number10dlc\Brand\BrandListParams;
use Telnyx\Number10dlc\Brand\BrandListParams\Sort;
use Telnyx\Number10dlc\Brand\BrandListResponse;
use Telnyx\Number10dlc\Brand\BrandRetrieveSMSOtpStatusParams;
use Telnyx\Number10dlc\Brand\BrandTriggerSMSOtpParams;
use Telnyx\Number10dlc\Brand\BrandTriggerSMSOtpResponse;
use Telnyx\Number10dlc\Brand\BrandUpdateParams;
use Telnyx\Number10dlc\Brand\BrandVerifySMSOtpParams;
use Telnyx\Number10dlc\Brand\EntityType;
use Telnyx\Number10dlc\Brand\StockExchange;
use Telnyx\Number10dlc\Brand\TelnyxBrand;
use Telnyx\Number10dlc\Brand\Vertical;
use Telnyx\PerPagePaginationV2;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\BrandRawContract;

final class BrandRawService implements BrandRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint is used to create a new brand. A brand is an entity created by The Campaign Registry (TCR) that represents an organization or a company. It is this entity that TCR created campaigns will be associated with. Each brand creation will entail an upfront, non-refundable $4 expense.
     *
     * @param array{
     *   country: string,
     *   displayName: string,
     *   email: string,
     *   entityType: 'PRIVATE_PROFIT'|'PUBLIC_PROFIT'|'NON_PROFIT'|'GOVERNMENT'|'SOLE_PROPRIETOR'|EntityType,
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
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function create(
        array|BrandCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = BrandCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: '10dlc/brand',
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
     * @return BaseResponse<BrandGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/brand/%1$s', $brandID],
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
     *   entityType: 'PRIVATE_PROFIT'|'PUBLIC_PROFIT'|'NON_PROFIT'|'GOVERNMENT'|'SOLE_PROPRIETOR'|EntityType,
     *   vertical: value-of<Vertical>,
     *   altBusinessID?: string,
     *   altBusinessIDType?: 'NONE'|'DUNS'|'GIIN'|'LEI'|AltBusinessIDType,
     *   businessContactEmail?: string,
     *   city?: string,
     *   companyName?: string,
     *   ein?: string,
     *   firstName?: string,
     *   identityStatus?: 'VERIFIED'|'UNVERIFIED'|'SELF_DECLARED'|'VETTED_VERIFIED'|BrandIdentityStatus,
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
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function update(
        string $brandID,
        array|BrandUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrandUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/brand/%1$s', $brandID],
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
     *   brandID?: string,
     *   country?: string,
     *   displayName?: string,
     *   entityType?: string,
     *   page?: int,
     *   recordsPerPage?: int,
     *   sort?: value-of<Sort>,
     *   state?: string,
     *   tcrBrandID?: string,
     * }|BrandListParams $params
     *
     * @return BaseResponse<PerPagePaginationV2<BrandListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|BrandListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = BrandListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: '10dlc/brand',
            query: Util::array_transform_keys(
                $parsed,
                ['brandID' => 'brandId', 'tcrBrandID' => 'tcrBrandId']
            ),
            options: $options,
            convert: BrandListResponse::class,
            page: PerPagePaginationV2::class,
        );
    }

    /**
     * @api
     *
     * Delete Brand. This endpoint is used to delete a brand. Note the brand cannot be deleted if it contains one or more active campaigns, the campaigns need to be inactive and at least 3 months old due to billing purposes.
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['10dlc/brand/%1$s', $brandID],
            options: $requestOptions,
            convert: null,
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
     * @return BaseResponse<BrandGetFeedbackResponse>
     *
     * @throws APIException
     */
    public function getFeedback(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/brand/feedback/%1$s', $brandID],
            options: $requestOptions,
            convert: BrandGetFeedbackResponse::class,
        );
    }

    /**
     * @api
     *
     * Resend brand 2FA email
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function resend2faEmail(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['10dlc/brand/%1$s/2faEmail', $brandID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Query the status of an SMS OTP (One-Time Password) for Sole Proprietor brand verification.
     *
     * This endpoint allows you to check the delivery and verification status of an OTP sent during the Sole Proprietor brand verification process. You can query by either:
     *
     * * `referenceId` - The reference ID returned when the OTP was initially triggered
     * * `brandId` - Query parameter for portal users to look up OTP status by Brand ID
     *
     * The response includes delivery status, verification dates, and detailed delivery information.
     *
     * @param string $referenceID The reference ID returned when the OTP was initially triggered
     * @param array{brandID?: string}|BrandRetrieveSMSOtpStatusParams $params
     *
     * @return BaseResponse<BrandGetSMSOtpStatusResponse>
     *
     * @throws APIException
     */
    public function retrieveSMSOtpStatus(
        string $referenceID,
        array|BrandRetrieveSMSOtpStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrandRetrieveSMSOtpStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/brand/smsOtp/%1$s', $referenceID],
            query: Util::array_transform_keys($parsed, ['brandID' => 'brandId']),
            options: $options,
            convert: BrandGetSMSOtpStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * This operation allows you to revet the brand. However, revetting is allowed once after the successful brand registration and thereafter limited to once every 3 months.
     *
     * @return BaseResponse<TelnyxBrand>
     *
     * @throws APIException
     */
    public function revet(
        string $brandID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/brand/%1$s/revet', $brandID],
            options: $requestOptions,
            convert: TelnyxBrand::class,
        );
    }

    /**
     * @api
     *
     * Trigger or re-trigger an SMS OTP (One-Time Password) for Sole Proprietor brand verification.
     *
     * **Important Notes:**
     *
     * * Only allowed for Sole Proprietor (`SOLE_PROPRIETOR`) brands
     * * Triggers generation of a one-time password sent to the `mobilePhone` number in the brand's profile
     * * Campaigns cannot be created until OTP verification is complete
     * * US/CA numbers only for real OTPs; mock brands can use non-US/CA numbers for testing
     * * Returns a `referenceId` that can be used to check OTP status via the GET `/10dlc/brand/smsOtp/{referenceId}` endpoint
     *
     * **Use Cases:**
     *
     * * Initial OTP trigger after Sole Proprietor brand creation
     * * Re-triggering OTP if the user didn't receive or needs a new code
     *
     * @param string $brandID The Brand ID for which to trigger the OTP
     * @param array{
     *   pinSMS: string, successSMS: string
     * }|BrandTriggerSMSOtpParams $params
     *
     * @return BaseResponse<BrandTriggerSMSOtpResponse>
     *
     * @throws APIException
     */
    public function triggerSMSOtp(
        string $brandID,
        array|BrandTriggerSMSOtpParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrandTriggerSMSOtpParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['10dlc/brand/%1$s/smsOtp', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: BrandTriggerSMSOtpResponse::class,
        );
    }

    /**
     * @api
     *
     * Verify the SMS OTP (One-Time Password) for Sole Proprietor brand verification.
     *
     * **Verification Flow:**
     *
     * 1. User receives OTP via SMS after triggering
     * 2. User submits the OTP pin through this endpoint
     * 3. Upon successful verification:
     *    - A `BRAND_OTP_VERIFIED` webhook event is sent to the CSP
     *    - The brand's `identityStatus` changes to `VERIFIED`
     *    - Campaigns can now be created for this brand
     *
     * **Error Handling:**
     *
     * Provides proper error responses for:
     * * Invalid OTP pins
     * * Expired OTPs
     * * OTP verification failures
     *
     * @param string $brandID The Brand ID for which to verify the OTP
     * @param array{otpPin: string}|BrandVerifySMSOtpParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function verifySMSOtp(
        string $brandID,
        array|BrandVerifySMSOtpParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = BrandVerifySMSOtpParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['10dlc/brand/%1$s/smsOtp', $brandID],
            body: (object) $parsed,
            options: $options,
            convert: null,
        );
    }
}
