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
     *   best_effort?: bool|null,
     *   cost_information?: CostInformation|null,
     *   features?: list<Feature>|null,
     *   phone_number?: string|null,
     *   quickship?: bool|null,
     *   record_type?: value-of<RecordType>|null,
     *   region_information?: list<RegionInformation>|null,
     *   reservable?: bool|null,
     *   vanity_format?: string|null,
     * }> $data
     * @param Meta|array{
     *   best_effort_results?: int|null, total_results?: int|null
     * } $meta
     * @param Metadata|array{
     *   best_effort_results?: int|null, total_results?: int|null
     * } $metadata
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null,
        Metadata|array|null $metadata = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;
        null !== $metadata && $obj['metadata'] = $metadata;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   best_effort?: bool|null,
     *   cost_information?: CostInformation|null,
     *   features?: list<Feature>|null,
     *   phone_number?: string|null,
     *   quickship?: bool|null,
     *   record_type?: value-of<RecordType>|null,
     *   region_information?: list<RegionInformation>|null,
     *   reservable?: bool|null,
     *   vanity_format?: string|null,
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

    /**
     * @param Metadata|array{
     *   best_effort_results?: int|null, total_results?: int|null
     * } $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $obj = clone $this;
        $obj['metadata'] = $metadata;

        return $obj;
    }
}
