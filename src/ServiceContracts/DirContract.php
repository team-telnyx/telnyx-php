<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\DirGetResponse;
use Telnyx\Dir\DirListDocumentTypesResponse;
use Telnyx\Dir\DirListInfringementClaimsResponse;
use Telnyx\Dir\DirListParams\FilterStatus;
use Telnyx\Dir\DirListParams\Sort;
use Telnyx\Dir\DirListParams\Status;
use Telnyx\Dir\DirListResponse;
use Telnyx\Dir\DirSubmitResponse;
use Telnyx\Dir\DirUpdateInfringementParams\Document;
use Telnyx\Dir\DirUpdateInfringementResponse;
use Telnyx\Dir\DirUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\DirUpdateInfringementParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DirContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): DirGetResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param string $authorizerEmail Contact email of the authorizer. Telnyx may send verification or infringement notices here.
     * @param string $authorizerName Name of the person at your enterprise authorizing this DIR. Must be a real individual.
     * @param list<string> $callReasons 1–10 reasons your business calls customers. Validate phrasing against `POST /call_reasons/validate`.
     * @param string $displayName Name shown to call recipients. 1–35 characters, no emoji, not whitespace-only.
     * @param string $logoURL publicly accessible HTTPS URL (max 128 chars) to a 256x256 BMP logo (max 1 MB)
     * @param bool $reselling Set to true if your organization places calls on behalf of other enterprises (BPO/reseller). Updating this triggers re-vetting on next submit.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $dirID,
        ?string $authorizerEmail = null,
        ?string $authorizerName = null,
        ?array $callReasons = null,
        ?string $displayName = null,
        ?string $logoURL = null,
        ?bool $reselling = null,
        RequestOptions|array|null $requestOptions = null,
    ): DirUpdateResponse;

    /**
     * @api
     *
     * @param string $enterpriseID restrict results to a single enterprise
     * @param string $filterCallReasonContains case-insensitive partial match on call reason
     * @param string $filterDisplayNameContains case-insensitive partial match on display name
     * @param string $filterEnterpriseID filter by enterprise ID
     * @param \DateTimeInterface $filterExpiringAtGte Return only DIRs whose `expiring_at` is at or after this ISO-8601 timestamp. Pairs with the `[lte]` variant to build renewal-window dashboards.
     * @param \DateTimeInterface $filterExpiringAtLte return only DIRs whose `expiring_at` is at or before this ISO-8601 timestamp
     * @param FilterStatus|value-of<FilterStatus> $filterStatus filter by DIR status
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param string $search case-insensitive partial match on `display_name` or call reason
     * @param Sort|value-of<Sort> $sort Sort field. Allowed values: `created_at`, `updated_at`, `display_name`, `status`. Prefix with `-` for descending. Default `-created_at`.
     * @param Status|value-of<Status> $status filter by DIR status
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DirListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $enterpriseID = null,
        ?string $filterCallReasonContains = null,
        ?string $filterDisplayNameContains = null,
        ?string $filterEnterpriseID = null,
        ?\DateTimeInterface $filterExpiringAtGte = null,
        ?\DateTimeInterface $filterExpiringAtLte = null,
        FilterStatus|string|null $filterStatus = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $search = null,
        Sort|string $sort = '-created_at',
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listDocumentTypes(
        RequestOptions|array|null $requestOptions = null
    ): DirListDocumentTypesResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DirListInfringementClaimsResponse>
     *
     * @throws APIException
     */
    public function listInfringementClaims(
        string $dirID,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): DirSubmitResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param bool $certifyBrandIsAccurate must be `true`
     * @param bool $certifyIPOwnership must be `true`
     * @param bool $certifyNoInfringement must be `true`
     * @param bool $certifyNoShaftContent must be `true`
     * @param string $infringementResolutionNotes explanation of how the infringement concern was addressed
     * @param list<string>|null $callReasons
     * @param list<Document|DocumentShape>|null $documents append-only supporting documents
     * @param string|null $logoURL publicly accessible HTTPS URL (max 128 chars) to a 256x256 BMP logo (max 1 MB)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateInfringement(
        string $dirID,
        bool $certifyBrandIsAccurate,
        bool $certifyIPOwnership,
        bool $certifyNoInfringement,
        bool $certifyNoShaftContent,
        string $infringementResolutionNotes,
        ?array $callReasons = null,
        ?string $displayName = null,
        ?array $documents = null,
        ?string $logoURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): DirUpdateInfringementResponse;
}
