<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AttachmentRequestShape = array{
 *   content?: string|null,
 *   contentID?: string|null,
 *   contentType?: string|null,
 *   disposition?: string|null,
 *   filename?: string|null,
 * }
 */
final class AttachmentRequest implements BaseModel
{
    /** @use SdkModel<AttachmentRequestShape> */
    use SdkModel;

    /**
     * Attachment content, typically Base64-encoded. Defaults to empty string when omitted.
     */
    #[Optional]
    public ?string $content;

    /**
     * MIME Content-ID used to reference an inline attachment.
     */
    #[Optional('content_id', nullable: true)]
    public ?string $contentID;

    /**
     * MIME content type. Defaults to "application/octet-stream" when omitted.
     */
    #[Optional('content_type')]
    public ?string $contentType;

    /**
     * MIME disposition (`attachment` or `inline`).
     */
    #[Optional]
    public ?string $disposition;

    /**
     * Attachment filename. Defaults to "attachment" when omitted.
     */
    #[Optional]
    public ?string $filename;

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
        ?string $content = null,
        ?string $contentID = null,
        ?string $contentType = null,
        ?string $disposition = null,
        ?string $filename = null,
    ): self {
        $self = new self;

        null !== $content && $self['content'] = $content;
        null !== $contentID && $self['contentID'] = $contentID;
        null !== $contentType && $self['contentType'] = $contentType;
        null !== $disposition && $self['disposition'] = $disposition;
        null !== $filename && $self['filename'] = $filename;

        return $self;
    }

    /**
     * Attachment content, typically Base64-encoded. Defaults to empty string when omitted.
     */
    public function withContent(string $content): self
    {
        $self = clone $this;
        $self['content'] = $content;

        return $self;
    }

    /**
     * MIME Content-ID used to reference an inline attachment.
     */
    public function withContentID(?string $contentID): self
    {
        $self = clone $this;
        $self['contentID'] = $contentID;

        return $self;
    }

    /**
     * MIME content type. Defaults to "application/octet-stream" when omitted.
     */
    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * MIME disposition (`attachment` or `inline`).
     */
    public function withDisposition(string $disposition): self
    {
        $self = clone $this;
        $self['disposition'] = $disposition;

        return $self;
    }

    /**
     * Attachment filename. Defaults to "attachment" when omitted.
     */
    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }
}
