<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;

/**
 * @phpstan-import-type DocReqsRequirementTypeShape from \Telnyx\DocReqsRequirementType
 *
 * @phpstan-type RequirementTypeGetResponseShape = array{
 *   data?: null|DocReqsRequirementType|DocReqsRequirementTypeShape
 * }
 */
final class RequirementTypeGetResponse implements BaseModel
{
    /** @use SdkModel<RequirementTypeGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?DocReqsRequirementType $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DocReqsRequirementType|DocReqsRequirementTypeShape|null $data
     */
    public static function with(DocReqsRequirementType|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DocReqsRequirementType|DocReqsRequirementTypeShape $data
     */
    public function withData(DocReqsRequirementType|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
