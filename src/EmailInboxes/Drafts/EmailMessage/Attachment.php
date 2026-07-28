<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts\EmailMessage;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * EDR-aligned attachment metadata. The base64 `content` is never returned.
 *
 * @phpstan-type AttachmentShape = array{
 *   contentID: string|null,
 *   contentType: string,
 *   disposition: string,
 *   filename: string,
 *   sha256: string|null,
 *   sizeBytes: int|null,
 *   url: string|null,
 * }
 */
final class Attachment implements BaseModel
{
    /** @use SdkModel<AttachmentShape> */
    use SdkModel;

    /**
     * MIME Content-ID for inline references.
     */
    #[Required('content_id')]
    public ?string $contentID;

    #[Required('content_type')]
    public string $contentType;

    /**
     * MIME disposition (e.g. `attachment` or `inline`). Runtime passes through the stored value without enforcing an enum.
     */
    #[Required]
    public string $disposition;

    #[Required]
    public string $filename;

    /**
     * SHA-256 hex digest of the attachment content.
     */
    #[Required]
    public ?string $sha256;

    /**
     * Attachment size in bytes.
     */
    #[Required('size_bytes')]
    public ?int $sizeBytes;

    /**
     * Telnyx-hosted public URL for the attachment content.
     */
    #[Required]
    public ?string $url;

    /**
     * `new Attachment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Attachment::with(
     *   contentID: ...,
     *   contentType: ...,
     *   disposition: ...,
     *   filename: ...,
     *   sha256: ...,
     *   sizeBytes: ...,
     *   url: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Attachment)
     *   ->withContentID(...)
     *   ->withContentType(...)
     *   ->withDisposition(...)
     *   ->withFilename(...)
     *   ->withSha256(...)
     *   ->withSizeBytes(...)
     *   ->withURL(...)
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
    public static function with(
        ?string $contentID,
        string $contentType,
        string $filename,
        ?string $sha256,
        ?int $sizeBytes,
        ?string $url,
        string $disposition = 'attachment',
    ): self {
        $self = new self;

        $self['contentID'] = $contentID;
        $self['contentType'] = $contentType;
        $self['disposition'] = $disposition;
        $self['filename'] = $filename;
        $self['sha256'] = $sha256;
        $self['sizeBytes'] = $sizeBytes;
        $self['url'] = $url;

        return $self;
    }

    /**
     * MIME Content-ID for inline references.
     */
    public function withContentID(?string $contentID): self
    {
        $self = clone $this;
        $self['contentID'] = $contentID;

        return $self;
    }

    public function withContentType(string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * MIME disposition (e.g. `attachment` or `inline`). Runtime passes through the stored value without enforcing an enum.
     */
    public function withDisposition(string $disposition): self
    {
        $self = clone $this;
        $self['disposition'] = $disposition;

        return $self;
    }

    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    /**
     * SHA-256 hex digest of the attachment content.
     */
    public function withSha256(?string $sha256): self
    {
        $self = clone $this;
        $self['sha256'] = $sha256;

        return $self;
    }

    /**
     * Attachment size in bytes.
     */
    public function withSizeBytes(?int $sizeBytes): self
    {
        $self = clone $this;
        $self['sizeBytes'] = $sizeBytes;

        return $self;
    }

    /**
     * Telnyx-hosted public URL for the attachment content.
     */
    public function withURL(?string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }
}
