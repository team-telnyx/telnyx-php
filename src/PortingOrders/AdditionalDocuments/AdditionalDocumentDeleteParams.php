<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AdditionalDocuments;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes an additional document for a porting order.
 *
 * @see Telnyx\Services\PortingOrders\AdditionalDocumentsService::delete()
 *
 * @phpstan-type AdditionalDocumentDeleteParamsShape = array{id: string}
 */
final class AdditionalDocumentDeleteParams implements BaseModel
{
    /** @use SdkModel<AdditionalDocumentDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new AdditionalDocumentDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AdditionalDocumentDeleteParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AdditionalDocumentDeleteParams)->withID(...)
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
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
