<?php

declare(strict_types=1);

namespace Telnyx\NumberBlockOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\NumberBlockOrders\NumberBlockOrder\Status;

/**
 * @phpstan-type NumberBlockOrderGetResponseShape = array{
 *   data?: NumberBlockOrder|null
 * }
 */
final class NumberBlockOrderGetResponse implements BaseModel
{
    /** @use SdkModel<NumberBlockOrderGetResponseShape> */
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
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbersCount?: int|null,
     *   range?: int|null,
     *   recordType?: string|null,
     *   requirementsMet?: bool|null,
     *   startingNumber?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(NumberBlockOrder|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberBlockOrder|array{
     *   id?: string|null,
     *   connectionID?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   customerReference?: string|null,
     *   messagingProfileID?: string|null,
     *   phoneNumbersCount?: int|null,
     *   range?: int|null,
     *   recordType?: string|null,
     *   requirementsMet?: bool|null,
     *   startingNumber?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(NumberBlockOrder|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
