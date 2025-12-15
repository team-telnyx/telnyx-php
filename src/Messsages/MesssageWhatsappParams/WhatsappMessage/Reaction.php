<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReactionShape = array{
 *   empji?: string|null, messageID?: string|null
 * }
 */
final class Reaction implements BaseModel
{
    /** @use SdkModel<ReactionShape> */
    use SdkModel;

    #[Optional]
    public ?string $empji;

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
        ?string $empji = null,
        ?string $messageID = null
    ): self {
        $self = new self;

        null !== $empji && $self['empji'] = $empji;
        null !== $messageID && $self['messageID'] = $messageID;

        return $self;
    }

    public function withEmpji(string $empji): self
    {
        $self = clone $this;
        $self['empji'] = $empji;

        return $self;
    }

    public function withMessageID(string $messageID): self
    {
        $self = clone $this;
        $self['messageID'] = $messageID;

        return $self;
    }
}
