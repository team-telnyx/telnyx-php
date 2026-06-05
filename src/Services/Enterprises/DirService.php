<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Dir\DirCreateParams\Document;
use Telnyx\Enterprises\Dir\DirListParams\Sort;
use Telnyx\Enterprises\Dir\DirListParams\Status;
use Telnyx\Enterprises\Dir\DirListResponse;
use Telnyx\Enterprises\Dir\DirNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\DirContract;
use Telnyx\Services\Enterprises\Dir\CommentsService;
use Telnyx\Services\Enterprises\Dir\PhoneNumberBatchesService;
use Telnyx\Services\Enterprises\Dir\PhoneNumbersService;

/**
 * A Display Identity Record (DIR) is the verified calling identity (display name, logo, call reasons) shown to recipients on outbound calls.
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Enterprises\Dir\DirCreateParams\Document
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
     * Create a new DIR under the given enterprise. The DIR starts in `draft` status; it must be submitted (`POST .../submit`) and approved by Telnyx before any phone number can be attached.
     *
     * **Field rules**
     * - `display_name`: 1–35 characters, no emoji or whitespace-only strings; this is the name shown to recipients.
     * - `call_reasons`: 1–10 strings, each ≤64 characters; describe why your business calls customers (e.g. 'Appointment reminders', 'Billing inquiries'). Validate the wording against `POST /call_reasons/validate`.
     * - `logo_url`: HTTPS URL (max 128 chars) to a 256×256 BMP (max 1 MB). The image is downloaded and hashed at submission time.
     * - `documents`: up to 20 entries; each `document_id` must be obtained by uploading the file via the Telnyx Documents API first. Within one DIR a `document_id` may only appear once.
     * - `certify_brand_is_accurate`, `certify_no_shaft_content`, `certify_ip_ownership` MUST all be `true`.
     *
     * **Failure modes**
     * - `422` — validation error; `errors[].source.pointer` names the offending field.
     * - `403` — Branded Calling not activated on this enterprise (see `POST /enterprises/{id}/branded_calling`).
     * - `404` — enterprise does not exist or does not belong to your account.
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param string $authorizerEmail Contact email of the authorizer. Telnyx may send verification or infringement-notice email here; use a monitored mailbox.
     * @param string $authorizerName Name of the person at your enterprise who is authorizing this DIR registration. Must be a real individual (used for audit and trademark-claim contests).
     * @param bool $certifyBrandIsAccurate must be `true`
     * @param bool $certifyIPOwnership Must be `true`. Confirms ownership of any logos/trademarks shown.
     * @param bool $certifyNoShaftContent Must be `true`. Confirms this DIR is not used for SHAFT content (Sex, Hate, Alcohol, Firearms, Tobacco) where prohibited.
     * @param string $displayName Name shown to call recipients. No emoji; not whitespace-only.
     * @param list<string> $callReasons 1–10 reasons your business calls customers. Validate phrasing against `POST /call_reasons/validate`.
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
        bool $certifyBrandIsAccurate,
        bool $certifyIPOwnership,
        bool $certifyNoShaftContent,
        string $displayName,
        ?array $callReasons = null,
        ?array $documents = null,
        ?string $logoURL = null,
        bool $reselling = false,
        RequestOptions|array|null $requestOptions = null,
    ): DirNewResponse {
        $params = Util::removeNulls(
            [
                'authorizerEmail' => $authorizerEmail,
                'authorizerName' => $authorizerName,
                'certifyBrandIsAccurate' => $certifyBrandIsAccurate,
                'certifyIPOwnership' => $certifyIPOwnership,
                'certifyNoShaftContent' => $certifyNoShaftContent,
                'displayName' => $displayName,
                'callReasons' => $callReasons,
                'documents' => $documents,
                'logoURL' => $logoURL,
                'reselling' => $reselling,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Return the DIRs (Display Identity Records) belonging to a single enterprise. Pagination is JSON:API style (`page[number]`, `page[size]`, max 250). Filterable by `status`. Searchable by case-insensitive partial match on `display_name` (`search=`). Sortable by any of `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at` (prefix `-` for descending; default `-created_at`). Supports the renewal-window filters `filter[expiring_at][gte]` / `filter[expiring_at][lte]` and the convenience `filter[expiring_within_days]` (mutually exclusive with the explicit gte/lte form).
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param \DateTimeInterface $filterExpiringAtGte return only DIRs whose `expiring_at` is at or after this ISO-8601 timestamp
     * @param \DateTimeInterface $filterExpiringAtLte return only DIRs whose `expiring_at` is at or before this ISO-8601 timestamp
     * @param int $filterExpiringWithinDays Convenience: returns DIRs whose `expiring_at` falls within the next N days (1–365). Equivalent to setting `filter[expiring_at][gte]=<now>` + `filter[expiring_at][lte]=<now+N>`. Mutually exclusive with the explicit `[gte]`/`[lte]` filters — combining returns 400.
     * @param int $pageNumber 1-based page number. Out-of-range values return an empty page with correct meta.
     * @param int $pageSize Items per page. Maximum 250; values above are clamped to 250.
     * @param string $search case-insensitive partial match on `display_name`
     * @param Sort|value-of<Sort> $sort Sort field. Allowed: `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at`. Prefix with `-` for descending. Default `-created_at`.
     * @param Status|value-of<Status> $status filter by DIR status
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DirListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        ?\DateTimeInterface $filterExpiringAtGte = null,
        ?\DateTimeInterface $filterExpiringAtLte = null,
        ?int $filterExpiringWithinDays = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $search = null,
        Sort|string $sort = '-created_at',
        Status|string|null $status = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterExpiringAtGte' => $filterExpiringAtGte,
                'filterExpiringAtLte' => $filterExpiringAtLte,
                'filterExpiringWithinDays' => $filterExpiringWithinDays,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'search' => $search,
                'sort' => $sort,
                'status' => $status,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($enterpriseID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
