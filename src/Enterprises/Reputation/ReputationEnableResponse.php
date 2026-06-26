<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EnterpriseReputationPublicShape from \Telnyx\Enterprises\Reputation\EnterpriseReputationPublic
 *
 * @phpstan-type ReputationEnableResponseShape = array{
 *   data: EnterpriseReputationPublic|EnterpriseReputationPublicShape
 * }
 */
final class ReputationEnableResponse implements BaseModel
{
    /** @use SdkModel<ReputationEnableResponseShape> */
    use SdkModel;

    #[Required]
    public EnterpriseReputationPublic $data;

    /**
     * `new ReputationEnableResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReputationEnableResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReputationEnableResponse)->withData(...)
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
     * @param EnterpriseReputationPublic|EnterpriseReputationPublicShape $data
     */
    public static function with(EnterpriseReputationPublic|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EnterpriseReputationPublic|EnterpriseReputationPublicShape $data
     */
    public function withData(EnterpriseReputationPublic|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
