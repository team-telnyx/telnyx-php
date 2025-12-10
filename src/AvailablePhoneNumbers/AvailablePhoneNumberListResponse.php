<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation;
use Telnyx\AvailablePhoneNumbersMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AvailablePhoneNumberListResponseShape = array{
 *   data?: list<Data>|null,
 *   meta?: AvailablePhoneNumbersMetadata|null,
 *   metadata?: AvailablePhoneNumbersMetadata|null,
 * }
 */
final class AvailablePhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<AvailablePhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?AvailablePhoneNumbersMetadata $meta;

    #[Optional]
    public ?AvailablePhoneNumbersMetadata $metadata;

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
     *   bestEffort?: bool|null,
     *   costInformation?: CostInformation|null,
     *   features?: list<Feature>|null,
     *   phoneNumber?: string|null,
     *   quickship?: bool|null,
     *   recordType?: value-of<RecordType>|null,
     *   regionInformation?: list<RegionInformation>|null,
     *   reservable?: bool|null,
     *   vanityFormat?: string|null,
     * }> $data
     * @param AvailablePhoneNumbersMetadata|array{
     *   bestEffortResults?: int|null, totalResults?: int|null
     * } $meta
     * @param AvailablePhoneNumbersMetadata|array{
     *   bestEffortResults?: int|null, totalResults?: int|null
     * } $metadata
     */
    public static function with(
        ?array $data = null,
        AvailablePhoneNumbersMetadata|array|null $meta = null,
        AvailablePhoneNumbersMetadata|array|null $metadata = null,
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;
        null !== $metadata && $self['metadata'] = $metadata;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   bestEffort?: bool|null,
     *   costInformation?: CostInformation|null,
     *   features?: list<Feature>|null,
     *   phoneNumber?: string|null,
     *   quickship?: bool|null,
     *   recordType?: value-of<RecordType>|null,
     *   regionInformation?: list<RegionInformation>|null,
     *   reservable?: bool|null,
     *   vanityFormat?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param AvailablePhoneNumbersMetadata|array{
     *   bestEffortResults?: int|null, totalResults?: int|null
     * } $meta
     */
    public function withMeta(AvailablePhoneNumbersMetadata|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param AvailablePhoneNumbersMetadata|array{
     *   bestEffortResults?: int|null, totalResults?: int|null
     * } $metadata
     */
    public function withMetadata(
        AvailablePhoneNumbersMetadata|array $metadata
    ): self {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
