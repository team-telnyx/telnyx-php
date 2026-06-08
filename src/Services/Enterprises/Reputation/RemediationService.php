<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises\Reputation;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Remediation\RemediationGetResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListParams\FilterStatus;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\Reputation\RemediationContract;

/**
 * Phone-number reputation monitoring (spam-score lookup and tracking).
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class RemediationService implements RemediationContract
{
    /**
     * @api
     */
    public RemediationRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new RemediationRawService($client);
    }

    /**
     * @api
     *
     * Submit a batch of phone numbers belonging to this enterprise for reputation remediation. The request is accepted asynchronously: this endpoint returns `202` with the persisted request id, then the request transitions through processing states until completion. Use the GET endpoints to poll status and per-number results.
     *
     * Each phone number must be in E.164 format and belong to this enterprise. A number that already has an in-flight remediation request is rejected.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $callPurpose how the numbers are used (free text)
     * @param string $contactEmail contact email for tracking this request
     * @param list<string> $phoneNumbers Phone numbers in E.164 format. Each must belong to this enterprise. Maximum 2,000 per request.
     * @param string $webhookURL optional https:// URL for status notifications
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        string $callPurpose,
        string $contactEmail,
        array $phoneNumbers,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): RemediationNewResponse {
        $params = Util::removeNulls(
            [
                'callPurpose' => $callPurpose,
                'contactEmail' => $contactEmail,
                'phoneNumbers' => $phoneNumbers,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the full detail of a remediation request, including current status, per-number results (once available), and submission metadata.
     *
     * @param string $remediationID The remediation request id. Lowercase UUID.
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $remediationID,
        string $enterpriseID,
        RequestOptions|array|null $requestOptions = null,
    ): RemediationGetResponse {
        $params = Util::removeNulls(['enterpriseID' => $enterpriseID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($remediationID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Paginated list of remediation requests for this enterprise. List items omit per-number results and webhook URLs to keep the response small; call GET by id for full detail. Supports JSON:API pagination and optional filters on status and created-at range.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param \DateTimeInterface $filterCreatedAtGte only requests created on or after this timestamp (ISO 8601)
     * @param \DateTimeInterface $filterCreatedAtLte only requests created on or before this timestamp (ISO 8601)
     * @param FilterStatus|value-of<FilterStatus> $filterStatus filter by customer-facing status
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<RemediationListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        ?\DateTimeInterface $filterCreatedAtGte = null,
        ?\DateTimeInterface $filterCreatedAtLte = null,
        FilterStatus|string|null $filterStatus = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterCreatedAtGte' => $filterCreatedAtGte,
                'filterCreatedAtLte' => $filterCreatedAtLte,
                'filterStatus' => $filterStatus,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
