<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data\SimCardActionsSummary\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimCardActionsSummaryShape = array{
 *   count?: int|null, status?: null|Status|value-of<Status>
 * }
 */
final class SimCardActionsSummary implements BaseModel
{
    /** @use SdkModel<SimCardActionsSummaryShape> */
    use SdkModel;

    #[Optional]
    public ?int $count;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?int $count = null,
        Status|string|null $status = null
    ): self {
        $self = new self;

        null !== $count && $self['count'] = $count;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
