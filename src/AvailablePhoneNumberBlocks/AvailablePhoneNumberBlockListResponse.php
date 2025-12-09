<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RegionInformation;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Meta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AvailablePhoneNumberBlockListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
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
    public ?Meta $meta;

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
     * @param Meta|array{bestEffortResults?: int|null, totalResults?: int|null} $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
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
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{bestEffortResults?: int|null, totalResults?: int|null} $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
