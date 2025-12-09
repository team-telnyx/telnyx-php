<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Conference;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * IDs related to who ended the conference. It is expected for them to all be there or all be null.
 *
 * @phpstan-type EndedByShape = array{
 *   callControlID?: string|null, callSessionID?: string|null
 * }
 */
final class EndedBy implements BaseModel
{
    /** @use SdkModel<EndedByShape> */
    use SdkModel;

    /**
     * Call Control ID which ended the conference.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * Call Session ID which ended the conference.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

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
        ?string $callControlID = null,
        ?string $callSessionID = null
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * Call Control ID which ended the conference.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * Call Session ID which ended the conference.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }
}
