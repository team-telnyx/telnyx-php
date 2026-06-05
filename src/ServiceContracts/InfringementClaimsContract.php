<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\InfringementClaims\InfringementClaimContestParams\Document;
use Telnyx\InfringementClaims\InfringementClaimContestResponse;
use Telnyx\InfringementClaims\InfringementClaimGetResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\InfringementClaims\InfringementClaimContestParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InfringementClaimsContract
{
    /**
     * @api
     *
     * @param string $claimID claim id (lowercase UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $claimID,
        RequestOptions|array|null $requestOptions = null
    ): InfringementClaimGetResponse;

    /**
     * @api
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
    ): InfringementClaimContestResponse;
}
