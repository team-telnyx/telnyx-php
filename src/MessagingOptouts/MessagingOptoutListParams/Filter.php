<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts\MessagingOptoutListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from].
 *
 * @phpstan-type FilterShape = array{
 *   from?: string|null, messagingProfileID?: string|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code) to retrieve opt-outs for.
     */
    #[Optional]
    public ?string $from;

    /**
     * The ID of the messaging profile to retrieve opt-outs for.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

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
        ?string $messagingProfileID = null
    ): self {
        $self = new self;

        null !== $from && $self['from'] = $from;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code) to retrieve opt-outs for.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The ID of the messaging profile to retrieve opt-outs for.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }
}
