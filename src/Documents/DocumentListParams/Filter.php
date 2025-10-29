<?php

declare(strict_types=1);

namespace Telnyx\Documents\DocumentListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Documents\DocumentListParams\Filter\CreatedAt;
use Telnyx\Documents\DocumentListParams\Filter\CustomerReference;
use Telnyx\Documents\DocumentListParams\Filter\Filename;

/**
 * Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt].
 *
 * @phpstan-type FilterShape = array{
 *   createdAt?: CreatedAt,
 *   customerReference?: CustomerReference,
 *   filename?: Filename,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    #[Api('created_at', optional: true)]
    public ?CreatedAt $createdAt;

    #[Api('customer_reference', optional: true)]
    public ?CustomerReference $customerReference;

    #[Api(optional: true)]
    public ?Filename $filename;

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
        ?CreatedAt $createdAt = null,
        ?CustomerReference $customerReference = null,
        ?Filename $filename = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $filename && $obj->filename = $filename;

        return $obj;
    }

    public function withCreatedAt(CreatedAt $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withCustomerReference(
        CustomerReference $customerReference
    ): self {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    public function withFilename(Filename $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }
}
