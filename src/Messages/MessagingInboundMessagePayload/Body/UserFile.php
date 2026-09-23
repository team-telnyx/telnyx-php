<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\Body;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\UserFile\Payload;
use Telnyx\Messages\MessagingInboundMessagePayload\Body\UserFile\Thumbnail;

/**
 * RCS file attachment and optional thumbnail.
 *
 * @phpstan-import-type PayloadShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\UserFile\Payload
 * @phpstan-import-type ThumbnailShape from \Telnyx\Messages\MessagingInboundMessagePayload\Body\UserFile\Thumbnail
 *
 * @phpstan-type UserFileShape = array{
 *   payload?: null|Payload|PayloadShape, thumbnail?: null|Thumbnail|ThumbnailShape
 * }
 */
final class UserFile implements BaseModel
{
    /** @use SdkModel<UserFileShape> */
    use SdkModel;

    #[Optional]
    public ?Payload $payload;

    #[Optional]
    public ?Thumbnail $thumbnail;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Payload|PayloadShape|null $payload
     * @param Thumbnail|ThumbnailShape|null $thumbnail
     */
    public static function with(
        Payload|array|null $payload = null,
        Thumbnail|array|null $thumbnail = null
    ): self {
        $self = new self;

        null !== $payload && $self['payload'] = $payload;
        null !== $thumbnail && $self['thumbnail'] = $thumbnail;

        return $self;
    }

    /**
     * @param Payload|PayloadShape $payload
     */
    public function withPayload(Payload|array $payload): self
    {
        $self = clone $this;
        $self['payload'] = $payload;

        return $self;
    }

    /**
     * @param Thumbnail|ThumbnailShape $thumbnail
     */
    public function withThumbnail(Thumbnail|array $thumbnail): self
    {
        $self = clone $this;
        $self['thumbnail'] = $thumbnail;

        return $self;
    }
}
