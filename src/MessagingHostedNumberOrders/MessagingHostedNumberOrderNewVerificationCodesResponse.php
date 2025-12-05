<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\VerificationCodeError;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\VerificationCodeSuccess;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\VerificationCodeSuccess\Type;

/**
 * @phpstan-type MessagingHostedNumberOrderNewVerificationCodesResponseShape = array{
 *   data: list<VerificationCodeSuccess|VerificationCodeError>
 * }
 */
final class MessagingHostedNumberOrderNewVerificationCodesResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<MessagingHostedNumberOrderNewVerificationCodesResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<VerificationCodeSuccess|VerificationCodeError> $data */
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
     * @param list<VerificationCodeSuccess|array{
     *   phone_number: string, type: value-of<Type>, verification_code_id: string
     * }|VerificationCodeError|array{error: string, phone_number: string}> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<VerificationCodeSuccess|array{
     *   phone_number: string, type: value-of<Type>, verification_code_id: string
     * }|VerificationCodeError|array{error: string, phone_number: string}> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
