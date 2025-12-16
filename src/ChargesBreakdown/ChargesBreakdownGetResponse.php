<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data
 *
 * @phpstan-type ChargesBreakdownGetResponseShape = array{data: Data|DataShape}
 */
final class ChargesBreakdownGetResponse implements BaseModel
{
    /** @use SdkModel<ChargesBreakdownGetResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new ChargesBreakdownGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChargesBreakdownGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChargesBreakdownGetResponse)->withData(...)
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
     * @param DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
