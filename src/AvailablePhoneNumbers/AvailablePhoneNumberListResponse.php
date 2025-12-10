<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumbers;

use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Data\RegionInformation;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Meta;
use Telnyx\AvailablePhoneNumbers\AvailablePhoneNumberListResponse\Metadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AvailablePhoneNumberListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null, metadata?: Metadata|null
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
    public ?Meta $meta;

    #[Optional]
    public ?Metadata $metadata;

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
     * @param Meta|array{bestEffortResults?: int|null, totalResults?: int|null} $meta
     * @param Metadata|array{
     *   bestEffortResults?: int|null, totalResults?: int|null
     * } $metadata
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null,
        Metadata|array|null $metadata = null
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
     * @param Meta|array{bestEffortResults?: int|null, totalResults?: int|null} $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param Metadata|array{
     *   bestEffortResults?: int|null, totalResults?: int|null
     * } $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
