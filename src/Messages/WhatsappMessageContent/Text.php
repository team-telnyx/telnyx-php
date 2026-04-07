<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappMessageContent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Text message content. Can only be sent within a 24-hour customer service window.
 *
 * @phpstan-type TextShape = array{body: string, previewURL?: bool|null}
 */
final class Text implements BaseModel
{
    /** @use SdkModel<TextShape> */
    use SdkModel;

    /**
     * The text message body.
     */
    #[Required]
    public string $body;

    /**
     * Whether to show a URL preview in the message.
     */
    #[Optional('preview_url')]
    public ?bool $previewURL;

    /**
     * `new Text()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Text::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Text)->withBody(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $body, ?bool $previewURL = null): self
    {
        $self = new self;

        $self['body'] = $body;

        null !== $previewURL && $self['previewURL'] = $previewURL;

        return $self;
    }

    /**
     * The text message body.
     */
    public function withBody(string $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * Whether to show a URL preview in the message.
     */
    public function withPreviewURL(bool $previewURL): self
    {
        $self = clone $this;
        $self['previewURL'] = $previewURL;

        return $self;
    }
}
