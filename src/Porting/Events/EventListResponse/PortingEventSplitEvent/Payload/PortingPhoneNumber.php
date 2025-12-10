<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\PortingEventSplitEvent\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingPhoneNumberShape = array{id?: string|null}
 */
final class PortingPhoneNumber implements BaseModel
{
    /** @use SdkModel<PortingPhoneNumberShape> */
    use SdkModel;

    /**
     * Identifies the porting phone number that was moved.
     */
    #[Optional]
    public ?string $id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null): self
    {
        $self = new self;

        null !== $id && $self['id'] = $id;

        return $self;
    }

    /**
     * Identifies the porting phone number that was moved.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
