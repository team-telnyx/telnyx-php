<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Loa;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Point the enterprise's reputation settings at a new signed LOA document. This resets LOA approval to `pending`; the new document must be approved before additional phone numbers can be added.
 *
 * @see Telnyx\Services\Enterprises\Reputation\LoaService::update()
 *
 * @phpstan-type LoaUpdateParamsShape = array{loaDocumentID: string}
 */
final class LoaUpdateParams implements BaseModel
{
    /** @use SdkModel<LoaUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Id of the new signed LOA document (from the Telnyx Documents API). Changing it resets LOA approval; the new document must be approved before more numbers can be added.
     */
    #[Required('loa_document_id')]
    public string $loaDocumentID;

    /**
     * `new LoaUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LoaUpdateParams::with(loaDocumentID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LoaUpdateParams)->withLoaDocumentID(...)
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
    public static function with(string $loaDocumentID): self
    {
        $self = new self;

        $self['loaDocumentID'] = $loaDocumentID;

        return $self;
    }

    /**
     * Id of the new signed LOA document (from the Telnyx Documents API). Changing it resets LOA approval; the new document must be approved before more numbers can be added.
     */
    public function withLoaDocumentID(string $loaDocumentID): self
    {
        $self = clone $this;
        $self['loaDocumentID'] = $loaDocumentID;

        return $self;
    }
}
