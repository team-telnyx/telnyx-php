<?php

declare(strict_types=1);

namespace Telnyx\Balance;

use Telnyx\Balance\BalanceGetResponse\Data;
use Telnyx\Balance\BalanceGetResponse\Data\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BalanceGetResponseShape = array{data?: Data|null}
 */
final class BalanceGetResponse implements BaseModel
{
    /** @use SdkModel<BalanceGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

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
     *   availableCredit?: string|null,
     *   balance?: string|null,
     *   creditLimit?: string|null,
     *   currency?: string|null,
     *   pending?: string|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   availableCredit?: string|null,
     *   balance?: string|null,
     *   creditLimit?: string|null,
     *   currency?: string|null,
     *   pending?: string|null,
     *   recordType?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
