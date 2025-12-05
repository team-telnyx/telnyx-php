<?php

declare(strict_types=1);

namespace Telnyx\AvailablePhoneNumberBlocks;

use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\CostInformation;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\Feature;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RecordType;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Data\RegionInformation;
use Telnyx\AvailablePhoneNumberBlocks\AvailablePhoneNumberBlockListResponse\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type AvailablePhoneNumberBlockListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class AvailablePhoneNumberBlockListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<AvailablePhoneNumberBlockListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   cost_information?: CostInformation|null,
     *   features?: list<Feature>|null,
     *   range?: int|null,
     *   record_type?: value-of<RecordType>|null,
     *   region_information?: list<RegionInformation>|null,
     *   starting_number?: string|null,
     * }> $data
     * @param Meta|array{
     *   best_effort_results?: int|null, total_results?: int|null
     * } $meta
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
     *   cost_information?: CostInformation|null,
     *   features?: list<Feature>|null,
     *   range?: int|null,
     *   record_type?: value-of<RecordType>|null,
     *   region_information?: list<RegionInformation>|null,
     *   starting_number?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   best_effort_results?: int|null, total_results?: int|null
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
