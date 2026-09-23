<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Tools\PayToolParams;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * (BETA) The pay tool allows the assistant to collect card payments from the caller via DTMF during the conversation. Recording is automatically paused while the pay tool is active and resumes when the payment flow completes. The connector_name must reference a pay connector configured in the Telnyx API.
 *
 * @phpstan-import-type PayToolParamsShape from \Telnyx\AI\Tools\PayToolParams
 *
 * @phpstan-type PayToolShape = array{
 *   pay: PayToolParams|PayToolParamsShape, type: 'pay', shared?: bool|null
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
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

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
    public static function with(
        PayToolParams|array $pay,
        ?bool $shared = null
    ): self {
        $self = new self;

        $self['pay'] = $pay;

        null !== $shared && $self['shared'] = $shared;

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

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    public function withShared(bool $shared): self
    {
        $self = clone $this;
        $self['shared'] = $shared;

        return $self;
    }
}
