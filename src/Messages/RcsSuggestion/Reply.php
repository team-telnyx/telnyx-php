<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsSuggestion;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReplyShape = array{postbackData?: string|null, text?: string|null}
 */
final class Reply implements BaseModel
{
    /** @use SdkModel<ReplyShape> */
    use SdkModel;

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    #[Optional('postback_data')]
    public ?string $postbackData;

    /**
     * Text that is shown in the suggested reply (maximum 25 characters).
     */
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

    /**
     * Payload (base64 encoded) that will be sent to the agent in the user event that results when the user taps the suggested action. Maximum 2048 characters.
     */
    public function withPostbackData(string $postbackData): self
    {
        $self = clone $this;
        $self['postbackData'] = $postbackData;

        return $self;
    }

    /**
     * Text that is shown in the suggested reply (maximum 25 characters).
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
