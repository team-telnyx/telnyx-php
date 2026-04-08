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
 * Manage Number Reputation enrollment and check frequency settings for an enterprise.
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
     * Retrieve the current Number Reputation settings for an enterprise.
     *
     * Returns the enrollment status (`pending`, `approved`, `rejected`, `deleted`), check frequency, and any rejection reasons.
     *
     * Returns `404` if reputation has not been enabled for this enterprise.
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
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
     * Disable Number Reputation for an enterprise.
     *
     * This will:
     * - Delete the reputation settings record
     * - Log the deletion for audit purposes
     * - Stop all future automated reputation checks
     *
     * **Note:** Can only be performed on `approved` reputation settings.
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
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
     * Enable Number Reputation service for an enterprise.
     *
     * **Requirements:**
     * - Signed LOA (Letter of Authorization) document ID
     * - Reputation check frequency (defaults to `business_daily`)
     * - Number Reputation Terms of Service must be accepted
     *
     * **Flow:**
     * 1. Registers the enterprise for reputation monitoring
     * 2. Creates reputation settings with `pending` status
     * 3. Awaits admin approval before monitoring begins
     *
     * **Resubmission After Rejection:**
     * If a previously rejected record exists, this endpoint will delete it and create a new `pending` record.
     *
     * **Available Frequencies:**
     * - `business_daily` — Monday–Friday
     * - `daily` — Every day
     * - `weekly` — Once per week
     * - `biweekly` — Once every two weeks
     * - `monthly` — Once per month
     * - `never` — Manual refresh only
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
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
     * Update how often reputation data is automatically refreshed.
     *
     * **Note:** The enterprise must have `approved` reputation settings. Updating frequency on `pending` or `rejected` settings will return an error.
     *
     * **Available Frequencies:**
     * - `business_daily` — Monday–Friday
     * - `daily` — Every day including weekends
     * - `weekly` — Once per week
     * - `biweekly` — Once every two weeks
     * - `monthly` — Once per month
     * - `never` — Manual refresh only (no automatic checks)
     *
     * @param string $enterpriseID Unique identifier of the enterprise (UUID)
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
