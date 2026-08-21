<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RemediationRequestShape from \Telnyx\Enterprises\Reputation\Remediation\RemediationRequest
 *
 * @phpstan-type RemediationRequestWrappedShape = array{
 *   data: RemediationRequest|RemediationRequestShape
 * }
 */
final class RemediationRequestWrapped implements BaseModel
{
    /** @use SdkModel<RemediationRequestWrappedShape> */
    use SdkModel;

    /**
     * Full detail of a remediation request, returned on submit and GET by id.
     */
    #[Required]
    public RemediationRequest $data;

    /**
     * `new RemediationRequestWrapped()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RemediationRequestWrapped::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RemediationRequestWrapped)->withData(...)
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
     * @param RemediationRequest|RemediationRequestShape $data
     */
    public static function with(RemediationRequest|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Full detail of a remediation request, returned on submit and GET by id.
     *
     * @param RemediationRequest|RemediationRequestShape $data
     */
    public function withData(RemediationRequest|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
