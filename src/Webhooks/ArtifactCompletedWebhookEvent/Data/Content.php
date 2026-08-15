<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\ArtifactCompletedWebhookEvent\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Generated artifact content.
 *
 * @phpstan-type ContentShape = array{text: string}
 */
final class Content implements BaseModel
{
    /** @use SdkModel<ContentShape> */
    use SdkModel;

    /**
     * Generated artifact text.
     */
    #[Required]
    public string $text;

    /**
     * `new Content()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Content::with(text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Content)->withText(...)
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
    public static function with(string $text): self
    {
        $self = new self;

        $self['text'] = $text;

        return $self;
    }

    /**
     * Generated artifact text.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
