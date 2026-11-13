<?php

declare(strict_types=1);

namespace Telnyx\PortingOrderStatus;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrderStatus\Detail\Code;
use Telnyx\PortingOrderStatus\Detail\Remediation;

/**
 * @phpstan-import-type RemediationShape from \Telnyx\PortingOrderStatus\Detail\Remediation
 *
 * @phpstan-type DetailShape = array{
 *   code: Code|value-of<Code>,
 *   description: string,
 *   remediation: Remediation|RemediationShape,
 * }
 */
final class Detail implements BaseModel
{
    /** @use SdkModel<DetailShape> */
    use SdkModel;

    /**
     * Identifier of the exception. Includes legacy codes persisted on older orders.
     *
     * @var value-of<Code> $code
     */
    #[Required(enum: Code::class)]
    public string $code;

    /**
     * Description of the exception.
     */
    #[Required]
    public string $description;

    /**
     * Structured remediation steps so an agent can map the exception to a fix via the API alone.
     */
    #[Required]
    public Remediation $remediation;

    /**
     * `new Detail()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Detail::with(code: ..., description: ..., remediation: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Detail)->withCode(...)->withDescription(...)->withRemediation(...)
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
     * @param Code|value-of<Code> $code
     * @param Remediation|RemediationShape $remediation
     */
    public static function with(
        Code|string $code,
        string $description,
        Remediation|array $remediation
    ): self {
        $self = new self;

        $self['code'] = $code;
        $self['description'] = $description;
        $self['remediation'] = $remediation;

        return $self;
    }

    /**
     * Identifier of the exception. Includes legacy codes persisted on older orders.
     *
     * @param Code|value-of<Code> $code
     */
    public function withCode(Code|string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    /**
     * Description of the exception.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Structured remediation steps so an agent can map the exception to a fix via the API alone.
     *
     * @param Remediation|RemediationShape $remediation
     */
    public function withRemediation(Remediation|array $remediation): self
    {
        $self = clone $this;
        $self['remediation'] = $remediation;

        return $self;
    }
}
