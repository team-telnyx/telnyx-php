<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\InfringementClaims\InfringementClaimContestParams;
use Telnyx\InfringementClaims\InfringementClaimContestParams\Document;
use Telnyx\InfringementClaims\InfringementClaimContestResponse;
use Telnyx\InfringementClaims\InfringementClaimGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InfringementClaimsRawContract;

/**
 * Trademark or impersonation claims filed against your DIR. Customers may contest a claim with supporting evidence.
 *
 * @phpstan-import-type DocumentShape from \Telnyx\InfringementClaims\InfringementClaimContestParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InfringementClaimsRawService implements InfringementClaimsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single claim by id. Returns `404` if the claim does not exist or is not against a DIR you own.
     *
     * @param string $claimID claim id (lowercase UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InfringementClaimGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $claimID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['infringement_claims/%1$s', $claimID],
            options: $requestOptions,
            convert: InfringementClaimGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Submit a written response and supporting documents disputing the claim. The first call moves the claim from `pending` to `contested`; subsequent calls append supplementary evidence without changing status. The `documents[]` you attach are aggregated across rounds in the claim's `contest_documents` field.
     *
     * Only `pending` and `contested` claims accept new evidence. A `resolved` claim returns `400`.
     *
     * Failure modes:
     * - `400` - the claim is `resolved` (terminal); cannot be contested further.
     * - `404` - the claim does not exist or is not against a DIR you own.
     * - `422` - `contest_notes` is too short (< 10 chars), too long (> 2000 chars), `documents` is > 20 entries, or a `document_id` is duplicated within the same submission.
     *
     * @param string $claimID unique identifier of the claim
     * @param array{
     *   contestNotes: string, documents?: list<Document|DocumentShape>
     * }|InfringementClaimContestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InfringementClaimContestResponse>
     *
     * @throws APIException
     */
    public function contest(
        string $claimID,
        array|InfringementClaimContestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InfringementClaimContestParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['infringement_claims/%1$s/contest', $claimID],
            body: (object) $parsed,
            options: $options,
            convert: InfringementClaimContestResponse::class,
        );
    }
}
