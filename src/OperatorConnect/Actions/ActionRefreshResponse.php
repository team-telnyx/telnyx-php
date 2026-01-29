<?php

declare(strict_types=1);

namespace Telnyx\OperatorConnect\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActionRefreshResponseShape = array{
 *   message?: string|null, success?: bool|null
 * }
 */
final class ActionRefreshResponse implements BaseModel
{
    /** @use SdkModel<ActionRefreshResponseShape> */
    use SdkModel;

    /**
     * A message describing the result of the operation.
     */
    #[Optional]
    public ?string $message;

    /**
     * Describes wether or not the operation was successful.
     */
    #[Optional]
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
        $self = new self;

        null !== $message && $self['message'] = $message;
        null !== $success && $self['success'] = $success;

        return $self;
    }

    /**
     * A message describing the result of the operation.
     */
    public function withMessage(string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    /**
     * Describes wether or not the operation was successful.
     */
    public function withSuccess(bool $success): self
    {
        $self = clone $this;
        $self['success'] = $success;

        return $self;
    }
}
