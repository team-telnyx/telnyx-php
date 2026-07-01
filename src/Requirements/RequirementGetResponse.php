<?php

declare(strict_types=1);

namespace Telnyx\Requirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DocReqsRequirementShape from \Telnyx\Requirements\DocReqsRequirement
 *
 * @phpstan-type RequirementGetResponseShape = array{
 *   data?: null|DocReqsRequirement|DocReqsRequirementShape
 * }
 */
final class RequirementGetResponse implements BaseModel
{
    /** @use SdkModel<RequirementGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?DocReqsRequirement $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocReqsRequirement|DocReqsRequirementShape|null $data
     */
    public static function with(DocReqsRequirement|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DocReqsRequirement|DocReqsRequirementShape $data
     */
    public function withData(DocReqsRequirement|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
