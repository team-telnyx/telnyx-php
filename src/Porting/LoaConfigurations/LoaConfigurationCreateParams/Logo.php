<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The logo of the LOA configuration.
 *
 * @phpstan-type LogoShape = array{document_id: string}
 */
final class Logo implements BaseModel
{
    /** @use SdkModel<LogoShape> */
    use SdkModel;

    /**
     * The document identification.
     */
    #[Api]
    public string $document_id;

    /**
     * `new Logo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Logo::with(document_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Logo)->withDocumentID(...)
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
    public static function with(string $document_id): self
    {
        $obj = new self;

        $obj->document_id = $document_id;

        return $obj;
    }

    /**
     * The document identification.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->document_id = $documentID;

        return $obj;
    }
}
