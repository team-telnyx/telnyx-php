<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Usage\GuardrailFinding\Action;
use Telnyx\LlmTokenGateway\Usage\GuardrailFinding\Detector;

/**
 * @phpstan-type GuardrailFindingShape = array{
 *   action: Action|value-of<Action>,
 *   code: string,
 *   count: int,
 *   detector: Detector|value-of<Detector>,
 * }
 */
final class GuardrailFinding implements BaseModel
{
    /** @use SdkModel<GuardrailFindingShape> */
    use SdkModel;

    /** @var value-of<Action> $action */
    #[Required(enum: Action::class)]
    public string $action;

    #[Required]
    public string $code;

    #[Required]
    public int $count;

    /** @var value-of<Detector> $detector */
    #[Required(enum: Detector::class)]
    public string $detector;

    /**
     * `new GuardrailFinding()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * GuardrailFinding::with(action: ..., code: ..., count: ..., detector: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new GuardrailFinding)
     *   ->withAction(...)
     *   ->withCode(...)
     *   ->withCount(...)
     *   ->withDetector(...)
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
     * @param Action|value-of<Action> $action
     * @param Detector|value-of<Detector> $detector
     */
    public static function with(
        Action|string $action,
        string $code,
        int $count,
        Detector|string $detector
    ): self {
        $self = new self;

        $self['action'] = $action;
        $self['code'] = $code;
        $self['count'] = $count;
        $self['detector'] = $detector;

        return $self;
    }

    /**
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withCount(int $count): self
    {
        $self = clone $this;
        $self['count'] = $count;

        return $self;
    }

    /**
     * @param Detector|value-of<Detector> $detector
     */
    public function withDetector(Detector|string $detector): self
    {
        $self = clone $this;
        $self['detector'] = $detector;

        return $self;
    }
}
