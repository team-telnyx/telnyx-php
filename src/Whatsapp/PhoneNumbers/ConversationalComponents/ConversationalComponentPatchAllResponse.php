<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConversationalComponentShape from \Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponent
 *
 * @phpstan-type ConversationalComponentPatchAllResponseShape = array{
 *   data?: null|ConversationalComponent|ConversationalComponentShape
 * }
 */
final class ConversationalComponentPatchAllResponse implements BaseModel
{
    /** @use SdkModel<ConversationalComponentPatchAllResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ConversationalComponent $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConversationalComponent|ConversationalComponentShape|null $data
     */
    public static function with(
        ConversationalComponent|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConversationalComponent|ConversationalComponentShape $data
     */
    public function withData(ConversationalComponent|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
