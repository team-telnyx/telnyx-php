<?php

declare(strict_types=1);

namespace Telnyx\MessagingHostedNumberOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\VerificationCodeError;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse\Data\VerificationCodeSuccess;

/**
 * @phpstan-type messaging_hosted_number_order_new_verification_codes_response = array{
 *   data: list<VerificationCodeSuccess|VerificationCodeError>
 * }
 */
final class MessagingHostedNumberOrderNewVerificationCodesResponse implements BaseModel
{
    /**
     * @use SdkModel<messaging_hosted_number_order_new_verification_codes_response>
     */
    use SdkModel;

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
     * @param list<VerificationCodeSuccess|VerificationCodeError> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<VerificationCodeSuccess|VerificationCodeError> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
