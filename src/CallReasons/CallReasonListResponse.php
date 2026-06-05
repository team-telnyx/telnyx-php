<?php

declare(strict_types=1);

namespace Telnyx\CallReasons;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Pre-vetted call-reason library entry.
 *
 * @phpstan-type CallReasonListResponseShape = array{
 *   id?: string|null, description?: string|null, reason?: string|null
 * }
 */
final class CallReasonListResponse implements BaseModel
{
    /** @use SdkModel<CallReasonListResponseShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $reason;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $description = null,
        ?string $reason = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $description && $self['description'] = $description;
        null !== $reason && $self['reason'] = $reason;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
