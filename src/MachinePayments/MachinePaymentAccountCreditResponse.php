<?php

declare(strict_types=1);

namespace Telnyx\MachinePayments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\MachinePayments\MachinePaymentAccountCreditResponse\Data
 *
 * @phpstan-type MachinePaymentAccountCreditResponseShape = array{
 *   data?: null|Data|DataShape
 * }
 */
final class MachinePaymentAccountCreditResponse implements BaseModel
{
    /** @use SdkModel<MachinePaymentAccountCreditResponseShape> */
    use SdkModel;

    /**
     * An account-credit transaction settled through the Machine Payment Protocol.
     */
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
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * An account-credit transaction settled through the Machine Payment Protocol.
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
