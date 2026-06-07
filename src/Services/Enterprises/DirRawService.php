<?php

declare(strict_types=1);

namespace Telnyx\Services\Enterprises;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Dir\DirCreateParams;
use Telnyx\Enterprises\Dir\DirCreateParams\Document;
use Telnyx\Enterprises\Dir\DirListParams;
use Telnyx\Enterprises\Dir\DirListParams\FilterStatus;
use Telnyx\Enterprises\Dir\DirListParams\Sort;
use Telnyx\Enterprises\Dir\DirListResponse;
use Telnyx\Enterprises\Dir\DirNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Enterprises\DirRawContract;

/**
 * A Display Identity Record (DIR) is the verified calling identity (display name, logo, call reasons) shown to recipients on outbound calls.
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Enterprises\Dir\DirCreateParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DirRawService implements DirRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     * @param array{
     *   authorizerEmail: string,
     *   authorizerName: string,
     *   certifyBrandIsAccurate: bool,
     *   certifyIPOwnership: bool,
     *   certifyNoShaftContent: bool,
     *   displayName: string,
     *   callReasons?: list<string>,
     *   documents?: list<Document|DocumentShape>,
     *   logoURL?: string,
     *   reselling?: bool,
     * }|DirCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $enterpriseID,
        array|DirCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['enterprises/%1$s/dir', $enterpriseID],
            body: (object) $parsed,
            options: $options,
            convert: DirNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the DIRs (Display Identity Records) belonging to a single enterprise. Pagination is JSON:API style (`page[number]`, `page[size]`, max 250). Supports `filter[]` query params: `filter[status]`, `filter[display_name][contains]`, `filter[call_reason][contains]`, plus the renewal-window filters `filter[expiring_at][gte]` / `filter[expiring_at][lte]` and the convenience `filter[expiring_within_days]` (mutually exclusive with the explicit gte/lte form). Sortable by `created_at`, `updated_at`, `display_name`, `status`, `submitted_at`, `verified_at`, `expiring_at` (prefix `-` for descending; default `-created_at`).
     *
     * @param string $enterpriseID The enterprise id. Lowercase UUID.
     * @param array{
     *   filterCallReasonContains?: string,
     *   filterDisplayNameContains?: string,
     *   filterExpiringAtGte?: \DateTimeInterface,
     *   filterExpiringAtLte?: \DateTimeInterface,
     *   filterExpiringWithinDays?: int,
     *   filterStatus?: value-of<FilterStatus>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: value-of<Sort>,
     * }|DirListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DirListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $enterpriseID,
        array|DirListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['enterprises/%1$s/dir', $enterpriseID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCallReasonContains' => 'filter[call_reason][contains]',
                    'filterDisplayNameContains' => 'filter[display_name][contains]',
                    'filterExpiringAtGte' => 'filter[expiring_at][gte]',
                    'filterExpiringAtLte' => 'filter[expiring_at][lte]',
                    'filterExpiringWithinDays' => 'filter[expiring_within_days]',
                    'filterStatus' => 'filter[status]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: DirListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
