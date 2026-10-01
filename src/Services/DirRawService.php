<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\BpoAuthorizationInput;
use Telnyx\Dir\Dir;
use Telnyx\Dir\DirBpoLoaParams;
use Telnyx\Dir\DirDeleteResponse;
use Telnyx\Dir\DirGetBpoAuthorizationsResponse;
use Telnyx\Dir\DirListDocumentTypesResponse;
use Telnyx\Dir\DirListInfringementClaimsParams;
use Telnyx\Dir\DirListParams;
use Telnyx\Dir\DirListParams\Sort;
use Telnyx\Dir\DirNewLoaParams;
use Telnyx\Dir\DirRetrieveBpoAuthorizationsParams;
use Telnyx\Dir\DirStatus;
use Telnyx\Dir\DirUpdateInfringementParams;
use Telnyx\Dir\DirUpdateParams;
use Telnyx\Dir\DirWrapped;
use Telnyx\Dir\Document;
use Telnyx\Dir\SignaturePayload;
use Telnyx\Enterprises\Reputation\Loa\AgentInput;
use Telnyx\InfringementClaims\InfringementClaim;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DirRawContract;

/**
 * @phpstan-import-type BpoAuthorizationInputShape from \Telnyx\Dir\BpoAuthorizationInput
 * @phpstan-import-type AgentInputShape from \Telnyx\Enterprises\Reputation\Loa\AgentInput
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 * @phpstan-import-type DocumentShape from \Telnyx\Dir\Document
 * @phpstan-import-type SignaturePayloadShape from \Telnyx\Dir\SignaturePayload
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
     * @return BaseResponse<DirWrapped>
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
            convert: DirWrapped::class,
        );
    }

    /**
     * @api
     *
     * Edit a DIR. DIRs in `draft`, `rejected`, `unsuccessful`, or `suspended` can be edited freely: PATCH is a pure edit, `status` is never changed, and you re-vet by calling `POST /v2/dir/{dir_id}/submit` explicitly. A `verified` DIR can also be edited in place: a PATCH that changes any value returns the DIR to `draft`; the currently approved identity keeps displaying, and the edited content goes live only after you re-submit and the DIR is approved again. A PATCH that changes nothing (an empty body or values identical to the current ones) leaves the DIR `verified`, so idempotent retries are safe. Changing only `bpo_authorizations` or `webhook_url` is the exception: the DIR stays `verified`. Each BPO authorization is reviewed on its own instead. DIRs in any other status (`submitted`, `in_review`, `expired`, `infringement_claimed`, `permanently_rejected`) cannot be edited.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   authorizerEmail?: string,
     *   authorizerName?: string,
     *   bpoAuthorizations?: list<BpoAuthorizationInput|BpoAuthorizationInputShape>,
     *   callReasons?: list<string>,
     *   certifyBrandIsAccurate?: bool,
     *   certifyIPOwnership?: bool,
     *   certifyNoShaftContent?: bool,
     *   displayName?: string,
     *   documents?: list<Document|DocumentShape>,
     *   logoURL?: string,
     *   reselling?: bool,
     *   webhookURL?: string|null,
     * }|DirUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirWrapped>
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
            convert: DirWrapped::class,
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
     *   filterStatus?: value-of<DirStatus>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: value-of<Sort>,
     * }|DirListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Dir>>
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
            convert: Dir::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Request deletion of a DIR. This does not remove the DIR on this call: it records the request, moves the DIR to `delete_requested`, and Telnyx completes the removal (de-registration and cleanup) shortly after. A verified DIR keeps serving its branded identity, and keeps billing, until the removal is executed. Failure modes: `400` if a child phone number is still attached or the DIR is `in_review` (wait for the review to finish), `409` if the DIR has an unresolved infringement claim, `404` if the DIR is not yours.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirDeleteResponse>
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
            convert: DirDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * The Letter of Authorization in which a Brand Owner authorizes an approved BPO (Business Process Outsourcer) to place branded calls that display this DIR on the owner's behalf. Both parties are read from the caller's account: the Brand Owner is the enterprise that owns the DIR, and the BPO is `bpo_enterprise_id`. No business identity is accepted in the body.
     *
     * When `signature` is omitted the PDF is returned unsigned so the Brand Owner can sign it externally and the BPO can upload it via the Documents API. When `signature` is present the PDF embeds the supplied image, printed name, and signed-at date.
     *
     * Returns `application/pdf`.
     *
     * @param string $dirID the DIR id
     * @param array{
     *   bpoEnterpriseID: string, signature?: SignaturePayload|SignaturePayloadShape
     * }|DirBpoLoaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function bpoLoa(
        string $dirID,
        array|DirBpoLoaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirBpoLoaParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['dir/%1$s/bpo_loa', $dirID],
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
     * @return BaseResponse<DefaultFlatPagination<InfringementClaim>>
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
            convert: InfringementClaim::class,
            page: DefaultFlatPagination::class,
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
     *   agent?: AgentInput|AgentInputShape,
     *   signature?: SignaturePayload|SignaturePayloadShape,
     * }|DirNewLoaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function newLoa(
        string $dirID,
        array|DirNewLoaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirNewLoaParams::parseRequest(
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
     * List the BPO (Business Process Outsourcer) accounts a Brand Owner has authorized on this DIR, together with the review state of each authorization.
     *
     * Authorizations are supplied as the `bpo_authorizations` array when creating or updating a DIR, and each one is reviewed on its own. Only an `approved` authorization adds that BPO to this DIR's authorized callers in the branded calling registry; `pending` and `rejected` authorizations do not. Each entry includes the `loa_document_id` you submitted: because `bpo_authorizations` replaces the whole list on every DIR update, send each entry you want to keep back with its `loa_document_id` unchanged, and it keeps its review state. A rejected entry carries a `rejection_reason`. Returns an empty list when the DIR has authorized no BPOs.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array{
     *   pageNumber?: int, pageSize?: int
     * }|DirRetrieveBpoAuthorizationsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirGetBpoAuthorizationsResponse>
     *
     * @throws APIException
     */
    public function retrieveBpoAuthorizations(
        string $dirID,
        array|DirRetrieveBpoAuthorizationsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DirRetrieveBpoAuthorizationsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['dir/%1$s/bpo_authorizations', $dirID],
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: DirGetBpoAuthorizationsResponse::class,
        );
    }

    /**
     * @api
     *
     * Submit a DIR for vetting. Sends the DIR back through the vetting cycle from any non-terminal status. When re-submitting from `suspended` or `expired`, the DIR's previous Branded Calling registration is torn down transactionally and its phone numbers flip back to `submitted`. When re-submitting from `verified`, the existing registration stays live throughout the new vetting cycle.
     *
     * Returns `400` from `submitted`/`in_review`/`permanently_rejected`. Returns `400` if the DIR's business and financial references have not been submitted. Returns `409` if the DIR has an unresolved infringement claim.
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirWrapped>
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
            convert: DirWrapped::class,
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
     *   documents?: list<Document|DocumentShape>|null,
     *   logoURL?: string|null,
     * }|DirUpdateInfringementParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirWrapped>
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
            convert: DirWrapped::class,
        );
    }
}
