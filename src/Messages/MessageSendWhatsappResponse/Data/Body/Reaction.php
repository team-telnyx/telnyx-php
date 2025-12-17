<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReactionShape = array{
 *   emoji?: string|null, messageID?: string|null
 * }
 */
final class Reaction implements BaseModel
{
    /** @use SdkModel<ReactionShape> */
    use SdkModel;

    #[Optional]
    public ?string $emoji;

    #[Optional('message_id')]
    public ?string $messageID;

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
        ?string $emoji = null,
        ?string $messageID = null
    ): self {
        $self = new self;

        null !== $emoji && $self['emoji'] = $emoji;
        null !== $messageID && $self['messageID'] = $messageID;

        return $self;
    }

    public function withEmoji(string $emoji): self
    {
        $self = clone $this;
        $self['emoji'] = $emoji;

        return $self;
    }

    public function withMessageID(string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

        return $self;
    }
}
