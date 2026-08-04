<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * At least one of `text` or `html` must contain a non-whitespace body. Recipients are derived from the source message; caller-supplied `to`, `cc`, or `bcc` values are ignored.
 *
 * @phpstan-type ReplyEmailInboxMessageRequestShape = array{
 *   html?: string|null, text?: string|null
 * }
 */
final class ReplyEmailInboxMessageRequest implements BaseModel
{
    /** @use SdkModel<ReplyEmailInboxMessageRequestShape> */
    use SdkModel;

    /**
     * HTML reply body.
     */
    #[Optional]
    public ?string $html;

    /**
     * Plain-text reply body.
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
    public static function with(?string $html = null, ?string $text = null): self
    {
        $self = new self;

        null !== $html && $self['html'] = $html;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * HTML reply body.
     */
    public function withHTML(string $html): self
    {
        $self = clone $this;
        $self['html'] = $html;

        return $self;
    }

    /**
     * Plain-text reply body.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
