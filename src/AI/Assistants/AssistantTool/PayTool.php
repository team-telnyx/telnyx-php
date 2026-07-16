<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Tools\PayToolParams;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The pay tool allows the assistant to collect card payments from the caller via DTMF during the conversation. Recording is automatically paused while the pay tool is active and resumes when the payment flow completes. The connector_name must reference a pay connector configured in the Telnyx API.
 *
 * @phpstan-import-type PayToolParamsShape from \Telnyx\AI\Tools\PayToolParams
 *
 * @phpstan-type PayToolShape = array{
 *   pay: PayToolParams|PayToolParamsShape, type: 'pay'
 * }
 */
final class PayTool implements BaseModel
{
    /** @use SdkModel<PayToolShape> */
    use SdkModel;

    /** @var 'pay' $type */
    #[Required]
    public string $type = 'pay';

    #[Required]
    public PayToolParams $pay;

    /**
     * `new PayTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PayTool::with(pay: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PayTool)->withPay(...)
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
     * @param PayToolParams|PayToolParamsShape $pay
     */
    public static function with(PayToolParams|array $pay): self
    {
        $self = new self;

        $self['pay'] = $pay;

        return $self;
    }

    /**
     * @param PayToolParams|PayToolParamsShape $pay
     */
    public function withPay(PayToolParams|array $pay): self
    {
        $self = clone $this;
        $self['pay'] = $pay;

        return $self;
    }

    /**
     * @param 'pay' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
