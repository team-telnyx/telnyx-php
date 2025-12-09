<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;
use Telnyx\DocReqsRequirementType\AcceptanceCriteria;
use Telnyx\DocReqsRequirementType\Type;

/**
 * @phpstan-type RequirementTypeGetResponseShape = array{
 *   data?: DocReqsRequirementType|null
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
     * @param DocReqsRequirementType|array{
     *   id?: string|null,
     *   acceptanceCriteria?: AcceptanceCriteria|null,
     *   createdAt?: string|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(DocReqsRequirementType|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DocReqsRequirementType|array{
     *   id?: string|null,
     *   acceptanceCriteria?: AcceptanceCriteria|null,
     *   createdAt?: string|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(DocReqsRequirementType|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
