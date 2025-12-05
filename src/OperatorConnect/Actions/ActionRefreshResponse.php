<?php

declare(strict_types=1);

namespace Telnyx\OperatorConnect\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ActionRefreshResponseShape = array{
 *   message?: string|null, success?: bool|null
 * }
 */
final class ActionRefreshResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionRefreshResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * A message describing the result of the operation.
     */
    #[Api(optional: true)]
    public ?string $message;

    /**
     * Describes wether or not the operation was successful.
     */
    #[Api(optional: true)]
    public ?bool $success;

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
        ?string $message = null,
        ?bool $success = null
    ): self {
        $obj = new self;

        null !== $message && $obj['message'] = $message;
        null !== $success && $obj['success'] = $success;

        return $obj;
    }

    /**
     * A message describing the result of the operation.
     */
    public function withMessage(string $message): self
    {
        $obj = clone $this;
        $obj['message'] = $message;

        return $obj;
    }

    /**
     * Describes wether or not the operation was successful.
     */
    public function withSuccess(bool $success): self
    {
        $obj = clone $this;
        $obj['success'] = $success;

        return $obj;
    }
}
