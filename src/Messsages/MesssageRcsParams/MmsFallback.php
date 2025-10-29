<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MmsFallbackShape = array{
 *   from?: string, mediaURLs?: list<string>, subject?: string, text?: string
 * }
 */
final class MmsFallback implements BaseModel
{
    /** @use SdkModel<MmsFallbackShape> */
    use SdkModel;

    /**
     * Phone number in +E.164 format.
     */
    #[Api(optional: true)]
    public ?string $from;

    /**
     * List of media URLs.
     *
     * @var list<string>|null $mediaURLs
     */
    #[Api('media_urls', list: 'string', optional: true)]
    public ?array $mediaURLs;

    /**
     * Subject of the message.
     */
    #[Api(optional: true)]
    public ?string $subject;

    /**
     * Text.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $from && $obj->from = $from;
        null !== $mediaURLs && $obj->mediaURLs = $mediaURLs;
        null !== $subject && $obj->subject = $subject;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

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
        $obj->mediaURLs = $mediaURLs;

        return $obj;
    }

    /**
     * Subject of the message.
     */
    public function withSubject(string $subject): self
    {
        $obj = clone $this;
        $obj->subject = $subject;

        return $obj;
    }

    /**
     * Text.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
