<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Remediation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\Reputation\Remediation\RemediationSubmitResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Enterprises\Reputation\Remediation\RemediationSubmitResponse\Data
 *
 * @phpstan-type RemediationSubmitResponseShape = array{data: Data|DataShape}
 */
final class RemediationSubmitResponse implements BaseModel
{
    /** @use SdkModel<RemediationSubmitResponseShape> */
    use SdkModel;

    /**
     * Full detail of a remediation request, returned on submit and GET by id.
     */
    #[Required]
    public Data $data;

    /**
     * `new RemediationSubmitResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RemediationSubmitResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RemediationSubmitResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Full detail of a remediation request, returned on submit and GET by id.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
