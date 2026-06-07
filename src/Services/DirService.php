<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\DirGetResponse;
use Telnyx\Dir\DirListDocumentTypesResponse;
use Telnyx\Dir\DirListInfringementClaimsResponse;
use Telnyx\Dir\DirListParams\FilterStatus;
use Telnyx\Dir\DirListParams\Sort;
use Telnyx\Dir\DirListResponse;
use Telnyx\Dir\DirSubmitResponse;
use Telnyx\Dir\DirUpdateInfringementParams\Document;
use Telnyx\Dir\DirUpdateInfringementResponse;
use Telnyx\Dir\DirUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DirContract;
use Telnyx\Services\Dir\CommentsService;
use Telnyx\Services\Dir\PhoneNumberBatchesService;
use Telnyx\Services\Dir\PhoneNumbersService;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\DirUpdateInfringementParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DirService implements DirContract
{
    /**
     * @api
     */
    public DirRawService $raw;

    /**
     * @api
     */
    public CommentsService $comments;

    /**
     * @api
     */
    public PhoneNumberBatchesService $phoneNumberBatches;

    /**
     * @api
     */
    public PhoneNumbersService $phoneNumbers;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DirRawService($client);
        $this->comments = new CommentsService($client);
        $this->phoneNumberBatches = new PhoneNumberBatchesService($client);
        $this->phoneNumbers = new PhoneNumbersService($client);
    }

    /**
     * @api
     *
     * Returns a single DIR by id. The enterprise is resolved server-side from the DIR id. Returns `404` if the DIR does not exist or is not yours.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): DirGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($dirID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Edit a DIR. Only DIRs in `draft`, `rejected`, `unsuccessful`, or `suspended` are editable. PATCH is a pure edit — `status` is never changed by this endpoint. To re-vet after editing, call `POST /v2/dir/{dir_id}/submit` explicitly.
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
    ): DirUpdateResponse {
        $params = Util::removeNulls(
            [
                'authorizerEmail' => $authorizerEmail,
                'authorizerName' => $authorizerName,
                'callReasons' => $callReasons,
                'displayName' => $displayName,
                'logoURL' => $logoURL,
                'reselling' => $reselling,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns every DIR (Display Identity Record) you own, across all of your enterprises, as a single list. Pagination is JSON:API style (`page[number]`, `page[size]`, max 250). Supports `filter[]` query params: `filter[enterprise_id]`, `filter[status]`, `filter[display_name][contains]`, `filter[call_reason][contains]`, plus the renewal-window filters `filter[expiring_at][gte]` / `filter[expiring_at][lte]`. Sortable by `created_at`, `updated_at`, `display_name`, `status` (prefix `-` for descending; default `-created_at`).
     *
     * @param string $filterCallReasonContains case-insensitive partial match on call reason
     * @param string $filterDisplayNameContains case-insensitive partial match on display name
     * @param string $filterEnterpriseID filter by enterprise ID
     * @param \DateTimeInterface $filterExpiringAtGte Return only DIRs whose `expiring_at` is at or after this ISO-8601 timestamp. Pairs with the `[lte]` variant to build renewal-window dashboards.
     * @param \DateTimeInterface $filterExpiringAtLte return only DIRs whose `expiring_at` is at or before this ISO-8601 timestamp
     * @param FilterStatus|value-of<FilterStatus> $filterStatus filter by DIR status
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param Sort|value-of<Sort> $sort Sort field. Allowed values: `created_at`, `updated_at`, `display_name`, `status`. Prefix with `-` for descending. Default `-created_at`.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DirListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterCallReasonContains = null,
        ?string $filterDisplayNameContains = null,
        ?string $filterEnterpriseID = null,
        ?\DateTimeInterface $filterExpiringAtGte = null,
        ?\DateTimeInterface $filterExpiringAtLte = null,
        FilterStatus|string|null $filterStatus = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        Sort|string $sort = '-created_at',
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterCallReasonContains' => $filterCallReasonContains,
                'filterDisplayNameContains' => $filterDisplayNameContains,
                'filterEnterpriseID' => $filterEnterpriseID,
                'filterExpiringAtGte' => $filterExpiringAtGte,
                'filterExpiringAtLte' => $filterExpiringAtLte,
                'filterStatus' => $filterStatus,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a DIR. Failure modes: `400` if a child phone number is in a non-deletable status, `409` if the DIR has an unresolved infringement claim, `404` if the DIR is not yours.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($dirID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Reference list of `document_type` values accepted by `DirCreateRequest.documents[].document_type` and the infringement-contest endpoint. Each entry has a stable `short_name` (used in API calls) and a customer-facing description.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listDocumentTypes(
        RequestOptions|array|null $requestOptions = null
    ): DirListDocumentTypesResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listDocumentTypes(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the trademark or copyright claims filed against this DIR. Each claim's `status` is `pending` (newly filed; DIR auto-suspended), `contested` (you have submitted contest evidence; awaiting resolution), or `resolved` (final). Resolution outcomes: `upheld` (claim accepted; DIR stays suspended/permanently_rejected), `rejected` (claim dismissed; DIR restored to `verified`), `modified` (partial outcome).
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listInfringementClaims($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Submit a DIR for vetting. Sends the DIR back through the vetting cycle from any non-terminal status. When re-submitting from `suspended` or `expired`, the DIR's previous Branded Calling registration is torn down transactionally and its phone numbers flip back to `submitted`. When re-submitting from `verified`, the existing registration stays live throughout the new vetting cycle.
     *
     * Returns `400` from `submitted`/`in_review`/`permanently_rejected`. Returns `409` if the DIR has an unresolved infringement claim.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function submit(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): DirSubmitResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->submit($dirID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Push a fix for a DIR that is `suspended` with an open infringement claim back into vetting. `POST /dir/{dir_id}/submit` is blocked while a claim is open, so this is the customer-callable path to update the DIR's content and re-certify before Telnyx adjudicates the claim. All four certification booleans must be `true`. Optional content fields (`display_name`, `logo_url`, `call_reasons`, `documents`) update the DIR; documents are append-only.
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
    ): DirUpdateInfringementResponse {
        $params = Util::removeNulls(
            [
                'certifyBrandIsAccurate' => $certifyBrandIsAccurate,
                'certifyIPOwnership' => $certifyIPOwnership,
                'certifyNoInfringement' => $certifyNoInfringement,
                'certifyNoShaftContent' => $certifyNoShaftContent,
                'infringementResolutionNotes' => $infringementResolutionNotes,
                'callReasons' => $callReasons,
                'displayName' => $displayName,
                'documents' => $documents,
                'logoURL' => $logoURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateInfringement($dirID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
