<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises\Reputation;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Remediation\RemediationGetResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListParams\FilterStatus;
use Telnyx\Enterprises\Reputation\Remediation\RemediationListResponse;
use Telnyx\Enterprises\Reputation\Remediation\RemediationNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface RemediationContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $callPurpose how the numbers are used (free text)
     * @param list<string> $phoneNumbers Phone numbers in E.164 format. Each must belong to this enterprise. Maximum 2,000 per request.
     * @param string $contactEmail optional contact email for this remediation request
     * @param string $webhookURL optional https:// URL for status notifications
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        string $callPurpose,
        array $phoneNumbers,
        ?string $contactEmail = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): RemediationNewResponse;

    /**
     * @api
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
    ): RemediationGetResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;
}
