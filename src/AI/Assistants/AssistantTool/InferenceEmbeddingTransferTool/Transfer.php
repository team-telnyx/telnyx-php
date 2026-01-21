<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\Target;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TargetShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\Target
 * @phpstan-import-type CustomHeaderShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer\CustomHeader
 *
 * @phpstan-type TransferShape = array{
 *   from: string,
 *   targets: list<Target|TargetShape>,
 *   customHeaders?: list<CustomHeader|CustomHeaderShape>|null,
 *   warmTransferInstructions?: string|null,
 * }
 */
final class Transfer implements BaseModel
{
    /** @use SdkModel<TransferShape> */
    use SdkModel;

    /**
     * Number or SIP URI placing the call.
     */
    #[Required]
    public string $from;

    /**
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to.
     *
     * @var list<Target> $targets
     */
    #[Required(list: Target::class)]
    public array $targets;

    /**
     * Custom headers to be added to the SIP INVITE for the transfer command.
     *
     * @var list<CustomHeader>|null $customHeaders
     */
    #[Optional('custom_headers', list: CustomHeader::class)]
    public ?array $customHeaders;

    /**
     * Natural language instructions for your agent for how to provide context for the transfer recipient.
     */
    #[Optional('warm_transfer_instructions')]
    public ?string $warmTransferInstructions;

    /**
     * `new Transfer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Transfer::with(from: ..., targets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Transfer)->withFrom(...)->withTargets(...)
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
     * @param list<Target|TargetShape> $targets
     * @param list<CustomHeader|CustomHeaderShape>|null $customHeaders
     */
    public static function with(
        string $from,
        array $targets,
        ?array $customHeaders = null,
        ?string $warmTransferInstructions = null,
    ): self {
        $self = new self;

        $self['from'] = $from;
        $self['targets'] = $targets;

        null !== $customHeaders && $self['customHeaders'] = $customHeaders;
        null !== $warmTransferInstructions && $self['warmTransferInstructions'] = $warmTransferInstructions;

        return $self;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to.
     *
     * @param list<Target|TargetShape> $targets
     */
    public function withTargets(array $targets): self
    {
        $self = clone $this;
        $self['targets'] = $targets;

        return $self;
    }

    /**
     * Custom headers to be added to the SIP INVITE for the transfer command.
     *
     * @param list<CustomHeader|CustomHeaderShape> $customHeaders
     */
    public function withCustomHeaders(array $customHeaders): self
    {
        $self = clone $this;
        $self['customHeaders'] = $customHeaders;

        return $self;
    }

    /**
     * Natural language instructions for your agent for how to provide context for the transfer recipient.
     */
    public function withWarmTransferInstructions(
        string $warmTransferInstructions
    ): self {
        $self = clone $this;
        $self['warmTransferInstructions'] = $warmTransferInstructions;

        return $self;
    }
}
