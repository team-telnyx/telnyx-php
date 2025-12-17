<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MessagingProfileShape from \Telnyx\MessagingProfiles\MessagingProfile
 *
 * @phpstan-type MessagingProfileUpdateResponseShape = array{
 *   data?: null|MessagingProfile|MessagingProfileShape
 * }
 */
final class MessagingProfileUpdateResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?MessagingProfile $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingProfile|MessagingProfileShape|null $data
     */
    public static function with(MessagingProfile|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingProfile|MessagingProfileShape $data
     */
    public function withData(MessagingProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
