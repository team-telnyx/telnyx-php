<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Enterprises;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Dir\DirCreateParams\Document;
use Telnyx\Enterprises\Dir\DirListParams\FilterStatus;
use Telnyx\Enterprises\Dir\DirListParams\Sort;
use Telnyx\Enterprises\Dir\DirListResponse;
use Telnyx\Enterprises\Dir\DirNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\Enterprises\Dir\DirCreateParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DirContract
{
    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $authorizerEmail Contact email of the authorizer. Telnyx may send verification or infringement-notice email here; use a monitored mailbox.
     * @param string $authorizerName Name of the person at your enterprise who is authorizing this DIR registration. Must be a real individual (used for audit and trademark-claim contests).
     * @param list<string> $callReasons 1–10 reasons your business calls customers. Validate phrasing against `POST /call_reasons/validate`.
     * @param bool $certifyBrandIsAccurate must be `true`
     * @param bool $certifyIPOwnership Must be `true`. Confirms ownership of any logos/trademarks shown.
     * @param bool $certifyNoShaftContent Must be `true`. Confirms this DIR is not used for SHAFT content (Sex, Hate, Alcohol, Firearms, Tobacco) where prohibited.
     * @param string $displayName Name shown to call recipients. No emoji; not whitespace-only.
     * @param list<Document|DocumentShape> $documents Supporting documents. Each `document_id` may appear at most once on a DIR.
     * @param string $logoURL publicly accessible HTTPS URL (max 128 chars) to a 256x256 BMP logo (max 1 MB)
     * @param bool $reselling set to true if your organization places calls on behalf of other enterprises (BPO/reseller)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        string $authorizerEmail,
        string $authorizerName,
        array $callReasons,
        bool $certifyBrandIsAccurate,
        bool $certifyIPOwnership,
        bool $certifyNoShaftContent,
        string $displayName,
        ?array $documents = null,
        ?string $logoURL = null,
        bool $reselling = false,
        RequestOptions|array|null $requestOptions = null,
    ): DirNewResponse;

    /**
     * @api
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $filterCallReasonContains case-insensitive partial match on call reason
     * @param string $filterDisplayNameContains case-insensitive partial match on display name
     * @param \DateTimeInterface $filterExpiringAtGte return only DIRs whose `expiring_at` is at or after this ISO-8601 timestamp
     * @param \DateTimeInterface $filterExpiringAtLte return only DIRs whose `expiring_at` is at or before this ISO-8601 timestamp
     * @param int $filterExpiringWithinDays Convenience: returns DIRs whose `expiring_at` falls within the next N days (1–365). Equivalent to setting `filter[expiring_at][gte]=<now>` + `filter[expiring_at][lte]=<now+N>`. Mutually exclusive with the explicit `[gte]`/`[lte]` filters - combining returns 400.
     * @param FilterStatus|value-of<FilterStatus> $filterStatus filter by DIR status
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param Sort|value-of<Sort> $sort Sort field. Allowed: `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at`. Prefix with `-` for descending. Default `-created_at`.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DirListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        ?string $filterCallReasonContains = null,
        ?string $filterDisplayNameContains = null,
        ?\DateTimeInterface $filterExpiringAtGte = null,
        ?\DateTimeInterface $filterExpiringAtLte = null,
        ?int $filterExpiringWithinDays = null,
        FilterStatus|string|null $filterStatus = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
