<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\Type;

/**
 * @phpstan-type MessagingHostedNumberOrderNewVerificationCodesResponseShape = array{
 *   data: list<Data>
 * }
 */
final class MessagingHostedNumberOrderNewVerificationCodesResponse implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderNewVerificationCodesResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * `new MessagingHostedNumberOrderNewVerificationCodesResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingHostedNumberOrderNewVerificationCodesResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingHostedNumberOrderNewVerificationCodesResponse)->withData(...)
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
     * @param list<Data|array{
     *   phoneNumber: string,
     *   error?: string|null,
     *   type?: value-of<Type>|null,
     *   verificationCodeID?: string|null,
     * }> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   phoneNumber: string,
     *   error?: string|null,
     *   type?: value-of<Type>|null,
     *   verificationCodeID?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
