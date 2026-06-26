<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enterprises\Reputation\ReputationEnableParams;
use Telnyx\Enterprises\Reputation\ReputationEnableParams\CheckFrequency;
use Telnyx\Enterprises\Reputation\ReputationEnableResponse;
use Telnyx\Enterprises\Reputation\ReputationGetResponse;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\ReputationRawContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ReputationRawService implements ReputationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Phone Number Reputation tracks how your outbound caller-IDs are perceived (spam risk, engagement, etc.) across the call-screening ecosystem. This endpoint reads the enterprise-level settings: whether the product is enabled, the refresh cadence, and the stored Letter of Authorization document id.
     *
     * Returns `404` if reputation has never been enabled for this enterprise.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['enterprises/%1$s/reputation', $enterpriseID],
            options: $requestOptions,
            convert: ReputationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Disable Phone Number Reputation. All registered numbers are de-registered as a cascade. The enterprise itself is unaffected. Returns `204` on success, `404` if reputation is not enabled for this enterprise.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function disable(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['enterprises/%1$s/reputation', $enterpriseID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Activate Phone Number Reputation for the given enterprise. Requires an uploaded Letter of Authorization document (the `loa_document_id` references the Telnyx Documents API) and a refresh-frequency selection. After activation, individual phone numbers can be registered via `POST .../reputation/numbers`.
     *
     * **Prerequisite**: the calling user must have agreed to the Phone Number Reputation Terms of Service (`POST /terms_of_service/number_reputation/agree`).
     *
     * Failure modes:
     * - `403` - Phone Number Reputation Terms of Service not accepted.
     * - `404` - enterprise does not exist or does not belong to your account.
     * - `400` - reputation already enabled for this enterprise.
     * - `422` - `loa_document_id` missing or `check_frequency` invalid.
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   loaDocumentID: string,
     *   checkFrequency?: CheckFrequency|value-of<CheckFrequency>,
     * }|ReputationEnableParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationEnableResponse>
     *
     * @throws APIException
     */
    public function enable(
        string $enterpriseID,
        array|ReputationEnableParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReputationEnableParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/reputation', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: ReputationEnableResponse::class,
        );
    }

    /**
     * @api
     *
     * Update how often Telnyx refreshes the reputation data for this enterprise's registered numbers. The new frequency takes effect on the next scheduled refresh.
     *
     * The enterprise's reputation must be in `approved` status. A request made while the status is `pending` is rejected with `400 Bad Request`.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   checkFrequency: ReputationUpdateFrequencyParams\CheckFrequency|value-of<ReputationUpdateFrequencyParams\CheckFrequency>,
     * }|ReputationUpdateFrequencyParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ReputationUpdateFrequencyResponse>
     *
     * @throws APIException
     */
    public function updateFrequency(
        string $enterpriseID,
        array|ReputationUpdateFrequencyParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ReputationUpdateFrequencyParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['enterprises/%1$s/reputation/frequency', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: ReputationUpdateFrequencyResponse::class,
        );
    }
}
