<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MessagingMessagingProfileShape from \Telnyx\MessagingProfiles\MessagingMessagingProfile
 *
 * @phpstan-type MessagingProfileUpdateResponseShape = array{
 *   data?: null|MessagingMessagingProfile|MessagingMessagingProfileShape
 * }
 */
final class MessagingProfileUpdateResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MessagingMessagingProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingMessagingProfile|MessagingMessagingProfileShape|null $data
     */
    public static function with(
        MessagingMessagingProfile|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingMessagingProfile|MessagingMessagingProfileShape $data
     */
    public function withData(MessagingMessagingProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
