<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The logo of the LOA configuration.
 *
 * @phpstan-type logo_alias = array{documentID: string}
 */
final class Logo implements BaseModel
{
    /** @use SdkModel<logo_alias> */
    use SdkModel;

    /**
     * The document identification.
     */
    #[Api('document_id')]
    public string $documentID;

    /**
     * `new Logo()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Logo::with(documentID: ...)
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
    public static function with(string $documentID): self
    {
        $obj = new self;

        $obj->documentID = $documentID;

        return $obj;
    }

    /**
     * The document identification.
     */
    public function withDocumentID(string $documentID): self
    {
        $obj = clone $this;
        $obj->documentID = $documentID;

        return $obj;
    }
}
