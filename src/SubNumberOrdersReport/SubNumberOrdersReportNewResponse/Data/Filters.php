<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The filters that were applied to generate this report.
 *
 * @phpstan-type FiltersShape = array{
 *   country_code?: string|null,
 *   created_at_gt?: \DateTimeInterface|null,
 *   created_at_lt?: \DateTimeInterface|null,
 *   customer_reference?: string|null,
 *   order_request_id?: string|null,
 *   status?: string|null,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    #[Optional]
    public ?string $country_code;

    #[Optional]
    public ?\DateTimeInterface $created_at_gt;

    #[Optional]
    public ?\DateTimeInterface $created_at_lt;

    #[Optional]
    public ?string $customer_reference;

    #[Optional]
    public ?string $order_request_id;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $country_code = null,
        ?\DateTimeInterface $created_at_gt = null,
        ?\DateTimeInterface $created_at_lt = null,
        ?string $customer_reference = null,
        ?string $order_request_id = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at_gt && $obj['created_at_gt'] = $created_at_gt;
        null !== $created_at_lt && $obj['created_at_lt'] = $created_at_lt;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $order_request_id && $obj['order_request_id'] = $order_request_id;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

        return $obj;
    }

    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj['created_at_gt'] = $createdAtGt;

        return $obj;
    }

    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj['created_at_lt'] = $createdAtLt;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj['order_request_id'] = $orderRequestID;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
