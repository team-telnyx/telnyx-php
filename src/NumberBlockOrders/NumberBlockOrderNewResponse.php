<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberBlockOrders\NumberBlockOrder\Status;

/**
 * @phpstan-type NumberBlockOrderNewResponseShape = array{
 *   data?: NumberBlockOrder|null
 * }
 */
final class NumberBlockOrderNewResponse implements BaseModel
{
    /** @use SdkModel<NumberBlockOrderNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumberBlockOrder $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberBlockOrder|array{
     *   id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_numbers_count?: int|null,
     *   range?: int|null,
     *   record_type?: string|null,
     *   requirements_met?: bool|null,
     *   starting_number?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NumberBlockOrder|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param NumberBlockOrder|array{
     *   id?: string|null,
     *   connection_id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   customer_reference?: string|null,
     *   messaging_profile_id?: string|null,
     *   phone_numbers_count?: int|null,
     *   range?: int|null,
     *   record_type?: string|null,
     *   requirements_met?: bool|null,
     *   starting_number?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NumberBlockOrder|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
