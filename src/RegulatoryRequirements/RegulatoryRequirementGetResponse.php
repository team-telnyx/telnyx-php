<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type RegulatoryRequirementGetResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class RegulatoryRequirementGetResponse implements BaseModel
{
    /** @use SdkModel<RegulatoryRequirementGetResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   action?: string|null,
     *   countryCode?: string|null,
     *   phoneNumberType?: string|null,
     *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   action?: string|null,
     *   countryCode?: string|null,
     *   phoneNumberType?: string|null,
     *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
