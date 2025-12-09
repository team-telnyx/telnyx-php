<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MmsFallbackShape = array{
 *   from?: string|null,
 *   mediaURLs?: list<string>|null,
 *   subject?: string|null,
 *   text?: string|null,
 * }
 */
final class MmsFallback implements BaseModel
{
    /** @use SdkModel<MmsFallbackShape> */
    use SdkModel;

    /**
     * Phone number in +E.164 format.
     */
    #[Optional]
    public ?string $from;

    /**
     * List of media URLs.
     *
     * @var list<string>|null $mediaURLs
     */
    #[Optional('media_urls', list: 'string')]
    public ?array $mediaURLs;

    /**
     * Subject of the message.
     */
    #[Optional]
    public ?string $subject;

    /**
     * Text.
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
     *
     * @param list<string> $mediaURLs
     */
    public static function with(
        ?string $from = null,
        ?array $mediaURLs = null,
        ?string $subject = null,
        ?string $text = null,
    ): self {
        $self = new self;

        null !== $from && $self['from'] = $from;
        null !== $mediaURLs && $self['mediaURLs'] = $mediaURLs;
        null !== $subject && $self['subject'] = $subject;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * List of media URLs.
     *
     * @param list<string> $mediaURLs
     */
    public function withMediaURLs(array $mediaURLs): self
    {
        $self = clone $this;
        $self['mediaURLs'] = $mediaURLs;

        return $self;
    }

    /**
     * Subject of the message.
     */
    public function withSubject(string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Text.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
