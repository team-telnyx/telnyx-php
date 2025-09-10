<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\TransferTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type transfer_tool = array{
 *   transfer: InferenceEmbeddingTransferToolParams, type: value-of<Type>
 * }
 */
final class TransferTool implements BaseModel
{
    /** @use SdkModel<transfer_tool> */
    use SdkModel;

    #[Api]
    public InferenceEmbeddingTransferToolParams $transfer;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new TransferTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TransferTool::with(transfer: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TransferTool)->withTransfer(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        InferenceEmbeddingTransferToolParams $transfer,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->transfer = $transfer;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withTransfer(
        InferenceEmbeddingTransferToolParams $transfer
    ): self {
        $obj = clone $this;
        $obj->transfer = $transfer;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
