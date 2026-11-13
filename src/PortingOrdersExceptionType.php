<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrdersExceptionType\Code;
use Telnyx\PortingOrdersExceptionType\Remediation;

/**
 * @phpstan-import-type RemediationShape from \Telnyx\PortingOrdersExceptionType\Remediation
 *
 * @phpstan-type PortingOrdersExceptionTypeShape = array{
 *   code: Code|value-of<Code>,
 *   description: string,
 *   remediation: Remediation|RemediationShape,
 * }
 */
final class PortingOrdersExceptionType implements BaseModel
{
    /** @use SdkModel<PortingOrdersExceptionTypeShape> */
    use SdkModel;

    /**
     * Identifier of an exception type.
     *
     * @var value-of<Code> $code
     */
    #[Required(enum: Code::class)]
    public string $code;

    /**
     * Description of an exception type.
     */
    #[Required]
    public string $description;

    /**
     * Structured remediation steps so an agent can map the exception to a fix via the API alone.
     */
    #[Required]
    public Remediation $remediation;

    /**
     * `new PortingOrdersExceptionType()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PortingOrdersExceptionType::with(code: ..., description: ..., remediation: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PortingOrdersExceptionType)
     *   ->withCode(...)
     *   ->withDescription(...)
     *   ->withRemediation(...)
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
     * Identifier of an exception type.
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
     * Description of an exception type.
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
