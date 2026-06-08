<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\InfringementClaims\InfringementClaimContestParams\Document;
use Telnyx\InfringementClaims\InfringementClaimContestResponse;
use Telnyx\InfringementClaims\InfringementClaimGetResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InfringementClaimsContract;

/**
 * Trademark or impersonation claims filed against your DIR. Customers may contest a claim with supporting evidence.
 *
 * @phpstan-import-type DocumentShape from \Telnyx\InfringementClaims\InfringementClaimContestParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InfringementClaimsService implements InfringementClaimsContract
{
    /**
     * @api
     */
    public InfringementClaimsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InfringementClaimsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a single claim by id. Returns `404` if the claim does not exist or is not against a DIR you own.
     *
     * @param string $claimID claim id (lowercase UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $claimID,
        RequestOptions|array|null $requestOptions = null
    ): InfringementClaimGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($claimID, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param string $contestNotes Customer's response to the claim. 10–2000 characters.
     * @param list<Document|DocumentShape> $documents Up to 20 supporting documents per submission. `document_id` must be unique within this submission. Documents are aggregated into the claim's `contest_documents` across all submissions.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function contest(
        string $claimID,
        string $contestNotes,
        ?array $documents = null,
        RequestOptions|array|null $requestOptions = null,
    ): InfringementClaimContestResponse {
        $params = Util::removeNulls(
            ['contestNotes' => $contestNotes, 'documents' => $documents]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->contest($claimID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
