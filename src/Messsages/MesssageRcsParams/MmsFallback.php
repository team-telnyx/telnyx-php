<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MmsFallbackShape = array{
 *   from?: string|null,
 *   media_urls?: list<string>|null,
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
     * @var list<string>|null $media_urls
     */
    #[Optional(list: 'string')]
    public ?array $media_urls;

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
     * @param list<string> $media_urls
     */
    public static function with(
        ?string $from = null,
        ?array $media_urls = null,
        ?string $subject = null,
        ?string $text = null,
    ): self {
        $obj = new self;

        null !== $from && $obj['from'] = $from;
        null !== $media_urls && $obj['media_urls'] = $media_urls;
        null !== $subject && $obj['subject'] = $subject;
        null !== $text && $obj['text'] = $text;

        return $obj;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj['from'] = $from;

        return $obj;
    }

    /**
     * List of media URLs.
     *
     * @param list<string> $mediaURLs
     */
    public function withMediaURLs(array $mediaURLs): self
    {
        $obj = clone $this;
        $obj['media_urls'] = $mediaURLs;

        return $obj;
    }

    /**
     * Subject of the message.
     */
    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj['subject'] = $subject;

        return $obj;
    }

    /**
     * Text.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }
}
