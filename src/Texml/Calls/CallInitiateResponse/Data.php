<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls\CallInitiateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   from?: string|null, status?: string|null, to?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $from;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $to;

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
        ?string $from = null,
        ?string $status = null,
        ?string $to = null
    ): self {
        $self = new self;

        null !== $from && $self['from'] = $from;
        null !== $status && $self['status'] = $status;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
