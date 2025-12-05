<?php

declare(strict_types=1);

namespace Telnyx\Balance;

use Telnyx\Balance\BalanceGetResponse\Data;
use Telnyx\Balance\BalanceGetResponse\Data\RecordType;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type BalanceGetResponseShape = array{data?: Data|null}
 */
final class BalanceGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<BalanceGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
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
     *   available_credit?: string|null,
     *   balance?: string|null,
     *   credit_limit?: string|null,
     *   currency?: string|null,
     *   pending?: string|null,
     *   record_type?: value-of<RecordType>|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   available_credit?: string|null,
     *   balance?: string|null,
     *   credit_limit?: string|null,
     *   currency?: string|null,
     *   pending?: string|null,
     *   record_type?: value-of<RecordType>|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
