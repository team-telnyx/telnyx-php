<?php

declare(strict_types=1);

namespace Telnyx\RegulatoryRequirements;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data;
use Telnyx\RegulatoryRequirements\RegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type RegulatoryRequirementGetResponseShape = array{
 *   data?: list<Data>|null
 * }
 */
final class RegulatoryRequirementGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<RegulatoryRequirementGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
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
     *   country_code?: string|null,
     *   phone_number_type?: string|null,
     *   regulatory_requirements?: list<RegulatoryRequirement>|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   action?: string|null,
     *   country_code?: string|null,
     *   phone_number_type?: string|null,
     *   regulatory_requirements?: list<RegulatoryRequirement>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
