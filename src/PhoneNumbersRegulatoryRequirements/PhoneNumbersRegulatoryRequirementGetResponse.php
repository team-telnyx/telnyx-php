<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbersRegulatoryRequirements;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegionInformation;
use Telnyx\PhoneNumbersRegulatoryRequirements\PhoneNumbersRegulatoryRequirementGetResponse\Data\RegulatoryRequirement;

/**
 * @phpstan-type PhoneNumbersRegulatoryRequirementGetResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class PhoneNumbersRegulatoryRequirementGetResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumbersRegulatoryRequirementGetResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

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
     *   phoneNumber?: string|null,
     *   phoneNumberType?: string|null,
     *   recordType?: string|null,
     *   regionInformation?: list<RegionInformation>|null,
     *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   phoneNumber?: string|null,
     *   phoneNumberType?: string|null,
     *   recordType?: string|null,
     *   regionInformation?: list<RegionInformation>|null,
     *   regulatoryRequirements?: list<RegulatoryRequirement>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
