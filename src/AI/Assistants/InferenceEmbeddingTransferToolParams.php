<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\InferenceEmbeddingTransferToolParams\CustomHeader;
use Telnyx\AI\Assistants\InferenceEmbeddingTransferToolParams\Target;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type inference_embedding_transfer_tool_params = array{
 *   from: string,
 *   targets: list<Target>,
 *   customHeaders?: list<CustomHeader>,
 *   warmTransferInstructions?: string,
 * }
 */
final class InferenceEmbeddingTransferToolParams implements BaseModel
{
    /** @use SdkModel<inference_embedding_transfer_tool_params> */
    use SdkModel;

    /**
     * Number or SIP URI placing the call.
     */
    #[Api]
    public string $from;

    /**
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to.
     *
     * @var list<Target> $targets
     */
    #[Api(list: Target::class)]
    public array $targets;

    /**
     * Custom headers to be added to the SIP INVITE for the transfer command.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Api('custom_headers', list: CustomHeader::class, optional: true)]
    public ?array $customHeaders;

    /**
     * Natural language instructions for your agent for how to provide context for the transfer recipient.
     */
    #[Api('warm_transfer_instructions', optional: true)]
    public ?string $warmTransferInstructions;

    /**
     * `new InferenceEmbeddingTransferToolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingTransferToolParams::with(from: ..., targets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbeddingTransferToolParams)->withFrom(...)->withTargets(...)
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
     * @param list<Target> $targets
     * @param list<CustomHeader> $customHeaders
     */
    public static function with(
        string $from,
        array $targets,
        ?array $customHeaders = null,
        ?string $warmTransferInstructions = null,
    ): self {
        $obj = new self;

        $obj->from = $from;
        $obj->targets = $targets;

        null !== $customHeaders && $obj->customHeaders = $customHeaders;
        null !== $warmTransferInstructions && $obj->warmTransferInstructions = $warmTransferInstructions;

        return $obj;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $obj = clone $this;
        $obj->from = $from;

        return $obj;
    }

    /**
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to.
     *
     * @param list<Target> $targets
     */
    public function withTargets(array $targets): self
    {
        $obj = clone $this;
        $obj->targets = $targets;

        return $obj;
    }

    /**
     * Custom headers to be added to the SIP INVITE for the transfer command.
     *
     * @param list<CustomHeader> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $obj = clone $this;
        $obj->customHeaders = $customHeaders;

        return $obj;
    }

    /**
     * Natural language instructions for your agent for how to provide context for the transfer recipient.
     */
    public function withWarmTransferInstructions(
        string $warmTransferInstructions
    ): self {
        $obj = clone $this;
        $obj->warmTransferInstructions = $warmTransferInstructions;

        return $obj;
    }
}
