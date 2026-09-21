<?php

declare(strict_types=1);

namespace Telnyx\X402\CreditAccount\Payments;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TransactionRecordShape from \Telnyx\X402\CreditAccount\Payments\TransactionRecord
 *
 * @phpstan-type PaymentGetResponseShape = array{
 *   data?: null|TransactionRecord|TransactionRecordShape
 * }
 */
final class PaymentGetResponse implements BaseModel
{
    /** @use SdkModel<PaymentGetResponseShape> */
    use SdkModel;

    /**
     * An x402 payment transaction.
     */
    #[Optional]
    public ?TransactionRecord $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TransactionRecord|TransactionRecordShape|null $data
     */
    public static function with(TransactionRecord|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * An x402 payment transaction.
     *
     * @param TransactionRecord|TransactionRecordShape $data
     */
    public function withData(TransactionRecord|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
