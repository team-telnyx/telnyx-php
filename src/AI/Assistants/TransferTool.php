<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\TransferTool\Transfer;
use Telnyx\AI\Assistants\TransferTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TransferShape from \Telnyx\AI\Assistants\TransferTool\Transfer
 *
 * @phpstan-type TransferToolShape = array{
 *   transfer: Transfer|TransferShape, type: Type|value-of<Type>
 * }
 */
final class TransferTool implements BaseModel
{
    /** @use SdkModel<TransferToolShape> */
    use SdkModel;

    #[Required]
    public Transfer $transfer;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
     * @param Transfer|TransferShape $transfer
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Transfer|array $transfer,
        Type|string $type
    ): self {
        $self = new self;

        $self['transfer'] = $transfer;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param Transfer|TransferShape $transfer
     */
    public function withTransfer(Transfer|array $transfer): self
    {
        $self = clone $this;
        $self['transfer'] = $transfer;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
