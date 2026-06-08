<?php

declare(strict_types=1);

namespace Telnyx\InfringementClaims;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InfringementClaims\InfringementClaimContestParams\Document;

/**
 * Submit a written response and supporting documents disputing the claim. The first call moves the claim from `pending` to `contested`; subsequent calls append supplementary evidence without changing status. The `documents[]` you attach are aggregated across rounds in the claim's `contest_documents` field.
 *
 * Only `pending` and `contested` claims accept new evidence. A `resolved` claim returns `400`.
 *
 * Failure modes:
 * - `400` - the claim is `resolved` (terminal); cannot be contested further.
 * - `404` - the claim does not exist or is not against a DIR you own.
 * - `422` - `contest_notes` is too short (< 10 chars), too long (> 2000 chars), `documents` is > 20 entries, or a `document_id` is duplicated within the same submission.
 *
 * @see Telnyx\Services\InfringementClaimsService::contest()
 *
 * @phpstan-import-type DocumentShape from \Telnyx\InfringementClaims\InfringementClaimContestParams\Document
 *
 * @phpstan-type InfringementClaimContestParamsShape = array{
 *   contestNotes: string, documents?: list<Document|DocumentShape>|null
 * }
 */
final class InfringementClaimContestParams implements BaseModel
{
    /** @use SdkModel<InfringementClaimContestParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Customer's response to the claim. 10–2000 characters.
     */
    #[Required('contest_notes')]
    public string $contestNotes;

    /**
     * Up to 20 supporting documents per submission. `document_id` must be unique within this submission. Documents are aggregated into the claim's `contest_documents` across all submissions.
     *
     * @var list<Document>|null $documents
     */
    #[Optional(list: Document::class)]
    public ?array $documents;

    /**
     * `new InfringementClaimContestParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InfringementClaimContestParams::with(contestNotes: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InfringementClaimContestParams)->withContestNotes(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Document|DocumentShape>|null $documents
     */
    public static function with(
        string $contestNotes,
        ?array $documents = null
    ): self {
        $self = new self;

        $self['contestNotes'] = $contestNotes;

        null !== $documents && $self['documents'] = $documents;

        return $self;
    }

    /**
     * Customer's response to the claim. 10–2000 characters.
     */
    public function withContestNotes(string $contestNotes): self
    {
        $self = clone $this;
        $self['contestNotes'] = $contestNotes;

        return $self;
    }

    /**
     * Up to 20 supporting documents per submission. `document_id` must be unique within this submission. Documents are aggregated into the claim's `contest_documents` across all submissions.
     *
     * @param list<Document|DocumentShape> $documents
     */
    public function withDocuments(array $documents): self
    {
        $self = clone $this;
        $self['documents'] = $documents;

        return $self;
    }
}
