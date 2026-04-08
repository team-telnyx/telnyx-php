<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Enterprises\Reputation\ReputationCreateParams\CheckFrequency;
use Telnyx\Enterprises\Reputation\ReputationListResponse;
use Telnyx\Enterprises\Reputation\ReputationNewResponse;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\ReputationContract;
use Telnyx\Services\Enterprises\Reputation\NumbersService;

/**
 * Manage Number Reputation enrollment and check frequency settings for an enterprise.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ReputationService implements ReputationContract
{
    /**
     * @api
     */
    public ReputationRawService $raw;

    /**
     * @api
     */
    public NumbersService $numbers;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReputationRawService($client);
        $this->numbers = new NumbersService($client);
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
     * @param string $loaDocumentID ID of the signed Letter of Authorization (LOA) document uploaded to the document service
     * @param CheckFrequency|value-of<CheckFrequency> $checkFrequency Frequency for automatically refreshing reputation data
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        string $loaDocumentID,
        CheckFrequency|string $checkFrequency = 'business_daily',
        RequestOptions|array|null $requestOptions = null,
    ): ReputationNewResponse {
        $params = Util::removeNulls(
            ['loaDocumentID' => $loaDocumentID, 'checkFrequency' => $checkFrequency]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

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
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): ReputationListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
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
     * @throws APIException
     */
    public function deleteAll(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteAll($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param \Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency|value-of<\Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency> $checkFrequency New frequency for refreshing reputation data
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateFrequency(
        string $enterpriseID,
        \Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency|string $checkFrequency,
        RequestOptions|array|null $requestOptions = null,
    ): ReputationUpdateFrequencyResponse {
        $params = Util::removeNulls(['checkFrequency' => $checkFrequency]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateFrequency($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
