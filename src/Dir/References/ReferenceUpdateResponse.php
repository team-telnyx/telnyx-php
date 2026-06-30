<?php

declare(strict_types=1);

namespace Telnyx\Dir\References;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\References\ReferenceUpdateResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Dir\References\ReferenceUpdateResponse\Data
 *
 * @phpstan-type ReferenceUpdateResponseShape = array{data: Data|DataShape}
 */
final class ReferenceUpdateResponse implements BaseModel
{
    /** @use SdkModel<ReferenceUpdateResponseShape> */
    use SdkModel;

    /**
     * A reference (business or financial) on a DIR, in the customer-facing shape. No internal identifiers are exposed.
     */
    #[Required]
    public Data $data;

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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * A reference (business or financial) on a DIR, in the customer-facing shape. No internal identifiers are exposed.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
