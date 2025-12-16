<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type MessagingProfileShape from \Telnyx\MessagingProfiles\MessagingProfile
 *
 * @phpstan-type MessagingProfileGetResponseShape = array{
 *   data?: null|MessagingProfile|MessagingProfileShape
 * }
 */
final class MessagingProfileGetResponse implements BaseModel
{
    /** @use SdkModel<MessagingProfileGetResponseShape> */
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
     * @param MessagingProfileShape $data
     */
    public static function with(MessagingProfile|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param MessagingProfileShape $data
     */
    public function withData(MessagingProfile|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
