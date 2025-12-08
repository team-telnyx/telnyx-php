<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\Type;

/**
 * @phpstan-type MessagingHostedNumberOrderNewVerificationCodesResponseShape = array{
 *   data: list<Data>
 * }
 */
final class MessagingHostedNumberOrderNewVerificationCodesResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessagingHostedNumberOrderNewVerificationCodesResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data> $data */
    #[Api(list: Data::class)]
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
     *   phone_number: string,
     *   error?: string|null,
     *   type?: value-of<Type>|null,
     *   verification_code_id?: string|null,
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
     *   phone_number: string,
     *   error?: string|null,
     *   type?: value-of<Type>|null,
     *   verification_code_id?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
