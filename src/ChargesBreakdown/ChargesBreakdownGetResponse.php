<?php

declare(strict_types=1);

namespace Telnyx\ChargesBreakdown;

use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data;
use Telnyx\ChargesBreakdown\ChargesBreakdownGetResponse\Data\Result;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChargesBreakdownGetResponseShape = array{data: Data}
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
     * @param Data|array{
     *   currency: string,
     *   end_date: \DateTimeInterface,
     *   results: list<Result>,
     *   start_date: \DateTimeInterface,
     *   user_email: string,
     *   user_id: string,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   currency: string,
     *   end_date: \DateTimeInterface,
     *   results: list<Result>,
     *   start_date: \DateTimeInterface,
     *   user_email: string,
     *   user_id: string,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
