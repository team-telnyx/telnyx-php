<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessagingInboundMessagePayload\Body\UserFile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PayloadShape = array{
 *   fileName?: string|null,
 *   fileSizeBytes?: int|null,
 *   fileUri?: string|null,
 *   mimeType?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    #[Optional('file_name')]
    public ?string $fileName;

    #[Optional('file_size_bytes')]
    public ?int $fileSizeBytes;

    #[Optional('file_uri')]
    public ?string $fileUri;

    #[Optional('mime_type')]
    public ?string $mimeType;

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
        ?string $fileName = null,
        ?int $fileSizeBytes = null,
        ?string $fileUri = null,
        ?string $mimeType = null,
    ): self {
        $self = new self;

        null !== $fileName && $self['fileName'] = $fileName;
        null !== $fileSizeBytes && $self['fileSizeBytes'] = $fileSizeBytes;
        null !== $fileUri && $self['fileUri'] = $fileUri;
        null !== $mimeType && $self['mimeType'] = $mimeType;

        return $self;
    }

    public function withFileName(string $fileName): self
    {
        $self = clone $this;
        $self['fileName'] = $fileName;

        return $self;
    }

    public function withFileSizeBytes(int $fileSizeBytes): self
    {
        $self = clone $this;
        $self['fileSizeBytes'] = $fileSizeBytes;

        return $self;
    }

    public function withFileUri(string $fileUri): self
    {
        $self = clone $this;
        $self['fileUri'] = $fileUri;

        return $self;
    }

    public function withMimeType(string $mimeType): self
    {
        $self = clone $this;
        $self['mimeType'] = $mimeType;

        return $self;
    }
}
