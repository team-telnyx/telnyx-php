<?php

declare(strict_types=1);

namespace Telnyx\Texml\Calls\CallUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{sid?: string|null, status?: string|null}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $sid;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $sid = null, ?string $status = null): self
    {
        $self = new self;

        null !== $sid && $self['sid'] = $sid;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withSid(string $sid): self
    {
        $self = clone $this;
        $self['sid'] = $sid;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
