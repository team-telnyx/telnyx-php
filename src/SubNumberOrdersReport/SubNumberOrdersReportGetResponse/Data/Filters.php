<?php

declare(strict_types=1);

namespace Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The filters that were applied to generate this report.
 *
 * @phpstan-type FiltersShape = array{
 *   countryCode?: string,
 *   createdAtGt?: \DateTimeInterface,
 *   createdAtLt?: \DateTimeInterface,
 *   customerReference?: string,
 *   orderRequestID?: string,
 *   status?: string,
 * }
 */
final class Filters implements BaseModel
{
    /** @use SdkModel<FiltersShape> */
    use SdkModel;

    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    #[Api('created_at_gt', optional: true)]
    public ?\DateTimeInterface $createdAtGt;

    #[Api('created_at_lt', optional: true)]
    public ?\DateTimeInterface $createdAtLt;

    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    #[Api('order_request_id', optional: true)]
    public ?string $orderRequestID;

    #[Api(optional: true)]
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
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAtGt = null,
        ?\DateTimeInterface $createdAtLt = null,
        ?string $customerReference = null,
        ?string $orderRequestID = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $createdAtGt && $obj->createdAtGt = $createdAtGt;
        null !== $createdAtLt && $obj->createdAtLt = $createdAtLt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $orderRequestID && $obj->orderRequestID = $orderRequestID;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    public function withCreatedAtGt(\DateTimeInterface $createdAtGt): self
    {
        $obj = clone $this;
        $obj->createdAtGt = $createdAtGt;

        return $obj;
    }

    public function withCreatedAtLt(\DateTimeInterface $createdAtLt): self
    {
        $obj = clone $this;
        $obj->createdAtLt = $createdAtLt;

        return $obj;
    }

    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    public function withOrderRequestID(string $orderRequestID): self
    {
        $obj = clone $this;
        $obj->orderRequestID = $orderRequestID;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
