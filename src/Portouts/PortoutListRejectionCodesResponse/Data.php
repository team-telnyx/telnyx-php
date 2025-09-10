<?php

declare(strict_types=1);

namespace Telnyx\Portouts\PortoutListRejectionCodesResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   code?: int|null, description?: string|null, reasonRequired?: bool|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $code;

    #[Api(optional: true)]
    public ?string $description;

    #[Api('reason_required', optional: true)]
    public ?bool $reasonRequired;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $code = null,
        ?string $description = null,
        ?bool $reasonRequired = null
    ): self {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $description && $obj->description = $description;
        null !== $reasonRequired && $obj->reasonRequired = $reasonRequired;

        return $obj;
    }

    public function withCode(int $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withReasonRequired(bool $reasonRequired): self
    {
        $obj = clone $this;
        $obj->reasonRequired = $reasonRequired;

        return $obj;
    }
}
