<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EnterprisePublicShape from \Telnyx\Enterprises\EnterprisePublic
 *
 * @phpstan-type EnterpriseUpdateResponseShape = array{
 *   data: EnterprisePublic|EnterprisePublicShape
 * }
 */
final class EnterpriseUpdateResponse implements BaseModel
{
    /** @use SdkModel<EnterpriseUpdateResponseShape> */
    use SdkModel;

    #[Required]
    public EnterprisePublic $data;

    /**
     * `new EnterpriseUpdateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EnterpriseUpdateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EnterpriseUpdateResponse)->withData(...)
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
     * @param EnterprisePublic|EnterprisePublicShape $data
     */
    public static function with(EnterprisePublic|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EnterprisePublic|EnterprisePublicShape $data
     */
    public function withData(EnterprisePublic|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
