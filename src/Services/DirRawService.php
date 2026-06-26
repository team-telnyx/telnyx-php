<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\DirCreateLoaParams;
use Telnyx\Dir\DirCreateLoaParams\Agent;
use Telnyx\Dir\DirCreateLoaParams\Signature;
use Telnyx\Dir\DirGetResponse;
use Telnyx\Dir\DirListDocumentTypesResponse;
use Telnyx\Dir\DirListInfringementClaimsParams;
use Telnyx\Dir\DirListInfringementClaimsResponse;
use Telnyx\Dir\DirListParams;
use Telnyx\Dir\DirListParams\FilterStatus;
use Telnyx\Dir\DirListParams\Sort;
use Telnyx\Dir\DirListResponse;
use Telnyx\Dir\DirSubmitResponse;
use Telnyx\Dir\DirUpdateInfringementParams;
use Telnyx\Dir\DirUpdateInfringementResponse;
use Telnyx\Dir\DirUpdateParams;
use Telnyx\Dir\DirUpdateParams\Document;
use Telnyx\Dir\DirUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DirRawContract;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\DirUpdateParams\Document
 * @phpstan-import-type AgentShape from \Telnyx\Dir\DirCreateLoaParams\Agent
 * @phpstan-import-type SignatureShape from \Telnyx\Dir\DirCreateLoaParams\Signature
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\DirUpdateInfringementParams\Document as DocumentShape1
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
     * Returns a single DIR by id. The enterprise is resolved server-side from the DIR id. Returns `404` if the DIR does not exist or is not yours.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dir/%1$s', $dirID],
            options: $requestOptions,
            convert: DirGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Edit a DIR. DIRs in `draft`, `rejected`, `unsuccessful`, or `suspended` can be edited freely: PATCH is a pure edit, `status` is never changed, and you re-vet by calling `POST /v2/dir/{dir_id}/submit` explicitly. A `verified` DIR can also be edited in place: a PATCH that changes any value returns the DIR to `draft` and branded delivery stops until you re-submit and the DIR is approved again, while a PATCH that changes nothing (an empty body or values identical to the current ones) leaves the DIR `verified`, so idempotent retries are safe. DIRs in any other status (`submitted`, `in_review`, `expired`, `infringement_claimed`, `permanently_rejected`) cannot be edited.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   authorizerEmail?: string,
     *   authorizerName?: string,
     *   callReasons?: list<string>,
     *   certifyBrandIsAccurate?: bool,
     *   certifyIPOwnership?: bool,
     *   certifyNoShaftContent?: bool,
     *   displayName?: string,
     *   documents?: list<Document|DocumentShape>,
     *   logoURL?: string,
     *   reselling?: bool,
     * }|DirUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $dirID,
        array|DirUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['dir/%1$s', $dirID],
            body: (object) $parsed,
            options: $options,
            convert: DirUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns every DIR (Display Identity Record) you own, across all of your enterprises, as a single list. Pagination is JSON:API style (`page[number]`, `page[size]`, max 250). Supports `filter[]` query params: `filter[enterprise_id]`, `filter[status]`, `filter[display_name][contains]`, `filter[call_reason][contains]`, plus the renewal-window filters `filter[expiring_at][gte]` / `filter[expiring_at][lte]`. Sortable by `created_at`, `updated_at`, `display_name`, `status` (prefix `-` for descending; default `-created_at`).
     *
     * @param array{
     *   filterCallReasonContains?: string,
     *   filterDisplayNameContains?: string,
     *   filterEnterpriseID?: string,
     *   filterExpiringAtGte?: \DateTimeInterface,
     *   filterExpiringAtLte?: \DateTimeInterface,
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
            path: 'dir',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCallReasonContains' => 'filter[call_reason][contains]',
                    'filterDisplayNameContains' => 'filter[display_name][contains]',
                    'filterEnterpriseID' => 'filter[enterprise_id]',
                    'filterExpiringAtGte' => 'filter[expiring_at][gte]',
                    'filterExpiringAtLte' => 'filter[expiring_at][lte]',
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

    /**
     * @api
     *
     * Delete a DIR. Failure modes: `400` if a child phone number is in a non-deletable status, `409` if the DIR has an unresolved infringement claim, `404` if the DIR is not yours.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['dir/%1$s', $dirID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Generate a pre-filled Letter of Authorization (LOA) PDF for a DIR. Enterprise identity (legal name, DBA, address, contact, website, tax id) and the DIR display name are read server-side; the caller supplies the telephone numbers to authorize, an optional Authorized Agent block, and an optional drawn signature.
     *
     * When `signature` is omitted the PDF is returned unsigned so the customer can sign it externally and upload it via the Documents API. When `signature` is present the PDF embeds the supplied image, printed name, and signed-at date.
     *
     * Returns `application/pdf`.
     *
     * @param string $dirID the DIR id
     * @param array{
     *   phoneNumbers: list<string>,
     *   agent?: Agent|AgentShape,
     *   signature?: Signature|SignatureShape,
     * }|DirCreateLoaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createLoa(
        string $dirID,
        array|DirCreateLoaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirCreateLoaParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/loa', $dirID],
            headers: ['Accept' => 'application/pdf'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Reference list of `document_type` values accepted by `DirCreateRequest.documents[].document_type` and the infringement-contest endpoint. Each entry has a stable `short_name` (used in API calls) and a customer-facing description.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirListDocumentTypesResponse>
     *
     * @throws APIException
     */
    public function listDocumentTypes(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'dir/document_types',
            options: $requestOptions,
            convert: DirListDocumentTypesResponse::class,
        );
    }

    /**
     * @api
     *
     * Return the trademark or copyright claims filed against this DIR. Each claim's `status` is `pending` (newly filed; DIR auto-suspended), `contested` (you have submitted contest evidence; awaiting resolution), or `resolved` (final). Resolution outcomes: `upheld` (claim accepted; DIR stays suspended/permanently_rejected), `rejected` (claim dismissed; DIR restored to `verified`), `modified` (partial outcome).
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|DirListInfringementClaimsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DirListInfringementClaimsResponse>>
     *
     * @throws APIException
     */
    public function listInfringementClaims(
        string $dirID,
        array|DirListInfringementClaimsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirListInfringementClaimsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dir/%1$s/infringement_claims', $dirID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: DirListInfringementClaimsResponse::class,
            page: DefaultFlatPagination::class,
        );
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
     * @return BaseResponse<DirSubmitResponse>
     *
     * @throws APIException
     */
    public function submit(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/submit', $dirID],
            options: $requestOptions,
            convert: DirSubmitResponse::class,
        );
    }

    /**
     * @api
     *
     * Push a fix for a DIR that is `suspended` with an open infringement claim back into vetting. `POST /dir/{dir_id}/submit` is blocked while a claim is open, so this is the customer-callable path to update the DIR's content and re-certify before Telnyx adjudicates the claim. All four certification booleans must be `true`. Optional content fields (`display_name`, `logo_url`, `call_reasons`, `documents`) update the DIR; documents are append-only.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   certifyBrandIsAccurate: bool,
     *   certifyIPOwnership: bool,
     *   certifyNoInfringement: bool,
     *   certifyNoShaftContent: bool,
     *   infringementResolutionNotes: string,
     *   callReasons?: list<string>|null,
     *   displayName?: string|null,
     *   documents?: list<DirUpdateInfringementParams\Document|DocumentShape1>|null,
     *   logoURL?: string|null,
     * }|DirUpdateInfringementParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirUpdateInfringementResponse>
     *
     * @throws APIException
     */
    public function updateInfringement(
        string $dirID,
        array|DirUpdateInfringementParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirUpdateInfringementParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['dir/%1$s/infringement_update', $dirID],
            body: (object) $parsed,
            options: $options,
            convert: DirUpdateInfringementResponse::class,
        );
    }
}
