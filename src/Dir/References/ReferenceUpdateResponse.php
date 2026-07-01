<?php

declare(strict_types=1);

namespace Telnyx\Dir\References;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReferenceShape from \Telnyx\Dir\References\Reference
 *
 * @phpstan-type ReferenceUpdateResponseShape = array{
 *   data: Reference|ReferenceShape
 * }
 */
final class ReferenceUpdateResponse implements BaseModel
{
    /** @use SdkModel<ReferenceUpdateResponseShape> */
    use SdkModel;

    /**
     * A reference (business or financial) on a DIR, in the customer-facing shape. No internal identifiers are exposed.
     */
    #[Required]
    public Reference $data;

    /**
     * `new ReferenceUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReferenceUpdateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReferenceUpdateResponse)->withData(...)
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
     *
     * @param Reference|ReferenceShape $data
     */
    public static function with(Reference|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A reference (business or financial) on a DIR, in the customer-facing shape. No internal identifiers are exposed.
     *
     * @param Reference|ReferenceShape $data
     */
    public function withData(Reference|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
