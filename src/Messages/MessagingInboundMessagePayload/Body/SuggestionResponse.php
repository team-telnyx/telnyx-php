<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\Body;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Selected RCS suggestion.
 *
 * @phpstan-type SuggestionResponseShape = array{
 *   postbackData?: string|null, text?: string|null
 * }
 */
final class SuggestionResponse implements BaseModel
{
    /** @use SdkModel<SuggestionResponseShape> */
    use SdkModel;

    #[Optional('postback_data')]
    public ?string $postbackData;

    #[Optional]
    public ?string $text;

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
        ?string $postbackData = null,
        ?string $text = null
    ): self {
        $self = new self;

        null !== $postbackData && $self['postbackData'] = $postbackData;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    public function withPostbackData(string $postbackData): self
    {
        $self = clone $this;
        $self['postbackData'] = $postbackData;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
