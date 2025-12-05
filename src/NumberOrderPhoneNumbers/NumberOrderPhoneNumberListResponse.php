<?php

declare(strict_types=1);

namespace Telnyx\NumberOrderPhoneNumbers;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\PhoneNumberType;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\RequirementsStatus;
use Telnyx\NumberOrderPhoneNumbers\NumberOrderPhoneNumber\Status;
use Telnyx\SubNumberOrderRegulatoryRequirementWithValue;

/**
 * @phpstan-type NumberOrderPhoneNumberListResponseShape = array{
 *   data?: list<NumberOrderPhoneNumber>|null, meta?: PaginationMeta|null
 * }
 */
final class NumberOrderPhoneNumberListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<NumberOrderPhoneNumberListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<NumberOrderPhoneNumber>|null $data */
    #[Api(list: NumberOrderPhoneNumber::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<NumberOrderPhoneNumber|array{
     *   id?: string|null,
     *   bundle_id?: string|null,
     *   country_code?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   is_block_number?: bool|null,
     *   locality?: string|null,
     *   order_request_id?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirements_met?: bool|null,
     *   requirements_status?: value-of<RequirementsStatus>|null,
     *   status?: value-of<Status>|null,
     *   sub_number_order_id?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<NumberOrderPhoneNumber|array{
     *   id?: string|null,
     *   bundle_id?: string|null,
     *   country_code?: string|null,
     *   deadline?: \DateTimeInterface|null,
     *   is_block_number?: bool|null,
     *   locality?: string|null,
     *   order_request_id?: string|null,
     *   phone_number?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   regulatory_requirements?: list<SubNumberOrderRegulatoryRequirementWithValue>|null,
     *   requirements_met?: bool|null,
     *   requirements_status?: value-of<RequirementsStatus>|null,
     *   status?: value-of<Status>|null,
     *   sub_number_order_id?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
