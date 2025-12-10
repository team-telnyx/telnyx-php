<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RegionInformation;
use Telnyx\AvailablePhoneNumbersMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AvailablePhoneNumberBlockListResponseShape = array{
 *   data?: list<Data>|null, meta?: AvailablePhoneNumbersMetadata|null
 * }
 */
final class AvailablePhoneNumberBlockListResponse implements BaseModel
{
    /** @use SdkModel<AvailablePhoneNumberBlockListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?AvailablePhoneNumbersMetadata $meta;

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
     *   costInformation?: CostInformation|null,
     *   features?: list<Feature>|null,
     *   range?: int|null,
     *   recordType?: value-of<RecordType>|null,
     *   regionInformation?: list<RegionInformation>|null,
     *   startingNumber?: string|null,
     * }> $data
     * @param AvailablePhoneNumbersMetadata|array{
     *   bestEffortResults?: int|null, totalResults?: int|null
     * } $meta
     */
    public static function with(
        ?array $data = null,
        AvailablePhoneNumbersMetadata|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   costInformation?: CostInformation|null,
     *   features?: list<Feature>|null,
     *   range?: int|null,
     *   recordType?: value-of<RecordType>|null,
     *   regionInformation?: list<RegionInformation>|null,
     *   startingNumber?: string|null,
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
}
