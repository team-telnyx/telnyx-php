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
 * @phpstan-type LogoShape = array{
 *   content_type?: value-of<ContentType>|null, document_id?: string|null
 * }
 */
final class Logo implements BaseModel
{
    /** @use SdkModel<LogoShape> */
    use SdkModel;

    /**
     * The content type of the logo.
     *
     * @var value-of<ContentType>|null $content_type
     */
    #[Api(enum: ContentType::class, optional: true)]
    public ?string $content_type;

    /**
     * Identifies the document that contains the logo.
     */
    #[Api(optional: true)]
    public ?string $document_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ContentType|value-of<ContentType> $content_type
     */
    public static function with(
        ContentType|string|null $content_type = null,
        ?string $document_id = null
    ): self {
        $obj = new self;

        null !== $content_type && $obj['content_type'] = $content_type;
        null !== $document_id && $obj->document_id = $document_id;

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
        $obj['content_type'] = $contentType;

        return $obj;
    }

    /**
     * Identifies the document that contains the logo.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->document_id = $documentID;

        return $obj;
    }
}
