<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirListInfringementClaimsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirListInfringementClaimsResponse\Dir\Status;

/**
 * Snapshot of the DIR the claim is filed against, embedded for convenience.
 *
 * @phpstan-type DirShape = array{
 *   id?: string|null,
 *   displayName?: string|null,
 *   enterpriseID?: string|null,
 *   status?: null|\Telnyx\Dir\DirListInfringementClaimsResponse\Dir\Status|value-of<\Telnyx\Dir\DirListInfringementClaimsResponse\Dir\Status>,
 * }
 */
final class Dir implements BaseModel
{
    /** @use SdkModel<DirShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional('enterprise_id')]
    public ?string $enterpriseID;

    /**
     * DIR lifecycle status.
     * - `draft` — newly created; editable; not yet submitted.
     * - `submitted` / `in_review` — Telnyx is reviewing.
     * - `verified` — approved; phone numbers may be attached.
     * - `rejected` — Telnyx rejected this submission; `rejection_reasons` is populated; customer can edit and resubmit.
     * - `unsuccessful` — system-side error during processing; customer can edit and resubmit.
     * - `suspended` — temporarily disabled (e.g. by an active infringement claim).
     * - `expired` — verification expired; customer must resubmit.
     * - `infringement_claimed` — a trademark/impersonation claim is open against this DIR.
     * - `permanently_rejected` — terminal; cannot be resubmitted.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(
        enum: Status::class
    )]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?string $displayName = null,
        ?string $enterpriseID = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $enterpriseID && $self['enterpriseID'] = $enterpriseID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withEnterpriseID(string $enterpriseID): self
    {
        $self = clone $this;
        $self['enterpriseID'] = $enterpriseID;

        return $self;
    }

    /**
     * DIR lifecycle status.
     * - `draft` — newly created; editable; not yet submitted.
     * - `submitted` / `in_review` — Telnyx is reviewing.
     * - `verified` — approved; phone numbers may be attached.
     * - `rejected` — Telnyx rejected this submission; `rejection_reasons` is populated; customer can edit and resubmit.
     * - `unsuccessful` — system-side error during processing; customer can edit and resubmit.
     * - `suspended` — temporarily disabled (e.g. by an active infringement claim).
     * - `expired` — verification expired; customer must resubmit.
     * - `infringement_claimed` — a trademark/impersonation claim is open against this DIR.
     * - `permanently_rejected` — terminal; cannot be resubmitted.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(
        Status|string $status
    ): self {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
