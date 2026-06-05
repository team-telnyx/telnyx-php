<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Enterprises\Reputation\ReputationEnableParams\CheckFrequency;
use Telnyx\Enterprises\Reputation\ReputationEnableResponse;
use Telnyx\Enterprises\Reputation\ReputationGetResponse;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\ReputationContract;
use Telnyx\Services\Enterprises\Reputation\LoaService;
use Telnyx\Services\Enterprises\Reputation\NumbersService;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
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
     * @api
     */
    public LoaService $loa;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ReputationRawService($client);
        $this->numbers = new NumbersService($client);
        $this->loa = new LoaService($client);
    }

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
     * @throws APIException
     */
    public function retrieve(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): ReputationGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Disable Phone Number Reputation. All registered numbers are de-registered as a cascade. The enterprise itself is unaffected. Returns `204` on success, `404` if reputation is not enabled for this enterprise.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function disable(
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->disable($enterpriseID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Activate Phone Number Reputation for the given enterprise. Requires an uploaded Letter of Authorization document (the `loa_document_id` references the Telnyx Documents API) and a refresh-frequency selection. After activation, individual phone numbers can be registered via `POST .../reputation/numbers`.
     *
     * **Prerequisite**: the calling user must have agreed to the Phone Number Reputation Terms of Service (`POST /terms_of_service/number_reputation/agree`).
     *
     * Failure modes:
     * - `403` — Phone Number Reputation Terms of Service not accepted.
     * - `404` — enterprise does not exist or does not belong to your account.
     * - `400` — reputation already enabled for this enterprise.
     * - `422` — `loa_document_id` missing or `check_frequency` invalid.
     *
     * **Pricing:** This is a billable action. See https://telnyx.com/pricing/numbers for current pricing.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $loaDocumentID Id of the signed Letter of Authorization document, returned by the Telnyx Documents API after upload (upload via `POST /v2/documents`; see https://developers.telnyx.com/api/documents).
     * @param CheckFrequency|value-of<CheckFrequency> $checkFrequency how often Telnyx refreshes the stored reputation data for this enterprise's registered numbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enable(
        string $enterpriseID,
        string $loaDocumentID,
        CheckFrequency|string $checkFrequency = 'business_daily',
        RequestOptions|array|null $requestOptions = null,
    ): ReputationEnableResponse {
        $params = Util::removeNulls(
            ['loaDocumentID' => $loaDocumentID, 'checkFrequency' => $checkFrequency]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->enable($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update how often Telnyx refreshes the reputation data for this enterprise's registered numbers. The new frequency takes effect on the next scheduled refresh.
     *
     * The enterprise's reputation must be in `approved` status. A request made while the status is `pending` is rejected with `400 Bad Request`.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param \Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency|value-of<\Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyParams\CheckFrequency> $checkFrequency how often Telnyx refreshes the stored reputation data for this enterprise's registered numbers
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
