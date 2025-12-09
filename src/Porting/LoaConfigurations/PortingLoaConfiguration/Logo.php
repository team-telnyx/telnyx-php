<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Logo\ContentType;

/**
 * The logo to be used in the LOA.
 *
 * @phpstan-type LogoShape = array{
 *   contentType?: value-of<ContentType>|null, documentID?: string|null
 * }
 */
final class Logo implements BaseModel
{
    /** @use SdkModel<LogoShape> */
    use SdkModel;

    /**
     * The content type of the logo.
     *
     * @var value-of<ContentType>|null $contentType
     */
    #[Optional('content_type', enum: ContentType::class)]
    public ?string $contentType;

    /**
     * Identifies the document that contains the logo.
     */
    #[Optional('document_id')]
    public ?string $documentID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ContentType|value-of<ContentType> $contentType
     */
    public static function with(
        ContentType|string|null $contentType = null,
        ?string $documentID = null
    ): self {
        $self = new self;

        null !== $contentType && $self['contentType'] = $contentType;
        null !== $documentID && $self['documentID'] = $documentID;

        return $self;
    }

    /**
     * The content type of the logo.
     *
     * @param ContentType|value-of<ContentType> $contentType
     */
    public function withContentType(ContentType|string $contentType): self
    {
        $self = clone $this;
        $self['contentType'] = $contentType;

        return $self;
    }

    /**
     * Identifies the document that contains the logo.
     */
    public function withDocumentID(string $documentID): self
    {
        $self = clone $this;
        $self['documentID'] = $documentID;

        return $self;
    }
}
