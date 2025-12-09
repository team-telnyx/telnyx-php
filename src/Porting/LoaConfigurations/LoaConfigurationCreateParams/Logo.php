<?php

declare(strict_types=1);

namespace Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The logo of the LOA configuration.
 *
 * @phpstan-type LogoShape = array{documentID: string}
 */
final class Logo implements BaseModel
{
    /** @use SdkModel<LogoShape> */
    use SdkModel;

    /**
     * The document identification.
     */
    #[Required('document_id')]
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
        $self = new self;

        $self['documentID'] = $documentID;

        return $self;
    }

    /**
     * The document identification.
     */
    public function withDocumentID(string $documentID): self
    {
        $self = clone $this;
        $self['documentID'] = $documentID;

        return $self;
    }
}
