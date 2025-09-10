<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\LoaConfigurations\PortingLoaConfiguration\Logo\ContentType;

/**
 * The logo to be used in the LOA.
 *
 * @phpstan-type logo_alias = array{
 *   contentType?: value-of<ContentType>|null, documentID?: string|null
 * }
 */
final class Logo implements BaseModel
{
    /** @use SdkModel<logo_alias> */
    use SdkModel;

    /**
     * The content type of the logo.
     *
     * @var value-of<ContentType>|null $contentType
     */
    #[Api('content_type', enum: ContentType::class, optional: true)]
    public ?string $contentType;

    /**
     * Identifies the document that contains the logo.
     */
    #[Api('document_id', optional: true)]
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
        $obj = new self;

        null !== $contentType && $obj->contentType = $contentType instanceof ContentType ? $contentType->value : $contentType;
        null !== $documentID && $obj->documentID = $documentID;

        return $obj;
    }

    /**
     * The content type of the logo.
     *
     * @param ContentType|value-of<ContentType> $contentType
     */
    public function withContentType(ContentType|string $contentType): self
    {
        $obj = clone $this;
        $obj->contentType = $contentType instanceof ContentType ? $contentType->value : $contentType;

        return $obj;
    }

    /**
     * Identifies the document that contains the logo.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->documentID = $documentID;

        return $obj;
    }
}
