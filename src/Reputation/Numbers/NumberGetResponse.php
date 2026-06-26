<?php

declare(strict_types=1);

namespace Telnyx\Reputation\Numbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Reputation\Numbers\NumberGetResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Reputation\Numbers\NumberGetResponse\Data
 *
 * @phpstan-type NumberGetResponseShape = array{data: Data|DataShape}
 */
final class NumberGetResponse implements BaseModel
{
    /** @use SdkModel<NumberGetResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new NumberGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberGetResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
